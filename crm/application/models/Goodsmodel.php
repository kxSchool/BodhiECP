<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/18
 * Time: 16:21
 */

class Goodsmodel extends CI_Model
{
    public $slave, $master;
    public function __construct()
    {
        parent::__construct();
        $this->slave = $this->load->database('goods_slave', true);
    }

    /**
     * 根据条件获取商品进度流程
     * @param int $goods_id 商品ID
     * @return int 返回商品进度流程
     */
    public function getGoodsProId($goods_id)
    {
        if(empty($goods_id)){
            return 1;
        }
        $this->slave->select('progress_id');
        $this->slave->from('goods');
        $this->slave->where(array('id'=>$goods_id));
        $query = $this->slave->get();
        $result = $query->result_array();
        $query->free_result();
        return empty($result) ? 1 : $result[0]['progress_id'];
    }

    /**
     * 根据条件获取商品进度流程列表
     * @param int $progress_id 进度ID
     * @return boolean||array 返回是否存在或者进度流程列表
     */
    public function getGoodsProgress($progress_id)
    {
        if(empty($progress_id)){
            return false;
        }

        $this->slave->select('id,title');
        $this->slave->from('progress');
        $this->slave->order_by('sort');
        $query = $this->slave->get();
        $result = $query->result_array();
        $query->free_result();
        return empty($result) ? false : $result;
    }

    public function getGoodsId($where)
    {
        $this->slave->select('id');
        $this->slave->from('goods');
        $this->slave->where($where);
        $query = $this->slave->get();
        $result = $query->result_array();
        $query->free_result();
        $id_arr = array();
        if(!empty($result)){
            foreach ($result as $k => $v){
                $id_arr[] = $v['id'];
            }
        }
        return $id_arr;
    }
}