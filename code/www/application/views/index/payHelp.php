<!DOCTYPE html>

<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="x-dns-prefetch-control" content="on">
		<meta name="viewport" content="width=device-width, initial-scale=0,maximum-scale=1">
		<meta name="keywords" content="XXXXX,注册公司,注册公司,工商注册,上海公司注册,代理记账,财税代理,代理记账公司,资质办理,经营许可证办理,商标注册,版权申请,软件著作权,专利申请,知识产权,高新企业认定,商品条形码,管理体系认证">
		
		<meta name="description" content="XXXXX是一家专注于为创业者及中小微企业提供一站式创业孵化服务的O2O平台，是对传统商务服务业的颠覆，是用互联网思维创建的企业服务生态圈。服务项目包括：工商服务、财税服务、知识产权、认证服务、法律服务、科技服务、金融服务、创业指导、创业扶持、人才推荐等业务，帮助创业者及中小微企业实现从0到1的孵化，并在后续的从1到N的放大进程中提供包括产业对接、资本对接在内的持续帮助。">

		<title>支付帮助——XXXXX</title>
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
									首页>支付帮助
								</p>
						</div>
						<div class="about-banner">
							<img src="<?php echo IMG;?>/index/about/payHelp.png">
						</div>
						<div class="pay-content">
							<div class="pay-explain">
								 <p>如遇到支付问题，建议联系客服：021-62129799</p>
								 <p>以下是支付的一些常见问答： </p>
							 </div>
							 <div class="pay-first">
							 	<h2>支付方式</h2>
							 	<p>Q：一共有哪几种支付方式？</p>
							 	<p>A：目前支持微信、支付宝、网银支付、线下转账</p>
							 	<p>Q：支付宝/网银支付额度不够，是否可以分开支付？</p>
							 	<p>A：订单金额只能一次性支付，不能分开支付。</p>
							 </div>
							 <div class="pay-first">
							 	<h2>支付遇到问题</h2>
							 	<p>Q：支付时提示已超支付限额怎么办？</p>
							 	<p>A：如果支付时提示已超支付限额，您可以尝试以下两种方法：</p>
							 	<p>1.联系银行客服中心咨询或到第三方支付平台提高您的支付限额；</p>
							 	<p>2.可以通过支付宝或网银转账的方式来支付。（注：转账时请将订单编号备注在付款信息里；转账完成之后，请通知客服。）</p>
							 	
							 	<p style="margin-top: 25px;">转账到支付宝：</p>
							 	<p>备注请写清订单号</p>
							 	<p>支付宝账号：13795212336@163.com</p>
							 	<p>校验全名：上海咨瑟信息科技有限公司</p>
							 	
							 	<p style="margin-top: 25px;">转账到银行账户：</p>
							 	<p>摘要内容请填写订单号</p>
							 	<p>账号：121928653710401</p>
							 	<p>户名：上海咨瑟信息科技有限公司</p>
							 	<p>开户行：招商银行股份有限公司上海虹口体育场支行</p>
							 </div>
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