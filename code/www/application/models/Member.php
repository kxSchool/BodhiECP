<?php

class Member extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('master', TRUE);
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

    //添加用户
    public function insert($data)
    {

        $res = $this->db->insert('members1',$data);
        if($res){
            return $this->db->insert_id();
        }
        return false;

    }

    //根据用户ID获取用户信息
    public function getInfoById($uid)
    {

        $this->db->select('userid,mobile,realname,email,company,post,icon,birthday,sex,wechat,company_addr,company_province,company_city,company_area');
        $this->db->where(array('userid'=>$uid, 'disabled' => 0));
        $result = $this->db->get('members1');
        $result = $result->result_array();
        return $result[0];

    }

    //根据用户Mobile获取用户信息
    public function getInfoByMobile($mobile)
    {

        $this->db->select('userid,username,login_count,password,encrypt');
        $this->db->where(array('mobile' => $mobile, 'disabled' => 0));
        $userinfo = $this->db->get('members1');
        $userinfo = $userinfo->result_array();
        return empty($userinfo) ? array() : $userinfo[0];

    }

    //根据手机号修改用户信息
    public function updateByMobile($data,$mobile)
    {

        return $this->db->update('members1',$data,array('mobile' => $mobile));

    }

    //根据用户ID修改用户信息
    public function updateById($data,$uid)
    {

        return $this->db->update('members1',$data,array('userid' => $uid));

    }

    //获取用户信息
    public function getUserInfo($uid)
    {

        $this->db->select('userid,mobile,username,realname,email,company,post,icon,birthday,sex,login_token,login_count');
        $this->db->where(array('userid'=>$uid, 'disabled' => 0));
        $result = $this->db->get('members1');
        $result = $result->row_array();
        return empty($result)? '' : $result;

    }


}