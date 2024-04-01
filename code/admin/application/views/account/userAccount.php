<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>集团中台管理系统 | 提现管理</title>
<?php $this -> load -> view('common/top'); ?>
	<link rel="stylesheet" href="<?php echo STATIC_PATH; ?>datetimepicker/bootstrap-datetimepicker.min.css" />
	<script src="<?php echo STATIC_PATH; ?>datetimepicker/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="<?php echo STATIC_PATH; ?>datetimepicker/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
	<script>
		$(function(){
			$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%' // optional
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
		<h1>提现管理</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
			<li class="active">提现管理</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header with-border">
						<div class="pull-right">
							<form id="searchFeedbackForm" class="form-inline" method="post" action="<?php echo site_url('account/userAccount');?>">
								<div class="form-group">
									<select class="form-control" name="payment" id="payment">
										<option value="0" <?php if(isset($payment) && $payment == 0):?>selected="selected"<?php endif;?>>==全部==</option>
										<option value="1" <?php if(isset($payment) && $payment == 1):?>selected="selected"<?php endif;?>>==申请提现至支付宝==</option>
										<option value="2" <?php if(isset($payment) && $payment == 2):?>selected="selected"<?php endif;?>>==申请提现至银行卡==</option>
									</select>
								</div>
								<div class="form-group">
									<select class="form-control" name="is_paid" id="is_paid">
										<option value="2" <?php if(isset($is_paid) && $is_paid == 2):?>selected="selected"<?php endif;?>>==全部==</option>
										<option value="1" <?php if(isset($is_paid) && $is_paid == 1):?>selected="selected"<?php endif;?>>==已处理==</option>
										<option value="0" <?php if(isset($is_paid) && $is_paid == 0):?>selected="selected"<?php endif;?>>==未处理==</option>
									</select>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="start_time" id="start_time" placeholder="开始时间" value="<?php if(isset($start_time)):?><?php echo $start_time;?><?php endif;?>" />
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="end_time" id="end_time" placeholder="结束时间" value="<?php if(isset($end_time)):?><?php echo $end_time;?><?php endif;?>" />
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-info" name="dosearch" value="1">搜索</button>
								</div>
								<div class="form-group">
									<a class="btn btn-success" name="exportExcel" id="exportExcel">导出Excel表格</a>
								</div>
							</form>
						</div>
					</div><!-- /.box-header -->
					<div class="box-body">
						<div class="tables">
							<table class="table table-bordered">
								<thead>
								<tr>
									<th><input type="checkbox" id="checkall"/></th>
									<th>ID</th>
									<th>用户 </th>
									<th>提现金额 </th>
									<th>提现至： </th>
									<th>申请时间 </th>
									<th>状态 </th>
									<th>操作</th>
								</tr>
								</thead>
								<tbody>
								<?php if(isset($datas) && !empty($datas)):?>
								<?php foreach($datas as $v):?>
								<tr>
									<td><?php if($v['is_paid'] == 0):?><input type="checkbox" name="subcheckbox[]" value="<?php echo $v['id'];?>"/><?php endif;?></td>
									<td><?php echo $v['id'];?></td>
									<td><?php echo $v['username'];?></td>
									<td><?php echo $v['amount'];?></td>
									<td><?php echo $v['payment'].':<br>'.$v['account'];?></td>
									<td><?php echo date('Y-m-d',$v['add_time']);?></td>
									<td>
										<?php if($v['is_paid'] == 0):?>
											未处理
										<?php elseif($v['is_paid'] == 1):?>
											已处理
										<?php endif;?>
									</td>
									<td>
										<?php if($v['is_paid'] == 0):?>
										<a class="btn btn-sm btn-info" href="javascript:updateUserAccount(<?php echo $v['id'];?>)">标注提现成功</a>
										<?php endif;?>
										<a class="btn btn-sm btn-success" href="javascript:userAccountDetail(<?php echo $v['id'];?>)">查看详情</a>
									</td>
								</tr>
								<?php endforeach;?>
								<?php endif;?>
								<tr>
									<td>
										<input type="checkbox" id="belowcheckall" />
									</td>
									<td colspan="7">
										<div class="btn-group dropup">
											<button type="button" class="btn btn-default">批量处理</button>
											<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<span class="caret"></span>
												<span class="sr-only">Toggle Dropdown</span>
											</button>
											<ul class="dropdown-menu">
												<li><a href="javascript:batchUpdateUserAccount();">已汇款</a></li>
											</ul>
										</div>
									</td>
								</tr>
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
<div id="pup" style="display:none;">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-body">
						<table class="table table-bordered">
							<tbody>
							<tr>
								<th>申请人：</th>
								<td id="username"></td>
								<th>提现金额：</th>
								<td id="amount"></td>
							</tr>
							<tr>
								<th>真实姓名：</th>
								<td id="realname"></td>
								<th>申请时间：</th>
								<td id="add_time"></td>
							</tr>
							<tr>
								<th>申请方式：</th>
								<td id="payment1"></td>
								<th>提现账号：</th>
								<td id="account"></td>
							</tr>
							</tbody>
						</table>
					</div><!-- /.box-body -->
				</div>
			</div>
		</div>
	</section>
</div>
<?php $this -> load -> view('common/footer'); ?>
	<script>
		$(function(){
			//导出提现申请excel
			$("#exportExcel").click(function(){
				var postData = {};
				var payment = $("#payment").val();
				if(payment.length > 0){
					postData.payment = payment;
				}
				var is_paid = $("#is_paid").val();
				if(is_paid.length > 0){
					postData.is_paid = is_paid;
				}
				var start_time = $("#start_time").val();
				if(start_time.length > 0){
					postData.start_time = start_time;
				}
				var end_time = $("#end_time").val();
				if(end_time.length > 0){
					postData.end_time = end_time;
				}
				var postArray = new Array();
				var i = 0;
				$.each(postData,function(k,v){
					postArray[i] = k + '=' + v;
					i++;
				})
				var postStr = postArray.join("&");
				var openUrl = '<?php echo site_url('account/exportAccountExcel')?>'+'?'+postStr;
				window.open(openUrl,'_blank')
			});
			$("#start_time").datetimepicker({
				language:  'zh-CN',
				weekStart: 1,
				todayBtn: 1,
				autoclose: 1,
				todayHighlight: 1,
				startView: 2,
				forceParse: 0,
				showMeridian: 1
			});
			$("#end_time").datetimepicker({
				language:  'zh-CN',
				weekStart: 1,
				todayBtn: 1,
				autoclose: 1,
				todayHighlight: 1,
				startView: 2,
				forceParse: 0,
				showMeridian: 1
			});
		})
		var subcheckboxs = $('input[name="subcheckbox[]"]');
		function batchUpdateUserAccount(){
			// 都哪些被勾选啦
			var checked_ids_arr = [];
			var checked_ids = ''
			for (i = 0; i < subcheckboxs.length; i++) {
				if ($(subcheckboxs[i]).prop('checked')) {
					var id = $(subcheckboxs[i]).val();
					checked_ids_arr.push(id);
				}
			}
			if(checked_ids_arr.length > 0){
				layer.confirm('你确定要批量该操作吗？', {
					btn: ['确认','取消'] //按钮
				}, function(){
					checked_ids = checked_ids_arr.join(',');
					$.ajax({
						url : "<?php echo site_url('account/batchUpdateUserAccount');?>",
						type : 'post',
						dataType : 'json',
						data : {'ids':checked_ids},
						success:function(data){
							if(data.info == 1){
								location.reload();
							}else{
								layer.alert(data.tip, {icon: 5});
							}
						}
					});
				}, function(index){
					layer.close(index);
				});
			}else{
				layer.alert('没有选中任何选中的记录！', {icon: 5});
			}
		}
		//标注为提现成功
		function updateUserAccount(id){
			$.ajax({
				url : "<?php echo site_url('account/batchUpdateUserAccount');?>",
				type : 'post',
				dataType : 'json',
				data : {'ids':id},
				success:function(data){
					if(data.info == 1){
						location.reload();
					}else{
						layer.alert(data.tip, {icon: 5});
					}
				}
			});
		}
		//申请提现详情
		function userAccountDetail(id){
			$.ajax({
				url : "<?php echo site_url('account/userAccountDetail');?>",
				type : 'post',
				dataType : 'json',
				data : {'id':id},
				success:function(data){
					if(data.info == 1){
						$("#username").text(data.data.username);
						$("#amount").text(data.data.amount);
						$("#realname").text(data.data.realname);
						$("#payment1").text(data.data.payment);
						$("#add_time").text(data.data.add_time);
						$("#account").text(data.data.account);
						layer.open({
							title: '提现申请',
							type: 1,
							skin: 'layui-layer-demo', //样式类名
							shift: 2,
							area: ['600px', '300px'],
							shadeClose: true, //开启遮罩关闭
							content: $("#pup").show()
						});
					}else{
						layer.alert(data.tip, {icon: 5});
					}
				}
			});
		}
	</script>
</body>
</html>