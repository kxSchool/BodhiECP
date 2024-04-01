<?php

class Commentmodel extends CI_Model
{
    public $slave, $master;
    public function __construct()
    {
        parent::__construct();
        $this->slave = $this->load->database('slave', true);
        $this->master = $this->load->database('master', true);
    }

    public function getAllComment($data)
    {
        //（1）查询指定数据
        $result = array();
        $result['rows'] = $this->getCommentList($data);
        //(2)查询总条数
        $where = array();
        if(isset($data['where']) && !empty($data['where'])){
            $where = $data['where'];
        }
        $result['total'] = $this->getCommentCount($where);
        return $result;
    }

    /**
     * 根据条件获取评论列表
     * @param array $data 查询条件数组<br>格式 : [字段=>值,字段=>值]
     * @return boolean||array 返回是否存在或者订单列表
     */
    public function getCommentList($data)
    {

        if(isset($data['select']) && !empty($data['select'])){
            $this->slave->select($data['select']);
        }
        if(isset($data['where']) && !empty($data['where'])){
            $this->slave->where($data['where']);
        }
        $this->slave->order_by('comment_id','DESC');
        $this->slave->limit($data['limit'],$data['offset']);
        $this->slave->from('comment');
        $query = $this->slave->get();
//        echo $this->slave->last_query();exit;
        $result = $query->result_array();
        $query->free_result();

        return $result;
    }

    /**
     * 根据条件获取评论总条数
     * @param array $where 查询条件数组<br>格式 : [字段=>值,字段=>值]
     * @return int 返回订单总条数
     */
    public function getCommentCount($where = array())
    {

        if(!empty($where)){
            $this->slave->where($where);
        }
        $this->slave->from('comment');
        $query = $this->slave->get();
        $result = $query->num_rows();
        $query->free_result();
        return $result;
    }

    /**
     * 获取评论基本信息
     * @param $id int 评论ID
     * @return array||boolean 是否存在结果集
     */
    public function getCommentInfo($id)
    {
        if(empty($id) || !isset($id))
            return false;
        $this->slave->where('comment_id',$id);
        $this->slave->from('comment');
        $query = $this->slave->get();
        $result = $query->row_array();
        $query->free_result();
        return $result;
    }

    /**
     * 获取标签信息
     * @param $ids string 标签id组
     * @return array||boolean 是否存在结果集
     */
    public function getTagsByIds($ids)
    {
        $query = $this->slave->query("SELECT * FROM `tag` WHERE `tagid` IN($ids) ORDER BY `listorder`");
//        $this->slave->where_in('tagid',$ids);
//        $this->slave->order_by('listorder');
//        $this->slave->from('tag');
//        $query = $this->slave->get();
        $result = $query->result_array();

//        echo $this->slave->last_query();exit;
        $query->free_result();
        return $result;
    }

    /**
     * 更新评论信息
     * @param $data
     * @return bool
     */
    public function updateComment($data)
    {
        if(!isset($data['comment_id']) || empty($data['comment_id'])){
            return false;
        }
        $id = $data['comment_id'];
        unset($data['comment_id']);
        return $this->master->update('comment',$data,array('comment_id'=>$id));
    }

    /**
     * 添加评论
     * @param $data
     * @return bool
     */
    public function insertComment($data)
    {
        if(count($data) != count($data, 1)){
            //多条
            return $this->master->insert_batch('comment', $data);
        }else{
            //单条
            if($this->master->insert('comment',$data)){
                return $this->master->insert_id();
            }
            return false;
        }
    }

    /**
     * 获取评论标签列表
     * @return mixed
     */
    public function getCommentTags()
    {
        $this->slave->where('catid',1);
        $this->slave->from('tag');
        $this->slave->order_by('listorder');
        $query = $this->slave->get();
        $result = $query->result_array();
        $query->free_result();
        return $result;
    }
}