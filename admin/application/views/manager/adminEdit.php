<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>集团总控管理系统 | 管理员管理</title>
<?php $this -> load -> view('common/top'); ?>
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
		<h1>管理员管理</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
			<li><a href="<?php echo site_url('manager/admin');?>">管理员管理</a></li>
			<li class="active">编辑管理员</li>
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
						<form id="adminForm" class="form-horizontal" method="post" action="<?php echo site_url('manager/saveAdmin');?>">
							<div class="form-group">
								<label for="account" class="col-sm-2 control-label">账号：</label>
								<div class="col-sm-10">
									<input type="hidden" name="id" value="<?php echo $id;?>" />
									<input type="text" class="form-control" name="account" id="account" placeholder="输入登陆账号" value="<?php echo $account;?>" />
								</div>
							</div>
							<div class="form-group">
								<label for="roleid" class="col-sm-2 control-label">所属角色：</label>
								<div class="col-sm-10">
									<select class="form-control" name="roleid" id="roleid">
										<?php if(isset($roles)):?>
											<?php foreach($roles as $v):?>
												<option value="<?php echo $v['roleid'];?>" <?php if($roleid == $v['roleid']):?>selected<?php endif;?>><?php echo $v['rolename'];?></option>
											<?php endforeach;?>
										<?php endif;?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="realname" class="col-sm-2 control-label">真实姓名：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="realname" id="realname" placeholder="输入真实姓名" value="<?php echo $realname;?>" />
								</div>
							</div>
							<div class="form-group">
								<label for="mobile" class="col-sm-2 control-label">手机：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="mobile" id="mobile" placeholder="输入手机号" value="<?php echo $mobile;?>" />
								</div>
							</div>
							<div class="form-group">
								<label for="email" class="col-sm-2 control-label">邮箱：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="email" id="email" placeholder="输入邮箱" value="<?php echo $email;?>" />
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
							<div class="col-sm-offset-2">
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
		/**添加、编辑管理员验证**/
		$('#adminForm').bootstrapValidator({
			message: '此值无效',
			feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				account: {
					group: '.col-sm-10',
					validators: {
						notEmpty: {
							message: '账号不能为空'
						}
					}
				},
				roleid: {
					validators: {
						notEmpty: {
							message: '所属角色不能为空'
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
						notEmpty: {
							message: '邮箱不能为空'
						},
						emailAddress: {
							message: '邮箱格式不正确'
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