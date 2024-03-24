<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>集团总控管理系统 | 模块管理</title>
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
		<h1>模块管理</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
			<li><a href="<?php echo site_url('manager/priv');?>">模块管理</a></li>
			<li class="active">创建模块</li>
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
						<form id="privForm" class="form-horizontal" method="post" action="<?php echo site_url('crmmanager/savePriv');?>">
							<div class="form-group">
								<label for="parentid" class="col-sm-2 control-label">上级模块：</label>
								<div class="col-sm-10">
									<select class="form-control" name="parentid" id="parentid">
										<option value="0">==创建一级模块==</option>
										<?php if(isset($privs)):?>
										<?php foreach($privs as $v):?>
										<?php
												$nbsp = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$v['level']);
										?>
										<option value="<?php echo $v['privid'];?>"><?php echo $nbsp;?><?php echo $v['spacer'].$v['name'];?></option>
										<?php endforeach;?>
										<?php endif;?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="col-sm-2 control-label">模块名：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="name" id="name" placeholder="输入模块名" value="" />
								</div>
							</div>
							<div class="form-group">
								<label for="c" class="col-sm-2 control-label">控制器：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="c" id="c" placeholder="输入控制器" value="" />
								</div>
							</div>
							<div class="form-group">
								<label for="a" class="col-sm-2 control-label">方法：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="a" id="a" placeholder="输入方法" value="" />
								</div>
							</div>
							<div class="form-group">
								<label for="data" class="col-sm-2 control-label">附加参数：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="data" id="data" placeholder="输入附加参数" value="" />
								</div>
							</div>
							<div class="form-group">
								<label for="style" class="col-sm-2 control-label">样式class：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="style" id="style" placeholder="输入样式class" value="" />
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
		/**添加、编辑权限节点验证**/
		$('#privForm').bootstrapValidator({
			message: '此值无效',
			feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				parentid: {
					group: '.col-sm-10',
					validators: {
						notEmpty: {
							message: '上级模块未选择'
						}
					}
				},
				name: {
					group: '.col-sm-10',
					validators: {
						notEmpty: {
							message: '模块名不能为空'
						}
					}
				}
			}
		});
	})
</script>
</body>
</html>