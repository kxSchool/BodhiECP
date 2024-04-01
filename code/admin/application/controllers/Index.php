<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends MY_Controller {

	private $admindb;
	private $adminroledb;
	private $adminroleprivdb;
	private $adminprivdb;

	public function __construct() {
		parent::__construct();
		$this -> load -> model('Adminmodel');
		$this -> admindb = new Adminmodel();

		$this->load->model('AdminRolemodel');
		$this->adminroledb = new AdminRolemodel();

		$this->load->model('AdminRolePrivmodel');
		$this->adminroleprivdb = new AdminRolePrivmodel();

		$this->load->model('AdminPrivmodel');
		$this->adminprivdb = new AdminPrivmodel();
	}

    /**
     * 控制面板
     */
	public function home() {

	    $this->load->model('Membersmodel');
	    $this->load->model('Ordermodel');
	    //今日注册
        $where = array('register_time >='=>strtotime(date('Y-m-d 00:00:00',time())));
        $this->load->vars('today_register',$this->Membersmodel->userCount($where));
	    //今日登录
        $where = array('login_time >='=>strtotime(date('Y-m-d 00:00:00',time())));
        $this->load->vars('today_login',$this->Membersmodel->userCount($where));
        //总会员数
        $this->load->vars('user_count',$this->Membersmodel->userCount());
        //今日成交量，今日成交额
        $where = array('pay_time >='=>strtotime(date('Y-m-d 00:00:00',time())));
        $order_info = $this->Ordermodel->statsOrderInfo($where);
        $this->load->vars('today_amount',empty($order_info['amount']) ? 0 : $order_info['amount']);
        $this->load->vars('today_count',$order_info['count']);
        //总订单量，总交易额
        $order_info = $this->Ordermodel->statsOrderInfo();
        $this->load->vars('order_amount',empty($order_info['amount']) ? 0 : $order_info['amount']);
        $this->load->vars('order_count',$order_info['count']);
        //待处理订单
        $where = array(
            'order_status' => 1,
            'seller_id' => 0
        );
        $this->load->vars('order_none',$this->Ordermodel->getOrderCount($where));
		$this -> load -> view('index/home');
	}

	/**
	 * 管理员修改编辑个人资料
	 */
	public function profile(){
		if($this->session->has_userdata('id')){
			//管理员信息
			$adminInfo = $this->admindb->getAdminById($this->session->userdata('id'));
			//管理员属于哪个角色
			$roleInfo = $this->adminroledb->getRoleById($adminInfo['roleid']);
			if(!empty($roleInfo)){
				$adminInfo['rolename'] = $roleInfo['rolename'];
			}
			//首先判断一下用户头像是否存在
			if(file_exists($this->config->item('admin_avatar_path').$this->session->userdata('id').'/avatar.png')){
				$adminInfo['avatar'] = $this->config->item('admin_avatar_url').$this->session->userdata('id').'/avatar.png?'.random(6,'0123456789');
			}else{
				$adminInfo['avatar'] = STATIC_PATH.'dist/img/nophoto.gif';
			}
			$this->load->vars('adminInfo',$adminInfo);
			//管理员权限
			$rolePrivs = $this->adminroleprivdb->getRolePrivByRoleid($adminInfo['roleid']);
			if(!empty($rolePrivs)){
				$privs = array();
				foreach($rolePrivs as $v){
					$privs[] = $this->adminprivdb->getPrivById($v['privid']);
				}
				foreach($privs as $k=>$v){
					$privid = $v['privid'];
					$privs[$k]['id'] = $privid;
				}
				$showpriv = formatTreeLevel($privs,0);
				$showprivs = array_multi2single($showpriv);
				$this->load->vars('privs',$showprivs);
			}
			$this->load->view('index/profile');
		}
	}

	/**
	 * 保存个人资料
	 */
	public function saveProfile(){
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
			$result = $this->admindb->saveAdmin($data);
			if ($result) {
			    if($data['id']){
			        $remark = '修改个人信息：管理员ID'.$data['id'];
                }else{
                    $remark = '添加管理员：管理员ID'.$result;
                }
                $this->createAdminLog($remark);
				redirect('index/profile');
			} else {
				$data['msg'] = '保存管理员失败';
				$data['url'] = $_SERVER['HTTP_REFERER'];
				$this->load->view('common/error', $data);
			}
		}
	}

    /**
     * 登陆页面
     */
	public function login() {
		//处理登陆
		if ($this -> input -> post('dosubmit')) {
			$account = $this -> input -> post('account');
			$password = $this -> input -> post('password');
			$verify_code = $this -> input -> post('verify_code');
			if ($this->session->has_userdata('verifyCode') && strtolower($verify_code) == strtolower($this->session->userdata('verifyCode'))) {
				$this->session->unset_userdata('verifyCode');//销毁验证码
				//验证码正确
				$AdminInfo = $this -> admindb -> getAdminByAccount($account);
				if (!empty($AdminInfo)) {
					//账号信息正确，检查一下密码
					if($AdminInfo['password'] == md5($password)){
						//更新一下登陆信息
						$updateData['id'] = $AdminInfo['id'];
						$updateData['login_ip'] = get_client_ip();
						$updateData['login_time'] = time();
						$this->admindb->saveAdmin($updateData);
						$saveSession = array(
							'id'=>$AdminInfo['id'],
							'account'=>$AdminInfo['account'],
							'roleid'=>$AdminInfo['roleid']
						);
						$this->session->set_userdata($saveSession);
						$data['msg'] = '成功登陆！';
						$data['forward'] = 'index/home';
						$data['url'] = site_url($data['forward']);
                        $this->createAdminLog('登录系统：管理员'.$account);

						$this -> load -> view('common/success', $data);
					}else{
						$data['msg'] = '请核对你的密码是否输入正确！';
						$data['forward'] = 'index/login';
						$data['url'] = site_url($data['forward']);
						$this -> load -> view('common/error', $data);
					}
				} else {
					//登陆失败
					$data['msg'] = '请核对你的账号信息是否正确！';
					$data['forward'] = 'index/login';
					$data['url'] = site_url($data['forward']);
					$this -> load -> view('common/error', $data);
				}

			} else {
				//验证码不正确
				$data['msg'] = '验证码输入错误';
				$data['forward'] = 'index/login';
				$data['url'] = site_url($data['forward']);
				$this -> load -> view('common/error', $data);
			}
		} else {
			if (!$this->session->has_userdata('id') && !$this->session->has_userdata('account') && !$this->session->has_userdata('roleid')) {
				$this -> load -> view('index/login');
			} else {
				//已经登陆过了
				$data['msg'] = '你已经成功登陆!';
				$data['forward'] = 'index/home';
				$data['url'] = site_url($data['forward']);
				$this -> load -> view('common/success', $data);
			}
		}
	}

    /**
     * 生成验证码
     */
	public function getVerify() {
		$this->load->library('Verify');
		$checkcode = new Verify();
		$code_len = $this->input->get('code_len');
		if (isset($code_len) && intval($code_len)) $checkcode->code_len = intval($code_len);
		if ($checkcode->code_len > 8 || $checkcode->code_len < 2) {
			$checkcode->code_len = 4;
		}
		$font_size = $this->input->get('font_size');
		if (isset($font_size) && intval($font_size)) $checkcode->font_size = intval($font_size);
		$width = $this->input->get('width');
		if (isset($width) && intval($width)) $checkcode->width = intval($width);
		if ($checkcode->width <= 0) {
			$checkcode->width = 130;
		}
		$height = $this->input->get('height');
		if (isset($height) && intval($height)) $checkcode->height = intval($height);
		if ($checkcode->height <= 0) {
			$checkcode->height = 50;
		}
		$max_width = $checkcode->code_len * 28;
		$max_height = $checkcode->font_size * 2;
		if($checkcode->width > $max_width) $checkcode->width = $max_width;
		if($checkcode->height > $max_height) $checkcode->height = $max_height;
		$font_color = $this->input->get('font_color');
		if (isset($font_color) && trim(urldecode($font_color)) && preg_match('/(^#[a-z0-9]{6}$)/im', trim(urldecode($font_color)))) $checkcode->font_color = trim(urldecode($font_color));
		$background = $this->input->get('background');
		if (isset($background) && trim(urldecode($background)) && preg_match('/(^#[a-z0-9]{6}$)/im', trim(urldecode($background)))) $checkcode->background = trim(urldecode($background));
		$checkcode->doimage();
		$this->session->set_userdata('verifyCode', $checkcode->get_code());
	}

    /**
     * 退出处理
     */
	public function logout() {
        $this->createAdminLog('退出系统：管理员'.$this->session->userdata('account'));
		$array_items = array('id', 'account','roleid');
		$this->session->unset_userdata($array_items);

		$data['msg'] = '退出成功';
		$data['forward'] = 'index/login';
		$data['url'] = site_url($data['forward']);

		$this -> load -> view('common/success', $data);
	}

	/**
     * ajax获取订单年报表
     */
	public function ajaxOrderYearLine()
    {
        if(IS_AJAX){
            $this->load->model('Ordermodel');
            $month = intval(date('m'));
            for($i = 1 ; $i <= $month ; $i ++ ){
                switch ($i){
                    case 1:
                        $title = '一月';
                        break;
                    case 2:
                        $title = '二月';
                        break;
                    case 3:
                        $title = '三月';
                        break;
                    case 4:
                        $title = '四月';
                        break;
                    case 5:
                        $title = '五月';
                        break;
                    case 6:
                        $title = '六月';
                        break;
                    case 7:
                        $title = '七月';
                        break;
                    case 8:
                        $title = '八月';
                        break;
                    case 9:
                        $title = '九月';
                        break;
                    case 10:
                        $title = '十月';
                        break;
                    case 11:
                        $title = '十一月';
                        break;
                    case 12:
                        $title = '十二月';
                        break;
                    default:
                        $title = '其他';
                        break;
                }
                $labels[] = $title;
                $month_arr[] = $i;
            }

            $order = $this->Ordermodel->getOrderMonthCountByType();
            $data = array();
            if(!empty($order)){
                foreach ($order as $key => $value){
                    switch ($value['order_type']){
                        case 1:
                            $color = '#FF0000';
                            $rgb_color = 'rgba(255,0,0,1)';
                            $label = '工商服务';
                            break;
                        case 5:
                            $color = '#EEB422';
                            $rgb_color = 'rgba(238,180,34,0.9)';
                            $label = '财税服务';
                            break;
                        case 9:
                            $color = '#EEEE00';
                            $rgb_color = 'rgba(238,238,0,0.8)';
                            $label = '资质办理';
                            break;
                        case 17:
                            $color = '#8E8E38';
                            $rgb_color = 'rgba(142,142,56,0.8)';
                            $label = '知识产权';
                            break;
                        case 22:
                            $color = '#8B8B7A';
                            $rgb_color = 'rgba(139,139,122,0.8)';
                            $label = '认证服务';
                            break;
                        case 26:
                            $color = '#00BFFF';
                            $rgb_color = 'rgba(0,191,255,0.8)';
                            $label = '法律服务';
                            break;
                        case 30:
                            $color = '#0000CD';
                            $rgb_color = 'rgba(0,0,205,1)';
                            $label = '金融服务';
                            break;
                        case 144:
                            $color = '#7FFFAA';
                            $rgb_color = 'rgba(127,255,170,1)';
                            $label = '套餐服务';
                            break;
                        default:
                            $color = '#000000'; //默认颜色
                            $rgb_color = 'rgba(0,0,0,1)';   //默认RGB色
                            $label = '';
                            break;

                    }
                    $data[$key]['color'] = $color;
                    $data[$key]['rgb_color'] = $rgb_color;
                    $data[$key]['label'] = $label;
                    foreach ($month_arr as $mid => $mvalue){
                        $data[$key]['data'][$mvalue] = 0;
                        if($mvalue == $value['month']){
                            $data[$key]['data'][$mvalue] = $value['count'];
                        }
                    }
                }
            }
            $json = array(
                'labels' => $labels,
                'list' => $data
            );
            echo json_encode($json);exit;
        }
    }

    /**
     * ajax获取饼状图
     */
    public function ajaxOrderYearPie()
    {
        if(IS_AJAX){
            $this->load->model('Ordermodel');

            //获取条件
            $order = $this->Ordermodel->getOrderCountByType();

            $data = array();
            if(!empty($order)){
                foreach ($order as $key => $value){
                    switch ($value['order_type']){
                        case 1:
                            $color = '#FF0000';
                            $label = '工商服务';
                            break;
                        case 5:
                            $color = '#EEB422';
                            $label = '财税服务';
                            break;
                        case 9:
                            $color = '#EEEE00';
                            $label = '资质办理';
                            break;
                        case 17:
                            $color = '#8E8E38';
                            $label = '知识产权';
                            break;
                        case 22:
                            $color = '#8B8B7A';
                            $label = '认证服务';
                            break;
                        case 26:
                            $color = '#00BFFF';
                            $label = '法律服务';
                            break;
                        case 30:
                            $color = '#0000CD';
                            $label = '金融服务';
                            break;
                        case 144:
                            $color = '#7FFFAA';
                            $label = '套餐服务';
                            break;
                        default:
                            $color = '#000000'; //默认颜色
                            $label = '';
                            break;

                    }
                    $data[$key]['color'] = $color;
                    $data[$key]['count'] = $value['count'];
                    $data[$key]['label'] = $label;

                }
            }
            echo json_encode($data);exit;
        }
    }
}
