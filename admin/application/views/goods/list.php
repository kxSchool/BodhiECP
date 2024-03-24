<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>容易办总控管理系统 | 商品管理</title>
    <?php $this -> load -> view('common/top'); ?>
   <style>
    .tables{
        text-align: center;
    }
    .tables  thead th{
        text-align: center;
    }
     .tables tbody tr td{
        height: 100px !important;
        line-height: 100px !important;
    }
    .proImg img{
        width: 160px;
        height: 100px;
    }
   </style>
    <script>
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
            <h1>商品管理</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
                <li class="active">商品管理</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <div class="pull-left">
                                <a type="button" class="btn btn-success" href="<?php echo site_url('goods/addGoods');?>"><span class="glyphicon glyphicon-plus"></span>添加商品</a>
<!--                                <a type="button" class="btn btn-default" href="javascript:;" onclick="deleteBatch()"><span class="glyphicon glyphicon-plus"></span>批量删除</a>-->
                            </div>
                            <div class="pull-right">
                                <form id="searchUsersForm" class="form-inline" method="post" action="<?php echo site_url('goods/index');?>">
                                    <div class="form-group">
                                        <input type="hidden" name="type" value="<?php if(isset($type)):?><?php echo $type;?><?php endif;?>" />
                                        <select class="form-control" name="searchtype" id="searchtype">
                                            <option value="0">==搜索条件==</option>
                                            <option value="1" <?php if(isset($searchtype) && $searchtype == 1):?>selected<?php endif;?>>商品名称</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="searchtext" id="searchtext" placeholder="输入搜索内容..." value="<?php if(isset($searchtext) && !empty($searchtext)):?><?php echo $searchtext;?><?php endif;?>" />
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info" name="dosearch" value="1">搜索</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="tables">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" id="checkall"/></th>
                                        <th style="width:15%">图片</th>
                                        <th>商品标题</th>
                                        <th>是否计数</th>
                                        <th>状态</th>
                                        <th>操作管理</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(isset($datas) && !empty($datas)):?>
                                        <?php foreach($datas as $v):?>
                                            <tr>

                                                <td><input type="checkbox" name="subcheckbox[]" value="<?php echo $v['id'];?>"/></td>
                                                <td class="proImg"><img src="<?php echo $this->config->item('goods_images_url').$v['picname'];?>" alt=""></td>
                                                <td><?php echo $v['all_name'];?></td>

                                                <td>
                                                    <a class="btn btn-sm btn-info btn-xs">否</a>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="onoffswitchspace" spaceid="<?php echo $v['id'];?>" value="<?php echo $v['status'];?>" <?php if($v['status'] == 1):?>checked<?php endif;?> />
                                                </td>

                                                <td>
                                                    <a class="btn btn-sm btn-info" href="<?php echo site_url('goods/edit').'?id='.$v['id']?>">编辑</a>
                                                    <a class="btn btn-sm btn-danger" onclick="delGoods(this)" data-id="<?php echo $v['id'];?>">删除</a>
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
    <script>
        var subcheckboxs = $('input[name="subcheckbox[]"]');
        // function deleteBatch() {
        //     var goodsArr = new Array();
        //     $("input[name='subcheckbox']").each(function(){
        //         if($(this).is(":checked"))
        //         {
        //             goodsArr.push($(this).val());
        //         }
        //
        //     });
        //     var data = JSON.stringify(goodsArr);
        //     layer.confirm('确定要删除商品吗？', {
        //         btn: ['确定','取消'] //按钮
        //     }, function(){
        //
        //         $.ajax({
        //             url : '/goods/deleteBatch',
        //             type : 'POST',
        //             data : {data:data},
        //             dataType : 'JSON',
        //             success : function (res) {
        //                 if(res.code == 1){
        //                     layer.alert(res.msg);
        //                 }else{
        //                     location.reload();
        //                 }
        //             }
        //         });
        //     });
        //
        // }
        function delGoods(e) {
            var id = $(e).data('id');

            layer.confirm('确定要删除商品吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){

                $.ajax({
                    url : '/goods/delGoods?id=' + id,
                    type : 'GET',
                    dataType : 'JSON',
                    success : function (res) {
                        if(res.code == 1){
                            layer.alert(res.msg);
                        }else{
                            location.reload();
                        }
                    }
                });
            });
        }

        //广告位关闭开启操作
        $("[name='onoffswitchspace']").bootstrapSwitch({
            'onText' : '开',
            'offText' : '关'
        });
        $('input[name="onoffswitchspace"]').on('switchChange.bootstrapSwitch', function(event, state) {
            var disabledvalue = this.value;//得到当前的值
            //点击后应该改变的值
            if(disabledvalue == 1){
                disabledvalue = 0;
            }else{
                disabledvalue = 1;
            }
            this.value = disabledvalue;
            var spaceid = this.getAttribute('spaceid');
            $.ajax({
                url : "<?php echo site_url('goods/changeGoodsStatus');?>",
                type : 'post',
                dataType : 'json',
                data : {'goods_id':spaceid,'disabled':disabledvalue},
                success:function(data){
                    if(data.info != 1){
                        layer.alert(data.tip, {icon: 5});
                    }
                }
            });
        });
    </script>
</body>
</html>