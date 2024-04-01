 
 
//发送验证码
var count = 60; //间隔函数，1秒执行
var curCount; //当前剩余秒数 

function sendMessage() {
	var accountMobile = $(".username").val();
	//验证手机号
	regExp =/^1[3|4|5|7|8]\d{9}$/;
	if (accountMobile  == "" || !regExp.test(accountMobile)) {
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
        data : 'mobile='+accountMobile,
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
function forgetPwdSubmit() {
	var accountMobile = $('.username').val();
	var accountPw = $('.for-pwd').val();
    var rePwd = $('.for-rePwd').val(); 
	//验证手机号
	regExp = /^1[3|4|5|7|8]\d{9}$/;
	if (accountMobile == "" && !regExp.test(accountMobile)) {
		$('.lo-error1').css('display', 'block');
		return false;
	} else {
		$('.lo-error1').css('display', 'none');
	}
    	//验证密码
	regExp=/^[a-zA-Z0-9]{6,20}$/;
	if  (accountPw == " " && !regExp.test(accountPw)) {
		$('.lo-error3').css('display', 'block');
		return false;0
	}else {
		$('.lo-error3').css('display', 'none');
    }
    if( accountPw != rePwd){
   	    $('.lo-error4').css('display', 'block');
    }else{
        $('.lo-error4').css('display', 'none');
    }
        
	if($('#confirmCode').val() == ''){
		$('.lo-error2').css('display', 'block');
		return false;
	}else{
	   $('.lo-error2').css('display', 'none');
	}

    $.ajax({
        url: "/api/forgetPwd",
        type: "POST",
        data: {
            mobile:accountMobile,
            password:accountPw,
            code : $('#confirmCode').val()
        },
		dataType : 'JSON',
        success: function (res) { 
            if (res.code === 1) {
                alert(res.message);
                return false;
            }else{
               alert('修改成功')
            }

        }
    });
}
 