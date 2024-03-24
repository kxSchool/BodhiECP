<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=375,initial-scale=1,maximum-scale=1, minimum-scale=1,user-scalable=no">
    <meta name="format-detection" content="telephone=no, email=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>欢迎注册 - XXXXX</title>
    <link rel="stylesheet" href="<?php echo CSS;?>/user/register.css">

    <script type="text/javascript" src="<?php echo JS;?>/common/jquery.min.js"></script>
    <script src="<?php echo JS;?>/common/jquery.validate.js"></script>
    <script src="<?php echo JS;?>/common/messages_zh.js"></script>
    <script type="text/javascript" src="<?php echo JS;?>/common/reset.js"></script>
    <script type="text/javascript" src="<?php echo JS;?>/login/register.js"></script>


</head>

<body>
    <div class="layout">
        <form action="" id="signupForm" class="phone-form" method="post">
            <div class="reg-list">
                <ul class="">
                    <li>
                        <div class="reg-single">
                            <input type="tel" id="mobile" name="mobile" value="" placeholder="请输入手机号" class="reg-single-input">
                        </div>
                    </li>
                    <!-- <li>
                                <div class="reg-single">
                                    <input type="text" id="phone-code" name="forget[code]" value="" placeholder="请输入图片验证码" class="reg-single-input ver-code">
                                     <img src="/captcha.html" alt="captcha" onclick="this.src='/captcha.html?'+Math.random()" class="reg-ver-img">
                                </div>
                            </li> -->
                    <li>
                        <div class="reg-single">
                            <input type="text" id="verifycode" value="" placeholder="请输入验证码" class="reg-single-input ver-code">
                            <input id="getcode" class="reg-single-btn" type="button" value="发送验证码" onclick="sendMessage()" />
                        </div>
                    </li>
                    <li>
                        <div class="reg-single">
                            <input type="password" id="password" name="password" placeholder="请输入6-20位密码" class="reg-single-input" minlength="6" maxlength="20">
                        </div>
                    </li>
                    <li>
                        <div class="reg-single">
                            <input type="password" id="confirm_password" name="confirm_password" placeholder="确认密码" class="reg-single-input" minlength="6" maxlength="20">
                        </div>
                    </li>
                   
                </ul>
            </div>

            <p class="reg-tip">
                注册账号即表示同意并遵守
                <a href="/index/protocol">《XXXXX用户协议》</a>
            </p>

            <button class="reg-submit js-submit submit" type="button" id="regSubmit">快速注册</button>
        </form>
    </div>
    <script>
        $('#getcode').on('click',function () {


            //手机号正则
            var phoneReg = /(^1[3|4|5|7|8]\d{9}$)|(^09\d{8}$)/;
            //电话
            var phoneNum = $('#mobile').val();
            if (!phoneReg.test(phoneNum)) {
                alert('请输入有效的手机号码！');
                return false;
            }else{
                sendMessage();
                $.ajax({
                    type : 'POST',
                    data : 'phone='+phoneNum,
                    url  : "<?php echo site_url('base/ajaxSendSms')?>",
                    success : function (res) {
                        // console.log(res);
                    }
                });
            }

        });
        $('#regSubmit').on('click',function () {

            if (validate()) {
                var data = {
                    phone : $('#mobile').val(),
                    code : $('#verifycode').val(),
                    password : $('#password').val()
                };
                data = JSON.stringify(data);
                $.ajax({

                    type : 'GET',
                    dataType : 'JSON',
                    url : "<?php echo  site_url('base/ajaxRegister')?>" + '?data=' + data,
                    success : function (res) {
                        if(res.code === 0){
                            window.location = res.url;
                        }else{
                            window.alert(res.mes);
                        }
                    }
                });
            }else{
                return false;
            }

        });
    </script>
</body>


</html>