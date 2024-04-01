<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, minimum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>更换手机号 - XXXXX</title>
    <link rel="stylesheet" href="<?php echo CSS;?>/user/verifyPhone.css">
    <script type="text/javascript" src="<?php echo JS;?>/common/reset.js"></script>
    <script type="text/javascript" src="<?php echo JS;?>/common/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo JS;?>/login/forgetpass.js"></script>

</head>

<body>

    <div class="layout">
        <div class="part-1">

            <form id="phone" onsubmit="return false;">
                <div class="forget-list">
                    <ul>
                        <li>
                            <div class="reg-single">
                                <input type="tel" id="phone_old" name="mobile" value="<?php echo $mobile;?>" placeholder="请输入原手机号" class="reg-single-input">

                            </div>
                        </li>
                        <li>
                            <div class="reg-single">
                                <input type="text" id="code1" name="verifycode" value="" placeholder="请输入验证码" class="reg-single-input ver-code">

                                <input  class="reg-single-btn getcode" id="getcode1" type="button" value="发送验证码" />

                            </div>
                        </li>
                    </ul>
                </div>
                <button type="button" id="btn-step1" class="next">下一步</button>
            </form>
        </div>

        <div class="part-2 hidden">
            <form id="newphone" onsubmit="return false;">
                <div class="forget-list">
                    <ul>

                        <li>
                            <div class="reg-single">
                                <input type="tel" id="phone_new" name="mobile" value="" placeholder="请输入新手机号码" class="reg-single-input">
                            </div>
                        </li>
                        <li>
                            <div class="reg-single">
                                <input id="code2" type="text" name="verifycode" value="" placeholder="请输入验证码" class="reg-single-input ver-code">
                                <input  class="reg-single-btn getnewode" id="getcode2" type="button" value="发送验证码"/>
                            </div>
                        </li>
                    </ul>
                </div>
                <a href="javascript:;" id="btn-step2" class="over">完成</a>
            </form>
        </div>


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
        $(".getcode").val(curCount + "秒后可重新发送");
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
    /*新手机验证码*/

    var count = 60; //间隔函数，1秒执行
    var curCount;//当前剩余秒数

    function sendNewMessage() {
        curCount = count;
        //设置button效果，开始计时
        $(".getnewode").attr("disabled", "true");
        $(".getnewode").val(curCount + "秒后可重新发送");
        InterValObj = window.setInterval(sendNewMessage, 1000); //启动计时器，1秒执行一次
        //请求后台发送验证码 TODO
    }
    //timer处理函数
    function SetNewRemainTime() {
        if (curCount == 0) {
            window.clearInterval(InterValObj);//停止计时器
            $(".getnewode").removeAttr("disabled");//启用按钮
            $(".getnewode").val("重新发送验证码");
        }
        else {
            curCount--;
            $(".getnewode").val(curCount + "秒后可重新发送");
        }
    }

    $('#getcode1').on('click',function () {

        //手机号正则
        var phoneReg = /(^1[3|4|5|7|8]\d{9}$)|(^09\d{8}$)/;
        //电话
        var phoneNum = $('#phone_old').val();
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



    $('#getcode2').on('click',function () {

        //手机号正则
        var phoneReg = /(^1[3|4|5|7|8]\d{9}$)|(^09\d{8}$)/;
        //电话
        var phoneNum = $('#phone_new').val();
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


    $('#btn-step1').on('click',function () {

        var data = {
            phone : $('#phone_old').val(),
            code : $('#code1').val(),
        };
        data = JSON.stringify(data);
        $.ajax({

            type : 'GET',
            dataType : 'JSON',
            url : "<?php echo  site_url('base/ajaxSmsLogin')?>" + '?data=' + data,
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

    $('#btn-step2').on('click',function () {

        var data = {
            phone : $('#phone_new').val(),
            code : $('#code2').val(),
        };
        data = JSON.stringify(data);
        $.ajax({

            type : 'GET',
            dataType : 'JSON',
            url : "<?php echo  site_url('base/ajaxChangeMobile')?>" + '?data=' + data,
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

</script>

</html>