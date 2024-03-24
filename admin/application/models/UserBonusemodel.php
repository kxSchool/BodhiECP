<?php

class UserBonusemodel extends CI_Model {
    /*
     * 保存用户卡券
     */
    public function saveUserBonus($data){
        if($this->master->insert('user_bonus', $data)){
            return true;
        }else{
            return false;
        }
    }
    //买家使用卡券，更新卡券信息
    public function updateUserBonsu($data){
        $bonus_id = isset($data['bonus_id']) ? $data['bonus_id'] : 0;
        if(isset($data['bonus_id'])){
            unset($data['bonus_id']);
        }
        if($bonus_id){
            $this->master->where('bonus_id',$bonus_id);
            if($this->master->update('user_bonus', $data)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    
}