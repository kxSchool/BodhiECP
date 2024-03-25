<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>集团中台管理系统 | 栏目管理</title>
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
            <h1>栏目列表</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
                <li class="active">栏目管理</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <div class="pull-left">
                                <div class="pull-left">
                                    <a type="button" class="btn btn-success" onclick="addChannel()"><span class="glyphicon glyphicon-plus"></span>添加栏目</a>
                                    <!--                                <a type="button" class="btn btn-default" href="javascript:;" onclick="deleteBatch()"><span class="glyphicon glyphicon-plus"></span>批量删除</a>-->
                                </div>

                                <!--<form id="searchUsersForm" class="form-inline">
                                    <div class="form-group">
                                        <label>会员ID:</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="text" class="form-control" name="uid" placeholder="输入会员ID..." value=""/>
                                    </div>
                                    <div class="form-group">
                                        <label>时间范围:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="reservation" name="time" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info" name="dosearch" style="margin-left: 30px;width: 80px" value="1">搜索</button>
                                    </div>
                                </form>
                            -->
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="tables">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" id="checkall" value="1"/></th>
                                        <th>ID</th>
                                        <th>类型</th>
                                        <th>名称</th>
                                        <th>URL</th>
                                        <th>状态</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(isset($datas) && !empty($datas)):?>
                                        <?php foreach($datas as $v):?>
                                            <tr>
                                                <td><input type="checkbox" name="subcheckbox[]" value="<?php echo $v['catid'];?>"/></td>

                                                <td><?php echo $v['catid'];?></td>
                                                <td>
                                                    <?php if($v['type'] == 1):?>
                                                        <botton class="btn btn-info btn-xs">栏目</botton>
                                                    <?php elseif ($v['type'] == 2):?>
                                                        <botton class="btn btn-default btn-xs">列表</botton>
                                                    <?php else:?>
                                                        <botton class="btn bg-navy btn-xs">链接</botton>
                                                    <?php endif;?>
                                                </td>
                                                <td><?php echo $v['catname'];?></td>
                                                <td>
                                                    <a class="btn btn-default btn-xs" href="<?php echo $v['url'];?>" target="_blank">
                                                        <i class="fa fa-link"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <?php if($v['ismenu'] == 1):?>
                                                        <span class="badge bg-green">显示</span>
                                                    <?php else:?>
                                                        <span class="badge bg-red">关闭</span>
                                                    <?php endif;?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-info" onclick="editChannelInfo(this)" data-id="<?php echo $v['catid'];?>">修改</a>
                                                    <a class="btn btn-sm btn-danger" onclick="delChannel(this)" data-id="<?php echo $v['catid'];?>">删除</a>
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
        function addChannel() {

            layer.open({
                type: 2,
                title: '添加栏目',
                shadeClose: true,
                shade: 0.8,
                area: ['945px', '65%'],
                content: '/cms/addChannel'//iframe的url
            });
        }
        function delChannel(e) {
            layer.confirm('确定删除该栏目?', {
                btn: ['非常坚决','考虑一下'] //按钮
            }, function(){
                $.ajax({
                    url : '/cms/delChannel?id=' + $(e).data('id'),
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
        function editChannelInfo(e) {
            var id = $(e).data('id');
            layer.open({
                type: 2,
                title: '编辑栏目',
                shadeClose: true,
                shade: 0.8,
                area: ['945px', '65%'],
                content: '/cms/editChannel?id='+id//iframe的url
            });
        }
    </script>
</body>
</html>