<!DOCTYPE html>
<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="x-dns-prefetch-control" content="on">
		<title>我的优惠券 - XXXXX</title>
		<!-- common css -->
         <link rel="shortcut icon" href="<?php echo IMG?>/common/favicon.ico" type="image/x-icon">
		<link href="<?php echo CSS?>/common.css" rel="stylesheet" type="text/css">
		<link href="<?php echo CSS?>/sort.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="<?php echo CSS?>/common/base.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo CSS?>/common/public.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo CSS?>/product/coupon.css">
        
		<script type="text/javascript" src="<?php echo JS?>/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="<?php echo JS?>/user/index.js"></script>
        <script type="text/javascript">
			$(function() {
				$('.js-coupon-tab').find('a').on('click', function() {

					var $this = $(this);
					$this.parent().addClass('active').siblings().removeClass('active');
					var _id = $this.attr('data-id');
					$('.js-tab-' + _id).removeClass('hidden').siblings().addClass('hidden');
				});
			});
		</script>
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
								<div class="person-main-tab js-coupon-tab">
									<ul>
										<li class="first-li active">
											<a href="javascript:;" data-id="0">可使用</a>
										</li>

										<li>
											<a href="javascript:;" data-id="1">已失效</a>
										</li>

									</ul>
								</div>
								<!--个人资料 content部分 S-->
								<div class="method-content ">
									<!-- 无优惠券 S-->
									<div class="noCoupon  hidden">
										<img src="../../../../img/common/noCoupon.png">
										<p>您暂时还没有优惠券哦！</p>
									</div>
									<!-- 无优惠券 E-->
									<!-- 可使用的优惠券 S-->
									<div class="useCoupon js-tab-0 ">
										<ul>
											<li>
												<div class="quan">
													<div class="quan-count">
														<div class="elem">
															<em>￥</em>
															<strong>100</strong>
														</div>
													</div>
													<div class="quan-site">
														<div class="q-type">
															通用券
														</div>
														<div class="q-date">
															有效期至2018-08-30
														</div>
													</div>
												</div>
											</li>
											<li>
												<div class="quan">
													<div class="quan-count">
														<div class="elem">
															<em>￥</em>
															<strong>100</strong>
														</div>
													</div>
													<div class="quan-site">
														<div class="q-type">
															通用券
														</div>
														<div class="q-date">
															有效期至2018-08-30
														</div>
													</div>
												</div>
											</li>
											<li>
												<div class="quan">
													<div class="quan-count">
														<div class="elem">
															<em>￥</em>
															<strong>100</strong>
														</div>
													</div>
													<div class="quan-site">
														<div class="q-type">
															通用券
														</div>
														<div class="q-date">
															有效期至2018-08-30
														</div>
													</div>
												</div>
											</li>
											<li>
												<div class="quan">
													<div class="quan-count">
														<div class="elem">
															<em>￥</em>
															<strong>100</strong>
														</div>
													</div>
													<div class="quan-site">
														<div class="q-type">
															通用券
														</div>
														<div class="q-date">
															有效期至2018-08-30
														</div>
													</div>
												</div>
											</li>
											<li>
												<div class="quan">
													<div class="quan-count">
														<div class="elem">
															<em>￥</em>
															<strong>100</strong>
														</div>
													</div>
													<div class="quan-site">
														<div class="q-type">
															通用券
														</div>
														<div class="q-date">
															有效期至2018-08-30
														</div>
													</div>
												</div>
											</li>
											<li>
												<div class="quan">
													<div class="quan-count">
														<div class="elem">
															<em>￥</em>
															<strong>100</strong>
														</div>
													</div>
													<div class="quan-site">
														<div class="q-type">
															通用券
														</div>
														<div class="q-date">
															有效期至2018-08-30
														</div>
													</div>
												</div>
											</li>

										</ul>
									</div>
									<!-- 可使用的优惠券 E-->
									<!-- 过期的优惠券 S-->
									<div class="loseCoupon js-tab-1 hidden">
										<ul>
											<li>
												<div class="quan">
													<div class="quan-count">
														<div class="elem">
															<em>￥</em>
															<strong>100</strong>
														</div>
													</div>
													<div class="quan-site">
														<div class="q-type">
															通用券
														</div>
														<div class="q-date">
															有效期至2018-08-30
														</div>
													</div>
												</div>
											</li>
											<li>
												<div class="quan">
													<div class="quan-count">
														<div class="elem">
															<em>￥</em>
															<strong>100</strong>
														</div>
													</div>
													<div class="quan-site">
														<div class="q-type">
															通用券
														</div>
														<div class="q-date">
															有效期至2018-08-30
														</div>
													</div>
												</div>
											</li>
											<li>
												<div class="quan">
													<div class="quan-count">
														<div class="elem">
															<em>￥</em>
															<strong>100</strong>
														</div>
													</div>
													<div class="quan-site">
														<div class="q-type">
															通用券
														</div>
														<div class="q-date">
															有效期至2018-08-30
														</div>
													</div>
												</div>
											</li>
											<li>
												<div class="quan">
													<div class="quan-count">
														<div class="elem">
															<em>￥</em>
															<strong>100</strong>
														</div>
													</div>
													<div class="quan-site">
														<div class="q-type">
															通用券
														</div>
														<div class="q-date">
															有效期至2018-08-30
														</div>
													</div>
												</div>
											</li>
										</ul>
									</div>
									<!-- 过期的优惠券 E-->

								</div>
								<!--个人资料 content部分 E-->
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<!--layout end-->

            <?php include_once BASE.'/foot.php';?>

		</body>

</html>