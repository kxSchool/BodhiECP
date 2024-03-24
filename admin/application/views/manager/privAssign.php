<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>集团总控管理系统 | 节点管理</title>
	<?php $this -> load -> view('common/top'); ?>
	<script>
		$(function(){
			$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%'
			});
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
		<h1>节点管理</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
			<li><a href="<?php echo site_url('manager/priv');?>">节点管理</a></li>
			<li class="active">分配节点</li>
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
						<form class="form-horizontal" method="post" action="">
							<table class="table table-bordered">
								<thead>
								<tr>
									<th width="50px">#</th>
									<th>节点</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach($privs as $v):?>
								<tr>
									<td>
										<div class="form-group" style="margin-bottom:0px;">
											<div class="col-sm-12">
												<input type="checkbox" <?php if(isset($nowPriv) && in_array($v['privid'],$nowPriv)):?>checked<?php endif?> class="form-control" name="privid[]" id="node-<?php echo $v['privid'];?>" level="<?php echo $v['level'];?>" value="<?php echo $v['privid'];?>"/>
											</div>
										</div>
									</td>
									<td>
										<div class="form-group" style="margin-bottom:0px;">
											<?php
												$nbsp = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$v['level']);
											?>
											<div class="col-sm-12">
												<span><?php echo $nbsp.$v['spacer'];?></span><?php echo $v['name'];?>
											</div>
										</div>
									</td>
								</tr>
								<?php endforeach;?>
								<tr>
									<td colspan="2"><button type="submit" class="btn btn-success">保存</button></td>
								</tr>
								</tbody>
							</table>
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
		//分配权限
		$('input[name="privid[]"]').on('ifChecked', function(event) {
			var chk = $('input[name="privid[]"]');
			var count = chk.length;
			var num = chk.index(this);
			var level_top = level_bottom = chk.eq(num).attr('level');
			//当前点击的级别
			for (var i = num; i >= 0; i--) {
				//当前点击的上面的check处理
				var le = chk.eq(i).attr('level');
				if (eval(le) < eval(level_top)) {
					chk.eq(i).iCheck('check');
					var level_top = level_top - 1;
					var level_bottom = level_bottom + 1;
				}else if(eval(le) == eval(level_top)){
					break;
				}
			}
			for (var j = num + 1; j < count; j++) {
				//当前点击的下面的check处理
				var le = chk.eq(j).attr('level');
				if (chk.eq(num).iCheck("check")) {
					if (eval(le) > eval(level_bottom)){
						chk.eq(j).iCheck("check");
					}else if (eval(le) == eval(level_bottom)) break;
				}
			}
		});

		$('input[name="privid[]"]').on('ifUnchecked', function(event) {
			var chk = $('input[name="privid[]"]');
			var count = chk.length;
			var num = chk.index(this);
			var level_top = level_bottom = chk.eq(num).attr('level');
			//当前点击的级别
			for (var i = num; i >= 0; i--) {
				//当前点击的上面的check处理
				var le = chk.eq(i).attr('level');
				if (eval(le) > eval(level_top)) {
					chk.eq(i).iCheck('uncheck');
					var level_top = level_top - 1;
					var level_bottom = level_bottom + 1;
				}else if(eval(le) == eval(level_top)){
					break;
				}

			}
			for (var j = num + 1; j < count; j++) {
				//当前点击的下面的check处理
				var le = chk.eq(j).attr('level');
				if (chk.eq(num).iCheck("uncheck")) {
					if (eval(le) > eval(level_bottom)){
						chk.eq(j).iCheck("uncheck");
					}else if (eval(le) == eval(level_bottom)) break;
				}
			}
		});
	})
</script>
</body>
</html>