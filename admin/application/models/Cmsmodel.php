<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/14
 * Time: 14:11
 */

class Cmsmodel extends CI_Model
{
    private $master;
    private $slave;
    public function __construct()
    {
        parent::__construct();
        $this->slave = $this->load->database('slave', true);
        $this->master = $this->load->database('master', true);
    }

    /**
     * 获取所有栏目
     */
    public function getAllChannel($data)
    {
        //（1）查询指定数据
        $result = array();
        $result['rows'] = $this->getChannelList($data);
        //(2)查询总条数
        $where = array();
        if(isset($data['where']) && !empty($data['where'])){
            $where = $data['where'];
        }
        $result['total'] = $this->getChannelCount($where);
        return $result;
    }

    /**
     * 根据条件获取栏目列表
     * @param array $data 查询条件数组<br>格式 : [字段=>值,字段=>值]
     * @return boolean||array 返回是否存在或者订单列表
     */
    public function getChannelList($data = array())
    {

        if(isset($data['select']) && !empty($data['select'])){
            $this->slave->select($data['select']);
        }
        if(isset($data['where']) && !empty($data['where'])){
            $this->slave->where($data['where']);
        }
        if(isset($data['limit']) && !empty($data['limit']) && isset($data['offset']) && !empty($data['offset'])){
            $this->slave->limit($data['limit'],$data['offset']);
        }
//        $this->slave->order_by('catid','DESC');

        $this->slave->from('news_category');
        $query = $this->slave->get();
        $result = $query->result_array();
        $query->free_result();
        return $result;
    }

    /**
     * 根据条件获取栏目总条数
     * @param array $where 查询条件数组<br>格式 : [字段=>值,字段=>值]
     * @return int 返回订单总条数
     */
    public function getChannelCount($where = array())
    {

        if(!empty($where)){
            $this->slave->where($where);
        }
        $this->slave->from('news_category');
        $query = $this->slave->get();
        $result = $query->num_rows();
        $query->free_result();
        return $result;
    }

    /**
     * 修改栏目
     * @param $data $data
     * @return bool
     */

    public function updateChannel($data)
    {
        if(!isset($data['catid']) || empty($data['catid'])){
            return false;
        }
        $id = $data['catid'];
        unset($data['catid']);
        return $this->master->update('news_category',$data,array('catid'=>$id));
    }

    /**
     * 添加栏目
     * @param $data
     * @return bool
     */
    public function insertChannel($data)
    {
        if(count($data) != count($data, 1)){
            return $this->master->insert_batch('news_category',$data);
        }else{
            if($this->master->insert('news_category',$data)){
                return $this->master->insert_id();
            }
            return false;
        }
    }

    /**
     * 获取栏目信息
     * @param $where
     * @return bool
     */
    public function getChannelInfo($where)
    {
        if(!isset($where['catid']) && empty($where['catid'])){
            return false;
        }
        $this->slave->where($where);
        $this->slave->from('news_category');
        $query = $this->slave->get();
        $result = $query->row_array();
        $query->free_result();
        return $result;
    }

    /**
     * 获取所有栏目
     */
    public function getAllArchive($data)
    {
        //（1）查询指定数据
        $result = array();
        $result['rows'] = $this->getArchiveList($data);
        //(2)查询总条数
        $where = array();
        if(isset($data['where']) && !empty($data['where'])){
            $where = $data['where'];
        }
        $result['total'] = $this->getArchiveCount($where);
        return $result;
    }

    /**
     * 根据条件获取栏目列表
     * @param array $data 查询条件数组<br>格式 : [字段=>值,字段=>值]
     * @return boolean||array 返回是否存在或者订单列表
     */
    public function getArchiveList($data = array())
    {

        if(isset($data['where']) && !empty($data['where'])){
            $this->slave->where($data['where']);
        }
        if(isset($data['limit']) && !empty($data['limit']) && isset($data['offset']) && !empty($data['offset'])){
            $this->slave->limit($data['limit'],$data['offset']);
        }
        $this->slave->select('n.*,nc.catname');
        $this->slave->order_by('catid','DESC');

        $this->slave->from('news as n');
        $this->slave->join('news_category as nc','n.catid=nc.catid');

        $query = $this->slave->get();
        $result = $query->result_array();
        $query->free_result();
        return $result;
    }

    /**
     * 根据条件获取栏目总条数
     * @param array $where 查询条件数组<br>格式 : [字段=>值,字段=>值]
     * @return int 返回订单总条数
     */
    public function getArchiveCount($where = array())
    {

        if(!empty($where)){
            $this->slave->where($where);
        }
        $this->slave->from('news');
        $query = $this->slave->get();
        $result = $query->num_rows();
        $query->free_result();
        return $result;
    }

    /**
     * 修改文章
     * @param $data $data
     * @return bool
     */
    public function updateArchive($data)
    {
        if(!isset($data['id']) || empty($data['id'])){
            return false;
        }
        $id = $data['id'];
        unset($data['id']);
        return $this->master->update('news',$data,array('id'=>$id));
    }

    /**
     * 获取文章信息
     * @param $where
     * @return bool
     */
    public function getArchiveInfo($where)
    {
        if(!isset($where['id']) && empty($where['id'])){
            return false;
        }
        $this->slave->where($where);
        $this->slave->from('news');
        $query = $this->slave->get();
        $result = $query->row_array();
        $query->free_result();
        return $result;
    }

    /**
     * 添加文章
     * @param $data
     * @return bool
     */
    public function insertArchive($data)
    {

        if($this->master->insert('news',$data)){
            return $this->master->insert_id();
        }
        return false;

    }
    public function insertGoodsNews($data)
    {
        if(count($data) == count($data,1)){
            $result = $this->master->insert('goods_news',$data);
        }else{
            $result = $this->master->insert_batch('goods_news',$data);
        }
        return $result;
    }

    public function deleteGoodsNews($where)
    {
        return $this->master->delete('goods_news', $where);
    }
}