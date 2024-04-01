<?php

if(!function_exists('dump')){
    function dump($vars, $label = '', $return = false)
    {
        if (ini_get('html_errors')) {
            $content = "<pre>\n";
            if ($label != '') {
                $content .= "<strong>{$label} :</strong>\n";
            }
            $content .= htmlspecialchars(print_r($vars, true));
            $content .= "\n</pre>\n";
        } else {
            $content = $label . " :\n" . print_r($vars, true);
        }
        if ($return) { return $content; }
        echo $content;
        return null;
    }
}

if(!function_exists('getthemonth')){
    function getthemonth($date)
    {
        $month['firstday'] = date('Y-m-01', strtotime($date));
        $month['lastday'] = date('Y-m-d', strtotime($month['firstday']." +1 month -1 day"));
        return $month;
    }
}

if(!function_exists('GetPartStr')){
    function GetPartStr($str,$len)//$str字符串 $len 控制长度
    {
        $one=0;
        $partstr='';
        for($i=0;$i<$len;$i++){
            $sstr=substr($str,$one,1);
            if(ord($sstr)>224){
                $partstr.=substr($str,$one,3);
                $one+=3;
            }
            elseif(ord($sstr)>192){
                $partstr.=substr($str,$one,2);
                $one+=2;
            }
            elseif(ord($sstr)<192){
                $partstr.=substr($str,$one,1);
                $one+=1;
            }
        }
        if(strlen($str)<$one){
            return $partstr;}else{
            return $partstr.'....';
        }
    }
}



