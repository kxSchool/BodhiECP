<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>集团中台管理系统 | 广告管理</title>
<?php $this -> load -> view('common/top'); ?>
<link rel="stylesheet" href="<?php echo STATIC_PATH; ?>datetimepicker/bootstrap-datetimepicker.min.css" />
<script src="<?php echo STATIC_PATH; ?>datetimepicker/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="<?php echo STATIC_PATH; ?>datetimepicker/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>

<link rel="stylesheet" href="<?php echo STATIC_PATH; ?>bootstrap-fileinput/css/fileinput.min.css" />
<script src="<?php echo STATIC_PATH; ?>bootstrap-fileinput/js/fileinput.min.js"></script>
<script type="text/javascript" src="<?php echo STATIC_PATH; ?>bootstrap-fileinput/js/fileinput_locale_zh.js" charset="UTF-8"></script>
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
		<h1>添加广告</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
			<li><a href="<?php echo site_url('ad/ad');?>">广告管理</a></li>
			<li class="active">创建广告</li>
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
						<form id="adForm" class="form-horizontal" method="post" action="<?php echo site_url('ad/saveAd')?>">
							<div class="form-group">
								<label for="spaceid" class="col-sm-2 control-label">广告位：</label>
								<div class="col-sm-10">
									<select type="text" class="form-control" name="spaceid" id="spaceid">
										<?php foreach($spaces as $v):?>
										<option value="<?php echo $v['spaceid'];?>"  <?php if($spaceid == $v['spaceid']):?>selected<?php endif;?>><?php echo $v['name'];?></option>
										<?php endforeach;?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="col-sm-2 control-label">广告：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="name" id="name" placeholder="广告名" value="" />
								</div>
							</div>
							<div class="form-group">
								<label for="change_ad_code" class="col-sm-2 control-label">广告类型：</label>
								<div class="col-sm-10">
									<select type="text" class="form-control" name="type" id="change_ad_code">
										<option value="0" >图片</option>
										<option value="1" >代码</option>
										<option value="2" >链接</option>
									</select>
								</div>
							</div>

							<!--超链接链接的页面-->
							<div class="form-group">
								<label for="link_type" class="col-sm-2 control-label">链接类型：</label>
								<div class="col-sm-10">
									<select type="text" class="form-control" name="apptype" id="link_type">
										<option value="0" selected>无链接</option>
										<option value="1">店铺列表页</option>
										<option value="2">店铺详情页</option>
										<option value="3">商品列表页</option>
										<option value="4">商品详情页</option>
										<option value="5">广告页</option>
									</select>
								</div>
							</div>
							<!--图片广告-->
							<div class="form-group" id="ad_image_code">
								<label for="ad_code" class="col-sm-2 control-label">广告图片：</label>
								<div class="col-sm-10">
									<input id="ad_code" type="file" name="userfile" class="file-loading" accept="image/jpeg,image/jpg,image/png">
									<input id="ad_code_0" type="hidden" name="ad_code_0" value="" />
								</div>
							</div>
							<div class="form-group" id="ad_image_link">
								<label for="ad_link" class="col-sm-2 control-label">广告链接：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="ad_link" id="ad_link" placeholder="输入广告链接" value="" />
								</div>
							</div>

							<!--代码广告-->
							<div class="form-group" id="ad_text_code" style="display:none;">
								<label for="ad_code_1" class="col-sm-2 control-label">广告代码：</label>
								<div class="col-sm-10">
									<textarea type="text" class="form-control" name="ad_code_1" id="ad_code_1" placeholder="将代码直接输入到文本框中"></textarea>
								</div>
							</div>

                            <!--链接广告-->
                            <div class="form-group" id="ad_link_code" style="display:none;">
                                <label for="ad_code_1" class="col-sm-2 control-label">广告链接：</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" name="ad_link_1" id="ad_link_1" placeholder="将链接直接输入到文本框中"></textarea>
                                </div>
                            </div>

							<div class="form-group">
								<label for="description" class="col-sm-2 control-label">描述：</label>
								<div class="col-sm-10">
									<textarea class="form-control" name="description" id="description" placeholder="输入广告描述"></textarea>
								</div>
							</div>


                            <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">价格：</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="price" id="price" placeholder="输入价格"></textarea>
                                </div>
                            </div>



							<div class="form-group">
								<label for="description1" class="col-sm-2 control-label">描述1：</label>
								<div class="col-sm-10">
									<textarea class="form-control" name="description1" id="description1" placeholder="输入广告描述"></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="description2" class="col-sm-2 control-label">描述2：</label>
								<div class="col-sm-10">
									<textarea class="form-control" name="description2" id="description2" placeholder="输入广告描述"></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="description3" class="col-sm-2 control-label">描述3：</label>
								<div class="col-sm-10">
									<textarea class="form-control" name="description3" id="description3" placeholder="输入广告描述"></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="description4" class="col-sm-2 control-label">描述4：</label>
								<div class="col-sm-10">
									<textarea class="form-control" name="description4" id="description4" placeholder="输入广告描述"></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="start_time" class="col-sm-2 control-label">上线时间：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="startdate" id="start_time" placeholder="输入上线时间" value="" />
								</div>
							</div>
							<div class="form-group">
								<label for="end_time" class="col-sm-2 control-label">下线时间：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="enddate" id="end_time" placeholder="输入下线时间" value="" />
								</div>
							</div>
							<div class="col-sm-offset-2">
								<button type="submit" class="btn btn-success">保存</button>
							</div>
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
		/**添加、编辑广告验证**/
		$('#adForm').bootstrapValidator({
			message: '此值无效',
			feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				name: {
					group: '.col-sm-10',
					validators: {
						notEmpty: {
							message: '广告名不能为空'
						}
					}
				},
				spaceid: {
					group: '.col-sm-10',
					validators: {
						notEmpty: {
							message: '请选择所属广告位'
						}
					}
				},
				type: {
					group: '.col-sm-10',
					validators: {
						notEmpty: {
							message: '请选择广告所属类型'
						}
					}
				},
				ad_link: {
					group: '.col-sm-10',
					validators: {
						uri: {
							allowLocal: true,
							message: '请输入合法的URl'
						}
					}
				}
			}
		});
		// 开始时间
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
		// 结束时间
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
		//改变广告类型时
		$("#change_ad_code").on('change',function(){
			var optionValue = $(this).val();
			if(optionValue == 0){
				$("#ad_text_code").hide();
				$('#ad_image_code').show();
				$('#ad_image_link').show();
				$('#ad_link_code').hide();
			}else if (optionValue == 1) {
				$('#ad_image_code').hide();
				$('#ad_image_link').hide();
				$("#ad_text_code").show();
				$("#ad_link_code").hide();
			}else{
                $('#ad_image_code').hide();
                $('#ad_image_link').hide();
                $("#ad_text_code").hide();
                $("#ad_link_code").show();
            }
		})
		//上传图片
		$("#ad_code").fileinput({
			language: "zh",
			uploadUrl:"<?php echo site_url('upload/doUpload');?>?type=ad" ,//上传文件路径
			autoReplace: true,
			maxFileCount: 1,
			allowedFileExtensions: ["jpg", "png", "gif","jpeg"]
		});
		$("#ad_code").on("fileuploaded", function (event, data, previewId, index) {
			if(data.response.info == 1){
				var realpath = data.response.data.file_name;
				$("#ad_code_0").val(realpath);
			}
		});
	})
</script>
</body>
</html>