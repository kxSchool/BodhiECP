<?php

class Comment extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->master = $this->load->database('master', TRUE);
        $this->slave = $this->load->database('slave', TRUE);
    }

    //获取评论列表
    public function commentList($goods_id,$offset,$pagesize)
    {
        $this->master->select('user_id,comment_id,goods_id,content,star_level,tagids,add_time');
        $this->master->where(array('goods_id'=>$goods_id));
        $this->master->limit($pagesize,$offset);
        $comments = $this->master->get('comment');
        $comments = $comments->result_array();
//        echo $this->master->last_query();exit;
        if(empty($comments)){
            return array();
        }
        foreach ($comments as $key=>$value){
            $comments[$key]['tag_list'] = $this->commentTag($value['tagids']);
        }

        return $comments;

    }

    //获取所有评论标签列表
    public function tagList($catid)
    {
        $this->master->select('tagid,tagname,ishot');
        $this->master->where(array('catid'=>$catid));
        $this->master->order_by('listorder');
        $tags = $this->master->get('tag');
        return $tags->result_array();
    }

    //根据评论ids获取评论标签
    public function commentTag($ids)
    {
        $this->master->select('tagid,tagname');
        $this->master->where("tagid in ($ids) and catid = 1");
        $tags = $this->master->get('tag');
        return $tags->result_array();
    }

    //添加评论
    public function insertAll($data)
    {
        return $this->master->insert_batch('comment',$data);
    }

    //查询订单是否已评价
    public function isComment($order_id)
    {

        $this->master->select('order_id');
        $this->master->where(array('order_id'=>$order_id));

        $comments = $this->master->get('comment');
        $comments = $comments->result_array();

        if(empty($comments)){
            return false;
        }
        return true;

    }

    //获取商品评论数量
    public function countComment($goods_id)
    {
        $this->slave->where(array('goods_id'=>$goods_id));
        $this->slave->from('comment');
        return $this->slave->count_all_results();
//        $this->slave->count_all_results();
//        echo $this->slave->last_query();exit;
    }

    //分类获取商品评论数量
    public function countCommentGroup($goods_id)
    {
        $sql = "SELECT star_level,count(star_level) as count from `comment` WHERE goods_id = $goods_id GROUP BY star_level";
        $query = $this->slave->query($sql);
        $result = $query->result_array();
        $query -> free_result();
        return $result;


    }


}