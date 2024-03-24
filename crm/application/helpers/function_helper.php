<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists( 'exif_imagetype' ) ) {
    function exif_imagetype ($filename ) {
        if ( (list($width, $height, $type, $attr) = getimagesize( $filename ) ) !== false ) {
           return $type;
        }
    return false;
    }
}
if(!function_exists('string2array')){
	function string2array($data) {
		if ($data == '')
			return array();
		$data = new_stripslashes($data);
		@eval("\$array = $data;");
		return $array;
	}
}

if(!function_exists('showDiffTime')){
    function showDiffTime($startTime, $endTime) {
        $text = '';
        if (!empty($startTime)) {
            $diffTime = $endTime - $startTime ;
            switch ($diffTime) {
                case $diffTime < 3600:
                    $text = ceil($diffTime/60).'分钟';
                    break;
                case $diffTime < 3600*24;
                    $text = ceil($diffTime/3600).'小时';
                    break;
                default :
                    $text = ceil($diffTime/3600*24).'天';
                    break;
            }
        }
        return $text;
    }
}


if(!function_exists('array2string')){
	function array2string($data) {
		if ($data == '')
			return '';
		return new_addslashes(var_export($data, TRUE));
	}

}
if(!function_exists('new_addslashes')){
	function new_addslashes($string) {
		if (!is_array($string))
			return addslashes($string);
		foreach ($string as $key => $val)
			$string[$key] = new_addslashes($val);
		return $string;
	}
}
if(!function_exists('new_stripslashes')){
	function new_stripslashes($string) {
		if (!is_array($string)){
			return stripslashes($string);
		}else{
			foreach ($string as $key => $val){
				$string[$key] = new_stripslashes($val);
			}
			return $string;
		}
	}

}

if(!function_exists("array_multi2single")){
	function array_multi2single($array){
		$arr = array();
		if(is_array($array) && !empty($array)){
			foreach($array as $w) {
				if($w['level'] != 0){
					$w['spacer'] = '┗━━';
				}else{
					$w['spacer'] = '';
				}
				if(isset($w['children'])) {
					$t = $w['children'];
					unset($w['children']);
					$arr[] = $w;
					if(is_array($t)){
						$arr = array_merge($arr, array_multi2single($t));
					}
				} else {
                    $w['nochild'] = 1;  //重要：添加一个字段用于判断数据
					$arr[] = $w;
				}
			}
			return $arr;
		}else{
			return false;
		}
	}
}
if(!function_exists('get_client_ip')){
	function get_client_ip(){
		if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
			$onlineip = getenv('HTTP_CLIENT_IP');
		} elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
			$onlineip = getenv('HTTP_X_FORWARDED_FOR');
		} elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
			$onlineip = getenv('REMOTE_ADDR');
		} elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
			$onlineip = $_SERVER['REMOTE_ADDR'];
		}

		preg_match("/[\d\.]{7,15}/", $onlineip, $onlineipmatches);
		//$onlineip = $onlineipmatches[0] ? $onlineipmatches[0] : 'unknown';

		return $onlineip;
	}
}
/**
 * 字符截取 支持UTF8/GBK
 * @param $string
 * @param $length
 * @param $dot
 */
function str_cut($string, $length, $dot = '...') {
	$ci = & get_instance();
	$ci->load->config('system');//加载系统配置文件
	$strlen = strlen($string);
	if($strlen <= $length) return $string;
	$string = str_replace(array(' ','&nbsp;', '&amp;', '&quot;', '&#039;', '&ldquo;', '&rdquo;', '&mdash;', '&lt;', '&gt;', '&middot;', '&hellip;'), array('∵',' ', '&', '"', "'", '“', '”', '—', '<', '>', '·', '…'), $string);
	$strcut = '';
	if(strtolower($ci->config->item('charset')) == 'utf-8') {
		$length = intval($length-strlen($dot)-$length/3);
		$n = $tn = $noc = 0;
		while($n < strlen($string)) {
			$t = ord($string[$n]);
			if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
				$tn = 1; $n++; $noc++;
			} elseif(194 <= $t && $t <= 223) {
				$tn = 2; $n += 2; $noc += 2;
			} elseif(224 <= $t && $t <= 239) {
				$tn = 3; $n += 3; $noc += 2;
			} elseif(240 <= $t && $t <= 247) {
				$tn = 4; $n += 4; $noc += 2;
			} elseif(248 <= $t && $t <= 251) {
				$tn = 5; $n += 5; $noc += 2;
			} elseif($t == 252 || $t == 253) {
				$tn = 6; $n += 6; $noc += 2;
			} else {
				$n++;
			}
			if($noc >= $length) {
				break;
			}
		}
		if($noc > $length) {
			$n -= $tn;
		}
		$strcut = substr($string, 0, $n);
		$strcut = str_replace(array('∵', '&', '"', "'", '“', '”', '—', '<', '>', '·', '…'), array(' ', '&amp;', '&quot;', '&#039;', '&ldquo;', '&rdquo;', '&mdash;', '&lt;', '&gt;', '&middot;', '&hellip;'), $strcut);
	} else {
		$dotlen = strlen($dot);
		$maxi = $length - $dotlen - 1;
		$current_str = '';
		$search_arr = array('&',' ', '"', "'", '“', '”', '—', '<', '>', '·', '…','∵');
		$replace_arr = array('&amp;','&nbsp;', '&quot;', '&#039;', '&ldquo;', '&rdquo;', '&mdash;', '&lt;', '&gt;', '&middot;', '&hellip;',' ');
		$search_flip = array_flip($search_arr);
		for ($i = 0; $i < $maxi; $i++) {
			$current_str = ord($string[$i]) > 127 ? $string[$i].$string[++$i] : $string[$i];
			if (in_array($current_str, $search_arr)) {
				$key = $search_flip[$current_str];
				$current_str = str_replace($search_arr[$key], $replace_arr[$key], $current_str);
			}
			$strcut .= $current_str;
		}
	}
	return $strcut.$dot;
}
function random($length, $chars = '0123456789') {
	$hash = '';
	$max = strlen($chars) - 1;
	for($i = 0; $i < $length; $i++) {
		$hash .= $chars[mt_rand(0, $max)];
	}
	return $hash;
}
/**
 * 得到新商品编号
 * @return  string
 */
function get_product_sn()
{
	/* 选择一个随机的方案 */
	return $sn = date('Ymdhis') . str_pad(mt_rand(1, 9999999), 7, '0', STR_PAD_LEFT);
}
/**
 * 得到订单编号
 * @return  string
 */
function get_order_sn()
{
	/* 选择一个随机的方案 */
	return $sn = date('Ymdhis') . str_pad(mt_rand(1, 9999999), 7, '0', STR_PAD_LEFT);
}
//资金流水号
function account_log_sn()
{
	/* 选择一个随机的方案 */
	return $sn = date('Ymdhis') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
}



/***************  以下为对数组进行分页  ******************/
//基于数组的分页效果
/**
 * 数组分页函数  核心函数  array_slice
 * 用此函数之前要先将数据库里面的所有数据按一定的顺序查询出来存入数组中
 * $count   每页多少条数据
 * $page   当前第几页
 * $array   查询出来的所有数组
 * order 0 - 不变     1- 反序
 */

function page_array($count,$page,$array,$order){
    global $countpage; #定全局变量
    $page=(empty($page))?'1':$page; #判断当前页面是否为空 如果为空就表示为第一页面
    $start=($page-1)*$count; #计算每次分页的开始位置
    if($order==1){
        $array=array_reverse($array);
    }
    $totals=count($array);
    $countpage=ceil($totals/$count); #计算总页面数
    $pagedata=array();
    $pagedata=array_slice($array,$start,$count);
    $data['countpage'] = $countpage;
    $data['pagedata'] = $pagedata;
    return $data;  #返回查询数据
};

/**
 * 分页及显示函数
 * $countpage 全局变量，照写
 * $url 当前url
 */
function show_array($countpage,$url = ''){
    $data = array();
    $page=empty($_GET['page'])?1:$_GET['page'];
    if($page > 1){
        $uppage=$page-1;
        $data['uppage'] = $uppage;
    }else{
        $uppage=1;
        $data['uppage'] = $uppage;
    }
    if($page < $countpage){
        $nextpage=$page+1;
        $data['nextpage'] = $nextpage;
    }else{
        $nextpage = $countpage;
        $data['nextpage'] = $nextpage;
    }
    return $data;
}


/***************  以上为对数组进行分页  ******************/


if(!function_exists('cpl_import')) {
    /**
     * @function 以网站根目录开始引入，区分大小写
     * @param $path 引入文件
     */
    function cpl_import($path) {
        if (file_exists($path)) {
            include_once($path);
        }
    }
}


/******************数据验证***********************/
if(!function_exists('checkTel')) {
    // 验证手机号
    function checkTel($tel) {
        return preg_match('/^1(3|4|5|8|7)\d{9}$/', $tel);
    }
}
if(!function_exists('checkEmail')) {
    // 验证邮箱
    function checkEmail($email) {
        $mode = "/^\\w+((-\\w+)|(\\.\\w+))*\\@[A-Za-z0-9]+((\\.|-)[A-Za-z0-9]+)*\\.[A-Za-z0-9]+$/";
        return preg_match($mode, $email);
    }
}

/**
 *  比较2个字符串是否是同一个字串
 * @param string $str1 字串1
 * @param string $str2 字串2
 * @return boolean  true表示同一个,false表示不是同一个
 */
if(!function_exists('checkConfirm')) {
    function checkConfirm($str1, $str2) {
        return $str1 === $str2 ? true : false;
    }
}


/**
 * @function checkNumber 检测是否为数字
 * @param string $value 值
 * @param string $min 最小长度
 * @param string $max 最大长度 (为空或零则不限长)
 * @return bool {false:'非数值',true:'数值'}
 *
 */
if(!function_exists('checkNumber')) {
    function checkNumber($value, $min = 0, $max = '') {
        if (empty($max)) {
            $mode = '/\d*/isU';
        } else {
            $mode = '/^\d{' . $min . ',' . $max . '}$/isU';
        }
        return preg_match($mode, $value) ? true : false;
    }
}


/**
 * 生成随机字串
 * @param int $length 要生成的随机字符串长度
 * @param string $type 随机码类型：0,数字+大写字母；1,数字；2,小写字母；3,大写字母；4,特殊字符；-1,数字+大小写字母+特殊字符
 * @return string 生成指定长度的字串
 */
if(!function_exists('randCode')){
    function randCode($length = 5, $type = 0) {
        $arr = array(1 => "0123456789", 2 => "abcdefghijklmnopqrstuvwxyz", 3 => "ABCDEFGHIJKLMNOPQRSTUVWXYZ", 4 => "~@#$%^&*(){}[]|");
        if ($type == 0) {
            array_pop($arr);
            $string = implode("", $arr);
        } else if ($type == "-1") {
            $string = implode("", $arr);
        } else {
            $string = $arr[$type];
        }
        $count = strlen($string) - 1;
        $code = '';
        for ($i = 0; $i < $length; $i++) {
            $str[$i] = $string[rand(0, $count)];
            $code .= $str[$i];
        }
        return $code;
    }
}



//删除目录及其所有子文件
function delAllDirsAndFiles($pathname){
    //打开目录
    $handle = opendir($pathname);
    //循环操作
    while($line = readdir($handle)){
        if($line == "." || $line == "..") continue;
        if(is_dir($pathname."/".$line)){
            //递归调用
            delAllDirsAndFiles($pathname."/".$line);
        }else{
            unlink($pathname."/".$line);
        }
    }
    //删除目录
    rmdir($pathname);
}

if(!function_exists('shippingTypeToText')){
    function shippingTypeToText($code) {
        //1:专线,2:普通物流,3:摩的,4:快递,5:其他
        switch($code) {
            case 1:
                $text = '专线';
                break;
            case 2:
                $text = '普通物流';
                break;
            case 3:
                $text = '摩的';
                break;
            case 4:
                $text = '快递';
                break;
            case 5:
                $text = '其他';
                break;
            default :
                $text = '';
                break;
        }
        return $text;
    }
}


