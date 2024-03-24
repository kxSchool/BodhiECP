<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>集团总控管理系统 | 编辑星级</title>
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
			<h1>编辑星级</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
				<li><a href="<?php echo site_url('members/star');?>">星级管理</a></li>
				<li class="active">编辑星级</li>
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
							<form id="starForm" class="form-horizontal" method="post" action="<?php echo site_url('members/saveStar');?>">
								<div class="form-group">
									<label for="starname" class="col-sm-2 control-label">星级名：</label>
									<div class="col-sm-10">
										<input type="hidden" class="form-control" name="starid" id="starid" value="<?php echo $starInfo['starid'];?>" />
										<input type="text" class="form-control" name="starname" id="starname" placeholder="输入星级名" value="<?php echo $starInfo['starname'];?>" />
									</div>
								</div>
								<div class="form-group">
									<label for="low" class="col-sm-2 control-label">低经验值：</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="low" id="low" placeholder="输入低经验值" value="<?php echo $starInfo['low'];?>" />
									</div>
								</div>
								<div class="form-group">
									<label for="high" class="col-sm-2 control-label">高经验值：</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="high" id="high" placeholder="输入高经验值" value="<?php echo $starInfo['high'];?>" />
									</div>
								</div>
								<div class="form-group">
									<label for="price" class="col-sm-2 control-label">对应价格：</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="price" id="price" placeholder="输入对应价格" value="<?php echo $starInfo['price'];?>" />
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
			/**编辑、编辑星级验证**/
			$('#starForm').bootstrapValidator({
				message: '此值无效',
				feedbackIcons: {
					valid: 'glyphicon glyphicon-ok',
					invalid: 'glyphicon glyphicon-remove',
					validating: 'glyphicon glyphicon-refresh'
				},
				fields: {
					starname: {
						group: '.col-sm-10',
						validators: {
							notEmpty: {
								message: '星级名不能为空'
							}
						}
					},
					low: {
						validators: {
							notEmpty: {
								message: '最低经验值不能为空'
							},
							regexp: {
								regexp: /^[1-9]\d*|0$/,
								message: '最低经验值格式错误'
							}
						}
					},
					high: {
						group: '.col-sm-10',
						validators: {
							notEmpty: {
								message: '最高经验值不能为空'
							},
							regexp: {
								regexp: /^[1-9]\d*|0$/,
								message: '最高经验值格式错误'
							}
						}
					},
					price: {
						validators: {
							notEmpty: {
								message: '对应价格不能为空'
							},
							regexp: {
								regexp: /^[1-9]\d*|[1-9]\d*\.\d*|0\.\d*[1-9]\d*|0?\.0+|0$/,
								message: '对应价格格式错误'
							}
						}
					}
				}
			});
		})
	</script>
</body>
</html>