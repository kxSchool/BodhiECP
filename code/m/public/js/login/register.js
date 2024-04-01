
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
 
function validate(){
	//验证手机号
	regExp = /^1[3|4|5|7|8]\d{9}$/;
	if ($("#mobile").val() == "") {
		alert('手机号码不能为空', 2000)
		return false;
	}
	else if (!regExp.test($("#mobile").val())) {
		alert('号码格式错误', 2000)
		return false;
	} 
	//验证密码
	// regExp = /^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,20}$/;
	regExp=/^[a-zA-Z0-9]{6,20}$/;
	if ($("#password").val() == "") {
		alert('密码不能为空', 2000)
		return false;
	}
	else if (!regExp.test($("#password").val())) {
		alert('请输入6-12位密码', 2000)
		return false;
	}
	//确认密码
	if ($("#confirm_password").val() != $("#password").val()) {
		alert('密码输入不一致', 2000)
		return false;
	}
 
	return true;
}


	
 
  
 