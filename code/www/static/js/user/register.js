//发送验证码
var count = 60;
var curCount; 

function sendMessage() {
	var mobile = $(".reg-telphone").val(); 
	//验证手机号
	regExp = /^1[3|4|5|7|8]\d{9}$/;
	if(!regExp.test(mobile)) {
		$('.lo-error1').css('display', 'block');
		return false;
	}else {
		$('.lo-error1').css('display', 'none');
		$(".getcode").attr("disabled", "false");
	}
	curCount = count;
	//设置button效果，开始计时 
	
	$("#getcode").val(curCount + "秒后重发");
	InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次 
	//请求后台发送验证码 TODO
    //获取验证码
    $.ajax({
        url: "/api/ajaxSendSms",
        type: "post",
        data : 'mobile='+mobile,
        dataType: 'json',
        success: function (data) {

        }
    });
 
}
//timer处理函数 
function SetRemainTime() {
	if(curCount == 0) {
		window.clearInterval(InterValObj); //停止计时器 
		$("#getcode").removeAttr("disabled"); //启用按钮 
		$("#getcode").val("重新发送");
	} else {
		curCount--;
		$("#getcode").val(curCount + "秒后重发");
	}
}

function regSubmit() {

	var name = $(".reg-telphone").val();
	var pw = $(".reg_password").val();
	var conform_pw = $(".confirm_password").val();
	//验证手机号
	regExp = /^1[3|4|5|7|8]\d{9}$/;
	if(!regExp.test(name)) {
		$('.lo-error1').css('display', 'block');
		return false;
	}else {
		$('.lo-error1').css('display', 'none');
	}
	//regExp = /^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,20}$/
    regExp=/^[a-zA-Z0-9]{6,20}$/;
	if(!regExp.test(pw)){
		$('.lo-error3').css('display', 'block');
		return false;
	}else {
		$('.lo-error3').css('display', 'none');
	}
	if(conform_pw === pw){
		$('.lo-error4').css('display', 'block');
		return false;
	}else {
		$('.lo-error4').css('display', 'none');
	}
    $.ajax({
        url: "/api/ajaxRegister",
        type: "post",
        data : {mobile:name,code:$('#code').val(),password:pw},
        dataType:"json",
        success: function (data) {
            if (data.code === 0) {
                location.href = data.url;
            }else{
                alert(data.message)
				location.reload();
            }
        }
    });
 

}
function userNameBlur(){
	regExp = /^1[3|4|5|7|8]\d{9}$/;
	if (!regExp.test($(".reg-telphone").val())) {
		$('.lo-error1').css('display', 'block');
		 
	} else {
		$('.lo-error1').css('display', 'none');
		 
	}
}
function accountNameBlur(){
	//regExp = /^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,20}$/
    regExp=/^[a-zA-Z0-9]{6,20}$/;
	if (!regExp.test($("#password").val())) {
		$('.lo-error3').css('display', 'block');
		 
	} else {
		$('.lo-error3').css('display', 'none');
		 
	}
}
function accountPwBlur(){
	 
	if ($("#password").val() != $("#repassword").val()) {
		$('.lo-error4').css('display', 'block');
	} else {
		$('.lo-error4').css('display', 'none');
		 
	}
}