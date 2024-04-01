<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>集团中台管理系统 | 广告位管理</title>
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
		<h1>广告位管理</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
			<li><a href="<?php echo site_url('ad/space');?>">广告位管理</a></li>
			<li class="active">创建广告位</li>
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
						<form id="spaceForm" class="form-horizontal" method="post" action="<?php echo site_url('ad/saveSpace');?>">
							<div class="form-group">
								<label for="name" class="col-sm-2 control-label">广告位：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="name" id="name" placeholder="广告位名" value="" />
								</div>
							</div>
							<div class="form-group">
								<label for="width" class="col-sm-2 control-label">宽度：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="width" id="width" placeholder="输入宽度,最多保留小数点后一位小数" value="" />
								</div>
							</div>
							<div class="form-group">
								<label for="height" class="col-sm-2 control-label">高度：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="height" id="height" placeholder="输入高度，最多保留小数点后一位小数" value="" />
								</div>
							</div>
							<div class="form-group">
								<label for="description" class="col-sm-2 control-label">描述：</label>
								<div class="col-sm-10">
									<textarea class="form-control" name="description" id="description" placeholder="输入广告位描述"></textarea>
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
		/**添加、编辑广告位验证**/
		$('#spaceForm').bootstrapValidator({
			message: '此值无效',
			feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				name: {
					group: '.col-sm-10',
					validators: {
						notEmpty: {
							message: '广告位名不能为空'
						}
					}
				},
				width: {
					group: '.col-sm-10',
					validators: {
						notEmpty: {
							message: '请输入广告位宽度'
						},
						regexp: {
							regexp: /^(\d+\.\d{1}|\d+)$/,
							message: '数值大小无效'
						},
					}
				},
				height: {
					group: '.col-sm-10',
					validators: {
						notEmpty: {
							message: '请输入广告位高度'
						},
						regexp: {
							regexp: /^(\d+\.\d{1}|\d+)$/,
							message: '数值大小无效'
						},
					}
				}
			}
		});
	})
</script>
</body>
</html>