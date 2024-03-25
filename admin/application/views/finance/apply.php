<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>集团中台管理系统 | 财务日志</title>
    <?php $this -> load -> view('common/top'); ?>
    <link rel="stylesheet" href="<?php echo STATIC_PATH; ?>datetimepicker/bootstrap-datetimepicker.min.css" />
    <script src="<?php echo STATIC_PATH; ?>datetimepicker/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_PATH; ?>datetimepicker/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
    <style>
        .form-group{
            margin-right: 20px;

        }
        .box-header{
            padding: 20px 0 20px 20px;
        }
        .agency-info{
            height: 40px;
            line-height: 40px;
            background-color: #00AD79;
            margin-bottom: 15px;
        }
        .agency{
            float: left;
            font-size: 15px;
            font-weight: 500;
            font-family: serif;
            color: #fff;
        }
        .agency-mobile{
            font-size: 12px;
            color:#eee;
        }
    </style>
    <script>
        $(function(){

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
            <h1>财务日志</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
                <li class="active">财务日志</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <div class="pull-left">
                                <form id="searchUsersForm" class="form-inline">
                                    <div class="form-group">
                                        服务商:
                                        <select name="shopid" id="shopid" class="form-control">
                                            <option value="0">全部</option>
                                            <?php foreach ($agency_list as $ak => $agency):?>
                                                <option <?php if(isset($search['shopid']) && $search['shopid'] == $agency['userid']){echo 'selected';}?> value="<?php echo $agency['userid'];?>"><?php echo $agency['username'];?></option>
                                            <?php endforeach;?>


                                        </select>

                                    </div>
                                    <div class="form-group">
                                        申请时间:

                                        <input name="time" id="change_time" readonly size="16" type="text"  class="form-control" value="<?php if(isset($search['time'])){echo $search['time'];}else{echo date('Y-m',time());}?>">

                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info" style="margin-left: 30px;width: 80px">搜索</button>
                                        <a onclick="reset()" class="btn btn-danger" style="margin-left: 30px;width: 80px">重置</a>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="tables">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" id="checkall" /></th>
                                        <th>服务商ID</th>
                                        <th>服务商</th>
                                        <th>联系方式</th>
                                        <th>提现总额</th>
                                        <th>最近一次提现时间</th>
                                        <th>操作管理</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(isset($datas) && !empty($datas)):?>
                                        <?php foreach($datas as $v):?>
                                            <tr>
                                                <td><input type="checkbox" name="subcheckbox[]" id="checkall"/></td>

                                                <td><?php echo $v['shopid'];?></td>
                                                <td>
                                                    <?php echo $v['username'];?>
                                                </td>
                                                <td>
                                                    <?php echo $v['mobile'];?>
                                                </td>
                                                <td>
                                                    <?php echo $v['change_money'];?>
                                                </td>
                                                <td>
                                                    <?php echo date('Y-m-d H:i:s',$v['change_time']);?>
                                                </td>

                                                <td>
                                                    <a class="btn btn-sm btn-info" onclick="getApplyInfo(this)" data-id="<?php echo $v['shopid'];?>" data-toggle="modal" data-target=".apply_info">详情</a>

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


        // $('.form_datetime').datepicker({format : 'yyyy-mm'});
        $("#change_time").datetimepicker({
            language:  'zh-CN',
            format: 'yyyy-mm',
            autoclose: 1,
            todayHighlight: 1,
            startView: 3,
            forceParse: 0,
            showMeridian: 1,
            minView:3,
            maxView:4,
        });
        function reset() {
            $('#searchUsersForm').find('input').val('');
            $('#searchUsersForm').find('select').val('');
            $('#searchUsersForm').submit();
        }
        function getApplyInfo(e) {
            var id = $(e).data('id');

            $('#info_list').text('');
            $('#agency-info').text('');

            layer.open({
                type: 2,
                title: '提现申请详情',
                shadeClose: true,
                shade: 0.8,
                area: ['945px', '65%'],
                content: '/finance/applyInfo?id='+id+'&time='+$('#change_time').val()   //iframe的url
            });
        }
    </script>
</body>
</html>