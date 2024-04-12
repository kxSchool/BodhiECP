<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<link href="/static/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- Font Awesome Icons -->
<link href="/static/dist/css/font-awesome.css" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="/static/dist/css/AdminLTE.css" rel="stylesheet" type="text/css" />
<!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
<link href="/static/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
<script src="/static/jQuery/jQuery-2.1.4.min.js"></script> 
<script src="/static/dist/js/app.js" type="text/javascript"></script>
<script src="/static/dist/js/jquery.nicescroll.js" type="text/javascript"></script>
<script>
	$(document).ready( function() {
		$("html").niceScroll({
			styler:"fb",
			cursorcolor:"#3c8dbc",
			cursorwidth: '5',
			cursorborderradius: '10px',
			background: '#002561',
			spacebarenabled:false,
			cursorborder: '0',
			zindex: '1000'
		});
	} );
</script>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="/static/dist/js/html5shiv.min.js"></script>
<script src="/static/dist/js/respond.min.js"></script>
<![endif]-->
<!-- Bootstrap 3.3.2 JS -->
<script src="/static/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="/static/iCheck/icheck.min.js" type="text/javascript"></script>
<link href="/static/iCheck/skins/all.css" rel="stylesheet" type="text/css" />
<!--验证-->
<script src="/static/bootstrapvalidator/bootstrapValidator.min.js"></script>
<!--信息提示框-->
<script src="/static/layer/layer.js"></script>
<!--开关-->
<link href="/static/bootstrapSwitch/css/bootstrap-switch.min.css" rel="stylesheet">
<script src="/static/bootstrapSwitch/js/bootstrap-switch.min.js"></script>
<script>
$(function() {
	//左侧导航样式
	var lis = $(".sidebar-menu .treeview");
	var lisa = $(".sidebar-menu .treeview").children('a');//li的第一个a标签
	var locationURL = window.location.href;
	var hasFind = false;//判断是否左侧菜单样式搞定
	//首先出去当前url最后一个/的位置
	var lastPos = locationURL.lastIndexOf('/');
	var locationURLMatch = '';//最后需要匹配的Url
	if(lastPos >= 0){
		locationURLMatch = locationURL.substring(0,lastPos);
	}
	for(var i=0; i<lisa.length; i++){
		var urla = $(lisa[i]).attr('href').substring(0,$(lisa[i]).attr('href').lastIndexOf('/'));
		if(urla == locationURLMatch){
			$(lis[i]).addClass("active");
			hasFind = true;
			break;
		}else{
			continue;
		}
	}
	if(hasFind == false){//查看treeview-menu中的a标签
		var treeviewMenuLia = $(".sidebar-menu .treeview .treeview-menu li a");
		for(var j=0; j<treeviewMenuLia.length; j++){
			var urla = $(treeviewMenuLia[j]).attr('href').substring(0,$(treeviewMenuLia[j]).attr('href').lastIndexOf('/'));
			if(urla == locationURLMatch){
				$(treeviewMenuLia[j]).parent().parent().parent().addClass("active");
				hasFind = true;
				break;
			}else{
				continue;
			}
		}
	}
	if(hasFind == false){
		$(lis[0]).addClass("active");
	}
	//全选、取消全选
	$('#checkall').on('ifChecked', function(event) {
		for (var i = 0; i < subcheckboxs.length; i++) {
			$(subcheckboxs[i]).iCheck('check');
		}
		$("#belowcheckall").iCheck('check');
	});
	$('#belowcheckall').on('ifChecked', function(event) {
		for (var i = 0; i < subcheckboxs.length; i++) {
			$(subcheckboxs[i]).iCheck('check');
		}
		$("#checkall").iCheck('check');
	});
	//取消全选
	$('#checkall').on('ifUnchecked', function(event) {
		for (var i = 0; i < subcheckboxs.length; i++) {
			$(subcheckboxs[i]).iCheck('uncheck');
		}
		$("#belowcheckall").iCheck('uncheck');
	});
	$('#belowcheckall').on('ifUnchecked', function(event) {
		for (var i = 0; i < subcheckboxs.length; i++) {
			$(subcheckboxs[i]).iCheck('uncheck');
		}
		$("#checkall").iCheck('uncheck');
	});
});
</script>
