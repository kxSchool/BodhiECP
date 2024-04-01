<?php

class Adminmodel extends CI_Model {
    //管理员列表
    public function adminlist($data){
        $result = array();
        $this->slave->order_by($data['order']);
        $this->slave->limit($data['limit'],$data['offset']);
        $this->slave->from('admin');
        $query = $this->slave->get();
        $result['rows'] = $query->result_array();
        $query->free_result();

        $this->slave->from('admin');
        $query = $this->slave->get();
        $result['total'] = $query->num_rows();
        $query->free_result();
        return $result;
    }
    /*
     * 保存管理员信息
     */
    public function  saveAdmin($data){
        $id = isset($data['id']) ? $data['id'] : 0;
        if(isset($data['id'])){
            unset($data['id']);
        }
        if($id){
            $this->master->where('id',$id);
            if($this->master->update('admin', $data)){
                return true;
            }else{
                return false;
            }
        }else{
            if($this->master->insert('admin', $data)){
                return $this->master->insert_id();
            }else{
                return false;
            }
        }
    }
    /*
     *根据账号、手机号、邮箱得到管理员账号信息
     */
    public function getAdminByAccount($account){
        $this->slave->where('account',$account);
        $this->slave->or_where('mobile',$account);
        $this->slave->or_where('email',$account);
        $this->slave->from("admin");
        $query = $this->slave->get();
        $result = $query->row_array();
        return !empty($result) ? $result : '';
    }
    /*
     * 根据管理员id，得到管理员信息
     */
    public function getAdminById($id){
        $this->slave->where('id',$id);
        $this->slave->from('admin');
        $query = $this->slave->get();
        $result = $query->row_array();
        return !empty($result) ? $result : '';
    }
    /*
     * 根据角色id，得到管理员
     */
    public function getAdminByRoleid($roleid){
        $this->slave->where('roleid',$roleid);
        $this->slave->from('admin');
        $query = $this->slave->get();
        $result = $query->result_array();
        return !empty($result) ? $result : '';
    }
    //根据id删除管理员
    public function delAdminById($id){
        $this->master->where('id',$id);
        $this->master->from('admin');
        $result = $this->master->delete();
        if($result){
            return true;
        }else{
            return false;
        }
    }
}
