<?php
/**
 * Created by PhpStorm.
 * User: as
 * Date: 2018/4/28
 * Time: 18:18
 */
class AccountLog extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination'); //系统的library
        $this->load->model('accountmodel', 'accountlog');    //调数据库数据
        $this->load->helper('url');       //系统的帮助类

    }
    //资金管理
    public function accountlog()
    {
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
            if($search == 'admin_user'){
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
        $result = $this->accountlog->getAllVenues($data);
        foreach($result['rows'] as &$v){
            if(isset($v['admin_user']) && !empty($v['admin_user'])){
                $v['admin_user'] = $this->config->item('url') . $v['admin_user'];
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

        $this->load->view('accountlog/accountlog',$dataShow);
    }
}