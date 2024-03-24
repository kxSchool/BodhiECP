<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>容易办总控管理系统 | 评论列表</title>
    <?php $this -> load -> view('common/top'); ?>
    <link rel="stylesheet" href="<?php echo STATIC_PATH;?>bootstrapSelect/bootstrap-select.min.css">
    <script src="<?php echo STATIC_PATH;?>bootstrapSelect/bootstrap-select.min.js"></script>
    <style>
        .form-group{
            margin-right: 20px;

        }
        .box-header{
            padding: 20px 0 20px 20px;
        }


    </style>
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
            <h1>添加评论</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
                <li class="active">添加评论</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <div class="pull-left">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">快速添加</a></li>
                                    <li role="presentation" ><a href="#home" aria-controls="home" role="tab" data-toggle="tab">普通添加</a></li>

                                </ul>
                            </div>
                        </div><!-- /.box-header -->



                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane" id="home">
                                <div class="box-body">
                                    <form class="form-horizontal" id="addForm">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="user-id" class="col-sm-2 control-label">用户ID</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="user-id" value=""  name="user_id">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="order-id" class="col-sm-2 control-label">订单ID</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="order-id" name="order_id"  value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="goods-id" class="col-sm-2 control-label">商品ID</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="goods-id" name="goods_id"  value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="content" class="col-sm-2 control-label">内容</label>
                                                <div class="col-sm-4">
                                                    <textarea name="content" id="content" cols="100" rows="10"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="content" class="col-sm-2 control-label">专业程度</label>
                                                <div class="col-sm-4" style="padding: 8px 0 0 10px">
                                                    <select id="flag" class="form-control" name="professional" tabindex="-98">
                                                        <option value="5">五星</option>
                                                        <option value="4">四星</option>
                                                        <option value="3">三星</option>
                                                        <option value="2">二星</option>
                                                        <option value="1">一星</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="content" class="col-sm-2 control-label">服务态度</label>
                                                <div class="col-sm-4" style="padding: 8px 0 0 10px">
                                                    <select id="flag" class="form-control" name="attitude" tabindex="-98">
                                                        <option value="5">五星</option>
                                                        <option value="4">四星</option>
                                                        <option value="3">三星</option>
                                                        <option value="2">二星</option>
                                                        <option value="1">一星</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="content" class="col-sm-2 control-label">办事效率</label>
                                                <div class="col-sm-4" style="padding: 8px 0 0 10px">
                                                    <select id="flag" class="form-control" name="effect" tabindex="-98">
                                                        <option value="5">五星</option>
                                                        <option value="4">四星</option>
                                                        <option value="3">三星</option>
                                                        <option value="2">二星</option>
                                                        <option value="1">一星</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="tag" class="col-sm-2 control-label">标签</label>
                                                <div class="col-sm-4" style="padding: 8px 0 0 10px" id="tag-select">
                                                    <select id="tag" class="form-control selectpicker" multiple="" name="tag[]" tabindex="-98">
                                                        <?php if(isset($tags) && !empty($tags)):?>
                                                        <?php foreach ($tags as $tid => $tag):?>
                                                                <option value="<?php echo $tag['tagid']?>"><?php echo $tag['tagname']?></option>
                                                        <?php endforeach;?>
                                                        <?php endif;?>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="content" class="col-sm-2 control-label">状态</label>
                                                <div class="col-sm-4">
                                                    <input type="checkbox" name="onoffstatus" checked="checked"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="content" class="col-sm-2 control-label">热门</label>
                                                <div class="col-sm-4">
                                                    <input type="checkbox" name="onoffhot"/>
                                                </div>
                                            </div>
                                        </div><!-- /.box-body -->
                                        <div style="margin-left: 230px">
                                            <button class="btn btn-default">重置</button>
                                            <button class="btn btn-info" style="margin-left: 50px" onclick="addComment()" type="button">添加</button>
                                        </div>
                                    </form>
                                </div><!-- /.box-body -->
                            </div>
                            <div role="tabpanel" class="tab-pane active" id="profile">
                                <div class="box-body">
                                    <form class="form-horizontal" action="/comment/fastadd" method="post">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="count" class="col-sm-2 control-label">数量</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="count"  name="count" placeholder="默认为20条" value="20">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="goods" class="col-sm-2 control-label">服务类型</label>
                                                <div class="col-sm-4">
                                                    <select name="server" id="server" class="form-control">
                                                        <option value="0">默认随机</option>
                                                        <option value="1">工商服务</option>
                                                        <option value="2">财税服务</option>
                                                        <option value="3">认证服务</option>
                                                        <option value="4">资质办理</option>
                                                        <option value="5">知识产权</option>
                                                        <option value="6">法律服务</option>
                                                        <option value="7">金融服务</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="star" class="col-sm-2 control-label">星级</label>
                                                <div class="col-sm-4">
                                                    <select name="star" id="star" class="form-control">
                                                        <option value="1">一星</option>
                                                        <option value="2">二星</option>
                                                        <option value="3">三星</option>
                                                        <option value="4">四星</option>
                                                        <option value="5">五星</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div><!-- /.box-body -->
                                        <div style="margin-left: 230px">
                                            <button class="btn btn-info" style="margin-left: 50px" type="submit">快速添加</button>
                                        </div>
                                    </form>
                                </div><!-- /.box-body -->
                            </div>

                        </div>

                    </div>

                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <?php $this -> load -> view('common/footer'); ?>
    <script>
        $("[name='onoffstatus']").bootstrapSwitch({
            'onText' : '开',
            'offText' : '关'
        });
        $("[name='onoffhot']").bootstrapSwitch({
            'onText' : '开',
            'offText' : '关'
        });

        //多选下拉框
        $(".selectpicker").selectpicker({
            noneSelectedText : '选择标签'//默认显示内容
        });
        function addComment() {
            var data = $('#addForm').serialize();
            $.ajax({
                data : data,
                url : '/comment/addComment',
                type : 'POST',
                dataType : 'JSON',
                success: function (res) {
                    if(res.code == 0){
                        layer.msg(res.msg, {icon: 1});
                        setTimeout(function () {
                            location.reload();
                        },500)
                    }else{
                        layer.msg(res.msg, {icon: 2});
                        if(res.code == 1){
                            $('#user-id').focus();
                        }else if (res.code == 2){
                            $('#order-id').focus();
                        }else if (res.code == 3){
                            $('#goods-id').focus();
                        }else if (res.code == 4){
                            $('#content').focus();
                        }else if (res.code == 5){
                            $('#tag-select .bootstrap-select').addClass('open');
                            $('#tag-select .bootstrap-select button').attr('aria-expanded','true');
                        }
                    }
                }
            });
        }
    </script>
</body>
</html>