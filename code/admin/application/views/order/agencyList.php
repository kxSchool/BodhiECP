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

    </script>
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin: 0">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <div class="pull-left">
                                <form id="form" class="form-inline" method="get">
                                    <div class="form-group">
                                        服务商名称:
                                        <input type="text" class="form-control" name="name" id="order_sn" placeholder="输入服务商名称..." value="<?php if(isset($search['name'])){echo $search['name'];};?>"/>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info" style="margin-left: 30px;width: 80px">搜索</button>

                                    </div>
                                    <input id="order_id" type="hidden" name="id" value="<?php echo $search['id'];?>">
                                </form>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="tables">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>名称</th>
                                        <th>地区</th>
                                        <th>联系方式</th>
                                        <th>总订单数</th>
                                        <th>操作管理</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(isset($datas) && !empty($datas)):?>
                                        <?php foreach($datas as $v):?>
                                            <tr>
                                                <td><?php echo $v['username'];?></td>

                                                <td><?php echo $v['company_addr'];?></td>
                                                <td>
                                                    <?php echo $v['mobile'];?>
                                                </td>
                                                <td>
                                                    <?php echo $v['order_num'];?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-danger" onclick="allot(this)" data-id="<?php echo $v['userid'];?>">派单</a>
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
    <script>
        var order_id = $('#order_id').val();
        function allot(e) {
            layer.confirm('确认派单给该服务商', {
                btn: ['确定','取消'] //按钮
            }, function(){
                var id = $(e).data('id');
                $.ajax({
                    url : '/order/allot',
                    type : 'POST',
                    dataType : 'JSON',
                    data : {order_id:order_id,uid:id},
                    success : function (res) {
                        if(res.code == 1){
                            layer.alert(res.msg);
                        }else{

                            window.parent.location.reload(); //刷新父页面

                            var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
                            parent.layer.close(index);  // 关闭layer
                        }
                    }
                });
            })
        }
    </script>
</body>
</html>