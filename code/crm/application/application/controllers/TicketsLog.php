<?php
/**
 * Created by PhpStorm.
 * User: as
 * Date: 2018/4/28
 * Time: 10:18
 */
class TicketsLog extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination'); //系统的library
        $this->load->model('Logmodel', 'ticketslog');    //调数据库数据
        $this->load->helper('url');       //系统的帮助类

    }

    //日志管理
    public function ticketslog()
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
        $result = $this->ticketslog->getAllVenues($data);
        foreach($result['rows'] as &$v){
            if(isset($v['createtime']) && !empty($v['createtime'])){
                $v['createtime'] = $this->config->item('url') . $v['createtime'];
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

        $this->load->view('TicketsLog/ticketslog',$dataShow);
    }
    /*
         * 删除日志
         */
    public function del(){
        $id = $this->input->get('id');
        //echo $id;
        $db = $this->load->database('log', true);//用来连接数据库名
        $resalt = $db->where("id in($id)")->delete('log_201804');
        if($resalt){
            header("refresh:2;url=ticketslog");
            $this->load->view('TicketsLog/ticketslog');
        }else{
            header("refresh:2;url=ticketslog");
            print('删除失败，2秒后跳到列表页');
        }

    }
    //修改日志
    public function update(){
        $db = $this->load->database('log', true);//用来连接数据库名
        $post = $this->input->post();
        if(!empty($post)){
            $id = $post['id'];
            unset($post['id']);
            $db->where(['id' => $id])->update('log_201804', $post);
            return redirect('TicketsLog/ticketslog');
        }
        $id=$this->input->get('id');
        $datas = $db->where(array('id'=>$id))->get('log_201804')->row_array();
        return $this->load->view('TicketsLog/update',array('datas'=>$datas));
    }
}