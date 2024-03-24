<!DOCTYPE html>
<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="x-dns-prefetch-control" content="on">
        <meta name="keywords" content="XXXXX,注册公司,代理记账,商标注册,个人社保,企业社保,创业法律服务">
       	
		<title>关于发票 - 用户中心 - XXXXX</title>
		<!-- common css -->
         <link rel="shortcut icon" href="<?php echo IMG?>/common/favicon.ico" type="image/x-icon">
		<link href="<?php echo CSS;?>/common.css" rel="stylesheet" type="text/css">
		<link href="<?php echo CSS;?>/sort.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="<?php echo CSS;?>/common/base.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo CSS;?>/common/public.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo CSS;?>/user/refund.css">

		<script type="text/javascript" src="<?php echo JS;?>/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="<?php echo JS;?>/common/common.js"></script>

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
									首页>个人中心>我的评价
								</p>
							</div>
							<div class="myMenu floatleft">
                                <?php include_once BASE.'/leftSide.php';?>
							</div>
							<div class="myCont floatright">
								<!--退款说明 S-->
								<div class="refunds-panel">
									<p class="title">发票说明：</p>
									<p class="">1、订单支付后180天内，可申请发票，超出后不再支持补开发票。</p>
									<p>2、发票由为您提供服务的服务者所在公司开具。</p>
									<p> 3、开票仅为服务费发。</p>
								</div>
								<!--退款说明 E-->
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<!--layout end-->
				<!--footer start-->
                <?php include_once BASE.'/foot.php';?>
				<!--footer end-->

		</body>

</html>