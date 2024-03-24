<?php

class Admodel extends CI_Model {
    /*
     * 广告列表
     */
    public function adlist($data){
        $result = array();
        if(isset($data['where'])){
            $this->slave->where($data['where']);
        }
        $this->slave->order_by($data['order']);
        $this->slave->limit($data['limit'],$data['offset']);
        $this->slave->from('ad');
        $query = $this->slave->get();
        $result['rows'] = $query->result_array();
        $query->free_result();

        if(isset($data['where'])){
            $this->slave->where($data['where']);
        }
        $this->slave->from('ad');
        $query = $this->slave->get();
        $result['total'] = $query->num_rows();
        $query->free_result();
        return $result;
    }
    /*
     * 根据广告位id，得到广告
     */
    public function getAdBySpaceid($spaceid){
        $this->slave->where('spaceid',$spaceid);
        $this->slave->from('ad');
        $this->slave->order_by('id','ASC');
        $query = $this->slave->get();
        $result = $query->result_array();
        return !empty($result) ? $result : '';
    }
    /*
     * 根据广告id，得到广告信息
     */
    public function getAdById($id){
        $this->slave->where('id',$id);
        $this->slave->from('ad');
        $query = $this->slave->get();
        $result = $query->row_array();
        return !empty($result) ? $result : '';
    }
    /*
     * 保存广告
     */
    public function saveAd($data){
        $id = isset($data['id']) ? $data['id'] : 0;
        if(isset($data['id'])){
            unset($data['id']);
        }
        if($id){
            $this->master->where('id',$id);
            if($this->master->update('ad', $data)){
                return true;
            }else{
                return false;
            }
        }else{
            $data['addtime'] = time();
            if($this->master->insert('ad', $data)){
                return true;
            }else{
                return false;
            }
        }
    }
    /*
     * 根据广告id，删除广告
     */
    public function delAdById($id){
        $this->master->where('id',$id);
        $this->master->from('ad');
        $result = $this->master->delete();
        if($result){
            return true;
        }else{
            return false;
        }
    }

}
