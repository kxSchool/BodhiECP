<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>登录-XXXXX</title>
         <link rel="shortcut icon" href="<?php echo IMG?>/common/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="<?php echo CSS?>/common.css" />
		<link rel="stylesheet" href="<?php echo CSS?>/user/login.css" />
		<script type="text/javascript" src="<?php echo JS?>/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="<?php echo JS?>/user/login.js"></script>
	</head>

	<body>
		<header>
			<div class="container clearfix">
				<div class="floatleft">
					<a href="/index/index">
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
					<!--<img class="bg_logo" src="<?php echo IMG?>/common/bg_logo.png">-->
					<img class="bg_font" src="<?php echo IMG?>/common/bg_font.png">
					<div class="login-right">
						<div class="zhuce"><span>欢迎注册XXXXX</span></div>
						<div class="left-form phone n-m-t"  >
							<div class="menu js-tab a-1"  >
								<ul>
									<li class="m-r-30">
										<a href="javascript:;" class="phone active" data-id="1">手机动态码登录</a>
									</li>
									<li class="line m-r-30"></li>
									<li>
										<a href="javascript:;" class="account" data-id="2">账号登录</a>
									</li>
								</ul>
							</div>
							<div class="phone-login js-form-1">
								<form id="phoneForm" method="post" action=""  >
									<div class="userInput">
										<input name="passport" type="text" placeholder="请输入手机号码" class="username">
									</div>
									<div class="same-error lo-error1" style="display: none;">
		                                 <img src="<?php echo IMG?>/index/login_conf.png"> 
		                                <span>请输入的手机号码不正确,请重新输入</span>
                            		</div>
									<div class="userPw">
										<input id="confirmCode" type="text" placeholder="请输入验证码" class="password">
										 <input class="getcode" class="reg-single-btn" type="button" value="获取验证码" onclick="sendMessage()" />
									</div>
									<div class="same-error lo-error2" style="display: none;" >
		                                 <img src="<?php echo IMG?>/index/login_conf.png" /> 
		                                <span>请输入正确的验证码</span>
                            		</div>
									<a href="<?php echo site_url('user/forgetPwd')?>" class="forgetPassword">忘记密码?</a>
									<a href="javascript:;"  class="phone-loginBtn" id="submit_login"  onclick="login()">立即登录</a>
									 
									<div class="register-box">
										<a href="<?php echo site_url('user/register')?>"  class="register" >还没账号，立即注册</a>
									</div>
								</form>
							</div>
							<div class="account-login js-form-2 hidden">
								<form id="accountForm" method="post" action="">
									<div class="userInput">
										<input name="passport" type="text" placeholder="请输入手机号码" class="acount-username">
									</div>
									<div class="same-error lo-error1" style="display: none;">
										<img src="<?php echo IMG?>/index/login_conf.png"> 
									   <span>请输入的手机号码不正确,请重新输入</span>
								   </div>
									<div class="userPw">
										<input name="passport" type="password" placeholder="请输入密码" class="acount-password reg-pwd">
									</div>
									<div class="same-error lo-error2" style="display: none;" >
										<img src="<?php echo IMG?>/index/login_conf.png" /> 
									   <span>请输入正确的验证码</span>
								   </div>
									<a href="<?php echo site_url('user/forgetPwd')?>" class="forgetPassword">忘记密码?</a>
									<button type="button" class="login" onclick="accountLogin()">立即登录</button>
									<div class="register-box">
										<a href="<?php echo site_url('user/register')?>" class="register">还没账号，立即注册</a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer>
			<p>沪ICP备18018256号 上海XXXXX信息科技有限公司</p>
		</footer> 
		
	</body>

</html>