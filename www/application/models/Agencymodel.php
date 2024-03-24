<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/22
 * Time: 15:50
 */

class Agencymodel extends CI_Model
{
    public function __construct()
    {
        $this->slave = $this->load->database('slave', TRUE);
        $this->master = $this->load->database('master', TRUE);
    }

    /**
     * 根据PID获取类目
     * @param $p_id
     * @return mixed
     */
    public function getCategoryByPid($p_id)
    {
        $this->slave->where(array('status'=>1,'parent_id'=>$p_id));
        $this->slave->from('enter_category');
        $query = $this->slave->get();
        $result = $query->result_array();
        $query -> free_result();
        return $result;
    }

    public function getCategoryListById($id)
    {
        $this->slave->where(array('status'=>1,'id'=>$id));
        $this->slave->from('enter_category');
    }

    /**
     * 获取某个级别的全部类目
     * @param bool $level
     * @return mixed
     */
    public function getAllCategory($level = false)
    {
        if($level){
            $where['level'] = $level;
        }
        $where['status'] = 1;
        $this->slave->where($where);
        $this->slave->from('enter_category');
        $query = $this->slave->get();
        $result = $query->result_array();
        $query -> free_result();
        return $result;
    }

    public function insertEnterApply($data)
    {
        if($this->master->insert('enter_apply',$data)){
            return $this->master->insert_id();
        }
        return false;
    }
}