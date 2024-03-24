<?php

class Category_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->goods = $this->load->database('goods_master', TRUE);
    }

    //根据id获取分类名称
    public function getNameById($id)
    {
        $this->goods->select('cat_name');
        $this->goods->where(array('cat_id'=>$id));
        $res = $this->goods->get('category');
        $res = $res->result_array();
        if(empty($res)){
            return '';
        }
        return $res[0]['cat_name'];    //所属二级分类名称
    }

    //获取所有一级分类
    public function getFirstCate()
    {
        $this->goods->select('cat_id,cat_name');
        $this->goods->where(array('cat_pid'=>0,'is_show'=>1));
        $this->goods->order_by('cat_desc');
        $result = $this->goods->get('category');
        return $result->result_array();
    }

    //获取子分类
    public function getCateByPid($pid)
    {
        $this->goods->select('cat_id,cat_name');
        $this->goods->where(array('cat_pid'=>$pid,'is_show'=>1));
        $this->goods->order_by('cat_desc');
        $res = $this->goods->get('category');
        return $res->result_array();
    }

    //根据商品id获取分类名称
    public function getCateNameByGid($gid,$level = 2)
    {
        $this->goods->select('c.cat_name');
        $this->goods->from('goods as g');
        if($level == 2){
            $condition = 'g.category2 = c.cat_id';
        }elseif ($level == 1){
            $condition = 'g.category1 = c.cat_id';
        }else{
            $condition = 'g.category3 = c.cat_id';
        }

        $this->goods->join('category as c',$condition,'left');
        $where['g.id'] = $gid;
        $this->goods->where($where);

        $result = $this->goods->get();
        $result = $result->result_array();
        return $result[0]['cat_name'];
    }
}