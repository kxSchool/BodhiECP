<?php

class Ad extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('master', TRUE);
    }

    //根据广告位获取广告列表
    public function getListBySid($space_id){

        $this->db->select('id,name,spaceid,setting,description,price,amount');
        $this->db->order_by('listorder');
        $this->db->where(array('spaceid'=>$space_id,'disabled'=>1));
        $result = $this->db->get('ad');
        $result = $result->result_array();
        if(!empty($result)){
            foreach ($result as $k=>$v){
                $result[$k]['setting'] = json_decode($v['setting'],true);
                if(isset($result[$k]['setting']['ad_code'])){
                    $result[$k]['setting']['ad_code'] = $this->config->item('ad_url') . $result[$k]['setting']['ad_code'];
                }

            }
            return $result;
        }

        return array();
    }

    //获取广告位信息
    public function getSpaceInfo($id)
    {

        $this->db->where(array('spaceid'=>$id,'disabled'=>1));

        $this->db->from('ad_space');
        $query = $this->db->get();
        $result = $query->row_array();
        $query->free_result();
        return $result;
    }

    //获取广告位信息列表
    public function getAdInfo($id)
    {
        $list = $this->getSpaceInfo($id);
        if($list){
            $list['list'] = $this->getListBySid($list['spaceid']);
            return $list;
        }
        return false;
    }

}