<!DOCTYPE html>

<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="x-dns-prefetch-control" content="on">
		<meta name="viewport" content="width=device-width, initial-scale=0,maximum-scale=1">
		<meta name="keywords" content="XXXXX,注册公司,公司注册,工商注册,上海公司注册,代理记账,财税代理,代理记账公司,资质办理,经营许可证办理,商标注册,版权申请,软件著作权,专利申请,知识产权,高新企业认定,商品条形码,管理体系认证">
		<meta name="description" content="XXXXX是一家专注于为创业者及中小微企业提供一站式创业孵化服务的O2O平台，是对传统商务服务业的颠覆，是用互联网思维创建的企业服务生态圈。服务项目包括：工商服务、财税服务、知识产权、认证服务、法律服务、科技服务、金融服务、创业指导、创业扶持、人才推荐等业务，帮助创业者及中小微企业实现从0到1的孵化，并在后续的从1到N的放大进程中提供包括产业对接、资本对接在内的持续帮助。">

		<title>XXXXX一站式创业孵化服务平台服务项目:注册公司,代理记账,财税代理,资质办理,经营许可证办理,商标注册,版权申请,软件著作权,专利申请,知识产权,高新企业认定,商品条形码,管理体系认证</title>
		<!-- common css -->
		<link rel="shortcut icon" href="<?php echo IMG?>/common/favicon.ico" type="image/x-icon">
		<link href="<?php echo CSS?>/common/base.css" rel="stylesheet" type="text/css">
		<link href="<?php echo CSS?>/common/newIndex.css" rel="stylesheet" type="text/css">
        <link href="<?php echo CSS?>/swiper.min.css" rel="stylesheet" type="text/css">
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
                                <a href="/user/logout" target="_blank">退出登录</a>
                            </li>
                        <?php endif;?>
                        <li style="position: relative;">
                            <img class="rel-tel" src="<?php echo IMG?>/common/phone_logo.png">
                            <a href="http://www.kxschool.com/2024/03/17/%e4%bc%81%e4%b8%9a%e6%9c%8d%e5%8a%a1%e5%b9%b3%e5%8f%b0/" target="_blank">jacky588@qq.com</a>
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
                                                    <a href="/product/info.html?cid=6_52">
                                                        <img src="<?php echo IMG?>/index/goods/nav4.jpg" alt="">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="/product/info.html?cid=18_91">
                                                        <img src="<?php echo IMG?>/index/goods/nav1.jpg" alt="">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="/product/info.html?cid=4_45">
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
					//window.location.href = wwwMobileUrl;
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
			<div class="middle">
				<div class="container">
					<!--工商财税  S-->
					<div class="circles">
						<div class="cir-title m-b-30">
							<span class="main-title">工商财税</span>
							<span>专注解决初创企业发展的难题</span>
						</div>
						<div class="cir-main">
							<div class="pro-left">
								<a href="/product/info.html?cid=2_32">
									<img src="<?php echo IMG?>/index/pro/pro_1.png">
									<div class="bg-text">
										<h2>公司注册</h2>
										<a class="bg-bd"></a>
										<p>注册前先查询<br/>有效提升注册成功率</p>
										<span><em>1680</em>元</span>
										<a class="handle" href="/product/info.html?cid=2_32">立即办理</a>
									</div>
								</a>
							</div>
							<div class="pro-right">
								<div class="pro-right-top m-b-10">
									<a class="pr-img m-r-12" href="/product/info.html?cid=6_52">
										<img src="<?php echo IMG?>/index/pro/pro_2.png">
										<div class="proTw-bgtext">
											<h2>代理记账</h2>
											<p>记账报税,告别财务风险</p>
											<span><em>3600</em>元</span>
											<button class="handle">查看详情</button>
										</div>

									</a>
									<a class="pr-img" href="/product/info.html?cid=4_50">
										<img src="<?php echo IMG?>/index/pro/pro_3.png">
										<div class="proThree-bgtext">
											<h2>开设银行基本户</h2>
											<p>合作银行,免预约开户</p>
											<span><em>500</em>元</span>
											<button class="handle">查看详情</button>
										</div>
									</a>
								</div>
								<div class="pro-right-bottom">
									<a class="pr-img m-r-10" href="/product/info.html?cid=7_54">
										<img src="<?php echo IMG?>/index/pro/pro_4.png">
										<div class="profour-bgtext">
											<h2>税控代办</h2>
											<p>专业代办  省时省力</p>
											<span><em>1030</em>元</span>
											<button class="handle">查看详情</button>
										</div>
									</a>
									<a class="pr-img m-r-11" href="/product/info.html?cid=3_39">
										<img src="<?php echo IMG?>/index/pro/pro_5.png">
										<div class="profour-bgtext">
											<h2>公司变更</h2>
											<p>贴心指导  专业服务</p>
											<span><em>1680</em>元</span>
											<button class="handle">查看详情</button>
										</div>
									</a>
									<a class="pr-img" href="/product/info.html?cid=4_46">
										<img src="<?php echo IMG?>/index/pro/pro_6.png">
										<div class="profour-bgtext">
											<h2>公司注销</h2>
											<p>交易过程  全程担保</p>
											<span><em>6800</em>元</span>
											<button class="handle">查看详情</button>
										</div>
									</a>
								</div>
							</div>

							<div class="clearfix"></div>
						</div>

					</div>
					<!--工商财税  E-->
				

					<!--资质办理  S-->
					<div class="knowledge">
						<div class="know-title m-b-30">
							<span class="main-title">资质办理</span>
							<span>企业进入市场竞争的通行证</span>
						</div>
						<div class="know-main">
							<div class="pro-left">
								<a href="/product/info.html?gid=216&cid=11_64">
									<img src="<?php echo IMG?>/index/pro/pro_7.png">
									<div class="bg-text">
										<h2>食品经营许可证</h2>
										<a class="bg-bd"></a>
										<p>合规开店第一步<br/>开餐馆做食品等相关业务必备</p>
										<span><em>3800</em>元</span>
										<a class="handle" href="/product/info.html?gid=216&cid=11_64">立即办理</a>
									</div>
								</a>
							</div>
							<div class="pro-right">
								<div class="pro-right-top m-b-10">
									<a class="pr-img m-r-10" href="/index.php/product/info.html?cid=16_85">
										<img src="<?php echo IMG?>/index/pro/pro_88.png">
										<div class="profour-bgtext">
											<h2>ICP经营许可证</h2>
											<p>合规合法化运营</p>
											<span><em>38000</em>元</span>
											<button class="handle">查看详情</button>
										</div>
									</a>
									<a class="pr-img m-r-11" href="/product/info.html?cid=14_77">
										<img src="<?php echo IMG?>/index/pro/pro_99.png">
										<div class="profour-bgtext">
											<h2>人力资源经营许可证</h2>
											<p>人才价值输送站的必经之路</p>
											<span><em>8800</em>元</span>
											<button class="handle">查看详情</button>
										</div>
									</a>
									<a class="pr-img" href="/product/info.html?cid=10_62">
										<img src="<?php echo IMG?>/index/pro/pro_10.png">
										<div class="profour-bgtext">
											<h2>道路运输经营许可证</h2>
											<p>一照在手,一路畅通</p>
											<span><em>4600</em>元</span>
											<button class="handle">查看详情</button>
										</div>
									</a>
								 
									<a class="pr-img m-r-10" href="/product/info.html?cid=13_69">
										<img src="<?php echo IMG?>/index/pro/pro_11.png">
										<div class="profour-bgtext">
											<h2>广播电视节目制作许可证</h2>
											<p>帮您解决开拍第一难</p>
											<span><em>28900</em>元</span>
											<button class="handle">查看详情</button>
										</div>
									</a>
									<a class="pr-img m-r-11" href="/product/info.html?cid=14_80">
										<img src="<?php echo IMG?>/index/pro/pro_12.png">
										<div class="profour-bgtext">
											<h2>危险化学品经营许可证</h2>
											<p>严格把关安全经营</p>
											<span><em>5600</em>元</span>
											<button class="handle">查看详情</button>
										</div>
									</a>
									<a class="pr-img" href="/product/info.html?cid=14_81">
										<img src="<?php echo IMG?>/index/pro/pro_13.png">
										<div class="profour-bgtext">
											<h2>医疗器械经营许可证</h2>
											<p>医疗安全的有力保障</p>
											<span><em>6800</em>元</span>
											<button class="handle">查看详情</button>
										</div>
									</a>
								</div>
							</div>

							<div class="clearfix"></div>
						</div>

					</div>
					<!--知识产权  E-->
                    
                    	<!--知识产权  S-->
					<div class="knowledge">
						<div class="know-title m-b-30">
							<span class="main-title">知识产权</span>
							<span>为知识产权提供全方位解决方案</span>
						</div>
						<div class="know-main">
							<div class="pro-left">
								<a  href="/product/info.html?cid=18_91">
									<img src="<?php echo IMG?>/index/pro/proNew_14.png">
									<div class="bg-text">
										<h2>商标注册</h2>
										<a class="bg-bd"></a>
										<p>早一天注册<br/>早一天开始品牌之路</p>
										<span><em>980</em>元</span>
										<a class="handle" href="/product/info.html?cid=18_91">立即办理</a>
									</div>
								</a>
							</div>
							<div class="pro-right">
								<div class="pro-right-top m-b-10">
									<a class="pr-img m-r-10" href="/product/info.html?cid=19_100">
										<img src="<?php echo IMG?>/index/pro/pro_4.png">
										<div class="profour-bgtext">
											<h2>一般著作权登记</h2>
											<p>保护著作权人合法权益</p>
											<span><em>1500</em>元</span>
											<button class="handle">查看详情</button>
										</div>
									</a>
									<a class="pr-img m-r-11" href="/product/info.html?cid=19_104">
										<img src="<?php echo IMG?>/index/pro/pro_5.png">
										<div class="profour-bgtext">
											<h2>视频著作权登记</h2>
											<p>专属顾问  快速拿证</p>
											<span><em>3180</em>元</span>
											<button class="handle">查看详情</button>
										</div>
									</a>
									<a class="pr-img" href="/product/info.html?cid=19_108">
										<img src="<?php echo IMG?>/index/pro/pro_6.png">
										<div class="profour-bgtext">
											<h2>软件著作权登记</h2>
											<p>高新企业认定的前提</p>
											<span><em>1800</em>元</span>
											<button class="handle">查看详情</button>
										</div>
									</a>
								 
									<a class="pr-img m-r-10" href="/product/info.html?cid=20_112">
										<img src="<?php echo IMG?>/index/pro/pro_44.png">
										<div class="profour-bgtext">
											<h2>发明专利</h2>
											<p>创新路上，有专利才能胜出</p>
											<span><em>5000</em>元</span>
											<button class="handle">查看详情</button>
										</div>
									</a>
									<a class="pr-img m-r-11" href="/product/info.html?cid=20_113">
										<img src="<?php echo IMG?>/index/pro/pro_55.png">
										<div class="profour-bgtext">
											<h2>实用新型专利</h2>
											<p>提升公司竞争力的直升机</p>
											<span><em>2800</em>元</span>
											<button class="handle">查看详情</button>
										</div>
									</a>
									<a class="pr-img" href="/product/info.html?cid=20_114">
										<img src="<?php echo IMG?>/index/pro/pro_66.png">
										<div class="profour-bgtext">
											<h2>外观设计专利</h2>
											<p>避免抄袭，有效保护您的创意成果</p>
											<span><em>1500</em>元</span>
											<button class="handle">查看详情</button>
										</div>
									</a>
								</div>
							</div>

							<div class="clearfix"></div>
						</div>

					</div>
					<!--知识产权  E-->

					<!--认证服务  S-->
                    <?php if(isset($ad_4['list']) && !empty($ad_4['list'])):?>
					<div class="aptitude">
						<div class="apt-title m-b-14">
							<span class="main-title"><?php echo $ad_4['name'];?></span>
							<span><?php echo $ad_4['description'];?></span>
						</div>
						<div class="apt-main">
							<ul>
                                <?php if(isset($ad_4['list']) && !empty($ad_4['list'])):?>
                                <?php foreach ($ad_4['list'] as $ad4_k=>$ad4_v):?>
                                    <li>
                                        <img src="<?php echo $ad4_v['setting']['ad_code'];?>" />
                                        <a class="detail-main" href="<?php echo $ad4_v['setting']['ad_link'];?>" target="_blank">
                                            <h2><?php echo $ad4_v['name'];?></h2>
                                            <span><em><?php echo $ad4_v['price'];?></em>元</span>
                                            <p><?php echo $ad4_v['description'];?> </p>
                                            <button class="handle">查看详情</button>
                                        </a>
                                    </li>
                                <?php endforeach;?>
                                <?php endif;?>
							</ul>
						</div>

					</div>
                    <?php endif;?>
					<!--认证服务  E-->
					<!--合作伙伴  S-->
					<div class="cooperation ">
						<div class="coop-title m-b-14">
							<span class="main-title">合作伙伴</span>
						</div>
                         <div class="swiper-container">
					        <div class="swiper-wrapper">
					            <div class="swiper-slide"><img src="<?php echo IMG?>/index/pro/hz_1.png" /></div>
					            <div class="swiper-slide"><img src="<?php echo IMG?>/index/pro/hz_2.png" /></div>
					            <div class="swiper-slide"><img src="<?php echo IMG?>/index/pro/hz_3.png" /></div>
					            <div class="swiper-slide"><img src="<?php echo IMG?>/index/pro/hz_4.png" /></div>
					            <div class="swiper-slide"><img src="<?php echo IMG?>/index/pro/hz_9.png" /></div>
					            <div class="swiper-slide"><img src="<?php echo IMG?>/index/pro/hz_5.png" /></div>
					            <div class="swiper-slide"><img src="<?php echo IMG?>/index/pro/hz_6.png" /></div>
					            <div class="swiper-slide"><img src="<?php echo IMG?>/index/pro/hz_7.png" /></div>
					            <div class="swiper-slide"><img src="<?php echo IMG?>/index/pro/hz_8.png" /></div>
					            <div class="swiper-slide"><img src="<?php echo IMG?>/index/pro/hz_10.png" /></div>
					        </div>
					        <!-- Add Pagination -->
					        <div class="swiper-pagination"></div>
				    	</div>
				
					</div>
					<!--合作伙伴  E-->
				</div>
			</div>
			<!--container E-->
			<!--低部banner  S-->
			<div class="footer-banner" style="text-align: center;margin-top: -50px;">
				<img src="<?php echo IMG?>/index/footerBanner.jpg" style="width: 1180px;">
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
                                <a target="_blank" href="/index/about">关于我们</a>
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
									<h5>jacky588@qq.com</h5>
									<p>周一至周日8:00-22:00
									</p>
								</div>
								<div class="floatleft">
									<div class="link-code">
										<div class="code"></div>
										<div class="link-code-text">
											<p>扫描微信扫一扫</p>
											<p>关注XXXXX公众号</p>
										</div>
									</div>
									<div class="zfb-code">
										<div class="code"></div>
										<div class="link-code-text">
											<p>扫描支付宝扫一扫</p>
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
			<div class="tip-shows"></div>
			<div class="tip-main">
				<div class="tipMain-title">
					<a class="close" onclick="okClose()"></a>

				</div>
				<div class="tipMain-main">
					<a class="oksub">提交成功!</a>
					<p>我们的专属顾问会在一个工作日内联系您</p>
				</div>

			</div>
		</div>
		<div class="phtips hidden">
			<div class="tip-shows"></div>
			<div class="tip-main">
				<div class="tipMain-title">
					<a class="close" onclick="phClose()"></a>

				</div>
				<div class="tipMain-main">
					<a class="phempty">手机号不能为空</a>
				</div>

			</div>
		</div>
		<div class="xmtips hidden">
			<div class="tip-shows"></div>
			<div class="tip-main">
				<div class="tipMain-title">
					<a class="close" onclick="xmClose()"></a>

				</div>
				<div class="tipMain-main">
					<a class="phempty">姓名不能为空</a>
				</div>

			</div>
		</div>
		<div class="righTtips hidden">
			<div class="tip-shows"></div>
			<div class="tip-main">
				<div class="tipMain-title">
					<a class="close" onclick="rightClose()"></a>

				</div>
				<div class="tipMain-main">
					<a class="phempty">手机号不能为空</a>
				</div>

			</div>
		</div>
	</body>
    
		<script type="text/javascript" src="<?php echo JS?>/jQuery-jcLightBox.js"></script>
        <script type="text/javascript" src="<?php echo JS?>/index/swiper.min.js"></script>
     <script>
        var swiper = new Swiper('.swiper-container', {
            pagination: '.swiper-pagination',
            slidesPerView: 4,
            slidesPerColumn: 2,
            paginationClickable: true,
            spaceBetween: 30
        });
    </script>
	<script>
		function okClose() {
			$('.tips').addClass('hidden');
		}

		function phClose() {
			$('.phtips').addClass('hidden');
		}

		function xmClose() {
			$('.xmtips').addClass('hidden');
		}

		function rightClose() {
			$('.righTtips').addClass('hidden');
		}
	</script>
	<script language="javascript" type="text/javascript">
		<!--图片输出-->
		<!-- 
		$(function() {

			$("#demo1").jcLightBox();

			$("#demo2").jcLightBox({
				speed: 200,
				listSpeed: 200,
				setLood: {
					path: "img/loading.gif",
					width: 32,
					height: 32
				},
				setModal: {
					bgColor: "#000",
					opacity: .6
				},
				state: "fade"
			});
			
			$("#demo3").jcLightBox({
				speed: 200,
				listSpeed: 200,
				setLood: {
					path: "img/loading.gif",
					width: 32,
					height: 32
				},
				setModal: {
					bgColor: "#000",
					opacity: .6
				},
				state: "fade"
			});
		});
		-->
	</script>
	<script type="text/javascript">
		<!--图片滚动-->
		var flag = "left";

		function DY_scroll(wraper, prev, next, img, imga, speed, or) {
			var wraper = $(wraper);
			var prev = $(prev);
			var next = $(next);
			var img = $(img).find('ul');
			var imga = $(imga).find('ul li');
			var w = img.find('li').outerWidth(true);
			var s = speed;
			next.click(function() {
				img.animate({
					'margin-left': -w
				}, function() {
					img.find('li').eq(0).appendTo(img);
					img.css({
						'margin-left': 0
					});
				});
				flag = "left";
			});
			prev.click(function() {
				img.find('li:last').prependTo(img);
				img.css({
					'margin-left': -w
				});
				img.animate({
					'margin-left': 0
				} /*,1500,'easeOutBounce'*/ );
				flag = "right";
			});
			if(imga.length > 4) {
				if(or == true) {
					ad = setInterval(function() {
						flag == "left" ? next.click() : prev.click()
					}, s * 3000);
					wraper.hover(function() {
						clearInterval(ad);
					}, function() {
						ad = setInterval(function() {
							flag == "left" ? next.click() : prev.click()
						}, s * 3000);
					});
				}
			}

		}
		DY_scroll('.hl_main5_content', '.hl_scrool_leftbtn', '.hl_scrool_rightbtn', '.hl_main5_content1', '.hl_main5_content1', 3, true);
		DY_scroll('.hl_main6_content', '.hl_scrool_leftbtn', '.hl_scrool_rightbtn', '.hl_main6_content1', '.hl_main6_content1', 3, true);
		// true为自动播放，不加此参数或false就默认不自动
	</script>

</html>
