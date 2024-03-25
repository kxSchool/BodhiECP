<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>服务商系统 | 资金明细</title>
    <?php $this -> load -> view('common/top'); ?>
    <!--<link rel="stylesheet" href="--><?php //echo STATIC_PATH; ?><!--datetimepicker/bootstrap-datetimepicker.min.css" />-->
    <script src="<?php echo STATIC_PATH; ?>datetimepicker/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_PATH; ?>datetimepicker/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
    <style>
        .account-table{
            text-align: center;
            width: 80%;
            font-size: 22px;
        }
        .account-number{
            font-size: 26px;
        }
        .account-disabled{
            color: #888;
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
            <div class="jumbotron">
                <table class="account-table">
                    <tr>
                        <td>账户金额</td>
                        <td></td>
                        <td>暂时冻结金额</td>
                        <td></td>
                        <td>可申请提现金额</td>
                        <td></td>
                    </tr>
                    <tr class="account-number">
                        <td><?php echo sprintf("%.2f",$money + $frozen);?></td>
                        <td>=</td>
                        <td class="account-disabled"><?php echo sprintf("%.2f",$frozen);?></td>
                        <td>+</td>
                        <td><?php echo sprintf("%.2f",$money);?></td>
                        <td><button type="button" class="btn btn-success" id="tixian">申请提现</button></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <div class="pull-right">
                                <form id="searchNewsForm" class="form-inline" method="get" action="">
                                    <div class="form-group">
                                        <select class="form-control" name="fields" id="fields">
                                            <option value="0">==选择栏目==</option>
                                            <option value="staff_name"  <?php if(isset($fields) && !empty($fields)):?><?php if($fields == 'staff_name'):?>selected<?php endif;?><?php endif;?>>操作人</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="search" id="search" placeholder="输入搜索内容..." value="<?php if(isset($search) && !empty($search)):?><?php echo $search;?><?php endif;?>"/>
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
                                    <th>日期</th>
                                    <th>流水号</th>
                                    <th>操作人</th>
                                    <th>支出/收入</th>
                                    <th>余额</th>
                                    <th>备注</th>
                                    <th>状态</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(isset($datas)):?>
                                        <?php foreach($datas as $v):?>
                                            <tr>
                                                <td><?php echo date('Y-m-d H:i:s',$v['change_time']);?></td>
                                                <td><?php echo $v['log_sn'];?></td>
                                                <td><?php echo $v['staff_name'];?></td>
                                                <td>
                                                    <?php if($v['status'] == 1 || $v['status'] == 4){echo '-';}else{echo '+';}?>
                                                    <?php echo $v['change_money'];?>
                                                </td>
                                                <td><?php echo $v['user_money'];?></td>
                                                <td><?php echo $v['change_desc'];?></td>
                                                <td><?php echo $v['status_desc'];?></td>
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
    <style>
        body{
            position: relative;
        }
        .protocol{
            position: absolute;
            top: 20%;
            right: 23%;
            z-index: 1001;
        }
        .protocol-box{
            width:400px;
            height: 175px;
            background-color:#fff ;
            -moz-box-shadow:0px 1px 5px #333; 
            -webkit-box-shadow:0px 1px 5px #333;
             box-shadow:0px 1px 5px #333;
             padding-top:15px;
        }
        .protocol-title{
            text-align: center;
            font-size:14px;
            color: #de443c;
           
        }
        .protocol-box .content input{
            width:218px;
            height: 25px;
            outline:none;
        }
        .protocol-box .content .protocol-btn{ 
            text-align: center;
            margin-top: 30px;
        }
        .protocol-box .content .protocol-btn button{
            width:80px;
            height: 30px;
            outline: none;
            border:none;
            background-color: #de443c;
            color:#fff; 
        }
        .hidden{
            display: none;
        }
    </style>
    <div class="protocol on hidden" id="protocol">
        <div class="protocol-box ">
            <div class="protocol-title">
                每月结算日期为1号和15号
            </div>
            <div class="content">
                <label>输入提现金额(元)：</label>
                <input id="money" type="num" placeholder="当前最高可提现<?php echo sprintf("%.2f",$money);?>元"/>
                <div class="protocol-btn">
                    <button class="qxbtn" style="margin-right: 20px;">取消</button>
                    <button class="okbtn">确认</button>
                </div>
            </div>
             
        </div>
    </div>
    <script>
         $(function(){
            $('#tixian').on('click',function(){
                $('#protocol').removeClass('hidden')
            })
            $('.qxbtn').on('click',function(){
                $('#protocol').addClass('hidden')
            })
            $('.okbtn').on('click',function(){
                // $('#protocol').addClass('hidden')
                var money = parseInt($('#money').val());
                var max_money = "<?php echo $money;?>";

                if(money > max_money){
                    alert('当前最高可提现'+max_money+'元');
                    $('#money').val('');
                }else if(money === '' || money <=0 ){
                    alert('提现金额不得少于0.01元');
                    $('#money').val('');
                }else{
                    $.ajax({
                        data : {money:money},
                        url : '/finance/withdrawDeposit',
                        type : 'POST',
                        dataType : 'JSON',
                        success : function (res) {
                            if(res.code === 0){
                                alert(res.mes);
                                location.reload();
                            }else{
                                alert(res.mes);
                            }
                        }
                    });
                }
            });
         })
    </script>
</body>
</html>