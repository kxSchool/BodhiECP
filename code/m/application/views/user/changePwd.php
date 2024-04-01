<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, minimum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>修改密码 - XXXXX</title>
    <link rel="stylesheet" href="<?php echo CSS?>/user/verifyPhone.css">
    <script type="text/javascript" src="<?php echo JS?>/common/reset.js"></script>
    <script type="text/javascript" src="<?php echo JS?>/common/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo JS?>/login/forgetpass.js"></script>

</head>

<body>
    <div class="layout">
        
            <form id="password" onsubmit="return false;">
                <div class="forget-list">
                    <ul>
                        <li>
                            <div class="reg-single">
                                <input type="text" id="code" name="verifycode" value="" placeholder="请输入验证码" class="reg-single-input ver-code">

                                <input type="hidden" id="mobile" value="<?php echo $mobile?>">

                                <input   class="reg-single-btn getcode" type="button" value="发送验证码" onclick="getCode()" />
                            </div>
                        </li>
                        <li>
                            <div class="reg-single">
                                <input type="password" id="new_pwd" name="mobile" value="" placeholder="请输入新密码" class="reg-single-input">
                            </div>
                        </li>
                    </ul>
                </div>
                <a href="javascript:;" onclick="resetPwd()" class="over">重置密码</a>
            </form>
    </div>
</body>
<script>
   
    //发送验证码
    var count = 60; //间隔函数，1秒执行
    var curCount;//当前剩余秒数 

    function sendMessage() {
        curCount = count;
        //设置button效果，开始计时 
        $(".getcode").attr("disabled", "true");
        $(".getcode").val(curCount + "秒后可重发");
        InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次 
        //请求后台发送验证码 TODO 
    }
    //timer处理函数 
    function SetRemainTime() {
        if (curCount == 0) {
            window.clearInterval(InterValObj);//停止计时器 
            $(".getcode").removeAttr("disabled");//启用按钮 
            $(".getcode").val("重新发送验证码");
        }
        else {
            curCount--;
            $(".getcode").val(curCount + "秒后可重新发送");
        }
    }

    //发送验证码
    function getCode() {
        //手机号正则
        var phoneReg = /(^1[3|4|5|7|8]\d{9}$)|(^09\d{8}$)/;

        var phoneNum = $('#mobile').val();

        if (!phoneReg.test(phoneNum)) {
            alert('请输入有效的手机号码！');
            return false;
        }else{
            $.ajax({
                type : 'POST',
                data : 'phone='+phoneNum,
                url  : "<?php echo site_url('user/ajaxSendSms')?>",
                success : function () {
                    sendMessage();
                }
            });
        }
    }

    //重置密码
    function resetPwd() {
        var code = $('#code').val();
        var pwd = $('#new_pwd').val();

        //密码正则
        var pwdExp=/^[a-zA-Z0-9]{6,20}$/;

        if(!pwdExp.test(pwd)){
            alert('请输入6-12位密码');
            return false;
        }else{
            $.ajax({
                data : {mobile:$('#mobile').val(),pwd:pwd,code:code},
                type : 'POST',
                dataType : 'JSON',
                url : "<?php echo site_url('user/changePwd')?>",
                success : function(res){
                    if(res.code === 0){
                        alert(res.mes);
                        location.href = res.url;
                    }else{
                        alert(res.mes);
                        history.back(-1);
                    }
                }
            });
        }
    }

</script>

</html>