<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

	public function __construct() {
		parent::__construct();
        $this->load->helper('url');
        $this->load->helper('self');
        $this->load->model('Member_model');
        $this->load->config('system');
        date_default_timezone_set('Asia/Shanghai');
        $this->master = $this->load->database('master', TRUE);
        //自动登录
        if(!isset($_SESSION['user']) || empty($_SESSION['user'])){
            $this->autologin();
        }

	}

	protected function showError($url,$time,$message,$code=500)
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
            $user = $this->Member_model->getUserInfo($id);
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

    /*
     * 发送短信
     * @param $phone string 接受短信的手机号
     * @param $code string  随机验证码
     */
    protected function sendSms($phone,$code)
    {

        $this->load->library('signatureHelper');

        $params = array ();

        return $content;

    }

    //检查验证码
    protected function checkCode($phone,$code)
    {
        $result = $this->master->select('code,sendtime')->order_by('sendtime DESC')->where(array('mobile_phone'=>$phone,'stats'=>0))->limit(1)->get('sendsms');
        $result = $result->result_array();
        if(empty($result)){
            return false;
        }
        $sendtime = $result[0]['sendtime'];
        $true_code = $result[0]['code'];
        if($true_code != $code || time() - $sendtime > 86400){
            return false;
        }
        $sms['checktime'] = time();
        $sms['stats'] = 1;
        $this->master->update('sendsms',$sms,array('mobile_phone' => $phone));
        return true;
    }

    //ajax获取短信验证码
    public function ajaxSendSms(){
        if(IS_AJAX){
            $phone = $this->input->post('phone');   //获取手机号
            $sendtype = $this->input->post('type'); //获取短信类型
            $ver_code = randString(4);          //4位随机验证码
            $result = $this->sendSms($phone,$ver_code);

            if($result){

                $data = array(
                    'mobile_phone' => $phone,
                    'sendtime' => time(),
                    'supplier' => '阿里云',
                    'content' => $ver_code,
                    'code' => $ver_code
                );
                if(!empty($sendtype)){
                    $data['sendtype'] = $sendtype;
                }
                $this->master->insert('sendsms',$data);
                echo json_encode(array('code'=>0,'mes'=>'发送成功'));exit;
            }
            echo json_encode(array('code'=>100,'mes'=>'发送失败'));exit;
        }
    }

}