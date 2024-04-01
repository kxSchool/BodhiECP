<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends MY_Controller {

    private $orderdb;

    private $memberdb;

    public function __construct() {
        parent::__construct();
        $this -> load -> model('Ordermodel');
        $this -> load -> model('Membersmodel');
        $this -> orderdb = $this->Ordermodel;
        $this -> memberdb = $this->Membersmodel;
    }

    /**
     * 订单列表
     */
    public function index()
    {

        if($this->input->get()){
            $this->load->vars('search',$this->input->get());
        }

        if($this->input->get('order_sn')){
            $data['where']['order_sn'] = $this->input->get('order_sn');
        }
        if($this->input->get('status')){
            switch ($this->input->get('status')){
                case 1:
                    $data['where']['order_status'] = 0;
                    break;
                case 2:
                    $data['where']['order_status'] = 1;
                    $data['where']['seller_id'] = 0;
                    break;
                case 3:
                    $data['where']['order_status'] = 1;
                    $data['where']['seller_id <>'] = 0;
                    break;
                case 4:
                    $data['where']['order_status'] = 5;
                    break;
                case 5:
                    $data['where']['order_status'] = 6;
                    break;
                case 6:
                    $data['where']['order_status'] = 4;
                    break;
            }

        }
        if($this->input->get('add_time')){
            $data['where']['add_time >='] = strtotime($this->input->get('order_sn').'000000');
            $data['where']['add_time <='] = strtotime($this->input->get('order_sn').'235959');
        }

        $data['limit'] = PAGESIZE;
        $page = $this->input->get('page');
        $currentPage = $page = isset($page) ? intval($page) : 1;
        $offset = ($page - 1) * PAGESIZE;
        $data['offset'] = $offset;

        $result = $this->orderdb->getAllOrder($data);

        $this->load->library('Page');
        if(isset($parameter)){
            $pageObject = new Page($result['total'], PAGESIZE, $currentPage,$parameter);
        }else{
            $pageObject = new Page($result['total'], PAGESIZE, $currentPage);
        }
        $pageObject->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $pages = $pageObject->show();
        $dataShow = array('pages' => $pages, 'datas' => $result['rows']);
//dump($result);exit;
        $this -> load -> view('order/list',$dataShow);
    }

    /**
     * 导出订单
     */
    public function exportOrder()
    {

        if($this->input->get('order_sn')){
            $data['where']['order_sn'] = $this->input->get('order_sn');
        }
        if($this->input->get('add_time')){
            $data['where']['add_time >='] = strtotime($this->input->get('order_sn').'000000');
            $data['where']['add_time <='] = strtotime($this->input->get('order_sn').'235959');
        }
        $data['select'] = 'order_sn,seller_id,order_status,address,mobile,order_amount,add_time';
        $list = $this->orderdb->getOrderList($data);
        foreach ($list as $key => $value){
            foreach ($value as $k => $v){
                if($k == 'order_sn'){
                    $list[$key][$k] = ' '.$v;
                }
            }
        }
        $header = array(
            '订单编号','服务商','订单状态','地址','联系方式','订单总额','创建时间'
        );
        $this->getExcel('订单列表',$header,$list);exit;
    }

    /**
     * 选择服务商
     */
    public function selectAgency()
    {
        if($this->input->get()){
            $this->load->vars('search',$this->input->get());
        }
        if($this->input->get('name')){
            $data['like']['username'] = $this->input->get('name');
        }
        $data['limit'] = PAGESIZE;
        $page = $this->input->get('page');
        $currentPage = $page = isset($page) ? intval($page) : 1;
        $offset = ($page - 1) * PAGESIZE;
        $data['offset'] = $offset;

        $result = $this->memberdb->getAgencyList($data);

        $this->load->library('Page');
        if(isset($parameter)){
            $pageObject = new Page($result['total'], PAGESIZE, $currentPage,$parameter);
        }else{
            $pageObject = new Page($result['total'], PAGESIZE, $currentPage);
        }
        $pageObject->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $pages = $pageObject->show();
        $dataShow = array('pages' => $pages, 'datas' => $result['rows']);
        $this -> load -> view('order/agencyList',$dataShow);
    }

    /**
     * 派单到服务商
     */
    public function allot()
    {
        if(IS_AJAX){
            if(!$this->input->post('order_id') || !$this->input->post('uid')){
                echo json_encode(array('code'=>1,'msg'=>'参数错误'));exit;
            }
            $order_id = $this->input->post('order_id');
            $user_id = $this->input->post('uid');
            $data['seller_id'] = $user_id;
            $data['shipping_time'] = time();
            if($this->orderdb->isUsable($order_id)){
                //创建订单进度
                $curl=curl_init();  //初始化curl句柄
                $url="http://admin.bodhitest.com/api/createOrderProgress?order_id=$order_id&user_id=$user_id";  //要请求的url地址

                curl_setopt($curl, CURLOPT_URL,$url);  //设置curl的参数，即要请求的url是$url
                curl_exec($curl);  //执行操作
                curl_close($curl);  //关闭句柄

                if($this->orderdb->allotOrder($order_id,$data)){
                    $this->createAdminLog('派单到服务商：订单ID'.$order_id);
                    echo json_encode(array('code'=>0,'msg'=>'派单成功'));exit;
                }
                echo json_encode(array('code'=>1,'msg'=>'派单失败'));exit;
            }
            echo json_encode(array('code'=>1,'msg'=>$this->orderdb->error));exit;
        }
    }

    /**
     * 订单详情
     */
    public function info()
    {
        $order_id = $this->input->get('id');

        //获取订单信息
        $order_info = $this->Ordermodel->getOrderInfo($order_id);
        $this->load->vars('order_info',$order_info);

        //获取订单商品信息
        $goods_list = $this->Ordermodel->getOrderGoods($order_id);
        $this->load->vars('goods_list',$goods_list);

        //获取订单进度条
        $order_progress = $this->Ordermodel->getOrderProgress(array('order_id'=>$order_id));
        $this->load->vars('order_progress',$order_progress);

        //获取订单操作记录
        $order_record = $this->Ordermodel->getOrderProgress(array('order_id'=>$order_id,'isFinish'=>1),'updatetime DESC,sort DESC');
        $this->load->vars('order_record',$order_record);

        $this->load->view('order/orderInfo');
    }
}
