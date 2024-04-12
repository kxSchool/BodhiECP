<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/20
 * Time: 9:13
 */

class Article extends MY_Controller
{
    private $articledb ;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Articlemodel');
        $this->articledb = $this->Articlemodel;
    }

    public function news()
    {
        $id = $this->input->get('id');
        if(!$id){
            $this->showError($_SERVER['HTTP_REFERER']);exit;
        }
        $where = array(
            'id'=>$id,
            'isshow' => 1,
            'isdel' => 0,
        );
        $info = $this->articledb->getArticleInfo($where);
        $list = $this->articledb->getNearArticle($id);
        $near = array();
        foreach ($list as $key=>$value){
            if($value['id'] > $id){
                $near['next'] = $list[$key];
            }else{
                $near['prev'] = $list[$key];
            }
        }
        $this->load->vars('info',$info);
        $this->load->vars('near',$near);
        $this->load->view('article/news',$this->data);
    }

    public function relevantArticle()
    {
        if(IS_AJAX){
            $count = $this->input->get('$count') ? $this->input->get('$count') : 6;

            $condition['where']  = array('isshow'=>1,'isdel'=>0,'recommend'=>1);
            $condition['limit']  = $count;
            $list = $this->articledb->getArticleList($condition);
            if($list){
                echo json_encode(array('code'=>0,'data'=>$list));exit;
            }
            echo json_encode(array('code'=>1,'msg'=>'获取失败'));exit;
        }
    }

    public function goodsArticle()
    {
        if(IS_AJAX){
            $goods_id = $this->input->get('goods_id');
            if(!$goods_id){
                echo json_encode(array('code'=>1,'msg'=>'参数错误'));exit;
            }

            $list = $this->articledb->getGoodsArticle($goods_id);
            
            if($list){
                echo json_encode(array('code'=>0,'data'=>$list));exit;
            }
            echo json_encode(array('code'=>1,'msg'=>'获取失败'));exit;
        }
    }
}