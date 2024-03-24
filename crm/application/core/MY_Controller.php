<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    
        protected $qirelationmodel;

	public function __construct() {
		parent::__construct();
        // 初始化基本库数据库连接
        $this->master = $this -> load -> database('master',true);
        $this->slave = $this -> load -> database('slave',true);
        // 职员管理库数据连接
        $this->crmmaster = $this -> load -> database('crm_master',true);
        $this->crmslave = $this -> load -> database('crm_slave',true);
        //日志模型加载
        $this->load->model('Logmodel');
            
		date_default_timezone_set('Asia/Shanghai');
		$this->load->helper('url');//加载URL 辅助函数
		$this->load->helper('function');//加载自定义辅助函数
		$this->load->config('system');//加载系统配置文件

		define('CRM_STATIC_PATH', $this->config->item('crm_static_path'));
		define('PAGESIZE',$this->config->item('pagesize'));
		define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
		define("IS_POST", strtolower($_SERVER['REQUEST_METHOD']) == 'post');

		//$this->load->library('session');//初始化session类

		self::check_login();//验证是否登陆
	}

	//判断用户是否登陆函数
	final public function check_login(){
            $route_url = $this->uri->uri_string();
            if (($route_url == 'index/login') || ($route_url == 'index/getVerify')) {
                return true;
            } else {
                if (!isset($_SESSION['userid']) && !isset($_SESSION['username']) && !isset($_SESSION['roleid'])) {
                    redirect('index/login');
                }else{
                    if(file_exists($this->config->item('staff_avatar_path').$_SESSION['userid'].'/avatar.png')){
                        $staffAvatar = $this->config->item('staff_avatar_url').$_SESSION['userid'].'/avatar.png';
                    }else{
                        $staffAvatar = CRM_STATIC_PATH.'dist/img/nophoto.gif';
                    }
                    $this->load->vars('staffAvatar', $staffAvatar);
                    }
            }
	}

	//创建日志操作记录
    final public function log_insert($action)
    {
        //补全数据
        $data['createtime'] = time();
        $data['ip'] = get_client_ip();
        $data['staff_id'] = $_SESSION['userid'];
        $data['staff_name'] = $_SESSION['username'];

        $con = $this->router->fetch_class();//获取控制器名
        $func = $this->router->fetch_method();//获取方法名
        $data['url'] = $con . '/' . $func;
        $data['remark'] = $action;
        $this->Logmodel->createLogs($data);
    }
}