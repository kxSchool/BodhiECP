<?php

class Order_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('tickets', TRUE);
    }

    //创建订单
    public function createOrder($order_data)
    {

        $res = $this->db->insert('order_info', $order_data);
        if ($res) {
            return $this->db->insert_id();
        }
        return false;

    }

    //创建多條订单商品信息
    public function insertOrderGoodsAll($order_id, $gid_arr, $rid)
    {
        $order_goods = array();
        $this->load->model('Goods_model');
        foreach ($gid_arr as $k => $v) {
            $order_goods[$k]['goods_sn'] = $v;
            $order_goods[$k]['order_id'] = $order_id;
            $goods = $this->Goods_model->GoodsInfo($v, $rid);
            $order_goods[$k]['goods_price'] = $goods['totalprice'];
            $order_goods[$k]['goods_name'] = $goods['all_name'];
        }

        $res = $this->db->insert_batch('order_goods', $order_goods);
        return $res;
    }

    //获取订单
    public function getOrderById($id)
    {
        $this->db->select('order_sn,order_amount,order_id');
        $this->db->where(array('order_id' => $id));
        $result = $this->db->get('order_info');
        $result = $result->result_array();
        return empty($result) ? array() : $result[0];
    }

    //是否存在订单
    public function hasOrder($order_id)
    {
        return empty($this->getOrderById($order_id)) ? false : true;
    }

    //获取订单列表
    public function orderList($uid)
    {

        $order = $this->getOrderByUid($uid);

        $order_list = array();
        foreach ($order as $key => $value) {
            $order_list[$key]['order_sn'] = $value['order_sn'];
            $order_list[$key]['order_id'] = $value['order_id'];
            $order_list[$key]['order_amount'] = $value['order_amount'];
            $order_list[$key]['address'] = $value['address'];
            $order_list[$key]['pay_status'] = $value['pay_status'];
            $order_list[$key]['order_status'] = $value['order_status'];
            switch ($value['order_status']) {
                case 0:
                    $order_list[$key]['status'] = '未付款';
                    break;
                case 1:
                    $order_list[$key]['status'] = '已付款';
                    break;
                case 4:
                    $order_list[$key]['status'] = '已取消';
                    break;
                case 5:
                    $order_list[$key]['status'] = '已完单';
                    break;
                case 6:
                    $order_list[$key]['status'] = '已评价';
                    break;
                default:
                    $order_list[$key]['status'] = '订单异常';
                    break;
            }
            $order_list[$key]['goods_list'] = $this->getGoodsByOrder($value['order_id']);
        }

        return $order_list;

    }

    //根據訂單獲取商品
    public function getGoodsByOrder($order_id)
    {
        $this->db->select('goods_name,goods_price,goods_sn');
        $this->db->where('order_id=' . $order_id);
        $res = $this->db->get('order_goods');
        return $res->result_array();
    }

    //根據用戶id獲取訂單信息
    public function getOrderByUid($uid)
    {
        $this->db->select('order_id,order_sn,order_amount,pay_status,address,order_status');
        $this->db->from('order_info');
        $this->db->where('user_id=' . $uid . ' and order_status <> 4');
        $this->db->order_by('add_time', 'DESC');
        $order = $this->db->get();
        return $order->result_array();
    }

    //取消订单
    public function cancelOrderById($oid)
    {

        $data = array(
            'order_status' => 4,    //取消
            'delete_time' => time()
        );
        $this->db->where('order_id', $oid);
        return $this->db->update('order_info', $data);
    }

    //更新订单状态
    public function update($data, $where)
    {
        $this->db->where($where);
        return $this->db->update('order_info', $data);
    }

    //判斷訂單是否支付 未支付返回true
    public function isPay($order_id)
    {
        $this->db->select('order_status');
        $this->db->where(array('order_id' => $order_id));
        $res = $this->db->get('order_info');
        $res = $res->result_array();
        if (empty($res) || $res[0]['order_status'] != 0) {
            return false;
        }
        return true;
    }

    //修改訂單商品
    public function editOrderGoods($where, $data)
    {

        $sql1 = 'UPDATE order_goods SET goods_count = ' . $data['goods_count'] . ',goods_price = ' . $data['goods_price'] . ' WHERE goods_sn = ' . $where['goods_sn'] . ' AND order_id = ' . $where['order_id'];
        $sql2 = 'UPDATE order_info SET order_amount = ' . $data['order_amount'] . ',confirm_time = ' . time() . ' WHERE order_id = ' . $where['order_id'];

        $this->db->trans_begin();

        $this->db->query($sql1);
        $this->db->query($sql2);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();

            return true;
        }
    }

    //获取订单进度
    public function getOrderProgress($order_id, $all = false)
    {
        $where['order_id'] = $order_id;
        if (!$all) {
            $where['isFinish'] = 1;
        }
        $this->db->where($where);
        $this->db->order_by('sort', 'DESC');
        $this->db->from('order_goods_progress');
        $query = $this->db->get();
        $result = $query->result_array();
        $query->free_result();
        return $result;

    }

    //获取订单信息信息
    public function getOrderInfo($order_id)
    {
        $this->db->where('order_id',$order_id);
        $this->db->from('order_info');
        $query = $this->db->get();
        $result = $query->row_array();
        $query->free_result();
        return $result;
    }


}