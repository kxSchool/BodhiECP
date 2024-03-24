<?php
//////////////////////////////////////////////////////////////////////
// 章爱军(永远的大牛)                                               //
// Trial License: For evaluation only!                              //
// (c) 2018, ZhangAijun, http://www.mydeershow.com                  //
//////////////////////////////////////////////////////////////////////

class Staffmodel extends CI_Model {
    
    /**
     * 根据职员账号获取职员信息
     * @param array $account 
     * @param boolean $flag false表示返回是否存在,true表示返回存在的信息
     * @return boolean||array 返回是否存在或者职员信息
     */
    public function getAdminList($data=[]){
        $returndata = []; // 返回数据
        // 查询职员总共表
        $databaseName = $this->crmslave->database;
        $tableName = $this->crmslave->dbprefix.'staff';
        $staffTableSql = $this->crmslave->query("SELECT TABLE_NAME FROM information_schema.TABLES "
                . "WHERE TABLE_SCHEMA = '$databaseName' and TABLE_NAME like '$tableName%' AND TABLE_NAME "
                . "NOT IN('staff_priv','staff_role','staff_role_priv')");
        $result = $staffTableSql->result_array();
        // 执行查询语句
        foreach($result as $rskey=>$rsval){
            $searchSql = 'SELECT * FROM '.$rsval['TABLE_NAME'].' WHERE isadmin=1 ORDER BY userid ASC ';
            $staff = $this->crmslave->query($searchSql)->result_array();
            if(!empty($staff)){  //如果查询存在的职员信息 由于账号和手机号邮箱唯一性 只取一个有效值
                foreach($staff as $stkey=>$stval){
                    if(!empty($stval)){
                        $returndata[] = $stval;
                    }
                }
            } 
        }
        // 分页返回数据
        if(!empty($returndata[$data['offset']])){
            if(!empty($returndata[($data['offset']-1+$data['limit'])])){
                return ['rows'=>array_slice($returndata, $data['offset'],($data['offset']-1+$data['limit'])),'total'=> count($returndata)];
            }else{
                return ['rows'=>array_slice($returndata, $data['offset']),'total'=> count($returndata)];
            }
        }else{
            return ['rows'=>[],'total'=> count($returndata)];
        }
    }
    
    /*
     * 得到所有职员表名
     */
    public function getSstaffTables(){
        $databaseName = $this->crmslave->database;
        $tableName = $this->crmslave->dbprefix.'staff';
        $staffTableSql = $this->crmslave->query("SELECT TABLE_NAME FROM information_schema.TABLES "
                . "WHERE TABLE_SCHEMA = '$databaseName' and TABLE_NAME like '$tableName%' AND TABLE_NAME "
                . "NOT IN('staff_priv','staff_role','staff_role_priv')");
        $result = $staffTableSql->result_array();
        return !empty($result) ? $result : '';
    }
    /*
     * 会员列表
     */
    public function stafflist($tablename,$data){
        $tablename = substr($tablename,strlen($this->crmslave->dbprefix));;//去除表前缀
        $this->crmslave->where($data['where']);
        if(isset($data['like'])){
            foreach($data['like'] as $k=>$v){
                $this->crmslave->like($k, $v, 'both');
            }
        }
        $this->crmslave->order_by($data['order']);
        $this->crmslave->limit($data['limit'],$data['offset']);
        $this->crmslave->from($tablename);
        $query = $this->crmslave->get();
        $result['rows'] = $query->result_array();
        $query->free_result();

        $this->crmslave->where($data['where']);
        if(isset($data['like'])){
            foreach($data['like'] as $k=>$v){
                $this->crmslave->like($k, $v, 'both');
            }
        }
        $this->crmslave->from($tablename);
        $query = $this->crmslave->get();
        $result['total'] = $query->num_rows();
        $query->free_result();
        return $result;
    }
    
    
        /**
     * 根据职员账号获取职员信息
     * @param array $account 账号
     * @param array $account 店铺id
     * @return boolean||array 返回是否存在或者职员信息
     */
    public function getShopAccountLoginInfo($account='',$shopid=0){
        if(empty($account) || empty($shopid)){
            return [];
        }
        $returndata = []; // 返回数据
        // 查询职员总共表
        $databaseName = $this->crmslave->database;
        $tableName = $this->crmslave->dbprefix.'staff';
        $staffTableSql = $this->crmslave->query("SELECT TABLE_NAME FROM information_schema.TABLES "
                . "WHERE TABLE_SCHEMA = '$databaseName' and TABLE_NAME like '$tableName%' AND TABLE_NAME "
                . "NOT IN('staff_priv','staff_role','staff_role_priv')");
        $result = $staffTableSql->result_array();
        // 执行查询语句
        foreach($result as $rskey=>$rsval){
            $searchSql = 'SELECT * FROM '.$rsval['TABLE_NAME'].' WHERE (username=\''.$account.'\' OR email=\''.$account.'\' OR '
                    . 'mobile=\''.$account.'\') AND shopid='.$shopid.' ORDER BY userid DESC ';
            $staff = $this->crmslave->query($searchSql)->result_array();
            if(!empty($staff[0])){  //如果查询存在的职员信息 由于账号和手机号邮箱唯一性 只取一个有效值
                $returndata = $staff[0];
                break;
            } 
        }
        // 返回数据
        return $returndata;
    }
    
    /**
     * 根据职员账号获取职员信息
     * @param array $account 
     * @param boolean $flag false表示返回是否存在,true表示返回存在的信息
     * @return boolean||array 返回是否存在或者职员信息
     */
    public function getAdminByAccount($account=''){
        if(empty($account)){
            return [];
        }
        $returndata = []; // 返回数据
        // 查询职员总共表
        $databaseName = $this->crmslave->database;
        $tableName = $this->crmslave->dbprefix.'staff';
        $staffTableSql = $this->crmslave->query("SELECT TABLE_NAME FROM information_schema.TABLES "
                . "WHERE TABLE_SCHEMA = '$databaseName' and TABLE_NAME like '$tableName%' AND TABLE_NAME "
                . "NOT IN('staff_priv','staff_role','staff_role_priv')");
        $result = $staffTableSql->result_array();
        // 执行查询语句
        foreach($result as $rskey=>$rsval){
            $searchSql = 'SELECT * FROM '.$rsval['TABLE_NAME'].' WHERE username=\''.$account.'\' OR email=\''.$account.'\' OR '
                    . 'mobile=\''.$account.'\' ORDER BY userid DESC ';
            $staff = $this->crmslave->query($searchSql)->result_array();
            if(!empty($staff[0])){  //如果查询存在的职员信息 由于账号和手机号邮箱唯一性 只取一个有效值
//                foreach($staff as $stkey=>$stval){
//                    if(!empty($stval)){
                $returndata = $staff[0];
                break;
//                    }
//                }
            } 
        }
        // 返回数据
        return $returndata;
    }
    
    /**
     * 根据标志$flag返回指定查询条件的职员信息
     * @param array $data 查询条件数组<br>格式 : [字段=>值,字段=>值]
     * @param boolean $flag false表示返回是否存在,true表示返回存在的信息
     * @return boolean||array 返回是否存在或者职员信息
     */
    public function getStaffInfoBySearchFields($data=[],$flag=false){
        $returndata = []; // 返回数据
        // 查询职员总共表
        $databaseName = $this->crmslave->database;
        $tableName = $this->crmslave->dbprefix.'staff';
        $staffTableSql = $this->crmslave->query("SELECT TABLE_NAME FROM information_schema.TABLES "
                . "WHERE TABLE_SCHEMA = '$databaseName' and TABLE_NAME like '$tableName%' AND TABLE_NAME "
                . "NOT IN('staff_priv','staff_role','staff_role_priv')");
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
            $staff = $this->crmslave->query($searchSql)->result_array();
            if(!$flag && !empty($staff)){ //如果只是查询是否存在
                return TRUE;
            }
            if($flag && !empty($staff)){  //如果查询存在的职员信息
                //$returndata[] = $staff[0];
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
    
    public function saveStaffInfo($data=[]){
        if(empty($data['userid'])){
            return false;
        }
        //首先根据会员的id，判定需要查询哪个会员表
        $maxNUmber = $this->config->item('max_staff_number');//每张用户表最大存储记录数
        $tableName = 'staff'.ceil($data['userid']/$maxNUmber);
        $this->crmslave->where('userid',$data['userid']);
        if($this->crmslave->update($tableName, $data)){
            return true;
        }else{
            return false;
        }
    }
            
    
    /*
     * 保存会员信息
     */
    public function saveSstaff($data){
        $userid = isset($data['userid']) ? $data['userid'] : 0;
        if(isset($data['userid'])){
            unset($data['userid']);
        }
        if($userid){
            //首先根据会员的id，判定需要查询哪个会员表
            $maxNUmber = $this->config->item('max_staff_number');//每张用户表最大存储记录数
            $tableName = 'staff'.ceil($userid/$maxNUmber);
            $this->crmslave->where('userid',$userid);
            if($this->crmslave->update($tableName, $data)){
                return true;
            }else{
                return false;
            }
        }else{
            //补全数据
            $data['register_time'] = time();
            $data['register_ip'] = get_client_ip();
            //插入新纪录的时候需要判断一下，最后一张表
            $maxNUmber = $this->config->item('max_staff_number');//每张用户表最大存储记录数
            $databaseName = $this->crmslave->database;
            $tableName = $this->crmslave->dbprefix.'staff';
            $query = $this->crmslave->query("SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_SCHEMA = "
                    . "'$databaseName' and TABLE_NAME like '$tableName%' AND TABLE_NAME "
                . "NOT IN('staff_priv','staff_role','staff_role_priv')");
            $result = $query->result_array();
            $query->free_result();
            //现在一共有多少张用户表
            $totalTableNames = count($result);
            //所有表后面的id号
            $ids = array();
            foreach($result as $k=>$v){
                $ids[] = substr($result[$k]['TABLE_NAME'],strlen($this->crmslave->dbprefix.'staff'));
            }
            rsort($ids);
            //最新的一张表
            $lastTableName = 'staff'.$ids[0];//去除表前缀
            //最后一样表的总记录数
            $lastSstaffNumber = $this->crmslave->count_all($lastTableName);
            if($lastSstaffNumber < $maxNUmber){
                //自动插入在最后一张表中
                if( $this->crmmaster->insert($lastTableName,$data)){
                    return $this->crmmaster->insert_id();
                }else{
                    return false;
                }
            }else{
                //创建新表
                $newTableNameNoDbprefix = "staff".($totalTableNames+1);
                $newTableName = $this->crmslave->dbprefix."staff".($totalTableNames+1);
                $autoIncrementNumber = ($totalTableNames*$maxNUmber)+1;
                $createTableSql = "CREATE TABLE `$newTableName` (
                                    `userid` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '会员id',
                                    `username` varchar(30) NOT NULL COMMENT '账号名',
                                    `password` varchar(32) NOT NULL COMMENT '密码，加密方式为：明码md5得到的结果后面拼接上加密秘钥（encrypt），最后在md5',
                                    `encrypt` char(6) NOT NULL COMMENT '秘钥（六位的随机字母）',
                                    `birthday` int(11) NOT NULL COMMENT '生日',
                                    `sex` tinyint(1) NOT NULL DEFAULT '0' COMMENT '性别 0保密 1男 2女',
                                    `realname` varchar(30) NOT NULL COMMENT '真实姓名',
                                    `email` varchar(50) NOT NULL COMMENT '邮箱',
                                    `emailauth` tinyint(1) NOT NULL COMMENT '0:未认证;1已认证',
                                    `skype` varchar(255) NOT NULL COMMENT 'skype',
                                    `qq` varchar(255) NOT NULL,
                                    `education` varchar(255) NOT NULL COMMENT '最高学历：0 初中 1 高中 2 大专 3本科 4硕士 5博士 6其他',
                                    `trade` varchar(255) NOT NULL,
                                    `profession` varchar(255) NOT NULL COMMENT '职业',
                                    `region_id` int(11) NOT NULL COMMENT '地区id',
                                    `mobile` varchar(20) NOT NULL,
                                    `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1是普通会员  2是咨询师',
                                    `register_time` int(11) NOT NULL COMMENT '注册时间（时间戳）',
                                    `register_ip` varchar(15) NOT NULL COMMENT '注册IP',
                                    `login_time` int(11) NOT NULL COMMENT '上次登陆时间（时间戳）',
                                    `login_ip` varchar(15) NOT NULL COMMENT '上次登陆IP',
                                    `login_count` int(11) NOT NULL COMMENT '总计登陆次数',
                                    `disabled` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1账号禁用 0正常使用',
                                    `subAccountSid` char(32) NOT NULL DEFAULT '' COMMENT '云通讯子账户Id',
                                    `subToken` char(32) NOT NULL DEFAULT '' COMMENT '云通讯子账户的授权令牌',
                                    `dateCreated` varchar(60) NOT NULL DEFAULT '' COMMENT '云通讯子账户的创建时间',
                                    `voipAccount` varchar(14) NOT NULL DEFAULT '' COMMENT '云通讯VoIP号码',
                                    `voipPwd` char(8) NOT NULL DEFAULT '' COMMENT '云通讯VoIP密码',
                                    `online` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0 不在线 1在线',
                                    `money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '钱包',
                                    `shop_contact` varchar(60) NOT NULL DEFAULT '' COMMENT '商铺联系人',
                                    `contact_number` varchar(30) NOT NULL DEFAULT '' COMMENT '商铺的联系方式',
                                    `shop_address` varchar(60) NOT NULL DEFAULT '' COMMENT '商铺的详细地址',
                                    `sort` tinyint(6) NOT NULL,
                                    `hxname` varchar(255) NOT NULL DEFAULT '' COMMENT '环信账号',
                                    `hxpassword` varchar(255) NOT NULL DEFAULT '' COMMENT '环信密码',
                                    `shopid` int(11) NOT NULL DEFAULT '0' COMMENT '商铺id号',
                                    `roleid` int(11) NOT NULL COMMENT '角色id（对应staff_role表中的roleid）',
                                    `addtime` datetime DEFAULT NULL COMMENT '修理厂入住平台时间',
                                    `isadmin` smallint(3) NOT NULL COMMENT '是否是管理员',
                                    
                                    PRIMARY KEY (`userid`)
                                  ) ENGINE=MyISAM AUTO_INCREMENT=$autoIncrementNumber DEFAULT CHARSET=utf8 COMMENT='账户主表';";
                if($this->crmmaster->query($createTableSql)){//创建表
                    //插入数据
                    if( $this->crmmaster->insert($newTableNameNoDbprefix,$data)){
                        return $this->crmmaster->insert_id();
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
    public function getStaffInfoByUserid($userid){
        //首先根据会员的id，判定需要查询哪个会员表
        $maxNUmber = $this->config->item('max_staff_number');//每张职员表最大存储记录数
        $tableName = 'staff'.ceil($userid/$maxNUmber);
        $this->crmslave->where('userid',$userid);
        $this->crmslave->from($tableName);
        $query = $this->crmslave->get();
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
            $maxNUmber = $this->config->item('max_staff_number');//每张用户表最大存储记录数
            $tableName = 'staff'.ceil($userid/$maxNUmber);
            $this->crmmaster->where('userid',$userid);
            if($this->crmmaster->update($tableName, $data)){
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
        $memberTables = $this->getSstaffTables();
        $totalResult = array();
        if(!empty($memberTables)){
            foreach($memberTables as $v){
                $tablename = substr($v['TABLE_NAME'],strlen($this->crmslave->dbprefix));;//去除表前缀
                $this->crmslave->where('type',$type);
                $this->crmslave->where('login_time <', time()-$howLong);
                $this->crmslave->from($tablename);
                $this->crmslave->select('userid');
                $query = $this->crmslave->get();
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
        $this->crmslave->where('userid',$userid);
        $this->crmslave->from('seller_profile');
        $query = $this->crmslave->get();
        $result = $query->row_array();
        return !empty($result) ? $result : '';
    }
    //商铺入驻列表
    public function sellerProfileList($data){
        $result = array();
        if(isset($data['where'])){
            $this->crmslave->where($data['where']);
        }
        $this->crmslave->order_by($data['order']);
        $this->crmslave->limit($data['limit'],$data['offset']);
        $this->crmslave->from('seller_profile');
        $query = $this->crmslave->get();

        $result['rows'] = $query->result_array();
        $query->free_result();

        if(isset($data['where'])){
            $this->crmslave->where($data['where']);
        }
        $this->crmslave->from('seller_profile');
        $query = $this->crmslave->get();
        $result['total'] = $query->num_rows();
        $query->free_result();
        return $result;
    }
    //批量更新申请入驻商铺状态
    public function batchUpdatesellerProfile($data,$key){
        $result = $this->crmmaster->update_batch('seller_profile',$data,$key);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    //保存商铺扩展信息
    public function saveProfile($data){
        if(isset($data) && !empty($data)){
            if($this->crmmaster->insert('seller_profile',$data)){
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
        $this->crmslave->select('starid');
        $this->crmslave->from('seller_profile');
        $this->crmslave->where('userid',$userid);
        $query = $this->crmslave->get();
        $result = $query->result_array();
        $query->free_result();
        return $result;
    }

    //更新商铺扩展表
    public function updateprofile($userid,$data){
        $this->crmmaster->where('userid',$userid);
        $rst = $this->crmmaster->update('seller_profile', $data);
        if($rst){
            return TRUE;
        }else{
            return FALSE;
        }
    }


    //批量更新商户状态：锁定-未锁定
    public function batchUpdateSstaffByWhere($tablename,$data,$key){
        $result = $this->crmmaster->update_batch("$tablename",$data,$key);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    //
    public function getInfoByName($where){
        $sql = "SELECT userid FROM staff1 WHERE ".$where;
        $query = $this->crmslave->query($sql);
        $rst = $query->result_array();
        return !empty($rst) ? $rst : '';
    }

    public function sellerImagesList($userid)
    {
        $this->crmslave->where('userid', $userid);
        $this->crmslave->where('type', '1');
        $this->crmslave->order_by('id', 'esc');
        $this->crmslave->from('seller_image');
        $query = $this->crmslave->get();
        $result = $query->result_array();
        return !empty($result) ? $result : '';
    }

    //查询证书信息
    public function sellerZsList($userid)
    {
        $this->crmslave->where('userid', $userid);
        $this->crmslave->order_by('id', 'esc');
        $this->crmslave->from('seller_zs');
        $query = $this->crmslave->get();
        $result = $query->result_array();
        return !empty($result) ? $result : '';
    }

    //保存商铺扩展信息
    public function saveRefuse($data) {
        if(isset($data) && !empty($data)){
            $sql = "SELECT userid FROM seller_refuse WHERE `userid`='{$data['userid']}'";
            $query = $this->crmslave->query($sql);
            $rst = $query->result_array();
            if(empty($rst)) {
                $result = $this->crmmaster->insert('seller_refuse',$data);
            } else {
                $this->crmmaster->where('userid',$data['userid']);
                $result = $this->crmmaster->update('seller_refuse', $data);
            }
            return $result;
        }else{
            return false;
        }
    }

    //获取审核结果项
    public function getRefuseByuserid($userid) {
        $sql = "SELECT * FROM seller_refuse WHERE `userid`='{$userid}'";
        $query = $this->crmslave->query($sql);
        $result = $query->row_array();
        return !empty($result) ? $result : [];
    }

    //根据ID获取管理员姓名
    public function getNameById($staff_id)
    {
        $this->crmslave->select('username');
        $maxNUmber = $this->config->item('max_staff_number');//每张用户表最大存储记录数

        $tableName = 'staff' . ceil(intval($staff_id)/$maxNUmber);

        $this->crmslave->from($tableName);
        $this->crmslave->where('userid',$staff_id);
        $query = $this->crmslave->get();
        $result = $query->result_array();
        $query->free_result();
        return empty($result) ? false : $result[0]['username'];
    }
}
