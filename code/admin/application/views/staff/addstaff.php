<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>集团中台管理系统 | 添加职员</title>
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
		<h1>添加职员</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
			<li><a href="<?php echo site_url('staff/index');?>">职员管理</a></li>
			<li class="active">添加职员</li>
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
                                                <label for="shopid" class="col-sm-2 control-label">所属店铺(id)：</label>
                                                <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="shopid" id="shopid" placeholder="商铺id号" value="<?php echo empty($shopid) ? '': $shopid;?>" />
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="username" class="col-sm-2 control-label">职员账号：</label>
                                                <div class="col-sm-10">
                                                    <input type="hidden" name="userid" id="userid" value="<?php echo empty($userid) ? '': $userid;?>" />
                                                    <input type="text" class="form-control" name="username" id="username" placeholder="登陆账号" value="<?php echo empty($username) ? '': $username;?>" />
                                                </div>
                                        </div>

                                        <div class="form-group">
                                                <label for="password" class="col-sm-2 control-label">密码：</label>
                                                <div class="col-sm-10">
                                                        <input type="password" class="form-control" name="password" id="password" placeholder="登录密码" value="" />
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="confirmpassword" class="col-sm-2 control-label">确认密码：</label>
                                                <div class="col-sm-10">
                                                        <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="确认密码" value="" />
                                                </div>
                                        </div>

                                        <div class="form-group">
                                                <label for="mobile" class="col-sm-2 control-label">手机号：</label>
                                                <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="mobile" id="mobile" placeholder="手机号,也可登录" value="<?php echo empty($mobile) ? '': $mobile;?>" />
                                                </div>
                                        </div>

                                        <div class="form-group">
                                                <label for="realname" class="col-sm-2 control-label">真实名称：</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="realname" id="realname" placeholder="职员姓名" value="<?php echo empty($realname) ? '' : $realname;?>" />
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="sex" class="col-sm-2 control-label">性别：</label>
                                                <div class="col-sm-10">
                                                    <input type="radio" name="sex" value="0" <?php if(isset($sex) && $sex == 0):?>checked<?php endif;?> /> 保密
                                                    <input type="radio" name="sex" value="1" <?php if(isset($sex) && $sex == 1):?>checked<?php endif;?> /> 男
                                                    <input type="radio" name="sex" value="2" <?php if(isset($sex) && $sex == 2):?>checked<?php endif;?> /> 女
                                                </div>
                                        </div>

                                        <div class="form-group">
                                                <label for="email" class="col-sm-2 control-label">邮箱：</label>
                                                <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="email" id="email" placeholder="输入邮箱" value="<?php echo empty($email) ? '': $email;?>" />
                                                </div>
                                        </div>

                                        <div class="form-group">
                                                <label for="qq" class="col-sm-2 control-label">QQ：</label>
                                                <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="qq" id="qq" placeholder="QQ号码" value="<?php echo empty($qq) ? '': $qq;?>" />
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
        
        //ajax表单提交
        $(".submitbtn").click(function(){
            var userid = $("#userid").val();
            var type = 0; // 编辑1,0新加
            if(userid){
                var type = 1;
            }
            var shopid = $("#shopid").val();
            if(isNaN(parseInt(shopid)) || !shopid){
                layer.alert('店铺id值无效!');
                return;
            }
            var username = $("#username").val();
            if(!username){
                layer.alert('登录账号无效!');
                return;
            }
            var password = $("#password").val();
            if(!password && !userid){
                layer.alert('密码无效!')
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
            $.ajax({
                type: "post",
                url: "<?php echo site_url('staff/saveStaff');?>",
                dataType : 'json',
                data : {
                    'userid':userid,
                    'username':username,
                    'realname':realname,
                    'shopid' : shopid,
                    'sex':sex,
                    'mobile':mobile,
                    'email':email,
                    'type':type,
                    'password':password,
                    'qq' : $("#qq").val(),
                },
                success:function(data){
                    if(data.info === 1){
                        window.location.href = "<?php echo site_url('staff/index');?>";
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