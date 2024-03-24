<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>集团总控管理系统 | 申请入驻资料</title>
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
			<h1>申请入驻资料</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
				<li><a href="<?php echo site_url('members/applyseller');?>">商铺入驻申请</a></li>
				<li class="active">申请入驻资料</li>
			</ol>
		</section>
		<!-- Main content -->
		<section class="content">

			<div class="row">
				<div class="col-md-3">
					<!-- Profile Image -->
					<div class="box box-primary">
						<div class="box-body box-profile">
							<img class="profile-user-img img-responsive img-circle" src="<?php echo $userInfo['avatar'];?>" alt="<?php echo $userInfo['username'];?>">
							<ul class="list-group list-group-unbordered">
								<li class="list-group-item">
									<b>用户名:</b> <span class="pull-right"><?php echo $userInfo['username'];?></span>
								</li>
								<li class="list-group-item">
									<b>手机号:</b> <span class="pull-right"><?php echo $userInfo['mobile'];?></span>
								</li>
								<li class="list-group-item">
									<b>电子邮箱:</b> <span class="pull-right"><?php echo $userInfo['email'];?></span>
								</li>
								<li class="list-group-item">
									<b>注册时间:</b> <span class="pull-right"><?php echo date("Y-m-d H:i",$userInfo['register_time']);?></span>
								</li>
								<li class="list-group-item">
									<b>登录次数:</b> <span class="pull-right"><?php echo $userInfo['login_count'];?></span>
								</li>
								<li class="list-group-item">
									<b>最新登录:</b> <span class="pull-right"><?php echo date("Y-m-d H:i",$userInfo['login_time']);?></span>
								</li>
								<li class="list-group-item">
									<b>最新登录IP:</b> <span class="pull-right"><?php echo $userInfo['login_ip'];?></span>
								</li>
							</ul>
						</div><!-- /.box-body -->
					</div><!-- /.box -->
				</div><!-- /.col -->
				<div class="col-md-9">
					<ul class="timeline">
						<li>
							<i class="fa fa-envelope bg-blue"></i>
							<div class="timeline-item">
								<h3 class="timeline-header">实名身份认证</h3>
								<div class="timeline-body">
									<table class="table table-bordered">
										<tr>
											<th>真实姓名：</th>
											<td><?php echo $userInfo['username'];?></td>
											<th>性别：</th>
											<td>
												<?php if($userInfo['sex'] == 0):?>
													保密
												<?php elseif($userInfo['sex'] == 1):?>
													男
												<?php elseif($userInfo['sex'] == 2):?>
													女
												<?php endif;?>
											</td>
										</tr>
										<tr>
											<th>生日：</th>
											<td><?php echo date('Y-m-d',$userInfo['birthday']);?></td>
											<th>培训机构：</th>
											<td><?php echo $profileInfo['idno'];?></td>
										</tr>
										<tr>
											<td colspan="4">
												<div class="row">
													<?php if(isset($idnoPhoto['photo1'])):?>
													<div class="col-sm-4">
														<img src="<?php echo $idnoPhoto['photo1'];?>" width="300px" height="200px" alt="身份证正面照">
													</div>
													<?php endif;?>
													<?php if(isset($idnoPhoto['photo2'])):?>
														<div class="col-sm-4">
															<img src="<?php echo $idnoPhoto['photo2'];?>" width="300px" height="200px" alt="身份证反面照">
														</div>
													<?php endif;?>
													<?php if(isset($idnoPhoto['photo3'])):?>
														<div class="col-sm-4">
															<img src="<?php echo $idnoPhoto['photo3'];?>" width="300px" height="200px" alt="身份证半身照">
														</div>
													<?php endif;?>
												</div>
											</td>
										</tr>
									</table>
								</div>
							</div>
						</li>
						<li>
							<i class="fa fa-envelope bg-blue"></i>
							<div class="timeline-item">
								<h3 class="timeline-header">职业资质认证</h3>
								<div class="timeline-body">
									<?php if(isset($certificate)):?>
									<table class="table table-bordered">
										<tr>
											<th>职业资质认证：</th>
											<td><?php echo $certificate['title'];?></td>
											<th>证书编号：</th>
											<td><?php echo $certificate['number'];?></td>
										</tr>
										<tr>
											<th>获得时间：</th>
											<td><?php echo date('Y-m-d',$certificate['get_time']);?></td>
											<th>培训机构：</th>
											<td><?php echo $certificate['institution'];?></td>
										</tr>
										<tr>
											<td colspan="4">
												<div class="row">
													<div class="col-sm-4">
														<img src="<?php echo $certificate['image'];?>" width="300px" height="200px" alt="证书照">
													</div>
												</div>
											</td>
										</tr>
									</table>
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
</body>
</html>