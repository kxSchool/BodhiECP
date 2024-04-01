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

//获取随机验证码
if(!function_exists('randString')){
    function randString($len = 4)
    {
        $chars = str_repeat('0123456789', 3);
        // 位数过长重复字符串一定次数
        $chars = str_repeat($chars, $len);
        $chars = str_shuffle($chars);
        $str = substr($chars, 0, $len);
        return $str;
    }
}

//获取随机密码盐
if(!function_exists('generate_password')){
    function generate_password($len = 6)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $encrypt = '';
        for ( $i = 0; $i < $len; $i++ ){
            $encrypt .= $chars[ mt_rand(0, strlen($chars) - 1) ];
        }
        return $encrypt;
    }
}

//判断用户是否登录
if(!function_exists('isLogin')){
    function isLogin()
    {
        if(empty($_SESSION['user'])){
            return false;
        }
        return true;
    }
}

//判断是否为微信浏览器
if(!function_exists('isWeixinBrowser')){
    function isWeixinBrowser()
    {
        if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {

            return true;

        }

        return false;
    }

}
//判断是否为支付宝浏览器
if(!function_exists('isAliBrowser')){
    function isAliBrowser()
    {
        if ( strpos($_SERVER['HTTP_USER_AGENT'], 'AlipayClient') !== false ) {

            return true;

        }

        return false;
    }
}

