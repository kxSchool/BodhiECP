<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>集团总控管理系统 | 证书详情</title>
	<?php $this -> load -> view('common/top'); ?>
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">
	<?php $this -> load -> view('common/header'); ?>
	<!-- Left side column. contains the logo and sidebar -->
	<?php $this -> load -> view('common/left'); ?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>证书详情</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
				<li><a href="<?php echo site_url('members/certificate');?>">证书审核</a></li>
				<li class="active">证书详情</li>
			</ol>
		</section>
		<!-- Main content -->
		<section class="content">

			<div class="row">
				<div class="col-md-12">
					<ul class="timeline">
						<li>
							<i class="fa fa-envelope bg-blue"></i>
							<div class="timeline-item">
								<h3 class="timeline-header"><?php echo $memberInfo['username'];?></h3>
								<div class="timeline-body">
									<table class="table table-bordered">
										<tr>
											<th>证书名称：</th>
											<td><?php echo $certificateInfo['title'];?></td>
										</tr>
										<tr>
											<th>培训机构：</th>
											<td><?php echo $certificateInfo['institution'];?></td>
										</tr>
										<tr>
											<th>证书编号：</th>
											<td><?php echo $certificateInfo['number'];?></td>
										</tr>
										<tr>
											<th>证书：</th>
											<td>
												<div class="row">
													<div class="col-sm-4">
														<img src="<?php echo $certificateInfo['image'];?>" width="300px" height="200px" alt="身份证正面照">
													</div>
												</div>
											</td>
										</tr>
									</table>
									<?php if($certificateInfo['authority'] == 0):?>
									<div class="form-group">
										<label>拒绝通过审核</label>
										<input type="hidden" name="id" id="id" value="<?php echo $certificateInfo['id'];?>" />
										<textarea class="form-control" rows="3" placeholder="未通过审核理由..." id="refuse_desc" name="refuse_desc"></textarea>
									</div>
									<div class="form-group">
										<button class="btn btn-danger submitButton" buttonValue="2">拒绝通过审核</button>
										<button class="btn btn-success submitButton" buttonValue="1">同意通过审核</button>
									</div>
									<?php endif;?>
								</div>
							</div>
						</li>
						<li>
							<i class="fa fa-clock-o bg-gray"></i>
						</li>
					</ul>
				</div>
			</div><!-- /.row -->
		</section><!-- /.content -->
	</div><!-- /.content-wrapper -->
	<?php $this -> load -> view('common/footer'); ?>
	<script>
		$(function(){
			$(".submitButton").click(function(){
				var buttonValue = $(this).attr('buttonValue');
				var id = $("#id").val();
				var refuse_desc = $("#refuse_desc").val();
				if(buttonValue == 2){
					if(refuse_desc.length <= 0){
						layer.alert('拒绝通过审核的理由不能为空', {icon: 5});
						return false;
					}
				}
				$.ajax({
					url : "<?php echo site_url('members/updateCertificate');?>",
					type : 'post',
					dataType : 'json',
					data : {'id':id,'authority':buttonValue,'refuse_desc':refuse_desc},
					success:function(data){
						if(data.info == 1){
							location.href = data.hrefUrl;
						}else{
							layer.alert(data.tip, {icon: 5});
						}
					}
				});
			});
		})
	</script>
</body>
</html>