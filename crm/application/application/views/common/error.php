<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>容易办服务商中心系统 | 错误提示</title>
<?php $this -> load -> view('common/top'); ?>
<style>
.example-modal .modal {
	position: relative;
	top: auto;
	bottom: auto;
	right: auto;
	left: auto;
	display: block;
	z-index: 1;
}
.example-modal .modal {
	background: transparent!important;
}
</style>
<script type="text/javascript">
$(document).ready(function() {
	
	var forward = $("#forward").val();
	$('#num').html(5);
	jump(5);
	function jump(count) {
		setTimeout(function() {
			count--;
			if (count > 0) {
				$('#num').html(count);
				jump(count);
			} else {
				location.href = forward;
			}
		}, 1000);
	}
})
</script>
</head>
<body class="skin-blue">
<div class="example-modal">
	<div class="modal modal-warning">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">错误提示</h4>
				</div>
				<div class="modal-body">
					<div class="alert alert-warning" role="alert"><?php echo $msg; ?></div>
				</div>
				<div class="modal-footer">
					<input type="hidden" id="forward" value="<?php echo $url; ?>">
						页面将在<span id="num"></span>秒后跳转...
						<a role="button" class="btn btn-warning" href="<?php echo $url;?>">马上跳转</a>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</div><!-- /.example-modal -->
</body>
</html>