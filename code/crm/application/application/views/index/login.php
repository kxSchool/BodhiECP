<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>容易办服务商中心系统 | 客户登陆</title>
<?php $this->load->view('common/top');?>
</head>
<body class="login-page">
<div class="login-box">
	<div class="login-logo">
		<a href="javascript:void(0)"><b>容易办服务商中心</b></a>
	</div><!-- /.login-logo -->
	<div class="login-box-body">
		<form action="" method="post" onsubmit="return checkLoginForm();">
            <div class="form-group has-success" style="display: <?php if(isset($companyId)){echo "none";}  ?>;">
				<input type="text" class="form-control" name="shopid" id="shopid" placeholder="输入店铺id" value="<?php if(isset($companyId)){echo $companyId;}  ?>"/>
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="text" class="form-control" name="account" id="account" placeholder="请输入账号、手机号、邮箱"/>
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" class="form-control" name="password" id="password" placeholder="请输入密码"/>
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback row">
				<div class="col-xs-5">
					<input type="text" class="form-control" name="verify_code" id="verify_code" placeholder="输入验证码"/>
				</div>
				<div class="col-xs-7">
					<?php $codeString = '?code_len=5&font_size=20&width=150&height=45&font_color=&background=&0.45508089289069176&0.2623014806304127';?>
					<img name="verify_code" title="点击刷新验证码" src="<?php echo site_url('index/getVerify').$codeString;?>" onclick="this.src='<?php echo site_url('index/getVerify').$codeString;?>'"/>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<input type="hidden" name="dosubmit" value="1" />
					<button type="submit" class="btn btn-primary btn-block btn-flat">登陆</button>
				</div><!-- /.col -->
			</div>
		</form>
	</div>
</div><!-- /.login-box -->
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