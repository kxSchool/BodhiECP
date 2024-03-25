<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>集团中台管理系统 | 添加商铺</title>
<?php $this -> load -> view('common/top'); ?>
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
		<h1>添加商铺</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
			<li><a href="<?php echo site_url('members/index');?>?type=<?php echo $type;?>">用户管理</a></li>
			<li class="active">添加商铺</li>
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
						<form id="membersForm" class="form-horizontal" method="post">
							<div class="form-group">
								<label for="username" class="col-sm-2 control-label">账号：</label>
								<div class="col-sm-10">
									<input type="hidden" name="type" id="type" value="<?php echo $type;?>" />
									<input type="text" class="form-control" name="username" id="username" placeholder="输入登陆账号" value="" />
								</div>
							</div>
							<div class="form-group">
								<label for="realname" class="col-sm-2 control-label">商铺名称：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="realname" id="realname" placeholder="输入商铺名称" value="" />
								</div>
							</div>
							<div class="form-group">
								<label for="sex" class="col-sm-2 control-label">性别：</label>
								<div class="col-sm-10">
									<input type="radio" name="sex" value="0" checked  class="sex"/> 保密
									<input type="radio" name="sex" value="1" class="sex"/> 男
									<input type="radio" name="sex" value="2" class="sex"/> 女
								</div>
							</div>
							<div class="form-group">
								<label for="mobile" class="col-sm-2 control-label">登录手机：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="mobile" id="mobile" placeholder="输入手机号" value="" />
								</div>
							</div>

							<div class="form-group">
								<label for="email" class="col-sm-2 control-label">邮箱：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="email" id="email" placeholder="输入邮箱" value="" />
								</div>
							</div>

							<div class= "form-group">
								<label for="star" class="col-sm-2 control-label">商铺星级：</label>
								<div class= "col-sm-10" id="selector">
									<select class="form-control" name="star" id="star">
										<option value=""> 请选择商铺星级</option >
										<!--店铺星级-->
										<?php if(isset($allstars) && !empty($allstars)):?>
											<?php foreach($allstars as $v):?>
												<option value="<?php echo $v['starid'];?>"><?php echo $v['starname'];?></option >
											<?php endforeach;?>
										<?php endif;?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="sort" class="col-sm-2 control-label">权重：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="sort" id="sort" placeholder="请填写店铺权重，不填则默认为0" value="" />
								</div>
							</div>
							<div class="form-group">
								<label for="password" class="col-sm-2 control-label">密码：</label>
								<div class="col-sm-10">
									<input type="password" class="form-control" name="password" id="password" placeholder="输入密码" value="" />
								</div>
							</div>
							<div class="form-group">
								<label for="confirmpassword" class="col-sm-2 control-label">确认密码：</label>
								<div class="col-sm-10">
									<input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="输入确认密码" value="" />
								</div>
							</div>
							<div class="col-sm-offset-2">
								<button type="button" class="btn btn-success submitbtn">保存</button>
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
		/**添加、编辑会员验证**/
//		$('#membersForm').bootstrapValidator({
//			message: '此值无效',
//			feedbackIcons: {
//				valid: 'glyphicon glyphicon-ok',
//				invalid: 'glyphicon glyphicon-remove',
//				validating: 'glyphicon glyphicon-refresh'
//			},
//			fields: {
//				username: {
//					group: '.col-sm-10',
//					validators: {
//						notEmpty: {
//							message: '账号不能为空'
//						}
//					}
//				},
//				mobile: {
//					group: '.col-sm-10',
//					validators: {
//						notEmpty: {
//							message: '手机号码不能为空'
//						},
//						regexp: {
//							regexp: /^1[2-9]{1}[0-9]{9}$/,
//							message: '手机号格式错误'
//						}
//					}
//				},
//				star: {
//					validators: {
//						notEmpty: {
//							message: '确认密码不能为空'
//						}
//					}
//				},
//				password: {
//					validators: {
//						notEmpty: {
//							message: '密码不能为空'
//						},
//						identical: {
//							field: 'confirmpassword',
//							message: '密码和确认密码不一致'
//						}
//					}
//				},
//				confirmpassword: {
//					validators: {
//						notEmpty: {
//							message: '确认密码不能为空'
//						},
//						identical: {
//							field: 'password',
//							message: '密码和确认密码不一致'
//						}
//					}
//				},
//			}
//		});

		//		//ajax表单提交
		$(".submitbtn").click(function(){
			var username = $("#username").val();
			var type = $("#type").val();
			var realname = $("#realname").val();
			var sex = $("input[type='radio']:checked").val();
			var mobile = $("#mobile").val();
			var email = $("#email").val();
			var star = $("#star").val();
			var sort = $("#sort").val();
			var password = $("#password").val();
			$.ajax({
				type: "post",
				url: "<?php echo site_url('members/saveStores');?>",
				dataType : 'json',
				data : {
					'username':username,
					'realname':realname,
					'sex':sex,
					'mobile':mobile,
					'email':email,
					'star':star,
					'type':type,
					'sort':sort,
					'password':password
				},
				success:function(data){
					if(data.info == 1){
						window.location.href = "<?php echo site_url('members/index');?>?type=2";
					}else{
						layer.alert(data.tip);
					}
				}
			});
	});
});
</script>
</body>
</html>