<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="<?php echo CSS?>/common.css" />
		<link rel="stylesheet" href="<?php echo CSS?>/user/forgetPwd.css" />
		<script type="text/javascript" src="<?php echo JS?>/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="<?php echo JS?>/user/forPwd.js"></script>
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

					<a>021-62129799</a>
				</div>
			</div>
		</header>
		<div class="layout">
			<div class="container">
				<div class="forPwd"  >
						<div class="for-main">
							<form method="post" action="">
								<div class="userInput">
									<label>手机号码:</label>
									<input name="passport" type="text" placeholder="请输入手机号码" class="username">
								</div>
								<div class="same-error lo-error1" style="display: none;">
	                                 <img src="<?php echo IMG?>/index/login_conf.png"> 
	                                <span>您输入的手机号码不正确,请重新输入</span>
                        		</div>
                        		<div class="userPw">
                        			<label>验证码:</label>
									<input name="confirmCode" type="text" placeholder="请输入验证码" class="password" id="confirmCode">
									 <input class="getcode reg-single-btn"  type="button" value="获取验证码" onclick="sendMessage()" />
								</div>
								<div class="same-error lo-error2" style="display: none;" >
	                                 <img src="<?php echo IMG?>/index/login_conf.png" /> 
	                                <span>请输入正确的验证码</span>
                        		</div>
                        		<div class="userInput">
										<label>设置密码:</label>
										<input name="passport" type="password" placeholder="请输入密码" class="for-pwd">
								</div>
								<div class="same-error lo-error3" style="display: none;">
	                                 <img src="<?php echo IMG?>/index/login_conf.png"> 
	                                <span>您输入的密码不正确,请重新输入</span>
                        		</div>
                        		<div class="userInput">
										<label>确认密码:</label>
										<input name="passport" type="password" placeholder="请再次输入您的密码" class="for-rePwd">
								</div>
								<div class="same-error lo-error4" style="display: none;">
	                                 <img src="<?php echo IMG?>/index/login_conf.png"> 
	                                <span>您输入的密码不一致,请重新输入</span>
                        		</div>
                        		<button class="forBtn" type="button" onclick="forgetPwdSubmit()">确认修改</button>
							</form>
						</div>	
				</div>
			
				
			</div>
		</div>
		<footer>
			<p>沪ICP备18018256号 上海XXXXX信息科技有限公司</p>
		</footer> 
		
	</body>

</html>