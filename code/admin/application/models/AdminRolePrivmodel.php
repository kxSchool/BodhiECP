<?php

class AdminRolePrivmodel extends CI_Model {
    /*
     * 根据privid得到表中记录值
     */
    public function getRolePrivByPrivid($privid){
        $this -> slave->where('privid',$privid);
        $this->slave->from('admin_role_priv');
        $query = $this->slave->get();
        $result = $query->result_array();
        return !empty($result) ? $result : '';
    }
    /*
     * 根据roleid得到表中记录值
     */
    public function getRolePrivByRoleid($roleid){
        $this -> slave->where('roleid',$roleid);
        $this->slave->from('admin_role_priv');
        $query = $this->slave->get();
        $result = $query->result_array();
        return !empty($result) ? $result : '';
    }
    /*
     * 根据角色id，删除角色对应的权限
     */
    public function delRolePrivByRoleid($roleid){
        $this->master->where('roleid',$roleid);
        $this->master->from('admin_role_priv');
        $result = $this->master->delete();
        if($result){
            return true;
        }else{
            return false;
        }
    }
    /*
     * 批量给角色分配权限
     */
    public function batchInsertRolePriv($data){
        $result = $this->master->insert_batch('admin_role_priv', $data);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    /*
     * 根据权限节点id，删除角色对应的权限
     */
    public function delRolePrivByPrivid($privid){
        $this->master->where('privid',$privid);
        $this->master->from('admin_role_priv');
        $result = $this->master->delete();
        if($result){
            return true;
        }else{
            return false;
        }
    }
}
