<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>集团中台管理系统 | 评论列表</title>
    <?php $this -> load -> view('common/top'); ?>
    <link rel="stylesheet" href="<?php echo STATIC_PATH;?>plugins/daterangepicker/daterangepicker-bs3.css">
    <style>
        .form-group{
            margin-right: 20px;

        }
        .box-header{
            padding: 20px 0 20px 20px;
        }
        .table th,td{
            text-align: center;
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
            <h1>评论列表</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
                <li class="active">评论列表</li>
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
                                    <!--
                                    <div class="form-group">
                                        <label>类型:</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <select name="status" class="form-control">
                                            <option value="0">全部</option>
                                            <option value="1" <?php if(isset($search['status']) && $search['status']==1){echo 'selected';}?>>商品</option>
                                            <option value="2" <?php if(isset($search['status']) && $search['status']==2){echo 'selected';}?>>文章</option>
                                        </select>

                                    </div>
                                    -->
                                    <div class="form-group">
                                        <label>会员ID:</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="text" class="form-control" name="uid" placeholder="输入会员ID..." value="<?php if(isset($search['uid'])){echo $search['uid'];};?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label>时间范围:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="reservation" name="time" value="<?php if(isset($search['time'])){echo $search['time'];};?>">
                                        </div><!-- /.input group -->
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info" name="dosearch" style="margin-left: 30px;width: 80px" value="1">搜索</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="tables">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" id="checkall" value="1"/></th>
                                        <th>ID</th>
                                        <th>UID</th>
                                        <th>订单ID</th>
                                        <th>商品ID</th>
                                        <th>IP</th>
                                        <th>评论</th>
                                        <th>状态</th>
                                        <th>热门</th>
                                        <th>发布时间</th>
                                        <th>操作管理</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(isset($datas) && !empty($datas)):?>
                                        <?php foreach($datas as $v):?>
                                            <tr>
                                                <td><input type="checkbox" name="subcheckbox[]" value="<?php echo $v['comment_id'];?>"/></td>

                                                <td><?php echo $v['comment_id'];?></td>
                                                <td>
                                                    <?php echo $v['user_id'];?>
                                                </td>
                                                <td><?php echo $v['order_id'];?></td>
                                                <td>
                                                    <?php echo $v['goods_id'];?>
                                                </td>
                                                <td>
                                                    <?php echo $v['ip'];?>
                                                </td>
                                                <td>
                                                    <?php echo GetPartStr($v['content'],15);?>
                                                </td>
                                                <td>
                                                    <?php if($v['status'] == 1):?>
                                                        <span class="label label-success">启用</span>
                                                    <?php else:?>
                                                        <span class="label label-default">禁用</span>
                                                    <?php endif;?>
                                                </td>
                                                <td>
                                                    <?php if($v['is_hot'] == 1):?>
                                                        <span class="label label-danger">是</span>
                                                    <?php else:?>
                                                        <span class="label label-default">否</span>
                                                    <?php endif;?>
                                                </td>
                                                <td>
                                                    <?php echo date('Y-m-d H:i:s',$v['add_time']);?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-info" onclick="openCommentInfo(this)" data-id="<?php echo $v['comment_id'];?>">详情</a>
                                                    <a class="btn btn-sm btn-danger" onclick="delComment(this)" data-id="<?php echo $v['comment_id'];?>">删除</a>
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
    <script src="<?php echo STATIC_PATH;?>plugins/daterangepicker/moment.js" type="text/javascript"></script>
    <script src="<?php echo STATIC_PATH;?>plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <script>
        $('#reservation').daterangepicker();
        function openCommentInfo(e) {
            var id = $(e).data('id');
            layer.open({
                type: 2,
                title: '评论详情',
                shadeClose: true,
                shade: 0.8,
                area: ['945px', '90%'],
                content: '/comment/edit?id='+id //iframe的url
            });
        }
        function delComment(e) {
            layer.confirm('确定删除该评论?', {
                btn: ['非常坚决','考虑一下'] //按钮
            }, function(){
                $.ajax({
                    url : '/comment/delComment?id=' + $(e).data('id'),
                    type : 'GET',
                    dataType : 'JSON',
                    success : function (res) {
                        if(res.code == 0){
                            layer.msg(res.msg, {icon: 1});
                            setTimeout(function () {
                                location.reload();
                            },500)
                        }else{
                            layer.msg(res.msg, {icon: 2});
                        }
                    }
                });
            })
        }
    </script>
</body>
</html>