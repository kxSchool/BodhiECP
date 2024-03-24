<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>容易办总控管理系统 | 添加栏目</title>
    <?php $this -> load -> view('common/top'); ?>
    <style>
        .form-group{
            margin-right: 20px;

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

                        <div class="box-body">
                            <form class="form-horizontal" method="post" id="form">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="type" class="col-sm-2 control-label">类型</label>
                                        <div class="col-sm-10" id="type">
                                            <label class="radio-inline">
                                                <input type="radio" name="type" value="1" checked> 栏目
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="type" value="2"> 列表
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="type" value="3"> 链接
                                            </label>
                                            <div class="margin" style="margin-left:0;">
                                                <div class="alert alert-dismissable bg-info">
                                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                                    <strong>栏目</strong>: 栏目类型下不可以发布文章,但可以添加子栏目、列表、链接<br>
                                                    <strong>列表</strong>: 列表类型下可以发布文章,但不能添加子栏目<br>
                                                    <strong>链接</strong>: 链接类型下不可以发布文章和子级栏目<br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="order-id" class="col-sm-2 control-label">上级栏目</label>
                                        <div class="col-sm-4">
                                            <select name="parentid" id="parentid" class="form-control">
                                                <option value="0">无</option>
                                                <?php if(isset($list) && !empty($list)):?>
                                                <?php foreach ($list as $key => $value):?>
                                                    <?php $nbsp = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$value['level']);?>
                                                        <option value="<?php echo $value['catid'];?>" <?php if($value['type'] != 1){echo 'disabled=""';}?>> <?php echo $nbsp.$value['spacer'].$value['catname'];?></option>
                                                <?php endforeach;?>
                                                <?php endif;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="catname" class="col-sm-2 control-label">名称</label>
                                        <div class="col-sm-10">
                                            <textarea id="catname" class="form-control" name="catname" data-toggle="tooltip" title="" data-original-title="如果需要多个一次录入多个栏目时请用,分隔" aria-describedby="tooltip744100" aria-invalid="true"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="keywords" class="col-sm-2 control-label">关键字</label>
                                        <div class="col-sm-10">
                                            <input id="keywords" data-rule="" class="form-control" name="keywords" type="text" data-toggle="tooltip" data-original-title="多个关键字格式为：关键字1,关键字2" aria-describedby="tooltip744100" aria-invalid="true">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="col-sm-2 control-label">描述</label>
                                        <div class="col-sm-10">
                                            <textarea id="description" data-rule="" class="form-control" name="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="content" class="col-sm-2 control-label">是否显示</label>
                                        <div class="col-sm-4" style="padding: 8px 0 0 10px">
                                            <div class="radio">
                                                <label for="menu_i"><input id="menu_i" name="ismenu" type="radio" value="1" checked=""> 显示</label>
                                                <label for="menu_n"><input id="menu_n" name="ismenu" type="radio" value="0"> 隐藏</label>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.box-body -->
                                <div class="row"><label class="control-label col-xs-12 col-sm-2"></label><div class="col-xs-12 col-sm-8">
                                        <button type="button" onclick="formSubmit()" class="btn btn-success btn-embossed">确定</button>
                                        <button type="reset" class="btn btn-default btn-embossed">重置</button>
                                    </div></div>
                            </form>
                        </div><!-- /.box-body -->


                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <script>

        function formSubmit() {
            var data = $('#form').serialize();
            $.ajax({
                data : data,
                url : '/cms/addChannel',
                dataType : 'JSON',
                type : 'POST',
                success : function (res) {
                    if(res.code == 0){
                        layer.msg(res.msg, {icon: 1});
                        closeIframe();
                    }else{
                        layer.msg(res.msg, {icon: 2});
                    }
                }
            });
        }

        function closeIframe() {
            // var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
            parent.location.reload();  // 关闭layer
        }
    </script>
</body>
</html>