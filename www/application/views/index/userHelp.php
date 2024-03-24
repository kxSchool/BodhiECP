<!DOCTYPE html>

<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="x-dns-prefetch-control" content="on">
		<meta name="viewport" content="width=device-width, initial-scale=0,maximum-scale=1">
		<meta name="keywords" content="XXXXX,注册公司,代理记账,商标注册,个人社保,企业社保,创业法律服务">
		<!--<meta name="description" content="XXXXX专注为中小微企业提供在线法律服务，价格比传统法律服务便宜三分之一，所有律师百分百资质认证，七天不满意退款。提供公司注册,代理记账,商标注册,合同文书,律师函,法律顾问等系列法律服务。">-->
		<meta name="description" content="XXXXX是一家专注于为创业者及中小微企业提供一站式创业孵化服务平台隶属上海咨瑟信息科技有限公司，服务项目包括：工商服务、财税服务、知识产权、认证服务、法律服务、科技服务、金融服务、创业指导、创业扶持、人才推荐等业务。致力围绕产业做孵化，帮助创业者及中小微企业实现从0到1的孵化，并在后续的从1到N的放大进程中提供包括产业对接、资本对接在内的持续帮助。">

		<title>新手帮助——XXXXX</title>
		<!-- common css -->
		<link href="<?php echo CSS;?>/common.css" rel="stylesheet" type="text/css">
		<link href="<?php echo CSS;?>/sort.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo CSS;?>/common/base.css" rel="stylesheet" type="text/css">
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
				var wwwMobileUrl = 'http://m.rongyiban.net';
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
									首页>新手帮助
								</p>
						</div>
						<div class="about-banner">
							<img src="<?php echo IMG;?>/index/about/Often.png">
						</div>
						<div class="newhand-content">
							<div class="nh-first">
							 	<h2>注册登录</h2>
							 	<p>Q：如何注册一个账号？</p>
							 	<p>A：用手机号注册一个账号</p>
							 	
							 	<h2>售前咨询</h2>
							 	<p>Q：我有疑问该问谁？</p>
							 	<p>A：有任何疑问可以直接拨打我们的客服专线：021-6212-9799。我们会尽力解答您的疑问。</p>
							 	
							 	<h2>如何支付</h2>
							 	<p>Q：有哪几种支付方式？</p>
							 	<p>A：目前网站上支持微信、支付宝和网银支付，任选其一即可。</p>  
							 	<p>Q：我没有支付宝和网银，怎么办？ </p>
							 	<p> A：如果您没有这两种支付方式，</p>
							 	
							 	<h2>服务方式</h2>
							 	<p>Q：购买之后如何服务？</p>
							 	<p>A：购买相应产品后，我们会立即有专人与你联系，提供一对一的专门服务。 </p>
							 	<p>Q：我需要一个法律服务，但是在网站上找不到对应的服务，怎么办？</p>
							 	<p>A：目前网站上提供的都是标准化的服务，如果您需要其它服务，只要与法律或企业的工商财税方面相关，可以与我们的客服人员联系，我们会</p>
							 </div>
						</div>
					</div>
				</div>
				<!--container E-->
		 </div>
		</div>
		<!--layout E-->

        <?php include_once BASE.'/foot.php';?>
	</body>

</html>