<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>集团中台管理系统 | 操作日志</title>
<?php $this -> load -> view('common/top'); ?>
<script src="<?php echo STATIC_PATH; ?>js/log.js" type="text/javascript"></script>
<script type="text/javascript">
	url_batchDelLog ='<?php echo site_url('log/batchDelLog');?>';
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
		<h1>操作日志管理<small>Operation Log</small></h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
			<li class="active">操作日志</li>
		</ol>
	</section>
	
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header with-border">
						<div class="row">
							<div class="col-sm-6">
								<button type="button" class="btn btn-primary" onclick="batchDelLog(this);" data="<?php echo $log_table;?>"><span class="glyphicon glyphicon-remove"></span> 批量删除</button>
							</div>
							<div class="col-sm-6  text-right">
								<form class="form-inline" action="<?php echo site_url('log/manage');?>" method="post">
									<div class="form-group">
										<label for="log_table">表名：</label>
										<select id="log_table" name="log_table" class="form-control">
											<option value="0">请选择表名</option>
											<?php foreach($tables as $table):?>
											<option value="<?php echo $table['TABLE_NAME'];?>" <?php if($table['TABLE_NAME'] === $log_table):?>selected<?php endif;?>><?php echo $table['TABLE_NAME'];?></option>
											<?php endforeach;?>
										</select>
									</div>
									<div class="form-group">
										<label for="user_id">操作者：</label>
										<select id="user_id" name="user_id" class="form-control">
											<option value="0">请选择操作者</option>
											<?php foreach($managers as $manager):?>
											<option value="<?php echo $manager['id'];?>" <?php if($manager['id'] == $user_id):?>selected<?php endif;?>><?php echo $manager['realname'];?></option>
											<?php endforeach;?>
										</select>
									</div>
									<div class="form-group">
										<input type="hidden" name="dosubmit" value="1" />
										<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> 搜索 </button>
									</div>
								</form>
							</div>
						</div>
						
					</div><!-- /.box-header -->
					<div class="box-body">
						<table class="table table-bordered">
							<tr>
								<th><input type="checkbox" id="checkall"/></th>
								<th>编号ID </th>
								<th>IP地址</th>
								<th>操作者 </th>
								<th>操作记录 </th>
								<th>操作日期 </th>
							</tr>
							<?php if(isset($datas)):?>
							<?php foreach($datas as $k=>$log):?>
							<tr>
								<td><input type="checkbox" name="subcheckbox[]" value="<?php echo $log['id']; ?>"/></td>
								<td><?php echo $log['id']; ?></td>
								<td><?php echo $log['ip']; ?></td>
								<td><?php echo $log['realname']; ?> </td>
								<td><?php echo $log['remark']; ?></td>
								<td><?php echo date('Y-m-d H:i:s', $log['createtime']); ?></td>
							</tr>
							<?php endforeach; ?>
							<?php endif;?>
						</table>
					</div><!-- /.box-body -->
					<div class="box-footer clearfix">
						
						<ul class="pagination pagination-sm no-margin pull-right">
							<?php if(isset($pages)):?>
							<?php echo $pages; ?>
							<?php endif;?>
						</ul>
					</div>
				</div><!-- /.box -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php $this -> load -> view('common/footer'); ?>
</body>
</html>