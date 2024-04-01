<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crontab extends CI_Controller {

    private $frozen;
    private $member;
    private $account_log;
    public function __construct() {

        parent::__construct();
        $this->load->helper('self');
        $this->load->helper('function');
        $this -> load -> model('FrozenAccount');
        $this -> load -> model('Membersmodel');
        $this -> load -> model('AccountLog');
        $this -> load -> model('Logmodel');
        $this -> frozen = $this->FrozenAccount;
        $this -> member = $this->Membersmodel;
        $this -> account_log = $this->AccountLog;

        $this->load->config('system');//加载系统配置文件
    }

    /**
     * 更新代理服务商账户金额
     */
    public function agencyBalance()
    {
        //计算可转出冻结金额
        //转出冻结金额
        //转入账户余额
        //记录日志
        set_time_limit(0);

        $usable_list = $this->frozen->usableMoney();
        $log_data = array();
        if($usable_list){
            foreach ($usable_list as $key => $value){
                $log_data['log_sn'] = account_log_sn();
                $log_data['staff_id'] = 0;
                $log_data['user_money'] = $this->member->getShopMoney($value['shopid']);
                $log_data['change_time'] = time();
                $log_data['change_desc'] = '订单号'.$value['order_sn'].'完单结账';
                $log_data['status_desc'] = '金额转入钱包';
                $log_data['change_money'] = $value['money'];
                $log_data['shopid'] = $value['shopid'];
                $log_data['staff_name'] = '系统管理员';
                $log_data['status'] = 2;
                $res = $this->frozen->autoChangeAccount($log_data,$value['id']);
                if(!$res){
                    $error_data = array(
                        'ip' => get_client_ip(),
                        'remark' => '订单号'.$value['order_sn'].'冻结金额转入钱包失败',
                        'createtime' => time()
                    );
                    $this->Logmodel->createErrorLogs($error_data);
                }

            }
        }
        
    }

}
