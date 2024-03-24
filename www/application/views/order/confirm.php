<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="XXXXX,注册公司,代理记账,商标注册,个人社保,企业社保,创业法律服务">
    

    <title>有限公司注册_公司注册_ 注册公司代理 - XXXXX</title>
    <!-- common css -->
     <link rel="shortcut icon" href="<?php echo IMG?>/common/favicon.ico" type="image/x-icon">
    <link href="<?php echo CSS?>/common.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS?>/sort.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo CSS?>/common/base.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo CSS?>/order/confirm_order.css" />
    <link href="<?php echo CSS?>/ui-dialog.css" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="<?php echo JS?>/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="<?php echo JS?>/order/confirm.js"></script>

<body>
<div id="nTalk_post_hiddenElement" style="left: -10px; top: -10px; visibility: hidden; display: none; width: 1px; height: 1px;"></div>
<!--header start-->
<?php include_once BASE.'/nav.php';?>
<!--header end-->
<!--layout start-->
<div class="layout">

    <div class="bg-white">
        <form id="form-orders" action="" method="post">
            <div class="container">
                <div class="confirm">
                    <div class="tip_title">
                        <p>
                            确认商品信息
                        </p>
                    </div>
                    <!--table表格 S-->
                    <div class="confirm_core">
                        <div class="table_title">
                            <span>商品</span>
                            <span>单价(元)</span>
                            <span>数量</span>
                            <span>小计</span>
                        </div>
                        <table>
                            <tbody>
                            <input type="hidden" value="<?php echo $order_id;?>" id="order_id">
                            <?php foreach ($order_list as $order_id => $goods): ?>
                                <tr>
                                    <td>
                                        <div class="left-info"> 
                                        <div class="Iconimg"><img src="<?php echo $goods['pic']?>"></div>
                                            <div class="left-p">
                                                <div class="left-title"><?php echo $goods['cname']?>_<?php echo $goods['gname']?></div>
                                                <div class="left-area">地区：<?php echo $goods['region']?></div>
                                                <!--<div class="left-service">服务者:胡桃林</div>-->
                                            </div>
                                        </div>
                                    </td>
                                    <td><?php echo $goods['price']?>元</td>
                                    <td>
                                        <div class="num-panel clearfix js-num-panel">
                                            <?php if($goods['is_count'] == 1):?>
                                            <a href="javascript:;" class="num-down js-num-down" data-type="1" onclick="removeNum(this)">-</a>
                                                <input type="text" name="providersku[<?php echo $goods['gid'];?>]" value="1" data-totalprice-td="#sku-<?php echo $goods['gid'];?>" class="num-display js-num-display" onkeyup="checkNum(this)" data-id="<?php echo $goods['gid'];?>">
                                            <a href="javascript:;" class="num-up js-num-up" data-type="2" onclick="addNum(this)">+</a>
                                            <?php else:?>
                                                <p style="text-align: left;margin-left: 25px;">1</p>
                                            <?php endif;?>

                                        </div>
                                    </td>
                                    <td class="panel-price js-sku-totalprice" id="sku-<?php echo $goods['gid'];?>" data-saleprice="<?php echo $goods['price'];?>"><?php echo $goods['price']?>元</td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    <!--table表格 E-->
                    <div class="total clearfix">
                        <ul class="floatright text-right">

                            <!--登录后显示优惠券-->
                            <li>
                                <label class="js-use-coupon-ryb">
                                    <!--<em class="checkbox-icon"></em>-->
                                    <input type="checkbox" name="coupon[ryb]" value="" style="display:none;" onclick="return true;">
                                    <span>使用平台优惠券抵扣</span>
                                </label>
                                <span class="price-num money js-coupon-1-price">0.00元</span>
                            </li>
                            <li>
                                <span>金额合计:</span>
                                <span class="price-num total-money js-price-total"><?php echo $total_price?>元</span>
                            </li>

                            <li>

                                <a href="javascript:;" id="goPay" class="total-submit js-submit-btn">去支付</a>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>

<!--layout end-->
<!--footer start-->
<?php include_once BASE.'/foot.php';?>
<!--footer end-->
<script>

    $('#goPay').on('click',function () {
        window.location = '/order/pay';
    });

</script>
</body>

</html>