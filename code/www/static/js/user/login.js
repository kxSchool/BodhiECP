//切换登录方式
$(function () {
	$('.js-tab').find('a').on('click', function () {
		var $this = $(this);
		$this.addClass('active').parent().siblings('li').find('a').removeClass('active');
		var _id = $this.attr('data-id');
		$('.js-tab').removeClass('a-1 a-2').addClass('a-' + _id);
		$('.js-form-' + _id).removeClass('hidden').siblings('div:gt(0)').addClass('hidden');
	});
	 
})
function userNameBlur(){
	regExp = /^1[3|4|5|8][0-9]\d{4,8}$/;
	if ($(".username").val() == "" || !regExp.test($(".username").val())) {
		$('.lo-error1').css('display', 'block');
		 
	} else {
		$('.lo-error1').css('display', 'none');
		 
	}
}
function accountNameBlur(){
	regExp = /^1[3|4|5|8][0-9]\d{4,8}$/;
	if ($(".acount-username").val() == "" || !regExp.test($(".acount-username").val())) {
		$('.lo-error3').css('display', 'block');
		 
	} else {
		$('.lo-error3').css('display', 'none');
		 
	}
}
function accountPwBlur(){
	if ($(".acount-password").val() == "") {
		$('.lo-error4').css('display', 'block');
		 
	} else {
		$('.lo-error4').css('display', 'none');
		 
	}
}
//发送验证码
var count = 60; //间隔函数，1秒执行
var curCount; //当前剩余秒数 

function sendMessage() {
	var mobile = $(".username").val();
	//验证手机号
	regExp =/^1[3|4|5|7|8]\d{9}$/;
	if ($(".username").val() == "" || !regExp.test($(".username").val())) {
		$('.lo-error1').css('display', 'block');
		return false;
	} else {
		$('.lo-error1').css('display', 'none');
		$(".getcode").attr("disabled", "false");
	}
	curCount = count;
	//设置button效果，开始计时 

	$(".getcode").val(curCount + "秒后重发");
	InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次 
	//请求后台发送验证码 TODO 

	//获取验证码
    $.ajax({
        url: "/api/ajaxSendSms",
        type: "POST",
        data : 'mobile='+mobile,
        dataType: 'json',
        success: function (data) {

        }
    });
}
//timer处理函数 
function SetRemainTime() {
	if (curCount == 0) {
		window.clearInterval(InterValObj); //停止计时器 
		$(".getcode").removeAttr("disabled"); //启用按钮 
		$(".getcode").val("重新发送");
	} else {
		curCount--;
		$(".getcode").val(curCount + "秒后重发");
	}
}

/* 手机动态码登录 */
function login() {

	var name = $(".username").val(); 
	//验证手机号
	regExp = /^1[3|4|5|7|8]\d{9}$/;
	if ($(".username").val() == "" && !regExp.test($(".username").val())) {
		$('.lo-error1').css('display', 'block');
		return false;
	} else {
		$('.lo-error1').css('display', 'none');
	}
	if($('#confirmCode').val() == ''){
		alert('请输入验证码');
		return false;
	}

    $.ajax({
        url: "/api/ajaxSmsLogin",
        type: "POST",
        data: {
            mobile: name,
            code : $('#confirmCode').val()
        },
		dataType : 'JSON',
        success: function (res) {
            console.log(typeof res);
            if (res.code === 1) {
                alert(res.mes);
                return false;
            }else{
                location.href = res.url;
// console.log(res.url);
            }

        }
    });
}
/**账号密码登录 */
function accountLogin(){ 
	var accountMobile = $('.acount-username').val();
	var accountPw = $('.acount-password').val();
	regExp = /^1[3|4|5|7|8]\d{9}$/;
	if ( $(".accountMobile").val() == " " && !regExp.test($(".accountMobile").val())) {
		$('.lo-error3').css('display', 'block');
		return false;
	} else {
		$('.lo-error3').css('display', 'none');
	}
	//验证密码
	regExp=/^[a-zA-Z0-9]{6,20}$/;
	if  ($(".accountPw").val() == " " && !regExp.test($(".accountPw").val())) {
		$('.lo-error4').css('display', 'block');
		return false;0
	}else {
		$('.lo-error4').css('display', 'none');
        $.ajax({
            url: "/api/ajaxPwdLogin",
            type: "post",
            data : {mobile:accountMobile,password:accountPw},
            dataType:"json",
            success: function (data) {

                if (data.code === 0) {
                    location.href = data.url;
                }else{
                    alert(data.mes)
                }
            }
        });
	}

}