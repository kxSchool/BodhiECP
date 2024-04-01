<?php
/**
 * Created by PhpStorm.
 * User: as
 * Date: 2018/4/28
 * Time: 18:19
 */
class UserAccountmodel extends CI_Model
{

    public $slave, $master;
    public function __construct()
    {
        parent::__construct();
        $this->slave = $this->load->database();
        //$this->master = $this->load->database('tickets_master', true);
    }
    public function getAllVenues($data){
        $result = array();
        if(isset($data['fields'])  && isset($data['like'])){
            $this->db->like($data['fields'], $data['like'], 'both');
        }
        $this->db->limit($data['limit'],$data['offset']);
        $this->db->from('user_account');
        $query = $this->db->get();
        $result['rows'] = $query->result_array();
        $query->free_result();

        //(2)查询总条数
        if(isset($data['fields'])  && isset($data['like'])){
            $this->db->like($data['fields'], $data['like'], 'both');
        }
        $this->db->from('user_account');
        $query = $this->db->get();
        $result['total'] = $query->num_rows();
        $query->free_result();
        return $result;
    }
}