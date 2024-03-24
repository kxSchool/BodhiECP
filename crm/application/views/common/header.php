<header class="main-header">
	<!-- Logo -->
	<a href="javascript:void(0)" class="logo">
		<!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini"><b>管理</b></span>
		<!-- logo for regular state and mobile devices -->
		<span class="logo-lg"><b>服务商中心</b></span>
	</a>
	
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top" role="navigation">
		<!-- Sidebar toggle button-->
		<a href="javascript:void(0)" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<!-- User Account: style can be found in dropdown.less -->
				<li class="user user-menu">
					<a href="javascript:void(0)">
						<img src="<?php echo $staffAvatar;?>" class="user-image" alt="User Image"/>
						<span class="hidden-xs"><?php echo $_SESSION['username'];?></span>
					</a>
				</li>
			</ul>
		</div>
	</nav>
</header>