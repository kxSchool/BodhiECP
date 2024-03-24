<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>集团总控管理系统 | <?php echo empty($type)? '添加':'编辑';?>供货商</title>
<?php $this -> load -> view('common/top'); ?>
    <script>
        $(function(){
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
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
		<h1><?php echo empty($type)? '添加':'编辑';?>供货商</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
			<li><a href="<?php echo site_url('members/index');?>?type=<?php echo $type;?>">供货商管理</a></li>
			<li class="active"><?php echo empty($type)? '添加':'编辑';?>供货商</li>
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
								<label for="username" class="col-sm-2 control-label">供货商账号：</label>
								<div class="col-sm-10">
                                                                    <input type="hidden" name="type" id="type" value="<?php echo empty($type)?0:$type;?>" />
                                                                    <input type="hidden" name="userid" id="userid" value="<?php echo empty($data['userid']) ? '' : $data['userid'];?>" />
                                                                    <input type="text" class="form-control" name="username" id="username" placeholder="输入登陆账号" value="<?php echo empty($data['username']) ? '' : $data['username'];?>" />
								</div>
							</div>
							<div class="form-group">
								<label for="realname" class="col-sm-2 control-label">供货商名称：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="realname" id="realname" placeholder="输入商铺名称" value="<?php echo empty($data['realname']) ? '' : $data['realname'];?>" />
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
							<div class="form-group">
								<label for="sex" class="col-sm-2 control-label">性别：</label>
								<div class="col-sm-10">
									<input type="radio" name="sex" value="0" <?php echo (isset($data['sex']) && $data['sex'] == 0) ? 'checked' : '';?> class="sex"/> 保密
									<input type="radio" name="sex" value="1" <?php echo (isset($data['sex']) && $data['sex'] == 1) ? 'checked' : '';?> class="sex"/> 男
									<input type="radio" name="sex" value="2" <?php echo (isset($data['sex']) && $data['sex'] == 2) ? 'checked' : '';?> class="sex"/> 女
								</div>
							</div>
							<div class="form-group">
								<label for="mobile" class="col-sm-2 control-label">登录手机：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="mobile" id="mobile" placeholder="输入手机号" value="<?php echo empty($data['mobile']) ? '' : $data['mobile'];?>" />
								</div>
							</div>

							<div class="form-group">
								<label for="email" class="col-sm-2 control-label">邮箱：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="email" id="email" placeholder="输入邮箱" value="<?php echo empty($data['email']) ? '' : $data['email'];?>" />
								</div>
							</div>

							<div class= "form-group">
								<label for="sellerid" class="col-sm-2 control-label">所属卖家：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="sellerid" id="sellerid" placeholder="输入所属卖家id" value="<?php echo empty($data['parentid']) ? '' : $data['parentid'];?>" />
								</div>
							</div>
                                                        <div class= "form-group">
								<label for="brandname" class="col-sm-2 control-label">供货商管理品牌：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="brandname" id="brandname" placeholder="多个品牌逗号分隔,如:宝马,一汽大众,上海大众" value="<?php echo empty($data['brandname']) ? '' : $data['brandname'];?>" />
								</div>
							</div>
							<div class="form-group">
								<label for="sort" class="col-sm-2 control-label">权重：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="sort" id="sort" placeholder="供货商权重，默认为0" value="<?php echo empty($data['sort']) ? '' : $data['sort'];?>" />
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
        //		//ajax表单提交
        $(".submitbtn").click(function(){
            var userid = $("#userid").val();
            var type = $("#type").val(); // 编辑1,0新加
            var username = $("#username").val();
            if(!username){
                layer.alert('登录账号无效!');
                return;
            }
            var password = $("#password").val();
            if(!password && !userid){
                layer.alert('密码无效!'+userid)
                return;
            }
            if($("#confirmpassword").val() !== password){
                layer.alert('密码不一致!');
                return;
            }
            var realname = $("#realname").val();
            var sex = $("input[type='radio']:checked").val();
            var mobile = $("#mobile").val();
            var telphonereg = /^(((13[0-9]{1})|(14[0-9]{1})|(17[0-9]{1})|(15[0-3]{1})|(15[5-9]{1})|(18[0-9]{1}))+\d{8})$/;
            if(!telphonereg.test(mobile)){
                layer.alert("电话号码不正确!");
                return;
            }
            var email = $("#email").val();
            var emailreg = /\w+[@]{1}\w+[.]\w+/;
            if(email && !emailreg.test(email)){
                layer.alert("邮箱格式不正确!");
                return;
            }
            var sellerid = $("#sellerid").val();
            var sort = $("#sort").val();
            var brandname = $("#brandname").val();
            if(!brandname){
                layer.alert('品牌信息不能为空!');
                return;
            }
            $.ajax({
                type: "post",
                url: "<?php echo site_url('supplier/save');?>",
                dataType : 'json',
                data : {
                    'username':username,
                    'userid':userid,
                    'realname':realname,
                    'sex':sex,
                    'mobile':mobile,
                    'email':email,
                    'sellerid':sellerid,
                    'brandname':brandname,
                    'type':type,
                    'sort':sort,
                    'password':password
                },
                success:function(data){
                    if(data.info == 1){
                        layer.alert(data.tip);
                        window.location.href = "<?php echo site_url('supplier/index');?>";
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