<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1,maximum-scale=1, minimum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>我的订单 - XXXXX</title>
    <link rel="stylesheet" href="<?php echo CSS; ?>/orders.css">
    <script src="<?php echo JS; ?>/common/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo JS; ?>/common/reset.js"></script>

    <script type="text/javascript" src="<?php echo JS; ?>/common/service.js"></script>

</head>

<body>
<header>

    <a href="<?php echo site_url('index/index'); ?>">
        <span class="home"></span>
    </a>
    <a href="/">
        <span class="logo"></span>
    </a>

    <a href="<?php echo site_url('user/index'); ?>">
        <span class="person"></span>
    </a>
</header>
<div class="layout ">
    <?php foreach ($order_goods as $order): ?>

        <div class="order-module">
            <div class="orderHeader">
                <span>订单编号:<em><?php echo $order['order_sn'] ?></em></span>
                <span class="payState"><?php echo $order['status'] ?></span>
            </div>
            <?php foreach ($order['goods_list'] as $goods): ?>
                
                <div class="content">
                    <div class="left">
                        <div class="title"><?php echo $goods['goods_name'] ?></div>
                        <a class="price">￥<?php echo $goods['goods_price'] ?></a>
                        <div class="clearfix"></div>
                        <div class="msg">
                            <span class="area"><?php echo $order['address'] ?></span>
                        </div>
                    </div>

                </div>

            <?php endforeach; ?>

            <div class="price-info">
                <div class="right">
                <a>共1件商品</a>
                <a>合计：<span class="price">￥<?php echo $order['order_amount'] ?></span></a>
                </div>
            </div>
             
            <?php if ($order['order_status'] == 0): ?>
                <div class="btn">
                    <a href="javascript:;" data-id="<?php echo $order['order_id']; ?>" class="cancel"
                       onclick="cancelOrder(this)">取消订单</a>
                    <a href="<?php echo site_url('order/pay') . '?oid=' . $order['order_id'] ?>" class="pay">去付款</a>
                </div>
            <?php elseif ($order['order_status'] == 1): ?>
                <div class="btn">
                    <a href="<?php echo site_url('order/orderProgress') . '?oid=' . $order['order_id'] ?>" class="pay">查看进度</a>
                </div>
            <?php elseif ($order['order_status'] == 5): ?>
                <div class="btn">
                    <a href="<?php echo site_url('order/comment') . '?oid=' . $order['order_id'] ?>"
                       class="assess">去评价</a>

                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>

</div>
<!--右侧悬浮工具条   
<div class="m-customer">
    <a href="tel:62129799">
        <div class="customer-icon-1"></div> 
    </a>
    <a href="javascript:;" onclick="openZixun();">
        <div class="customer-icon-2"></div> 
    </a>
</div>
 右侧悬浮工具条  end-->

<script>


    function cancelOrder(e) {

        if (confirm("您确定要取消订单吗？")) {

            var id = $(e).data('id');
            $.ajax({
                url: "<?php echo site_url('order/cancelOrder')?>" + "?oid=" + id,
                type: 'GET',
                dataType: 'JSON',
                success: function (res) {
                    if (res.code === 0) {
                        location.reload();
                    }else{
                        alert(res.mes);
                    }
                }

            });
        }
        else {

        }
    }


</script>

</body>

</html>