<?php

class SendSms extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database('master');
        $this->load->config('system');
    }

    //插入单条数据
    public function insert($data)
    {
        $res = $this->db->insert('sendsms',$data);
        if($res){
            return $this->db->insert_id();
        }
        return false;
    }

    //检查验证码
    public function checkCode($phone,$code)
    {

        $this->db->select('code,sendtime');
        $this->db->where(array('mobile_phone'=>$phone,'stats'=>0));
        $this->db->order_by('sendtime DESC');
        $this->db->limit(1);
        $result = $this->db->get('sendsms');

        $result = $result->result_array();

        if(empty($result)){
            return false;
        }

        //验证码有效时间
        $time_diff = time() - $result[0]['sendtime'];
        if($result[0]['code'] != $code || $time_diff > $this->config->item('verify_time')){
            return false;
        }

        $sms['checktime'] = time();

        $sms['stats'] = 1;

        $this->db->update('sendsms',$sms,array('mobile_phone' => $phone));

        return true;
    }
}