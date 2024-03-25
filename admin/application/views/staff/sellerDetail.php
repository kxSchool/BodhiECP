<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>集团中台管理系统 | 商铺资料</title>
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
			<h1>商铺资料</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
				<li><a href="<?php echo site_url('members/index');?>?type=2">商铺管理</a></li>
				<li class="active">商铺详情</li>
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
						<!-- timeline time label -->
						<li class="time-label">
                  <span class="bg-red">
                    10 Feb. 2014
                  </span>
						</li>
						<!-- /.timeline-label -->
						<!-- timeline item -->
						<li>
							<i class="fa fa-envelope bg-blue"></i>
							<div class="timeline-item">
								<span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
								<h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
								<div class="timeline-body">
									Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
									weebly ning heekya handango imeem plugg dopplr jibjab, movity
									jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
									quora plaxo ideeli hulu weebly balihoo...
								</div>
								<div class="timeline-footer">
									<a class="btn btn-primary btn-xs">Read more</a>
									<a class="btn btn-danger btn-xs">Delete</a>
								</div>
							</div>
						</li>
						<!-- END timeline item -->
						<!-- timeline item -->
						<li>
							<i class="fa fa-user bg-aqua"></i>
							<div class="timeline-item">
								<span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>
								<h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request</h3>
							</div>
						</li>
						<!-- END timeline item -->
						<!-- timeline item -->
						<li>
							<i class="fa fa-comments bg-yellow"></i>
							<div class="timeline-item">
								<span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>
								<h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
								<div class="timeline-body">
									Take me to your leader!
									Switzerland is small and neutral!
									We are more like Germany, ambitious and misunderstood!
								</div>
								<div class="timeline-footer">
									<a class="btn btn-warning btn-flat btn-xs">View comment</a>
								</div>
							</div>
						</li>
						<!-- END timeline item -->
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