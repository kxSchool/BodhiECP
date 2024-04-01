<?php

class AdSpacemodel extends CI_Model {
    public function spacelist($data){
        $result = array();
        $this->slave->order_by($data['order']);
        $this->slave->limit($data['limit'],$data['offset']);
        $this->slave->from('ad_space');
        $query = $this->slave->get();
        $result['rows'] = $query->result_array();
        $query->free_result();

        $this->slave->from('ad_space');
        $query = $this->slave->get();
        $result['total'] = $query->num_rows();
        $query->free_result();
        return $result;
    }
    /*
     * 根据广告位id，得到广告位信息
     */
    public function getSpaceById($spaceid){
        $this->slave->where('spaceid',$spaceid);
        $this->slave->from('ad_space');
        $query = $this->slave->get();
        $result = $query->row_array();
        return !empty($result) ? $result : '';
    }
    /*
     *保存space信息
     */
    public function saveSpace($data){
        $spaceid = isset($data['spaceid']) ? $data['spaceid'] : 0;
        if(isset($data['spaceid'])){
            unset($data['spaceid']);
        }
        if($spaceid){
            $this->master->where('spaceid',$spaceid);
            if($this->master->update('ad_space', $data)){
                return true;
            }else{
                return false;
            }
        }else{
            if($this->master->insert('ad_space', $data)){
                return true;
            }else{
                return false;
            }
        }
    }
    /*
     * 根据广告位id，删除广告位
     */
    public function delSpaceById($spaceid){
        $this->master->where('spaceid',$spaceid);
        $this->master->from('ad_space');
        $result = $this->master->delete();
        if($result){
            return true;
        }else{
            return false;
        }
    }
    /*
     * 得到所有显示的广告位
     */
    public function getSpaceSelectShow(){
        $this->slave->where('disabled',1);
        $this->slave->from('ad_space');
        $query = $this->slave->get();
        $result = $query->result_array();
        return !empty($result) ? $result : '';
    }


    /*
    * 根据广告位id，得到广告名称信息
    */
    public function getSpaceNameById($spaceid){
        $sql = "SELECT name from ad_space Where spaceid =" .$spaceid;
        $query = $this->slave->query($sql);
        $rst = $query->result_array();
        return !empty($rst) ? $rst : '';
    }

    /*
    * 根据广告名称，得到广告id及详情信息
    */
    public function getAdSpaceInfoByName($name){
        $sql = "SELECT spaceid,name,description from ad_space Where name LIKE '%".$name."%'";
        $query = $this->slave->query($sql);
        $rst = $query->result_array();
        return !empty($rst) ? $rst : '';
    }




}
