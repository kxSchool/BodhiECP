<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/30
 * Time: 16:12
 */

class Category extends CI_Model
{
    public $slave, $master;
    public function __construct()
    {
        parent::__construct();
        $this->slave = $this->load->database('goods_slave', true);
        $this->master = $this->load->database('goods_master', true);
    }

    /**
     * 获取所有一级分类
     */
    public function topCate()
    {
        $this->slave->select('cat_id,cat_name');
        $this->slave->where(array('cat_pid'=>0,'is_show'=>1));
        $this->slave->from('category');
        $query = $this->slave->get();
        $result = $query->result_array();
        $query->free_result();
        return $result;
    }

    /**
     * @param $cat_pid int 分类父级ID
     * @return mixed 返回结果集或者FALSE
     */
    public function getCateByPid($cat_pid)
    {
        $this->slave->select('cat_id,cat_name');
        $this->slave->where(array('cat_pid'=>$cat_pid,'is_show'=>1));
        $this->slave->from('category');
        $query = $this->slave->get();
        $result = $query->result_array();
        $query->free_result();
        return empty($result) ? false : $result;
    }

    //获取所有分类
    public function getAllCategory()
    {
        $this->slave->where("is_del = 0");
        $query = $this->slave->get("category");
        $result = $query->result_array();
        return !empty($result) ? $result : '';
    }

    //删除分类
    public function delCate($cat_id)
    {

        //是否存在子分类
        $child_list = $this->getChildCate($cat_id);
        if(!$this->delete($cat_id)){
            return false;
        }
        if($child_list){
            foreach ($child_list as $key => $value) {
                $this->delCate($value['cat_id']);
            }
        }
        return true;

    }

    //获取子分类
    public function getChildCate($cat_id)
    {
        $this->slave->from('category');
        $this->slave->where('cat_pid',$cat_id);
        $query = $this->slave->get();
        $result = $query->result_array();
        $query->free_result();
        return empty($result) ? false : $result;
    }

    //软删除
    public function delete($cat_id)
    {

         return $this->master->update('category', array('is_del'=>1,'is_show'=>0),array('cat_id' => $cat_id));

    }

    //修改状态
    public function changeCate($id,$field)
    {
        $this->slave->select($field);
        $this->slave->where('cat_id',$id);
        $query = $this->slave->get('category');
        $result = $query->row_array();
        if($result[$field] == 0){
            $status = 1;
        }else{
            $status = 0;
        }
        $sql = "UPDATE category SET $field = $status WHERE cat_id = $id";
        return $this->master->query($sql);
    }

    //获取分类信息
    public function getCateInfo($id)
    {
        $this->slave->where('cat_id',$id);
        $query = $this->slave->get('category');
        $result = $query->row_array();
        $query->free_result();
        return empty($result) ? false : $result;
    }

    //修改分类信息
    public function editCate($data)
    {
        if(!isset($data['cat_id']) || empty($data['cat_id'])){
            return false;
        }
        return $this->master->update('category', $data,array('cat_id' => $data['cat_id']));
    }

    //添加分类
    public function addCate($data)
    {
        if($this->master->insert('category',$data)){
            return $this->master->insert_id();
        }
        return false;
    }
}