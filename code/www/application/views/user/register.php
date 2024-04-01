<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>注册-XXXXX</title>
         <link rel="shortcut icon" href="<?php echo IMG?>/common/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="<?php echo CSS?>/common.css" />
		<link rel="stylesheet" href="<?php echo CSS?>/user/register.css" />
	</head>

	<body>
		<header>
			<div class="container clearfix">
				<div class="floatleft">
					<a href="/">
						<img src="<?php echo IMG?>/common/logo.png" />
					</a>
				</div>
				<div class="rel">

					<a>jacky588@qq.com</a>
				</div>
			</div>
		</header>
		<div class="layout">
			<div class="container">
				<div class="login-main">
					<!-- <img class="bg_logo" src="<?php echo IMG?>/common/bg_logo.png"> -->
					<img class="bg_font" src="<?php echo IMG?>/common/bg_font.png">
					<div class="login-right">
						<div class="zhuce"><span>欢迎注册XXXXX</span></div>
						<div class="left-form phone n-m-t">

							<form id="signupForm" method="post" action="" class="zcform">
								<p class="clearfix">
									<label class="one" for="telphone">手机号码：</label>
									<input type="tel" name="telphone" class="reg-telphone" value="" placeholder="请输入手机号" onblur="userNameBlur()">
								</p>
								<div class="same-error lo-error1" style="display: none;">
									<img src="<?php echo IMG?>/index/login_conf.png"> 
								   <span>请输入的正确的手机号</span>
							   </div>
								<p class="clearfix">
									<label class="one yz-label">验证码：</label>
									<input class="identifying_code" id="code" type="text" value="" placeholder="请输入手机6位校验码">
									<input id="getcode" class="reg-single-btn" type="button" value="获取验证码" onclick="sendMessage()">
								</p>
								<div class="same-error lo-error2" style="display: none;">
									<img src="<?php echo IMG?>/index/login_conf.png"> 
								   <span>请输入的正确的验证码</span>
							   </div>
								<p class="clearfix">
									<label class="one name-label" for="password">密码：</label>
									<input name="password" type="password" class="reg_password" value="" placeholder="请输入密码" onblur="accountNameBlur()" id="password">
								</p>
								<div class="same-error lo-error3" style="display: none;">
									<img src="<?php echo IMG?>/index/login_conf.png"> 
								   <span>请输入正确的密码</span>
							   </div>
								<p class="clearfix">
									<label class="one pw-label" for="confirm_password">确认密码：</label>
									<input name="confirm_password" type="password" class="reg_password" value="" placeholder="请再次输入密码" onblur="accountPwBlur()" id="repassword">
								</p>
								<div class="same-error lo-error4" style="display: none;">
									<img src="<?php echo IMG?>/index/login_conf.png"> 
								   <span>请重新确认您的密码</span>
							   </div>
								<p class="clearfix agreement">
									 点击"立即注册",表示您同意并愿意遵守<a href="/index/protocol">《XXXXX用户协议》</a>
								</p>
								<button type="button" class="regBtn" onclick="regSubmit()">立即注册</button>
                                <div class="register-box">
										<a href="<?php echo site_url('user/login')?>" class="register">已有账号，立即登录</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer>
			<p>沪ICP备18018256号 上海XXXXX信息科技有限公司</p>
		</footer>
		<script type="text/javascript" src="<?php echo JS?>/jquery-1.8.3.min.js" ></script>
		<script type="text/javascript" src="<?php echo JS?>/user/register.js"></script>
		 
	</body>

</html>