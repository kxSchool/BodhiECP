<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>服务商系统 | 订单详情</title>
    <?php $this->load->view('common/top'); ?>
  
    <!--<link rel="stylesheet" href="--><?php //echo STATIC_PATH; ?><!--datetimepicker/bootstrap-datetimepicker.min.css" />-->
    <script src="<?php echo CRM_STATIC_PATH; ?>datetimepicker/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="<?php echo CRM_STATIC_PATH; ?>datetimepicker/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
   
    <style>
        
        .jumbotron{
            padding: 5px 20px !important;
        }
        .jumbotron a{
            
            width: 200px;
            height: 70px;
            background-color: #dadada;
            color:#4a4947;
            display: inline-block;
            margin-right: 20px;
            margin-bottom: 8px;
            border: none;
            outline: none;
            text-align: center;
            padding-top: 10px;
            vertical-align: middle;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        .jumbotron a.usable:hover {
            background-color: #fd9536 !important;
            color:#fff;
        }
        
        .jumbotron .finished{
            background-color: #fd9536 !important;
            color:#fff;
        }
        .jumbotron .unfinished{
             background-color:#dadada !important;
             color:#4a4947;
        }
    	.clear{
    	   clear:both;
    	}
    </style>
   
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">
    <?php $this->load->view('common/header'); ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php $this->load->view('common/left'); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>订单详情</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url('index/home'); ?>"><i class="fa fa-home" ></i>控制面板</a></li>
                <li class="active">订单详情</li>
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
                                    <h3 class="panel-title">订单状态</h3>
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
                                        <?php if (isset($order_info) && !empty($order_info)): ?>
                                        <tr>
                                            <input type="hidden" id="order_id" value="<?php echo
$order_info['order_id']; ?>">
                                            <td><?php echo $order_info['order_sn']; ?></td>
                                            <td><?php echo $order_info['order_status']; ?></td>
                                            <td><?php echo $order_info['order_amount']; ?></td>
                                            <td><?php echo $order_info['address']; ?></td>
                                            <td><?php echo date('Y-m-d H:i:s', $order_info['add_time']); ?></td>
                                            <td><?php echo date('Y-m-d H:i:s', $order_info['pay_time']); ?></td>

                                        </tr>
                                        <?php endif; ?>
                                    </table>
                                </div>

                            </div>



                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">商品清单</h3>
                                </div>
                                <div class="panel-body">
                                    <table class="table text-center table-hover">
                                        <tr>
                                            <td>商品编号</td>
                                            <td>商品名称</td>
                                            <td>单价</td>
                                            <td>数量</td>

                                        </tr>
                                        <?php if (isset($goods_list) && !empty($goods_list)): ?>
                                        <?php foreach ($goods_list as $goods): ?>
                                            <tr>
                                                <td><?php echo $goods['goods_sn']; ?></td>
                                                <td><?php echo $goods['goods_name']; ?></td>
                                                <td><?php echo $goods['goods_price']; ?></td>
                                                <td> X <?php echo $goods['goods_count']; ?></td>
                                                
                                            </tr>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                    </table>
                                </div>
                            </div>
                        <div class="jumbotron">

                              <?php if (isset($order_progress) && !empty($order_progress)): ?>
                                  <?php foreach ($order_progress as $key => $value): ?>
                                      <?php if ($value['isFinish'] == 1): ?>
                                          <a class="finished clear" disabled="disabled" data-sort="<?php echo $value['sort']; ?>" data-progress="<?php echo $value['progress_id']; ?>" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo $value['goods_name']; ?>:<?php echo $value['progress']; ?>" ><?php echo date('Y-m-d H:i:s', $value['updatetime']); ?><br /> <?php echo $value['goods_name']; ?>:<?php echo $value['progress']; ?></a>
                                      <?php else: ?>
                                          <?php if ($value['sort'] == $enabled_sort): ?>
                                              <a onclick="changeOrder(this)" class="usable clear" data-sort="<?php echo $value['sort']; ?>" data-progress="<?php echo $value['progress_id']; ?>" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo $value['goods_name']; ?>:<?php echo $value['progress']; ?>"  >点击完成<br /> <?php echo $value['goods_name']; ?>:<?php echo $value['progress']; ?></a>
                                               <?php else: ?>
                                              <a disabled="disabled" class="unfinished clear"  data-sort="<?php echo $value['sort']; ?>" data-progress="<?php echo $value['progress_id']; ?>"  data-toggle="tooltip" data-placement="top" data-original-title="<?php echo $value['goods_name']; ?>:<?php echo $value['progress']; ?>"  >待完成<br /> <?php echo $value['goods_name']; ?>:<?php echo $value['progress']; ?></a>
                                          <?php endif; ?>
                                      <?php endif; ?>
                                  <?php endforeach; ?>
                              <?php endif; ?>
                                
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">订单操作记录</h3>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-bordered">
                                        <thead>
                                        <th>操作人</th>
                                        <th>商品</th>
                                        <th>内容</th>
                                        <th>操作时间</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (isset($order_record) && !
empty($order_record)): ?>
                                            <?php foreach ($order_record as $record): ?>
                                                <tr>
                                                    <td><?php echo $record['adminname']; ?></td>
                                                    <td><?php echo $record['goods_name']; ?></td>
                                                    <td><?php echo $record['progress']; ?></td>
                                                    <td><?php echo date('Y-m-d H:i:s',
$record['updatetime']); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div><!-- /.box-body -->

                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <?php $this->load->view('common/footer'); ?>
    <script>
        function changeOrder(e)
        {
            var _this = $(e);
            $.ajax({
                data : {oid : $('#order_id').val(),so : _this.data('sort')},
                type : 'POST',
                dataType : 'JSON',
                url : '/order/changeProgress',
                success : function (res) {
                    if(res.code == 0){
                        location.reload();
                    }
                }
            });
        }
    </script>
    <script>
      $(function () { $("[data-toggle='tooltip']").tooltip(); });
    </script>
</body>
</html>