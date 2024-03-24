<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>集团总控管理系统 | 进度类管理</title>
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
            <h1>添加子进度</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
                <li><a href="<?php echo site_url('goods/progress');?>">进度管理</a></li>

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
                            <form id="spaceForm" class="form-horizontal" method="post" action="<?php echo site_url('goods/saveProChild');?>">
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">标题：</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="title" id="title" placeholder="标题" value="" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description" class="col-sm-2 control-label">描述：</label>
                                    <div class="col-sm-4">
                                        <textarea class="form-control" name="description" id="description" placeholder="描述"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="a" class="col-sm-2 control-label">是否可用：</label>
                                    <div class="col-sm-4">
                                        <input type="checkbox" class="" name="disabled" checked/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="a" class="col-sm-2 control-label">排序：</label>
                                    <div class="col-sm-1">
                                        <input type="number" class="form-control" name="sort"/>
                                    </div>
                                </div>
                                <div class="col-sm-offset-2">
                                    <a href="javascript:history.go(-1)" class="btn btn-danger">取消</a>
                                    <button type="submit" class="btn btn-success">保存</button>
                                </div>
                                <input type="hidden" name="pid" value="<?php echo $pid;?>">
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
        $(function(){
            /**添加、编辑广告位验证**/
            $('#spaceForm').bootstrapValidator({
                message: '此值无效',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    name: {
                        group: '.col-sm-10',
                        validators: {
                            notEmpty: {
                                message: '广告位名不能为空'
                            }
                        }
                    },
                    width: {
                        group: '.col-sm-10',
                        validators: {
                            notEmpty: {
                                message: '请输入广告位宽度'
                            },
                            regexp: {
                                regexp: /^(\d+\.\d{1}|\d+)$/,
                                message: '数值大小无效'
                            },
                        }
                    },
                    height: {
                        group: '.col-sm-10',
                        validators: {
                            notEmpty: {
                                message: '请输入广告位高度'
                            },
                            regexp: {
                                regexp: /^(\d+\.\d{1}|\d+)$/,
                                message: '数值大小无效'
                            },
                        }
                    }
                }
            });
        })
    </script>
</body>
</html>