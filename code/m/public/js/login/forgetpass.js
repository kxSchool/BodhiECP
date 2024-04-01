        

        //发送验证码
        var count = 60; //间隔函数，1秒执行
        var curCount;//当前剩余秒数 
        
        function sendMessage() {
            curCount = count;
            //设置button效果，开始计时 
            $("#getcode").attr("disabled", "true");
            $("#getcode").val(curCount + "秒后重送");
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
      