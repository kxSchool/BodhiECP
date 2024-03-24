<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>集团总控管理系统 | 资产明细</title>
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
		<h1>资产明细</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
			<li class="active">资产明细</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header with-border">
						<div class="pull-right">
							<form id="searchFeedbackForm" class="form-inline" method="post" action="<?php echo site_url('account/accountLog');?>">
								<div class="form-group">
									<select class="form-control" name="inOut" id="inOut">
										<option value="0" <?php if(isset($inOut) && $inOut == 0):?>selected="selected"<?php endif;?>>==全部==</option>
										<option value="1" <?php if(isset($inOut) && $inOut == 1):?>selected="selected"<?php endif;?>>==收入==</option>
										<option value="2" <?php if(isset($inOut) && $inOut == 2):?>selected="selected"<?php endif;?>>==支出==</option>
									</select>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="user_id" id="user_id" placeholder="输入搜索用户ID..." value="<?php if(isset($user_id) && !empty($user_id)):?><?php echo $user_id;?><?php endif;?>" />
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-info" name="dosearch" value="1">搜索</button>
								</div>
							</form>
						</div>
					</div><!-- /.box-header -->
					<div class="box-body">
						<div class="tables">
							<table class="table table-bordered">
								<thead>
								<tr>
									<th>ID</th>
									<th>用户 </th>
									<th>流水号 </th>
									<th>名称|备注 </th>
									<th>收入 </th>
									<th>支出 </th>
									<th>状态 </th>
									<th>变更时间 </th>
								</tr>
								</thead>
								<tbody>
								<?php if(isset($datas) && !empty($datas)):?>
								<?php foreach($datas as $v):?>
								<tr>
									<td><?php echo $v['log_id'];?></td>
									<td><?php echo $v['username'];?></td>
									<td><?php echo $v['log_sn'];?></td>
									<td><?php echo $v['change_desc'];?></td>
									<td><span class="text-red"><?php if($v['user_money'] > 0):?><?php echo $v['user_money'];?><?php endif;?></span></td>
									<td><span class="text-green"><?php if($v['user_money'] <= 0):?><?php echo $v['user_money'];?><?php endif;?></span></td>
									<td><?php echo $v['status_desc'];?></td>
									<td><?php echo date('Y-m-d',$v['change_time']);?></td>
								</tr>
								<?php endforeach;?>
								<?php endif;?>
								</tbody>
							</table>
						</div>
					</div><!-- /.box-body -->
					<?php if(isset($pages)):?>
					<div class="box-footer clearfix">
						<ul class="pagination pagination-sm no-margin pull-right">
							<?php echo $pages;?>
						</ul>
					</div>
					<?php endif;?>
				</div><!-- /.box -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php $this -> load -> view('common/footer'); ?>
</body>
</html>