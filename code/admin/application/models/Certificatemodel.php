<?php

class Certificatemodel extends CI_Model {
    //商铺证书列表
    public function certificateList($data){
        $result = array();
        if(isset($data['where'])){
            $this->slave->where($data['where']);
        }
        $this->slave->order_by($data['order']);
        $this->slave->limit($data['limit'],$data['offset']);
        $this->slave->from('seller_certificate');
        $query = $this->slave->get();
        $result['rows'] = $query->result_array();
        $query->free_result();

        if(isset($data['where'])){
            $this->slave->where($data['where']);
        }
        $this->slave->from('seller_certificate');
        $query = $this->slave->get();
        $result['total'] = $query->num_rows();
        $query->free_result();
        return $result;
    }
    //得到商铺证书的第一条记录
    public function getTheFirstCertificateByUserid($userid){
        $this->slave->where('userid',$userid);
        $this->slave->where('type',0);
        $this->slave->order_by('add_time','ASC');
        $this->slave->from('seller_certificate');
        $query = $this->slave->get();
        $result = $query->row_array();
        return !empty($result) ? $result : '';
    }
    //批量更新证书状态
    public function batchUpdatecertificate($data,$key){
        $result = $this->master->update_batch('seller_certificate',$data,$key);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    //根据证书id，得到证书详情
    public function getCertificateById($id){
        $this->slave->where('id',$id);
        $this->slave->from('seller_certificate');
        $query = $this->slave->get();
        $result = $query->row_array();
        return !empty($result) ? $result : '';
    }
}
