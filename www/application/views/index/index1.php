<!DOCTYPE html>

<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="360-site-verification" content="e404750f508e1e27f167f4eba9fd1ded" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="x-dns-prefetch-control" content="on">
		<meta name="viewport" content="width=device-width, initial-scale=0,maximum-scale=1">
		<meta name="keywords" content="XXXXX,注册公司,代理记账,商标注册,个人社保,企业社保,创业法律服务">
		<meta name="description" content="XXXXX是一家专注于为创业者及中小微企业提供一站式创业孵化服务平台隶属上海XXXXX信息科技有限公司，服务项目包括：工商服务、财税服务、知识产权、认证服务、法律服务、科技服务、金融服务、创业指导、创业扶持、人才推荐等业务。">

		<title>XXXXX一站式创业孵化服务平台</title>
		<!-- common css -->
         <link rel="shortcut icon" href="<?php echo IMG?>/common/favicon.ico" type="image/x-icon">
		<link href="<?php echo CSS?>/common/base.css" rel="stylesheet" type="text/css">
		<link href="<?php echo CSS?>/common/index.css" rel="stylesheet" type="text/css">

		<!-- common js -->

		<script type="text/javascript" src="<?php echo JS?>/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="<?php echo JS?>/common/common.js"></script>
	</head>

	<body>
		<div id="nTalk_post_hiddenElement" style="left: -10px; top: -10px; visibility: hidden; display: none; width: 1px; height: 1px;"></div>
		<header>
			<div class="top-header">
				<div class="container" id="loginbar">
					<ul class="floatleft">
						<li class="nav-location">
							<a href="#" class="locatin-icon">
								<i class="arrow floatright"></i>上海市 </a>
							<div class="location-layer">
								<em></em>
								<ul>
									<li>
										<a href="javascript:void(0)" onclick="changeCity(3302)">北京</a>
									</li>
									<li>
										<a href="javascript:void(0)" onclick="changeCity(3304)">上海</a>
									</li>
									<li>
										<a href="javascript:void(0)" onclick="changeCity(283)">广州</a>
									</li>
									<li>
										<a href="javascript:void(0)" onclick="changeCity(285)">深圳</a>
									</li>
									<li>
										<a href="javascript:void(0)" onclick="changeCity(160)">南京</a>
									</li>
									<li>
										<a href="javascript:void(0)" onclick="changeCity(173)">杭州</a>
									</li>
									<li>
										<a href="javascript:void(0)" onclick="changeCity(174)">宁波</a>
									</li>
									<li>
										<a href="javascript:void(0)" onclick="changeCity(164)">苏州</a>
									</li>
									<li>
										<a href="javascript:void(0)" onclick="changeCity(361)">成都</a>
									</li>
									<li>
										<a href="javascript:void(0)" onclick="changeCity(3303)">天津</a>
									</li>
									<li>
										<a href="javascript:void(0)" onclick="changeCity(202)">厦门</a>
									</li>
									<li>
										<a href="javascript:void(0)" onclick="changeCity(3305)">重庆</a>
									</li>
									<li>
										<a href="javascript:void(0)" onclick="changeCity(255)">武汉</a>
									</li>
									<li>
										<a href="javascript:void(0)" onclick="changeCity(414)">西安</a>
									</li>
									<li>
										<a href="javascript:void(0)" onclick="changeCity(81)">衡水</a>
									</li>
									<li>
										<a href="javascript:void(0)" onclick="changeCity(105)">沈阳</a>
									</li>
									<li>
										<a href="javascript:void(0)" onclick="changeCity(222)">青岛</a>
									</li>
									<li>
										<a href="javascript:void(0)" onclick="changeCity(73)">秦皇岛</a>
									</li>
									<li>
										<a href="javascript:void(0)" onclick="changeCity(71)">石家庄</a>
									</li>
									<li>
										<a href="javascript:void(0)" onclick="changeCity(999999)">全国</a>
									</li>
								</ul>
							</div>
						</li>

						<li>
							<a href="<?php echo $this->config->item('shop_url'); ?>" target="_blank">服务商登录</a>
						</li>

					</ul>
					<ul class="floatright nav-menu">
                        <?php if(empty($_SESSION['user'])):?>
                            <li class="left_zc">
                                <a href="/user/register">注册</a>
                            </li>
                            <li>
                                <a href="/user/login">用户登录</a>
                            </li>
                        <?php else:?>

                            <li>
                                <a href="/user/index"><?php echo $_SESSION['user']['username']?></a>
                            </li>
                            <li>
                                <a href="/order/orderList">我的订单</a>
                            </li>
                            <li>
                                <a href="/user/logout" target="_blank">退出登录</a>
                            </li>
                        <?php endif;?>
						<li style="position: relative;">
							<img class="rel-tel" src="<?php echo IMG?>/common/phone_logo.png">
							<a href="#" target="_blank">021-62129799</a>
						</li>
					</ul>

				</div>
			</div>

			<div class="main-header">
				<div class="container clearfix logo" style="border:1px solid #fff;">
					<a href="/"><img src="<?php echo IMG?>/common/logo.png"></a>
				</div>
				<div class="container clearfix">
					<div class="nav-sub floatleft">
						<a href="#">全部服务分类</a>
						<link href="<?php echo CSS?>/sort.css" rel="stylesheet" type="text/css">
						<div class="floatleft nav-list ">
							<div class="floatleft nav">
								<ul class="nav-sub-list clearfix">
                                    <?php foreach ($category_list as $cid=>$category):?>
                                        <li class="">
                                            <i class="icon-<?php echo $cid+1;?>"></i>
                                            <h4><?php echo $category['cat_name'];?></h4>
                                            <i class="right-arrow"><div></div></i>
                                        </li>
                                    <?php endforeach;?>
								</ul>

							</div>
							<div class="floatLeft nav-content hidden">


                                <?php foreach ($category_list as $cfid=>$fcategory):?>
								<div class="clearfix hidden classify">
									<ul class="clearfix floatleft nav-content-item nav-content-item-2">
                                        <?php foreach ($fcategory['s_list'] as $csid=>$scategory):?>
										<li>
											<a href="#">
												<h5><?php echo $scategory['cat_name'];?></h5>
											</a>
											<div class="<?php if($csid == 0){echo 'nav-one';}?>">
                                                <?php foreach ($scategory['t_list'] as $ctid=>$tcategory):?>
                                                <a class="<?php if($tcategory['is_hot'] == 1){echo 'active';}?>" href="<?php echo site_url('product/info').'?cid='.$scategory['cat_id'].'_'.$tcategory['cat_id']?>"><?php echo $tcategory['cat_name'];?></a>
                                                <?php endforeach;?>
											</div>
										</li>
                                        <?php endforeach;?>
									</ul>
									<div class="nav-img-wrap-2 floatleft">
										<ul class="floatleft">
											<li class="iSubNavRi1">
												<a href="https://www.kxschool.com/product/info.html?cid=6_52">
													<img src="<?php echo IMG?>/index/goods/nav4.jpg" alt="">
												</a>
											</li>
											<li>
												<a href="https://www.kxschool.com/product/info.html?cid=18_91">
													<img src="<?php echo IMG?>/index/goods/nav1.jpg" alt="">
												</a>
											</li>
											<li>
												<a href="https://www.kxschool.com/product/info.html?cid=4_45">
													<img src="<?php echo IMG?>/index/goods/nav6.jpg" alt="">
												</a>
											</li>
										</ul>
									</div>
								</div>
                                <?php endforeach;?>

							</div>

						</div>

						<script>
							var $nav = $('.nav-list')
							var $navList = $('.nav-content').children('.clearfix');
							var $navSubList = $('.nav-sub-list').find('li');
							var $navContent = $('.nav-content');
							var navFlag = false;

							$nav.hover(function() {
								navFlag = true;
							}, function() {
								navFlag = false;
								$navSubList.removeClass('active');
								$navList.addClass('hidden');
								$navContent.addClass('hidden');
							})

							$navSubList.hover(function() {
								var $this = $(this);
								var _id = $this.index();
								$this.addClass('active').siblings().removeClass('active');
								$($navList[_id]).removeClass('hidden').siblings().addClass('hidden');
								$navContent.removeClass('hidden')
							}, function() {
								var $this = $(this);
								var _id = $this.index();
							})

							// 不是主页时，选择分类可收起
						</script>

					</div>
					<div class="navs floatright">
                        <?php foreach ($ad_list as $aid => $ad):?>
                            <a href="<?php echo $ad['setting']['ad_link']?>"><?php echo $ad['name']?></a>
                        <?php endforeach;?>


					</div>
				</div>
			</div>

		</header>
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
			<script type="text/javascript" src="<?php echo JS?>/index/jquery.scrollLoding.js" defer=""></script>
			<script type="text/javascript" src="<?php echo JS?>/index/jquery.lazyload.min.js" defer=""></script>
			<script type="text/javascript" src="<?php echo JS?>/index/swiper.min.js" defer=""></script>
			<script type="text/javascript" src="<?php echo JS?>/index/index.js" defer=""></script>

			<!-- 轮换中间区域  S-->
            <?php if(isset($carousel) && !empty($carousel)):?>
			<div class="lunhuan">
				<div id="lunhuanback">

                    <?php foreach ($carousel as $carid => $car):?>
                        <p style="background: url(<?php echo $car['setting']['ad_code']?>)  center center no-repeat scroll; opacity: 1;">
                            <a href="<?php echo $car['setting']['ad_link']?>" target="_blank"></a>
                        </p>
                    <?php endforeach;?>


				</div>
				<div class="lunhuan_main">
					<div class="lunhuancenter">
						<ul id="lunbonum" style="z-index:4">
                            <?php foreach ($carousel as $carid => $car):?>
							<li class=""></li>
                            <?php endforeach;?>
						</ul>
					</div>
				</div>
			</div>
            <?php endif;?>
			<!-- 轮换中间区域 E-->
			<!--专属定制  S-->
			<div class="set">
				<div class="container">
					<form>
						<div class="set-info">
							<div class="setName">
								<input type="text" placeholder="请输入您的姓名" class="specialName" />
							</div>
							<div class="setPhone">
								<input type="tel" placeholder="请输入您的联系方式" class="specialTel" class="specialTel" />
							</div>
							<div class="setButton">
								<a href="javascript:void(0)" onclick="specialSunmit()">提交</a>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!--专属定制  E-->
			<!--container S-->
			<div class="container">

				<!--优选套餐  S-->
                <?php if(isset($discounts) && !empty($discounts)):?>
                <?php $discounts = $discounts[0];?>
				<div class="productnav">
					<div class="productnav">
						<div class="productHeader">
							<h3>
							<span></span><?php echo $discounts['name']?>
							<span></span>
						</h3>
							<p><?php echo $discounts['description']?></p>
						</div>
						<div class="product-content">
							<div class="pro-left">
                                <a href="<?php echo $discounts['list'][0]['setting']['ad_link']?>">
                                    <img src="<?php echo $discounts['list'][0]['setting']['ad_code']?>">
                                </a>
							</div>
							<div class="pro-right">
                                <a class="pr-img" href="<?php echo $discounts['list'][1]['setting']['ad_link']?>">
                                    <img src="<?php echo $discounts['list'][1]['setting']['ad_code']?>">
                                </a>
                                <a class="pr-img" href="<?php echo $discounts['list'][2]['setting']['ad_link']?>">
                                    <img src="<?php echo $discounts['list'][2]['setting']['ad_code']?>">
                                </a>
                                <a class="pr-img" href="<?php echo $discounts['list'][3]['setting']['ad_link']?>">
                                    <img src="<?php echo $discounts['list'][3]['setting']['ad_code']?>">
                                </a>
                                <a class="pr-img" href="<?php echo $discounts['list'][4]['setting']['ad_link']?>">
                                    <img src="<?php echo $discounts['list'][4]['setting']['ad_code']?>">
                                </a>
							</div>

							<div class="clearfix"></div>
						</div>
					</div>
				</div>
                <?php endif;?>
				<!--优选套餐  E-->
				<!--热门推荐  S-->
                <?php if(isset($hot) && !empty($hot)):?>
				<div class="productnav1">
					<div class="productHeader">
						<h3>
						<span></span>热门推荐
						<span></span>
					</h3>
                        <p>根据近期热门和您的兴趣为您推荐</p>
					</div>

                    <?php foreach ($hot as $hot_key=>$hot_item):?>

                        <div class="product-content1">
                            <div class="p-title">
                                <span><?php echo $hot_item['name']?></span>
                                <span><?php echo $hot_item['description']?></span>
                            </div>
                            <div class="p-content">
                                <ul>
                                    <?php foreach ($hot_item['list'] as $hot_k=>$hot_v):?>
                                    <li>
                                        <a href="<?php echo $hot_v['setting']['ad_link']?>">
                                            <img src="<?php echo $hot_v['setting']['ad_code']?>">
                                        </a>
                                        <div class="title">
                                            <div class="resblock-desc">
											<span class="resblock-name">
					                         	<?php echo $hot_v['name']?>
					                        </span>
                                                <span class="resblock-price">
                               					<label>￥<em><?php echo $hot_v['price']?></em></label>
                       						</span>
                                            </div>
                                            <div class="resblock-year">
                                                <span><?php echo $hot_v['description']?></span>
                                            </div>
                                        </div>
                                    </li>
                                    <?php endforeach;?>

                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    <?php endforeach;?>
				</div>
                <?php endif;?>
				<!--热门推荐  E-->

			</div>
			<!--container E-->
			<!--低部banner  S-->
			<div class="footer-banner" style="text-align: center;">
				<img src="<?php echo IMG?>/index/footerBanner.jpg">
			</div>
			<!--低部banner  S-->
		</div>
		<!--layout E-->

		<!--footer start-->

		<div class="reasons">
			<a href="#">
				<div class="container six-list-index">
					<ul class="clearfix">
						<li class="first-li">
							<div class="foot-icon"></div>
							<div class="foot-icon-title">
								<p class="ftitle-p">明码标价</p>
								<p>无隐形收费 </p>
								<p>打破所有传统行业陋习</p>
							</div>

						</li>
						<li class="second-li">
							<div class="foot-icon teamIcon"></div>
							<div class="foot-icon-title">
								<p class="ftitle-p">专业团队</p>
								<p>一对一创业辅导 </p>
								<p>免费提供专业咨询</p>
							</div>

						</li>
						<li class="third-li">
							<div class="foot-icon"></div>
							<div class="foot-icon-title">
								<p class="ftitle-p">办理进度</p>
								<p>实时掌控</p>
								<p>办理进度一清二楚</p>
							</div>

						</li>
						<li class="fourth-li">
							<div class="foot-icon"></div>
							<div class="foot-icon-title">
								<p class="ftitle-p">一站式</p>
								<p>开公司所需的服务</p>
								<p>这里都有</p>
							</div>

						</li>

					</ul>
				</div>
			</a>
		</div>
		<footer class="bg-white link list">
			<div class="footer-container">
				<div class="container">
					<div class="footer_link">
						<ul class="link-lists clearfix">
							<li class="l-five">
								<h5>关于XXXXX</h5>
                                <a target="_blank" href="/index/about">了解我们</a>
                                <a target="_blank" href="/index/join">加入我们</a>
                                <a target="_blank" href="/index/contact">联系我们</a>
							</li>
							<li class="l-five">
								<h5>常见问题</h5>
								<a target="_blank" href="/index/userHelper">新手帮助</a>
								<a target="_blank" href="/index/payHelper">支付帮助</a>
							</li>

							<li class="l-zeo">
								<h5>服务商入口</h5>
								<a target="_blank" href="<?php echo $this->config->item('shop_url'); ?>">服务商登录</a>
								<a target="_blank" href="#">服务商入驻</a>
							</li>
							<li>
								<div class="floatleft bd"></div>
								<div class="floatleft link-th">
									<p class="tel">021-62129799</p>
									<p>周一至周日8:00-22:00
									</p>
								</div>
							<div class="floatleft" >
							<div class="link-code"  >
								<div class="code"></div>
								<div class="link-code-text">
									<p>微信扫一扫</p>
									<p>关注XXXXX公众号</p>
								</div>
							</div>
							<div class="zfb-code" >
								<div class="code"></div>
								<div class="link-code-text">
									<p>支付宝扫一扫</p>
									<p>关注XXXXX生活号</p>
								</div>
							</div>
                        </div>

							</li>
						</ul>
					</div>
				</div>
				<div class="footer-inner text-center">
					<p class="copyright">沪ICP备18018256号 上海章大牛信息科技有限公司</p>
					<p class="copyright">Powered by <a href="http://www.js715.com/2024/03/17/%e4%bc%81%e4%b8%9a%e6%9c%8d%e5%8a%a1%e5%b9%b3%e5%8f%b0/">章大牛计算机服务工作室</a></p>
				</div>
			</div>

		 
		</footer>
		<!--footer end-->
        <div class="tips hidden">
			<div class="tip-shows" ></div>
			<div class="tip-main" >
				<div class="tipMain-title" > 
					<a class="close" onclick="okClose()"></a>
					
				</div>
				<div class="tipMain-main" >
					 <a class="oksub">提交成功!</a>
					 <p>我们的专属顾问会在一个工作日内联系您</p>
				</div>
				 
			</div>
		</div>
		<div class="phtips hidden">
			<div class="tip-shows" ></div>
			<div class="tip-main" >
				<div class="tipMain-title" > 
					<a class="close" onclick="phClose()"></a>
					
				</div>
				<div class="tipMain-main" >
					 <a class="phempty">请输正确的手机号</a> 
				</div>
				 
			</div>
		</div>
		<div class="xmtips hidden">
			<div class="tip-shows" ></div>
			<div class="tip-main" >
				<div class="tipMain-title" > 
					<a class="close" onclick="xmClose()"></a>
					
				</div>
				<div class="tipMain-main" >
					 <a class="phempty" style="padding-right: 122px;">姓名不能为空</a> 
				</div>
				 
			</div>
		</div>
		<div class="righTtips hidden">
			<div class="tip-shows" ></div>
			<div class="tip-main" >
				<div class="tipMain-title" > 
					<a class="close" onclick="rightClose()"></a>
					
				</div>
				<div class="tipMain-main" >
					 <a class="phempty">请输入正确的手机号</a> 
				</div>
				 
			</div>
		</div>
	</body>

</html>