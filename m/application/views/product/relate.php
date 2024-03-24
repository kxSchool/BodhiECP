<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1, minimum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>关联推荐 - XXXXX</title>
    <link rel="stylesheet" href="<?php echo CSS;?>/common/common.css">
    <link href="<?php echo CSS;?>/product/item/relate.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo JS;?>/common/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="<?php echo JS;?>/common/reset.js"></script>
    <!-- <script src="<?php echo JS;?>/product/relate.js"></script> -->

    <script type="text/javascript" src="<?php echo JS;?>/common/service.js"></script>
</head>

<body>
    <!-- header start-->
    <header>
        <a href="<?php echo site_url('index/index');?>">
            <span class="home"></span>
        </a>
        <a href="#">
            <span class="title"><?php echo $title;?></span>
        </a>

        <a href="<?php echo site_url('user/index');?>">
            <span class="person"></span>
        </a>

    </header>
    <!-- header end-->
    <div class="layout">
        <form id="relate-form" action="" method="post">
            <input type="hidden" id="goodsid" value="<?php echo $goods_info['good_id']?>" name="data[productskuid][]" data-price="<?php echo $goods_info['good_price']?>">
            <input type="hidden" id="providerid" value="<?php echo $providerid?>" name="data[providerid][]">
            <input type="hidden" value="<?php echo $goods_info['good_price']?>" name="data[saleprice][]">
            <div class="choosed">
                <div class="title">
                    已选服务：
                </div>
                <div class="name">
                    <span class="l-name"><?php echo $goods_info['cate_name']?>(<?php echo $goods_info['good_name']?>)</span>
                    <span class="r-money">￥<?php echo $goods_info['good_price']?></span>
                </div>
                <div class="infos">
                    <span>地区：<?php echo $goods_info['region'];?></span>
                </div>
            </div>
            <div class="other">
                <h2>您可能还需要以下服务：</h2>
                <?php foreach ($ex_list as $exid => $ex):?>
                    <hr>
                    <div class="item">
                        <div class="i-title">
                            <h3><?php echo $ex['class_name']?></h3>
                            <span id="total-<?php echo $ex['id']?>"></span>
                        </div>
                        <p class="i-p"><?php echo $ex['class_tag']?></p>
                        <div class="i-btn">
                            <ul>
                                <?php foreach ($ex['param'] as $serid => $ser):?>
                                    <li class="js-relate-btn <?php if(!empty($ser['default'])){echo 'active';}?>" data-productrelateid="<?php echo $ex['id']?>"  data-productskuid="<?php echo $ser['id']?>" data-saleprice="<?php echo $ser['price']?>" data-selectmore="0">
                                        <a href="javascript:;"><?php echo $ser['name']?></a>
                                    </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                <?php endforeach;?>
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
        <span class="total">合计:
            <em id="totalprice"></em>
        </span>
        <a href="javascript:;" id="goPay" class="gosettle js-gosettle">去支付</a>
    </footer>

    <script type="text/javascript">
        $(function () {
            /**
             * 选择或取消关联推荐产品
             */
            $('.js-relate-btn').click(function () {
                var btn = $(this);
                 
                var hasActive = btn.hasClass('active');
                // 是否是多选Ó
                var selectmore = btn.attr('data-selectmore');

                var providerid = btn.attr('data-providerid');
                var productskuid = btn.attr('data-productskuid');
                var saleprice = btn.attr('data-saleprice');
                // 点击已选中的按钮，则取消选中
                if (hasActive) {
                    btn.removeClass('active');
                    $('#relate-' + productskuid + '-' + providerid).remove();
                    totalXj(btn);
                    totalPrice();
                    return false;
                }
                // 单选
                if (0 == selectmore) {
                    btn.siblings('li').each(function () {
                        if ($(this).hasClass('active')) {
                            $(this).removeClass('active');
                            $('#relate-' + $(this).attr('data-productskuid') + '-' + $(this).attr('data-providerid')).remove();
                        }
                    });
                }

                btn.addClass('active');
                btn.siblings('li').removeClass('active');
                if (productskuid > 0) {
                    btn.after('<span id="relate-' + productskuid + '-' + providerid + '">' + '<input type="hidden" value="' + productskuid + '" name="data[productskuid][]" data-price="' + saleprice + '">' + '<input type="hidden" value="' + providerid + '" name="data[providerid][]">' + '<input type="hidden" value="' + saleprice + '" name="data[saleprice][]"></span>');
                }
                totalXj(btn);
                totalPrice();
                return false;
            });
            /**
             * 计算小计
             */
            function totalXj(btn) {
                var totalprice = 0;
                btn.parent().find('input[name="data[productskuid][]"]').each(function () {
                    totalprice += parseInt($(this).attr('data-price') * 100);
                });
                totalprice = totalprice / 100;
                // if (totalprice > 0) {
                    $('#total-' + btn.attr('data-productrelateid')).html('￥' + totalprice);
                // } else {
                //     $('#total-' + btn.attr('data-productrelateid')).html('');
                // }
            }
            /**
            * 计算总价
            */
            function totalPrice() {
                var totalprice = 0;
                $('input[name="data[productskuid][]"]').each(function () {
                    totalprice += parseInt($(this).attr('data-price') * 100);
                });
                totalprice = totalprice / 100;
                $('#totalprice').html('￥' + totalprice);
            }

            /*获取所有商品的ID*/
            $('#goPay').on('click',function(){

                var ids = $('#goodsid').val();
                $.each($('li[data-productskuid]'),function(k,v){

                    if($(v).hasClass('active')){

                        if($(v).data('productskuid') !== '' && $(v).data('productskuid') !=0){
                            ids = ids + '_' + $(v).attr('data-productskuid');
                        }

                    }

                });
                window.location = "<?php echo site_url('order/confirm')?>" + '?id=' + ids;
            })
            /*页面加载的时候计算小计*/
            function totalzeo() {
                var totalprice = 0;
                $.each($('li[data-productskuid]'),function(k,v){
                    if($(v).hasClass('active')){
                        totalprice += parseInt($(v).attr('data-saleprice') * 100);
                        totalprice = totalprice / 100;
                        $('#total-' + $(v).attr('data-productrelateid')).html('￥' + totalprice);
                    }

                })
            }

            totalPrice();
            totalzeo();


        });
    </script>
</body>

</html>