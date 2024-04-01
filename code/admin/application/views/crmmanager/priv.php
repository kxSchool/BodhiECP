<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>集团中台管理系统 | 模块管理</title>
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
			<li class="active">模块管理</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header with-border">
						<a type="button" class="btn btn-success" href="<?php echo site_url('crmmanager/addPriv');?>"><span class="glyphicon glyphicon-plus"></span> 创建模块</a>
					</div><!-- /.box-header -->
					<div class="box-body">
						<table class="table table-bordered">
							<thead>
							<tr>
								<th>ID</th>
								<th>模块</th>
								<th>控制器 </th>
								<th>方法 </th>
								<th>附加参数 </th>
								<th>操作管理</th>
							</tr>
							</thead>
							<tbody>
							<?php if(isset($showpriv) && !empty($showpriv)):?>
							<?php foreach($showpriv as $v):?>
							<tr>
								<td><?php echo $v['privid'];?></td>
								<?php
									$nbsp = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$v['level']);
								?>
								<td> <span><?php echo $nbsp;?><?php echo $v['spacer'];?></span><?php echo $v['name'];?></td>
								<td><?php echo $v['c'];?></td>
								<td><?php echo $v['a'];?></td>
								<td><?php echo $v['data'];?></td>
								<td>
									<a class="btn btn-sm btn-info" href="<?php echo site_url('crmmanager/editPriv');?>?privid=<?php echo $v['privid'];?>">编辑</a>
									<a class="btn btn-sm btn-danger" href="javascript:delPriv(<?php echo $v['privid'];?>);">删除</a>
								</td>
							</tr>
							<?php endforeach;?>
							<?php endif;?>
							</tbody>
						</table>
					</div>
				</div><!-- /.box -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php $this -> load -> view('common/footer'); ?>
<script>
	/**删除节点**/
	function delPriv(privid){
		layer.confirm('确认要删除该条记录吗？', {
			btn: ['确认','取消'] //按钮
		}, function(){
			$.ajax({
				url : '<?php echo site_url('crmmanager/delPriv');?>',
				type : 'post',
				dataType : 'json',
				data : {'privid':privid},
				success:function(data){
					if(data.info == 1){
						location.reload();
					}else{
						layer.alert(data.tip, {icon: 5});
					}
				}
			});
		});
	}
</script>
</body>
</html>