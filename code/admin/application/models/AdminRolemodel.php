<?php

class AdminRolemodel extends CI_Model {
    //角色列表
    public function rolelist($data){
        $result = array();
        $this->slave->order_by($data['order']);
        $this->slave->limit($data['limit'],$data['offset']);
        $this->slave->from('admin_role');
        $query = $this->slave->get();
        $result['rows'] = $query->result_array();
        $query->free_result();

        $this->slave->from('admin_role');
        $query = $this->slave->get();
        $result['total'] = $query->num_rows();
        $query->free_result();
        return $result;
    }
    //得到所有管理员角色
    public function getAllRole(){
        $this->slave->from('admin_role');
        $query = $this->slave->get();
        $result = $query->result_array();
        return $result;
    }
    //保存角色
    public function saveRole($data){
        $roleid = isset($data['roleid']) ? $data['roleid'] : 0;
        if(isset($data['roleid'])){
            unset($data['roleid']);
        }
        if($roleid){
            $this->master->where('roleid',$roleid);
            if($this->master->update('admin_role', $data)){
                return true;
            }else{
                return false;
            }
        }else{
            if($this->master->insert('admin_role', $data)){
                return $this->master->insert_id();
            }else{
                return false;
            }
        }
    }
    //通过角色id得到角色信息
    public function getRoleById($roleid){
        $this->slave->where('roleid',$roleid);
        $this->slave->from('admin_role');
        $query = $this->slave->get();
        $result = $query->row_array();
        return !empty($result) ? $result : '';
    }
    //根据角色id删除角色
    public function delRoleById($roleid){
        $this->master->where('roleid',$roleid);
        $this->master->from('admin_role');
        $result = $this->master->delete();
        if($result){
            return true;
        }else{
            return false;
        }
    }
}
