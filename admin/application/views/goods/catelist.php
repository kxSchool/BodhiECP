<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>集团总控管理系统 | 节点管理</title>
    <?php $this -> load -> view('common/top'); ?>
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
            <h1>分类管理</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
                <li class="active">分类管理</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <a type="button" class="btn btn-success" href="<?php echo site_url('goods/addCate');?>"><span class="glyphicon glyphicon-plus"></span> 创建分类</a>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>节点</th>
                                    <th>热门 </th>
                                    <th>状态</th>
                                    <th>操作管理</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(isset($showpriv) && !empty($showpriv)):?>
                                    <?php foreach($showpriv as $v):?>
                                        <tr>
                                            <td><?php echo $v['cat_id'];?></td>
                                            <?php
                                            $nbsp = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$v['level']);
                                            ?>
                                            <td> <span><?php echo $nbsp;?><?php echo $v['spacer'];?></span><?php echo $v['cat_name'];?></td>
                                            <td>
                                                <?php if($v['is_hot'] == 1):?>
                                                    <button data-id="<?php echo $v['cat_id'];?>" type="button" class="btn btn-primary btn-xs" onclick="changeHot(this)">是</button>
                                                <?php else:?>
                                                    <button data-id="<?php echo $v['cat_id'];?>" type="button" class="btn btn-danger btn-xs"  onclick="changeHot(this)">否</button>
                                                <?php endif;?>
                                            </td>
                                            <td>
                                                <?php if($v['is_show'] == 1):?>
                                                <button data-id="<?php echo $v['cat_id'];?>" type="button" class="btn btn-primary btn-xs"  onclick="changeShow(this)">启用</button>
                                                <?php else:?>
                                                <button data-id="<?php echo $v['cat_id'];?>" type="button" class="btn btn-danger btn-xs"  onclick="changeShow(this)">关闭</button>
                                                <?php endif;?>

                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-info" href="<?php echo site_url('goods/editCate').'?id='.$v['cat_id'];?>">编辑</a>
                                                <a class="btn btn-sm btn-danger" data-id="<?php echo $v['cat_id'];?>" onclick="delCate(this)">删除</a>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <?php $this -> load -> view('common/footer'); ?>
    <script>

        function delCate(e) {
            layer.confirm('确认要删除该条记录吗？', {
                btn: ['确认','取消'] //按钮
            }, function(){
                $.ajax({
                    url : '/goods/delCate',
                    type : 'post',
                    dataType : 'json',
                    data : {'id':$(e).data('id')},
                    success:function(res){
                        if(res.code == 0){
                            location.reload();
                        }else{
                            layer.alert(res.msg, {icon: 5});
                        }
                    }
                });
            });
        }

        function changeHot(e) {
            $.ajax({
                url : '/goods/changeCate',
                type : 'post',
                dataType : 'json',
                data : {'id':$(e).data('id'),'type':'is_hot'},
                success:function(res){
                    if(res.code == 0){
                        location.reload();
                    }else{
                        layer.alert(res.msg, {icon: 5});
                    }
                }
            });
        }

        function changeShow(e) {
            $.ajax({
                url : '/goods/changeCate',
                type : 'post',
                dataType : 'json',
                data : {'id':$(e).data('id'),'type':'is_show'},
                success:function(res){
                    if(res.code == 0){
                        location.reload();
                    }else{
                        layer.alert(res.msg, {icon: 5});
                    }
                }
            });
        }
    </script>
</body>
</html>