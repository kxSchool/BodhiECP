<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/23
 * Time: 13:12
 */

class Finance extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination'); //系统的library
        $this->load->model('Accountmodel');
        $this->load->model('Membersmodel');
    }

    //资金明细列表
    public function details()
    {

        $this->load->view('finance/details');
    }

    //提现管理
    public function cash()
    {

        if($this->input->post('dosearch')){
            $fields = $this->input->post('fields');
            $search = $this->input->post('search');
        }else{
            $fields = $this->input->get('fields');
            $search = $this->input->get('search');
        }
        if(!empty($fields) && !empty($search)){
            $this->load->vars('fields',$fields);
            $parameter['fields'] = $fields;

            $this->load->vars('search',$search);
            $parameter['search'] = $search;
            $data['fields'] = $fields;
            if($search == 'createtime'){
                $data['like'] = strtolower(trim($search));
            }else{
                $data['like'] = trim($search);
            }
        }

        $data['limit'] = PAGESIZE;
        $page = $this->input->get('page');
        $currentPage = $page = isset($page) ? intval($page) : 1;
        $offset = ($page - 1) * PAGESIZE;
        $data['offset'] = $offset;

        //限制服务商
        $data['where'] = array(
            'seller_id' => $_SESSION['shopid'],
            'order_status' => 5
        );
        $this->load->model('Ordermodel');
        $result = $this->Ordermodel->getAllOrder($data);
        foreach($result['rows'] as &$v){
            if(isset($v['add_time']) && !empty($v['add_time'])){
                $v['add_time'] = date('Y-m-d H:i:s',$v['add_time']);
            }
        }

        $this->load->library('Page');
        if(isset($parameter)){
            $pageObject = new Page($result['total'], PAGESIZE, $currentPage,$parameter);
        }else{
            $pageObject = new Page($result['total'], PAGESIZE, $currentPage);
        }
        $pageObject->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $pages = $pageObject->show();
        $dataShow = array('pages' => $pages, 'datas' => $result['rows']);
        $this->load->view('finance/cash',$dataShow);
    }

    //我的账户
    public function account()
    {
        if($this->input->post('dosearch')){
            $fields = $this->input->post('fields');
            $search = $this->input->post('search');
        }else{
            $fields = $this->input->get('fields');
            $search = $this->input->get('search');
        }
        if(!empty($fields) && !empty($search)){
            $this->load->vars('fields',$fields);
            $parameter['fields'] = $fields;

            $this->load->vars('search',$search);
            $parameter['search'] = $search;
            $data['fields'] = $fields;
            if($search == 'createtime'){
                $data['like'] = strtolower(trim($search));
            }else{
                $data['like'] = trim($search);
            }
        }

        $data['limit'] = PAGESIZE;
        $page = $this->input->get('page');
        $currentPage = $page = isset($page) ? intval($page) : 1;
        $offset = ($page - 1) * PAGESIZE;
        $data['offset'] = $offset;

        //限制服务商
        $data['where'] = array(
            'shopid' => $_SESSION['shopid']
        );

        $result = $this->Accountmodel->getAllVenues($data);

        $this->load->library('Page');
        if(isset($parameter)){
            $pageObject = new Page($result['total'], PAGESIZE, $currentPage,$parameter);
        }else{
            $pageObject = new Page($result['total'], PAGESIZE, $currentPage);
        }
        $pageObject->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $pages = $pageObject->show();
        $dataShow = array('pages' => $pages, 'datas' => $result['rows']);

        //获取账户余额

        $money = $this->Membersmodel->getShopMoney($_SESSION['shopid']);
        $frozen = $this->Membersmodel->getShopFrozenMoney($_SESSION['shopid']);
        $this->load->vars('frozen',$frozen);
        $this->load->vars('money',$money);

        $this->load->view('finance/account',$dataShow);
    }

    //提现操作
    public function withdrawDeposit()
    {
        $money = intval($this->input->post('money'));
        $user_info = $this->Membersmodel->getMemberInfoByUserid($_SESSION['shopid']);
        $user_money = intval($user_info['money']);
        if(!$user_info){
            echo json_encode(array('code'=>1,'mes'=>'账号异常'));exit;
        }
        if($money > $user_money){
            echo json_encode(array('code'=>1,'mes'=>'账户余额不足'));exit;
        }

        if($this->Accountmodel->withdrawDeposit($money,$user_info)){
            $this->log_insert($_SESSION['username'].':发起提现申请');
            echo json_encode(array('code'=>0,'mes'=>'申请提现成功'));exit;
        }
        echo json_encode(array('code'=>1,'mes'=>'申请提现失败,请联系客服'));exit;
    }
}