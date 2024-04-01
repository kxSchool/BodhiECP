<?php

class User extends MY_Controller
{

    public function __construct()
    {

        parent::__construct();

    }

    public function index()
    {
        $this->load->view('user/selfCenter');
    }

    public function login()
    {
        $this->load->view('user/login');
    }

    public function register()
    {
        $this->load->view('user/register');
    }

    public function about()
    {
        $this->load->view('user/about');
    }

    public function connect()
    {
        $this->load->view('user/relation');
    }

    public function info()
    {

        if(!isLogin()){
            $_SESSION['cache_data']['userurl'] = $_SERVER["HTTP_REFERER"];
            redirect('user/login');exit;
        }

        $data = $this->Member_model->getUserInfo($_SESSION['user']['userid']);

        switch ($data['sex']){
            case '0' :
                $data['sex'] = '保密';
                break;
            case '1' :
                $data['sex'] = '男';
                break;
            case '2' :
                $data['sex'] = '女';
                break;
        }

        $this->load->view('user/info',$data);

    }

    public function changeInfo()
    {
        if(IS_AJAX){
            $member['realname'] =  $this->input->post('name');
            $member['sex'] =  $this->input->post('sex');
            switch ($member['sex']){
                case '保密':
                    $member['sex'] = 0;
                    break;
                case '男':
                    $member['sex'] = 1;
                    break;
                case '女':
                    $member['sex'] = 2;
                    break;
            }
            $member['birthday'] =  strtotime($this->input->post('birthday'));
            $member['email'] =  $this->input->post('email');
            $member['company'] =  $this->input->post('company');
            $member['post'] =  $this->input->post('post');
            $res = $this->Member_model->update($member);
            if($res){
                echo json_encode(array('code'=>0,'mes'=>'success'));exit;
            }
            echo json_encode(array('code'=>1,'mes'=>'error'));exit;
        }
    }

    //修改头像
    public function changeIcon()
    {
        $dir = FCPATH . '../www/avatar/'.$_SESSION['user']['userid'];

        if(!is_dir($dir))
        {
            mkdir ($dir,0777,true);
        }

        $config['upload_path']      = $dir;
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']     = 10485760;
//        $config['max_width']        = 1024;
//        $config['max_height']       = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file'))
        {
            $error = array('error' => $this->upload->display_errors());
            $data = array('code'=>1,'mes'=>'未知错误!');
            echo json_encode($data);exit;
        }
        else {

            $data = $this->upload->data();

            $file_name = $data['file_name'];    //文件名称 a.png

            $res = $this->Member_model->update(array('icon'=>$file_name));

            if($res){

                $url = 'https://www.kxschool.com/avatar/'.$_SESSION['user']['userid']."/$file_name";
                $_SESSION['user']['icon'] = $file_name;
                echo json_encode(array('code'=>0,'url'=>$url));exit;

            }

            echo json_encode(array('code'=>1,'mes'=>'error'));exit;

        }
    }

    //修改密码
    public function changePwd()
    {
        if(IS_AJAX){

            $model = $this->input->post('mobile');
            $code = $this->input->post('code');
            $pwd = $this->input->post('pwd');

            if(!preg_match("/^1[34578]{1}\d{9}$/",$model)){
                echo json_encode(array('code'=>1,'mes'=>'请输入正确的手机号'));exit;
            }
            if(empty($pwd)){
                echo json_encode(array('code'=>1,'mes'=>'请输入密码'));exit;
            }
            if(empty($code)){
                echo json_encode(array('code'=>1,'mes'=>'请输入验证码'));exit;
            }

            if(!$this->checkCode($model,$code)){
                echo json_encode(array('code'=>1,'mes'=>'验证码错误'));exit;
            }

            $info = $this->Member_model->getInfoByMobile($model);

            if(empty($info)){
                echo json_encode(array('code'=>1,'mes'=>'该手机号不存在'));exit;
            }

            if($_SESSION['user']['userid'] != $info['userid']){
                echo json_encode(array('code' => 1, 'message' => '没有相关权限'));exit;
            }

            $member['encrypt'] = generate_password();       //密码盐
            $member['password'] = md5(md5($pwd).$member['encrypt']);

            $res = $this->Member_model->update($member);

            if($res){
                echo json_encode(array('code'=>0,'mes'=>'修改成功','url'=>site_url('user/info')));exit;
            }

            echo json_encode(array('code'=>1,'mes'=>'修改失败'));exit;

        }else{
            $user_info = $this->Member_model->getUserInfo($_SESSION['user']['userid']);

            $data['mobile'] = $user_info['mobile'];

            $this->load->view('user/changePwd',$data);
        }
    }
}