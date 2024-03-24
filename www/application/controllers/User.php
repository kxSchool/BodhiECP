<?php

class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $this->load->view('user/login');
    }

    public function register()
    {
        $this->load->view('user/register');
    }

    public function forgetPwd()
    {
        $this->load->view('user/forgetPwd');
    }

    public function logout()
    {
        $user = $this->Member->getUserInfo($_SESSION['user']['userid']);

        if (empty($user)) {

            redirect(site_url('user/index'));exit;

        }

        $this->Member->updateByMobile(array('login_token'=>''),$user['mobile']);

        unset($_SESSION['user']);

        setcookie('keeplogin','',time()-3600);

        redirect(site_url('index/index'));exit;
    }

    //个人中心
    public function index()
    {
        if(!isLogin()){
            redirect(site_url('user/login'));exit;
        }

        $this->load->model('OrderInfo');
        $where = array('order_status'=>1);
        $order_list = $this->OrderInfo->orderList(0,5,$where);
        $this->load->vars('order_goods',$order_list);

        //各种状态订单数量
        $statusNum = $this->OrderInfo->orderStatusNum($_SESSION['user']['userid']);
        $this->load->vars('statusNum',$statusNum);

        $this->data['user_info'] = $this->Member->getInfoById($_SESSION['user']['userid']);
        $this->load->view('user/index',$this->data);
    }

    //账号设置
    public function accountSet()
    {
        if(!isLogin()){
            redirect(site_url('user/login'));exit;
        }
        $user_info = $this->Member->getInfoById($_SESSION['user']['userid']);

        $this->load->view('user/setting',$user_info);
    }

    //个人资料
    public function information()
    {
        if(!isLogin()){
            redirect(site_url('user/login'));exit;
        }
        $user_info = $this->Member->getInfoById($_SESSION['user']['userid']);

        //获取省市区信息
        $this->load->model('Region');
        $province = $this->Region->getProvince();
        $this->load->vars('province',$province);
        if(!empty($user_info['company_province'])){
            $city = $this->Region->getAreaByPid($user_info['company_province']);
            $this->load->vars('city',$city);
        }
        if(!empty($user_info['company_city'])){
            $area = $this->Region->getAreaByPid($user_info['company_city']);
            $this->load->vars('area',$area);
        }

        $this->load->view('user/information',$user_info);
    }

    //修改个人资料
    public function saveInfo()
    {
        if(!isLogin()){
            echo json_encode(array('code'=>1,'mes'=>'账号未登录','url'=>site_url('user/login')));exit;
        }
        if(IS_AJAX){
            $this->load->model('Member');

            $member['realname'] = $this->input->post('realname');
            $member['birthday'] = strtotime($this->input->post('birthday'));
            $member['sex'] = $this->input->post('sex');
            $member['email'] = $this->input->post('email');
            $member['company'] = $this->input->post('company');
            $member['post'] = $this->input->post('post');
            $member['company_province'] = $this->input->post('company_province');
            $member['company_city'] = $this->input->post('company_city');
            $member['company_area'] = $this->input->post('company_area');

            if($this->Member->updateById($member,$_SESSION['user']['userid'])){
                echo json_encode(array('code' => 0, 'mes' => '修改成功'));exit;
            }
            echo json_encode(array('code' => 1, 'mes' => '更新失败'));exit;
        }
        dump($this->input->post());exit;
    }
    
    //优惠券
    public function coupon()
    {
        if(!isLogin()){
            redirect(site_url('user/login'));exit;
        }
        $this->load->view('user/coupon');
    }


}