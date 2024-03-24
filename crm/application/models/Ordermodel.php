<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/18
 * Time: 16:21
 */

class Ordermodel extends CI_Model
{
    public $slave, $master;
    public function __construct()
    {
        parent::__construct();
        $this->slave = $this->load->database('tickets', true);
    }

    public function getAllOrder($data)
    {
        //（1）查询指定数据
        $result = array();
        $result['rows'] = $this->getOrderList($data);
        //(2)查询总条数
        $result['total'] = $this->getOrderCount($data);
        return $result;
    }

    /**
     * 根据条件获取订单总条数
     * @param array $data 查询条件数组<br>格式 : [字段=>值,字段=>值]
     * @return int 返回订单总条数
     */
    public function getOrderCount($data)
    {
        if(isset($data['fields'])  && isset($data['like'])){
            $this->slave->like($data['fields'], $data['like'], 'both');
        }
        if(isset($data['where']) && !empty($data['where'])){
            $this->slave->where($data['where']);
        }
        $this->slave->from('order_info');
        $query = $this->slave->get();
        $result = $query->num_rows();
        $query->free_result();
        return $result;
    }

    /**
     * 根据条件获取订单列表
     * @param array $data 查询条件数组<br>格式 : [字段=>值,字段=>值]
     * @return boolean||array 返回是否存在或者订单列表
     */
    public function getOrderList($data)
    {
        if(isset($data['fields'])  && isset($data['like'])){
            $this->slave->like($data['fields'], $data['like'], 'both');
        }
        if(isset($data['where']) && !empty($data['where'])){
            $this->slave->where($data['where']);
        }
        $this->slave->order_by('shipping_time','DESC');
        $this->slave->limit($data['limit'],$data['offset']);
        $this->slave->from('order_info');
        $query = $this->slave->get();
        $result = $query->result_array();
        $query->free_result();
        if(!empty($result)){
            foreach ($result as $k => $v){
                switch($v['order_status']){
                    case '1':
                        $result[$k]['order_status'] = '已付款';
                        break;
                    case '3':
                        $result[$k]['order_status'] = '钱已转移至钱包';
                        break;
                    case '5':
                        $result[$k]['order_status'] = '交易成功';
                        break;
                    case '6':
                        $result[$k]['order_status'] = '已评价';
                        break;
                    default:
                        $result[$k]['order_status'] = '异常订单';
                        break;
                }
            }
        }
        return $result;
    }

    /**
     * 根据订单ID获取订单详情
     * @param array $where 订单获取条件
     * @return boolean||array 返回是否存在或者订单详情
     */
    public function getOrderInfo($where)
    {
        $this->slave->select('order_id,seller_id,order_sn,add_time,pay_time,order_status,order_amount,address');
        $this->slave->from('order_info');
        $this->slave->where($where);
        $query = $this->slave->get();
        $result = $query->result_array();
        $query->free_result();
        if(empty($result)){
            return false;
        }
        $result = $result[0];
        switch ($result['order_status']){
            case '1':
                $result['order_status'] = '已付款';
                break;
            case '3':
                $result['order_status'] = '钱已转移至钱包';
                break;
            case '4':
                $result['order_status'] = '已取消';
                break;
            case '5':
                $result['order_status'] = '交易成功';
                break;
            case '6':
                $result['order_status'] = '已评价';
                break;
            default:
                $result['order_status'] = '异常订单';
                break;
        }
        return $result;
    }

    /**
     * 根据订单ID获取订单详情
     * @param array $where 订单获取条件
     * @return boolean||array 返回是否存在或者订单详情
     */
    public function getOrderGoods($where)
    {
        $this->slave->select('goods_sn,goods_name,goods_price,goods_count');
        $this->slave->from('order_goods');
        $this->slave->where($where);
        $query = $this->slave->get();
        $result = $query->result_array();
        $query->free_result();
        return empty($result) ? false : $result;
    }

    /**
     * 根据订单ID和商品ID获取订单商品详情
     * @param array $where 订单获取条件
     * @return boolean||array 返回是否存在或者订单详情
     */
    public function getOrderGoodsInfo($where)
    {
        $this->slave->select('goods_sn,goods_name,goods_price,goods_count');
        $this->slave->from('order_goods');
        $this->slave->where($where);
        $query = $this->slave->get();
        $result = $query->result_array();
        $query->free_result();
        return empty($result) ? false : $result[0];
    }

    /**
     * 根据订单ID和服务商ID和商品ID获取商品已完成进度
     * @param array $where 获取条件
     * @return boolean||array 返回是否存在或者订单详情
     */
    public function getOrderGoodsProgress($where)
    {

        $this->slave->select('progress_id');
        $this->slave->from('order_goods_progress');
        $this->slave->where($where);
        $query = $this->slave->get();
        $result = $query->result_array();
        $progress = array();
        if(!empty($result)){
            foreach ($result as $v){
                $progress[] = $v['progress_id'];
            }
        }
        $query->free_result();
        return $progress;
    }

    public function getOrderProgress($where,$order = 'sort ASC')
    {
        $this->slave->from('order_goods_progress');
        $this->slave->where($where);
        $this->slave->order_by($order);
        $query = $this->slave->get();
        $result = $query->result_array();

        $query->free_result();
        return empty($result) ? false : $result;
    }

    public function changeOrderProgress($where,$data)
    {
        $this->slave->where($where);
        return $this->slave->update('order_goods_progress', $data);
    }

    public function enabledChange($order_id)
    {
        $where = array(
            'order_id' => $order_id,
            'isFinish' => 0
        );
        $this->slave->select('sort');
        $this->slave->where($where);
        $this->slave->order_by('sort');
        $this->slave->limit(1);
        $query = $this->slave->get('order_goods_progress');
        $result = $query->result_array();

        $query->free_result();
        return empty($result) ? false : $result[0]['sort'];
    }

    //修改订单进度
    public function updateOrder($where,$data)
    {
        $this->slave->where($where);
        return $this->slave->update('order_info', $data);
    }

    //完成订单，更新订单状态->转移余额至服务商钱包->记录明细(服务商)\
    public function finishOrder($order_id)
    {

    }

    /**
     * 获取每种类型每个月订单数量
     * @return array 返回是否存在或者订单列表
     */
    public function getOrderMonthCountByType()
    {

        $this->slave->select("order_type,MONTH(FROM_UNIXTIME(shipping_time,'%Y%m%d')) as month,COUNT(order_id) as count");

        $where = array(
            "year(FROM_UNIXTIME(shipping_time,'%Y%m%d'))" => '2018',
            'seller_id' => $_SESSION['shopid']
        );
        $this->slave->where($where);

        $this->slave->group_by('order_type,month');
        $this->slave->from('order_info');
        $query = $this->slave->get();
        $result = $query->result_array();
//        echo $this->slave->last_query();exit;
        $query->free_result();

        return $result;
    }

    /**
     * 获取每种类型订单数量
     * @return array 返回是否存在或者订单列表
     */
    public function getOrderCountByType()
    {
        $this->slave->select("order_type,COUNT(order_id) as count");

        $where = array(
            "year(FROM_UNIXTIME(shipping_time,'%Y%m%d'))" => '2018',
            'seller_id' => $_SESSION['shopid']
        );
        $this->slave->where($where);

        $this->slave->group_by('order_type');
        $this->slave->from('order_info');
        $query = $this->slave->get();
        $result = $query->result_array();
//        echo $this->slave->last_query();exit;
        $query->free_result();

        return $result;
    }

    //统计订单相关数据
    public function statsOrderInfo($where = array())
    {
        $this->slave->select('sum(order_amount) as amount,count(order_id) as count');
        $this->slave->where($where);
        $query = $this->slave->get('order_info');
        $result = $query->row_array();
        $query->free_result();
        return $result;
    }
}