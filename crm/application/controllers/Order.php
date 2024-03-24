<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/18
 * Time: 16:16
 */

class Order extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination'); //系统的library
        $this->load->model('Ordermodel');    //调数据库数据
        $this->load->model('Logmodel');

    }

    //订单列表
    public function orderList()
    {
//        $this->log_insert($_SESSION['username'].':订单列表请求');
        if($this->input->post('dosearch')){
            $fields = $this->input->post('fields');
            $search = $this->input->post('search');
        }else{
            $fields = $this->input->get('fields');
            $search = $this->input->get('search');
        }
        if(!empty($fields) && !empty($search)){
            $this->load->vars('fields',$fields);
            $parameter['fields'] = $fields;

            $this->load->vars('search',$search);
            $parameter['search'] = $search;
            $data['fields'] = $fields;
            if($search == 'createtime'){
                $data['like'] = strtolower(trim($search));
            }else{
                $data['like'] = trim($search);
            }
        }

        $data['limit'] = PAGESIZE;
        $page = $this->input->get('page');
        $currentPage = $page = isset($page) ? intval($page) : 1;
        $offset = ($page - 1) * PAGESIZE;
        $data['offset'] = $offset;

        //限制服务商
        $data['where'] = array(
            'seller_id' => $_SESSION['shopid']
        );

        $result = $this->Ordermodel->getAllOrder($data);

        $this->load->library('Page');
        if(isset($parameter)){
            $pageObject = new Page($result['total'], PAGESIZE, $currentPage,$parameter);
        }else{
            $pageObject = new Page($result['total'], PAGESIZE, $currentPage);
        }
        $pageObject->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $pages = $pageObject->show();
        $dataShow = array('pages' => $pages, 'datas' => $result['rows']);
        $this->load->view('order/orderList',$dataShow);
    }

    //订单详情
    public function info()
    {
        $order_id = $this->input->get('id');

        //获取订单信息
        $where = array(
            'order_id' => $order_id,
            'seller_id' => $_SESSION['shopid']
        );
        $order_info = $this->Ordermodel->getOrderInfo($where);
        $this->load->vars('order_info',$order_info);

        //获取订单商品信息
        $where = array('order_id'=>$order_id);
        $goods_list = $this->Ordermodel->getOrderGoods($where);
        $this->load->vars('goods_list',$goods_list);

        //获取订单进度条
        $this->load->model('Staffmodel');

        $where = array('order_id'=>$order_id,'shopid'=>$_SESSION['shopid']);
        $order_progress = $this->Ordermodel->getOrderProgress($where);

        $this->load->vars('order_progress',$order_progress);

        //获取订单操作记录
        $where = array('order_id'=>$order_id,'shopid'=>$_SESSION['shopid'],'isFinish'=>1);
        $order_record = $this->Ordermodel->getOrderProgress($where,'updatetime DESC,sort DESC');

        $this->load->vars('order_record',$order_record);

        //获取可执行进度操作
        $enabled = $this->Ordermodel->enabledChange($order_id);
        $this->load->vars('enabled_sort',$enabled);

        $this->load->view('order/orderInfo');

    }

    //修改订单商品进度
    public function changeStatus()
    {
        list($order_id,$goods_id) = explode('_',$this->input->get('id'));
        //获取订单信息
        $where = array(
            'order_id' => $order_id,
            'seller_id' => $_SESSION['shopid']
        );
        $order_info = $this->Ordermodel->getOrderInfo($where);
        $this->load->vars('order_info',$order_info);
        //获取商品信息
        $where = array(
            'order_id' => $order_id,
            'goods_sn' => $goods_id
        );
        $goods_info = $this->Ordermodel->getOrderGoodsInfo($where);
        $this->load->vars('goods_info',$goods_info);

        //获取商品进度流程
        $this->load->model('Goodsmodel');
        $progress_id = $this->Goodsmodel->getGoodsProId($goods_id);
        $progress_list = $this->Goodsmodel->getGoodsProgress($progress_id);
        $this->load->vars('progress_list',$progress_list);

        //获取商品已完成进度
        $where = array(
            'order_id' => $order_id,
            'goods_id' => $goods_id,
            'shopid' => $_SESSION['shopid']
        );
        $has_progress = $this->Ordermodel->getOrderGoodsProgress($where);


        $this->load->view('order/changeStatus');
    }

    //修改商品进度
    public function changeProgress()
    {

        $order_id = $this->input->post('oid');
        $sort = $this->input->post('so');
        $where = array(
            'order_id' => $order_id,
            'sort <= ' => $sort,
            'updatetime' => 0
        );
        $data = array(
            'isFinish' => 1,
            'updatetime' => time(),
            'adminid'=>$_SESSION['userid'],
            'adminname' => $_SESSION['username']
        );
        //获取订单信息
        $order_info = $this->Ordermodel->getOrderInfo(array('order_id'=>$order_id));
        $shop_id = $order_info['seller_id'];
        if($shop_id != $_SESSION['shopid']){
            echo json_encode(array('code'=>1,'mes'=>'修改进度失败'));exit;
        }
        if($this->Ordermodel->changeOrderProgress($where,$data)){
            //判断订单是否全部结束
            if(!$this->Ordermodel->enabledChange($order_id)){
                if($this->finishOrder($order_info)){
                    //记录管理员操作
                    $this->log_insert($_SESSION['username'].':订单号'.$order_info['order_sn'].'进度更新');
                    echo json_encode(array('code'=>0,'sort'=>$sort+1));exit;
                }else{
                    $error_data = array(
                        'ip' => get_client_ip(),
                        'remark' => '订单号'.$order_info['order_sn'].'完单款项未成功转入服务商冻结余额',
                        'createtime' => time()
                    );
                    $this->Logmodel->createErrorLogs($error_data);
                }
            }

            //记录管理员操作
            $this->log_insert($_SESSION['username'].':订单号'.$order_info['order_sn'].'进度更新');

            echo json_encode(array('code'=>0,'sort'=>$sort+1));exit;
        }
        echo json_encode(array('code'=>1,'mes'=>'修改进度失败'));exit;
    }

    private function finishOrder($order_info)
    {
        $order_id = $order_info['order_id'];
        $this->load->model('Membersmodel');
        $this->load->model('Accountmodel');
        $this->load->model('Goodsmodel');

        //更新订单状态
        $update_order = $this->Ordermodel->updateOrder(array('order_id'=>$order_id),array('order_status'=>5,'finish_time'=>time()));

        $order_goods = $this->Ordermodel->getOrderGoods(array('order_id'=>$order_id));

        //代理记账商品

        $agency_account = $this->Goodsmodel->getGoodsId(array('category2'=>6));
        $total_price = 0;

        if($order_goods !== false){
            foreach ($order_goods as $key => $value){
                if(in_array($value['goods_sn'],$agency_account)){


                    //代理记账


                }else{

                    $total_price += $value['goods_price'] * intval($value['goods_count']);
                }
            }
        }

        //转入冻结余额
        $frozen = array(
            'shopid' => $_SESSION['shopid'],
            'money' => $total_price,
            'create_time' => time(),
            'order_id' => $order_id,
            'order_sn' => $order_info['order_sn']
        );
        $account_log = array(
            'log_sn' => account_log_sn(),
            'staff_id' => $_SESSION['userid'],
            'user_money' => $this->Membersmodel->getShopMoney($_SESSION['shopid']),
            'change_time' => time(),
            'change_desc' => '订单号'.$order_info['order_sn'].'完单结账',
            'status_desc' => '转入账户冻结余额',
            'change_money' => $total_price,
            'shopid' => $_SESSION['shopid'],
            'staff_name' => $_SESSION['username'],
            'status' => 3
        );
        $account_res = $this->Accountmodel->createFrozenAccount($frozen,$account_log);
        if($update_order && $account_res){
            return true;
        }
        return false;

    }
}