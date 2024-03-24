<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public $data = array();

	public function __construct() {

		parent::__construct();
        date_default_timezone_set('Asia/Shanghai');
        $this->load->helper('url');
        $this->load->helper('self');
        $this->load->helper('function');//加载自定义辅助函数
		$this->load->model('Ad');
		$this->load->model('Category');
		$this->load->model('Member');

        $this->load->config('system');

		$this->data['ad_list'] = $this->Ad->getListBySid(9);
		$category = $this->Category->topCategory();
		foreach ($category as $key => $value){
            $category[$key]['s_list'] = $this->Category->getCategoryByPid($value['cat_id']);
            foreach ($category[$key]['s_list'] as $k => $v){
                $category[$key]['s_list'][$k]['t_list'] = $this->Category->getCategoryByPid($v['cat_id']);
            }
        }

        //默认不是首页
        $this->data['isIndex'] = 0;
        $this->data['category_list'] = $category;

        //自动登录
        if(!isset($_SESSION['user']) || empty($_SESSION['user'])){
            $this->autologin();
        }
	}

    protected function showError($url,$time=3,$message='参数错误',$code=500)
    {
        $url = site_url($url);
        include './application/views/error.php';
    }


    /**
     * 获取唯一标识
     * @return string
     */
    protected static function uuid()
    {
        return sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x', mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0x0fff) | 0x4000, mt_rand(0, 0x3fff) | 0x8000, mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

    /**
     * 保持用户登录
     * @return boolean
     */
    protected function keepLogin($user_info,$keeptime = 0)
    {
        if ($keeptime && !empty($user_info)) {
            $expiretime = time() + $keeptime;
            $key = md5(md5($user_info['userid']) . md5($keeptime) . md5($expiretime) . $user_info['login_token']);
            $data = [$user_info['userid'], $keeptime, $expiretime, $key];
            setcookie('keeplogin',implode('|', $data), time() + $keeptime,'/');
            return true;
        }
        return false;
    }

    /**
     * 自动登录
     * @return boolean
     */
    protected function autologin()
    {
        $keeplogin = isset($_COOKIE['keeplogin']) ? $_COOKIE['keeplogin'] : null;
        if (!$keeplogin) {
            return false;
        }

        list($id, $keeptime, $expiretime, $key) = explode('|', $keeplogin);

        if ($id && $keeptime && $expiretime && $key && $expiretime > time()) {
            $user = $this->Member->getUserInfo($id);
            if (!$user || !$user['login_token']) {
                return false;
            }
            //token有变更
            if ($key != md5(md5($id) . md5($keeptime) . md5($expiretime) . $user['login_token'])) {
                return false;
            }

            $_SESSION['user'] = $user;

            //刷新自动登录的时效
            $this->keeplogin($keeptime);
            return true;
        } else {
            return false;
        }

    }

}