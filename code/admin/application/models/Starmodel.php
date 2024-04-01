<?php

class Starmodel extends CI_Model {
    //商铺星级列表
    public function starlist($data){
        $result = array();
        $this->slave->order_by($data['order']);
        $this->slave->limit($data['limit'],$data['offset']);
        $this->slave->from('star');
        $query = $this->slave->get();
        $result['rows'] = $query->result_array();
        $query->free_result();

        $this->slave->from('star');
        $query = $this->slave->get();
        $result['total'] = $query->num_rows();
        $query->free_result();
        return $result;
    }
    /*
     * 保存商铺星级信息
     */
    public function  saveStar($data){
        $starid = isset($data['starid']) ? $data['starid'] : 0;
        if(isset($data['starid'])){
            unset($data['starid']);
        }
        if($starid){
            $this->master->where('starid',$starid);
            if($this->master->update('star', $data)){
                return true;
            }else{
                return false;
            }
        }else{
            if($this->master->insert('star', $data)){
                return true;
            }else{
                return false;
            }
        }
    }
    /*
     * 根据商铺星级id，得到商铺星级信息
     */
    public function getStarById($starid){
        $this->slave->where('starid',$starid);
        $this->slave->from('star');
        $query = $this->slave->get();
        $result = $query->row_array();
        return !empty($result) ? $result : '';
    }
    //根据id删除商铺星级
    public function delStarById($starid){
        $this->master->where('starid',$starid);
        $this->master->from('star');
        $result = $this->master->delete();
        if($result){
            return true;
        }else{
            return false;
        }
    }
    /*
     * 根据经验值，得到星级信息
     */
    public function getStartByExperience($experience){
        $this->slave->where('low <= ',$experience);
        $this->slave->where('high >= ',$experience);
        $this->slave->from('star');
        $query = $this->slave->get();
        $result = $query->row_array();
        return !empty($result) ? $result : '';
    }


    /*
* 获取所有星级信息
*/
    public function getAllStars(){
        $sql = "SELECT starid,starname 
                FROM star";
        $query = $this->slave->query($sql);
        $result = $query->result_array();
        return !empty($result) ? $result : '';
    }
}
