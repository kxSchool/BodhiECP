<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, minimum-scale=1,user-scalable=no">
    <meta name="format-detection" content="telephone=no, email=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>欢迎登录 - XXXXX</title>
    <link rel="stylesheet" href="<?php echo CSS;?>/user/login.css">
    <link rel="stylesheet" href="<?php echo CSS;?>/common/layer.css">
    <script src="<?php echo JS;?>/common/reset.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo JS;?>/common/jquery-1.8.3.min.js"> </script>
    <script src="<?php echo JS;?>/login/login.js"></script>
    <style>
        body .demo-class {
            /*background: url(/images/draw/pc_cj_open1.png) no-repeat;*/
            border: none;
        }

        body .demo-class .layui-layer-content {
            padding: 3rem 3rem 0 3rem;
            text-align: center;
            font-size: 1.2rem;
            font-weight: bold;
            height: 1px;
        }

        body .demo-class .layui-layer-btn {
            margin-top: 0rem;
        }

        body .demo-class .layui-layer-btn a {
            background: #ff6a00;
            border: 0px;
        }

        body .demo-class .layui-layer-btn .layui-layer-btn1 {
            background: #afb611;
            border: 0px;
        }
    </style>

</head>

<body>
    <div class="layout">
        <div class="tab js-tab a-1">
            <ul class="clearfix">
                <li>
                    <a href="javascript:;" class="phone active" data-id="1">手机动态码登录</a>
                </li>
                <li>
                    <a href="javascript:;" class="account" data-id="2">账号密码登录</a>
                </li>
            </ul>
        </div>
        <form class="account-form js-form-1" id="phoneForm" action="" method="post" onsubmit="return false;">
            <div class="reg-list">
                <ul>
                    <li>
                        <div class="reg-single">
                            <!-- <span class="reg-single-text">手机号</span> -->
                            <input type="tel" value="" id="mobile" name="mobile" maxlength="11" placeholder="请输入手机号" class="reg-single-input">
                        </div>
                    </li>
                    <!-- <li>
                        <div class="reg-single">
                            <input type="text" id="phone-code" name="code" value="" placeholder="请输入图片验证码" class="reg-single-input ver-code">
                            <img src="/captcha.html" alt="captcha" onclick="this.src='/captcha.html?'+Math.random()" class="reg-ver-img">
                        </div>
                    </li> -->
                    <li>
                        <div class="reg-single">
                            <input type="text" id="verifycode" name="verifycode" value="" placeholder="请输入验证码" class="reg-single-input ver-code" onchange="upperCase(alert(12321))" />
                            <input id="getcode" class="reg-single-btn" type="button" value="发送验证码" onclick="sendMessage()" />
                        </div>
                    </li>
                </ul>
            </div>
            <input type="hidden" name="returnurl" value="">
            <input type="hidden" value="1" name="logintype">
            <button type="button" class="submit js-submit-phone" id="login">登录</button>
            <p class="reg-tip">
                注册账号即表示同意并遵守
                <a href="/index/protocol">《XXXXX用户协议》</a>
            </p>
        </form>
        <form id="accountForm" class="phone-form js-form-2  hidden" action="" method="post" onsubmit="return false;">
            <div class="login-list">
                <ul>
                    <li>
                        <div class="login-single">
                            <input type="tel" name="mobile" id="account-mobile" value="" maxlength="11" class="login-single-input" placeholder="请输入手机号">
                            <!-- <img src="/static/img/mycenter/cancel.png" class="cancel hidden" id="account-mobile-del"> -->
                        </div>
                    </li>
                    <li>
                        <div class="login-single">
                            <input type="password" id="password" name="password" value="" class="login-single-input" placeholder="请输入密码"  >
                            <!-- <img src="/static/img/mycenter/cancel.png" class="cancel" id="account-password-del"> -->
                        </div>
                    </li>
                    <li>
                        <span style="position:absolute;right: 1rem;top: 1.45rem">
                            <img id="showText" onclick="hideShowPsw()" src="<?php echo IMAGES;?>/common/hidePasswd.png">
                        </span>
                    </li>
                </ul>
            </div>
            <input type="hidden" name="returnurl" value="">
            <input type="hidden" value="2" name="logintype">
            <div class="login-regist">
                <a href="<?php echo site_url('user/register')?>" class="login-reg">免费注册</a>
                <a href="<?php echo site_url('base/forgetpwd')?>" class="login-forget">忘记密码?</a>
            </div>
            <button type="button" class="submit js-submit-account" id="account">登录</button>

        </form>
        <!-- <a href="/passport/member/register.html">
            <img src="/static/img/mycenter/login_bottom_rg.png" class="base-reg">
        </a> -->
    </div>
</body>
<script type="text/javascript">
    //判断密码的显示和隐藏
    var demoImg = document.getElementById("showText");
    var demoInput = document.getElementById("password");
    function hideShowPsw() {
        if (demoInput.type == "password") {
            demoInput.type = "text";
            demoImg.src = "<?php echo IMAGES;?>/common/showPasswd.png";
        } else {
            demoInput.type = "password";
            demoImg.src = "<?php echo IMAGES;?>/common/hidePasswd.png";
        }
    }
    // //判断不为空时按钮可点击
    // document.getElementById("account").disabled = true;
    //
    // //密码框失去焦点时判断
    // document.getElementById("password").onblur = function () {
    //     regExp = /^((13[0-9])|(14[5|7])|(15([0-3]|[5-9]))|(18[0,5-9]))\\d{8}$/;
    //     console.log(regExp.test($("#account-mobile").val()))
    //     //手机号不为空密码不为空并且手机号的格式正确
    //         if ((document.getElementById("account-mobile").value == "") || this.value == "") {
    //         document.getElementById("account").disabled = true;
    //         document.getElementById("account").style.backgroundColor='#eaeaea';
    //
    //     } else {
    //         document.getElementById("account").disabled = false;
    //         document.getElementById("account").style.backgroundColor='#de443c';
    //         document.getElementById("account").style.color='#fff';
    //     }
    //
    // }

    $('#getcode').on('click',function () {


        //手机号正则
        var phoneReg = /(^1[3|4|5|7|8]\d{9}$)|(^09\d{8}$)/;
        //电话
        var phoneNum = $('#mobile').val();
        if (!phoneReg.test(phoneNum)) {
            alert('请输入有效的手机号码！');
            return false;
        }else{

            $.ajax({
                type : 'POST',
                data : 'phone='+phoneNum,
                url  : "<?php echo site_url('base/ajaxSendSms')?>",
                success : function (res) {
                    sendMessage();
                }
            });
        }

    });
    $('#login').on('click',function () {

        var data = {
            phone : $('#mobile').val(),
            code : $('#verifycode').val(),
        };
        data = JSON.stringify(data);
        $.ajax({

            type : 'GET',
            dataType : 'JSON',
            url : "<?php echo  site_url('base/ajaxSmsLogin')?>" + '?data=' + data,
            success : function (res) {
                if(res.code === 0){
                    window.location = res.url;
                }else{
                    window.alert(res.mes);
                }
            }
        });

    });
    
    $('#account').on('click',function () {
        var username = $('#account-mobile').val();
        var password = $('#password').val();

        $.ajax({

            type : 'POST',
            dataType : 'JSON',
            url : "<?php echo  site_url('base/ajaxPwdLogin')?>",
            data : "username="+username+'&pwd='+password,
            success : function (res) {
                if(res.code === 0){
                    window.location = res.url;
                }else{
                    window.alert(res.mes);
                }
            }
        });
    });

</script>

<script type="text/javascript" src="<?php echo JS;?>/common/layer.js"></script>

</html>