<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends MY_Controller {

	private $admindb;
	private $adminprivdb;
	private $adminroledb;
	private $adminroleprivdb;

	public function __construct() {
		parent::__construct();
		$this -> load -> model('Adminmodel');
		$this -> admindb = $this->Adminmodel;

		//$this -> admindb = $this -> Adminmodel;

		$this->load->model('AdminPrivmodel');
		$this->adminprivdb = $this->AdminPrivmodel;

		$this->load->model('AdminRolemodel');
		$this->adminroledb = $this->AdminRolemodel;

		$this->load->model('AdminRolePrivmodel');
		$this->adminroleprivdb = $this->AdminRolePrivmodel;
	}

	/**
     * 角色管理
     */
	public function role(){
		$data['order'] = "roleid ASC";
		$data['limit'] = PAGESIZE;
		$page = $this->input->get('page');
		$currentPage = $page = isset($page) ? intval($page) : 1;
		$offset = ($page - 1) * PAGESIZE;
		$data['offset'] = $offset;
		$result = $this -> adminroledb -> rolelist($data);
		$this -> load -> library('Page');
		$pageObject = new Page($result['total'], PAGESIZE, $currentPage);
		$pageObject -> setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$pages = $pageObject -> show();
		$dataShow = array('pages' => $pages, 'datas' => $result['rows']);
		$this -> load -> view('manager/role', $dataShow);
	}

	/**
	 * 创建角色
	 */
	public function addRole(){
		$this->load->view('manager/roleAdd');
	}

	/**
	 * 管理员角色编辑
	 */
	public function editRole(){
		$roleid = $this->input->get('roleid');
		//根据角色id得到角色信息
		$AdminRoleInfo = $this->adminroledb->getRoleById($roleid);
		if(!empty($AdminRoleInfo)){
			$this->load->view('manager/roleEdit',$AdminRoleInfo);
		}else{
			$data['msg'] = '传递参数错误';
			$data['url'] = $_SERVER['HTTP_REFERER'];
			$this -> load -> view('common/error', $data);
		}
	}

	/**
	 * 保存管理员角色
	 */
	public function saveRole(){
		if(IS_POST){
			$savedata['roleid'] = $this->input->post('roleid');
			$savedata['rolename'] = $this->input->post('rolename');
			$savedata['description'] = $this->input->post('description');
			$result = $this->adminroledb->saveRole($savedata);
			if($result){
                if($savedata['roleid']){
                    $remark = '修改角色：角色ID'.$savedata['roleid'];
                }else{
                    $remark = '添加角色：角色ID'.$result;
                }
                $this->createAdminLog($remark);
				redirect('manager/role');
			}else{
				$data['msg'] = '保存角色失败';
				$data['url'] = $_SERVER['HTTP_REFERER'];
				$this -> load -> view('common/error', $data);
			}
		}
	}

	/**
	 * 删除管理员角色
	 */
	public function delRole(){
		if(IS_AJAX){
			$roleid = $this->input->post('roleid');
			//首先判断一下该角色下面是否有会员
			$Admins = $this->admindb->getAdminByRoleid($roleid);
			if(!empty($Admins)){
				//不可以删除
				$data = array(
					'info' => 0,
					'tip' => '有属于该角色的管理员，不可删除！'
				);
			}else{
				$result = $this->adminroledb->delRoleById($roleid);
				if($result) {

                    $this->createAdminLog('删除角色权限：角色ID'.$roleid);
					//删除该角色对应的权限节点
					$this->adminroleprivdb->delRolePrivByRoleid($roleid);
					$data = array(
						'info' => 1,
						'tip' => '操作成功'
					);
				}else{
					$data = array(
						'info' => 0,
						'tip' => '操作失败'
					);
				}
			}
			echo json_encode($data);
		}
	}

	/**
	 * 管理员管理
	 */
	public function admin(){
		$data['order'] = "id ASC";
		$data['limit'] = PAGESIZE;
		$page = $this->input->get('page');
		$currentPage = $page = isset($page) ? intval($page) : 1;
		$offset = ($page - 1) * PAGESIZE;
		$data['offset'] = $offset;
		$result = $this -> admindb -> adminlist($data);
		foreach($result['rows'] as $k=>$v){
			$RoleInfo = $this->adminroledb->getRoleById($v['roleid']);
			$result['rows'][$k]['rolename'] = $RoleInfo['rolename'];
		}
		$this -> load -> library('Page');
		$pageObject = new Page($result['total'], PAGESIZE, $currentPage);
		$pageObject -> setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$pages = $pageObject -> show();
		$dataShow = array('pages' => $pages, 'datas' => $result['rows']);
		$this -> load -> view('manager/admin', $dataShow);
	}

	/**
	 * 创建管理员
	 */
	public function addAdmin(){
		//所有管理员角色
		$roleLists = $this->adminroledb->getAllRole();
		$this->load->vars('roles',$roleLists);
		$this->load->view('manager/adminAdd');
	}

	/**
	 * 管理员编辑
	 */
	public function editAdmin(){
		$id = $this->input->get('id');
		$AdminInfo = $this->admindb->getAdminById($id);
		if(!empty($AdminInfo)){
			$roleLists = $this->adminroledb->getAllRole();
			$this->load->vars('roles',$roleLists);
			$this->load->view('manager/adminEdit',$AdminInfo);
		}else{
			$dataTip['msg'] = '传递参数错误';
			$dataTip['url'] = $_SERVER['HTTP_REFERER'];
			$this->load->view('common/error', $dataTip);
		}
	}

	/**
     * 保存管理员
     */
	public function saveAdmin()
	{
		if (IS_POST) {
			$data['id'] = $this->input->post('id');
			$account = $this->input->post('account');
			if (isset($account) && !empty($account)) {
				$data['account'] = $account;
			} else {
				$dataTip['msg'] = '账号不能为空';
				$dataTip['url'] = $_SERVER['HTTP_REFERER'];
				$this->load->view('common/error', $dataTip);
				exit;
			}
			$roleid = $this->input->post('roleid');
			if (isset($roleid) && !empty($roleid)) {
				$data['roleid'] = $roleid;
			} else {
				$dataTip['msg'] = '账号所属角色不能为空';
				$dataTip['url'] = $_SERVER['HTTP_REFERER'];
				$this->load->view('common/error', $dataTip);
				exit;
			}
            $data['realname'] = $this->input->post('realname');
			$data['mobile'] = $this->input->post('mobile');
			$data['email'] = $this->input->post('email');
			$password = $this->input->post('password');
			if (isset($password) && !empty($password)) {
				$data['password'] = md5($password);
				$confirmpassword = $this->input->post('confirmpassword');
				if ($confirmpassword !== $password) {
					$dataTip['msg'] = '两次账号不一致';
					$dataTip['url'] = $_SERVER['HTTP_REFERER'];
					$this->load->view('common/error', $dataTip);
					exit;
				}
			}
			$data['register_ip'] = get_client_ip();
			$data['register_time'] = time();
			$result = $this->admindb->saveAdmin($data);
			if ($result) {
			    if($data['id']){
			        $remark = '修改管理员信息：管理员ID'.$data['id'];
                }else{
                    $remark = '创建管理员：管理员ID'.$result;
                }
                $this->createAdminLog($remark);
				redirect('manager/admin');
			} else {
				$data['msg'] = '保存管理员失败';
				$data['url'] = $_SERVER['HTTP_REFERER'];
				$this->load->view('common/error', $data);
			}
		}
	}

	/**
	 * 删除管理员
	 */
	public function delAdmin(){
		if(IS_AJAX){
			$id = $this->input->post('id');
			$result = $this->admindb->delAdminById($id);
			if($result) {
                $this->createAdminLog('删除管理员：管理员ID'.$id);
				$data = array(
					'info' => 1,
					'tip' => '操作成功'
				);
			}else{
				$data = array(
					'info' => 0,
					'tip' => '操作失败'
				);
			}
			echo json_encode($data);
		}
	}

	/**
	 * 管理员权限管理
	 */
	public function priv(){
		$adminPriv = $this->adminprivdb->getAllPriv();
		foreach($adminPriv as $k=>$v){
			$privid = $v['privid'];
			$adminPriv[$k]['id'] = $privid;
		}
		$priv = formatTreeLevel($adminPriv,0);
		$showpriv = array_multi2single($priv);
		$this->load->vars('showpriv',$showpriv);
		$this->load->view('manager/priv');
	}

	/**
	 * 创建权限节点
	 */
	public function addPriv(){
		//权限节点列表
		$privs =$this->adminprivdb->getAllPriv();
		foreach($privs as $k=>$v){
			$privid = $v['privid'];
			$privs[$k]['id'] = $privid;
		}
		$showpriv = formatTreeLevel($privs,0);
		$showprivs = array_multi2single($showpriv);
		$this->load->vars('privs',$showprivs);
		$this->load->view('manager/privAdd');
	}

	/**
    * 保存权限节点
    */
	public function savePriv(){
		if(IS_POST){
			$savedata['privid'] = $this->input->post('privid');
			$savedata['parentid'] = $this->input->post('parentid');
			$savedata['name'] = $this->input->post('name');
			$savedata['c'] = $this->input->post('c');
			$savedata['a'] = $this->input->post('a');
			$savedata['data'] = $this->input->post('data');
			$savedata['style'] = $this->input->post('style');
			$result = $this->adminprivdb->savePriv($savedata);
			if($result){
                if($savedata['privid']){
                    $remark = '修改节点信息：节点ID'.$savedata['privid'];
                }else{
                    $remark = '创建节点：节点ID'.$result;
                }
                $this->createAdminLog($remark);
				redirect('manager/priv');
			}else{
				$data['msg'] = '保存节点失败';
				$data['url'] = $_SERVER['HTTP_REFERER'];
				$this -> load -> view('common/error', $data);
			}
		}
	}

	/**
	 * 编辑权限节点
	 */
	public function editPriv(){
		$privid = $this->input->get('privid');
		$PrivInfo =$this->adminprivdb->getPrivById($privid);
		if(!empty($PrivInfo)){
			$privs =$this->adminprivdb->getAllPriv();
			foreach($privs as $k=>$v){
				$privid = $v['privid'];
				$privs[$k]['id'] = $privid;
			}
			$showpriv = formatTreeLevel($privs,0);
			$showprivs = array_multi2single($showpriv);
			$this->load->vars('privs',$showprivs);
			$this->load->view('manager/privEdit',$PrivInfo);
		}else{
			$dataTip['msg'] = '传递参数错误';
			$dataTip['url'] = $_SERVER['HTTP_REFERER'];
			$this->load->view('common/error', $dataTip);
		}
	}

	/**
     * 删除权限节点
     */
	public function delPriv(){
		if(IS_AJAX){
			$privid = $this->input->post('privid');
			//首先判断一下，该节点是否有下级节点
			$childPriv = $this->adminprivdb->getChildPrivById($privid);
			if(!empty($childPriv)){
				$data = array(
					'info' => 0,
					'tip' => '该节点下有子节点不可删除'
				);
			}else{
				$result = $this->adminprivdb->delPrivById($privid);
				if($result){
                    $this->createAdminLog('删除节点：节点ID'.$privid);
					$data = array(
						'info' => 1,
						'tip' => '操作成功'
					);
					$this->adminroleprivdb->delRolePrivByPrivid($privid);
				}else{
					$data = array(
						'info' => 0,
						'tip' => '操作失败'
					);
				}
			}
			echo json_encode($data);
		}
	}

	/**
     * 角色分配权限
     */
	public function assignPriv(){
		$roleid = $this->input->get('roleid');
		if(IS_POST){
			//首先删除当前角色的所有权限节点
			$result = $this->adminroleprivdb->delRolePrivByRoleid($roleid);
			if($result){
				//插入所有选择的权限节点
				$privids = $this->input->post();
				if(isset($privids['privid']) && !empty($privids['privid'])){
					foreach($privids['privid'] as $k=>$v){
						$savedata[$k]['roleid'] = $roleid;
						$savedata[$k]['privid'] = $v;
					}
					//批量添加角色的权限节点
					$result = $this->adminroleprivdb->batchInsertRolePriv($savedata);
					if(!$result){
						$dataTip['msg'] = '更新权限失败';
						$dataTip['url'] = $_SERVER['HTTP_REFERER'];
						$this->load->view('common/error', $dataTip);
						exit;
					}
				}
				redirect("manager/assignPriv?roleid=$roleid");
			}else{
				$dataTip['msg'] = '更新权限失败';
				$dataTip['url'] = $_SERVER['HTTP_REFERER'];
				$this->load->view('common/error', $dataTip);
				exit;
			}
		}else{
			//系统权限节点
			$privs =$this->adminprivdb->getAllPriv();
			foreach($privs as $k=>$v){
				$privid = $v['privid'];
				$privs[$k]['id'] = $privid;
			}
			$showpriv = formatTreeLevel($privs,0);
			$showprivs = array_multi2single($showpriv);
			$this->load->vars('privs',$showprivs);
			//当前角色的权限
			$nowPriv = $this->adminroleprivdb->getRolePrivByRoleid($roleid);
			if(!empty($nowPriv)){
				foreach($nowPriv as $k=>$v){
					$showNowPriv[] = $v['privid'];
				}
				$this->load->vars('nowPriv',$showNowPriv);
			}
			$this->load->view('manager/privAssign');
		}
	}
}
