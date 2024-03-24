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

        // *** 需用户填写部分 ***

        // fixme 必填: 请参阅 https://ak-console.aliyun.com/ 取得您的AK信息
        $accessKeyId = "";
        $accessKeySecret = "";

        // fixme 必填: 短信接收号码
//    $params["PhoneNumbers"] = "18621153185";
        $params["PhoneNumbers"] = $phone;

        // fixme 必填: 短信签名，应严格按"签名名称"填写，请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/sign
        $params["SignName"] = "XXXXX";

        // fixme 必填: 短信模板Code，应严格按"模板CODE"填写, 请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/template
        $params["TemplateCode"] = "SMS_136383280";

        // fixme 可选: 设置模板参数, 假如模板中存在变量需要替换则为必填项
        $params['TemplateParam'] = Array (
            "code" => $code
        );

        // fixme 可选: 设置发送短信流水号
        $params['OutId'] = "654321";

        // fixme 可选: 上行短信扩展码, 扩展码字段控制在7位或以下，无特殊需求用户请忽略此字段
        $params['SmsUpExtendCode'] = "1234567";


        // *** 需用户填写部分结束, 以下代码若无必要无需更改 ***
        if(!empty($params["TemplateParam"]) && is_array($params["TemplateParam"])) {
            $params["TemplateParam"] = json_encode($params["TemplateParam"], JSON_UNESCAPED_UNICODE);
        }

        // 初始化SignatureHelper实例用于设置参数，签名以及发送请求

        // 此处可能会抛出异常，注意catch
        $content = $this->signaturehelper->request(
            $accessKeyId,
            $accessKeySecret,
            "dysmsapi.aliyuncs.com",
            array_merge($params, array(
                "RegionId" => "cn-hangzhou",
                "Action" => "SendSms",
                "Version" => "2017-05-25",
            ))
        // fixme 选填: 启用https
        // ,true
        );

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