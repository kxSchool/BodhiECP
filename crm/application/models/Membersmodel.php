<?php
//////////////////////////////////////////////////////////////////////
// 章爱军(永远的大牛)                                               //
// Trial License: For evaluation only!                              //
// (c) 2018, ZhangAijun, http://www.mydeershow.com                  //
//////////////////////////////////////////////////////////////////////

class Membersmodel extends CI_Model {
    
    
    /**
     * 根据标志$flag返回指定查询条件的职员信息
     * @param array $data 查询条件数组<br>格式 : [字段=>值,字段=>值]
     * @param boolean $flag false表示返回是否存在,true表示返回存在的信息
     * @return boolean||array 返回是否存在或者职员信息
     */
    public function getMembersInfoBySearchFields($data=[],$flag=false){
        $returndata = []; // 返回数据
        // 查询职员总共表
        $databaseName = $this->slave->database;
        $tableName = $this->slave->dbprefix.'members';
        $staffTableSql = $this->slave->query("SELECT TABLE_NAME FROM information_schema.TABLES "
                . "WHERE TABLE_SCHEMA = '$databaseName' and TABLE_NAME like '$tableName%' ");
        $result = $staffTableSql->result_array();
        // 组装查询条件
        if(empty($data)){
            return $flag ? [] : FALSE ;
        }
        $where = '';
        foreach($data as $dtkey=>$dtval){
            if(!empty($where)){
                $where .= ' AND ';
            }
            $where .= $dtkey.' '.$dtval;
        }
        // 执行查询语句
        foreach($result as $rskey=>$rsval){
            $searchSql = 'SELECT * FROM '.$rsval['TABLE_NAME'].' WHERE '.$where;
            $staff = $this->slave->query($searchSql)->result_array();
            if(!$flag && !empty($staff)){ //如果只是查询是否存在
                return TRUE;
            }
            if($flag && !empty($staff)){  //如果查询存在的职员信息
                foreach($staff as $stkey=>$stval){
                    if(!empty($stval)){
                        $returndata[] = $stval;
                    }
                }
            } 
        }
        // 返回数据
        return $flag ? (empty($returndata) ? [] : $returndata) : FALSE;
    }
    
    /**
     * 根据标志$flag返回指定查询条件的职员信息
     * @param array $data 查询条件数组<br>格式 : [字段=>值,字段=>值]
     * @param boolean $limit 获取指定条数
     * @param boolean $flag false表示返回是否存在,true表示返回存在的信息
     * @return boolean||array 返回是否存在或者职员信息
     */
    public function getMembersInfoBySearchFieldsLimit($data=[],$limit=10,$flag=false){
        $returndata = []; // 返回数据
        // 查询职员总共表
        $databaseName = $this->slave->database;
        $tableName = $this->slave->dbprefix.'members';
        $staffTableSql = $this->slave->query("SELECT TABLE_NAME FROM information_schema.TABLES "
                . "WHERE TABLE_SCHEMA = '$databaseName' and TABLE_NAME like '$tableName%' ");
        $result = $staffTableSql->result_array();
        // 组装查询条件
        if(empty($data)){
            return $flag ? [] : FALSE ;
        }
        $where = '';
        foreach($data as $dtkey=>$dtval){
            if(!empty($where)){
                $where .= ' OR ';
            }
            $where .= $dtkey.' '.$dtval;
        }
        // 执行查询语句
        foreach($result as $rskey=>$rsval){
            if(count($returndata)>=$limit){
                break;
            }
            $searchSql = 'SELECT * FROM '.$rsval['TABLE_NAME'].' WHERE '.$where;
            $staff = $this->slave->query($searchSql)->result_array();
            if(!$flag && !empty($staff)){ //如果只是查询是否存在
                return TRUE;
            }
            if($flag && !empty($staff)){  //如果查询存在的职员信息
                foreach($staff as $stkey=>$stval){
                    if(!empty($stval) && $limit>0){
                        $temp = [];
                        $temp['userid'] = $stval['userid'];
                        $temp['realname'] = $stval['realname'];
                        $temp['mobile'] = $stval['mobile'];
                        $temp['username'] = $stval['username'];
                        $returndata[] = $temp;
                        $limit--;
                    }
                }
            } 
        }
        // 返回数据
        return $flag ? (empty($returndata) ? [] : $returndata) : FALSE;
    }
    
    /*
     * 得到所有用户表名
     */
    public function getMembersTables(){
        $databaseName = $this->slave->database;
        $tableName = $this->slave->dbprefix.'members';
        $membersTableSql = $this->slave->query("SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_SCHEMA = '$databaseName' and TABLE_NAME like '$tableName%'");
        $result = $membersTableSql->result_array();
        return !empty($result) ? $result : '';
    }
    /*
     * 会员列表
     */
    public function memberslist($tablename,$data){
        $tablename = substr($tablename,strlen($this->slave->dbprefix));;//去除表前缀
        $this->slave->where($data['where']);
        if(isset($data['like'])){
            foreach($data['like'] as $k=>$v){
                $this->slave->like($k, $v, 'both');
            }
        }
        $this->slave->order_by($data['order']);
        $this->slave->limit($data['limit'],$data['offset']);
        $this->slave->from($tablename);
        $query = $this->slave->get();
        $result['rows'] = $query->result_array();
        $query->free_result();

        $this->slave->where($data['where']);
        if(isset($data['like'])){
            foreach($data['like'] as $k=>$v){
                $this->slave->like($k, $v, 'both');
            }
        }
        $this->slave->from($tablename);
        $query = $this->slave->get();
        $result['total'] = $query->num_rows();
        $query->free_result();
        return $result;
    }
    
    /*
     * 会员列表
     */
    public function MembersSupplierList($tablename,$data){
        $tablename = substr($tablename,strlen($this->slave->dbprefix));;//去除表前缀
        $slavedb = $this->slave->database;
        $staffslavedb = $this->staffslave->database;
        // 查询条件
        $where = '';
        if(isset($data['like'])){
            foreach($data['like'] as $k=>$v){
                $where .= ' smb.'.$k.' like \'%'.$v.'%\' AND ';
            }
        }
        if(!empty($data['sellerid'])){
            $where .= 'scsb.m_seller '.$data['sellerid'].' AND ';
        }
        $where = trim($where,'AND ');
        if(!empty($where)){
            $where = ' AND '.$where;
        }
        // 排序
        $order = ' ORDER BY scsb.id desc,smb.userid desc ';
        // 分页
        $limit = ' LIMIT '.$data['offset'].','.$data['limit'];
        // 语句
        $searchSql = 'SELECT scsb.id AS sbid,scsb.m_seller AS sellerid,smb.* FROM '.$slavedb.'.'.$tablename.' smb,'
                .$staffslavedb.'.company_seller_brand scsb '
                . 'WHERE scsb.m_buy=smb.userid '.$where
                .$order.' '.$limit;
        $result['rows'] = $this->slave->query($searchSql)->result_array();
        if(empty($result['rows'])){
            return ['rows'=>[],'supplier'=>[],'total'=>0];
        }
        // 查询所属卖家信息
        $supplierids = implode(',', array_column($result['rows'], 'sellerid'));
        $supplierSql = 'SELECT userid,username,realname FROM '.$slavedb.'.'.$tablename.' WHERE userid IN('.$supplierids.')';
        $result['supplier'] = [];
        $sres = $this->slave->query($supplierSql)->result_array();
        foreach($sres as $srkey=>$srval){
            if(!array_key_exists($srval['userid'], $result['supplier'])){
                $result['supplier'][$srval['userid']] = $srval;
            }
        }
        // 总数量
        $countSql = 'SELECT  count(*) as count FROM '.$slavedb.'.'.$tablename.' smb,'
                .$staffslavedb.'.company_seller_brand scsb '
                . 'WHERE scsb.m_buy=smb.userid '.$where;
        $count = $this->slave->query($countSql)->result_array();
        $result['total'] = empty($count[0]['count'])  ? 0 : $count[0]['count'];
        return $result;
    }
    
    /*
     * 保存会员信息
     */
    public function saveMembers($data){
        $userid = isset($data['userid']) ? $data['userid'] : 0;
        if(isset($data['userid'])){
            unset($data['userid']);
        }
        if($userid){
            //首先根据会员的id，判定需要查询哪个会员表
            $maxNUmber = $this->config->item('max_members');//每张用户表最大存储记录数
            $tableName = 'members'.ceil($userid/$maxNUmber);
            $this->master->where('userid',$userid);
            if($this->master->update($tableName, $data)){
                return true;
            }else{
                return false;
            }
        }else{
            //补全数据
            $data['register_time'] = time();
            $data['register_ip'] = get_client_ip();
            //插入新纪录的时候需要判断一下，最后一张表
            $maxNUmber = $this->config->item('max_members');//每张用户表最大存储记录数
            $databaseName = $this->slave->database;
            $tableName = $this->slave->dbprefix.'members';
            $query = $this->slave->query("SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_SCHEMA = '$databaseName' and TABLE_NAME like '$tableName%'");
            $result = $query->result_array();
            $query->free_result();
            //现在一共有多少张用户表
            $totalTableNames = count($result);
            //所有表后面的id号
            $ids = array();
            foreach($result as $k=>$v){
                $ids[] = substr($result[$k]['TABLE_NAME'],strlen($this->slave->dbprefix.'members'));
            }
            rsort($ids);
            //最新的一张表
            $lastTableName = 'members'.$ids[0];//去除表前缀
            //最后一样表的总记录数
            $lastMembersNumber = $this->slave->count_all($lastTableName);
            if($lastMembersNumber < $maxNUmber){
                //自动插入在最后一张表中
                if( $this->master->insert($lastTableName,$data)){
                    return $this->master->insert_id();
                }else{
                    return false;
                }
            }else{
                //创建新表
                $newTableNameNoDbprefix = "members".($totalTableNames+1);
                $newTableName = $this->slave->dbprefix."members".($totalTableNames+1);
                $autoIncrementNumber = ($totalTableNames*$maxNUmber)+1;
                $createTableSql = "CREATE TABLE `$newTableName` (
					`userid` int(11) unsigned NOT NULL AUTO_INCREMENT,
					`username` varchar(30) NOT NULL,
					`password` varchar(32) NOT NULL,
					`encrypt` char(6) NOT NULL,
					`birthday` int(11) NOT NULL,
					`sex` tinyint(1) NOT NULL DEFAULT '0' COMMENT '性别 0保密 1男 2女',
					`realname` varchar(30) NOT NULL COMMENT '真实姓名',
					`email` varchar(50) NOT NULL,
					`emailauth` tinyint(1) NOT NULL,
					`skype` varchar(255) NOT NULL,
					`qq` varchar(255) NOT NULL,
					`mobile` varchar(20) NOT NULL,
					`region_id` int(11) NOT NULL,
					`education` varchar(255) NOT NULL COMMENT '最高学历：0 初中 1 高中 2 大专 3本科 4硕士 5博士 6其他',
					`trade` varchar(255) NOT NULL COMMENT '行业',
					`profession` varchar(255) NOT NULL COMMENT '职业',
					`type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1是普通会员  2是商铺',
					`register_time` int(11) NOT NULL,
					`register_ip` varchar(15) NOT NULL,
					`login_time` int(11) NOT NULL,
					`login_ip` varchar(15) NOT NULL,
					`login_count` int(11) NOT NULL,
					`disabled` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1账号禁用 0正常使用',
					`subAccountSid` char(32) NOT NULL DEFAULT '',
					`subToken` char(32) NOT NULL DEFAULT '',
					`dateCreated` varchar(60) NOT NULL DEFAULT '',
					`voipAccount` varchar(14) NOT NULL DEFAULT '',
					`voipPwd` char(8) NOT NULL DEFAULT '',
					`online` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0 不在线 1在线',
					`money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '钱包',
					`shop_contact` varchar(60) NOT NULL DEFAULT '' COMMENT '商铺联系人',
					`contact_number` varchar(30) NOT NULL DEFAULT '' COMMENT '商铺的联系方式',
					`shop_address` varchar(60) NOT NULL DEFAULT '' COMMENT '商铺的详细地址',
					`sort` varchar(60) NOT NULL DEFAULT 0 COMMENT '权重：用于商铺排序',
                                        `rtype` tinyint(1) NOT NULL DEFAULT '2' COMMENT '用户类型 {1:签约用户,2:注册用户,3:内部用户,4:注册修理厂}',
					PRIMARY KEY (`userid`)
                ) ENGINE=MyISAM AUTO_INCREMENT=$autoIncrementNumber CHARSET=utf8 COMMENT='用户信息主表';";
                if($this->master->query($createTableSql)){//创建表
                    //插入数据
                    if( $this->master->insert($newTableNameNoDbprefix,$data)){
                        return $this->master->insert_id();
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }
        }
    }
    /*
     * 根据用户id得到用户信息
     */
    public function getMemberInfoByUserid($userid){
        //首先根据会员的id，判定需要查询哪个会员表
        $maxNUmber = $this->config->item('max_members');//每张用户表最大存储记录数
        $tableName = 'members'.ceil($userid/$maxNUmber);
        $this->slave->where('userid',$userid);
        $this->slave->from($tableName);
        $query = $this->slave->get();
        $result = $query->row_array();
        return !empty($result) ? $result : '';
    }
    /*
     * 根据会员id，改变会员类型
     */
    public function updateMemberInfo($data){
        $userid = isset($data['userid']) ? $data['userid'] : 0;
        if(isset($data['userid'])){
            unset($data['userid']);
        }
        if($userid){
            //首先根据会员的id，判定需要查询哪个会员表
            $maxNUmber = $this->config->item('max_members');//每张用户表最大存储记录数
            $tableName = 'members'.ceil($userid/$maxNUmber);
            $this->master->where('userid',$userid);
            if($this->master->update($tableName, $data)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    /*
     * 多长时间没有登陆的所有用户
     * $type会员类型，$howLong多长时间未登录
     */
    public function LongTimeNoLoginMember($type,$howLong){
        $memberTables = $this->getMembersTables();
        $totalResult = array();
        if(!empty($memberTables)){
            foreach($memberTables as $v){
                $tablename = substr($v['TABLE_NAME'],strlen($this->slave->dbprefix));;//去除表前缀
                $this->slave->where('type',$type);
                $this->slave->where('login_time <', time()-$howLong);
                $this->slave->from($tablename);
                $this->slave->select('userid');
                $query = $this->slave->get();
                $result = $query->result_array();
                $totalResult = array_merge($result,$totalResult);
            }
        }
        return !empty($totalResult) ? $totalResult : '';
    }
    /*
     * 根据商铺id，得到商铺附表信息
     */
    public function getsellerProfileByUserId($userid){
        $this->slave->where('userid',$userid);
        $this->slave->from('seller_profile');
        $query = $this->slave->get();
        $result = $query->row_array();
        return !empty($result) ? $result : '';
    }
    //商铺入驻列表
    public function sellerProfileList($data){
        $result = array();
        if(isset($data['where'])){
            $this->slave->where($data['where']);
        }
        $this->slave->order_by($data['order']);
        $this->slave->limit($data['limit'],$data['offset']);
        $this->slave->from('seller_profile');
        $query = $this->slave->get();

        $result['rows'] = $query->result_array();
        $query->free_result();

        if(isset($data['where'])){
            $this->slave->where($data['where']);
        }
        $this->slave->from('seller_profile');
        $query = $this->slave->get();
        $result['total'] = $query->num_rows();
        $query->free_result();
        return $result;
    }
    //批量更新申请入驻商铺状态
    public function batchUpdatesellerProfile($data,$key){
        $result = $this->master->update_batch('seller_profile',$data,$key);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    //保存商铺扩展信息
    public function saveProfile($data){
        if(isset($data) && !empty($data)){
            if($this->master->insert('seller_profile',$data)){
                return TRUE;
            }else{
                return FALSE;
            }
        }else{
            return FALSE;
        }
    }

    //根据用户userid去查询星级
    public function getStaridByUid($userid){
        $this->slave->select('starid');
        $this->slave->from('seller_profile');
        $this->slave->where('userid',$userid);
        $query = $this->slave->get();
        $result = $query->result_array();
        $query->free_result();
        return $result;
    }

    //更新商铺扩展表
    public function updateprofile($userid,$data){
        $this->master->where('userid',$userid);
        $rst = $this->master->update('seller_profile', $data);
        if($rst){
            return TRUE;
        }else{
            return FALSE;
        }
    }


    //批量更新商户状态：锁定-未锁定
    public function batchUpdateMembersByWhere($tablename,$data,$key){
        $result = $this->master->update_batch("$tablename",$data,$key);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    //
    public function getInfoByName($where){
        $sql = "SELECT userid FROM members1 WHERE ".$where;
        $query = $this->slave->query($sql);
        $rst = $query->result_array();
        return !empty($rst) ? $rst : '';
    }

    public function sellerImagesList($userid)
    {
        $this->slave->where('userid', $userid);
        $this->slave->where('type', '1');
        $this->slave->order_by('id', 'esc');
        $this->slave->from('seller_image');
        $query = $this->slave->get();
        $result = $query->result_array();
        return !empty($result) ? $result : '';
    }

    //查询证书信息
    public function sellerZsList($userid)
    {
        $this->slave->where('userid', $userid);
        $this->slave->order_by('id', 'esc');
        $this->slave->from('seller_zs');
        $query = $this->slave->get();
        $result = $query->result_array();
        return !empty($result) ? $result : '';
    }

    //保存商铺扩展信息
    public function saveRefuse($data) {
        if(isset($data) && !empty($data)){
            $sql = "SELECT userid FROM seller_refuse WHERE `userid`='{$data['userid']}'";
            $query = $this->slave->query($sql);
            $rst = $query->result_array();
            if(empty($rst)) {
                $result = $this->master->insert('seller_refuse',$data);
            } else {
                $this->master->where('userid',$data['userid']);
                $result = $this->master->update('seller_refuse', $data);
            }
            return $result;
        }else{
            return false;
        }
    }

    //获取审核结果项
    public function getRefuseByuserid($userid) {
        $sql = "SELECT * FROM seller_refuse WHERE `userid`='{$userid}'";
        $query = $this->slave->query($sql);
        $result = $query->row_array();
        return !empty($result) ? $result : [];
    }

    //查询账户余额
    public function getShopMoney($userid)
    {

        //首先根据会员的id，判定需要查询哪个会员表
        $maxNUmber = $this->config->item('max_members');//每张用户表最大存储记录数
        $tableName = 'members'.ceil($userid/$maxNUmber);
        $this->slave->select('money');
        $this->slave->where('userid',$userid);
        $this->slave->from($tableName);
        $query = $this->slave->get();
        $result = $query->row_array();
        return !empty($result) ? $result['money'] : 0;
    }

    //查询账户冻结余额
    public function getShopFrozenMoney($userid)
    {

        $sql = "SELECT SUM(money) as total_price from frozen_account where shopid = $userid";
        $query = $this->slave->query($sql);
        $result = $query->row_array();
        return !empty($result) ? $result['total_price'] : 0;
    }
}
