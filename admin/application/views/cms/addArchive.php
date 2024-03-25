<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>集团中台管理系统 | 发布文章</title>
    <?php $this -> load -> view('common/top'); ?>
    <link rel="stylesheet" href="<?php echo STATIC_PATH;?>plugins/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="<?php echo STATIC_PATH;?>bootstrapSelect/bootstrap-select.min.css">
    <script src="<?php echo STATIC_PATH;?>bootstrapSelect/bootstrap-select.min.js"></script>
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
            <h1>发布文章</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
                <li class="active">发布文章</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">

            <form class="form-horizontal" method="post" id="registerForm">
                <div class="row">
                    <div class="col-md-9">
                        <div class="box box-primary" style="border-top: #3c8dbc 5px solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">基本信息</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body no-padding">
                                <div class="mailbox-controls">

                                    <div class="form-group">
                                        <label for="catid" class="col-sm-2 control-label">栏目ID</label>
                                        <div class="col-sm-8">
                                            <select name="catid" id="catid" class="form-control">
                                                <?php if(isset($list) && !empty($list)):?>
                                                    <?php foreach ($list as $key => $value):?>
                                                        <?php $nbsp = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$value['level']);?>
                                                        <option value="<?php echo $value['catid'];?>" <?php if($value['type'] == 1){echo 'disabled=""';}?>> <?php echo $nbsp.$value['spacer'].$value['catname'];?></option>
                                                    <?php endforeach;?>
                                                <?php endif;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="title" class="col-sm-2 control-label">文章标题</label>
                                        <div class="col-sm-8">
                                            <input id="title" class="form-control" name="title" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="goods" class="col-sm-2 control-label">关联商品</label>
                                        <div class="col-sm-8">
                                            <div class="btn-group bootstrap-select show-tick form-control">

                                                <select id="goods" class="form-control selectpicker" multiple="" name="goods[]" tabindex="-98">
                                                    <?php if(isset($goods_list) && !empty($goods_list)):?>

                                                    <?php foreach ($goods_list as $k1=>$v1):?>
                                                            <option value="<?php echo $v1['id'];?>"><?php echo $v1['all_name'];?></option>
                                                    <?php endforeach;?>
                                                    <?php endif;?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="thumb" class="col-sm-2 control-label">缩略图</label>
                                        <div class="col-xs-12 col-sm-8">
                                            <div class="input-group">
                                                <input id="thumb_name" class="form-control" size="50" type="text" value="">
                                                <input id="thumb_path" class="form-control" size="50" name="thumb" type="hidden" value="">
                                                <div class="input-group-addon no-border no-padding">
                                                    <span style="position: relative;">
                                                         <!--<button type="button" class="btn btn-danger plupload" style="position: relative; z-index: 1;"><i class="fa fa-upload"></i> 上传</button>-->
                                                        <span class="moxie-shim moxie-shim-html5" style="cursor: pointer; display: inline-block;padding-top: 10px;border-radius: 4px; position: relative;top:-1px;left:5px; overflow: hidden; width: 65px; height: 34px; overflow: hidden; z-index: 0; background-color: #dd4b39;"">
                                                             <i class="fa fa-upload" style="color: #fff;"></i>
                                                             <span style="font-size: 14px;color:#fff;margin-top: 5px;">上传</span>
                                                            <input type="file" id="FileUpload" onchange="UploadFile()" style="cursor: pointer;position:absolute;top:0;right:0; font-size: 999px;opacity: 0; width: 100%; height: 100%; accept="image/gif,.gif,image/jpeg,.jpg,.jpeg,.jpe,image/png,.png,image/bmp,.bmp">
                                                        </span>
                                                    </span>
                                                    <span style="position: relative;top:-15px;left:4px;"><button type="button" id="chooseimage" class="btn btn-primary fachoose"><i class="fa fa-list"></i> 选择</button></span>
                                                </div>
                                                <span class="msg-box n-right" for="chooseimage"></span>
                                            </div>
                                            <ul class="row list-inline plupload-preview" id="p-image"></ul>
                                        </div>
                                    </div>
<!--                                    <div class="form-group">-->
<!--                                        <label for="url" class="col-sm-2 control-label">自定义url</label>-->
<!--                                        <div class="col-xs-12 col-sm-8">-->
<!--                                            <div class="input-group">-->
<!--                                                <div class="input-group-btn">-->
<!--                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">/cms/a/</button>-->
<!--                                                </div>-->
<!--                                                <input type="text" name="url" class="form-control" placeholder="请输入自定义的名称,为空将使用主键ID">-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
                                    <div class="form-group">
                                        <label for="description" class="col-sm-2 control-label">内容</label>
                                        <div class="col-xs-12 col-sm-8">
                                            <script id="container" name="content" type="text/plain">这里写你的初始化内容</script>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="keywords" class="col-sm-2 control-label">关键字</label>
                                        <div class="col-xs-12 col-sm-8">
                                            <input id="keywords" data-rule="" class="form-control" name="keywords" type="text" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="col-sm-2 control-label">描述</label>
                                        <div class="col-xs-12 col-sm-8">
                                            <textarea id="description" cols="60" rows="5" data-rule="" class="form-control" name="description"></textarea>
                                        </div>
                                    </div>
                                </div><!-- /.mail-box-messages -->
                            </div><!-- /.box-body -->
                            <div class="box-footer no-padding">
                                <div class="mailbox-controls">

                                    <input type="hidden" name="content" id="content">
                                    <button type="button" onclick="formSubmit()" class="btn btn-success btn-embossed" style="margin-left: 165px">确定</button>
                                    <button type="reset" class="btn btn-default btn-embossed">重置</button>
                                </div>
                            </div>
                        </div><!-- /. box -->
                    </div><!-- /.col -->
                    <div class="col-md-3">
                        <div class="box box-solid" style="border-top: #3c8dbc 3px solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">相关信息</h3>
                                <div class="box-tools">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="box-body no-padding">

                                <div id="myTabContent" class="tab-content" style="margin-top: 20px">
                                        <div class="tab-pane fade active in" id="one">
                                            <div class="form-group">
                                                <label for="views" class="control-label col-xs-12 col-sm-3">浏览:</label>
                                                <div class="col-xs-12 col-sm-8">
                                                    <div class="input-group margin-bottom-sm">

                                                        <input id="views" class="form-control" name="views" placeholder="浏览" type="number">
                                                        <span class="input-group-addon"><i class="fa fa-eye text-success"></i></span>
                                                    </div>
                                                </div>
                                            </div>
<!--                                            <div class="form-group">-->
<!--                                                <label for="c-comments" class="control-label col-xs-12 col-sm-3">评论:</label>-->
<!--                                                <div class="col-xs-12 col-sm-8">-->
<!--                                                    <div class="input-group margin-bottom-sm">-->
<!---->
<!--                                                        <input id="c-comments" class="form-control" name="row[comments]" placeholder="评论" type="number" value="17">-->
<!--                                                        <span class="input-group-addon"><i class="fa fa-comment text-info"></i></span>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
                                            <div class="form-group">
                                                <label for="likes" class="control-label col-xs-12 col-sm-3">点赞:</label>
                                                <div class="col-xs-12 col-sm-8">
                                                    <div class="input-group margin-bottom-sm">

                                                        <input id="likes" class="form-control" name="likes" placeholder="点赞" type="number">
                                                        <span class="input-group-addon"><i class="fa fa-thumbs-up text-danger"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="dislikes" class="control-label col-xs-12 col-sm-3">点踩:</label>
                                                <div class="col-xs-12 col-sm-8">
                                                    <div class="input-group margin-bottom-sm">
                                                        <input id="dislikes" class="form-control" name="dislikes" placeholder="点踩" type="number" value="">
                                                        <span class="input-group-addon"><i class="fa fa-thumbs-down text-gray"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="listorder" class="control-label col-xs-12 col-sm-3">排序:</label>
                                                <div class="col-xs-12 col-sm-8">
                                                    <div class="input-group margin-bottom-sm">
                                                        <input id="listorder" class="form-control" name="listorder" placeholder="排序" type="number">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                            </div><!-- /.box-body -->
                        </div><!-- /. box -->
                        <div class="box box-solid" style="border-top: #3c8dbc 3px solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">状态</h3>
                                <div class="box-tools">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="box-body no-padding">
                                <div id="myTabContent" class="tab-content" style="margin-top: 20px">
                                    <div class="tab-pane fade active in" id="one">
                                        <div class="form-group">
                                            <label for="c-flag" class="control-label col-xs-12 col-sm-3">标志:</label>
                                            <div class="col-xs-12 col-sm-8">

                                                <div class="btn-group bootstrap-select show-tick form-control">

                                                    <select id="flag" class="form-control selectpicker" multiple="" name="flag[]" tabindex="-98">
                                                        <option value="top">置顶</option>
                                                        <option value="recommend">推荐</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="c-status" class="control-label col-xs-12 col-sm-3">状态:</label>
                                            <div class="col-xs-12 col-sm-8">
                                                <div class="radio">
                                                    <label for="isshow-1"><input id="isshow-1" name="isshow" type="radio" value="1" checked=""> 显示</label>
                                                    <label for="isshow-0"><input id="isshow-0" name="isshow" type="radio" value="0"> 隐藏</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="publishtime" class="control-label col-xs-12 col-sm-3">发布:</label>
                                            <div class="col-xs-12 col-sm-8">
                                                <div class="radio">
                                                    <label for="publishtime-1"><input id="publishtime-1" name="publishtime" type="radio" value="1" checked=""> 发布</label>
                                                    <label for="publishtime-0"><input id="publishtime-0" name="publishtime" type="radio" value="0" > 保存</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div><!-- /.col -->

                </div>

            </form>

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <?php $this -> load -> view('common/footer'); ?>
    <script src="<?php echo STATIC_PATH;?>plugins/daterangepicker/moment.js" type="text/javascript"></div>
    <script src="<?php echo STATIC_PATH;?>plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo STATIC_PATH;?>ueditor/ueditor.config.js"></script>

<script type="text/javascript" src="<?php echo STATIC_PATH;?>ueditor/ueditor.all.js"></script>

<!-- 实例化编辑器 -->
<script type="text/javascript">
    //实例化编辑器
    var ue = UE.getEditor('container');
    //多选下拉框
    $(".selectpicker").selectpicker({
        noneSelectedText : '请选择'//默认显示内容
    });

    function formSubmit() {
        $('#content').val(ue.getContent());
        var data = $('#registerForm').serialize();
        $.ajax({
            data : data,
            url : '/cms/addArchive',
            type : 'POST',
            dataType: 'JSON',
            success : function (res) {
                if(res.code == 1){
                    layer.msg(res.msg, {icon: 2});
                }else{
                    layer.msg(res.msg, {icon: 1});
                    setTimeout(function () {
                        location.href = '/cms/archive';
                    },500)
                }
            }
        });
    }
    function UploadFile(){
        var fileObj = document.getElementById("FileUpload").files[0]; // js 获取文件对象

       var formFile = new FormData();
       formFile.append("userfile", fileObj); //加入文件对象
       $.ajax({
           url: "/upload/doUpload?type=thumb",
           data: formFile,
           type: "Post",
           dataType: "json",
           cache: false,//上传文件无需缓存
           processData: false,//用于对data参数进行序列化处理 这里必须false
           contentType: false, //必须
           success: function (res) {
               if(res.info == 1){
                   $('#thumb_name').val(res.data.client_name);
                   $('#thumb_path').val(res.data.file_name_url);
                   layer.msg(res.tip, {icon: 1});

               }else{
                   layer.msg(res.tip, {icon: 2});
               }
           },
       })
    }
</script>
</body>
</html>