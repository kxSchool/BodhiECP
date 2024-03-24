<?php

class Member_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('master', TRUE);
    }

    //获取用户信息
    public function getUserInfo($uid)
    {

        $this->db->select('userid,mobile,username,realname,email,company,post,icon,birthday,sex,login_token,login_count');
        $this->db->where(array('userid'=>$uid, 'disabled' => 0));
        $result = $this->db->get('members1');
        $result = $result->result_array();
        return empty($result) ? array() : $result[0];

    }

    //修改数据
    public function update($data,$mobile = '')
    {
        if(!empty($mobile)){
            $where['mobile'] = $mobile;
        }else{
            $where['userid'] = $_SESSION['user']['userid'];
        }
        $this->db->where($where);
        return $this->db->update('members1',$data);
    }

    //查看用户是否存在
    public function isExist($mobile)
    {

        $count = $this->db->where(array('mobile'=>$mobile))->count_all_results('members1');
        if($count > 0){
            return true;
        }
        return false;

    }

    //获取用户信息
    public function getInfoByMobile($mobile)
    {

        $this->db->select('userid,username,login_count,password,encrypt,login_token,icon');
        $this->db->where(array('mobile' => $mobile, 'disabled' => 0));
        $userinfo = $this->db->get('members1');
        $userinfo = $userinfo->result_array();
        return empty($userinfo) ? array() : $userinfo[0];

    }

    //添加用户
    public function insert($data)
    {

        $res = $this->db->insert('members1',$data);
        if($res){
            return $this->db->insert_id();
        }
        return false;

    }

}