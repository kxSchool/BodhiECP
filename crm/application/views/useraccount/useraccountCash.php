<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>容易办服务商中心系统 | 角色管理</title>
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
            <h1>提现管理</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
                <li><a href="<?php echo site_url('UserAccount/useraccount');?>">提现管理</a></li>
                <li class="active">创建</li>
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
                            <form id="roleForm" class="form-horizontal" method="post" action="">
                                <div class="form-group">
                                    <label for="rolename" class="col-sm-2 control-label">用户名：</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="realname" id="realname" placeholder="用户名" value="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description" class="col-sm-2 control-label">提现金额：</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="account" id="account" placeholder="提现金额" />
                                    </div>
                                </div>
                                <div class="col-sm-offset-2">
                                    <button type="submit" class="btn btn-success">提现</button>
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
        $(function(){
            /**添加、编辑管理角色验证**/
            $('#roleForm').bootstrapValidator({
                message: '此值无效',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    rolename: {
                        group: '.col-sm-10',
                        validators: {
                            notEmpty: {
                                message: '角色名不能为空'
                            }
                        }
                    }
                }
            });
        })
    </script>
</body>
</html>