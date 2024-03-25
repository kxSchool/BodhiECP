<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>集团中台管理系统 | 广告管理</title>
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
		<h1><?php if(isset($spacename) && !empty($spacename)){echo $spacename;}else{echo "广告管理";}?></h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
			<li><a href="<?php echo site_url('ad/space');?>"></i>广告位管理</a></li>
			<li class="active">广告管理</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header with-border">
						<a type="button" class="btn btn-success" href="<?php echo site_url("ad/addAd?spaceid={$spaceid}");?>"><span class="glyphicon glyphicon-plus"></span> 创建广告</a>
                        <a class="btn btn-info"  href="javascript:history.go(-1)">返回列表</a>
					</div><!-- /.box-header -->
					<div class="box-body">
						<div class="tables">
							<table class="table table-bordered">
								<thead>
								<tr>
									<th>ID</th>
									<th>广告 </th>
									<th>广告位 </th>
									<th>上线时间 </th>
									<th>下线时间 </th>
									<th>添加时间 </th>
									<th>状态 </th>
									<th>操作管理</th>
								</tr>
								</thead>
								<tbody>
								<?php if(isset($datas) && !empty($datas)):?>
								<?php foreach($datas as $v):?>
								<tr>
									<td><?php echo $v['id'];?></td>
									<td><?php echo $v['name'];?></td>
									<td><?php echo $v['spacename'];?></td>
									<td><?php echo date('Y-m-d H:i:s',$v['startdate']);?></td>
									<td><?php echo date('Y-m-d H:i:s',$v['enddate']);?></td>
									<td><?php echo date('Y-m-d H:i:s',$v['addtime']);?></td>
									<td>
										<input type="checkbox" name="onoffswitchad" adid="<?php echo $v['id'];?>" value="<?php echo $v['disabled'];?>" <?php if($v['disabled'] == 1):?>checked<?php endif;?> />
									</td>
									<td>
										<a class="btn btn-sm btn-info" href="<?php echo site_url('ad/editAd');?>?spaceid=<?php echo $spaceid;?>&id=<?php echo $v['id'];?>">编辑</a>
<!--										<a class="btn btn-sm btn-danger" href="javascript:delAd(--><?php //echo $v['id'];?><!--);">删除</a>-->
									</td>
								</tr>
								<?php endforeach;?>
								<?php else:;?>
									<tr style="text-align:center">
										<td colspan="8"><span style="font-size:40px;">暂无广告</span></td>
									</tr>
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
	/**删除广告**/
	function delAd(id){
		layer.confirm('确认要删除该条记录吗？', {
			btn: ['确认','取消'] //按钮
		}, function(){
			$.ajax({
				url : '<?php echo site_url('ad/delAd');?>',
				type : 'post',
				dataType : 'json',
				data : {'id':id},
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
	//广告关闭开启操作
	$("[name='onoffswitchad']").bootstrapSwitch({
		'onText' : '开',
		'offText' : '关'
	});
	$('input[name="onoffswitchad"]').on('switchChange.bootstrapSwitch', function(event, state) {
		var disabledvalue = this.value;//得到当前的值
		//点击后应该改变的值
		if(disabledvalue == 1){
			disabledvalue = 0;
		}else{
			disabledvalue = 1;
		}
		this.value = disabledvalue;
		var adid = this.getAttribute('adid');
		$.ajax({
			url : "<?php echo site_url('ad/disabledAd');?>",
			type : 'post',
			dataType : 'json',
			data : {'id':adid,'disabled':disabledvalue},
			success:function(data){
				if(data.info != 1){
					layer.alert(data.tip, {icon: 5});
				}
			}
		});
	});
</script>
</body>
</html>