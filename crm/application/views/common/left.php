<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="<?php echo $staffAvatar;?>" class="img-circle" alt="User Image" />
			</div>
			<div class="pull-left info">
				<p><?php echo $_SESSION['username'];?></p>
				<a href="<?php echo site_url('index/profile');?>"><i class="fa fa-circle-o text-aqua"></i>个人信息</a>
				<a href="<?php echo site_url('index/logout');?>"><i class="fa fa-circle-o text-yellow"></i>安全退出</a>
			</div>
		</div>
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<li class="header"> 导航菜单</li>
			<li class="treeview">
				<a href="<?php echo site_url('index/home');?>">
					<i class="fa fa-home"></i>
					<span>控制面板</span>
				</a>
			</li>
            <li class="treeview">
                <a href="javascript:void(0)">
                    <i class="fa fa-bars"></i>
                    <span>财务管理</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/Finance/account.html"><i class="fa fa-circle-o text-red"></i> 我的账户</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="javascript:void(0)">
                    <i class="fa fa-bars"></i>
                    <span>订单管理</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/Order/orderList.html"><i class="fa fa-circle-o text-red"></i> 订单列表</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="javascript:void(0)">
                    <i class="fa fa-bars"></i>
                    <span>日志管理</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/TicketsLog/ticketslog.html"><i class="fa fa-circle-o text-red"></i> 日志管理</a></li>
                </ul>
            </li>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>