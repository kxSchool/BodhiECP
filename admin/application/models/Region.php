<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/30
 * Time: 16:12
 */

class Region extends CI_Model
{
    public $slave, $master;
    public function __construct()
    {
        parent::__construct();
        $this->slave = $this->load->database('slave', true);
        $this->master = $this->load->database('master', true);
    }

    /**
     * 获取所有省级区域
     */
    public function allProvince()
    {
        $this->slave->select('region_id,region_name');
        $this->slave->where(array('parent_id'=>1));
        $this->slave->order_by('desc');
        $this->slave->from('region');
        $query = $this->slave->get();
        $result = $query->result_array();
        $query->free_result();
        return $result;
    }

    /**
     * @param $region_pid int 区域父级ID
     * @return mixed 返回结果集或者FALSE
     */
    public function getAreaByPid($region_pid)
    {
        $this->slave->select('region_id,region_name');
        $this->slave->where(array('parent_id'=>$region_pid));
        $this->slave->order_by('desc');
        $this->slave->from('region');
        $query = $this->slave->get();
        $result = $query->result_array();
        $query->free_result();
        return empty($result) ? false : $result;
    }


    /**
     * @param $region_id int 区域ID
     * @return bool||int 布尔值或父级区域的ID
     */
    public function getRegionPid($region_id)
    {
        $this->slave->select('parent_id');
        $this->slave->where(array('region_id'=>$region_id));
        $this->slave->from('region');
        $query = $this->slave->get();
        $result = $query->row_array();
        $query->free_result();
        return empty($result) ? false : $result['parent_id'];
    }
}