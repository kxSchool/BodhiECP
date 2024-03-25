<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>服务商系统 | 更新进度</title>
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
            <h1>更新进度</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
                <li class="active">订单进度更新</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <div class="pull-left">
                                <button type="button" class="btn btn-info" onclick="javascript:history.back(-1);">上一步</button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">订单信息</h3>
                                </div>
                                <div class="panel-body">
                                    <table class="table text-center">
                                        <tr>
                                            <td>订单编号</td>
                                            <td>订单状态</td>
                                            <td>订单总额</td>
                                            <td>地址</td>
                                            <td>下单时间</td>
                                            <td>付款时间</td>


                                        </tr>
                                        <?php if(isset($order_info) && !empty($order_info)):?>
                                            <tr>
                                                <input type="hidden" id="order_id" value="<?php echo $order_info['order_id'];?>">
                                                <td><?php echo $order_info['order_sn'];?></td>
                                                <td><?php echo $order_info['order_status'];?></td>
                                                <td><?php echo $order_info['order_amount'];?></td>
                                                <td><?php echo $order_info['address'];?></td>
                                                <td><?php echo date('Y-m-d H:i:s',$order_info['add_time']);?></td>
                                                <td><?php echo date('Y-m-d H:i:s',$order_info['pay_time']);?></td>

                                            </tr>
                                        <?php endif;?>
                                    </table>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">商品信息</h3>
                                </div>
                                <div class="panel-body">
                                    <table class="table text-center">
                                        <tr>
                                            <td>商品ID</td>
                                            <td>商品名称</td>
                                            <td>商品价格</td>
                                            <td>商品数量</td>

                                        </tr>
                                        <?php if(isset($goods_info) && !empty($goods_info)):?>
                                            <tr>
                                                <td><?php echo $goods_info['goods_sn'];?></td>
                                                <td><?php echo $goods_info['goods_name'];?></td>
                                                <td><?php echo $goods_info['goods_price'];?></td>
                                                <td> X <?php echo $goods_info['goods_count'];?></td>
                                            </tr>
                                        <?php endif;?>
                                    </table>
                                </div>
                            </div>
                            
                            
                        </div><!-- /.box-body -->

                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <?php $this -> load -> view('common/footer'); ?>
    <script>
        function changeOrder(e)
        {
            var goods_id = $(e).data('id');

            var order_id = $('#order_id').val();

            window.location = '/order/changeStatus' + '?id=' + order_id + '_' + goods_id;
        }
    </script>
</body>
</html>