<?php
/**
 * 获取已上传的文件列表
 * User: Jinqn
 * Date: 14-04-09
 * Time: 上午10:17
 */
include "Uploader.class.php";
/* 判断类型 */
switch ($_GET['action']) {
    /* 列出文件 */
    case 'listfile':
        $allowFiles = $CONFIG['fileManagerAllowFiles'];
        $listSize = $CONFIG['fileManagerListSize'];
        $path = $CONFIG['fileManagerListPath'];
        break;
    /* 列出图片 */
    case 'listimage':
    default:
        $allowFiles = $CONFIG['imageManagerAllowFiles'];
        $listSize = $CONFIG['imageManagerListSize'];
        $path = $CONFIG['imageManagerListPath'];
}
$allowFiles = substr(str_replace(".", "|", join("", $allowFiles)), 1);

/* 获取参数 */
$size = isset($_GET['size']) ? htmlspecialchars($_GET['size']) : $listSize;
$start = isset($_GET['start']) ? htmlspecialchars($_GET['start']) : 0;
$end = $start + $size;

/* 获取文件列表 */
$systemConfig = require_once("../../../application/config/system.php");
$path = $systemConfig['resource_path'].(substr($path, 0, 1) == "/" ? "":"/");
$files = getfiles($path, $allowFiles,$systemConfig);
if (!count($files)) {
    return json_encode(array(
        "state" => "no match file",
        "list" => array(),
        "start" => $start,
        "total" => count($files)
    ));
}

/* 获取指定范围的列表 */
$len = count($files);
for ($i = min($end, $len) - 1, $list = array(); $i < $len && $i >= 0 && $i >= $start; $i--){
    $list[] = $files[$i];
}
//倒序
//for ($i = $end, $list = array(); $i < $len && $i < $end; $i++){
//    $list[] = $files[$i];
//}

/* 返回数据 */
$result = json_encode(array(
    "state" => "SUCCESS",
    "list" => $list,
    "start" => $start,
    "total" => count($files)
));
return $result;

/**
 * 遍历获取目录下的指定类型的文件
 * @param $path
 * @param array $files
 * @return array
 */
function getfiles($path, $allowFiles,$systemConfig, &$files = array()){
    if (!is_dir($path)) return null;
    if(substr($path, strlen($path) - 1) != '/') $path .= '/';
    $dbconfig = require_once("../../../application/config/database.php");
    $pdo = new PDO("mysql:host=".$dbconfig['master']['hostname'].";dbname=".$dbconfig['master']['database'], $dbconfig['master']['username'], $dbconfig['master']['password']);
    $pdo->query('set names utf8');
    $sql = "SELECT * FROM ".$dbconfig['master']['dbprefix']."resource";
    $re = $pdo->query($sql);
    $info = $re->fetchAll(PDO::FETCH_ASSOC);
    foreach($info as $k => $file){
        if (preg_match("/\.(".$allowFiles.")$/i", $file['filename'])) {
            $files[] = array(
                'url'=>$systemConfig['resource_url'].date('Ymd',$file['uploadtime']).'/'.$file['filename'],
                'mtime'=> filemtime($path.'/'.date('Ymd',$file['uploadtime']).'/'.$file['filename']),
                'original' => $file['origin_name']
            );
        }
    }
    return $files;
}