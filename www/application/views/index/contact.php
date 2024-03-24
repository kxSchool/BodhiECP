<!DOCTYPE html>

<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="x-dns-prefetch-control" content="on">
		<meta name="viewport" content="width=device-width, initial-scale=0,maximum-scale=1">
		<meta name="keywords" content="XXXXX,注册公司,代理记账,商标注册,个人社保,企业社保,创业法律服务">
		

		<title>联系我们-XXXXX</title>
		<!-- common css -->
         <link rel="shortcut icon" href="<?php echo IMG?>/common/favicon.ico" type="image/x-icon">
		<link href="<?php echo CSS;?>/common/base.css" rel="stylesheet" type="text/css">
		<link href="<?php echo CSS;?>/common/index.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="<?php echo CSS;?>/user/about.css" />

		<!-- common js -->

		<script type="text/javascript" src="<?php echo JS;?>/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="<?php echo JS;?>/common/common.js"></script>
	</head>

	<body>
		<div id="nTalk_post_hiddenElement" style="left: -10px; top: -10px; visibility: hidden; display: none; width: 1px; height: 1px;"></div>
        <?php include_once BASE.'/nav.php';?>
		<!--layout S-->
		<div class="layout">
			<script>
				//判断是否为移动端 如果是移动端即进入移动端的页面
				var browser = getBrowser();
				var wwwMobileUrl = 'http://m.kxschool.com';
				if(browser.isMobile) {
					window.location.href = wwwMobileUrl;
				}
			</script>
		 	<div class="bg-white">
				<!--container S-->
				<div class="container">
					<div class="mycenter">
						<div class="tip_title">
								<p>
									首页>联系我们
								</p>
						</div>
						<div class="contact-banner">
							<img src="<?php echo IMG;?>/index/about/contact_banner.png">
						</div>
						<div class="contact-content">
							 <div class="contact-address">
							 	<p>公司地址</p>
							 	<br/>
							 	<P>上海市长宁区昭化路505号东朔商务中心115室</P>
							 </div>
							 <div class="contact-website">
							 	<p>公司网址</p>
							 	<br/>
							 	<P>www.kxschool.com</P>
							 </div>
							 <div class="contact-tel">
							 	<p>有任何问题需要咨询请拨打我们的客服热线：<span class="tel">jacky588@qq.com</span></p>
						</div>
					</div>
				</div>
				<!--container E-->
		 </div>
		</div>
		<!--layout E-->

		<!--footer start-->
            <?php include_once BASE.'/foot.php';?>
		<!--footer end-->
	</body>

</html>