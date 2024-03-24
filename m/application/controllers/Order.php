<?php

class Order extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Goods_model');
        $this->load->model('Category_model');
        $this->load->model('Order_model');
        $this->load->model('Comment');

        if(!isLogin()){
            $_SESSION['cache_data']['userurl'] = $_SERVER["HTTP_REFERER"];
            redirect('user/login');exit;
        }
    }

    //訂單列表
    public function index()
    {

        $data['order_goods'] = $this->Order_model->orderList($_SESSION['user']['userid']);

        $this->load->view('order/order',$data);

    }

    //支付页面
    public function pay()
    {
        if(IS_POST){

            $type = $this->input->post('paytype');
            $orderid = $this->input->post('order');
            $order = $this->Order_model->getOrderById($orderid);

            if($type == 'wxpay'){
                $this->wxpay($order);
            }elseif ($type == 'alipay'){
                $this->alipay($order);
            }

        }else{

            if(!empty($_GET['oid'])){

                $oid = $this->input->get('oid');
                $data = $this->Order_model->getOrderById($oid);

            }else{

                $data = $_SESSION['order'];

            }

            $this->load->view('order/pay',$data);

        }

    }

    //确认订单
    public function confirm()
    {

        $ids = $this->input->get('id');

        $region_id = $_SESSION['cache_data']['areaid'];

        //计算价格
        $goods_ids = explode('_',$ids);

        $data['order_list'] = array();
        $data['total_price'] = 0;
        //订单主要商品
        $master_goods = array();
        //商品总价格
        $goods_amount = 0;
        foreach ($goods_ids as $key => $value){
            $data['order_list'][$key]['price'] = $this->Goods_model->getPrice($value,$region_id);
            $goods_amount += $data['order_list'][$key]['price'];
            $data['order_list'][$key]['region'] = $_SESSION['cache_data']['region'];
            $data['order_list'][$key]['city'] = $_SESSION['cache_data']['cityid'];
            $data['order_list'][$key]['district'] = $_SESSION['cache_data']['areaid'];
            $data['order_list'][$key]['province'] = $_SESSION['cache_data']['provinceid'];
            if($key == 0){

                $data['order_list'][$key]['cname'] = $this->Category_model->getCateNameByGid($value);

            }else{

                $data['order_list'][$key]['cname'] = '关联服务';

            }

            $goods_info = $this->Goods_model->getGoodsInfo($value);
            if($key == 0){
                $master_goods = $goods_info;
            }
            $data['order_list'][$key]['gname'] = $goods_info['all_name'];
            $data['order_list'][$key]['is_count'] = $goods_info['is_count'];

            $data['order_list'][$key]['gid'] = $value;

            $data['total_price'] += $data['order_list'][$key]['price'];
        }

        //生成订单
        //商品订单号
        $order['order_sn'] = date('Ymd').rand(1000,9999).substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 5, 13), 1))), 4, 6);

        $order['pay_status'] = 0;   //未付款

        $order['order_amount'] = $data['total_price'];   //總金額

        $order['add_time'] = time();
        $order['province'] = $_SESSION['cache_data']['provinceid'];
        $order['city'] = $_SESSION['cache_data']['cityid'];
        $order['district'] = $_SESSION['cache_data']['areaid'];
        $order['address'] = $_SESSION['cache_data']['region'];
        $order['order_type'] = $master_goods['category1'];
        $order['goods_amount'] = $goods_amount;
        //獲取用戶信息
        $user_info = $this->Member_model->getUserInfo($_SESSION['user']['userid']);
        $order['user_id'] = $user_info['userid'];
        $order['mobile'] = $user_info['mobile'];
        $order['order_status'] = 0;
        $order_id = $this->Order_model->createOrder($order);

        $this->Order_model->insertOrderGoodsAll($order_id,$goods_ids,$order['district']);

        $_SESSION['order']['order_id'] = $order_id;
        $_SESSION['order']['order_amount'] = $data['total_price'];

        $data['order_id'] = $order_id;
        $this->load->view('order/confirm',$data);
    }

    //支付寶支付
    private function alipay($data)
    {

        // 加载支付宝支付
        require_once './pay/alipay/wap/alipay.trade.wap.pay-PHP-UTF-8/wappay/service/AlipayTradeService.php';
        require_once './pay/alipay/wap/alipay.trade.wap.pay-PHP-UTF-8/wappay/buildermodel/AlipayTradeWapPayContentBuilder.php';

        //商品订单号
        $out_trade_no = $data['order_sn'];

        $body = 'XXXXX' ;    //商品描述
        $subject = 'XXXXX' ;    //订单名称
        $total_amount = $data['order_amount'];     //订单金额
        $timeout_express = '1m';  //超出时间

        $return_url="https://m.kxschool.com/pay/alipay/wap/alipay.trade.wap.pay-PHP-UTF-8/return_url.php";
        $notify_url="https://m.kxschool.com/pay/alipay/wap/alipay.trade.wap.pay-PHP-UTF-8/notify_url.php";


        $payRequestBuilder = new AlipayTradeWapPayContentBuilder();
        $payRequestBuilder->setBody($body);
        $payRequestBuilder->setSubject($subject);
        $payRequestBuilder->setOutTradeNo($out_trade_no);
        $payRequestBuilder->setTotalAmount($total_amount);
        $payRequestBuilder->setTimeExpress($timeout_express);


        $payResponse  = new AlipayTradeService($config);
        $result=$payResponse->wapPay($payRequestBuilder,$return_url,$notify_url);

    }

    //微信支付
    private function wxpay($datas)
    {
        // 加载微信支付
        //商品订单号
//        $data["Out_trade_no"] = date('Ymd').rand(1000,9999).substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 5, 13), 1))), 4, 12);
        $data["order_id"] = $datas['order_id'];
        $data["Body"] = 'test';     //商品或支付单简要描述
        $data["Total_fee"] = $datas['order_amount']*100; //商品总金额
        $data["trade_type"] = 'JSAPI'; //类型
        $data["Attach"] = 'test'; //
        $data["Goods_tag"] = 'test'; //
        $data["Notify_url"] = 'https://m.kxschool.com/pay/wxpay/example/notify.php'; //
        $_SESSION["data"]=$data;
        header("Location: https://m.kxschool.com/pay/wxpay/example/jsapi.php");
    }

    //用戶評論
    public function comment()
    {
        if(IS_POST){

            $order_id = $this->input->post('order_id');

            //查看订单是否已经评价
            if($this->Comment->isComment($order_id)){
                $this->showError('order/index',2,'该订单已评价');exit;
            }

            //查看是否有该订单
            if(!$this->Order_model->hasOrder($order_id)){
                $this->showError('order/index',2,'找不到该订单号');exit;
            }

            //获取订单所有商品
            $order_goods = $this->Order_model->getGoodsByOrder($order_id);

            //一次评论所有商品

            $tagids = rtrim($this->input->post('tags'),',');
            $comment = array();
            foreach ($order_goods as $key=>$value){
                $comment[$key]['goods_id'] = $value['goods_sn'];
                $comment[$key]['order_id'] = $order_id;
                $comment[$key]['content'] = $this->input->post('content');
                $comment[$key]['user_id'] = $_SESSION['user']['userid'];
                $comment[$key]['professional'] = $this->input->post('professional');
                $comment[$key]['effect'] = $this->input->post('effect');
                $comment[$key]['attitude'] = $this->input->post('attitude');
                $comment[$key]['tagids'] = $tagids;
                $comment[$key]['add_time'] = time();
                $comment[$key]['star_level'] = ceil(($comment[$key]['professional'] + $comment[$key]['effect']+$comment[$key]['attitude'])/3);
            }

            $comment_status = $this->Comment->insertAll($comment);

            if($comment_status){

                $this->Order_model->update(array('order_status'=>6),array('order_id'=>$order_id));
                $url = site_url('user/index');
                Header("refresh:0.3;url='$url'");

            }else{

                $this->showError('order/index',2,'评价失败，请稍后再试');exit;

            }

        }else{
            //获取订单id
            $order_id = isset($_GET['oid']) ? $this->input->get('oid') : '';

            if(empty($order_id)){

                $this->showError('order/index',2,'未知的订单号');exit;

            }

            $data['order_id'] = $order_id;

            //获取评论下标签列表
            $catid = 1;

            $data['tags'] = $this->Comment->tagList($catid);

            $this->load->view('order/review',$data);
        }

    }

    //ajax取消订单
    public function cancelOrder()
    {
        if(IS_AJAX){

            $oid = $this->input->get('oid');
            if(!$this->Order_model->isPay($oid)){
                echo json_encode(array('code'=>1,'mes'=>'订单状态异常'));exit;
            }

            $res = $this->Order_model->cancelOrderById($oid);

            if($res){
                echo json_encode(array('code'=>0,'mes'=>'取消成功'));exit;
            }

            echo json_encode(array('code'=>1,'mes'=>'error'));exit;
        }

    }

    //订单进度
    public function orderProgress()
    {
        $order_id = $this->input->get('oid');
        $progress = $this->Order_model->getOrderProgress($order_id);
        $order_info = $this->Order_model->getOrderInfo($order_id);
//        dump($progress);exit;
        $this->load->vars('progress',$progress);
        $this->load->vars('pay_time',$order_info['pay_time']);
        $this->load->view('order/progress');
    }

    //修改订单商品数量
    public function changeOrder()
    {
        if(IS_AJAX){
            $this->load->model('Goods_model');
            $order_id = $this->input->post('oid');
            $goods_id = $this->input->post('gid');
            $goods_num = $this->input->post('num');
            if($goods_num < 1 || $goods_num > 45){
                echo json_encode(array('code'=>1,'mes'=>'incorrect number !'));exit;
            }


            //計算價格
            $price_expression = $this->Goods_model->getPrice($goods_id,0,$goods_num);

            if($goods_num != 1){
                $price_expression = preg_replace('/num/',$goods_num,$price_expression);

                $price = 0;
                eval("\$price = $price_expression");
               
            }else{
                $price = $price_expression;
            }

            $where = array(
                'goods_sn' => $goods_id,
                'order_id' => $order_id,
            );
            $data = array('goods_count'=>$goods_num,'goods_price'=>$price,'order_amount'=>$price);
            if($this->Order_model->editOrderGoods($where,$data)){
                $price=sprintf("%.2f", intval($price));
                echo json_encode(array('code'=>0,'mes'=>'success','price'=>$price));exit;

            }
            echo json_encode(array('code'=>1,'mes'=>'error','price'=>$price));exit;
        }

    }

}