<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, minimum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>支付方式 - XXXXX</title>
    <link rel="stylesheet" href="<?php echo CSS;?>/order/pay.css">
    <script type="text/javascript" src="<?php echo JS;?>/common/reset.js"></script>
    <script type="text/javascript" src="<?php echo JS;?>/common/jquery-1.11.3.min.js"></script>

    <script type="text/javascript" src="<?php echo JS;?>/common/service.js"></script>
    <script>
        $(function () {

            $('.method').find('input[type=checkbox]').bind('click', function () {
                $('.method').find('input[type=checkbox]').not(this).attr("checked", false);
            });
            if(){
                
            }

        });
    </script>
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
    <div class="layout">
        <form id="pay-form" method="post" action="<?php echo site_url('order/pay');?>">
            <input type="hidden" value="<?php echo $order_id;?>" name="order">
            <div class="method js-payonlineway">
                <ul>
                    <?php if(!isAliBrowser()):?>
                    <li>
                        <label>
                            <img src="<?php echo IMAGES;?>/icon-wechatPay.png">
                            <span>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">微信支付</font>
                                </font>
                            </span>
                            <input type="radio" name="paytype" checked="" value="wxpay" class="rad">
                           
                          
                        </label>
                    </li>
                    <?php endif;?>
                    <?php if(!isWeixinBrowser()):?>
                    <li>
                        <label>
                            <!-- <img src="/static/img/pay/icon-alipay.png"> -->
                            <img src="<?php echo IMAGES;?>/icon-alipay.png">
                            <span>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">支付宝支付</font>
                                </font>
                            </span>
                            <input type="radio" name="paytype" checked="" value="alipay" class="rad">
                            
                        </label>
                    </li>
                    <?php endif;?>
                </ul>
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
            <em class="js-price-all-total">￥<?php echo $order_amount;?></em>
        </span>
        <a href="javascript:;" class="gosettle js-gosettle" id="submit">去支付</a>
    </footer>
    <script>
        $('#submit').on('click',function () {
            $('#pay-form').submit();
        });
    </script>
</body>

</html>