<?php

class Goodsmodel extends CI_Model {


    public $slave, $master;
    public function __construct()
    {
        parent::__construct();
        $this->slave = $this->load->database('goods_slave', true);
        $this->master = $this->load->database('goods_master', true);
    }

    /*
     * 商品列表
     */
    public function goodsList($data){

        $this->slave->select('goods.*,goods_picture.picname');


        if(isset($data['where'])){
            $where = $data['where'];
        }

        $where['goods_picture.type'] = 2;
        $where['goods.is_del'] = 0;
        $this->slave->where($where);

        if(isset($data['like'])){
            foreach($data['like'] as $k=>$v){
                $this->slave->like($k, $v, 'both');
            }
        }

        $this->slave->order_by($data['order']);

        $this->slave->limit($data['limit'],$data['offset']);

        $this->slave->from('goods');
        $this->slave->join('goods_picture','goods.id = goods_picture.goods_id','LEFT');
        $query = $this->slave->get();
        $result['rows'] = $query->result_array();


        $this->slave->where($where);
        if(isset($data['like'])){
            foreach($data['like'] as $k=>$v){
                $this->slave->like($k, $v, 'both');
            }
        }
        $this->slave->from('goods');
        $this->slave->join('goods_picture','goods.id = goods_picture.goods_id','LEFT');
        $result['total'] = $this->slave->count_all_results();
        $query->free_result();
        return $result;
    }


    public function insert($tablename,$data)
    {
        if($this->master->insert($tablename,$data)) {
            return $this->master->insert_id();
        }else{
            return false;
        }
    }

    public function addGoods($data)
    {
        //添加商品，添加图片，添加价格，添加关联服务


        $this->master->trans_start();
        $goods_data['all_name'] = $data['all_name'];
        $goods_data['category1'] = $data['category1'];
        $goods_data['category2'] = $data['category2'];
        $goods_data['category3'] = $data['category3'];
        $goods_data['content'] = $data['content'];
        $goods_data['content_pc'] = $data['content_pc'];
        //添加商品
        $goods_id = $this->insert('goods',$goods_data);

        //添加商品图片
        $pic_data = array();
        if(!empty($data['m_images'])){
            $pic_data[0] = array(
                'goods_id'=>$goods_id,
                'picname'=>$data['m_images'],
                'type' => 2
            );
        }
        if(!empty($data['pc_images'])){
            $pic_data[1] = array(
                'goods_id'=>$goods_id,
                'picname'=>$data['pc_images'],
                'type' => 1
            );
        }
        if(!empty($pic_data)){
            //添加图片
            $this->master->insert_batch('goods_picture',$pic_data);
        }

        //添加价格
        $price_data = array();
        if(is_array($data['price'])){
            $price_data = $data['price'];
            foreach ($data['price'] as $k=>$v){
                $price_data[$k]['goods_id'] = $goods_id;
            }

            $this->master->insert_batch('products',$price_data);
        }else{
            $price_data['goods_id'] = $goods_id;
            $price_data['region_id'] = 0;
            $price_data['totalprice'] = $data['price'];
            $this->master->insert('products',$price_data);
        }

        //添加关联服务
        if(isset($data['ex_list'])){
            foreach ($data['ex_list'] as $exid => $ex){
                $data['ex_list'][$exid]['param'] = json_encode($ex['param']);
                $data['ex_list'][$exid]['goods_id'] = $goods_id;
            }
            $this->master->insert_batch('goods_ex',$data['ex_list']);
        }
        return $this->master->trans_complete();

    }

    public function createGoodsPic($data)
    {
        return $this->master->insert_batch('goods_picture',$data);
    }

    /**
     * @param $goods_arr array 商品ID数组
     * @return bool 是否成功
     */
    public function deleteBatch($goods_arr)
    {
        $goods_ids = implode(',',$goods_arr);
        $this->master->trans_start();
        //删除商品信息
        $this->master->query("DELETE FROM goods WHERE id IN ($goods_ids)");
        //删除商品图片信息
        $this->master->query("DELETE FROM goods_picture WHERE goods_id IN ($goods_ids)");
        //删除商品价格信息
        $this->master->query("DELETE FROM products WHERE goods_id IN ($goods_ids)");
        //删除商品关联服务
        $this->master->query("DELETE FROM goods_ex WHERE goods_id IN ($goods_ids)");
        return $this->master->trans_complete();

    }

    /**
     * 删除商品
     */
    public function delete($goods_id)
    {
//        $this->master->trans_start();
//        $this->master->query("DELETE FROM goods WHERE id = $goods_id");
//        $this->master->query("DELETE FROM goods_picture WHERE goods_id = $goods_id");
//        $this->master->query("DELETE FROM products WHERE goods_id = $goods_id");
//        $this->master->query("DELETE FROM goods_ex WHERE goods_id = $goods_id");
//        return $this->master->trans_complete();
    }

    /**
     * @param $goods_id int 商品ID
     * @return bool||array 布尔值或者商品扩展服务
     */
    public function getGoodsEx($goods_id)
    {
        $this->slave->select('class_name,param');
        $this->slave->where('goods_id',$goods_id);
        $this->slave->from('goods_ex');
        $query = $this->slave->get();
        $result = $query->result_array();
        $query->free_result();
        if(empty($result)){
            return false;
        }
        foreach ($result as $k => $v){
            $result[$k]['param'] = json_decode($v['param'],true);
        }
        return $result;
    }

    /**
     * @param $goods_id int 商品ID
     * @return bool||array 布尔值或者商品图片信息
     */
    public function getGoodsPic($goods_id)
    {
        $this->slave->select('picname,type');
        $this->slave->where('goods_id',$goods_id);
        $this->slave->from('goods_picture');
        $query = $this->slave->get();
        $result = $query->result_array();
        $query->free_result();
        if(empty($result)){
            return '';
        }
        $data = array();
        foreach ($result as $k => $v){
            $data[$v['type']] = $v;
        }
        return $data;
    }

    /**
     * @param $goods_id int 商品ID
     * @return bool||array 布尔值或者商品价格
     */
    public function getGoodsAllPrice($goods_id)
    {
        $this->slave->select('totalprice,province,city,region_id,price_expression');
        $this->slave->where('goods_id',$goods_id);
        $this->slave->from('products');
        $query = $this->slave->get();
        $result = $query->result_array();
        $query->free_result();
        return empty($result) ? '' : $result;
    }

    public function getGoodsPrice($goods_id)
    {
        $this->slave->select('totalprice,price_expression');
        $this->slave->where(array('goods_id'=>$goods_id,'region_id'=>0));
        $this->slave->from('products');
        $query = $this->slave->get();
        $result = $query->row_array();
        $query->free_result();
        return empty($result) ? '' : $result;
    }

    /**
     * 获取商品基本信息
     * @param $goods_id int 商品ID
     * @return bool||array 布尔值或者商品详情
     */
    public function getGoodsInfo($goods_id)
    {

        $this->slave->where('id',$goods_id);
        $this->slave->from('goods');
        $query = $this->slave->get();
        $result = $query->row_array();
        $query->free_result();
        return empty($result) ? '' : $result;
    }

    /**
     * @param $data array 商品信息
     * @return bool bool 布尔值
     */
    public function saveBaseGoodsInfo($data)
    {
        if(!isset($data['goods_id']) && empty($data['id'])){
            return false;
        }
        $goods_info['all_name'] = $data['name'];
        $goods_info['category1'] = $data['cate_f'];
        $goods_info['category2'] = $data['cate_s'];
        $goods_info['category3'] = $data['cate_t'];
        $goods_info['content'] = $data['m_detail'];
        $goods_info['content_pc'] = $data['pc_detail'];
        $goods_info['progress_id'] = $data['progress'];
        $goods_info['seo_description'] = $data['seo_description'];
        $goods_info['seo_keywords'] = $data['seo_keywords'];

        $pic_1['picname'] = $data['url_pc'];
        $pic_2['picname'] = $data['url_m'];
        $this->master->trans_start();
        $this->master->update('goods',$goods_info,array('id'=>$data['goods_id']));
        $this->master->update('goods_picture',$pic_1,array('goods_id'=>$data['goods_id'],'type'=>1));
        $this->master->update('goods_picture',$pic_2,array('goods_id'=>$data['goods_id'],'type'=>2));

        return $this->master->trans_complete();
    }

    public function allGoods()
    {
        $this->slave->select('id,all_name');
        $this->slave->where(array('status'=>1));
        $this->slave->from('goods');
        $query = $this->slave->get();
        $result = $query->result_array();
        $query->free_result();
        return $result;
    }

    /**
     * @param $data array 商品信息
     * @return bool bool 布尔值
     */
    public function saveExGoodsInfo($data)
    {
        $goods_id = $data['goods_id'];
        foreach ($data['servers'] as $key=>$value){
            $data['servers'][$key]['param'] = json_encode($value['param']);
        }
        $this->master->trans_start();
        $this->master->query("DELETE FROM goods_ex WHERE goods_id = $goods_id");
        $this->master->insert_batch('goods_ex',$data['servers']);
        return $this->master->trans_complete();

    }

    /**
     * @param $data array 商品信息
     * @return bool bool 布尔值
     */
    public function savePriceGoodsInfo($data,$goods_id)
    {

        $this->master->trans_start();
        $this->master->query("DELETE FROM products WHERE goods_id = $goods_id");
        $this->master->insert_batch('products',$data);
        return $this->master->trans_complete();

    }

    public function delExGoods($goods_id)
    {
        echo $goods_id;exit;
        return $this->master->query("DELETE FROM goods_ex WHERE goods_id = $goods_id");

    }

    //商品进度列表
    public function progressList($data)
    {
        $result = array();
        $this->slave->order_by($data['order']);
        $this->slave->limit($data['limit'],$data['offset']);
        $this->slave->from('goods_progress');
        $query = $this->slave->get();
        $result['rows'] = $query->result_array();
        $query->free_result();

        $this->slave->from('goods_progress');
        $query = $this->slave->get();
        $result['total'] = $query->num_rows();
        $query->free_result();
        return $result;

    }

    //获取进度类列表
    public function getProgressList()
    {
        $this->slave->from('goods_progress');
        $query = $this->slave->get();
        $result = $query->result_array();
        $query->free_result();
        return $result;
    }

    /**
     * 根据进度id，得到进度信息
     */
    public function getProgressById($proid){
        $this->slave->where('id',$proid);
        $this->slave->from('goods_progress');
        $query = $this->slave->get();
        $result = $query->row_array();
//        echo $this->slave->last_query();exit;
        return !empty($result) ? $result : '';
    }

    /**
     *保存goods_progress信息
     */
    public function saveProgress($data){
        $progress_id = isset($data['id']) ? $data['id'] : 0;
        if(isset($data['id'])){
            unset($data['id']);
        }
        if($progress_id){
            $data['updatetime'] = time();
            $this->master->where('id',$progress_id);
            if($this->master->update('goods_progress', $data)){
                return true;
            }else{
                return false;
            }
        }else{
            $data['createtime'] = time();
            if($this->master->insert('goods_progress', $data)){
                return true;
            }else{
                return false;
            }
        }
    }

    /**
     * 进度子类列表
     */
    public function progressChildList($data){
        $result = array();
        if(isset($data['where'])){
            $this->slave->where($data['where']);
        }
        $this->slave->order_by($data['order']);
        $this->slave->limit($data['limit'],$data['offset']);
        $this->slave->from('progress');
        $query = $this->slave->get();
        $result['total'] = $query->num_rows();
        $result['rows'] = $query->result_array();
        $query->free_result();
        return $result;
    }

    public function getProChildById($id)
    {
        $this->slave->where('id',$id);
        $this->slave->from('progress');
        $query = $this->slave->get();
        $result = $query->row_array();
//        echo $this->slave->last_query();exit;
        return !empty($result) ? $result : '';
    }

    public function saveProChild($data)
    {
        $id = isset($data['id']) ? $data['id'] : 0;
        if(isset($data['id'])){
            unset($data['id']);
        }
        if($id){
            $data['updatetime'] = time();
            $this->master->where('id',$id);
            if($this->master->update('progress', $data)){
                return true;
            }else{
                return false;
            }
        }else{
            $data['createtime'] = time();
            if($this->master->insert('progress', $data)){
                return $this->master->insert_id();
            }else{
                return false;
            }
        }
    }

    //根据进度ID获取子进度列表
    public function getChildProgress($progress_id)
    {
        $where = array(
            'pid' => $progress_id,
            'disabled' => 1
        );
        $this->slave->select('title,description,id');
        $this->slave->where($where);
        $this->slave->order_by('sort');
        $query = $this->slave->get('progress');
        $result = $query->result_array();
        $query -> free_result();
        return $result;
    }

    //根据商品ID判断商品是否存在
    public function goodsExist($id)
    {
        $this->slave->where('id',$id);
        $this->slave->from('goods');
        $count = $this->slave->count_all_results();
        if($count > 0){
            return true;
        }
        return false;
    }

    //更新商品状态
    public function saveGoodsStatus($data)
    {
        $goods_id = isset($data['id']) ? $data['id'] : 0;

        $data['update_time'] = time();
        $this->master->where('id',$goods_id);
        if($this->master->update('goods', $data)){
            return true;
        }else{
            return false;
        }

    }

    /**
     * 根据条件获取所有商品
     * @param array $where
     * @return mixed
     */
    public function getGoodsList($where = array())
    {
        $this->slave->select('id');
        $this->slave->where($where);
        $query = $this->slave->get('goods');
        $result = $query->result_array();
        $query->free_result();
        return $result;
    }

    public function getAllGoods()
    {
        $this->slave->select('id,all_name');
        $this->slave->where(array('is_del'=>0,'status'=>1));
        $query = $this->slave->get('goods');
        $result = $query->result_array();
        $query->free_result();
//        echo $this->slave->last_query();exit;
        return $result;
    }
}
