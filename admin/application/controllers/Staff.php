<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends MY_Controller {

	private $staffdb;

	private $staffroledb;

	public function __construct() {
        parent::__construct();
        // 初始化数据库连接
        $this->staffmaster=$this -> load -> database('crm_master',true);
        $this->staffslave=$this -> load -> database('crm_slave',true);
        // 加载职员表staff
        $this->load->model('Staffmodel');
        $this->staffdb = $this->Staffmodel;
        // 加载职员角色表
        $this->load->model('StaffRolemodel');
        $this->staffroledb = $this->StaffRolemodel;
	}

	public function index() {
		//所有职员表名
		$membersTables = $this->staffdb->getSstaffTables();
		if(!empty($membersTables)){
			$this->load->vars('membersTables',$membersTables);
		}
		if($this->input->post('dosearch')){
			$tablename = $this->input->post('tablename');
//			$type = $this->input->post('type');
			$searchtype = $this->input->post('searchtype');
			$searchtext = trim($this->input->post('searchtext'));
		}else{
			$tablename = $this->input->get('tablename');
//			$type = $this->input->get('type');
			$searchtype = $this->input->get('searchtype');
			$searchtext = trim($this->input->get('searchtext'));
		}
		$tablename = isset($tablename) && !empty($tablename) ? $tablename : $membersTables[0]['TABLE_NAME'];
		$parameter['tablename'] = $tablename;
		$this->load->vars('searchtable',$tablename);
		$data['where'] = array();
		if(!empty($searchtext)){//如果搜索内容不为空
			switch($searchtype){
				case 1://按照账号搜索
					$data['like'] = array('username'=>$searchtext);
					break;
				case 2://按照真实姓名搜索
					$data['like'] = array('realname'=>$searchtext);
					break;
				case 3://按照手机号搜索
					$data['like'] = array('mobile'=>$searchtext);
					break;
				case 4://按照邮箱搜索
					$data['like'] = array('shopid'=>$searchtext);
					break;
			}
			$this->load->vars('searchtype',$searchtype);
			$this->load->vars('searchtext',$searchtext);
			$parameter['searchtype'] = $searchtype;
			$parameter['searchtext'] = $searchtext;
		}
        //职员信息
//                $data['where'] = array('type'=>$type);
        $data['order'] = "userid DESC";
        $data['limit'] = PAGESIZE;
        $page = $this->input->get('page');
        $currentPage = $page = isset($page) ? intval($page) : 1;
        $offset = ($page - 1) * PAGESIZE;
        $data['offset'] = $offset;
        $result = $this -> staffdb -> stafflist($tablename,$data);
        $this -> load -> library('Page');
        $pageObject = new Page($result['total'], PAGESIZE, $currentPage,$parameter);
        $pageObject -> setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $pages = $pageObject -> show();
        $dataShow = array('pages' => $pages, 'datas' => $result['rows']);
        $this->load->view('staff/seller',$dataShow);
		
	}
        
    /**
     * 添加职员
     */
    public function addStaff(){
            $this->load->view('staff/addstaff');
    }

    /**
     * 编辑会员信息
     */
	public function editStaff(){
		$userid = $this->input->get('userid');
		$userInfo = $this->staffdb->getStaffInfoByUserid($userid);
		if(!empty($userInfo)){
            $this->load->view('staff/addstaff',$userInfo);
		}else{
            $data['msg'] = '传递参数错误';
            $data['url'] = $_SERVER['HTTP_REFERER'];
            $this -> load -> view('common/error', $data);
		}

	}
        
//        public function AjaxSearchStaf(){
//            if(IS_AJAX){
//                $field = $this->input->post('field');
//                $value = $this->input->post('value');
//            }else{
//                echo json_encode(array('info'=>0,'tip'=>'非法访问!'));
//                return;
//            }
//        }
        
        /**
         * 添加或者更新职员信息
         */
        public function saveStaff(){
                $type = empty($this->input->post('type')) ? 0 : $this->input->post('type'); // 1:编辑,0:新增
                // 店铺id
                $saveData['shopid'] = $this->input->post('shopid');
                if(empty($saveData['shopid'])){
                    $result = array('info'=>0,'tip'=>'商铺id值无效!');
                    echo json_encode($result);return;
                }
                // 职员id
                if($type && empty($this->input->post('userid'))){
                    $result = array('info'=>0,'tip'=>'无效职员信息!');
                    echo json_encode($result);return;
                }
                if(!empty($this->input->post('userid'))){
                    $saveData['userid'] = $this->input->post('userid');
                }
                // 职员账号
                $saveData['username'] = $this->input->post('username');
                if(!isset($saveData['username']) || empty($saveData['username'])){
                    $result = array('info'=>0,'tip'=>'职员账号无效');
                    echo json_encode($result);return;
                }
                // 检查职员账号是否存在
                $rst = $this->staffdb->getStaffInfoBySearchFields(['username'=>'=\''.$saveData['username'].'\''],true);
                if(!empty($rst[0]['userid']) && (!$type || ($type && $rst[0]['userid'] != $saveData['userid']))){
                    $result = array('info'=>0,'tip'=>'该职员账号已存在');
                    echo json_encode($result);return;
                }
                // 职员姓名
                $saveData['realname'] = empty($this->input->post('realname')) ?  '' : $this->input->post('realname');
                // 性别处理
                $saveData['sex'] = empty($this->input->post('sex')) ? 0 : $this->input->post('sex');
                // 处理手机号
                $saveData['mobile'] = $this->input->post('mobile');
                if(!isset($saveData['mobile']) || !checkTel($saveData['mobile'])){
                    $result = array('info'=>0,'tip'=>'登录手机号无效!');
                    echo json_encode($result);return;
                }
                // 密码
                if(!$type && empty($this->input->post('password'))){
                    $result = array('info'=>0,'tip'=>'密码值无效!');
                    echo json_encode($result);return;
                }
                if(!empty($this->input->post('password'))){
                    $saveData['encrypt'] = random(6,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
                    $saveData['password'] = md5(md5($this->input->post('password')).$saveData['encrypt']);
                }
                $saveData['email'] = empty($this->input->post('email')) ? '': $this->input->post('email');
                if(!$type){
                    $saveData['addtime'] = date('Y-m-d H:i:s', time());
                }
                $result = $this->staffdb->saveSstaff($saveData);
                if($result){
                    $result = array('info'=>1,'tip'=>$type ? '职员更新成功！' : '添加职员成功!');
                }else{
                    $result = array('info'=>0,'tip'=>$type ? '职员更新失败！' : '添加职员失败!');
                }
                echo json_encode($result);
                return;
        }
        
	/*
	 * 查看职员信息
	 */
	public function detailSstaff(){
		$userid = $this->input->get('userid');
		//首先得到会员信息
		$userInfo = $this->membersdb->getMemberInfoByUserid($userid);
		if(!empty($userInfo)){
			//得到会员的头像
			//首先判断会员头像是否存在
			if(file_exists($this->config->item('members_avatar_path').$userid.'/origin.jpg')){
				$userInfo['avatar'] = $this->config->item('members_avatar_url').$userid.'/origin.jpg';
			}else{
				$userInfo['avatar'] = STATIC_PATH.'dist/img/nophoto.gif';
			}
			$this->load->vars('userInfo',$userInfo);
			if($userInfo['type'] == 1){
				//买家
				$this->load->view('members/userDetail');
			}elseif($userInfo['type'] == 2){
				//商铺
				$this->load->view('members/sellerDetail');
			}
		}
	}
        
	/*
	 * 锁定会员
	 */
	public function updateStaff(){
		if(IS_AJAX){
			$tablename = $this->input->post('tablename');//会员userids
            if(empty($tablename)){
                $tablename = 'members1';
            }
			$userids = $this->input->post('userids');//会员userids
			$type = $this->input->post('type');//更新类型
			$value = $this->input->post('value');//更新的数值
			$userids_array = explode(',',$userids);
			if(is_array($userids_array)){
				$saveData = array();
				foreach($userids_array as $v){
					$saveData[] = array(
						'userid'=>$v,
						$type=>$value
					);
				}
				$result = $this->membersdb->batchUpdateSstaffByWhere($tablename,$saveData,'userid');
                        // 下架所有该店铺商品
                        if($value){
                            $this->load->model('Goodsmodel');
                            $this->Goodsmodel->setShoperGoodsDownLine($userids,0);
                        }
				if($result){
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
			}else{
				$data = array(
					'info' => 0,
					'tip' => '传递参数错误'
				);
			}
			echo json_encode($data);
		}
	}
	
	/*
	 * 保存会员信息
	 */
//	public function saveStaff(){
//		if(IS_POST){
//            $type = $this->input->post('type');
//			$saveData['userid'] = $this->input->post('userid');
//			$saveData['type'] = $this->input->post('type');
//			$saveData['username'] = $this->input->post('username');
//			$saveData['realname'] = $this->input->post('realname');
//			$saveData['sex'] = $this->input->post('sex');
//			$saveData['mobile'] = $this->input->post('mobile');
//			$saveData['email'] = $this->input->post('email');
//            if($type == 2){
//                $saveData['sort'] = $this->input->post('sort');
//            }
//			$password = $this->input->post('password');
//			if($password){
//				$saveData['encrypt'] = random(6,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
//				$saveData['password'] = md5(md5($password).$saveData['encrypt']);
//			}
//			$result = $this->membersdb->saveSstaff($saveData);
//			if($result){
//                if($type == 2){
//                    $data['starid'] = $this->input->post('star');
//                    $usrid = $this->input->post('userid');
//                    if(isset($data['starid']) && !empty($data['starid'])){
//                        $updateprofile = $this->membersdb->updateprofile($usrid,$data);
//                        if($updateprofile){
//                            redirect('members/index?type='.$saveData['type']);
//                        }else{
//                            $data['msg'] = '保存商铺扩展信息失败!';
//                            $data['url'] = $_SERVER['HTTP_REFERER'];
//                            $this -> load -> view('common/error', $data);
//                        }
//                    }
//                }else{
//                    redirect('members/index?type='.$saveData['type']);
//                }
//			}else{
//				$data['msg'] = '保存会员信息失败!';
//				$data['url'] = $_SERVER['HTTP_REFERER'];
//				$this -> load -> view('common/error', $data);
//			}
//		}
//	}
	/*
	 * 商铺星际管理
	 */
	public function star(){
		$data['order'] = "starid ASC";
		$data['limit'] = PAGESIZE;
		$page = $this->input->get('page');
		$currentPage = $page = isset($page) ? intval($page) : 1;
		$offset = ($page - 1) * PAGESIZE;
		$data['offset'] = $offset;
		$result = $this -> stardb -> starlist($data);
		$this -> load -> library('Page');
		$pageObject = new Page($result['total'], PAGESIZE, $currentPage);
		$pageObject -> setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$pages = $pageObject -> show();
		$dataShow = array('pages' => $pages, 'datas' => $result['rows']);
		$this -> load -> view('members/star', $dataShow);
	}
	/*
	 * 添加商铺星级
	 */
	public function addStar(){
		$this->load->view('members/starAdd');
	}
	/*
	 * 商铺刑警编辑
	 */
	public function editStar(){
		$starid = $this->input->get('starid');
		$starInfo = $this->stardb->getStarById($starid);
		if(!empty($starInfo)){
			$this->load->vars('starInfo',$starInfo);
			$this->load->view('members/starEdit');
		}else{
			$dataTip['msg'] = '传递参数错误';
			$dataTip['url'] = $_SERVER['HTTP_REFERER'];
			$this->load->view('common/error', $dataTip);
		}
	}

	/*
     * 保存商铺星级
     */
	public function saveStar()
	{
		if (IS_POST) {
			$saveData['starid'] = $this->input->post('starid');
			$saveData['starname'] = $this->input->post('starname');
			$saveData['low'] = $this->input->post('low');
			$saveData['high'] = $this->input->post('high');
			$saveData['price'] = $this->input->post('price');
			$result = $this->stardb->saveStar($saveData);
			if ($result) {
				redirect('members/star');
			} else {
				$data['msg'] = '保存管理员失败';
				$data['url'] = $_SERVER['HTTP_REFERER'];
				$this->load->view('common/error', $data);
			}
		}
	}
	/*
	 * 删除商铺星级
	 */
	public function delStar(){
		if(IS_AJAX){
			$starid = $this->input->post('starid');
			$result = $this->stardb->delStarById($starid);
			if($result) {
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
	//商铺入驻申请
	public function applyseller(){
		if($this->input->post('dosearch')){
			$authority = $this->input->post('authority');
		}else{
			$authority = $this->input->get('authority');
		}
		if(isset($authority) && !empty($authority)){
			$parameter['authority'] = $authority;
			$this->load->vars('authority',$authority);
			$data['where'] = array('authority'=>$authority);
		}
		$data['order'] = "add_time DESC";
		$data['limit'] = PAGESIZE;
		$page = $this->input->get('page');
		$currentPage = $page = isset($page) ? intval($page) : 1;
		$offset = ($page - 1) * PAGESIZE;
		$data['offset'] = $offset;
		$result = $this -> membersdb -> sellerProfileList($data);
		foreach($result['rows'] as $k=>$v){
			//得到商铺的经验值
			$memberInfo = $this->membersdb->getMemberInfoByUserid($v['userid']);
			if(!empty($memberInfo)){
				$result['rows'][$k]['username'] = $memberInfo['username'];
			}
		}
		$this -> load -> library('Page');
		if(isset($parameter)){
			$pageObject = new Page($result['total'], PAGESIZE, $currentPage,$parameter);
		}else{
			$pageObject = new Page($result['total'], PAGESIZE, $currentPage);
		}
		$pageObject -> setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$pages = $pageObject -> show();
		$dataShow = array('pages' => $pages, 'datas' => $result['rows']);
		$this->load->view('members/applyseller',$dataShow);
	}
	//批量更新申请入驻商铺状态
	public function batchUpdatesellerProfile(){
		if(IS_AJAX){
			$ids = $this->input->post('ids');//文章ids
			$ids_array = explode(',',$ids);
			$authority = $this->input->post('authority');
			if(is_array($ids_array)){
				$userType = 0;
				$updateData = array();
				foreach($ids_array as $k=>$v){
					$updateData[$k]['userid'] = $v;
					$updateData[$k]['authority'] = $authority;
					//改变会员表中的会员类型
					if($authority == 0 || $authority == 1){//认证失败
						$userType = 1;
						$updateData[$k]['starid'] = 0;
						$updateData[$k]['experience'] = 0;
					}
					if($authority == 2){//通过认证
						$userType = 2;
						$updateData[$k]['starid'] = 1;
						$updateData[$k]['experience'] = 0;
					}
					$this->membersdb->updateMemberInfo(array('userid'=>$v,'type'=>$userType));
				}
				$whereKey = 'userid';
				$result = $this->membersdb->batchUpdatesellerProfile($updateData,$whereKey);
				if($result){
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
			}else{
				$data = array(
					'info' => 0,
					'tip' => '传递参数错误'
				);
			}
			echo json_encode($data);
		}
	}
	//申请入驻商铺资料详情
	public function applysellerDetail(){
		$userid = $this->input->get('userid');
		$userInfo = $this->membersdb->getMemberInfoByUserid($userid);
		if(!empty($userInfo)){
			if(file_exists($this->config->item('members_avatar_path').$userid.'/origin.jpg')){
				$userInfo['avatar'] = $this->config->item('members_avatar_url').$userid.'/origin.jpg';
			}else{
				$userInfo['avatar'] = STATIC_PATH.'dist/img/nophoto.gif';
			}
			//扩展表中信息
			$profileInfo = $this->membersdb->getsellerProfileByUserId($userid);
			//上传的身份证信息
			//1、身份证正面照
			if(file_exists($this->config->item('seller_identity_path').$userid.'/identity_image1.jpg')){
				$idnoPhoto['photo1'] = $this->config->item('seller_identity_url').$userid.'/identity_image1.jpg';
			}else{
				$idnoPhoto['photo1'] = STATIC_PATH.'dist/img/zixunshiruzhusfe1.jpg';
			}
			//2、身份证反面照
			if(file_exists($this->config->item('seller_identity_path').$userid.'/identity_image2.jpg')){
				$idnoPhoto['photo2'] = $this->config->item('seller_identity_url').$userid.'/identity_image2.jpg';
			}else{
				$idnoPhoto['photo2'] = STATIC_PATH.'dist/img/zixunshiruzhusfe2.jpg';
			}
			//3、身份证半身照
			if(file_exists($this->config->item('seller_identity_path').$userid.'/identity_image3.jpg')){
				$idnoPhoto['photo3'] = $this->config->item('seller_identity_url').$userid.'/identity_image3.jpg';
			}else{
				$idnoPhoto['photo3'] = STATIC_PATH.'dist/img/zixunshiruzhusfe3.jpg';
			}
			//调用第一条证书记录，就是第一次申请的时候填写的
			$certificate = $this->certificatedb->getTheFirstCertificateByUserid($userid);
			if(!empty($certificate)){
				if(file_exists($this->config->item('seller_certificate_path').$userid.'/'.$certificate['image'])){
					$certificate['image'] = $this->config->item('seller_certificate_url').$userid.'/'.$certificate['image'];
				}else{
					$certificate['image'] = STATIC_PATH.'dist/img/zixunszhengs.jpg';
				}
				$this->load->vars('certificate',$certificate);
			}
			$this->load->vars('idnoPhoto',$idnoPhoto);
			$this->load->vars('profileInfo',$profileInfo);
			$this->load->vars('userInfo',$userInfo);
			$this->load->view('members/applysellerDetail');
		}
	}
	//证书审核
	public function certificate(){
		if($this->input->post('dosearch')){
			$authority = $this->input->post('authority');
		}else{
			$authority = $this->input->get('authority');
		}
		//$data['where']['type'] = 0;
		if(isset($authority) && $authority != 3){
			$parameter['authority'] = $authority;
			$this->load->vars('authority',$authority);
			$data['where']['authority'] = $authority;
		}
		$data['order'] = "add_time DESC";
		$data['limit'] = PAGESIZE;
		$page = $this->input->get('page');
		$currentPage = $page = isset($page) ? intval($page) : 1;
		$offset = ($page - 1) * PAGESIZE;
		$data['offset'] = $offset;
		$result = $this -> certificatedb -> certificateList($data);
		foreach($result['rows'] as $k=>$v){
			//得到商铺的经验值
			$memberInfo = $this->membersdb->getMemberInfoByUserid($v['userid']);
			if(!empty($memberInfo)){
				$result['rows'][$k]['username'] = $memberInfo['username'];
			}
		}
		$this -> load -> library('Page');
		if(isset($parameter)){
			$pageObject = new Page($result['total'], PAGESIZE, $currentPage,$parameter);
		}else{
			$pageObject = new Page($result['total'], PAGESIZE, $currentPage);
		}
		$pageObject -> setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$pages = $pageObject -> show();
		$dataShow = array('pages' => $pages, 'datas' => $result['rows']);
		$this->load->view('members/certificate',$dataShow);
	}
	//批量更新证书的状态
	public function batchUpdatecertificate(){
		if(IS_AJAX){
			$ids = $this->input->post('ids');//文章ids
			$ids_array = explode(',',$ids);
			$authority = $this->input->post('authority');
			if(is_array($ids_array)){
				$updateData = array();
				foreach($ids_array as $k=>$v){
					$updateData[$k]['id'] = $v;
					$updateData[$k]['authority'] = $authority;
				}
				$whereKey = 'id';
				$result = $this->certificatedb->batchUpdatecertificate($updateData,$whereKey);
				if($result){
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
			}else{
				$data = array(
					'info' => 0,
					'tip' => '传递参数错误'
				);
			}
			echo json_encode($data);
		}
	}
	//证书详情页面
	public function certificateDetail(){
		$id = $this->input->get('id');
		$certificateInfo = $this->certificatedb->getCertificateById($id);
		if(!empty($certificateInfo)){
			if(file_exists($this->config->item('seller_certificate_path').$certificateInfo['userid'].'/'.$certificateInfo['image'])){
				$certificateInfo['image'] = $this->config->item('seller_certificate_url').$certificateInfo['userid'].'/'.$certificateInfo['image'];
			}else{
				$certificateInfo['image'] = STATIC_PATH.'dist/img/zixunszhengs.jpg';
			}
			$memberInfo = $this->membersdb->getMemberInfoByUserid($certificateInfo['userid']);
			$this->load->vars('memberInfo',$memberInfo);
			$this->load->vars('certificateInfo',$certificateInfo);
			$this->load->view('members/certificateDetail');
		}
	}
	//更新证书
	public function updateCertificate(){
		if(IS_AJAX){
			$data[0]['id'] = $this->input->post('id');
			$data[0]['authority'] = $this->input->post('authority');
			$data[0]['refuse_desc'] = $this->input->post('refuse_desc');
			$key = 'id';
			if($this->certificatedb->batchUpdatecertificate($data,$key)){
				$result = array('info'=>1,'hrefUrl'=>site_url('members/certificate'));
			}else{
				$result = array('info'=>0,'tip'=>'更新证书失败');
			}
			echo json_encode($result);
		}
	}

    

    


}
