<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promotion extends MY_Controller {

	private $bonustypedb;
    private $userbonusdb;
    private $membersdb;

	public function __construct() {
		parent::__construct();
		$this -> load -> model('BonusTypemodel');
		$this -> bonustypedb = $this->BonusTypemodel;

        $this -> load -> model('UserBonusemodel');
        $this -> userbonusdb = $this->UserBonusemodel;

        $this -> load -> model('Membersmodel');
        $this -> membersdb = $this->Membersmodel;
	}

    //促销卡券列表
    public function index(){
        $buildaction = $this->input->get('buildaction');
        if($buildaction){
            $data['where'] = array('build_action'=>$buildaction);
            $parameter = array('buildaction'=>$buildaction);
        }
        $data['order'] = "type_id ASC";
        $data['limit'] = PAGESIZE;
        $page = $this->input->get('page');
        $currentPage = $page = isset($page) ? intval($page) : 1;
        $offset = ($page - 1) * PAGESIZE;
        $data['offset'] = $offset;
        $result = $this->bonustypedb->bonustypelist($data);
        foreach($result['rows'] as $k=>$v){
            if($v['use_type'] == 0){
                $result['rows'][$k]['use_type_name'] = '不支持并用';
            }elseif($v['use_type'] == 1){
                $result['rows'][$k]['use_type_name'] = '支持并用';
            }
            if($v['build_action'] == 0){
                $result['rows'][$k]['build_action_name'] = '凭同一暗号';
            }elseif($v['build_action'] == 1){
                $result['rows'][$k]['build_action_name'] = '凭不同促销码';
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
        $this -> load -> view('promotion/promotion',$dataShow);
    }
    
    //推出促销
    public function distribute(){
        //卡券列表
        $bonusTypeList = $this->bonustypedb->bonustypelistNoPage();
        if(!empty($bonusTypeList)){
            $this->load->vars('bonusTypeList',$bonusTypeList);
        }
        $this -> load -> view('promotion/distribute');
    }
    //30天未登录网站的买家
    public function thirtyDaysNoLogin(){
        if(IS_AJAX){
            $returnResult = array();
            $members = $this -> membersdb->LongTimeNoLoginMember(1,30*24*60*60);
            if(!empty($members)){
                $returnResult = array(
                    'info'=>1,
                    'total'=>count($members)
                );
            }else{
                $returnResult = array(
                    'info'=>0
                );
            }
            echo json_encode($returnResult);
        }
    }
    //保存推出促销结果
    public function saveDistribute(){
        if(IS_POST){
            $fasongguize = $this->input->post('fasongguize');
            if(isset($fasongguize) && !empty($fasongguize)){
                if($fasongguize == 2){
                    //未登录超30天者即送
                    $members = $this -> membersdb->LongTimeNoLoginMember(1,30*24*60*60);
                }
                if($fasongguize == 3){
                    //指定买家
                    $zhidingyonghu = $this->input->post('zhidingyonghu');
                    if(isset($zhidingyonghu) && !empty($zhidingyonghu)){
                        $useridArr = explode(",",$zhidingyonghu);
                        foreach($useridArr as $k=>$v){
                            $userInfo = $this->membersdb->getMemberInfoByUserid($v);
                            if(!empty($userInfo) && $userInfo['type'] == 1){
                                $members[$k]['userid'] = $v;
                            }
                        }
                    }
                }
                if(isset($members) && !empty($members)){
                    $bonus_type_id = $this->input->post('bonus_type_id');
                    if(isset($bonus_type_id) && !empty($bonus_type_id)){
                        $bonusTypeInfo = $this->bonustypedb->getBonusTypeByTypeId($bonus_type_id);
                        if(!empty($bonusTypeInfo)){
                            foreach($members as $v){
                                $saveData['bonus_type_id'] = $bonus_type_id;
                                if($bonusTypeInfo['build_action'] == 0){
                                    $bonus_sn = $bonusTypeInfo['sign'];
                                }
                                if($bonusTypeInfo['build_action'] == 1){
                                    $bonus_sn = $bonusTypeInfo['sign'].random($bonusTypeInfo['num'],'123456789');
                                }
                                $saveData['bonus_sn'] = $bonus_sn;
                                $saveData['user_id'] = $v['userid'];
                                $this->userbonusdb->saveUserBonus($saveData);
                                $tixing = $this->input->post('tixing');
                                if(isset($tixing) && $tixing == 1){
                                    $duanxinxiaoxi = $this->input->post('duanxinxiaoxi');
                                    if(isset($duanxinxiaoxi) && !empty($duanxinxiaoxi)){
                                        //发送短信消息
                                    }
                                    $zhanneixiaoxi = $this->input->post('zhanneixiaoxi');
                                    if(isset($zhanneixiaoxi) && !empty($zhanneixiaoxi)){
                                        //发送站内信
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        redirect('promotion/index');
    }
    
    //生成促销
    public function create(){
        $this -> load -> view('promotion/promotionCreate');
    }
    //编辑促销卡券
    public function editPromotion(){
        $type_id = $this->input->get('type_id');
        $bonusTypeInfo = $this->bonustypedb->getBonusTypeByTypeId($type_id);
        if(!empty($bonusTypeInfo)){
            $bonusTypeInfo['use_start_date'] = date('Y-m-d H:i:s',$bonusTypeInfo['use_start_date']);
            $bonusTypeInfo['use_end_date'] = date('Y-m-d H:i:s',$bonusTypeInfo['use_end_date']);
            $this->load->view('promotion/promotionEdit',$bonusTypeInfo);
        }else{
            $data['msg'] = '传递参数错误';
            $data['url'] = $_SERVER['HTTP_REFERER'];
            $this -> load -> view('common/error', $data);
        }
    }

    //保存生成促销
    public function savePromotion(){
        if(IS_POST){
            $saveData['type_id'] = $this->input->post('type_id');
            $saveData['send_type'] = $this->input->post('send_type');
            $saveData['type_name'] = $this->input->post('type_name');
            $saveData['type_money'] = $this->input->post('type_money');
            $saveData['use_start_date'] = strtotime($this->input->post('use_start_date'));
            $saveData['use_end_date'] = strtotime($this->input->post('use_end_date'));
            $saveData['use_type'] = $this->input->post('use_type');
            $saveData['build_action'] = $this->input->post('build_action');
            if($saveData['build_action'] == 0){//同一暗号方式
                $saveData['sign'] = $this->input->post('anhao');
                $saveData['num'] = 0;
            }elseif($saveData['build_action'] == 1){//凭不同的促销码方式
                $saveData['sign'] = $this->input->post('cuxiaomastart');
                $saveData['num'] = $this->input->post('num');
            }
            if($this->bonustypedb->saveBonustype($saveData)){
                redirect('promotion/index');
            }
        }
    }
    
 }