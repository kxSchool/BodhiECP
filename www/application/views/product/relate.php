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
    <link rel="stylesheet" href="<?php echo CSS?>/product/relate.css" />
    <link href="<?php echo CSS?>/ui-dialog.css" rel="stylesheet" type="text/css">

    <link href="<?php echo CSS?>/index.css" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="<?php echo JS?>/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="<?php echo JS?>/product/productrelate.js"></script>

<body>
<div id="nTalk_post_hiddenElement" style="left: -10px; top: -10px; visibility: hidden; display: none; width: 1px; height: 1px;"></div>
<!--header start-->
<?php include_once BASE.'/nav.php';?>
<!--header end-->
<!--layout start-->
<div class="layout">

    <div class="container p-t-40 clearfix">
         

        <div class="confirm floatleft">
            <div class="need">
                <h2>您可能还需要:</h2>
            </div>
            <?php foreach ($ex_list as $exid => $ex):?>
                <div class="item" data-ismultiselect="1">

                    <div class="item-header clearfix">
                        <img src="">
                        <h2><?php echo $ex['class_name']?></h2>
                        <span class="item-price" id="total-<?php echo $ex['id']?>"></span>
                        <!--<div class="item-price js-saleprice" data-saleprice="0"></div>-->
                    </div>
                    <ul class="item-list clearfix js-item-list">
                        <?php foreach ($ex['param'] as $key => $value):?>
                            <li class="js-relate-btn <?php if(!empty($value['default'])){echo 'active';}?>"   data-productrelateid="<?php echo $ex['id']?>"   data-productskuid="<?php echo $value['id']?>"    data-saleprice="<?php echo $value['price']?>" data-selectmore="0">
                                <a href="javascript:;">
                                     <?php echo $value['name'];?></a>

                            </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            <?php endforeach;?>
            <input type="hidden" value="<?php echo $goods_id?>" id="goods_id">
            <a class="goCount" href="javascript:;" id="confirm">去结算</a>
        </div>
        <div class="shopcart floatright">

            <div class="account-form" action=" " method="post">
                 <div class="account-title">
                    <h3>您可能感兴趣</h3>
                    <a class="refresh">换一批</a>
                	<div class="clearfix"></div>
                </div>
                <div id="relevant">
                    
                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function() {
            /*选择或者取消公司关联推荐*/
            $('.js-relate-btn').click(function() {
                var btn = $(this);

                var hasActive = btn.hasClass('active');
                // 是否是多选Ó
                var selectmore = btn.attr('data-selectmore');

                var providerid = btn.attr('data-providerid');
                var productskuid = btn.attr('data-productskuid');
                var saleprice = btn.attr('data-saleprice');
                // 点击已选中的按钮，则取消选中
                if(hasActive) {
                    btn.removeClass('active');
                    $('#relate-' + productskuid + '-' + providerid).remove();
                    totalXj(btn);
                    totalPrice();
                    return false;
                }
                // 单选
                if(0 == selectmore) {
                    btn.siblings('li').each(function() {
                        if($(this).hasClass('active')) {
                            $(this).removeClass('active');
                            $('#relate-' + $(this).attr('data-productskuid') + '-' + $(this).attr('data-providerid')).remove();
                        }
                    });
                }

                btn.addClass('active');
                btn.siblings('li').removeClass('active');
                if(productskuid > 0) {
                    btn.after('<span id="relate-' + productskuid + '-' + providerid + '">' + '<input type="hidden" value="' + productskuid + '" name="data[productskuid][]" data-saleprice="' + saleprice + '">' + '<input type="hidden" value="' + providerid + '" name="data[providerid][]">' + '<input type="hidden" value="' + saleprice + '" name="data[saleprice][]"></span>');
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
                btn.parent().find('input[name="data[productskuid][]"]').each(function() {
                    totalprice += parseInt($(this).attr('data-saleprice') * 100);
                });
                totalprice = totalprice / 100;

                $('#total-' + btn.attr('data-productrelateid')).html('￥' + totalprice);

            }
            /**
             * 计算总价
             */
            function totalPrice() {
                var totalprice = 0;
                $('input[name="data[productskuid][]"]').each(function() {
                    totalprice += parseInt($(this).attr('data-saleprice') * 100);
                });
                totalprice = totalprice / 100;
                $('#totalprice').html('￥' + totalprice);
            }
            /*页面加载的时候计算小计*/
            function totalzeo() {
                var totalprice = 0;
                $.each($('li[data-productskuid]'), function(k, v) {

                    if($(v).hasClass('active')) {
                        // console.log(v)
                        totalprice += parseInt($(v).attr('data-saleprice') * 100);
                        totalprice = totalprice / 100;
                        $('#total-' + $(v).attr('data-productrelateid')).html('￥' + totalprice);

                    }

                })
            }
            /*获取所有商品的ID*/
            $('#confirm').on('click', function() {
                var ids = $('#goods_id').val();
                $.each($('li[data-productskuid]'), function(k, v) {
                    if($(v).data('productskuid') === '' || $(v).data('productskuid')==0){
                        return true;
                    }
                    if($(v).hasClass('active')) {
                        ids += '_' + $(v).attr('data-productskuid');
                    }
                });

                window.location = "<?php echo site_url('order/confirm');?>" + '?id=' + ids;
            })
            totalzeo();
            totalPrice();
        });
    </script>

</div>


<!--右侧悬浮工具条  end-->
<!--layout end-->
<!--footer start-->
<?php include_once BASE.'/foot.php';?>
<!--footer end-->
<!--<script>-->
<!--    var browser = getBrowser();-->
<!--    var wwwMobileUrl = ' ';-->
<!--    if(browser.isMobile) {-->
<!--        window.location.href = wwwMobileUrl;-->
<!--    }-->
<!--</script>-->
</body>

</html>