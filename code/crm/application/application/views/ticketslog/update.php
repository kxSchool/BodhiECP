<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>容易办服务商中心系统 | 订单管理</title>
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
            <h1>日志管理</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
                <li class="active">日志管理</li>
            </ol>
        </section>
        <!-- Main content -->
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                        <div class="box-body">
                                <form id="roleForm" class="form-horizontal" method="post" action="<?php echo site_url('ticketslog/update');?>">
                                    <div class="form-group">
                                        <label for="rolename" class="col-sm-2 control-label">UID：</label>
                                        <div class="col-sm-10">
                                            <input type="hidden" class="form-control" name="id" id="id" placeholder="" value="<?php echo $datas['id'];?>">
                                            <input type="text" class="form-control" name="uid" id="uid" placeholder="" value="<?php echo $datas['uid'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="col-sm-2 control-label">URL：</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="url" id="url" placeholder="" value="<?php echo $datas['url'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="col-sm-2 control-label">IP：</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="ip" id="ip" placeholder="" value="<?php echo $datas['ip'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="col-sm-2 control-label">REMARK：</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="remark" id="remark" placeholder="" value="<?php echo $datas['remark'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="col-sm-2 control-label">CREATETIME：</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="createtime" id="createtime" placeholder="" value="<?php echo $datas['createtime'];?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-offset-2">
                                        <button type="submit" class="btn btn-success">保存</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.box -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <?php $this -> load -> view('common/footer'); ?>

</body>
</html>