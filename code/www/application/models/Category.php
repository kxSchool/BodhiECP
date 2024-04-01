<?php

class Category extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('goods_master', TRUE);
    }

    //获取所有一级分类
    public function topCategory()
    {
        $this->db->select('cat_id,cat_name,cat_pid');
        $this->db->where(array('cat_pid'=>0,'is_show'=>1));
        $this->db->order_by('cat_desc');
        $result = $this->db->get('category');
        return $result->result_array();
    }

    //根据pid获取子分类列表
    public function getCategoryByPid($pid)
    {
        $this->db->select('cat_id,cat_name,cat_pid,is_hot');
        $this->db->where(array('cat_pid'=>$pid,'is_show'=>1));
        $this->db->order_by('cat_desc');
        $result = $this->db->get('category');
        return $result->result_array();
    }

    //根据id获取分类名称
    public function getNameById($cid)
    {
        $this->db->select('cat_name');
        $this->db->where(array('cat_id'=>$cid));
        $res = $this->db->get('category');
        $res = $res->result_array();
        if(empty($res)){
            return '';
        }
        return $res[0]['cat_name'];    //所属二级分类名称
    }

    //根据商品id获取分类名称
    public function getCateNameByGid($gid,$level = 2)
    {
        $this->db->select('c.cat_name');
        $this->db->from('goods as g');
        if($level == 2){
            $condition = 'g.category2 = c.cat_id';
        }elseif ($level == 1){
            $condition = 'g.category1 = c.cat_id';
        }else{
            $condition = 'g.category3 = c.cat_id';
        }

        $this->db->join('category as c',$condition,'left');

        $where['g.id'] = $gid;
        $this->db->where($where);
        $result = $this->db->get();
        $result = $result->result_array();
        return $result[0]['cat_name'];
    }
}