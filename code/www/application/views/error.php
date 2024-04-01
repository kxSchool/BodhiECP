
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>error</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link href="<?php echo CSS?>/error.css" rel="stylesheet" type="text/css" />
    <!-- 设置2秒返回  -->
    <script type="text/javascript">setTimeout(function(){top.location="<?php echo $url?>";},<?php echo $time * 1000;?>)</script>
</head>

<body>
<div class="error404">
    <div class="info">
        <h1><?php echo $code;?></h1>
        <h2><?php echo $message;?>(｡•ˇ‸ˇ•｡)</h2>
        <p class="p1"><?php echo $time?>秒钟后进行跳转</p>

    </div>
    <div class="pic">
        <img src="<?php echo IMAGES?>/common/error.gif" alt=" " />
    </div>
</div>
</body>
</html>