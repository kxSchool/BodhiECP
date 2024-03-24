<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>容易办总控管理系统 | 财务日志</title>
    <?php $this -> load -> view('common/top'); ?>
    <style>
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
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        })
    </script>
</head>
<body class="">
<div class="wrapper">

    <div class="agency-info col-lg-12" id="agency-info">
        <p class="agency"><?php if(isset($agency['username'])){echo $agency['username'];}?><span class="agency-mobile">(<?php if(isset($agency['mobile'])){echo $agency['mobile'];}?>)</span></p><p style="float: right;color: #fff;"><?php if(isset($total)){echo $total;}?>条记录</p>';
    </div>
    <div class="col-lg-4" style="margin-bottom: 15px">
        <a class="btn btn-danger" onclick="approveBatch()">全部审批</a>
    </div>
    <div class="tables">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>
                    <input type="checkbox" id="checkall"/>
                </th>
                <th>流水号</th>
                <th>服务商ID</th>
                <th>账户余额</th>
                <th>申请金额</th>
                <th>备注</th>
                <th>操作时间</th>
                <th>操作管理</th>
            </tr>
            </thead>
            <tbody id="info_list">
            <?php if(isset($rows) && !empty($rows)):?>
                <?php foreach ($rows as $key => $value):?>
                    <tr>
                        <td><input type="checkbox" data-id="<?php echo $value['log_id'];?>" name="subcheckbox[]" class="log_ids"/></td>
                        <td><?php echo $value['log_sn'];?></td>
                        <td><?php echo $value['shopid'];?></td>
                        <td><?php echo $value['user_money'];?></td>
                        <td><?php echo $value['change_money'];?></td>
                        <td><?php echo $value['change_desc'];?></td>
                        <td><?php echo $value['change_time'];?></td>
                        <td><a class="btn btn-sm btn-danger"  data-id="<?php echo $value['log_id'];?>">审批</a></td>
                    </tr>
                <?php endforeach;?>
            <?php endif;?>


            </tbody>
        </table>
    </div>

</div>
    <script>
        var subcheckboxs = $('input[name="subcheckbox[]"]');
        function approveBatch() {

            var ids = '';
            $(".log_ids").each(function(){
                if(this.checked == true){
                    ids += $(this).data('id') + ',';
                }
            });
            console.log(ids);
        }
    </script>
</body>
</html>