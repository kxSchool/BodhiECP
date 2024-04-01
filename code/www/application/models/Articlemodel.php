<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/20
 * Time: 9:29
 */

class Articlemodel extends CI_Model
{
    public function __construct()
    {
        $this->slave = $this->load->database('slave', TRUE);
    }

    /**
     * 根据条件获取文章信息
     * @param $where
     * @return mixed
     */
    public function getArticleInfo($where)
    {
        $this->slave->from('news');
        $this->slave->where($where);
        $query = $this->slave->get();
        $result = $query->row_array();
        return $result;
    }

    public function getNearArticle($id)
    {
        $where_in = "$id-1,$id+1";
        $where = array('isshow'=>1,'isdel'=>0);
        $this->slave->select('title,id');
        $this->slave->from('news');
        $this->slave->where_in($where_in);
        $this->slave->where($where);
        $query = $this->slave->get();
        $result = $query->result_array();
        return $result;
    }

    public function getArticleList($condition)
    {
        if(isset($condition['where']) && !empty($condition['where'])){
            $this->slave->where($condition['where']);
        }
        if(isset($condition['limit']) && !empty($condition['limit'])){
            $this->slave->limit($condition['limit']);
        }
        $this->slave->select('title,id');
        $this->slave->from('news');
        $query = $this->slave->get();
        $result = $query->result_array();
        return $result;
    }

    public function getGoodsArticle($goods_id)
    {
        if(!isset($goods_id) && empty($goods_id)){
            return false;
        }
        $this->slave->select('title,id');
        $this->slave->from('goods_news as gn');
        $this->slave->join('news as n ','gn.news_id=n.id','LEFT');

        $this->slave->where(array(
            'n.isshow'=>1,
            'n.isdel'=>0,
            'gn.goods_id'=>$goods_id
        ));
        $this->slave->order_by('views','DESC');
        $this->slave->limit(6);
        $query = $this->slave->get();
        $result = $query->result_array();
//        echo $this->slave->last_query();exit;
        return $result;
    }
}