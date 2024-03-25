<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>集团中台管理系统 | 编辑职员</title>
	<?php $this -> load -> view('common/top'); ?>
	<script>
		$(function(){
			$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%' // optional
			});
		})
	</script>
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">
	<?php $this -> load -> view('common/header'); ?>
	<!-- Left side column. contains the logo and sidebar -->
	<?php $this -> load -> view('common/left'); ?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>编辑职员</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
				<li><a href="<?php echo site_url('staff/index');?>">职员管理</a></li>
				<li class="active">编辑职员</li>
			</ol>
		</section>
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box">
						<div class="box-header with-border">
						</div><!-- /.box-header -->
						<div class="box-body">
							<form id="membersForm" class="form-horizontal" method="post" action="<?php echo site_url('staff/saveStaff');?>">
                                                                <div class="form-group">
                                                                    <label for="realname" class="col-sm-2 control-label">所属店铺(id)：</label>
                                                                    <div class="col-sm-10">
                                                                            <input type="text" class="form-control" name="realname" id="realname" placeholder="商铺id号" value="" />
                                                                    </div>
                                                                </div>
								<div class="form-group">
									<label for="username" class="col-sm-2 control-label">账号：</label>
									<div class="col-sm-10">
										<input type="hidden" name="userid" value="<?php echo $userid;?>" />
										<input type="text" class="form-control" name="username" id="username" placeholder="输入登陆账号" value="<?php echo $username;?>" />
									</div>
								</div>
                                                                <div class="form-group">
									<label for="password" class="col-sm-2 control-label">密码：</label>
									<div class="col-sm-10">
										<input type="password" class="form-control" name="password" id="password" placeholder="输入密码" value="" />
									</div>
								</div>
								<div class="form-group">
									<label for="confirmpassword" class="col-sm-2 control-label">确认密码：</label>
									<div class="col-sm-10">
										<input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="输入确认密码" value="" />
									</div>
								</div>
								<div class="form-group">
									<label for="realname" class="col-sm-2 control-label">真实名称：</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="realname" id="realname" placeholder="输入真实姓名" value="<?php echo $realname;?>" />
									</div>
								</div>
								<div class="form-group">
									<label for="sex" class="col-sm-2 control-label">性别：</label>
									<div class="col-sm-10">
										<input type="radio" name="sex" value="0" <?php if($sex == 0):?>checked<?php endif;?> /> 保密
										<input type="radio" name="sex" value="1" <?php if($sex == 1):?>checked<?php endif;?> /> 男
										<input type="radio" name="sex" value="2" <?php if($sex == 2):?>checked<?php endif;?> /> 女
									</div>
								</div>
								<div class="form-group">
									<label for="mobile" class="col-sm-2 control-label">手机号：</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="mobile" id="mobile" placeholder="手机号" value="<?php echo $mobile;?>" />
									</div>
								</div>
								<div class="form-group">
									<label for="email" class="col-sm-2 control-label">邮箱：</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="email" id="email" placeholder="输入邮箱" value="<?php echo $email;?>" />
									</div>
								</div>
                                                                <div class="form-group">
                                                                    <label for="qq" class="col-sm-2 control-label">QQ：</label>
                                                                    <div class="col-sm-10">
                                                                            <input type="text" class="form-control" name="qq" id="qq" placeholder="QQ号码" value="<?php echo $qq;?>" />
                                                                    </div>
                                                                </div>
								<div class="col-sm-offset-2">
                                                                        <input type="hidden" name="type" value="1" />
									<button type="submit" class="btn btn-success">保存</button>
								</div>
							</form>
						</div>
					</div><!-- /.box -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</section><!-- /.content -->
	</div><!-- /.content-wrapper -->
	<?php $this -> load -> view('common/footer'); ?>
	<script>
		$(function(){
			/**编辑、编辑会员验证**/
			$('#membersForm').bootstrapValidator({
				message: '此值无效',
				feedbackIcons: {
					valid: 'glyphicon glyphicon-ok',
					invalid: 'glyphicon glyphicon-remove',
					validating: 'glyphicon glyphicon-refresh'
				},
				fields: {
					username: {
						group: '.col-sm-10',
						validators: {
							notEmpty: {
								message: '账号不能为空'
							}
						}
					},
					mobile: {
						group: '.col-sm-10',
						validators: {
							notEmpty: {
								message: '手机号码不能为空'
							},
							regexp: {
								regexp: /^1[2-9]{1}[0-9]{9}$/,
								message: '手机号格式错误'
							}
						}
					},
					email: {
						validators: {
							emailAddress: {
								message: '邮箱格式不正确'
							}
						}
					},
					star: {
						validators: {
							notEmpty: {
								message: '商铺星级不能为空'
							}
						}
					},
					password: {
						validators: {
							identical: {
								field: 'confirmpassword',
								message: '密码和确认密码不一致'
							}
						}
					},
					confirmpassword: {
						validators: {
							identical: {
								field: 'password',
								message: '密码和确认密码不一致'
							}
						}
					},
				}
			});
		})
	</script>
</body>
</html>