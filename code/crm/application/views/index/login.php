<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>服务商系统 | 客户登陆</title>
<?php $this->load->view('common/top');?>
<link rel="shortcut icon" href="/static/image/favicon.ico" type="image/x-icon">
<link href="/static/css/public.css" rel="stylesheet">
</head>
<body class="login-page">
<div class="layout container">
			<div class="Service-login">
				<form class="login-form" action="" method="post" onsubmit="return checkLoginForm();" autocomplete="off"> 
					<div class="login-title"> 
						<img src="/static/image/Serlogo.png" />
					</div>
					<div class="login-main">
						<div class="shop-name form-group has-success" style="display: <?php if(isset($companyId)){echo "none";}  ?>;">
							<label class="shopIcon"></label>
							<!--<span class="separate"></span>-->
							<input type="text" class="form-control" name="shopid" id="shopid"  placeholder="输入店铺ID" value="<?php if(isset($companyId)){echo $companyId;}  ?>"  style="color: #000;"/>
						</div>
						<div class="login-name form-group has-feedback">
							<label class="userIcon"></label>
							<!--<span class="separate"></span>-->
							<input type="text" class="form-control" name="account" id="account"  placeholder="请输入账号/手机号/邮箱"/>
						</div>
						<div class="login-pwd form-group has-feedback">
							<label class="pwdIcon"></label>
							<!--<span class="separate"></span>-->
							<input type="password" class="form-control" name="password" id="password"  placeholder="请输入密码"/>
						</div>
						<div class="login-code"> 
							<input type="text" class="codeText form-control"   name="verify_code" id="verify_code"   placeholder="请输入验证码"/>
							<a class="codePicture">
                                <?php $codeString = '?code_len=5&font_size=20&width=150&height=45&font_color=&background=&0.45508089289069176&0.2623014806304127';?>
					           <img name="verify_code" title="点击刷新验证码" src="<?php echo site_url('index/getVerify').$codeString;?>" onclick="this.src='<?php echo site_url('index/getVerify').$codeString;?>'"/>
                            </a>
						</div>
                        <input type="hidden" name="dosubmit" value="1" />
						<button type="submit" class="login-sub"  class="btn btn-primary btn-block btn-flat">登录</button>
					</div>
				</form>
			</div>
		</div>
<script>
	/**登陆后台管理**/
	function checkLoginForm(){
            var patrn = /^\+?[1-9][0-9]*$/;
            if(!patrn.test($('#shopid').val())){
                    layer.alert('店铺id值无效!', {icon: 5});
                    return false;
            }
            if($('#account').val() === '' || $('#account').val() == '请输入账号、手机号、邮箱'){
                    layer.alert('请输入账号、手机号、邮箱', {icon: 5});
                    return false;
            }
            if($('#password').val() === '' || $('#password').val() == 'password'){
                    layer.alert('请输入密码', {icon: 5});
                    return false;
            }
            if($('#verify_code').val() === '' || $('#verify_code').val() == '输入验证码'){
                    layer.alert('输入验证码', {icon: 5});
                    return false;
            }
            return true;
	}
</script>
</body>
</html>