<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    private $regiondb;

    private $goodsdb;

    public function __construct() {
        parent::__construct();
        $this->load->model('Region');
        $this->load->model('Goodsmodel');
        $this->regiondb = $this->Region;
        $this->goodsdb = $this->Goodsmodel;
        $this->load->helper('self');
        $this->load->config('system');//加载系统配置文件
    }

    /**
     * ajax获取默认省市区
     */
    public function ajaxGetDefaultArea()
    {
        //获取默认省市区
        $province = $this->regiondb->allProvince();
        $city = $this->regiondb->getAreaByPid($province[0]['region_id']);
        $area = $this->regiondb->getAreaByPid($city[0]['region_id']);
        echo json_encode(array('code'=>0,'msg'=>'success','data'=>array('p'=>$province,'c'=>$city,'a'=>$area)));exit;
    }

    /**
     * 获取所有商品
     */
    public function allGoods()
    {
        $goods_list = $this->goodsdb->allGoods();
        echo json_encode(array('code'=>0,'msg'=>'success','data'=>$goods_list));exit;
    }

    /**
     * 根据订单ID生成订单进度
     */
    public function createOrderProgress()
    {
        $this->load->model('Ordermodel');
        $this->load->model('Membersmodel');

        $order_id = $this->input->get('order_id');
        $user_id = $this->input->get('user_id');
        if(!$order_id || !$user_id){
            return false;
        }
        $order_info = $this->Ordermodel->getOrderInfoById($order_id);
        $agency_info = $this->Membersmodel->getAgencyInfo(array('id'=>$user_id));
        $goods_list = $this->Ordermodel->getOrderGoodsInfo($order_id);
        $progress_list[] = array(
            'order_id' => $order_id,
            'order_sn' => $order_info['order_sn'],
            'progress' => '订单已派单到服务商'.$agency_info['username'],
            'sort' => 1,
            'createtime' => time(),
            'description' => '服务商联系电话:'.$agency_info['mobile'],
            'shopid' => $user_id,
            'goods_id' => 0,
            'goods_name' => $order_info['order_sn'],
            'progress_id' => 0,
            'isFinish' => 1
        );
        $sort = 2;
        foreach ($goods_list as $id=>$item) {
            $list = $this->goodsdb->getChildProgress($item['progress_id']);
            foreach ($list as $k => $v){
                $data['order_id'] = $order_id;
                $data['order_sn'] = $order_info['order_sn'];
                $data['goods_id'] = $item['id'];
                $data['goods_name'] = $item['all_name'];
                $data['progress_id'] = $v['id'];
                $data['progress'] = $v['title'];
                $data['sort'] = $sort++;
                $data['createtime'] = time();
                $data['description'] = $v['description'];
                $data['shopid'] = $user_id;
                $data['isFinish'] = 0;
                $progress_list[] = $data;
            }

        }
        $progress_list[] = array(
            'order_id' => $order_id,
            'order_sn' => $order_info['order_sn'],
            'progress' => '订单已完成',
            'sort' => $sort,
            'createtime' => time(),
            'description' => '',
            'shopid' => $user_id,
            'goods_id' => 0,
            'goods_name' => $order_info['order_sn'],
            'progress_id' => 0,
            'isFinish' => 0
        );
        $res = $this->Ordermodel->createOrderProgress($progress_list);
        return $res;
    }

}
