<!DOCTYPE html>
<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="x-dns-prefetch-control" content="on">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="keywords" content="XXXXX,注册公司,代理记账,商标注册,个人社保,企业社保,创业法律服务">
        
		<title>支付-XXXXX</title>
		<!-- common css -->
         <link rel="shortcut icon" href="<?php echo IMG?>/common/favicon.ico" type="image/x-icon">
		<link href="<?php echo CSS?>/common.css" rel="stylesheet" type="text/css">
		<link href="<?php echo CSS?>/sort.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="<?php echo CSS?>/common/base.css" type="text/css" />

		<link href="<?php echo CSS?>/order/payType.css" rel="stylesheet" type="text/css">

		<script type="text/javascript" src="<?php echo JS?>/jquery-1.8.3.min.js"></script>

		<!--付款的js S-->
				<script type="text/javascript">
					$(function(){
					$('.js-main-tab').find('a').on('click', function() {

						var $this = $(this);
						$this.parent().addClass('active').siblings().removeClass('active');
						var _id = $this.attr('data-id');
						$('.js-tab-' + _id).removeClass('hidden').siblings().addClass('hidden');

					});

					$('.js-method').find('li').on('click', function() {
						var $this = $(this);
						var $qr = $('.js-qrcode');
						$this.addClass('active').siblings().removeClass('active');
						if($this.attr('data-id') == '1') {
							//$qr.removeClass('hidden')
							$(".js-qrcode").hide();
						}
					});

					$('.js-selfransfer').find('li').on('click', function() {
						var $this = $(this);
						$this.addClass('active').siblings().removeClass('active');
					});

					$('.js-status-detail-icon').on('click', function() {
						$('.js-status-detail').slideToggle();
					})
					}); 
				</script>

				<!--付款的js E-->

		<body>
			<div id="nTalk_post_hiddenElement" style="left: -10px; top: -10px; visibility: hidden; display: none; width: 1px; height: 1px;"></div>
			<!--header start-->
			<?php include_once BASE.'/nav.php';?>
			<!--header end-->
			<!--layout start-->
			<div class="layout">
                
				<div class="bg-white">
					<div class="container">

						<div class="product-detail clearfix">
							<div class="product-main floatleft js-product-main">
								<div class="type-title">
									<p>选择支付方式</p>
								</div>
								<div class="product-main-tab js-main-tab">
									<ul>
										<li class="first-li active">
											<a href="javascript:;" data-id="0">微信/支付宝</a>
										</li>

										<li>
											<a href="javascript:;" data-id="1">个人网银</a>
										</li>
										<li>
											<a href="javascript:;" data-id="2">自助转账</a>
										</li>

									</ul>
								</div>
								<div class="method-content">
									<div class="method-wx js-tab-0">

										<ul class="clearfix js-method">
											<li class="m-r-30 js-t-bank" data-id="0" onclick="alipay()">
												<input class="radio-hidden" type="radio" name="bankid" value="-1">
												<img src="<?php echo IMG?>/bank/alipay.png">
												<span>支付宝支付</span>
											</li>
											<li data-id="<?php echo $order_id;?>" id="nativeCodePayBtn" onclick="wxpay()">
												<input class="radio-hidden" type="radio" name="bankid" value="-2">
												<img src="<?php echo IMG?>/bank/wechat.png">
												<span>微信支付</span>
											</li>
										</ul>
										<div class="qrcode text-center  js-qrcode hidden">
											<img id="wxpayqrcode"  class="">
											<p>请使用微信扫描二维码支付</p>
											<p>二维码30分钟内有效，请尽快支付</p>
										</div>
									</div>
									<div class="personal-bank js-tab-1 hidden">
										<ul class="clearfix">
											<li class="js-t-bank" id="bd_bank_4">
												<input class="radio-hidden" type="radio" name="bankid" value="4">
												<img src="<?php echo IMG?>/bank/bank_4.gif" alt="建设银行">
											</li>
											<li class="js-t-bank" id="bd_bank_6">
												<input class="radio-hidden" type="radio" name="bankid" value="6">
												<img src="<?php echo IMG?>/bank/bank_6.gif" alt="交通银行">
											</li>
											<li class="js-t-bank" id="bd_bank_7">
												<input class="radio-hidden" type="radio" name="bankid" value="7">
												<img src="<?php echo IMG?>/bank/bank_7.gif" alt="兴业银行">
											</li>
											<li class="js-t-bank" id="bd_bank_8">
												<input class="radio-hidden" type="radio" name="bankid" value="8">
												<img src="<?php echo IMG?>/bank/bank_8.gif" alt="中国民生银行">
											</li>
											<li class="js-t-bank" id="bd_bank_10">
												<input class="radio-hidden" type="radio" name="bankid" value="10">
												<img src="<?php echo IMG?>/bank/bank_10.gif" alt="中国银行">
											</li>
											<li class="js-t-bank" id="bd_bank_11">
												<input class="radio-hidden" type="radio" name="bankid" value="11">
												<img src="<?php echo IMG?>/bank/bank_11.gif" alt="平安银行">
											</li>
											<li class="js-t-bank" id="bd_bank_12">
												<input class="radio-hidden" type="radio" name="bankid" value="12">
												<img src="<?php echo IMG?>/bank/bank_12.gif" alt="中信银行">
											</li>
											<li class="js-t-bank" id="bd_bank_14">
												<input class="radio-hidden" type="radio" name="bankid" value="14">
												<img src="<?php echo IMG?>/bank/bank_14.gif" alt="广发银行">
											</li>
											<li class="js-t-bank" id="bd_bank_15">
												<input class="radio-hidden" type="radio" name="bankid" value="15">
												<img src="<?php echo IMG?>/bank/bank_15.gif" alt="上海银行">
											</li>
											<li class="js-t-bank" id="bd_bank_16">
												<input class="radio-hidden" type="radio" name="bankid" value="16">
												<img src="<?php echo IMG?>/bank/bank_16.gif" alt="上海浦东发展银行">
											</li>
											<li class="js-t-bank" id="bd_bank_17">
												<input class="radio-hidden" type="radio" name="bankid" value="17">
												<img src="<?php echo IMG?>/bank/bank_17.gif" alt="中国邮政">
											</li>
											<li class="js-t-bank" id="bd_bank_19">
												<input class="radio-hidden" type="radio" name="bankid" value="19">
												<img src="<?php echo IMG?>/bank/bank_19.gif" alt="华夏银行">
											</li>
											<li class="js-t-bank" id="bd_bank_1">
												<input class="radio-hidden" type="radio" name="bankid" value="1">
												<img src="<?php echo IMG?>/bank/bank_1.gif" alt="工商银行">
											</li>
											<li class="js-t-bank" id="bd_bank_2">
												<input class="radio-hidden" type="radio" name="bankid" value="2">
												<img src="<?php echo IMG?>/bank/bank_2.gif" alt="招商银行">
											</li>
											<li class="js-t-bank" id="bd_bank_3">
												<input class="radio-hidden" type="radio" name="bankid" value="3">
												<img src="<?php echo IMG?>/bank/bank_3.gif" alt="中国农业银行">
											</li>
											<li class="js-t-bank" id="bd_bank_5">
												<input class="radio-hidden" type="radio" name="bankid" value="5">
												<img src="<?php echo IMG?>/bank/bank_5.gif" alt="北京银行">
											</li>
										</ul>
									</div>
									<div class="self-transfer js-tab-2 js-selfransfer   hidden">
										<ul class="clearfix">
											<!--<li class="clearfix" onclick="selectselfransfer(1)">
												<img src="<?php echo IMG?>/bank/alipay.png">
												<div class="self-right">
													<p><span>支付宝账号：</span>p@kxschool.com</p>
													<p><span>校验全名：</span>上海咨瑟信息管理有限公司</p>
												</div>
											</li>-->
											<li class="clearfix" onclick="selectselfransfer(2)">
												<img src="<?php echo IMG?>/bank/bank_2.gif">
												<div class="self-right line">
													<p><span>开户账号：</span>121928653710401</p>
													<p><span>开户名：</span>上海XXXXX信息科技有限公司</p>
													<p><span>开户行：</span>招商银行股份有限公司上海虹口体育场支行</p>
												</div>
											</li>
										</ul>
										<p class="self-note">自主转账，请务必获取汇款识别码(KFW+订单号)，汇款时将识别码填写至汇款单"用途”栏，支付宝转账时将识别码填写至”备注”中</p>

										<div id="sendpayidentifiers">
											<a href="javascript:;" class="self-btn no-used" id="getidentifiers">确认并获取转账识别码</a>
											<input type="hidden" value="" id="selfransfertype">
											<span class="self-note-type">请先选择自主转账类别</span>
										</div>

										<div class="self-tip hidden js-showzhifubao">
											<p class="self-note-2">注意事项：自助转账时需要注意一下信息，请牢记</p>
											<div class="self-tip-panel">
												<p><span>支付宝账号</span>p@kxschool.com</p>
												<p><span>校验全名</span>上海咨瑟信息管理有限公司</p>
												<p class="m-b-0"><span>转账识别码</span><span class="js-shibiema" style="color: #e85555;"></span></p>
											</div>
											<p class="self-note-3">
												您的转账识别码<span class="js-shibiema"></span>已发送手机<span class="js-mobile"></span>
											</p>
										</div>

										<div class="self-tip hidden js-showyinhang">
											<p class="self-note-2">注意事项：自助转账时需要注意以下信息，请牢记 <span style="color:red;margin-left: 10px;">(转账成功后，请联系您的业务人员或者客服进行订单确认)</span></p>
											<div class="self-tip-panel">
												<p><span>开户名</span>上海咨瑟信息管理有限公司</p>
												<p><span>开户账号</span>123456789565</p>
												<p><span>开户行</span>招商银行股份有限公司北京海淀支行</p>
												<p class="m-b-0"><span>转账识别码</span><span class="js-shibiema" style="color: #e85555;"></span></p>
											</div>
											<p class="self-note-3">
												您的转账识别码<span class="js-shibiema"></span>已发送手机<span class="js-mobile"></span>
											</p>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			
				
				<!-- 分享到微信 S -->
				<div class="know-poper">
					<span class="close js-close"></span>
					<h4>打开微信“扫一扫”，打开网页后点击屏幕右上角分享按钮</h4>
					<!-- 二维码是一个页面  -->
					<img src="/product/item/getqrcode/id/1.html" alt="" class="wxImg">
				</div>
				<div class="mask"></div>
				<!-- 分享到微信 E -->

<!--				<script type="text/javascript">-->
<!--					$(function() {-->
<!---->
<!--						//关于我们滚动图-->
<!--						$("#pikame").PikaChoose({-->
<!--							carousel: true,-->
<!--							carouselVertical: true,-->
<!--							autoPlay: false-->
<!--						});-->
<!---->
<!--						$('.js-link-wx').click(function() {-->
<!--							$('.know-poper').show();-->
<!--							$('.mask').show();-->
<!--							return false-->
<!--						});-->
<!---->
<!--						$('.js-close').click(function() {-->
<!--							$('.know-poper').hide();-->
<!--							$('.mask').hide();-->
<!--						})-->
<!---->
<!--					})-->
<!--				</script>-->

			</div>
			<!--layout end-->
			<!--footer start-->
            <?php include_once BASE.'/foot.php';?>
			<!--footer end-->
			<script>
				function alipay() {
                    window.location = '/order/pay' + '?type=alipay' + '&oid='+"<?php echo $order_id?>";
                }
                function wxpay() {
				    $('.qrcode').removeClass('hidden');
                    $.ajax({
                        url : '/api/pay' + '?oid=' + $('#nativeCodePayBtn').data('id'),
                        type : 'GET',
                        success : function (url) {
                            $('#wxpayqrcode').attr('src',url);
                        }
                    });
                }
			</script>
		</body>

</html>