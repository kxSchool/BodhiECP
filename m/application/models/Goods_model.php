<?php

class Goods_model extends CI_Model
{

    public function __construct()
    {

        parent::__construct();
        $this->db = $this->load->database('goods_master', TRUE);

    }

    //根据id获取商品名称
    public function getNameById($id)
    {
        $this->db->select('all_name');
        $this->db->where(array('id'=>$id));
        $result = $this->db->get('goods');
        $result = $result->result_array();
        return $result[0]['all_name'];
    }

    //获取商品信息
    public function getGoodsInfo($id)
    {
        $this->db->select('all_name,id,description,category1,category2,category3,content,is_region,is_count');
        $this->db->where(array('id'=>$id));
        $result = $this->db->get('goods');
        $result = $result->result_array();
        return $result[0];
    }

    //根据分类获取商品信息
    public function getGoodsByCid($id,$cate = 3)
    {

        $where['status'] = 1;
        if($cate == 3){
            $where['category3'] = $id;
        }elseif ($cate == 2){
            $where['category2'] = $id;
        }else{
            $where['category1'] = $id;
        }
        $this->db->select('category2,category3,all_name,id');
        $this->db->where($where);
        $result = $this->db->get('goods');
        return $result->result_array();

    }

    //根据分类获取商品个数
    public function getCountByCid($id,$cate = 3)
    {

        $where['status'] = 1;
        if($cate == 3){
            $where['category3'] = $id;
        }elseif ($cate == 2){
            $where['category2'] = $id;
        }else{
            $where['category1'] = $id;
        }
        $this->db->where($where);
        $this->db->from('goods');
        return $this->db->count_all_results();

    }

    //获取商品价格
    public function getPrice($gid,$rid = 0,$num = 1)
    {

        $this->db->select('totalprice,price_expression');
        $this->db->where(array('goods_id'=>$gid,'region_id'=>$rid));
        $res = $this->db->get('products');
        $res = $res->result_array();
        if(!empty($res)){
            return $num == 1 ? $res[0]['totalprice'] : $res[0]['price_expression'];
        }else{
            $this->db->select('totalprice,price_expression');
            $this->db->where(array('goods_id'=>$gid,'region_id'=>0));
            $result = $this->db->get('products');
            $result = $result->result_array();
            return $num == 1 ? $result[0]['totalprice'] : $result[0]['price_expression'];
        }

    }

    //根据商品id获取服务区域
    public function getRegionsByGid($gid)
    {

        $this->db->select('region_id');
        $this->db->where(array('goods_id'=>$gid));
        $res = $this->db->get('products');
        $res = $res->result_array();
        $region_list = array();
        foreach ($res as $k=>$v){
            $region_list[] = $v['region_id'];
        }
        return $region_list;

    }

    //获取商品关联服务
    public function exService($id,$rid)
    {
        $result = $this->db->where(['goods_id'=>$id])->get('goods_ex');
        $ex_list = $result->result_array();

        foreach ($ex_list as $k=>$v){
            $ex_list[$k]['param'] = json_decode($v['param'],true);
            foreach ($ex_list[$k]['param'] as $key => $value){
                if(empty($value['id'])){
                    $ex_list[$k]['param'][$key]['price'] = 0.00;
                    continue;
                }
                $ex_list[$k]['param'][$key]['id'] = $value['id'];
                $ex_list[$k]['param'][$key]['name'] = $value['name'];
                $ex_list[$k]['param'][$key]['price'] = $this->getPrice($value['id'],$rid);
            }
        }

        return $ex_list;
    }

    //获取商品详情
    public function getDetialById($id)
    {
        $this->db->select('g.id,g.all_name,g.category1,g.category2,g.category3,g.content,gp.picname,g.is_region,g.seo_keywords,g.seo_description');
        $this->db->from('goods as g');
        $this->db->join('goods_picture as gp','g.id = gp.goods_id','left');
        $this->db->where(array('g.id'=>$id,'gp.type'=>2));
        $res = $this->db->get();
        $res = $res->result_array();
        if(empty($res)){
            return array();
        }
        return $res[0];
    }

    //获取商品價格信息
    public function GoodsInfo($gid,$rid = 0)
    {

        $this->db->select('p.totalprice,g.all_name');
        $this->db->from('goods as g');
        $this->db->join('products as p','g.id = p.goods_id','left');
        $this->db->where(array('g.id'=>$gid,'p.region_id'=>$rid));
        $res = $this->db->get();
        $res = $res->result_array();
        if(!empty($res)){
            return $res[0];
        }else{
            $this->db->select('p.totalprice,g.all_name');
            $this->db->from('goods as g');
            $this->db->join('products as p','g.id = p.goods_id','left');
            $this->db->where(array('g.id'=>$gid,'p.region_id'=>0));
            $result = $this->db->get();
            $result = $result->result_array();
            return $result[0];
        }

    }

}