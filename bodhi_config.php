<?php
//主数据库
$db['master'] = array(
    'dsn'	=> '',
    'hostname' => '127.0.0.1',
    'username' => 'root',
    'password' => '123456',
    'database' => 'bodhi_shopmall',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);
//从数据库
$db['slave'] = array(
    'dsn'	=> '',
    'hostname' => '127.0.0.1',
    'username' => 'root',
    'password' => '123456',
    'database' => 'bodhi_shopmall',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);
$db['goods_master'] = array(
    'dsn'	=> '',
    'hostname' => '127.0.0.1',
    'username' => 'root',
    'password' => '123456',
    'database' => 'bodhi_goods',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);

$db['goods_slave'] = array(
    'dsn'	=> '',
    'hostname' => '127.0.0.1',
    'username' => 'root',
    'password' => '123456',
    'database' => 'bodhi_goods',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);


$db['crm_master'] = array(
    'dsn'	=> '',
    'hostname' => '127.0.0.1',
    'username' => 'root',
    'password' => '123456',
    'database' => 'bodhi_crm',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);

$db['crm_slave'] = array(
    'dsn'	=> '',
    'hostname' => '127.0.0.1',
    'username' => 'root',
    'password' => '123456',
    'database' => 'bodhi_crm',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);
//主数据库
$db['log'] = array(
    'dsn'	=> '',
    'hostname' => '127.0.0.1',
    'username' => 'root',
    'password' => '123456',
    'database' => 'bodhi_log',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);
//主数据库
$db['tickets'] = array(
    'dsn'	=> '',
    'hostname' => '127.0.0.1',
    'username' => 'root',
    'password' => '123456',
    'database' => 'bodhi_tickets',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);
$adminUrl = 'http://admin.bodhitest.com';
$crmUrl = 'http://crm.bodhitest.com';
$webUrl = 'http://www.bodhitest.com';
$mUrl = 'http://m.bodhitest.com';
$apiUrl = 'http://api.bodhitest.com';
$shopUrl = 'http://crm.bodhitest.com';
$appUrl = 'http://app.bodhitest.com';
$ad_str = 'xxxx'; //广告图片：替换guangggao/ad ,防止被一些屏蔽广告的插件屏蔽掉关键字
$res = array(
    'ad_str'=> $ad_str,
    'shop_url' => $shopUrl,//商城
    'web_url' => $webUrl,//商铺中心、买家中心
    'static_path' => $adminUrl.'/static/',//资源路径
    'home_static_path' => $webUrl.'/static/',//资源路径
    'shop_static_path' => $shopUrl.'/static/',//资源路径
    'crm_static_path' => $crmUrl.'/static/',//资源路径
    'api_static_path' => $shopUrl.'/static/',//资源路径
    'send_max_number' => 1000,    //最大短信条数
    'pagesize' => 15,//后台分页大小
    'Seatsmode'=>'/data/api/application/models/',
    'ad_path' => '/data/Bodhi/code/admin/uploads/'.$ad_str.'/',//广告存放位置
    'ad_url' => $adminUrl.'/uploads/'.$ad_str.'/',//引用广告链接
    'thumb_path' => '/data/Bodhi/code/admin/uploads/thumb/',//文章缩略图存放位置
    'thumb_url' => $adminUrl.'/uploads/thumb/',//引用文章缩略图链接
    'logo_path' => '/data/Bodhi/code/admin/uploads/logo/',//站点logo存放位置
    'logo_url' => $adminUrl.'/uploads/logo/',//引用站点logo链接
    'resource_path' => '/data/Bodhi/code/admin/uploads/resource/',//站点资源存放位置
    'resource_url' => $adminUrl.'/uploads/resource/',//引用站点资源o链接
    'max_members' => 300000,//每张用户表的最大纪录数
    'admin_avatar_path' => '/data/Bodhi/code/admin/uploads/adminavatar/',//后台管理员存放头像路径
    'admin_avatar_url' => $adminUrl.'/uploads/adminavatar/',//访问后台管理员存放头像路径
    'staff_avatar_path' => '/data/Bodhi/code/admin/uploads/staffavatar/',//后台管理员存放头像路径
    'staff_avatar_url' => $adminUrl.'/uploads/staffavatar/',//访问后台管理员存放头像路径
    'members_avatar_path' => '/data/Bodhi/code/admin/uploads/avatar/',//会员存放头像路径
    'members_avatar_url' => $adminUrl.'/uploads/avatar/',//访问会员存放头像路径
    'seller_video_path' => '/data/Bodhi/code/admin/uploads/seller_video/',//卖家形象视频路径
    'seller_video_url' => $adminUrl.'/uploads/seller_video/',//访问卖家存放视频路径
    'seller_images_path' => '/data/Bodhi/code/admin/uploads/seller_images/',//卖家形象视频路径
    'seller_images_url' => $adminUrl.'/uploads/seller_images/',//访问卖家存放视频路径
    'seller_certificate_path' => '/data/Bodhi/code/admin/uploads/seller_certificate/',//卖家认证照片路径
    'seller_certificate_url' => $adminUrl.'/uploads/seller_certificate/',//访问卖家存放认证照片路径
    'seller_identity_path' => '/data/Bodhi/code/admin/uploads/seller_identity/',//卖家身份认证照片路径
    'seller_identity_url' => $adminUrl.'/uploads/seller_identity/',//访问卖家存放身份认证照片路径
    'order_status' => array('0'=>'未确认','1'=>'已确认','2'=>'退款','3'=>'钱已转移到钱包','4'=>'已取消'),//订单状态
    'shipping_status'=>array('0'=>'未发货','1'=>'准备发货','2'=>'发货中','3'=>'发货完成'),//咨询状态
    'pay_status' => array('0'=>'未付款','1'=>'付款中','2'=>'已付款'),//支付状态
    'refund_status' => array('0'=> '没人申请退款','1'=>'买家申请退款','2'=> '商铺申请退款'), //退款
    'education'=>array(0 => '初中', 1 => '高中', 2 => '大专', 3 => '本科', 4 => '硕士', 5 => '博士', 6 => '其他'),
    'level'=>array(1=>'非常不满意',2=>'不满意',3=>'一般',4=>'满意',5=>'非常满意'),

    //产品图片路径
    'goods_images_path' => '/data/Bodhi/code/admin/uploads/goods_images/',//产品图片路径
    'goods_images_url' => $adminUrl.'/uploads/goods_images/',//产品图片路径
    //入驻审核资料路径
    'identity_join_path' => '/data/Bodhi/code/admin/uploads/identity/',
    'identity_join_url' => $adminUrl.'/uploads/identity/',

    //产品图片路径
    'goods_details_path' => '/data/Bodhi/code/admin/uploads/goods_details/',//产品图片路径
    'goods_details_url' => $adminUrl.'/uploads/goods_details/',//产品图片路径
    //新闻图片路径
    'news_image_path' => '/data/Bodhi/code/admin/uploads/news_images/',
    'news_image_url' => $adminUrl.'/uploads/news_images/',
    //新添加
    'brand_path' => '/data/Bodhi/code/admin/uploads/brand/',//品牌logo存放位置
    'brand_url' => $adminUrl.'/uploads/brand/',
    //新添加
    'show_path' => '/data/Bodhi/code/admin/uploads/show/',//表演海报存放位置
    'show_url' => $adminUrl.'/uploads/show/',
    //新添加
    'venue_path' => '/data/Bodhi/code/admin/uploads/venue/',//场馆海报存放位置
    'venue_url' => $adminUrl.'/uploads/venue/',
    //新添加
    'mapBackground_path' => '/data/Bodhi/code/admin/uploads/map/',//选座图背景存放位置
    'mapBackground_url' => $adminUrl.'/uploads/map/',
    //新添加
    'mapMini_path' => '/data/Bodhi/code/admin/uploads/map/',//选座缩略图存放位置
    'mapMini_url' => $adminUrl.'/uploads/map/',
    //新添加
    'full_path' => '/data/Bodhi/code/admin/uploads/360/',//品牌logo存放位置
    'full_url' => $adminUrl.'/uploads/360/',

    //全景
    'panorama_path'=>'/data/api/uploads/panorama/',
    'panorama_url'=>$apiUrl.'/Uploads/panorama/',

    //分类关联品牌的分类路径
    'category_brand_json_path' => '/data/Bodhi/code/admin/static/json/categorybrandjson/',
    'category_brand_json_url' => $adminUrl.'/static/json/categorybrandjson/',
    //静态分类路径
    'categoryJson_path' => '/data/Bodhi/code/admin/static/json/categoryJson.js',
    'categoryJson_url' => $adminUrl.'/static/json/categoryJson.js',
    //省市县路径
    'cityJson_path' => '/data/Bodhi/code/admin/static/json/cityJson.js', //省市县
    'cityJson_url' => $adminUrl.'/static/json/cityJson.js',
    //品牌-厂商-车系路径
    'carJson_path' => '/data/Bodhi/code/admin/static/json/car/',
    'carJson_url' => $adminUrl.'/static/json/car/',

    //广告缓存路径
    'adJson_path' => '/data/Bodhi/code/admin/static/json/'.$ad_str.'/',
    'adJson_url' => $adminUrl.'/static/json/'.$ad_str.'/',

    // 商城缓存文件路径
    'Shop_Cache_VIEW_Path' =>'data/Bodhi/code/admin/cache/shop/',

    //支付宝配置
    'PAY_UNIT_FILE_PATH'    => APPPATH.'libraries/Pay/', // 支付模块路径
    'ALIPAY_KEY_PATH'       => APPPATH.'libraries/Pay/.cpl_key/rsa_key/', // 支付加密key文件路径
    'ALIPAY_GATEWAYURL'     => 'https://openapi.alipay.com/gateway.do',
    'ALIPAY_APPID'          => '2016082301789012',
    'ALIPAY_NOTIFY_URL'     => 'notifyUrl',
    'ALIPAY_SELLER_ID'      => '2088002209709720',
    //微信支付支付回调
    'WXPAY_NOTIFY_URL'      =>  'http://'.$_SERVER['HTTP_HOST'].'/web/notify/index/payment/wxpay',
    //支付宝支付回调
    'RETURN_PAY_URL'        =>  'http://'.$_SERVER['HTTP_HOST'].'/shop/b2b/order/pay',
    'NOTIFY_PAY_URL'        =>  'http://'.$_SERVER['HTTP_HOST'].'/shop/web/notify/index/alipay',

    //广告图片路径：商铺的广告图片
    'seller_ads_images_path' => '/data/Bodhi/code/admin/uploads/seller_'.$ad_str.'_images/',//产品图片路径
    'seller_ads_images_url' => $adminUrl.'/uploads/seller_'.$ad_str.'_images/',//产品图片路径

    //静态二级分类路径
    'categoryJson_two_path' => '/data/Bodhi/code/admin/static/json/twoCategoryJson.js',
    'categoryJson_two_url' => $adminUrl.'/static/json/twoCategoryJson.js',

    //静态页面
    'web_html'  =>  '/data/Bodhi/code/www/html/',
    'shop_html'  =>  '/data/Bodhi/code/www/html/',

    //静态二级分类+广告路径
    'categoryJson_two_ads_path' => '/data/Bodhi/code/admin/static/json/'.$ad_str.'/twoCategory'.$ad_str.'Json.js',
    'categoryJson_two_ads_url' => $adminUrl.'/static/json/'.$ad_str.'/twoCategory'.$ad_str.'Json.js',

    //json路径
    'json_path' =>'data/Bodhi/code/admin/static/json/',
    'json_url'=> $adminUrl.'/static/json/',

    // 商品工具文件上传下载目录
    'web_tool_excle_path' =>'/data/Bodhi/code/admin/uploads/',
    'web_tool_excle_libraries_path' =>'/data/Bodhi/code/www/application/libraries/Excel/excel.php',
    // 商品默认图片路径
    'goods_default_image_path' => '/data/Bodhi/code/admin/uploads/default_goods_images/',
    'goods_default_image_url' => $adminUrl.'/uploads/default_goods_images/',

    //每张职员表最大存储记录数
    'max_staff_number' => 300000,
    //服务商冻结金额时间
    'frozen_account_time' => 86400

);
return array("db"=>$db,"res"=>$res);