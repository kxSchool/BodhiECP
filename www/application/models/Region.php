<?php

class Region extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('master', TRUE);
    }

    //获取省级信息
    public function getProvince()
    {

        $this->db->select('region_id as id,region_name as name');
        $this->db->where('parent_id = 1');
        $this->db->order_by('desc');
        $data = $this->db->get('region');
        return $data->result_array();

    }

    //根据子地区
    public function getAreaByPid($pid)
    {

        $this->db->select('region_id as id,region_name as name');
        $this->db->where('parent_id = ' . $pid);
        $this->db->order_by('desc');
        $area = $this->db->get('region');
        return $area->result_array();

    }

    //根据id获取地区名称
    public function getRegionNameById($id)
    {

        $this->db->select('region_name');
        $this->db->where(array('region_id' => $id));
        $result = $this->db->get('region');
        $result = $result->result_array();
        return $result[0]['region_name'];

    }
}