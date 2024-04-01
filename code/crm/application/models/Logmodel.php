<?php
/**
 * Created by PhpStorm.
 * User: as
 * Date: 2018/4/28
 * Time: 10:21
 */
class Logmodel extends CI_Model
{
   // protected $db;
    /*
     * 订单列表
     */
    /*public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('log', true);
    }*/
    public $slave, $master;
    public function __construct()
    {
        parent::__construct();
        $this->slave = $this->load->database('log', true);
//        $this->master = $this->load->database('log', true);
    }

  /*public function gettotal()
    {
        $query = $this->db->query("SELECT count(id) total FROM log_201804");
        return $query->result();
    }

      public function get_books($num, $offset, $searchtext)
    {
        $db = $this->db;
        if (!empty($searchtext)) {
            $db = $this->db->where('createtime like', '%' . $searchtext . '%');
        }
        $query = $db->get('log_201804', $num, $offset);
        return $query->result();
    }*/
    public function getAllVenues($data){
        //（1）查询指定数据
        $result = array();
        if(isset($data['fields'])  && isset($data['like'])){
            $this->slave->like($data['fields'], $data['like'], 'both');
        }
        //$db = $this->db;
        $this->slave->order_by('createtime','DESC');
        $this->slave->limit($data['limit'],$data['offset']);
        $this->slave->from($data['table']);
        $query = $this->slave->get();

        $result['rows'] = $query->result_array();
        $query->free_result();

        //(2)查询总条数
        if(isset($data['fields'])  && isset($data['like'])){
            $this->slave->like($data['fields'], $data['like'], 'both');
        }
        $this->slave->from($data['table']);
        $query = $this->slave->get();
        $result['total'] = $query->num_rows();
        $query->free_result();
        return $result;
    }

    public function createLogs($data)
    {

        //插入新纪录的时候需要判断一下，最后一张表
        $now_time = date('Ym',time());
        $databaseName = $this->slave->database;
        $tableName = $this->slave->dbprefix.'staff_log_'.$now_time;
        $query = $this->slave->query("SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_SCHEMA = '$databaseName' and TABLE_NAME = '$tableName'");
        $result = $query->result_array();
        $query->free_result();
        //是否存在当月日志表
        if(empty($result)){
            $createTableSql = "CREATE TABLE `$tableName` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `staff_id` int(11) DEFAULT NULL,
                    `staff_name` varchar(255) DEFAULT NULL,
                    `url` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
                    `ip` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
                    `remark` longtext COLLATE utf8_unicode_ci,
                    `createtime` int(11) DEFAULT NULL,
                    PRIMARY KEY (`id`)
                  ) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='日志表';";
            if ($this->slave->query($createTableSql)) {
                //插入数据
                if ($this->slave->insert($tableName, $data)) {
                    return $this->slave->insert_id();
                } else {
                    return false;
                }
            }else {
                return false;
            }
        }else{
            //自动插入在最后一张表中
            if( $this->slave->insert($tableName,$data)){
                return $this->slave->insert_id();
            }else{
                return false;
            }
        }

    }

    public function createErrorLogs($data){
        //插入新纪录的时候需要判断一下，最后一张表
        $now_time = date('Ym',time());
        $databaseName = $this->slave->database;
        $tableName = $this->slave->dbprefix.'error_log_'.$now_time;
        $query = $this->slave->query("SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_SCHEMA = '$databaseName' and TABLE_NAME = '$tableName'");
        $result = $query->result_array();
        $query->free_result();
        //是否存在当月日志表
        if(empty($result)){
            $createTableSql = "CREATE TABLE `error_log_201807` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `ip` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
          `remark` longtext COLLATE utf8_unicode_ci,
          `createtime` int(11) DEFAULT NULL,
          PRIMARY KEY (`id`)
        ) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='日志表';";
            if ($this->slave->query($createTableSql)) {
                //插入数据
                if ($this->slave->insert($tableName, $data)) {
                    return $this->slave->insert_id();
                } else {
                    return false;
                }
            }else {
                return false;
            }
        }else{
            //自动插入在最后一张表中
            if( $this->slave->insert($tableName,$data)){
                return $this->slave->insert_id();
            }else{
                return false;
            }
        }
    }


}
