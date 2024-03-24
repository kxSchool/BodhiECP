<?php
//////////////////////////////////////////////////////////////////////
// 章爱军(永远的大牛)                                               //
// Trial License: For evaluation only!                              //
// (c) 2018, ZhangAijun, http://www.mydeershow.com                  //
//////////////////////////////////////////////////////////////////////
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
                // 获取当前店铺id
                $data['where'] = 'shopid='.$this->session->userdata('shopid').' AND isadmin=0 ';
                
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
        /*
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
        
        /**
         * 添加或者更新职员信息
         */
        public function saveStaff(){
                $type = empty($this->input->post('type')) ? 0 : $this->input->post('type'); // 1:编辑,0:新增
                // 店铺id
                $saveData['shopid'] = $this->session->userdata('shopid') ;
                if(empty($saveData['shopid'])){
                    $result = array('info'=>0,'tip'=>'请重新登录!');
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
                $rst = $this->staffdb->getStaffInfoBySearchFields(['username'=>'=\''.$saveData['username'].'\'','shopid'=>'='.$saveData['shopid']],true);
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
                // 设置职员角色
                $saveData['roleid'] = !empty($this->input->post('roleid')) ? $this->input->post('roleid') : 0;
                if(!$saveData['roleid']){ // 如果角色权限不存在的话新建
                    $saveData['roleid'] = $this->staffroledb->saveRole(['rolename'=>'职员['.$saveData['username'].']权限','shopid'=>$saveData['shopid'],'isshow'=>0]);
                    if(!$saveData['roleid']){
                        $result = array('info'=>0,'tip'=>$type ? '职员更新成功！' : '添加职员成功!');
                        echo json_encode($result);return;
                    }
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


}
