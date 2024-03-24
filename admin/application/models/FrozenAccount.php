<?php

class FrozenAccount extends CI_Model {


    public $slave, $master;
    public function __construct()
    {
        parent::__construct();
        $this->slave = $this->load->database('slave', true);
        $this->master = $this->load->database('master', true);
    }

    /**
     * 计算服务商可转出冻结金额列表
     */
    public function usableMoney()
    {
        $expire_time = time()-$this->config->item('frozen_account_time');
        $this->slave->where("create_time <= $expire_time");
        $this->slave->from('frozen_account');
        $query = $this->slave->get();
        $result = $query->result_array();
        $query->free_result();
        return empty($result) ? false : $result;
    }

    public function delete($id)
    {
        $this->master->delete('frozen_account', array('id' => $id));
    }

    public function autoChangeAccount($data,$fro_id)
    {
        //首先根据会员的id，判定需要查询哪个会员表
        $userid = $data['shopid'];

        $maxNUmber = $this->config->item('max_members');//每张用户表最大存储记录数
        $tableName = 'members'.ceil($userid/$maxNUmber);

        $new_money = $data['change_money'] + $data['user_money'];

        $this->master->trans_start();
        $this->master->insert('account_log',$data);

        $this->master->update($tableName,array('money'=>$new_money),array('userid'=>$userid));

        $this->master->delete('frozen_account', array('id' => $fro_id));
        return $this->master->trans_complete();
    }




}
