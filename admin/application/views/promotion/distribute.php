<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>集团中台管理系统 | 推出促销</title>
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
			<h1>推出促销</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
				<li><a href="<?php echo site_url('promotion/index');?>">促销卡券</a></li>
				<li class="active">推出促销</li>
			</ol>
		</section>
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box">
						<div class="box-header with-border">
							<a type="button" class="btn btn-success" href="<?php echo site_url('promotion/index');?>"><span class="glyphicon glyphicon-log-out"></span> 促销卡券</a>
						</div><!-- /.box-header -->
						<div class="box-body">
							<form id="distributeForm" class="form-horizontal" method="post" action="<?php echo site_url('promotion/saveDistribute');?>" onsubmit="return checkForm();">
								<div class="form-group">
									<label for="bonus_type_id" class="col-sm-2 control-label">调用：</label>
									<div class="col-sm-6">
										<select name="bonus_type_id" class="form-control">
											<?php foreach($bonusTypeList as $v):?>
											<option value="<?php echo $v['type_id'];?>"><?php echo $v['type_name'];?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="fasongguize" class="col-sm-2 control-label">发送规则：</label>
									<div class="col-sm-6">
										<select name="fasongguize" id="fasongguize" class="form-control">
											<option value="1">新注册买家即送</option>
											<option value="2">未登录超30天者即送</option>
											<option value="3" selected="selected">指定买家</option>
										</select>
									</div>
								</div>
								<div class="form-group" id="duiyingrenshurow" style="display:none;">
									<label for="duiyingrenshu" class="col-sm-2 control-label">对应人数：</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" name="duiyingrenshu" id="duiyingrenshu" placeholder="对应人数" value="0" disabled="disabled"/>
									</div>
								</div>
								<div class="form-group" id="zhidingyonghurow">
									<label for="zhidingyonghu" class="col-sm-2 control-label">指定用户：</label>
									<div class="col-sm-6">
										<textarea class="form-control" name="zhidingyonghu" id="zhidingyonghu" placeholder="不写内容代表不使用此项，买家id用英文“,”隔开"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="tixing" class="col-sm-2 control-label">需要信息提醒：</label>
									<div class="col-sm-6">
										<input type="radio" name="tixing" value="1" checked="checked"/> 是
										<input type="radio" name="tixing" value="0" /> 否
									</div>
								</div>
								<div class="form-group" id="duanxinxiaoxirow">
									<label for="duanxinxiaoxi" class="col-sm-2 control-label">短信消息：</label>
									<div class="col-sm-6">
										<textarea class="form-control" name="duanxinxiaoxi" id="duanxinxiaoxi" placeholder="不写内容代表不使用此项"></textarea>
									</div>
								</div>
								<div class="form-group" id="zhanneixiaoxirow">
									<label for="zhanneixiaoxi" class="col-sm-2 control-label">站内消息：</label>
									<div class="col-sm-6">
										<textarea class="form-control" name="zhanneixiaoxi" id="zhanneixiaoxi" placeholder="不写内容代表不使用此项"></textarea>
									</div>
								</div>
								<div class="col-sm-offset-2">
									<button type="submit" class="btn btn-success" id="dosubmit">确定推出</button>
								</div>
							</form>
						</div><!-- /.box-body -->
					</div><!-- /.box -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</section><!-- /.content -->
	</div><!-- /.content-wrapper -->
	<?php $this -> load -> view('common/footer'); ?>
	<script>
		$(function(){
			//是否有消息提醒
			$('input[name="tixing"]').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%' // optional
			});
			//发送规则改变时
			$("#fasongguize").change(function(){
				var fasongguize = $(this).val();
				$("#duiyingrenshurow").hide();
				$("#zhidingyonghurow").hide();
				$("#dosubmit").attr("disabled",true) ;
				if(fasongguize == 1){
					layer.alert('该规则是自动发放卡券的无需手动发放', {icon: 5});
				}
				if(fasongguize == 2){
					//超30天未登录过的买家
					$.ajax({
						type: "post",
						url: '<?php echo site_url('promotion/thirtyDaysNoLogin');?>',
						dataType: 'json',
						data: {},
						success: function (data) {
							$("#duiyingrenshurow").show();
							if(data.info == 1){
								$("#duiyingrenshu").val(data.total);
								$("#dosubmit").removeAttr("disabled");
							}else{
								$("#duiyingrenshu").val(0);
							}
						}
					});
				}
				if(fasongguize == 3){
					$("#zhidingyonghurow").show();
					$("#dosubmit").removeAttr("disabled");
				}
			})
			//打开、关闭消息提醒
			$('input[name="tixing"]').on('ifChecked', function(event){
				var buildActionValue = $(this).val();
				if(buildActionValue == 1){
					$("#duanxinxiaoxirow").show();
					$("#zhanneixiaoxirow").show();
				}else if(buildActionValue == 0){
					$("#duanxinxiaoxirow").hide();
					$("#zhanneixiaoxirow").hide();
				}
			});
			//指定用户input得到焦点
			$("#zhidingyonghu").blur(function(){
				$("#dosubmit").removeAttr("disabled");
			});
		})
		function checkForm(){
			if($("#fasongguize").val() == 3){
				var zhidingyonghu = $("#zhidingyonghu").val();
				if(zhidingyonghu.length == 0){
					$("#dosubmit").attr("disabled",true) ;
					layer.alert('你没有填写任何买家id', {icon: 5});
					return false;
				}else{
					return true;
				}
			}else{
				return true;
			}
		}
	</script>
</body>
</html>