<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>容易办总控管理系统 | 财务日志</title>
    <?php $this -> load -> view('common/top'); ?>
    <style>
        .form-group{
            margin-right: 20px;

        }
        .box-header{
            padding: 20px 0 20px 20px;
        }
        table{
            text-align: center;
        }
        table th {
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
                                        类型:
                                        <select name="status" id="status" class="form-control">
                                            <option value="0">全部</option>
                                            <option value="1" <?php if(isset($search['status']) && $search['status'] == 1){echo 'selected';}?>>提现审批</option>
                                            <option value="2" <?php if(isset($search['status']) && $search['status'] == 2){echo 'selected';}?>>转入钱包</option>
                                            <option value="3" <?php if(isset($search['status']) && $search['status'] == 3){echo 'selected';}?>>转入冻结</option>
                                            <option value="4" <?php if(isset($search['status']) && $search['status'] == 4){echo 'selected';}?>>申请提现</option>

                                        </select>

                                    </div>
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
                                        流水号:
                                        <input type="text" class="form-control" name="log_sn" id="log_sn" placeholder="输入流水号..." value="<?php if(isset($search['log_sn'])){echo $search['log_sn'];}?>"/>
                                    </div>
                                    <div class="form-group">
                                        创建时间:
                                        <input type="text" class="form-control" name="change_time" id="change_time" placeholder="<?php echo date('Ymd')?>" value="<?php if(isset($search['change_time'])){echo $search['change_time'];}?>"/>
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
                                        <th>流水号</th>
                                        <?php if(isset($search['status']) && $search['status'] == 1):?>
                                        <th>管理员</th>
                                        <?php endif;?>
                                        <th>服务商ID</th>
                                        <th>收入/支出</th>
                                        <th>账户余额</th>
                                        <th>状态</th>
                                        <th>备注</th>
                                        <th>操作时间</th>
                                        <th>操作管理</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(isset($datas) && !empty($datas)):?>
                                        <?php foreach($datas as $v):?>
                                            <tr>
                                                <td><input type="checkbox" name="subcheckbox[]" value="<?php echo $v['log_id'];?>"/></td>

                                                <td><?php echo $v['log_sn'];?></td>

                                                <?php if(isset($search['status']) && $search['status'] == 1):?>
                                                    <td>
                                                        <?php echo $v['adminid'] . ':' . $v['adminname'];?>
                                                    </td>
                                                <?php endif;?>
                                                <td>
                                                    <?php echo $v['shopid'];?>
                                                </td>


                                                <td>
                                                    <?php if($v['status'] == 1 || $v['status'] == 4){echo '-';}?>
                                                    <?php echo $v['change_money'];?>
                                                </td>
                                                <td>
                                                    <?php echo $v['user_money'];?>
                                                </td>
                                                <td>
                                                    <?php echo $v['status_desc'];?>
                                                </td>

                                                <td>
                                                    <?php echo $v['change_desc'];?>
                                                </td>
                                                <td>
                                                    <?php echo date('Y-m-d H:i:s',$v['change_time']);?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-danger" href="">详情</a>
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


        function reset() {
            $('#searchUsersForm').find('input').val('');
            $('#searchUsersForm').find('select').val('');
            $('#searchUsersForm').submit();
        }
    </script>
</body>
</html>