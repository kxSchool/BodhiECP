<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>集团中台管理系统 | 订单列表</title>
    <?php $this -> load -> view('common/top'); ?>
    <style>
        .form-group{
            margin-right: 20px;

        }
        .box-header{
            padding: 20px 0 20px 20px;
        }

    </style>
    <script>
        $(function(){


            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        })
    </script>
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
            <h1>订单列表</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
                <li class="active">订单列表</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <div class="pull-left">
                                <form id="searchUsersForm" class="form-inline">
                                    <div class="form-group">
                                        订单状态:
                                        <select name="status" id="status" class="form-control">
                                            <option value="0">全部订单</option>
                                            <option value="1" <?php if(isset($search['status']) && $search['status']==1){echo 'selected';}?>>待付款</option>
                                            <option value="2" <?php if(isset($search['status']) && $search['status']==2){echo 'selected';}?>>待派单</option>
                                            <option value="3" <?php if(isset($search['status']) && $search['status']==3){echo 'selected';}?>>处理中</option>
                                            <option value="4" <?php if(isset($search['status']) && $search['status']==4){echo 'selected';}?>>已完单</option>
                                            <option value="5" <?php if(isset($search['status']) && $search['status']==5){echo 'selected';}?>>已评价</option>
                                            <option value="6" <?php if(isset($search['status']) && $search['status']==6){echo 'selected';}?>>已取消</option>
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        订单编号:
                                        <input type="text" class="form-control" name="order_sn" id="order_sn" placeholder="输入订单编号..." value="<?php if(isset($search['order_sn'])){echo $search['order_sn'];};?>"/>
                                    </div>
                                    <div class="form-group">
                                        创建时间:
                                        <input type="text" class="form-control" name="add_time" id="add_time" placeholder="<?php echo date('Ymd')?>" value="<?php if(isset($search['add_time'])){echo $search['add_time'];};?>"/>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info" name="dosearch" style="margin-left: 30px;width: 80px">搜索</button>
                                        <button type="button" class="btn btn-info" name="dosearch" id="export" style="margin-left: 30px;width: 80px">导出</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="tables">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" id="checkall"/></th>
                                        <th>订单编号</th>
                                        <th>服务商</th>
                                        <th>订单状态</th>
                                        <th>地址</th>
                                        <th>联系方式</th>
                                        <th>订单总额</th>
                                        <th>创建时间</th>
                                        <th>操作管理</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(isset($datas) && !empty($datas)):?>
                                        <?php foreach($datas as $v):?>
                                            <tr>
                                                <td><input type="checkbox" name="subcheckbox[]" value="<?php echo $v['order_id'];?>"/></td>

                                                <td><?php echo $v['order_sn'];?></td>
                                                <td>
                                                    <?php echo $v['seller_id'];?>
                                                </td>
                                                <td><?php echo $v['status'];?></td>
                                                <td>
                                                    <?php echo $v['address'];?>
                                                </td>
                                                <td>
                                                    <?php echo $v['mobile'];?>
                                                </td>

                                                <td>
                                                    <?php echo $v['order_amount'];?>
                                                </td>
                                                <td>
                                                    <?php echo $v['add_time'];?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-danger" href="<?php echo site_url('order/info') .'?id='. $v['order_id']?>">详情</a>
                                                    <?php if(empty($v['shipping_time']) && $v['order_status'] == 1):?>
                                                    <a class="btn btn-sm btn-primary" onclick="selectAgency(this)" data-id="<?php echo $v['order_id'];?>">派单</a>
                                                    <?php endif;?>
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
    <script>
        var subcheckboxs = $('input[name="subcheckbox[]"]');
        $('#export').on('click',function () {
            var data = $('#searchUsersForm').serialize();
            window.open("/order/exportOrder" +'?'+ data);
        });

        function selectAgency(e) {
            var id = $(e).data('id');
            layer.open({
                type: 2,
                title: '选择服务商',
                shadeClose: true,
                shade: 0.8,
                area: ['945px', '90%'],
                content: '/order/selectAgency?id='+id //iframe的url
            });
        }

    </script>
</body>
</html>