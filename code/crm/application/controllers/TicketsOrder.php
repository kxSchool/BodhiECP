<?php
/**
 * Created by PhpStorm.
 * User: as
 * Date: 2018/4/25
 * Time: 17:57
 */
class TicketsOrder extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination'); //系统的library
        $this->load->model('ordermodel','ticketsorder');    //调数据库数据
        $this->load->helper('url');       //系统的帮助类
    }
    //订单管理
    public function order(){
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
            if($search == 'action_user'){
                $data['like'] = strtolower(trim($search));
            }else{
                $data['like'] = trim($search);
            }
        }

        $data['limit'] = PAGESIZE;
        $page = $this->input->get('page');
        $page = !empty($page) ? $page : 1;
        $currentPage = $page = isset($page) ? intval($page) : 1;
        $offset = ($page - 1) * PAGESIZE;
        $data['offset'] = $offset;
        $result = $this->ticketsorder->getAllVenues($data);
        foreach($result['rows'] as &$v){
            if(isset($v['action_user']) && !empty($v['action_user'])){
                $v['action_user'] = $this->config->item('url') . $v['action_user'];
            }
        }
        $this->load->library('Page');
        if(isset($parameter)){
            $pageObject = new Page($result['total'], PAGESIZE, $currentPage,$parameter);
        }else{
            $pageObject = new Page($result['total'], PAGESIZE, $currentPage);
        }
        $pageObject->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
        $pages = $pageObject->show();
        $dataShow = array('pages' => $pages, 'datas' => $result['rows']);

        $this->load->view('Order/order',$dataShow);


    }
  
   //查看订单
   /*public function detailOrde()
   {
       $id = $this->input->get('order_id');
       $sql = "select order_id,order_sn from order_info where order_sn=(select max(order_sn))";
       $datas = $this->db->query($sql)->result_array();
      // print_R($datas);die;
        //$tab = [];
        $this->load->view('order/orderDetail',['datas'=>$datas]);
   }*/
}