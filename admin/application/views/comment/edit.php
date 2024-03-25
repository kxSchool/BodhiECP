<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>集团中台管理系统 | 评论详情</title>
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
                            <form class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="user-id" class="col-sm-2 control-label">用户ID</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="user-id" value="<?php echo $info['user_id'];?>" readonly="readonly" name="user_id">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="order-id" class="col-sm-2 control-label">订单ID</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="order-id" name="order_id" readonly="readonly" value="<?php echo $info['order_id'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="goods-id" class="col-sm-2 control-label">商品ID</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="goods-id" name="goods_id" readonly="readonly" value="<?php echo $info['goods_id'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="ip" class="col-sm-2 control-label">IP</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="ip" name="ip" readonly="readonly" value="<?php echo $info['ip'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="content" class="col-sm-2 control-label">内容</label>
                                        <div class="col-sm-4">
                                            <textarea name="content" id="content" cols="100" rows="10"><?php echo $info['content'];?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="content" class="col-sm-2 control-label">专业程度</label>
                                        <div class="col-sm-4" style="padding: 8px 0 0 10px">
                                            <?php for ($i = 1;$i<=5;$i++):?>
                                                <?php if($info['professional'] >= $i):?>
                                                    <i class="fa fa-star text-yellow"></i>
                                                <?php else:?>
                                                    <i class="fa fa-star-o text-yellow"></i>
                                                <?php endif;?>

                                            <?php endfor;?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="content" class="col-sm-2 control-label">服务态度</label>
                                        <div class="col-sm-4" style="padding: 8px 0 0 10px">
                                            <?php for ($i = 1;$i<=5;$i++):?>
                                                <?php if($info['attitude'] >= $i):?>
                                                    <i class="fa fa-star text-yellow"></i>
                                                <?php else:?>
                                                    <i class="fa fa-star-o text-yellow"></i>
                                                <?php endif;?>

                                            <?php endfor;?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="content" class="col-sm-2 control-label">办事效率</label>
                                        <div class="col-sm-4" style="padding: 8px 0 0 10px">
                                            <?php for ($i = 1;$i<=5;$i++):?>
                                                <?php if($info['effect'] >= $i):?>
                                                    <i class="fa fa-star text-yellow"></i>
                                                <?php else:?>
                                                    <i class="fa fa-star-o text-yellow"></i>
                                                <?php endif;?>

                                            <?php endfor;?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="content" class="col-sm-2 control-label">标签</label>
                                        <div class="col-sm-10" style="padding: 8px 0 0 10px">
                                            <?php if(!empty($info['tag_list'])):?>
                                                <?php foreach ($info['tag_list'] as $id => $item):?>
                                                    <span class="label label-danger"><?php echo $item['tagname'];?></span>
                                                <?php endforeach;?>
                                            <?php endif;?>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="content" class="col-sm-2 control-label">状态</label>
                                        <div class="col-sm-4">
                                            <input type="checkbox" name="onoffstatus"  <?php if($info['status'] == 1){echo 'checked';}?>/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="content" class="col-sm-2 control-label">热门</label>
                                        <div class="col-sm-4">
                                            <input type="checkbox" name="onoffhot" <?php if($info['is_hot'] == 1){echo 'checked';}?>/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="content" class="col-sm-2 control-label">发布时间</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="ip" name="ip" readonly="readonly" value="<?php echo date('Y-m-d H:i:s',$info['add_time']);?>">
                                        </div>
                                    </div>
                                </div><!-- /.box-body -->

                            </form>
                        </div><!-- /.box-body -->

                        <div class="box-footer clearfix">
                            <button type="button" class="btn btn-default pull-right" style="margin-left: 36px" onclick="closeIframe()">关闭</button>
<!--                            <button type="button" class="btn btn-info pull-right">修改</button>-->
                        </div>

                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <script>

        $("[name='onoffstatus']").bootstrapSwitch({
            'onText' : '开',
            'offText' : '关'
        });
        $("[name='onoffhot']").bootstrapSwitch({
            'onText' : '开',
            'offText' : '关'
        });
        $('input[name="onoffstatus"]').on('switchChange.bootstrapSwitch', function(event, state) {
            var disabledvalue = this.value;//得到当前的值
            //点击后应该改变的值
            if(disabledvalue == 1){
                disabledvalue = 0;
            }else{
                disabledvalue = 1;
            }
            this.value = disabledvalue;

        });
        $('input[name="onoffhot"]').on('switchChange.bootstrapSwitch', function(event, state) {
            var disabledvalue = this.value;//得到当前的值
            //点击后应该改变的值
            if(disabledvalue == 1){
                disabledvalue = 0;
            }else{
                disabledvalue = 1;
            }
            this.value = disabledvalue;

        });
        function closeIframe() {
            var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
            parent.layer.close(index);  // 关闭layer
        }
    </script>
</body>
</html>