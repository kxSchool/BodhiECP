<?php

class Region_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->master = $this->load->database('master', TRUE);
    }

    //获取省级信息
    public function getProvince()
    {

        $this->master->select('region_id as id,region_name as name');
        $this->master->where('parent_id = 1');
        $this->master->order_by('desc');
        $data = $this->master->get('region');
        return $data->result_array();

    }

    //根据子地区
    public function getAreaByPid($pid)
    {
        $this->master->select('region_id as id,region_name as name');
        $this->master->where('parent_id = ' . $pid);
        $this->master->order_by('desc');
        $area = $this->master->get('region');
        return $area->result_array();
    }

    //根据id获取地区名称
    public function getRegionNameById($id)
    {
        $this->master->select('region_name');
        $this->master->where(array('region_id' => $id));
        $result = $this->master->get('region');
        $result = $result->result_array();
        return $result[0]['region_name'];
    }
}