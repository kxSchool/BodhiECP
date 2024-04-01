<?php
/**
 * Created by PhpStorm.
 * User: as
 * Date: 2018/4/28
 * Time: 18:19
 */
class Accountmodel extends CI_Model
{

    public $slave, $master;
    public function __construct()
    {
        parent::__construct();
//        $this->slave = $this->load->database();
        $this->slave = $this->load->database('slave', true);
        $this->master = $this->load->database('master', true);
    }
    public function getAllVenues($data){
        $result = array();
        if(isset($data['fields'])  && isset($data['like'])){
            $this->slave->like($data['fields'], $data['like'], 'both');
        }
        if(isset($data['where']) && !empty($data['where'])){
            $this->slave->where($data['where']);
        }
        $this->slave->order_by('change_time','DESC');
        $this->slave->limit($data['limit'],$data['offset']);
        $this->slave->from('account_log');
        $query = $this->slave->get();
        $result['rows'] = $query->result_array();
        $query->free_result();

        //(2)查询总条数
        if(isset($data['fields'])  && isset($data['like'])){
            $this->slave->like($data['fields'], $data['like'], 'both');
        }
        $this->slave->from('account_log');
        $query = $this->slave->get();
        $result['total'] = $query->num_rows();
        $query->free_result();
        return $result;
    }

    //订单转入冻结余额
    public function createFrozenAccount($frozen,$account_log)
    {
        $this->master->trans_start();
        $this->master->insert('frozen_account',$frozen);
        $this->master->insert('account_log',$account_log);
        return $this->master->trans_complete();
    }

    //用户申请提现
    public function withdrawDeposit($money,$user_info)
    {
        $user_id = $user_info['userid'];
        //首先根据会员的id，判定需要查询哪个会员表
        $maxNUmber = $this->config->item('max_members');//每张用户表最大存储记录数
        $tableName = 'members'.ceil($user_id/$maxNUmber);
        $account_log = array(
            'log_sn' => account_log_sn(),
            'staff_id' => $_SESSION['userid'],
            'user_money' => $user_info['money'] - $money,
            'change_time' => time(),
            'change_desc' => $_SESSION['username'].':申请提现'.$money.'元',
            'status_desc' => '申请提现已发出',
            'change_money' => $money,
            'shopid' => $_SESSION['shopid'],
            'staff_name' => $_SESSION['username'],
            'status' => 4
        );
        $this->master->trans_start();
        $this->master->query("UPDATE $tableName SET money = money - $money WHERE userid = $user_id");

        $this->master->insert('account_log',$account_log);
        return $this->master->trans_complete();
    }
}