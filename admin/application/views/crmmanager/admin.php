<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>集团总控管理系统 | 商户权限</title>
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
		<h1>商户权限</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
			<li class="active">商户权限</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header with-border">
						<a type="button" class="btn btn-success" href="<?php echo site_url('crmmanager/addAdmin');?>"><span class="glyphicon glyphicon-plus"></span> 添加管理员</a>
					</div><!-- /.box-header -->
					<div class="box-body">
						<div class="tables">
							<table class="table table-bordered">
								<thead>
								<tr>
									<th>管理员id</th>
                                                                        <th>所属商铺id</th>
                                                                        <th>店铺名称</th>
									<th>管理员账号 </th>
                                                                        <th>真实名字 </th>
                                                                        <th>联系电话</th>
                                                                        <th>角色名称</th>
									<th>操作管理</th>
								</tr>
								</thead>
								<tbody>
								<?php if(isset($datas) && !empty($datas)):?>
								<?php foreach($datas as $v):?>
								<tr>
									<td><?php echo $v['userid'];?></td>
                                                                        <td><?php echo $v['shopid'];?></td>
                                                                        <td><?php echo $v['shopname'];?></td>
                                                                        <td><?php echo $v['username'];?></td>
                                                                        <td><?php echo $v['realname'];?></td>
                                                                        <td><?php echo $v['mobile'];?></td>
                                                                        <td><?php echo $v['rolename'];?></td>
									<td>
										<a class="btn btn-sm btn-info" href="<?php echo site_url('crmmanager/editAdmin');?>?staffid=<?php echo $v['userid'];?>">编辑</a>
										<a class="btn btn-sm btn-success" href="<?php echo site_url('crmmanager/assignPriv');?>?roleid=<?php echo $v['roleid'];?>">分配权限</a>
										<a class="btn btn-sm btn-danger" href="javascript:delAdmin(<?php echo $v['userid'];?>,<?php echo $v['disabled'];?>)"><?php echo $v['disabled'] ? "解锁":"锁定";?></a>
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
<script>
	/**删除角色**/
	function delAdmin(userid,status){
            var message = '';
                if(status){
                    message = '要解锁管理员吗?';
                }else{
                    message = '要锁定管理员吗';
                }
		layer.confirm(message, {
			btn: ['确认','取消'] //按钮
		}, function(){
			$.ajax({
				url : '<?php echo site_url('crmmanager/delAdmin');?>',
				type : 'post',
				dataType : 'json',
				data : {
                                    'userid' : userid,
                                    'status' : status
                                },
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