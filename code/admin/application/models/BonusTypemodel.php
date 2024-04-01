<?php

class BonusTypemodel extends CI_Model {
    /*
     * 促销卡券列表
     */
    public function bonustypelist($data){
        $result = array();
        if(isset($data['where'])){
            $this->slave->where($data['where']);
        }
        $this->slave->order_by($data['order']);
        $this->slave->limit($data['limit'],$data['offset']);
        $this->slave->from('bonus_type');
        $query = $this->slave->get();
        $result['rows'] = $query->result_array();
        $query->free_result();

        if(isset($data['where'])){
            $this->slave->where($data['where']);
        }
        $this->slave->from('bonus_type');
        $query = $this->slave->get();
        $result['total'] = $query->num_rows();
        $query->free_result();
        return $result;
    }
    /*
     * 不带分页的卡券列表
     */
    public function bonustypelistNoPage(){
        $this->slave->from('bonus_type');
        $query = $this->slave->get();
        $result = $query->result_array();
        return !empty($result) ? $result : '';
    }
    /*
     * 根据促销卡券type_id，得到卡券信息
     */
    public function getBonusTypeByTypeId($type_id){
        $this->slave->where('type_id',$type_id);
        $this->slave->from('bonus_type');
        $query = $this->slave->get();
        $result = $query->row_array();
        return !empty($result) ? $result : '';
    }
    /*
     * 保存红包类型
     */
    public function saveBonustype($data){
        $type_id = isset($data['type_id']) ? $data['type_id'] : 0;
        if(isset($data['type_id'])){
            unset($data['type_id']);
        }
        if($type_id){
            $this->master->where('type_id',$type_id);
            if($this->master->update('bonus_type', $data)){
                return true;
            }else{
                return false;
            }
        }else{
            if($this->master->insert('bonus_type', $data)){
                return true;
            }else{
                return false;
            }
        }
    }
}