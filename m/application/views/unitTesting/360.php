<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, minimal-ui">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<script type="text/javascript" src="<?php echo API_STATIC_PATH; ?>js/pano2vr_player.js">
		</script>
<script type="text/javascript">
//////////////////////////////////////////////////////////////////////
// 章爱军(永远的大牛)                                               //
// Trial License: For evaluation only!                              //
// (c) 2018, ZhangAijun, http://www.mydeershow.com                  //
//////////////////////////////////////////////////////////////////////	
function hideUrlBar() {
    
}
</script>
		<style type="text/css" title="Default">
			body, div, h1, h2, h3, span, p {
				font-family: Verdana,Arial,Helvetica,sans-serif;
				color: #000000; 
			}
			body {
			  font-size: 10pt;
			  background : #ffffff; 
			}
			table,tr,td {
				font-size: 10pt;
				border-color : #777777;
				background : #dddddd; 
				color: #000000; 
				border-style : solid;
				border-width : 2px;
				padding: 5px;
				border-collapse:collapse;
			}
			h1 {
				font-size: 18pt;
			}
			h2 {
				font-size: 14pt;
			}
			.warning { 
				font-weight: bold;
			} 
			/* fix for scroll bars on webkit & Mac OS X Lion */ 
			::-webkit-scrollbar {
				background-color: rgba(0,0,0,0.5);
				width: 0.75em;
			}
			::-webkit-scrollbar-thumb {
    			background-color:  rgba(255,255,255,0.5);
			}
		</style>	
	</head>
	<body>
		<h1></h1>
		<br>
		<div id="container" style="width:640px;height:480px;">
        <canvas width="640" height="480"></canvas>
        </div>
        
        </div>
		<script type="text/javascript">
	
		// check for CSS3 3D transformations and WebGL
		if (ggHasHtml5Css3D() || ggHasWebGL()) {
		// use HTML5 panorama
	
			// create the panorama player with the container
			pano=new pano2vrPlayer("container");
			pano.readConfigUrl("http://app.mydeershow.com/index/xml.html?id=10");
			// hide the URL bar on the iPhone
			//setTimeout(function() { hideUrlBar(); }, 10);
		} 
		</script>
		<noscript>
			&lt;p&gt;&lt;b&gt;Please enable Javascript!&lt;/b&gt;&lt;/p&gt;
		</noscript>
	

</body></html>