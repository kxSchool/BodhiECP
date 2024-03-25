<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>服务商系统 | 订单管理</title>
    <?php $this -> load -> view('common/top'); ?>
    <!--<link rel="stylesheet" href="--><?php //echo STATIC_PATH; ?><!--datetimepicker/bootstrap-datetimepicker.min.css" />-->
    <script src="<?php echo STATIC_PATH; ?>datetimepicker/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_PATH; ?>datetimepicker/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
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
            <h1>提现管理</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
                <li class="active">提现管理</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <a type="button" class="btn btn-success" href="<?php echo site_url('UserAccount/useraccountAdd');?>"><span class="glyphicon glyphicon-plus"></span> 充值</a>
                            <div class="pull-right">
                                <form id="searchNewsForm" class="form-inline" method="get" action="">
                                    <div class="form-group">
                                        <select class="form-control" name="fields" id="fields">
                                            <option value="0">==选择栏目==</option>
                                            <option value="createtime"  <?php if(isset($fields) && !empty($fields)):?><?php if($fields == 'admin_user'):?>selected<?php endif;?><?php endif;?>>用户</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="search" id="search" placeholder="输入搜索内容..." value="<?php if(isset($search) && !empty($search)):?><?php echo $search;?><?php endif;?>"/>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info" name="dosearch" value="1">搜索</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="tables">
                                <table class="table table-bordered">
                                    <thead>
                                    <th>ID</th>
                                    <th>USER_ID </th>
                                    <th>ADMIN_USER</th>
                                    <th>AMOUNT</th>
                                    <th>ADD_TIME</th>
                                    <th>PAID_TIME</th>
                                    <th>ADMIN_NOTE</th>
                                    <th>USER_NOTE</th>
                                    <th>ACCOUNT</th>
                                    <th>REALNAME</th>
                                    <th>PAYMENT</th>
                                    <th>IS_PAID</th>
                                    <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(isset($datas)):?>
                                        <?php foreach($datas as $v):?>
                                            <tr>
                                                <td><?php echo $v['id'];?></td>
                                                <td><?php echo $v['user_id'];?></td>
                                                <td><?php echo $v['admin_user'];?></td>
                                                <td><?php echo $v['amount'];?></td>
                                                <td><?php echo $v['add_time'];?></td>
                                                <td><?php echo $v['paid_time'];?></td>
                                                <td><?php echo $v['admin_note'];?></td>
                                                <td><?php echo $v['user_note'];?></td>
                                                <td><?php echo $v['account'];?></td>
                                                <td><?php echo $v['realname'];?></td>
                                                <td><?php echo $v['payment'];?></td>
                                                <td><?php echo $v['is_paid'];?></td>
                                                <td><a class="btn btn-sm btn-danger" href="<?php echo site_url('UserAccount/useraccountCash') ?>?id=<?php echo $v['id'];?>">提现</a></td>
                                            </tr>
                                        <?php endforeach;?>
                                    <?php endif;?>
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- /.box-body -->
                        <?php if(isset($pages)):?>
                            <div class="box-footer clearfix">
                                <ul class="pagination pagination-sm no-margin pull-right">
                                    <?php echo $pages;?>
                                </ul>
                            </div>
                        <?php endif;?>
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <?php $this -> load -> view('common/footer'); ?>

</body>
</html>