<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>容易办服务商中心系统 | 管理员信息</title>
<?php $this -> load -> view('common/top'); ?>
<link href="<?php echo CRM_STATIC_PATH;?>cropper/css/cropper.min.css" rel="stylesheet">
<link href="<?php echo CRM_STATIC_PATH;?>cropper/css/main.css" rel="stylesheet">
<script src="<?php echo CRM_STATIC_PATH;?>cropper/js/cropper.min.js"></script>
<script src="<?php echo CRM_STATIC_PATH;?>cropper/js/main.js"></script>
<script>
	$(function(){
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%'
		});
		$('input[name=privid]').iCheck('disable');
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
		<h1>管理员信息</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
			<li class="active">管理员信息</li>
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
						<div class="nav-tabs-custom">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#settings" data-toggle="tab" aria-expanded="true">个人资料</a></li>
								
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="settings">
									<div class="row" style="margin-bottom:15px;">
										<label for="account" class="col-sm-2 control-label" style="text-align:right;">头像</label>
										<div class="col-sm-10">
											<div id="crop-avatar">
												<!-- Current avatar -->
												<div class="avatar-view" title="修改头像">
													<img src="<?php echo $adminInfo['avatar'];?>" alt="Avatar">
												</div>
												<!-- Cropping modal -->
												<div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<form class="avatar-form" action="<?php echo site_url('upload/avatar');?>?whoAvatar=admin&shopid=<?php echo $adminInfo['userid'];?>" enctype="multipart/form-data" method="post">
																<div class="modal-header">
																	<button class="close" data-dismiss="modal" type="button">&times;</button>
																	<h4 class="modal-title" id="avatar-modal-label">上传头像</h4>
																</div>
																<div class="modal-body">
																	<div class="avatar-body">
																		<!-- Upload image and data -->
																		<div class="avatar-upload">
																			<input class="avatar-src" name="avatar_src" type="hidden">
																			<input class="avatar-data" name="avatar_data" type="hidden">
																			<input class="avatar-input" id="avatarInput" name="avatar_file" type="file">
																		</div>

																		<!-- Crop and preview -->
																		<div class="row">
																			<div class="col-md-9">
																				<div class="avatar-wrapper"></div>
																			</div>
																			<div class="col-md-3">
																				<div class="avatar-preview preview-lg"></div>
																				<div class="avatar-preview preview-md"></div>
																				<div class="avatar-preview preview-sm"></div>
																			</div>
																		</div>

																		<div class="row avatar-btns">
																			<div class="col-md-9">
																				<div class="btn-group">
																					<button class="btn btn-primary" data-method="rotate" data-option="-90" type="button" title="向左旋转90度">向左旋转</button>
																					<button class="btn btn-primary" data-method="rotate" data-option="-15" type="button">-15°</button>
																					<button class="btn btn-primary" data-method="rotate" data-option="-30" type="button">-30°</button>
																					<button class="btn btn-primary" data-method="rotate" data-option="-45" type="button">-45°</button>
																				</div>
																				<div class="btn-group">
																					<button class="btn btn-primary" data-method="rotate" data-option="90" type="button" title="向右旋转90度">向右旋转</button>
																					<button class="btn btn-primary" data-method="rotate" data-option="15" type="button">15°</button>
																					<button class="btn btn-primary" data-method="rotate" data-option="30" type="button">30°</button>
																					<button class="btn btn-primary" data-method="rotate" data-option="45" type="button">45°</button>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<button class="btn btn-primary btn-block avatar-save" type="submit">确定</button>
																			</div>
																		</div>
																	</div>
																</div>
																 <div class="modal-footer">
                                                                  <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
                                                                </div> 
															</form>
														</div>
													</div>
											</div> <!-- /.modal -->
												<!-- Loading state -->
												<div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
											</div>
										</div>
									</div>
									<form id="adminForm" class="form-horizontal" method="post" action="<?php echo site_url('index/saveProfile');?>">
										<div class="form-group">
											<label for="account" class="col-sm-2 control-label">登陆账号</label>
											<div class="col-sm-10">
												<input type="hidden" name="id" value="<?php echo $adminInfo['userid'];?>" />
                                                                                                <input type="text" class="form-control" id="username" name="username" <?php echo ($adminInfo['username']=='admin') ? 'readonly="true"' :'' ;?> placeholder="输入登陆账号" value="<?php echo $adminInfo['username'];?>">
											</div>
										</div>
										<div class="form-group">
											<label for="realname" class="col-sm-2 control-label">真实姓名：</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" name="realname" id="realname" placeholder="输入真实姓名" value="<?php echo $adminInfo['realname'];?>" />
											</div>
										</div>
										<div class="form-group">
											<label for="mobile" class="col-sm-2 control-label">手机：</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" name="mobile" id="mobile" placeholder="输入手机号" value="<?php echo $adminInfo['mobile'];?>" />
											</div>
										</div>
										<div class="form-group">
											<label for="email" class="col-sm-2 control-label">邮箱：</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" name="email" id="email" placeholder="输入邮箱" value="<?php echo $adminInfo['email'];?>" />
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
                                                                                        <input type="hidden" name="encrypt" id="encrypt" value="<?php echo $adminInfo['encrypt'];?>" />
											<button type="submit" class="btn btn-success">保存</button>
										</div>
									</form>
								</div>
								
							</div>
							<!-- /.tab-content -->
						</div>
					</div>
				<!-- /.nav-tabs-custom -->
				</div>
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
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
				username: {
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