<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>服务商系统 | 管理员管理</title>
    <?php $this -> load -> view('common/top'); ?>
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">
    <?php $this -> load -> view('common/header'); ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php $this -> load -> view('common/left'); ?>
    <div class="content-wrapper">
    <span style="font-size: 30px;"><?php if(isset($info) && isset($cacheurl)):?><?php echo $info.'<br/>'.$cacheurl;?><?php endif;?><br/>
        <?php if(isset($fands)):?><?php echo $fands;?><?php endif;?><br/>
        <?php if(isset($yandm)):?><?php echo $yandm;?><?php endif;?><br/>
    </span>
     </div>
</div>
</body>
</html>