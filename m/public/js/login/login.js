//发送验证码
var count = 60; //间隔函数，1秒执行
var curCount;//当前剩余秒数 

function sendMessage() {
    curCount = count;
    //设置button效果，开始计时 
    $("#getcode").attr("disabled", "true");
    $("#getcode").val(curCount + "秒后重发");
    InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次 
    //请求后台发送验证码 TODO 
}
//timer处理函数 
function SetRemainTime() {
    if (curCount == 0) {
        window.clearInterval(InterValObj);//停止计时器 
        $("#getcode").removeAttr("disabled");//启用按钮 
        $("#getcode").val("重新发送");
    }
    else {
        curCount--;
        $("#getcode").val(curCount + "秒后重发");
    }
}

//切换登录方式
$(function () {
    $('.js-tab').find('a').on('click', function () {
        var $this = $(this);
        $this.addClass('active').parent().siblings('li').find('a').removeClass('active');
        var _id = $this.attr('data-id');
        $('.js-tab').removeClass('a-1 a-2').addClass('a-' + _id);
        $('.js-form-' + _id).removeClass('hidden').siblings('form').addClass('hidden');
    });
})


 



// function validateAccount() {
//     //验证手机号
//     regExp = /^1[3|4|5|7|8]\d{9}$/;
//     if ($("#mobile").val() == "") {
//         alert('账号不能为空', 2000)
//         return false;
//     }
//     else if (!regExp.test($("#mobile").val())) {
//         alert('账号格式错误', 2000)
//         return false;
//     }
//     //验证密码
//     regExp = /^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,20}$/;
//     if ($("#password").val() == "") {
//         alert('密码不能为空', 2000)
//         return false;
//     }
//     else if (!regExp.test($("#password").val())) {
//         alert('密码格式错误', 2000)
//         return false;
//     }
// }

// //表单验证
// function validatePhone() {
//     //验证手机号
//     regExp = /^1[3|4|5|7|8]\d{9}$/;
//     if ($("#mobile").val() == "") {
//         // layer.msg('请输入正确的手机号');
//         return false;
//     }
//     else if (!regExp.test($("#mobile").val())) {
//         alert('账号格式错误', 2000)
//         return false;
//     }
// }
// $(function () {
//     $("#base").on("click", function () {
//         validatePhone();
//         if (validatePhone()) {
//             // layer.msg('请输入正确的手机号');
//         }
//     })
//     $("#account").on("click", function () {
//         validateAccount();
//         if (validateAccount()) {
//             alert("账号登陆成功！")
//         }
//     })

// });