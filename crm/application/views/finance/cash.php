<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>容易办服务商中心系统 | 提现申请</title>
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
            <h1>提现申请</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
                <li class="active">提现申请</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <div class="pull-right">
                                <form id="searchNewsForm" class="form-inline" method="get" action="">
                                    <div class="form-group">
                                        <select class="form-control" name="fields" id="fields">
                                            <option value="0">==选择栏目==</option>
                                            <option value="order_sn"  <?php if(isset($fields) && !empty($fields)):?><?php if($fields == 'order_sn'):?>selected<?php endif;?><?php endif;?>>订单编号</option>
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
                                    <th></th>
                                    <th>订单编号</th>
                                    <th>状态</th>
                                    <th>完成时间</th>
                                    <th>订单金额</th>
                                    <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(isset($datas)):?>
                                        <?php foreach($datas as $v):?>
                                            <tr>
                                                <td>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                                                        </label>
                                                    </div>
                                                </td>
                                                <td><?php echo $v['order_sn'];?></td>
                                                <td><?php echo $v['order_status'];?></td>

                                                <td><?php echo date('Y-m-d H:i:s',$v['finish_time']);?></td>
                                                <td><?php echo $v['order_status'];?></td>
                                                <td><?php echo $v['address'];?></td>
                                                <td><?php echo $v['add_time'];?></td>
                                                <td>
                                                    <a class="btn btn-sm btn-danger" href="<?php echo site_url('Order/info') ?>?id=<?php echo $v['order_id'];?>">详情</a>
                                                </td>
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