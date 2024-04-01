<?php

class AccountLog extends CI_Model {


    public $slave, $master;
    public function __construct()
    {
        parent::__construct();
        $this->slave = $this->load->database('slave', true);
        $this->master = $this->load->database('master', true);
    }

    /**
     * @param $data array 数据信息
     * @return bool||int 返回新增ID或者bool
     */
    public function createLog($data)
    {
        if(count($data) == count($data,1)){
            $result = $this->master->insert('account_log',$data);
        }else{
            $result = $this->master->insert_batch('account_log',$data);
        }
        return $result;
    }

    public function getAllLogs($data)
    {

        $where = array();
        if(isset($data['where'])){
            $where = $data['where'];
        }
        $this->slave->where($where);
        if(isset($data['like'])){
            foreach($data['like'] as $k=>$v){
                $this->slave->like($k, $v, 'both');
            }
        }
        $this->slave->order_by('log_id','DESC');
        $this->slave->from('account_log');

        $query = $this->slave->get();
        $result['rows'] = $query->result_array();
        $result['total'] = $query->num_rows();
        $query->free_result();

        return $result;
    }

    public function getAgencyApplyGroup($data)
    {
        $where = array();
        if(isset($data['where'])){
            $where = $data['where'];
        }
        $this->slave->where($where);
        if(isset($data['like'])){
            foreach($data['like'] as $k=>$v){
                $this->slave->like($k, $v, 'both');
            }
        }

        $this->slave->select_sum('change_money');
        $this->slave->select_max('change_time');
        $this->slave->select('shopid');
        $this->slave->from('account_log');
        $this->slave->order_by('change_time','DESC');
        $this->slave->limit($data['limit'],$data['offset']);

        $this->slave->group_by('shopid');

        $query = $this->slave->get();
//        echo $this->slave->last_query();exit;
        $result['rows'] = $query->result_array();
        $result['total'] = $query->num_rows();
        $query->free_result();

        return $result;
    }
}
