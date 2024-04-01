<!DOCTYPE html>
<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="x-dns-prefetch-control" content="on">
		<title>关于退款 - 用户中心 - XXXXX</title>
		<!-- common css -->
		<link href="<?php echo CSS?>/common.css" rel="stylesheet" type="text/css">
		<link href="<?php echo CSS?>/sort.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="<?php echo CSS?>/common/base.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo CSS?>/common/public.css" />
		<link rel="stylesheet" href="<?php echo CSS?>/order/speed.css" />
		<script type="text/javascript" src="<?php echo JS?>/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="<?php echo JS?>/common/common.js"></script>

		<body>
			<div id="nTalk_post_hiddenElement" style="left: -10px; top: -10px; visibility: hidden; display: none; width: 1px; height: 1px;"></div>
			<!--header start-->
			<header>

                <?php include_once BASE.'/top.php';?>
                <div class="personal-header">
                    <div class="container clearfix logo myTab" style="border: 1px solid #fff;">
                        <a href="/index/index" class="my-logo"><img src="<?php echo IMG?>/common/logo.png"></a>
                        <a href="/user/index" class="my-main active">我的主页</a>
                        <a href="/user/accountSet" class="account-set">账号设置</a>
                    </div>

                </div>
				<script type="text/javascript">
					$(function() {
						$('.myTab').find('a').on('click', function() {
							var $this = $(this);
							$this.addClass('active').siblings().removeClass('active');
						})
					});
				</script>

			</header>
			<!--header end-->
			<!--layout start-->
			<div class="layout">

				<div class="bg-white">
					<div class="container">
						<div class="mycenter">
							<div class="tip_title">
								<p>
									首页>订单中心>查看进度
								</p>
							</div>

						</div>
						<div class="sd-top">
							<p>我们的服务人员正在快马加鞭为您办理，请您耐心等候......</p>
						</div>
						<div class="package-status" data-spm-anchor-id="a2d00.7723416.0.i15.39e71fc9yUgPco">

							<div class="status-box" id="status_list">

								<ul id="J_listtext1" style="" class="status-list">

                                    <?php if(isset($progress) && !empty($progress)):?>
                                    <?php foreach ($progress as $key=>$value):?>
                                    <li class="<?php if($key == 0){echo 'latest';}?>">
                                        <span class="date"><?php echo date('Y-m-d',$value['updatetime']);?></span>
                                        <span class="week"><?php echo $value['week'];?></span>
                                        <span class="time"><?php echo date('H:i:s',$value['updatetime']);?></span>
                                        <span class="text"><?php echo $value['progress'];?></span>
                                    </li>
                                    <?php endforeach;?>
                                    <?php endif;?>


                                    <li class="<?php if(!isset($progress) || empty($progress)){echo 'latest';}?>">
                                        <span class="text">订单已付款，等待服务商受理。客服电话：<em>021-62129799</em></span>
                                    </li>
								</ul>

							</div>

						</div>
					</div>

				</div>

				<!--layout end-->
				<!--footer start-->
                <?php include_once BASE.'/foot.php';?>
				<!--footer end-->

		</body>

</html>