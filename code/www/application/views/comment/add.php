<!DOCTYPE html>
<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="x-dns-prefetch-control" content="on">
        <meta name="keywords" content="XXXXX,注册公司,代理记账,商标注册,个人社保,企业社保,创业法律服务">
        
		<title>评价商品 - XXXXX</title>
		<!-- common css -->
         <link rel="shortcut icon" href="<?php echo IMG?>/common/favicon.ico" type="image/x-icon">
		<link href="<?php echo CSS?>/common.css" rel="stylesheet" type="text/css">
		<link href="<?php echo CSS?>/sort.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="<?php echo CSS?>/common/base.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo CSS?>/user/evaluate.css">

		<script type="text/javascript" src="<?php echo JS?>/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="<?php echo JS?>/common/common.js"></script>

		<body>
			<div id="nTalk_post_hiddenElement" style="left: -10px; top: -10px; visibility: hidden; display: none; width: 1px; height: 1px;"></div>
			<!--header start-->
            <?php include_once BASE.'/nav.php';?>
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
								<ul class="person-ul">
									<li>
										<a href="#">个人中心</a>
									</li>
									<li>
										<a href="#">个人资料</a>
									</li>
									<li>
										<a href="#">我的优惠券</a>
									</li>
									<li>
										<a href="#">我的评价</a>
									</li>
								</ul>
								<ul class="order-ul">
									<li>
										<a href="#">订单中心</a>
									</li>
									<li>
										<a href="#">我的订单</a>
									</li>
								</ul>
								<ul class="service-ul">
									<li>
										<a href="#">售后服务</a>
									</li>
									<li>
										<a href="#">关于退款</a>
									</li>
									<li>
										<a href="#">关于发展</a>
									</li>
								</ul>
							</div>
							<div class="myCont floatright">

								<div class="">
									<div class="person-main-tab js-coupon-tab">
										<ul>
											<li class="first-li active">
												<a href="javascript:;" data-id="0">服务评价</a>
											</li>
										</ul>
									</div>
									<!--个人资料 content部分 S-->
									<div class="method-content ">
										<form method="post" id="form">
											<!--星级评价 S-->
											<div class="starRating">
												<ul>
													<li>
														<label>专业程度:</label>
														<span>
															<a href="javascript:click(1)">
																	<img src="<?php echo IMG?>/common/startg.png" id="star1" onMouseOver="over(1)" onMouseOut="out(1)" />
															</a>
										 					<a href="javascript:click(2)">
																	<img src="<?php echo IMG?>/common/startg.png" id="star2" onMouseOver="over(2)" onMouseOut="out(2)" />
															</a>
										 					<a href="javascript:click(3)">
																	<img src="<?php echo IMG?>/common/startg.png" id="star3" onMouseOver="over(3)" onMouseOut="out(3)" />
															</a>
										 					<a href="javascript:click(4)">
																	<img src="<?php echo IMG?>/common/startg.png" id="star4" onMouseOver="over(4)" onMouseOut="out(4)" />
															</a>
										 					<a href="javascript:click(5)">
																	<img src="<?php echo IMG?>/common/startg.png" id="star5" onMouseOver="over(5)" onMouseOut="out(5)" />
																</a>
										 					 
										 				</span>

													</li>
													<li>
														<label>服务态度:</label>
														<span>
										 					  <a href="javascript:click(6)">
									                            	<img src="<?php echo IMG?>/common/startg.png" id="star6" onMouseOver="over(6)" onMouseOut="out(6)" />
									                          </a>
										 					  <a href="javascript:click(7)">
									                            	<img src="<?php echo IMG?>/common/startg.png" id="star7" onMouseOver="over(7)" onMouseOut="out(7)" />
									                          </a>
										 					 <a href="javascript:click(8)">
									                            	<img src="<?php echo IMG?>/common/startg.png" id="star8" onMouseOver="over(8)" onMouseOut="out(8)" />
									                         </a>
										 					 <a href="javascript:click(9)">
									                            	<img src="<?php echo IMG?>/common/startg.png" id="star9" onMouseOver="over(9)" onMouseOut="out(9)" />
									                         </a>
										 					<a href="javascript:click(10)">
		                           									 <img src="<?php echo IMG?>/common/startg.png" id="star10" onMouseOver="over(10)" onMouseOut="out(10)"/>
		                        							</a>
										 				</span>
													</li>
													<li>
														<label>办事效率:</label>
														<span>
										 					
										                        <a href="javascript:click(11)">
										                            <img src="<?php echo IMG?>/common/startg.png" id="star11" onMouseOver="over(11)" onMouseOut="out(11)"/>
										                        </a>
									                  
										                        <a href="javascript:click(12)">
										                            <img src="<?php echo IMG?>/common/startg.png" id="star12" onMouseOver="over(12)" onMouseOut="out(12)"/>
										                        </a>
									                  
										                        <a href="javascript:click(13)">
										                            <img src="<?php echo IMG?>/common/startg.png" id="star13" onMouseOver="over(13)" onMouseOut="out(13)"/>
										                        </a>
										              
										                        <a href="javascript:click(14)">
										                            <img src="<?php echo IMG?>/common/startg.png" id="star14" onMouseOver="over(14)" onMouseOut="out(14)"/>
										                        </a>
									                 
										                        <a href="javascript:click(15)">
										                            <img src="<?php echo IMG?>/common/startg.png" id="star15" onMouseOver="over(15)" onMouseOut="out(15)"
										                            />
										                        </a>
		                   
										 				</span>
													</li>
												</ul>
											</div>
											<!--星级评价 S-->

											<!--服务标签 S-->
											<div class="serviceTag">
												<div class="tag-title">请选择服务标签</div>
												<ul class="clearfix">
                                                    <?php foreach ($tags as $tid => $tag):?>
													<li class="" data-id="<?php echo $tag['tagid']?>"><?php echo $tag['tagname']?></li>
                                                    <?php endforeach;?>
												</ul>
												<textarea placeholder="服务态度超好的，真的是一站式服务，解决 了我后续的很多事情，让我很省心。"></textarea>

											</div>



                                            <input type="hidden" id="order_id" name="order_id" value="<?php echo $order_id;?>">
                                            <input type="hidden" id="professional" name="professional">
                                            <input type="hidden" id="effect" name="effect">
                                            <input type="hidden" id="attitude" name="attitude">
                                            <input type="hidden" id="tags" name="tags">



											<button type="button" class="assess-submit">提交</button>
											<!--服务标签 E-->
										</form>
									</div>
									<!--个人资料 content部分 E-->
								</div>


							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
            </div>
				<!--layout end-->
				<!--footer start-->
            <?php include_once BASE.'/foot.php';?>
				<!--footer end-->

            <script type="text/javascript" src="<?php echo JS?>/user/evaluate.js"></script>
		</body>

</html>