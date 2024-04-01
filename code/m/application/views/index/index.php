<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!--设置web页在iPhone浏览器中展示的size-->
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, minimum-scale=1,user-scalable=no">
    <!--X-UA-Compatible 是针对 IE8 版本的一个特殊文件头标记，用于为 IE8 指定不同的页面渲染模式-->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--设置该web页是否能以全凭模式运行，默认情况下是在safari中全屏展示。在js中可以修改window.navigator.standalone变量来决定使用全屏效果-->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!--设置web页的工具栏样式-->
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!--设置safari中展示网页时是否自动将数字识别为电话号码（点击可以拨号）。默认是yes，如果不需要则设置为no-->
    <meta name="format-detection" content="telephone=no">


    <title>XXXXX一站式创业孵化服务</title>
    <link rel="shortcut icon" href="<?php echo IMAGES?>/common/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo CSS;?>/common/index.css">
    <link rel="stylesheet" href="<?php echo CSS;?>/common/swiper.min.css">
    <script type="text/javascript" src="<?php echo JS;?>/common/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo JS;?>/common/swiper.min.js"></script>
    <script type="text/javascript" src="<?php echo JS;?>/common/reset.js"></script>

    <script type="text/javascript" src="<?php echo JS;?>/common/service.js"></script>
    <script type="text/javascript">
        $(function () {

            var locationHref = window.location.href;
            $('footer').find('a').each(function () {
                if (locationHref.indexOf(this.href) != -1) {
                    $(this).find("div").addClass('active');
                    return false;
                }
            })
        })
    </script>
    <style>
        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;

            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }
    </style>

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
    <div class="layout padding-top">
        <div class="swiper-container swiper-container-horizontal swiper-container-free-mode">
            <div class="swiper-wrapper">

                <?php foreach($carousel as $carid => $car):?>


                    <div class="swiper-slide" data-swiper-slide-index="5" style="width: 375px;">
                        <a href="<?php echo $car['setting']['ad_link'];?>">
                            <img src="<?php echo $this->config->item('ad_url').$car['setting']['ad_code']?>" alt="<?php echo $car['name']?>">
                        </a>
                    </div>
                <?php endforeach;?>

            </div>
            <div class="swiper-pagination swiper-pagination-bullets">
                <span class="swiper-pagination-bullet"></span>
                <span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span>
                <span class="swiper-pagination-bullet"></span>
                <span class="swiper-pagination-bullet"></span>
                <span class="swiper-pagination-bullet"></span>
                <span class="swiper-pagination-bullet"></span>
            </div>
        </div>
        <div class="home-typelist">
            <div class="home-typelist-item">
                <?php if(isset($server[0]) && !empty($server[0])):?>
                <?php foreach($server[0] as $serid => $ser):?>

                    <div class="">
                        <a href="<?php echo $ser['setting']['ad_link'];?>">
                            <img src="<?php echo $this->config->item('ad_url').$ser['setting']['ad_code']?>" alt="<?php echo $ser['name']?>">
                        </a>
                        <p><?php echo $ser['name']?></p>
                    </div>
                <?php endforeach;?>
                <?php endif;?>
            </div>
            <div class="home-typelist-item">
                <?php if(isset($server[1]) && !empty($server[1])):?>
                <?php foreach($server[1] as $serid => $ser):?>

                    <div class="">
                        <a href="<?php echo $ser['setting']['ad_link'];?>">
                            <img src="<?php echo $this->config->item('ad_url').$ser['setting']['ad_code']?>" alt="<?php echo $ser['name']?>">
                        </a>
                        <p><?php echo $ser['name']?></p>
                    </div>
                <?php endforeach;?>
                <?php endif;?>   
            </div>
        </div>
        <div class="home-ad">

            <a href="<?php echo $center[0]['setting']['ad_link'];?>">
                <img src="<?php echo $this->config->item('ad_url').$center[0]['setting']['ad_code']?>" alt="<?php echo $center[0]['name']?>">
            </a>
        </div>
    

        <?php foreach ($bot_rec as $recid => $rec):?>
         <div class="hot-1">
                <a href="javascript:void(0)" class="hot-title-1"><?php echo $rec['name']?></a>
                <div class="hot-content-1">
                    <ul>
                        <?php foreach ($rec['ad_list'] as $aid => $ad_info):?>
                            

                        <li>
                            <div>
                                <a class="goods-img" href="<?php echo $ad_info['setting']['ad_link']?>">
                                    <img src="<?php echo $this->config->item('ad_url').$ad_info['setting']['ad_code']?>">
                                </a>
                                <p class="goods-titie"><?php echo $ad_info['name']?></p>
                                <p class="goods-content">
                                    <span class="goods-price">￥
                                        <em><?php echo $ad_info['price']?></em>
                                    </span>
                                    <span class="goods-num">销量:
                                        <em><?php echo $ad_info['amount']?></em>
                                    </span>
                                </p>
                            </div>
                        </li>
                        <?php endforeach;?>
    
                    </ul>
                </div>
            </div>
        <?php endforeach;?>

        <div class="home-bottom">
                     
                    <div class="logo"></div>
                    <div class="tel">
                        <a href="http://www.js715.com/2024/03/17/%e4%bc%81%e4%b8%9a%e6%9c%8d%e5%8a%a1%e5%b9%b3%e5%8f%b0/">客服热线：jacky588@qq.com</a>
                    </div>
            </div>

    </div>
    <footer>
        <a href="<?php echo site_url('index/index');?>">
            <div class="icon icon-1 "></div>
        </a>
        <a href="<?php echo site_url('product/index');?>">
            <div class="icon icon-2"></div>
        </a>
        <a href="<?php echo site_url('index/index');?>">
            <div class="icon icon-3 "></div>
        </a>
        <a href="<?php echo site_url('user/index');?>">
            <div class="icon icon-4 "></div>
        </a>
    </footer>
    <script src="<?php echo JS;?>/common/swiper.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            pagination: '.swiper-pagination',//显示小圆点
            nextButton: '.swiper-button-next',//实现下一页的点击
            prevButton: '.swiper-button-prev',//实现上一页的点击
            paginationClickable: true,//实现小圆点点击
            spaceBetween: 30,//
            centeredSlides: true,
            autoplay: 3000,//每秒中轮播一次
            autoplayDisableOnInteraction: false,//在点击之后可以继续实现轮播
            loop: true//可以让图片循环轮播
        });
    </script>

</body>

</html>