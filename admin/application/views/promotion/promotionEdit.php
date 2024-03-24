<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>集团总控管理系统 | 编辑促销</title>
<?php $this -> load -> view('common/top'); ?>
<link rel="stylesheet" href="<?php echo STATIC_PATH; ?>datetimepicker/bootstrap-datetimepicker.min.css" />
<script src="<?php echo STATIC_PATH; ?>datetimepicker/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="<?php echo STATIC_PATH; ?>datetimepicker/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
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
		<h1>编辑促销</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
			<li><a href="<?php echo site_url('promotion/index');?>">促销卡券</a></li>
			<li class="active">编辑促销</li>
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
						<form id="promotionForm" class="form-horizontal" method="post" action="<?php echo site_url('promotion/savePromotion');?>">
                            <div class="form-group">
                                <label for="send_type" class="col-sm-2 control-label">促销编辑类型：</label>
								<div class="col-sm-10">
									<input type="radio" name="send_type" value="0" <?php if($send_type == 0):?>checked="checked"<?php endif;?> /> 卡券
								</div>
                            </div>
                            <div class="form-group">
								<label for="type_name" class="col-sm-2 control-label">卡券标题：</label>
								<div class="col-sm-6">
									<input type="hidden" name="type_id" id="type_id" value="<?php echo $type_id;?>"/>
									<input type="text" class="form-control" name="type_name" id="type_name" placeholder="输入卡券标题" value="<?php echo $type_name;?>"/>
								</div>
							</div>
                            <div class="form-group">
								<label for="type_money" class="col-sm-2 control-label">卡券金额：</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="type_money" id="type_money" placeholder="输入卡券金额" value="<?php echo $type_money;?>" />
                                </div>
							</div>
                            <div class="form-group">
								<label for="use_start_date" class="col-sm-2 control-label">使用有效期：</label>
								<div class="col-sm-2">
									<input type="text" class="form-control" name="use_start_date" id="use_start_date" placeholder="开始时间" value="<?php echo $use_start_date;?>" />
								</div>
								<div class="col-sm-2 text-center">
									<span class="text-center">至</span>
								</div>
								<div class="col-sm-2">
									<input type="text" class="form-control" name="use_end_date" id="use_end_date" placeholder="结束时间" value="<?php echo $use_end_date;?>" />
								</div>
							</div>
                            <div class="form-group">
								<label for="use_type" class="col-sm-2 control-label">与其它优惠并用：</label>
								<div class="col-sm-6">
									<select class="form-control" name="use_type" id="use_type">
										<option value="0" <?php if($use_type == 0):?>selected="selected"<?php endif;?>>不支持并用</option>
										<option value="1" <?php if($use_type == 1):?>selected="selected"<?php endif;?>>支持并用</option>
									</select>
                                </div>
							</div>
                            <div class="form-group">
								<label for="build_action" class="col-sm-2 control-label">生成方式：</label>
								<div class="col-sm-6">
								   <input type="radio" name="build_action" value="0" <?php if($build_action == 0):?>checked="checked"<?php endif;?>/> 凭同一暗号
                                   <input type="radio" name="build_action" value="1" <?php if($build_action == 1):?>checked="checked"<?php endif;?>/> 凭不同的促销码
                                </div>
							</div>
							<div class="form-group" id="anHao" style="<?php if($build_action == 1):?>display:none;<?php endif;?>">
								<label for="anhao" class="col-sm-2 control-label">暗号：</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="anhao" id="anhao" placeholder="输入暗号" value="<?php if($build_action == 0):?><?php echo $sign;?><?php endif;?>" />
								</div>
							</div>
							<div class="form-group" id="cuXiaoMa" style="<?php if($build_action == 0):?>display:none;<?php endif;?>">
								<label for="num" class="col-sm-2 control-label">促销码位数：</label>
								<div class="col-sm-2">
									<input type="text" class="form-control" name="num" id="num" placeholder="输入促销码位数" value="<?php if($build_action == 1):?><?php echo$num;?><?php endif;?>" />
								</div>
								<div class="col-sm-1 text-center">
									<span class="text-center">以</span>
								</div>
								<div class="col-sm-2">
									<input type="text" class="form-control" name="cuxiaomastart" id="cuxiaomastart" placeholder="输入开头" value="<?php if($build_action == 1):?><?php echo $sign;?><?php endif;?>" />
								</div>
								<div class="col-sm-1 text-center">
									<span class="text-center">开头</span>
								</div>
							</div>
							<div class="col-sm-offset-2">
								<button type="submit" class="btn btn-success">确定生成</button>
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
		//编辑促销码验证
		$('#promotionForm').bootstrapValidator({
			message: '此值无效',
			feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				type_name: {
					group: '.col-sm-6',
					validators: {
						notEmpty: {
							message: '卡券标题不能为空'
						}
					}
				},
				type_money: {
					group: '.col-sm-6',
					validators: {
						notEmpty: {
							message: '卡券金额不能为空'
						}
					}
				},
				use_start_date: {
					group: '.col-sm-2',
					validators: {
						notEmpty: {
							message: '卡券有效期开始时间不能为空'
						}
					}
				},
				use_end_date: {
					group: '.col-sm-2',
					validators: {
						notEmpty: {
							message: '卡券有效期结束不能为空'
						}
					}
				}
			}
		});
		//促销编辑类型
		$('input[name="send_type"]').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' // optional
		});
		//编辑方式
		$('input[name="build_action"]').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' // optional
		});
		//改变编辑方式时
		$('input[name="build_action"]').on('ifChecked', function(event){
			var buildActionValue = $(this).val();
			if(buildActionValue == 0){
				$("#cuXiaoMa").hide();
				$("#anHao").show();
			}else if(buildActionValue == 1){
				$("#anHao").hide();
				$("#cuXiaoMa").show();
			}
		});
		// 使用有效期----开始时间
		$("#use_start_date").datetimepicker({
			language:  'zh-CN',
			weekStart: 1,
			todayBtn: 1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 2,
			forceParse: 0,
			showMeridian: 1
		});
		// 使用有效期-----结束时间
		$("#use_end_date").datetimepicker({
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
</script>
</body>
</html>