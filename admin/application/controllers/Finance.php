<?php

class Finance extends MY_Controller
{
    private $accountlogdb;

    private $memberdb;

    public function __construct() {
        parent::__construct();
        $this -> load -> model('AccountLog');
        $this -> load -> model('Membersmodel');
        $this -> accountlogdb = $this->AccountLog;
        $this -> memberdb = $this->Membersmodel;
    }

    /**
     * 财务日志列表
     */
    public function logs()
    {
        //获取服务商
        $agency_list = $this->memberdb->getAllAgency();
        $this->load->vars('agency_list',$agency_list);

        $search = $this->input->get();
        $this->load->vars('search',$search);

        if($this->input->get('shopid') && $this->input->get('shopid') != 0){
            $data['where']['shopid'] = $this->input->get('shopid');
        }
        if($this->input->get('status') && $this->input->get('status') != 0){
            $data['where']['status'] = $this->input->get('status');
        }
        if($this->input->get('log_sn')){
            $data['like'] = array('log_sn'=>$this->input->get('log_sn'));
        }
        if($this->input->get('change_time')){
            $data['where']['change_time >='] = strtotime($this->input->get('change_time').'000000');
            $data['where']['change_time <='] = strtotime($this->input->get('change_time').'235959');
        }

        $data['limit'] = PAGESIZE;
        $page = $this->input->get('page');
        $currentPage = $page = isset($page) ? intval($page) : 1;
        $offset = ($page - 1) * PAGESIZE;
        $data['offset'] = $offset;
        $result = $this -> accountlogdb -> getAllLogs($data);
        $this -> load -> library('Page');
        $pageObject = new Page($result['total'], PAGESIZE, $currentPage,$search);
        $pageObject -> setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $pages = $pageObject -> show();
        $dataShow = array('pages' => $pages, 'datas' => $result['rows']);

        $this->load->view('finance/logs',$dataShow);
    }

    /**
     * 提现申请列表
     */
    public function apply()
    {
        //获取服务商
        $agency_list = $this->memberdb->getAllAgency();
        $this->load->vars('agency_list',$agency_list);

        $search = $this->input->get();
        $this->load->vars('search',$search);

        $data['where']['status'] = 4;

        if($this->input->get('time')){
            $date = $this->input->get('time');
        }else{
            $date = date('Y-m',time());
        }
        $month = getthemonth($date);

        $data['where']['change_time >='] = strtotime($month['firstday'].' 00:00:00');
        $data['where']['change_time <='] = strtotime($month['lastday'].' 23:59:59');

        //获取服务商提现列表
        $data['limit'] = PAGESIZE;
        $page = $this->input->get('page');
        $currentPage = $page = isset($page) ? intval($page) : 1;
        $offset = ($page - 1) * PAGESIZE;
        $data['offset'] = $offset;
        $result = $this -> accountlogdb -> getAgencyApplyGroup($data);

        //关联服务商信息
        foreach ($result['rows'] as $key=>$value){
            $data['id'] = $value['shopid'];
            $data['select'] = 'mobile,username';
            $result['rows'][$key] = array_merge($value,$this->memberdb->getAgencyInfo($data));
        }

        $this -> load -> library('Page');
        $pageObject = new Page($result['total'], PAGESIZE, $currentPage,$search);
        $pageObject -> setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $pages = $pageObject -> show();
        $dataShow = array('pages' => $pages, 'datas' => $result['rows']);
        $this->load->view('finance/apply',$dataShow);
    }

    /**
     * ajax获取提现详情
     */
    public function ajaxApplyInfo()
    {
        if(IS_AJAX){
            if(!$this->input->post('id') && !$this->input->post('time')){
                echo json_encode(array('code'=>1,'meg'=>'参数错误'));exit;
            }

            $data['where']['status'] = 4;
            $data['where']['shopid'] = $this->input->post('id');
            $month = getthemonth($this->input->post('time'));

            $data['where']['change_time >='] = strtotime($month['firstday'].' 00:00:00');
            $data['where']['change_time <='] = strtotime($month['lastday'].' 23:59:59');
            $result = $this -> accountlogdb -> getAllLogs($data);

            //获取服务商信息
            $result['agency'] = $this->memberdb->getAgencyInfo(array(
                'id'=>$this->input->post('id'),
                'select' => 'username,mobile'
            ));

            foreach ($result['rows'] as $k => $v){
                $result['rows'][$k]['change_time'] = date('Y-m-d H:i:s',$v['change_time']);
            }
            echo json_encode(array('code'=>0,'data'=>$result));exit;
        }
    }

    /**
     * ajax提现审批
     */
    public function ajaxApprove()
    {
        $id = $this->input->get('id');
        if(!$id){
            echo json_encode(array('code'=>1,'msg'=>'参数错误'));exit;
        }
        if(strstr($id,',')){
            $id = rtrim($id,',');
        }

        if($this->accountlogdb->updateAccountLog()){
            echo json_encode(array('code'=>0,'msg'=>'审批成功'));exit;
        }
        echo json_encode(array('code'=>1,'msg'=>'审批失败'));exit;
    }

    public function applyInfo()
    {
        if(!$this->input->get('id') && !$this->input->get('time')){
            echo json_encode(array('code'=>1,'meg'=>'参数错误'));exit;
        }

        $data['where']['status'] = 4;
        $data['where']['shopid'] = $this->input->get('id');
        $month = getthemonth($this->input->get('time'));

        $data['where']['change_time >='] = strtotime($month['firstday'].' 00:00:00');
        $data['where']['change_time <='] = strtotime($month['lastday'].' 23:59:59');
        $result = $this -> accountlogdb -> getAllLogs($data);

        //获取服务商信息
        $result['agency'] = $this->memberdb->getAgencyInfo(array(
            'id'=>$this->input->get('id'),
            'select' => 'username,mobile'
        ));

        foreach ($result['rows'] as $k => $v){
            $result['rows'][$k]['change_time'] = date('Y-m-d H:i:s',$v['change_time']);
        }

        $this->load->view('finance/applyInfo',$result);
    }
}