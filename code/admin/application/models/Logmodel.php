<?php
/*
 * 后台操作日志
 * */
class Logmodel extends CI_Model {

	public $log;
	public $master;

	public function __construct() {

		parent::__construct();
		$this -> log = $this -> load -> database('log', true);
		$this -> master = $this -> load -> database('master', true);
	}

	/*
	 * 添加操作日志，当月没有表则创建表，否则将操作日志插入到当月的日志表中
	 * data：是数组包含uid、url、remark、ip
	 * uid：操作管理员id
	 * url：当前操作的url
	 * remark：当前操作的备注信息
	 * ip：操作的ip地址
	 * */
	public function addLog($data) {
		$db = $this -> log;
		$db -> trans_start();
		$create_sql = "CREATE TABLE IF NOT EXISTS `" . 'log_' . date('Ym') . "`(
    		`id` int(11) NOT NULL AUTO_INCREMENT,
    		`uid` int(6) COLLATE utf8_unicode_ci DEFAULT NULL,
    		`url` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
    		`ip` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
    		`remark` longtext COLLATE utf8_unicode_ci,
    		`createtime` int(11) DEFAULT NULL,
    		PRIMARY KEY (`id`)
    	)ENGINE=innodb AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='日志表'";
		$db -> query($create_sql);
		$insert_sql = "insert into ".'log_'. date('Ym') . " (`uid`, `url`, `ip`, `remark`, `createtime`) values ('" . $data['uid'] . "', '" . $data['url'] . "', '" . $data['ip'] . "','" . $data['remark'] . "', '" . time() . "')";
		if ($db -> query($insert_sql)) {
			//操作日志添加成功
			$ret = "true";
		} else {
			//操作日志添加失败
			$ret = "false";
		}
		$db -> trans_complete();
		unset($db);
		return $ret;
	}

	//获取log表名
	public function t_table() {
		//获取所有表
		$db = $this -> log;
		$tsql = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE  TABLE_SCHEMA = '".$db->database."' AND TABLE_NAME like '".'log_'."%' ORDER BY TABLE_NAME DESC";
		$query = $db -> query($tsql);
		$t_table = $query -> result_array();
		unset($db);
		return $t_table;
	}

	//获取用户管理员信息
	public function manager() {
		$db = $this -> master;
		$sql = "select id,realname from "."admin";
		$query = $db -> query($sql);
		$res = $query -> result_array();
		unset($db);
		return $res;
	}

	public function loglist($data) {
		$t_table = $this -> t_table();
		$log_table = !empty($data['log_table']) ? $data['log_table'] : $t_table[0]['TABLE_NAME'];
		$db = $this -> log;
		$m_db = $this->master;
		$db -> trans_start();
		$sql = "SELECT log.id,log.uid,log.url,log.remark,log.ip,log.createtime,user.realname FROM  " . $log_table . " as log left join ".$m_db->database.".".$m_db->dbprefix."admin as user ON log.uid = user.id where " . $data['where'] . " order by " . $data['order'] . " limit " . $data['offset'] . "," . $data['limit'];
		$query = $db -> query($sql);
		if ($query -> num_rows() != 0) {
			$result['rows'] = $query -> result_array();
			//查询总记录数
			$totalsql = "SELECT count(log.id) as total FROM  " . $log_table . " as log left join ".$m_db->database.".".$m_db->dbprefix."admin as user ON log.uid = user.id where " . $data['where'];
			$totalquery = $db -> query($totalsql);
			$rs = $totalquery -> row_array();
			$result['total'] = $rs['total'];
		}
		$db -> trans_complete();
		unset($db);
		return isset($result) ? $result : '';

	}

	//批量删除日志
	public function batchDelLog($data) {
		$t_table = $this -> t_table();
		$log_table = !empty($data['log_table']) ? $data['log_table'] : $t_table[0]['TABLE_NAME'];
		//return $log_table;
		$db = $this -> log;
		$db -> trans_start();
		if (isset($data['checked_ids'])) {
			$sql = "delete from " . $log_table . " where `id` in (" . $data['checked_ids'] . ")";
			if ($db -> query($sql)) {
				$result = true;
			}
		}
		$db -> trans_complete();
		unset($db);
		return isset($result) ? $result : '';
	}

	public function __destruct() {
		unset($this -> log);
	}



    public function createErrorLogs($data){
        //插入新纪录的时候需要判断一下，最后一张表
        $now_time = date('Ym',time());
        $databaseName = $this->log->database;
        $tableName = $this->log->dbprefix.'error_log_'.$now_time;
        $query = $this->log->query("SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_SCHEMA = '$databaseName' and TABLE_NAME = '$tableName'");
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
            if ($this->log->query($createTableSql)) {
                //插入数据
                if ($this->log->insert($tableName, $data)) {
                    return $this->log->insert_id();
                } else {
                    return false;
                }
            }else {
                return false;
            }
        }else{
            //自动插入在最后一张表中
            if( $this->log->insert($tableName,$data)){
                return $this->log->insert_id();
            }else{
                return false;
            }
        }
    }

}
