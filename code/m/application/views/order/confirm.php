<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, minimum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>订单确认 - XXXXX</title>
    <link rel="stylesheet" href="<?php echo CSS;?>/order/confirm.css">
    <link rel="stylesheet" href="<?php echo CSS;?>/common/common.css">

    <script type="text/javascript" src="<?php echo JS;?>/common/reset.js"></script>
    <script type="text/javascript" src="<?php echo JS;?>/common/jquery-1.8.3.min.js"></script>
<!--    <script type="text/javascript" src="--><?php //echo JS;?><!--/product/confirm.js"></script>-->
    <script type="text/javascript" src="<?php echo JS;?>/order/confirm.js"></script>
</head>

<body>
    <header>
        <a href="<?php echo site_url('index/index');?>">
            <span class="home"></span>
        </a>
        <a href="/">
            <span class="logo"></span>
        </a>

        <a href="<?php echo site_url('user/index');?>">
            <span class="person"></span>
        </a>

    </header>
    <div class="layout" id="main">
        <div class="">
            <form id="form-orders" action="" method="post">
                <input type="hidden" name="quickpayid" value="0">
                <input type="hidden" name="channelquickpayid" value="0">

                <div class="service">
                    <h2>已选服务：</h2>
                    <input type="hidden" value="<?php echo $order_id;?>" id="order_id">
                    <?php foreach ($order_list as $orderid => $order):?>
                        <hr>
                        <div class="item">
                            <div class="i-title clearfix">
                                <h3><?php echo $order['cname']?>（<?php echo $order['gname']?>）</h3>
                                <?php if($order['is_count'] == 1):?>
                                <div class="addbtn js-num-panel">
                                    <a href="javascript:;" class="down js-num-down" data-type="1" onclick="removeNum(this)">-</a>
                                    <input type="tel" name="providersku[<?php echo $order['gid'];?>]" value="1" data-totalprice-td="#sku-<?php echo $order['gid'];?>" class="num js-num-display" onkeyup="checkNum(this)" data-id="<?php echo $order['gid'];?>">
                                    <a href="javascript:;" class="up js-num-up" data-type="2" onclick="addNum(this)">+</a>
                                </div>
                                <?php else:?>

                                <?php endif;?>
                            </div>
                            <div class="i-info">
                                <span>地区：<?php echo $order['region']?></span>
                                <span style="font-size:0.3rem;margin-right: 0.1rem;" class="fee js-sku-totalprice" id="sku-<?php echo $order['gid'];?>" data-saleprice="<?php echo $order['price'];?>">￥<?php echo $order['price']?></span>
                            </div>
                        </div>

                    <?php endforeach;?>
                </div>
                <div class="coupon">

                    <!-- 优惠券列表 点击上面的 .c-tip 之后显示 -->
                    <!-- <ul class="list">
                        <li class="clearfix">
                            <a href="coupon.html">
                                <span>平台优惠券</span>
                                <span class="js-kfw-coupon-btn num"></span>
                                <span class="right">&gt;</span>
                            </a>
                        </li>
                        
                    </ul> -->
                    <!--商家优惠券功能没做完，先隐藏-->
                </div>
            </form>
        </div>
        <!--右侧悬浮工具条  
        <div class="m-customer">
            <a href="tel:62129799" >
                <div class="customer-icon-1"></div>

            </a>
            <a href="javascript:;" onclick="openZixun();">
                <div class="customer-icon-2"></div>

            </a>
        </div>
        右侧悬浮工具条  end-->

        <footer>
            <span class="total">应付:
                <em class="js-price-all-total">￥<?php echo $total_price?></em>
            </span>
            <a href="<?php echo site_url('order/pay')?>" class="gosettle js-gosettle">去支付</a>
        </footer>
    </div>
    <script>

        /**
      * 计算总金额
      */
      // $('.item').find('span')
      //   function totalPrice() {
      //       var total = 0;
      //       $('.js-num-display').each(function () {
      //           var num = parseInt($(this).val());
      //           num = num > 0 ? num : 1;
      //           num = num < 200 ? num : 200;
      //           total += parseInt(parseFloat($(this).attr('data-saleprice')) * 100 * num);
      //       });
      //       TOTAL_PRICE = total / 100;
      //       //$('.js-price-total').html('￥' + TOTAL_PRICE);
      //       TOTAL_PRICE = TOTAL_PRICE > COUPON_PRICE_KFW + COUPON_PRICE_PROVIDER + COUPON_PRICE_CODE ? TOTAL_PRICE - (COUPON_PRICE_KFW + COUPON_PRICE_PROVIDER + COUPON_PRICE_CODE) : 0;
      //       $('.js-price-all-total').html('￥' + TOTAL_PRICE);
      //   }
      //   totalPrice();
    </script>
    <script type="text/javascript">
        // function numChange() {
        //     var $this = $(this);
        //     var $input = $this.siblings('.js-num-display');
        //
        //     //判断是否数字
        //     if (undefined == typeof($this.val()) || ' ' == $this.val() || isNaN($this.val())) {
        //         $this.val(1);
        //     }
        //
        //     if (0 == $input.length) {
        //         $input = $this;
        //         var num = parseInt($this.val());
        //         if (num <= 0) {
        //             num = 1;
        //         } else if (num > 200) {
        //             num = 200;
        //         }
        //     } else {
        //         if ($this.attr('data-type') === '1') {
        //             // 减少
        //             var num = parseInt($input.val());
        //             num--;
        //             if (num < 1) {
        //                 num = 1;
        //             }
        //         } else {
        //             // 增加
        //             var num = parseInt($input.val());
        //             num++;
        //             if (num > 200) {
        //                 num = 200;
        //             }
        //         }
        //     }
        //
        //     $input.val(num);
        //     var total = num * $input.attr('data-saleprice');
        //     $($input.attr('data-totalprice-td')).html(total + '元');
        //
        //     totalPrice();
        // }

        /**
         * 计算总金额
         */
        // function totalPrice() {
        //     var total = 0;
        //     $('.js-num-display').each(function () {
        //         var num = parseInt($(this).val());
        //         num = num > 0 ? num : 1;
        //         num = num < 200 ? num : 200;
        //         total += parseInt(parseFloat($(this).attr('data-saleprice')) * 100 * num);
        //     });
        //     TOTAL_PRICE = total / 100;
        //     //$('.js-price-total').html('￥' + TOTAL_PRICE);
        //     $('.js-price-all-total').html('￥' + TOTAL_PRICE);
        // }
        // $(function () {
        //     $('.js-num-panel').find('a').on('click', numChange);
        //     $('.js-num-display').on('change', numChange);
        //
        //     var isSubmit = false;
        //     $('.js-gosettle').click(function () {
        //         if (isSubmit) {
        //             return false;
        //         }
        //         isSubmit = true;
        //
        //         var url = $('#form-orders').attr('action');
        //         var data = $('#form-orders').serialize();
        //         // $.ajax({
        //         //     type: "POST",
        //         //     url: url,
        //         //     data: data,
        //         //     async: false,
        //         //     dataType: 'json',
        //         //     success: function success(result) {
        //         //         isSubmit = false;
        //         //         if (200 == result.code) {
        //         //             // 如果返回信息里有ajaxurl,这跳转到这个地址，否则刷新页面
        //         //             if ('undefined' != typeof result.data.ajaxurl) {
        //         //                 window.location.href = result.data.ajaxurl;
        //         //             }
        //         //         } else {
        //         //             alert(result.msg);
        //         //         }
        //         //     }
        //         // });
        //
        //
        //
        //     });
        // })
        totalPrice();
    </script>
</body>

</html>