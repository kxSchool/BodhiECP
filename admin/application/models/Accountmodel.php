<?php

class Accountmodel extends CI_Model {
    //资产明细列表
    public function accountLogList($data){
        $result = array();
        if(isset($data['where'])){
            $this->slave->where($data['where']);
        }
        $this->slave->order_by($data['order']);
        $this->slave->limit($data['limit'],$data['offset']);
        $this->slave->from('account_log');
        $query = $this->slave->get();

        $result['rows'] = $query->result_array();
        $query->free_result();

        if(isset($data['where'])){
            $this->slave->where($data['where']);
        }
        $this->slave->from('account_log');
        $query = $this->slave->get();
        $result['total'] = $query->num_rows();
        $query->free_result();
        return $result;
    }
    //会员提现列表
    public function userAccountList($data){
        $result = array();
        if(isset($data['where'])){
            $this->slave->where($data['where']);
        }
        $this->slave->order_by($data['order']);
        $this->slave->limit($data['limit'],$data['offset']);
        $this->slave->from('user_account');
        $query = $this->slave->get();

        $result['rows'] = $query->result_array();
        $query->free_result();

        if(isset($data['where'])){
            $this->slave->where($data['where']);
        }
        $this->slave->from('user_account');
        $query = $this->slave->get();
        $result['total'] = $query->num_rows();
        $query->free_result();
        return $result;
    }
    //根据提现id，得到提现信息
    public function getUserAccountById($id){
        $this->slave->where('id',$id);
        $this->slave->from('user_account');
        $query = $this->slave->get();
        $result = $query->row_array();
        return !empty($result) ? $result : '';
    }
    //添加资金流水
    public function insertAccountLog($data){
        $result = $this->master->insert('account_log',$data);
        if($result){
            return $this->master->insert_id();
        }else{
            return false;
        }
    }
    //更新提现记录
    public function updateUserAccount($data){
        $id = isset($data['id']) ? $data['id'] : 0;
        if(isset($data['id'])){
            unset($data['id']);
        }
        if($id){
            $this->master->where('id',$id);
            if($this->master->update('user_account', $data)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    //导出提现申请excel表格
    public function exportAccountExcel($data){
        $result = array();
        if(isset($data['where'])){
            $this->slave->where($data['where']);
        }
        $this->slave->order_by($data['order']);
        $this->slave->from('user_account');
        $query = $this->slave->get();
        $result = $query->result_array();
        return !empty($result) ? $result : '';
    }
}
