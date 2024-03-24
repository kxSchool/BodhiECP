<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/18
 * Time: 16:21
 */

class Ordermodel extends CI_Model
{
    public $slave, $master,$error;
    public function __construct()
    {
        parent::__construct();
        $this->slave = $this->load->database('tickets', true);
        $this->master = $this->load->database('tickets', true);

    }

    public function getAllOrder($data)
    {
        //（1）查询指定数据
        $result = array();
        $result['rows'] = $this->getOrderList($data);
        //(2)查询总条数
        $where = array();
        if(isset($data['where']) && !empty($data['where'])){
            $where = $data['where'];
        }
        $result['total'] = $this->getOrderCount($where);
        return $result;
    }

    /**
     * 根据条件获取订单总条数
     * @param array $where 查询条件数组<br>格式 : [字段=>值,字段=>值]
     * @return int 返回订单总条数
     */
    public function getOrderCount($where = array())
    {

        if(!empty($where)){
            $this->slave->where($where);
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
        if(isset($data['select']) && !empty($data['select'])){
            $this->slave->select($data['select']);
        }
        if(isset($data['fields'])  && isset($data['like'])){
            $this->slave->like($data['fields'], $data['like'], 'both');
        }
        if(isset($data['where']) && !empty($data['where'])){
            $this->slave->where($data['where']);
        }
        $this->slave->order_by('add_time','DESC');
        $this->slave->limit($data['limit'],$data['offset']);
        $this->slave->from('order_info');
        $query = $this->slave->get();
        $result = $query->result_array();
        $query->free_result();
        if(!empty($result)){
            foreach ($result as $k => $v){

                if(isset($v['add_time'])){
                    $result[$k]['add_time'] = date('Y-m-d H:i:s',$v['add_time']);
                }
                if(isset($v['order_status'])){
                    switch($v['order_status']){
                        case '0':
                            $result[$k]['status'] = '未付款';
                            break;
                        case '1':
                            $result[$k]['status'] = '已付款';
                            break;
                        case '3':
                            $result[$k]['status'] = '钱已转移至钱包';
                            break;
                        case '4':
                            $result[$k]['status'] = '已取消';
                            break;
                        case '5':
                            $result[$k]['status'] = '交易成功';
                            break;
                        case '6':
                            $result[$k]['status'] = '已评价';
                            break;
                        default:
                            $result[$k]['status'] = '异常订单';
                            break;
                    }
                }

            }
        }
        return $result;
    }

    /**
     * 根据订单ID获取订单详情
     * @param int $order_id 订单ID
     * @return boolean||array 返回是否存在或者订单详情
     */
    public function getOrderInfo($order_id)
    {

        $this->slave->from('order_info');
        $this->slave->where('order_id',$order_id);
        $query = $this->slave->get();
        $result = $query->row_array();
        $query->free_result();
        if(empty($result)){
            return false;
        }
        switch ($result['order_status']){
            case '1':
                $result['status'] = '已付款';
                break;
            case '3':
                $result['status'] = '钱已转移至钱包';
                break;
            case '4':
                $result['status'] = '已取消';
                break;
            case '5':
                $result['status'] = '交易成功';
                break;
            case '6':
                $result['status'] = '已评价';
                break;
            default:
                $result['status'] = '异常订单';
                break;
        }
        return $result;
    }

    /**
     * 根据订单ID获取订单商品
     * @param int $order_id 订单获取条件
     * @return boolean||array 返回是否存在或者订单详情
     */
    public function getOrderGoods($order_id)
    {
        $this->slave->from('order_goods');
        $this->slave->where('order_id',$order_id);
        $query = $this->slave->get();
        $result = $query->result_array();
        $query->free_result();
        return $result;
    }

    /**
     * 根据订单ID和商品ID获取订单商品详情
     * @param int $order_id 订单ID
     * @return boolean||array 返回是否存在或者订单详情
     */
    public function getOrderGoodsInfo($order_id)
    {
        $sql = "SELECT
goods.goods.id,
goods.goods.all_name,
goods.goods.description,
goods.goods.category1,
goods.goods.category2,
goods.goods.category3,
goods.goods.progress_id,
tickets.order_goods.goods_count,
tickets.order_goods.goods_price,
tickets.order_goods.order_id
FROM
tickets.order_goods
INNER JOIN goods.goods ON tickets.order_goods.goods_sn = goods.goods.id
WHERE tickets.order_goods.order_id = ".$order_id;

        $query = $this->slave->query($sql);
        $result = $query->result_array();
        $query->free_result();
        return $result;
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


    public function getOrderProgress($where,$order_by = 'sort ASC')
    {
        $this->slave->from('order_goods_progress');
        $this->slave->where($where);
        $this->slave->order_by($order_by);
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
    public function allotOrder($id,$data)
    {
        $where = array('order_id'=>$id);
        return $this->master->update('order_info', $data,$where);
    }

    //查看订单是否可派单
    public function isUsable($order_id)
    {
        $this->slave->where('order_id',$order_id);
        $query = $this->slave->get('order_info');
        $result = $query->row_array();
        $query->free_result();
        if($result){
            if($result['seller_id'] != 0){
                $this->error = '该订单已经分配到服务商';
                return false;
            }
            if($result['order_status'] != 1){
                $this->error = '订单不符合派单条件';
                return false;
            }
        }
        return true;
    }

    //获取订单信息
    public function getOrderInfoById($order_id)
    {
        $this->slave->where('order_id',$order_id);
        $query = $this->slave->get('order_info');
        $result = $query->row_array();
        $query->free_result();
        return $result;
    }

    //创建订单进度
    public function createOrderProgress($data)
    {
//        dump($data);exit;
        return $this->master->insert_batch('order_goods_progress',$data);
    }

    //根据微信订单号获取订单信息
    public function getInfoByOrderSnShop($order_sn_shop)
    {
        $this->slave->where('order_sn_shop',$order_sn_shop);
        $query = $this->slave->get('order_info');
        $result = $query->row_array();
        $query->free_result();
        return $result;
    }

    //根据订单号获取订单信息
    public function getInfoByOrderSn($order_sn)
    {
        $this->slave->where('order_sn',$order_sn);
        $query = $this->slave->get('order_info');
        $result = $query->row_array();
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

    /**
     * 获取每种类型每个月订单数量
     * @return array 返回是否存在或者订单列表
     */
    public function getOrderMonthCountByType()
    {

        $this->slave->select("order_type,MONTH(FROM_UNIXTIME(pay_time,'%Y%m%d')) as month,COUNT(order_id) as count");

        $this->slave->where("year(FROM_UNIXTIME(pay_time,'%Y%m%d'))",'2018');

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

        $this->slave->where("year(FROM_UNIXTIME(pay_time,'%Y%m%d'))",'2018');

        $this->slave->group_by('order_type');
        $this->slave->from('order_info');
        $query = $this->slave->get();
        $result = $query->result_array();
//        echo $this->slave->last_query();exit;
        $query->free_result();

        return $result;
    }
}