<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>容易办服务商中心系统 | CRM管理</title>
<?php $this->load->view('common/top');?>
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">
<?php $this->load->view('common/header');?>
<!-- Left side column. contains the logo and sidebar -->
<?php $this->load->view('common/left');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Dashboard<small>Control panel</small></h1>
		<ol class="breadcrumb">
			<li><a href="javascript:void(0)"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Dashboard</li>
		</ol>
	</section>

	<div class="pad margin no-print">
		<div class="callout callout-info" style="margin-bottom: 0!important;">
			<h4><i class="fa fa-info"></i> Note:</h4>
			This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
		</div>
	</div>

	<section class="invoice">
		<!-- title row -->
		<div class="row">
			<div class="col-xs-12">
				<h2 class="page-header">
					<i class="fa fa-globe"></i> AdminLTE, Inc.
					<small class="pull-right">Date: 2/10/2014</small>
				</h2>
			</div><!-- /.col -->
		</div>
		<!-- info row -->
		<div class="row invoice-info">
			<div class="col-sm-4 invoice-col">
				From
				<address>
					<strong>Admin, Inc.</strong><br>
					795 Folsom Ave, Suite 600<br>
					San Francisco, CA 94107<br>
					Phone: (804) 123-5432<br>
					Email: info@almasaeedstudio.com
				</address>
			</div><!-- /.col -->
			<div class="col-sm-4 invoice-col">
				To
				<address>
					<strong>John Doe</strong><br>
					795 Folsom Ave, Suite 600<br>
					San Francisco, CA 94107<br>
					Phone: (555) 539-1037<br>
					Email: john.doe@example.com
				</address>
			</div><!-- /.col -->
			<div class="col-sm-4 invoice-col">
				<b>Invoice #007612</b><br>
				<br>
				<b>Order ID:</b> 4F3S8J<br>
				<b>Payment Due:</b> 2/22/2014<br>
				<b>Account:</b> 968-34567
			</div><!-- /.col -->
		</div><!-- /.row -->

		<!-- Table row -->
		<div class="row">
			<div class="col-xs-12 table-responsive">
				<table class="table table-striped">
					<thead>
					<tr>
						<th>Qty</th>
						<th>Product</th>
						<th>Serial #</th>
						<th>Description</th>
						<th>Subtotal</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td>1</td>
						<td>Call of Duty</td>
						<td>455-981-221</td>
						<td>El snort testosterone trophy driving gloves handsome</td>
						<td>$64.50</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Need for Speed IV</td>
						<td>247-925-726</td>
						<td>Wes Anderson umami biodiesel</td>
						<td>$50.00</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Monsters DVD</td>
						<td>735-845-642</td>
						<td>Terry Richardson helvetica tousled street art master</td>
						<td>$10.70</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Grown Ups Blue Ray</td>
						<td>422-568-642</td>
						<td>Tousled lomo letterpress</td>
						<td>$25.99</td>
					</tr>
					</tbody>
				</table>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</section><!-- /.content -->
	<div class="clearfix"></div>
</div><!-- /.content-wrapper -->
<?php $this->load->view('common/footer');?>
</body>
</html>