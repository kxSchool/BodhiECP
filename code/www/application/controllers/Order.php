<?php

class Order extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Goods');
        $this->load->model('OrderInfo');
        //未登录，先进行登录
        if(!isLogin()){
            $_SESSION['cache_data']['userurl'] = $_SERVER["HTTP_REFERER"];
            redirect('user/login');exit;
        }else{
            unset($_SESSION['cache_data']['userurl']);
        }
    }

    //确认订单
    public function confirm()
    {

        $ids = $this->input->get('id');

        $goods_ids = explode('_',$ids);

        $this->data['order_list'] = array();

        $this->data['total_price'] = 0;
        //订单主要商品
        $master_goods = array();
        //商品总价格
        $goods_amount = 0;
        foreach ($goods_ids as $key => $value){

            if($value == 0){
                continue;
            }
            $this->data['order_list'][$key]['price'] = $this->Goods->getPrice($value,$_SESSION['cache_region']['aid']);
            $goods_amount += $this->data['order_list'][$key]['price'];
            $this->data['order_list'][$key]['region'] = $_SESSION['cache_region']['region'];
            $this->data['order_list'][$key]['city'] = $_SESSION['cache_region']['cid'];
            $this->data['order_list'][$key]['district'] = $_SESSION['cache_region']['aid'];
            $this->data['order_list'][$key]['province'] = $_SESSION['cache_region']['pid'];
            if($key == 0){
                $this->data['order_list'][$key]['cname'] = $this->Category->getCateNameByGid($value);
            }else{
                $this->data['order_list'][$key]['cname'] = '关联服务';
            }

            $goods_info = $this->Goods->getGoodsInfo($value);

            if($key == 0){
                $master_goods = $goods_info;
            }

            $this->data['order_list'][$key]['gname'] = $goods_info['all_name'];
            $this->data['order_list'][$key]['is_count'] = $goods_info['is_count'];

            $this->data['order_list'][$key]['gid'] = $value;
            $this->data['order_list'][$key]['pic'] = $this->Goods->getGoodsPic($value);

            $this->data['total_price'] += $this->data['order_list'][$key]['price'];
        }

        //生成订单
        //商品订单号
        $order['order_sn'] = date('Ymd').rand(1000,9999).substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 5, 13), 1))), 4, 6);
        $order['pay_status'] = 0;   //未付款
        $order['order_amount'] = $this->data['total_price'];   //總金額
        $order['add_time'] = time();
        $order['goods_amount'] = $goods_amount;
        $order['order_type'] = $master_goods['category1'];
        $order['province'] = $_SESSION['cache_region']['pid'];
        $order['city'] = $_SESSION['cache_region']['cid'];
        $order['district'] = $_SESSION['cache_region']['aid'];
        $order['address'] = $_SESSION['cache_region']['region'];

        //獲取用戶信息
        $user_info = $this->Member->getInfoById($_SESSION['user']['userid']);
        $order['user_id'] = $user_info['userid'];
        $order['mobile'] = $user_info['mobile'];
        $order['order_status'] = 0;
        $order_id = $this->OrderInfo->createOrder($order);

        $this->OrderInfo->insertOrderGoodsAll($order_id,$goods_ids,$order['district']);

        session('orderid',$order_id);
        $this->data['order_id'] = $order_id;
        $this->load->view('order/confirm',$this->data);
    }

    //订单支付
    public function pay()
    {

        if(IS_GET){
            $type = $this->input->get('type');
            $order_id = isset($_GET['oid']) ? $this->input->get('oid') : $_SESSION['orderid'];
            $data = $this->OrderInfo->getOrderById($order_id);
            $data['order_name'] = $this->OrderInfo->getOrderGoodsName($order_id);
            if($type === 'alipay'){
                $this->alipay($data);
            }
            if($type === 'wxpay'){
                $this->wxpay($data);
            }
        }
        $this->data['order_id'] = isset($_GET['oid']) ? $this->input->get('oid') : $_SESSION['orderid'];
        $this->load->view('order/pay',$this->data);
    }

    //订单列表
    public function orderList()
    {
        $type = $this->input->get('type');

        $this->load->vars('search',$type);
        if($type == 'wait'){
            $where = array('order_status'=>0);
        }elseif ($type == 'has'){
            $where = array('order_status'=>1);
        }else{
            $where = array('delete_time'=>'');
        }
        //一共有多少条数据
        $count=$this->OrderInfo->orderNum($where);
        //每页展示数量
        $page_size = 8;

        $this->data['link'] = $this->pagination(site_url("order/orderList"),$page_size,$count);

        //传入的数据
        if(isset($_REQUEST['p'])){
            $offset = $this->input->get('p');
//            $offset = ($offset-1)*$page_size;
        }else{
            $offset = 0;
        }

        $this->data['order_goods'] = $this->OrderInfo->orderList($offset,$page_size,$where);
//        dump($this->data['order_goods']);exit;
        $this->load->view('order/index',$this->data);

    }

    //支付寶支付
    private function alipay($data)
    {

        // 加载支付宝支付
        require_once './pay/alipay/page/pagepay/service/AlipayTradeService.php';
        require_once './pay/alipay/page/pagepay/buildermodel/AlipayTradePagePayContentBuilder.php';

        //商品订单号
        $out_trade_no = $data['order_sn'];

        $body = $data['order_name'] ;    //商品描述
        $subject = $data['order_name'] ;    //订单名称
        $total_amount = $data['order_amount'];     //订单金额

        $return_url="https://www.kxschool.com/pay/alipay/page/return_url.php";
        $notify_url="https://www.kxschool.com/pay/alipay/page/notify_url.php";

        $payRequestBuilder = new AlipayTradePagePayContentBuilder();
        $payRequestBuilder->setBody($body);
        $payRequestBuilder->setSubject($subject);
        $payRequestBuilder->setOutTradeNo($out_trade_no);
        $payRequestBuilder->setTotalAmount($total_amount);

        $payResponse  = new AlipayTradeService($config);
        $payResponse->pagePay($payRequestBuilder,$return_url,$notify_url);

    }

    //微信支付
    private function wxpay($datas)
    {
        // 加载微信支付
        //商品订单号
        $data['order_id'] = $datas['order_id'];
        $data["Out_trade_no"] = date('Ymd').rand(1000,9999).substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 5, 13), 1))), 4, 12);
        $data["Body"] = 'test';     //商品或支付单简要描述
        $data["Total_fee"] = $datas['order_amount']*100; //商品总金额
        $data["trade_type"] = 'NATIVE'; //类型
        $data["Attach"] = 'test'; //
        $data["Goods_tag"] = 'test'; //
        $data["Notify_url"] = 'https://www.kxschool.com/pay/wxpay/example/notify.php'; //
        $_SESSION["order_info"]=$data;

        header("Location: https://www.kxschool.com/pay/wxpay/example/native.php");
    }

    //分页操作多岁的
    private function pagination($url,$page_size=20,$total_rows)
    {
        //装载类文件
        $this->load->library('pagination');
        //每一页显示的数据条数的变量

        $config['base_url']=$url;

        $config['full_tag_open'] = '<ul class="paginations">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="pre-page">';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="next-page">';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'p';
        $config['attributes'] = array('class' => 'myclass');//给所有<a>标签加上class

        //每一页显示的数据条数
        $config['per_page']=$page_size;
        $config['first_link']= '<<';
        $config['next_link']= '下一页';
        $config['prev_link']= '上一页';
        $config['last_link']= '>>';

        //一共有多少条数据
        $config['total_rows']=$total_rows;

        //初始化 ，传入配置？？？？
        $this->pagination->initialize($config);
        return $this->pagination->create_links();
    }

    //用户评价
    public function newComment()
    {
        $this->load->model('Comment');
        if(IS_AJAX){
            $order_id = $this->input->post('order_id');

            //查看是否有该订单
            if(!$this->OrderInfo->hasOrder($order_id)){
                echo json_encode(array('code'=>1,'mes'=>'找不到该订单号'));exit;
            }

            //查看订单是否已经评价
            if($this->Comment->isComment($order_id)){
                echo json_encode(array('code'=>1,'mes'=>'该订单已评价'));exit;
            }

            //获取订单所有商品
            $order_goods = $this->OrderInfo->getGoodsByOrder($order_id);

            //一次评论所有商品
            $comment = array();
            foreach ($order_goods as $key=>$value){
                $comment[$key]['goods_id'] = $value['goods_sn'];
                $comment[$key]['order_id'] = $order_id;
                $comment[$key]['content'] = $this->input->post('content');
                $comment[$key]['user_id'] = $_SESSION['user']['userid'];
                $comment[$key]['professional'] = $this->input->post('professional');
                $comment[$key]['effect'] = $this->input->post('effect');
                $comment[$key]['attitude'] = $this->input->post('attitude');
                $comment[$key]['tagids'] = rtrim($this->input->post('tags'),',');
                $comment[$key]['add_time'] = time();
                $comment[$key]['star_level'] = ceil(($comment[$key]['professional']+$comment[$key]['effect']+$comment[$key]['attitude'])/3);
            }

            $comment_status = $this->Comment->insertAll($comment);

            if($comment_status){

                $this->OrderInfo->update(array('order_status'=>6),array('order_id'=>$order_id));
                $url = site_url('user/index');
                echo json_encode(array('code'=>0,'mes'=>'评价成功','url'=>$url));exit;

            }else{

                echo json_encode(array('code'=>1,'mes'=>'评价失败'));exit;

            }
        }else{
            //获取订单id
            $order_id = isset($_GET['oid']) ? $this->input->get('oid') : '';
            if(empty($order_id)){
                $this->showError('order/orderList',3,'未知的订单号');exit;
            }
            //查看是否有该订单
            $res = $this->OrderInfo->hasOrder($order_id);
            if(!$res){
                $this->showError('order/orderList',3,'该订单不存在');exit;
            }


            $this->data['order_id'] = $order_id;

            //获取评论下标签列表
            $catid = 1;

            $this->data['tags'] = $this->Comment->tagList($catid);

            $this->load->view('comment/add',$this->data);
        }

    }

    //查看进度
    public function progress()
    {
        $order_id = $this->input->get('oid');
        $progress = $this->OrderInfo->getOrderProgress($order_id);
        foreach ($progress as $key => $value){
            $week = date('w',strtotime($value['updatetime']));
            switch ($week){
                case 1:
                    $progress[$key]['week'] = '周一';
                    break;
                case 2:
                    $progress[$key]['week'] = '周二';
                    break;
                case 3:
                    $progress[$key]['week'] = '周三';
                    break;
                case 4:
                    $progress[$key]['week'] = '周四';
                    break;
                case 5:
                    $progress[$key]['week'] = '周五';
                    break;
                case 6:
                    $progress[$key]['week'] = '周六';
                    break;
                case 7:
                    $progress[$key]['week'] = '周日';
                    break;
            }
        }
//        dump($progress);exit;
        $this->load->vars('progress',$progress);
        $this->load->view('order/progress');
//        $this->load->view('comment/add',$this->data);
    }

    //ajax取消订单
    public function cancelOrder()
    {
        if(IS_AJAX){

            $oid = $this->input->get('oid');
            if(!$this->OrderInfo->isPay($oid)){
                echo json_encode(array('code'=>1,'mes'=>'订单状态异常'));exit;
            }

            $res = $this->OrderInfo->cancelOrderById($oid);

            if($res){
                echo json_encode(array('code'=>0,'mes'=>'取消成功'));exit;
            }

            echo json_encode(array('code'=>1,'mes'=>'error'));exit;
        }

    }

}