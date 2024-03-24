<?php

class Base extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database('master');

    }

    public function logout()
    {

        $user = $this->Member_model->getUserInfo($_SESSION['user']['userid']);

        if (empty($user)) {

            redirect(site_url('user/index'));exit;

        }
        $this->Member_model->update(array('login_token'=>''));

        unset($_SESSION['user']);
        setcookie('keeplogin','',time()-3600);

        redirect(site_url('user/index'));exit;
    }

    public function forgetpwd()
    {
        $this->load->view('base/forgetpass');
    }

    

    //ajax验证注册
    public function ajaxRegister()
    {
        if(IS_AJAX){

            $data = json_decode($this->input->get('data'),true);

            $phone = $data['phone'];
            $member['mobile'] = $data['phone'];
            $member['password'] = $data['password'];

            if(!preg_match("/^1[34578]{1}\d{9}$/",$phone)){
                echo json_encode(array('code'=>1,'mes'=>'请输入正确的手机号'));exit;
            }
            if(empty($member['password'])){
                echo json_encode(array('code'=>1,'mes'=>'请输入密码'));exit;
            }
            if(empty($data['code'])){
                echo json_encode(array('code'=>1,'mes'=>'请输入验证码'));exit;
            }

            $res = $this->checkCode($phone,$data['code']);
            if(!$res){
                echo json_encode(array('code'=>1,'mes'=>'验证码错误'));exit;
            }

            $count = $this->db->select('mobile')->where('mobile='. $member['mobile'])->count_all();
            if($count != 0){
                echo json_encode(array('code'=>1,'mes'=>'该手机号已经注册'));exit;
            }

            $member['encrypt'] = generate_password();
            $member['password'] = md5(md5($data['password']) . $member['encrypt']);
            $member['username'] = preg_replace("/(\d{3})\d\d(\d{2})/", "\$1****\$3", $phone);
            $member['realname'] = $phone;
            $member['password'] = md5(md5($data['password']) . $member['encrypt']);
            $member['register_ip'] = $_SERVER["REMOTE_ADDR"];
            $member['register_time'] = time();

            $this->db->insert('members1',$member);

            //保存用户信息
            $_SESSION['user']['userid'] = $this->db->insert_id();

            echo json_encode(array('code'=>0,'mes'=>'注册成功','url'=>$this->locationUrl()));exit;



        }
    }

    //ajax验证短信登录
    public function ajaxSmsLogin()
    {
        if(IS_AJAX) {
            $data = json_decode($this->input->get('data'),true);
            $phone = $data['phone'];
            $code = $data['code'];

            if(!preg_match("/^1[34578]{1}\d{9}$/",$phone)){
                echo json_encode(array('code'=>1,'mes'=>'请输入正确的手机号'));exit;
            }
            if(empty($code)){
                echo json_encode(array('code'=>1,'mes'=>'请输入验证码'));exit;
            }

            $res = $this->checkCode($phone,$code);
            if(!$res){
                echo json_encode(array('code'=>1,'mes'=>'验证码错误'));exit;
            }

            $is_exist = $this->Member_model->isExist($phone);
            //如果存在，改变登录状态，不存在则自动注册
            if($is_exist){

                $user_info = $this->Member_model->getInfoByMobile($phone);
                $new_info['login_count'] = 0;
                $new_info['login_time'] = time();
                $new_info['login_ip'] = $_SERVER["REMOTE_ADDR"];
                $new_info['login_token'] = $this->uuid();
                $this->Member_model->update($new_info,$phone);

                $_SESSION['user'] = $user_info;

                $login['userid'] = $user_info['userid'];
                $login['login_token'] = $new_info['login_token'];
                $this->keepLogin($login,86400*7);

            }else{

                //註冊用戶
                $member['mobile'] = $phone;
                $member['encrypt'] = generate_password();
                $member['password'] = md5(md5($member['encrypt']) . $member['encrypt']);
                $member['username'] = preg_replace("/(\d{3})\d\d(\d{2})/", "\$1****\$3", $phone);
                $member['realname'] = '';
                $member['register_ip'] = $_SERVER["REMOTE_ADDR"];
                $member['register_time'] = time();
                $member['login_count'] = 1;
                $member['login_time'] = time();
                $member['login_ip'] = $_SERVER["REMOTE_ADDR"];
                $member['uid'] = $this->Member_model->insert($member);
                $_SESSION['user'] = $member;

            }

            echo json_encode(array('code'=>0,'mes'=>'登录成功','url'=>$this->locationUrl()));exit;
        }
    }

    //ajax修改手机号
    public function ajaxChangeMobile()
    {
        if(IS_AJAX) {
            $data = json_decode($this->input->get('data'),true);
            $phone = $data['phone'];
            $code = $data['code'];

            if(!preg_match("/^1[34578]{1}\d{9}$/",$phone)){
                echo json_encode(array('code'=>1,'mes'=>'请输入正确的手机号'));exit;
            }
            if(empty($code)){
                echo json_encode(array('code'=>1,'mes'=>'请输入验证码'));exit;
            }

            $res = $this->checkCode($phone,$code);
            if(!$res){
                echo json_encode(array('code'=>1,'mes'=>'验证码错误'));exit;
            }

            $userinfo = $this->db->select('userid,username,login_count')->where(array(
                'mobile' => $phone,
                'disabled' => 0
            ))->get('members1');
            $userinfo = $userinfo->result_array();
            if(!empty($userinfo)){
                echo json_encode(array('code'=>1,'mes'=>'该手机号已经存在'));exit;
            }


            echo json_encode(array('code'=>0,'mes'=>'修改成功','url'=>$this->locationUrl()));exit;
        }
    }

    //ajax验证密码登录
    public function ajaxPwdLogin()
    {
        if(IS_AJAX) {

            $phone = $this->input->post('username');
            $password = $this->input->post('pwd');

            if(!preg_match("/^1[34578]{1}\d{9}$/",$phone)){
                echo json_encode(array('code'=>1,'mes'=>'请输入正确的手机号'));exit;
            }
            if(empty($password)){
                echo json_encode(array('code'=>1,'mes'=>'密码不能为空'));exit;
            }

            $info = $this->Member_model->getInfoByMobile($phone);

            if(empty($info)){
                echo json_encode(array('code'=>1,'mes'=>'该手机号不存在'));exit;
            }

            if($info['login_count'] >= 5){
                echo json_encode(array('code'=>1,'mes'=>'多次登录失败，请选择其他登录方式'));exit;
            }

            if($info['password'] != md5(md5($password).$info['encrypt'])){
                echo json_encode(array('code'=>1,'mes'=>'账号或密码错误'));exit;
            }

            $new_info['login_time'] = time();
            $new_info['login_ip'] = $_SERVER["REMOTE_ADDR"];

            $new_info['login_count'] = 0;
            $new_info['login_token'] = $this->uuid();

            $this->db->update('members1',$new_info,array('mobile' => $phone));

            $login['userid'] = $info['userid'];
            $login['login_token'] = $new_info['login_token'];

            $_SESSION['user'] = $info;
            $this->keepLogin($login,86400*7);

            echo json_encode(array('code'=>0,'mes'=>'登录成功','url'=>$this->locationUrl()));exit;
        }
    }

    //ajax检查忘记密码
    public function ajaxForgetPwd()
    {
        $mobile = $this->input->post('mobile');
        $code = $this->input->post('code');

        if(!preg_match("/^1[34578]{1}\d{9}$/",$mobile)){
            echo json_encode(array('code'=>1,'mes'=>'请输入正确的手机号'));exit;
        }
        if(empty($code)){
            echo json_encode(array('code'=>1,'mes'=>'请输入验证码'));exit;
        }

        $count = $this->db->where(array('mobile' => $mobile, 'disabled' => 0))->count_all('members1');

        if($count<1){
            echo json_encode(array('code'=>1,'mes'=>'该手机号未注册'));exit;
        }

        $res = $this->checkCode($mobile,$code);
        if($res){

            $_SESSION['account'] = $mobile;
            echo json_encode(array('code'=>0,'mes'=>'Success'));exit;
        }
        echo json_encode(array('code'=>1,'mes'=>'验证码错误'));exit;
    }

    //ajax修改密码
    public function ajaxChangePwd()
    {

        $mobile = $_SESSION['account'];
        $pwd = $this->input->post('pwd');

        if(empty($pwd)){
            echo json_encode(array('code'=>1,'mes'=>'请输入密码'));exit;
        }

        $data = array(
            'password' => md5(md5($pwd) . generate_password())
        );
        $res = $this->db->update('members1',$data,array('mobile'=>$mobile));
        if($res){
            echo json_encode(array('code'=>0,'mes'=>'Success','url'=>site_url('user/login')));exit;
        }
        echo json_encode(array('code'=>1,'mes'=>'Error'));exit;
    }

    //登录注册之后跳转操作
    private function locationUrl()
    {
        if(!empty($_SESSION['cache_data']['userurl'])){
            $url = $_SESSION['cache_data']['userurl'];
            unset($_SESSION['cache_data']['userurl']);
            return $url;
        }else{
            return site_url('user/index');
        }
    }

    //修改手机号
    public function changeMobile()
    {
        $data['mobile'] = $this->input->get('mobile');
        $this->load->view('base/changeMobile',$data);
    }


}