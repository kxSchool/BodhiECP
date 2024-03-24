<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>集团总控管理系统 | 角色管理</title>
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
		<h1>角色管理</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
			<li><a href="<?php echo site_url('manager/role');?>">角色管理</a></li>
			<li class="active">编辑角色</li>
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
						<form id="roleForm" class="form-horizontal" method="post" action="<?php echo site_url('manager/saveRole');?>">
							<div class="form-group">
								<label for="rolename" class="col-sm-2 control-label">角色：</label>
								<div class="col-sm-10">
									<input type="hidden" class="form-control" name="roleid" id="roleid" placeholder="角色名" value="<?php echo $roleid;?>" />
									<input type="text" class="form-control" name="rolename" id="rolename" placeholder="角色名" value="<?php echo $rolename;?>" />
								</div>
							</div>
							<div class="form-group">
								<label for="description" class="col-sm-2 control-label">描述：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="description" id="description" placeholder="角色描述" value="<?php echo $description;?>" />
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
		/**添加、编辑管理角色验证**/
		$('#roleForm').bootstrapValidator({
			message: '此值无效',
			feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				rolename: {
					group: '.col-sm-10',
					validators: {
						notEmpty: {
							message: '角色名不能为空'
						}
					}
				}
			}
		});
	})
</script>
</body>
</html>