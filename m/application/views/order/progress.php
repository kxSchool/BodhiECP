<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>服务进度 —— XXXXX</title>
		<link rel="stylesheet" href="<?php echo CSS; ?>/common/common.css">
		<link rel="stylesheet" href="<?php echo CSS; ?>/order/speed.css">
		<script type="text/javascript" src="<?php echo JS; ?>/common/reset.js"></script>
		<script type="text/javascript" src="<?php echo JS; ?>/common/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="<?php echo JS; ?>/common/start.js"></script>
	</head>

	<body>
		<header>
            <a href="<?php echo site_url('index/index'); ?>">
                <span class="home"></span>
            </a>
            <a href="/">
                <span class="logo"></span>
            </a>

            <a href="<?php echo site_url('user/index'); ?>">
                <span class="person"></span>
            </a>

		</header>
		<div class="layout">
			<div class="sd-top">
				<div class="sdman"><img src="<?php echo IMAGES; ?>/sdman.png" /></div>
				<a class="sdInfo">我们的服务人员正在快马加鞭为您办理，请您耐心等候......</a>
				<div class="sdrel"><span>电话</span></div>
				<div class="clearfix"></div>
			</div>
			<div class="package-status">

				<div class="status-box" id="status_list">

					<ul id="J_listtext1" style="" class="status-list">

                        <?php if(isset($progress) && !empty($progress)):?>
                            <?php foreach ($progress as $key=>$value):?>
                                <li class="<?php if($key == 0){echo 'latest';}?>">
                                    <span class="date"><?php echo date('m-d',$value['updatetime']);?></span>
                                    <span class="time"><?php echo date('H:i',$value['updatetime']);?></span>
                                    <span class="text"><?php echo $value['progress'];?></span>
                                </li>
                            <?php endforeach;?>
                        <?php endif;?>


                        <li class="<?php if(!isset($progress) || empty($progress)){echo 'latest';}?>">
                            <span class="date"><?php echo date('m-d',$pay_time);?></span>
                            <span class="time"><?php echo date('H:i',$pay_time);?></span>
                            <span class="text">订单已付款，等待服务商受理</span>

                        </li>

					</ul>
				</div>

			</div>
		</div>

	</body>

</html>