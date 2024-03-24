<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>js</title>
    <script src="<?php echo API_STATIC_PATH; ?>js/jquery-1.8.3.min.js"></script>
</head>
<body>
<iframe name="projects" id="projects" src="<?php echo site_url('index/GetEvent');?>?EventId=16&UserId=3f34&AppId=FEQWED&m=pc" style="display: ;width:1000px;height:500px"></iframe>
<script type="text/javascript">
<!--
//////////////////////////////////////////////////////////////////////
// 章爱军(永远的大牛)                                               //
// Trial License: For evaluation only!                              //
// (c) 2018, ZhangAijun, http://www.mydeershow.com                  //
//////////////////////////////////////////////////////////////////////
function abc(){
    iframes="http://api.dd.com/webpc/js?EventId=16&UserId=3f34&AppId=FEQWED&m=pc&seatNo=s792_9_33";
	if(typeof(oFrame)=='undefined'){
          oFrame = document.createElement('iframe');
          oFrame.src = iframes +'&a='+ Math.random();
          oFrame.style.display = 'none';
          document.body.appendChild(oFrame);
          console.log('a');
      }else{
          oFrame.src = iframes +'&a='+ Math.random();
          console.log('b');
      }
}
    
-->
</script>
<input type="button" onclick="abc();" class="price" value="1080" style="width: 45px;background-color: #f48691;color: #fff;border:1px solid #f48691 ;">
</body>
</html>