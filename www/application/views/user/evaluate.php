<!DOCTYPE html>
<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="x-dns-prefetch-control" content="on">
		<title>我的评价 - 个人资料 - XXXXX</title>
		<!-- common css -->
         <link rel="shortcut icon" href="<?php echo IMG?>/common/favicon.ico" type="image/x-icon">
		<link href="<?php echo CSS?>/common.css" rel="stylesheet" type="text/css">
		<link href="<?php echo CSS?>/sort.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="<?php echo CSS?>/common/base.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo CSS?>/common/public.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo CSS?>/user/evaluate.css">
        
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
						<div href="/index/index" class="my-logo"><img src="<?php echo IMG?>/common/logo.png"></div>
						<a href="/user/index" class="my-main active">我的主页</a> 
						<a href="/user/setting" class="account-set">账号设置</a>
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
								<!--评价信息 S-->
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
										<form method="post">
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
													<li class="">服务态度好</li>
													<li>办事效率高</li>
													<li>服务态度好</li>
													<li>办事效率高</li>
													<li>服务态度好</li>
													<li>办事效率高</li>
													<li>服务态度好</li>
													<li>办事效率高</li>
													<li>服务态度好</li>
													<li>办事效率高</li>
												</ul>
												<textarea placeholder="服务态度超好的，真的是一站式服务，解决 了我后续的很多事情，让我很省心。"></textarea>

											</div>
											<button>提交</button>
											<!--服务标签 E-->
										</form>
									</div>
									<!--个人资料 content部分 E-->
								</div>
								<!--评价信息 E-->
								<!--无订单不能评价 S-->
								<div class="all-order hidden">
									<div class="header">

										<a class="p-name">商品</a>
										<a class="p-num">数量</a>
										<a class="p-fk">实付款</a>
										<a class="p-state">交易状态</a>
										<a class="p-operate">操作</a>

									</div>
									<div class="noOrder">
										<img src="../../../img/common/noOrder.png">
										<p>您暂时还没有交易完成的订单,不能评价哦！</p>
									</div>
								</div>
								<!--无订单不能评价 E-->
								<!--去评价列表 S-->
								<div class="all-order hidden">
									<div class="header">

										<a class="p-name">商品</a>
										<a class="p-num">数量</a>
										<a class="p-fk">实付款</a>
										<a class="p-state">交易状态</a>
										<a class="p-operate">操作</a>

									</div>
									<div class="u-panel-inner clearfix">
										<!--全部订单 S-->

										<table>

											<tbody>
												<tr class="body-head">
													<td colspan="7" class="text-left">
														<span class="">2018-04-23</span>
														<span>订单号：qeqweqwew</span>
														<span class="deleteBtn"><img src="../../../img/common/deleteBtn.png"></span>
													</td>
												</tr>
												<tr>
													<td class="b-l-n one-td" style="text-align: left; padding-left: 20px">
														<div class="order-info">
															<div class="Iconimg"><img src="../../../img/common/CIcon.png"></div>
															<div class="order-right">
																<p>
																	<a class="order-company">公司注册_有限责任公司注册</a>
																</p>
																<p>地区：
																	<a>上海-金山区</a>
																</p>
																<p>服务者：王冰</p>
															</div>
														</div>
													</td>
													<td class="two-td">
														1 </td>
													<td class="body-fee">
														¥499 <br>（优惠：¥0）
													</td>
													<td class="waiting">
														交易成功 </td>

													<td rowspan="2" class="body-btn b-r-n">
														<a href="" class="pay">去评价</a>

													</td>
												</tr>
												<tr>
													<td class="b-l-n one-td" style="text-align: left; padding-left: 20px">
														<div class="order-info">
															<div class="Iconimg"><img src="../../../img/common/CIcon.png"></div>

															<div class="order-right">
																<p>
																	<a class="order-company">公司注册_有限责任公司注册</a>
																</p>
																<p>地区：
																	<a>上海-金山区</a>
																</p>
																<p>服务者：王冰</p>
															</div>
														</div>
													</td>
													<td class="two-td">
														1 </td>
													<td class="body-fee">
														¥499 <br>（优惠：¥0）
													</td>
													<td class="waiting">
														交易成功 </td>
												</tr>
												<tr class="white-space">
													<td></td>
												</tr>
											</tbody>

											<tbody>
												<tr class="body-head">
													<td colspan="7" class="text-left">
														<span class="">2018-04-23</span>
														<span>订单号：qeqweqwew</span>
														<span class="deleteBtn"><img src="../../../img/common/deleteBtn.png"></span>
													</td>
												</tr>
												<tr>
													<td class="b-l-n one-td" style="text-align: left; padding-left: 20px">
														<div class="order-info">
															<div class="Iconimg"><img src="../../../img/common/CIcon.png"></div>
															<div class="order-right">
																<p>
																	<a class="order-company">公司注册_有限责任公司注册</a>
																</p>
																<p>地区：
																	<a>上海-金山区</a>
																</p>
																<p>服务者：王冰</p>
															</div>
														</div>
													</td>
													<td class="two-td">
														1 </td>
													<td class="body-fee">
														¥499 <br>（优惠：¥0）
													</td>
													<td class="waiting">
														交易成功 </td>

													<td rowspan="1" class="body-btn b-r-n">
														<a href="" class="pay">去评价</a>

													</td>
												</tr>

												<tr class="white-space">
													<td></td>
												</tr>
											</tbody>
										</table>
										<div class="row">
											<div class="col-lg-12 text-center">
												<nav aria-label="Page navigation">
													<ul class="paginations">
														<li class="">
															<a>
																<<</a>
														</li>
														<li class="pre-page">
															<a>上一页</a>
														</li>
														<li class=" active">
															<a href="#">1</a>
														</li>
														<li class="">
															<a href="#">2</a>
														</li>
														<li class="">
															<a href="#">3</a>
														</li>
														<li class="">
															<a href="#">4</a>
														</li>
														<li class="">
															<a href="#">5</a>
														</li>
														<li class="">
															<a href="#">6</a>
														</li>
														<li class="next-page">
															<a>下一页</a>
														</li>
														<li class=" ">
															<a>>></a>
														</li>
													</ul>
												</nav>
											</div>
										</div>

										<!--全部订单 E-->

									</div>
								</div>
								<!--去评价 列表 E-->
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<!--layout end-->

            <?php include_once BASE.'/foot.php';?>
           	<script type="text/javascript" src="<?php echo JS?>/user/evaluate.js"></script>
		</body>

</html>