<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>找回密码 - XXXXX</title>
    <link rel="stylesheet" href="<?php echo CSS;?>/user/forgetpass.css">
    <script type="text/javascript" src="<?php echo JS;?>/common/reset.js"></script>
    <script type="text/javascript" src="<?php echo JS;?>/common/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo JS;?>/login/forgetpass.js"></script>

</head>

<body>

    <div class="layout">
        <div class="part-1 ">
            <div class="forget-tip">
                <div class="panel">
                    为了验证您的身份，请填写注册时使用的手机号。我们将以短信的方式向这个手机发送验证码。
                </div>
            </div>
            <form id="phone" onsubmit="return false;">
                <div class="forget-list">
                    <ul>
                        <li>
                            <div class="reg-single">
                                <!-- <span class="reg-single-text">手机号</span> -->
                                <input type="tel" id="phone-mobile" name="mobile" value="" placeholder="请输入手机号" class="reg-single-input">
                            </div>
                        </li>

                        <li>
                            <div class="reg-single">
                                <input type="text" id="verifycode" value="" placeholder="请输入验证码" class="reg-single-input ver-code">
                                <!-- <button class="reg-single-btn" id="getcode" data-mobile="#phone-mobile" data-imgcode="#phone-code" onclick="sendMessage()">获取验证码</button> -->
                                <input id="getcode" class="reg-single-btn" type="button" value="发送验证码" />
                            </div>
                        </li>
                    </ul>
                </div>
                <button type="button" id="btn-step1" class="next">下一步</button>
            </form>
        </div>

        <div class="part-2 hidden">
            <form id="setNew" onsubmit="return false;">
                <div class="forget-list">
                    <ul>
                        <li>
                            <div class="reg-single">

                                <input type="password" id="password" name="password" value="" placeholder="请输入新密码，6-18位数字或字母" class="reg-single-input">
                            </div>
                        </li>
                        <li>
                            <div class="reg-single">

                                <input type="password" id="newpassword" name="newpassword" value="" placeholder="再次确认密码" class="reg-single-input">
                            </div>
                        </li>
                    </ul>
                </div>
                <button type="button" id="btn-step2" class="next">完成</button>
            </form>
        </div>

        <div class="part-3 hidden">
            <h2>修改成功</h2>
            <button type="submit" class="next" onclick="location.href='login.html';">去登录</button>
        </div>

    </div>
</body>

<script>

    $('#getcode').on('click',function () {


        //手机号正则
        var phoneReg = /(^1[3|4|5|7|8]\d{9}$)|(^09\d{8}$)/;
        //电话
        var phoneNum = $('#phone-mobile').val();
        if (!phoneReg.test(phoneNum)) {
            alert('请输入有效的手机号码！');
            return false;
        }else{
            $.ajax({
                type : 'POST',
                data : 'phone='+phoneNum+'&type=2',
                url  : "<?php echo site_url('base/ajaxSendSms')?>",
                success : function (res) {
                    // console.log(res);
                    sendMessage();
                }
            });
        }

    });


    $('#btn-step1').click(function () {

        var mobile = $('#phone-mobile').val();
        var code = $('#verifycode').val();

        $.ajax({

            type : 'POST',
            dataType : 'JSON',
            url : "<?php echo  site_url('base/ajaxForgetPwd')?>",
            data : "mobile="+mobile+'&code='+code,
            success : function (res) {

                if(res.code === 0){

                    $(".part-1").addClass('hidden');
                    $(".part-2").removeClass('hidden');
                    $("#password").val("");
                    $("#newpassword").val("");
                }else{
                    window.alert(res.mes);
                }
            }
        });

    });
    $('#btn-step2').click(function () {

        if ($("#password").val() == '') {
           alert('请输入密码');
           return false;
        }
        if ($("#newpassword").val() == '') {
           alert('请输入确认密码');
           return false;
        }
        if ($("#password").val() != $("#newpassword").val()) {
           alert('两次输入的密码不一致');
           return false;
        }

        var pwd = $('#password').val();

        $.ajax({

            type : 'POST',
            dataType : 'JSON',
            url : "<?php echo  site_url('base/ajaxChangePwd')?>",
            data : 'pwd='+pwd,
            success : function (res) {
                console.log(res);
                if(res.code === 0){
                    window.location = res.url;
                }else{
                    window.alert(res.mes);
                }
            }
        });
    });

</script>

</html>