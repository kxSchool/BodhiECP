<!DOCTYPE html>
<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="x-dns-prefetch-control" content="on">
		<title>账号设置 - 个人资料 - XXXXX</title>
		<!-- common css -->
         <link rel="shortcut icon" href="<?php echo IMG?>/common/favicon.ico" type="image/x-icon">
		<link href="<?php echo CSS?>/common.css" rel="stylesheet" type="text/css">
		<link href="<?php echo CSS?>/sort.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="<?php echo CSS?>/common/base.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo CSS?>/common/public.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo CSS?>/user/index.css">
        
		<script type="text/javascript" src="<?php echo JS?>/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="<?php echo JS?>/user/index.js"></script>

		<body>
			<div id="nTalk_post_hiddenElement" style="left: -10px; top: -10px; visibility: hidden; display: none; width: 1px; height: 1px;"></div>
		  <!--header start-->
			<header>
                <?php include_once BASE.'/top.php';?>

				<div class="personal-header">
					<div class="container clearfix logo myTab" style="border: 1px solid #fff;">
						<a href="/" class="my-logo"><img src="<?php echo IMG?>/common/logo.png"></a>
						<a href="/user/index" class="my-main">我的主页</a>
						<a href="/user/accountSet" class="account-set active" >账号设置</a>
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
									首页>账号设置
								</p>
							</div>
							<div class="myMenu floatleft">
                                <?php include_once BASE.'/leftSide.php';?>
							</div>
							<div class="myCont floatright">
								<div class="person-main-tab js-person-tab">
									<ul> 
										<li class="first-li active">
											<a href="javascript:;" data-id="0">修改手机号</a>
										</li>
										<li>
											<a href="javascript:;" data-id="1">修改密码</a>
										</li>

									</ul>
								</div>
								<!--个人资料 content部分 S-->
								<div class="method-content">
									 
									<!--修改手机号 S-->
									<div class="basePhone js-tab-0 oldPhone">
										<form method="post" id="form1">
											<div class="bp-title">
											<p>修改手机号前须先核实原手机号的信息</p>
											</div>
											<div class="bp-num">
												<p>
													<span class="bp-label">原手机号:</span>
													<span class="bp-number"><?php echo $mobile;?></span>
                                                    <input type="hidden" value="<?php echo $mobile;?>" class="userMobile" name="mobile"/>
												</p>
											</div>
          	                                 <div class="bp-code" style="margin-bottom: 20px;">
												<p>
													<span class="bp-label">登录密码:</span>
													<input type="text" class="login-pwd" placeholder="请输入您的登录密码" />
												</p>
											</div>
											<div class="bp-code">
												<p>
													<span class="bp-label">验证码:</span>
													<input type="text" class="yz-code" placeholder="请输入您的验证码" >
													<input type="button" class="getcode" class="btn-code" value="获取验证码" onclick="sendMessage()" />
												</p>
											</div>
                                           
											<button type="button" class="bp-submit" onclick="CheckCode()">下一步</button>
										</form>
									</div>
									<!--修改手机号 E-->
                                   <!--输入新的手机号 S-->
									<div class="basePhone newPhone hidden">
										<form method="post" id="form1">
										 
											<div class="bp-num" style="margin-bottom: 20px;">
												<p>
													<span class="bp-label">新手机号:</span>
												 
                                                    <input type="tel" value="" class="newMoblie" name="mobile" placeholder="请输入您的新手机号码"/>
												</p>
											</div>
          	                                 
											<div class="bp-code">
												<p>
													<span class="bp-label">验证码:</span>
													<input type="text" class="yz-code" id="newCode" placeholder="请输入您的验证码" >
													<input type="button" class="getcode" class="btn-code" value="获取验证码" onclick="sendNewMessage()" />
												</p>
											</div>
                                           
											<button type="button" class="bp-submit" onclick="newPhone()">修改成功</button>
										</form>
									</div>
									<!--输入新的手机号 E-->
									<!--修改密码 S-->
									<div class="basePw js-tab-1 hidden">
										<form action="/" method="post">
											<div class="pw-nav">
												<p class="">
													<span class="pw-label">输入旧密码:</span>
													<input type="password" name="passport"   placeholder="请输入密码"  >
												</p>
												<p class="errorMsg forgetPwdMsg abs  disBlock">旧密码是必填项.</p>
												 
											</div>
											<div class="pw-nav">
												<p class="">
													<span class="pw-label">设置新密码:</span>
													<input type="password" name="passport"   placeholder="请输入新密码"  >
												</p>
												<p class="errorMsg forgetPwdMsg abs  disBlock">新密码是必填项.</p>
												 
											</div>
											<div class="pw-nav">
												<p class="">
													<span class="pw-label">确认新密码:</span>
													<input type="password" name="passport"  placeholder="请确认新密码" >
												</p>
												<p class="errorMsg forgetPwdMsg abs  disBlock">密码是必填项.</p>
												 
											</div>
											<button type="button" class="pw-submit" onclick="newPhone()">保存修改</button>
										</form>
									</div>
									<!--修改密码 E-->
								</div>
								<!--个人资料 content部分 E-->
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				
				<!--切换内容的js S-->
				<script type="text/javascript">
					$(function(){
						$('.js-person-tab').find('a').on('click', function() {
	
							var $this = $(this);
							$this.parent().addClass('active').siblings().removeClass('active');
							var _id = $this.attr('data-id');
							$('.js-tab-' + _id).removeClass('hidden').siblings().addClass('hidden');
						})
                       
					});
                   //发送验证码
                    var count = 60; //间隔函数，1秒执行
                    var curCount; //当前剩余秒数 
                    function sendMessage() {
             	      var mobile = $(".userMobile").val();
                         var loginPwd = $(".login-pwd").val();
                    	curCount = count;
                    	//设置button效果，开始计时 
                    
                    	$(".getcode").val(curCount + "秒后重发");
                    	InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次 
                    	//请求后台发送验证码 TODO 
                    
                    	//获取验证码
                        $.ajax({
                            url: "/api/ajaxSendSms",
                            type: "POST",
                            data : 'mobile='+mobile,
                            dataType: 'json',
                            success: function (data) {
                    
                            }
                        });
                    }
                        //timer处理函数 
                    function SetRemainTime() {
                    	if (curCount == 0) {
                    		window.clearInterval(InterValObj); //停止计时器 
                    		$(".getcode").removeAttr("disabled"); //启用按钮 
                    		$(".getcode").val("重新发送");
                    	} else {
                    		curCount--;
                    		$(".getcode").val(curCount + "秒后重发");
                    	}
                    }
                function CheckCode(){
                    var mobile = $(".userMobile").val();
                    var code = $(".yz-code").val();
                    var loginPwd = $(".login-pwd").val();
                    if(code != null){
                         $.ajax({
                            url: "/api/ajaxCheckPwd",
                            type: "POST",
                            data : {mobile:mobile,password:loginPwd,code:code},
                            dataType: 'json',
                            success: function (res) {
                                if(res.code == 1){
                                   alert(res.mes)
                                   return false;
                                }else{
                                    alert("修改成功")
                                    $('.newPhone').removeClass('hidden');
                                     $('.oldPhone').addClass('hidden');
                                }
                            }
                        });
                    }
                }
                
                 function sendNewMessage() {
             	      var mobile = $(".newMoblie").val();
                         var loginPwd = $(".login-pwd").val();
                    	curCount = count;
                    	//设置button效果，开始计时 
                    
                    	$(".getcode").val(curCount + "秒后重发");
                    	InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次 
                    	//请求后台发送验证码 TODO 
                    
                    	//获取验证码
                        $.ajax({
                            url: "/api/ajaxSendSms",
                            type: "POST",
                            data : 'mobile='+mobile,
                            dataType: 'json',
                            success: function (data) {
                    
                            }
                        });
                    }
                
                
                function newPhone(){
                     var mobile = $(".userMobile").val();
                     var new_mobile = $(".newMoblie").val();
                      var code = $("#newCode").val();
                     $.ajax({
                            url: "/api/ajaxChangeMobile",
                            type: "POST",
                            data : {old_mobile :mobile,new_mobile :new_mobile,code:code},
                            dataType: 'json',
                            success: function (res) {
                                if(res.code == 1){
                                   alert(res.mes)
                                   return false;
                                }else{
                                    alert("修改成功")
                                    
                                }
                            }
                        });
                }
				</script>
				 
			<!--layout end-->

            <?php include_once BASE.'/foot.php';?>

		</body>

</html>