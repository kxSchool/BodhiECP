<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>集团总控管理系统 | 促销卡券</title>
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
			<h1>促销卡券</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
				<li class="active">促销卡券</li>
			</ol>
		</section>
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box">
						<div class="box-header with-border">
							<a type="button" class="btn btn-success" href="<?php echo site_url('promotion/create');?>"><span class="glyphicon glyphicon-plus"></span> 生成促销</a>
						</div><!-- /.box-header -->
						<div class="box-body">
							<div class="tables">
								<table class="table table-bordered">
									<thead>
									<tr>
										<th>ID</th>
										<th>卡券标题 </th>
										<th>卡券金额 </th>
										<th>有效期开始日期</th>
										<th>有效期结束日期 </th>
										<th>优惠并用</th>
										<th>生成方式 </th>
										<th>操作管理</th>
									</tr>
									</thead>
									<tbody>
									<?php if(isset($datas) && !empty($datas)):?>
										<?php foreach($datas as $v):?>
											<tr>
												<td><?php echo $v['type_id'];?></td>
												<td><?php echo $v['type_name'];?></td>
												<td><?php echo $v['type_money'];?></td>
												<td><?php echo date('Y-m-d H:i:s',$v['use_start_date']);?></td>
												<td><?php echo date('Y-m-d H:i:s',$v['use_end_date']);?></td>
												<td><?php echo $v['use_type_name'];?></td>
												<td><?php echo $v['build_action_name'];?></td>
												<td>
													<a class="btn btn-sm btn-info" href="<?php echo site_url('promotion/editPromotion');?>?type_id=<?php echo $v['type_id'];?>">编辑</a>
												</td>
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