<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends MY_Controller {

	private $membersdb;
        private $staffdb;
        private $companysellerbranddb;
        public  $staffmaster;
        public $staffroledb;

	public function __construct() {
		parent::__construct();
                // 职员数据库连接
                $this->crmmaster =$this -> load -> database('crm_master',true);
                $this->crmslave =$this -> load -> database('crm_slave',true);
                
		$this -> load -> model('Membersmodel');
		$this -> membersdb = $this->Membersmodel;
                // 加载职员表staff
                $this->load->model('Staffmodel');
                $this->staffdb = $this->Staffmodel;
                // 供货商品牌对应关系数据模型staff
                $this->load->model('SupplierBrandmodel');
                $this->companysellerbranddb = $this->SupplierBrandmodel;
                
                $this->load->model('StaffRolemodel');
		$this->staffroledb = $this->StaffRolemodel;
	}

	public function index() {
            //所有会员表名
            $membersTables = $this->membersdb->getMembersTables();
            if(!empty($membersTables)){
                $this->load->vars('membersTables',$membersTables);
            }
            if($this->input->post('dosearch')){
                $tablename = $this->input->post('tablename');
                $type = ($this->input->post('type') ==2) ? $this->input->post('type') : 2;
                $searchtype = $this->input->post('searchtype');
                $searchtext = trim($this->input->post('searchtext'));
            }else{
                $tablename = $this->input->get('tablename');
                $type = ($this->input->get('type') ==2) ? $this->input->get('type') : 2;
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
                    case 4://按照所属卖家信息搜索
                        $maijiaxinxi = $this->membersdb->getMembersInfoBySearchFields(['realname'=>'like \'%'.$searchtext.'%\'','issuppliers'=>'!=1'],true);
                        $data['sellerid'] = ' IN ('. implode(',', array_column($maijiaxinxi, 'userid')).') ';
                        break;
                }
                $this->load->vars('searchtype',$searchtype);
                $this->load->vars('searchtext',$searchtext);
                $parameter['searchtype'] = $searchtype;
                $parameter['searchtext'] = $searchtext;
            }
            $this->load->vars('type',$type);
            $parameter['type'] = $type;
            //买家用户
            $data['where'] = array('type'=>$type);
            $data['order'] = "userid DESC";
            $data['limit'] = PAGESIZE;
            $page = $this->input->get('page');
            $currentPage = $page = isset($page) ? intval($page) : 1;
            $offset = ($page - 1) * PAGESIZE;
            $data['offset'] = $offset;
            $result = $this -> membersdb -> getSupplierList($tablename,$data);
            $this -> load -> library('Page');
            $pageObject = new Page($result['total'], PAGESIZE, $currentPage,$parameter);
            $pageObject -> setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
            $pages = $pageObject -> show();
            $dataShow = array('pages' => $pages, 'datas' => $result['rows'],'supplier'=>$result['supplier']);
            $this->load->view('supplier/index',$dataShow);
	}
        
        /*
        *编辑供货商
        */
        public function edit(){
            $this->load->vars('type',1);
            if(!empty($this->input->get('sbid')) && is_numeric($this->input->get('sbid'))){
                $data = $this -> companysellerbranddb -> getSupplierInfoBySSBId($this->input->get('sbid'));
                $this->load->vars('data',$data);
                $this->load->view('supplier/add');
            }
        }
        
        /*
        *添加供货商
        */
        public function add(){
            $this->load->vars('type',0);
            $this->load->view('supplier/add');
        }

        public function save(){
            if(IS_AJAX){
                $type = empty($this->input->post('type')) ? 0 : $this->input->post('type'); // 1:编辑,0:新增
                // 供货商id
                if($type && empty($this->input->post('userid'))){
                    $result = array('info'=>0,'tip'=>'无效供货商信息!');
                    echo json_encode($result);return;
                }
                if(!empty($this->input->post('userid'))){
                    $saveData['userid'] = $this->input->post('userid');
                }
                // 供货商账号
                $saveData['username'] = $this->input->post('username');
                if(!isset($saveData['username']) || empty($saveData['username'])){
                    $result = array('info'=>0,'tip'=>'供货商账号无效');
                    echo json_encode($result);return;
                }
                // 检查供货商账号是否存在
                $rst = $this->membersdb->getMembersInfoBySearchFields(['username'=>'=\''.$saveData['username'].'\''],true);
                if(!empty($rst[0]['userid']) && (!$type || ($type && $rst[0]['userid'] != $saveData['userid']))){
                    $result = array('info'=>0,'tip'=>'供货商账号已存在');
                    echo json_encode($result);return;
                }
                // 供货商姓名
                $saveData['realname'] = empty($this->input->post('realname')) ?  '' : $this->input->post('realname');
                // 性别处理
                $saveData['sex'] = empty($this->input->post('sex')) ? 0 : $this->input->post('sex');
                // 权重
                $saveData['sort'] = empty($this->input->post('sort')) ? 0 : $this->input->post('sort');
                // 供货商标志
                $saveData['issuppliers'] = 1;
                // 处理手机号
                $saveData['mobile'] = $this->input->post('mobile');
                if(!isset($saveData['mobile']) || !checkTel($saveData['mobile'])){
                    $result = array('info'=>0,'tip'=>'登录手机号无效!');
                    echo json_encode($result);return;
                }
                // 处理卖家校验
                if(empty($this->input->post('sellerid')) || !is_numeric($this->input->post('sellerid'))){
                    $result = array('info'=>0,'tip'=>'所属卖家未指定!');
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
                    $saveData['rtype'] = 2;
                    $saveData['type'] = 2;// 供货商类型
                }
                // 品牌检查
                if(empty($this->input->post('brandname'))){
                    $result = array('info'=>0,'tip'=>'品牌信息不能为空');
                    echo json_encode($result);return;
                }
                // 开启事务
                $this->master->trans_begin();
                $result = $this->membersdb->saveMembers($saveData);
                if($result){
                    $supplierdata['brandname'] =  $this->input->post('brandname');
                    $supplierdata['parentid'] =  $this->input->post('sellerid'); // 卖家id
                    $supplierdata['shopid'] =  $result; // 供货商id
                    $supplierresult = $this->companysellerbranddb->saveSupplierBrandInfo($supplierdata);
                    if($supplierresult){
                        // 开启crm数据库事务
                        $this->crmmaster->trans_begin();
                        // 写入职员表供货商
                        $staffdata = [];
                        $staffdata['username'] = 'admin';
                        $staffdata['encrypt'] = random(6,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
                        $staffdata['password'] = md5(md5('123456').$staffdata['encrypt']);
                        $staffdata['realname'] = '管理员';
                        $staffdata['register_time'] = time();
                        $staffdata['addtime'] = date('Y-m-d H:i:s',$staffdata['register_time']);
                        $staffdata['shopid'] = $supplierdata['shopid'];
                        $staffdata['isadmin'] =1;
                        // 添加管理员角色权限
                        $staffdata['roleid'] = $this->staffroledb->saveRole(['rolename'=>'CRM商铺管理员','shopid'=>$supplierdata['shopid'],'isshow'=>0,'isadmin'=>1]);
                        if(!$staffdata['roleid']){
                            $this->crmmaster->trans_rollback(); // 回滚
                            $this->master->trans_rollback(); // 回滚
                            $result = array('info'=>0,'tip'=>$type ? '供货商更新失败！' : '添加供货商失败!');
                            echo json_encode($result);
                            return;
                        }
                        $staffresult = $this->staffdb->saveSstaff($staffdata); // 添加职员
                        if(!$staffresult){
                            $this->crmmaster->trans_rollback(); // 回滚
                            $this->master->trans_rollback(); // 回滚
                            $result = array('info'=>0,'tip'=>$type ? '供货商更新失败！' : '添加供货商失败!');
                            echo json_encode($result);
                            return;
                        }
                        $this->crmmaster->trans_commit();
                        $this->master->trans_commit();
                        $result = array('info'=>1,'tip'=>$type ? '供货商更新成功！' : '添加供货商成功!');
                        echo json_encode($result);
                        return;
                    }else{
                        $this->master->trans_rollback();
                        $result = array('info'=>0,'tip'=>$type ? '供货商更新失败！' : '添加供货商失败!');
                        echo json_encode($result);
                        return;
                    }
                }else{
                    $this->master->trans_rollback();
                    $result = array('info'=>0,'tip'=>$type ? '供货商更新失败！' : '添加供货商失败!');
                     echo json_encode($result);
                    return;
                }
            }else{
                echo json_encode(['info'=>0,'tip'=>'非法请求!']);
                return;
            }
        }
        
	/*
	 * 查看会员详情
	 */
	public function detailMembers(){
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
	public function updateMembers(){
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
				$result = $this->membersdb->batchUpdateMembersByWhere($tablename,$saveData,'userid');
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
	 *创建会员
	 */
	public function addMembers(){
		$type = $this->input->get('type');
		$this->load->vars('type',$type);
		$this->load->view('members/membersAdd');
	}
	/*
	 * 编辑会员信息
	 */
	public function editMembers(){
		$userid = $this->input->get('userid');
		$userInfo = $this->membersdb->getMemberInfoByUserid($userid);
		if(!empty($userInfo)){
            if($userInfo['type'] == '2'){
                //获取所有的星级
                $allstars = $this->stardb->getAllStars();
                $this->load->vars('allstars',$allstars);
                //根据userid查询所在的星级
                $profile= $this->membersdb->getStaridByUid($userid);
                if(isset($profile['0']['starid']) && !empty($profile['0']['starid'])){
                    $this->load->vars('starid',$profile['0']['starid']);
                }
            }
			$this->load->view('members/membersEdit',$userInfo);
		}else{
			$data['msg'] = '传递参数错误';
			$data['url'] = $_SERVER['HTTP_REFERER'];
			$this -> load -> view('common/error', $data);
		}

	}
	/*
	 * 保存会员信息
	 */
	public function saveMembers(){
		if(IS_POST){
            $type = $this->input->post('type');
			$saveData['userid'] = $this->input->post('userid');
			$saveData['type'] = $this->input->post('type');
			$saveData['username'] = $this->input->post('username');
			$saveData['realname'] = $this->input->post('realname');
			$saveData['sex'] = $this->input->post('sex');
			$saveData['mobile'] = $this->input->post('mobile');
			$saveData['email'] = $this->input->post('email');
            if($type == 2){
                $saveData['sort'] = $this->input->post('sort');
            }
			$password = $this->input->post('password');
			if($password){
				$saveData['encrypt'] = random(6,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
				$saveData['password'] = md5(md5($password).$saveData['encrypt']);
			}
			$result = $this->membersdb->saveMembers($saveData);
			if($result){
                if($type == 2){
                    $data['starid'] = $this->input->post('star');
                    $usrid = $this->input->post('userid');
                    if(isset($data['starid']) && !empty($data['starid'])){
                        $updateprofile = $this->membersdb->updateprofile($usrid,$data);
                        if($updateprofile){
                            redirect('members/index?type='.$saveData['type']);
                        }else{
                            $data['msg'] = '保存商铺扩展信息失败!';
                            $data['url'] = $_SERVER['HTTP_REFERER'];
                            $this -> load -> view('common/error', $data);
                        }
                    }
                }else{
                    redirect('members/index?type='.$saveData['type']);
                }
			}else{
				$data['msg'] = '保存会员信息失败!';
				$data['url'] = $_SERVER['HTTP_REFERER'];
				$this -> load -> view('common/error', $data);
			}
		}
	}
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
