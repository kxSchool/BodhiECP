<?php

class AdminPrivmodel extends CI_Model {

    /*
     * 根据ac查找权限记录
     */
    public function getPrivByca($data){
        $this->slave->where($data);
        $query = $this->slave->get("admin_priv");
        $result = $query->row_array();
        return !empty($result) ? $result : '';
    }
    /*
     * 根据节点id得到节点信息
     */
    public function getPrivById($privid){
        $this->slave->where('privid',$privid);
        $query = $this->slave->get("admin_priv");
        $result = $query->row_array();
        return !empty($result) ? $result : '';
    }
    /*
     * 根据privid节点数组得到记录
     */
    public function getPrivByPrivids($privids){
        $this->slave->where('disabled',1);
        $this->slave->where_in('privid',$privids);
        $query = $this->slave->get("admin_priv");
        $result = $query->result_array();
        return !empty($result) ? $result : '';
    }
    /*
     * 得到所有权限节点
     */
    public function getAllPriv(){
        $query = $this->slave->get("admin_priv");
        $result = $query->result_array();
        return !empty($result) ? $result : '';
    }
    /*
     * 根据privid，得到直接下级节点
     */
    public function getChildPrivById($privid){
        $this->slave->where('parentid',$privid);
        $query = $this->slave->get("admin_priv");
        $result = $query->result_array();
        return !empty($result) ? $result : '';
    }
    /*
     * 根据privid删除节点
     */
    public function delPrivById($privid){
        $this->master->where('privid',$privid);
        $this->master->from('admin_priv');
        $result = $this->master->delete();
        if($result){
            return true;
        }else{
            return false;
        }
    }
    //保存权限节点
    public function savePriv($data){
        $privid = isset($data['privid']) ? $data['privid'] : 0;
        if(isset($data['priv'])){
            unset($data['priv']);
        }
        if($privid){
            $this->master->where('privid',$privid);
            if($this->master->update('admin_priv', $data)){
                return true;
            }else{
                return false;
            }
        }else{
            if($this->master->insert('admin_priv', $data)){
                return true;
            }else{
                return false;
            }
        }
    }
}
