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
                <li><a href="<?php echo site_url('goods/cateList');?>">分类管理</a></li>
                <li class="active">编辑分类</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <form class="form-horizontal" method="post" action="<?php echo site_url('goods/addCate');?>">
                                <div class="form-group">
                                    <label for="parentid" class="col-sm-2 control-label">上级分类：</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="parentid" id="parentid">
                                            <option value="0">==顶级分类==</option>
                                            <?php if(isset($cateTree)):?>
                                                <?php foreach($cateTree as $v):?>
                                                    <?php
                                                    $nbsp = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$v['level']);
                                                    ?>
                                                    <option value="<?php echo $v['cat_id'];?>"><?php echo $nbsp;?><?php echo $v['spacer'].$v['cat_name'];?></option>
                                                <?php endforeach;?>
                                            <?php endif;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">分类名称：</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="name" placeholder="分类名称" value="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">是否热门：</label>
                                    <div class="col-sm-10">
                                        <input type="checkbox" class="" name="is_hot"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="a" class="col-sm-2 control-label">是否显示：</label>
                                    <div class="col-sm-10">
                                        <input type="checkbox" class="" name="is_show" checked/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="data" class="col-sm-2 control-label">排序：</label>
                                    <div class="col-sm-1">
                                        <input type="text" class="form-control" name="sort" id="data" placeholder="序号" value="0" />
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
    <script>
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    </script>
</body>
</html>