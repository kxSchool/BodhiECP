<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>个人中心 - XXXXX</title>
    <script src="<?php echo JS;?>/common/reset.js"></script>
    <link rel="stylesheet" href="<?php echo CSS;?>/user/selfCenter.css">
    <script type="text/javascript" src="<?php echo JS;?>/common/jquery.js"></script>
    <script type="text/javascript" src="<?php echo JS;?>/common/jquery.min.js"></script>

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
</head>

<body style="overflow: auto;">

    <!-- header S -->
    <header class="home">
        <a href="<?php echo site_url('index/index');?>">
            <span class="home"></span>
        </a>
        <a href="#">
            <span class="logo"></span>
        </a>

        <a href="<?php echo site_url('user/index');?>">
            <span class="person"></span>
        </a>
    </header>
    <!-- header E -->
    <div class="layout padding-top">
        <div class="mycenter-head">

            <div class="headerImg">

                <?php if(!empty($_SESSION['user']) && !empty($_SESSION['user']['icon'])):?>
                    <img src="<?php echo 'https://www.kxschool.com/avatar/'.$_SESSION['user']['userid'].'/'.$_SESSION['user']['icon']?>">
                <?php else:?>
                <img src="<?php echo IMAGES;?>/selfCenter.png">
                <?php endif;?>

            </div>
            <div class="btn <?php if(!empty($_SESSION['user'])){echo 'hidden';}?>">
                <a href="<?php echo site_url('user/register')?>" class="word">注册</a>
                <span class="line"></span>
                <a href="<?php echo site_url('user/login')?>" class="word">登录</a>
            </div>
            <div class="userid <?php if(empty($_SESSION['user'])){echo 'hidden';}?>">
                <p><?php echo $_SESSION['user']['username'];?></p>
            </div>
        </div>

        <!--支付记录 start-->
        <div class="mycenter-module">
            <ul>
                <li class="mycenter-module-li">
                    <img class="self-order" src="<?php echo IMAGES;?>/common/self-order.png">
                    <a href="<?php echo site_url('order/index')?>">
                        <span class="word">我的订单</span>
                        <span class="arrow"></span>
                    </a>
                </li>
                <hr/>
                <li class="mycenter-module-li">
                    <img class="self-order" src="<?php echo IMAGES;?>/common/self-info.png">
                    <a href="<?php echo site_url('user/info')?>">
                        <span class="word">个人资料</span>
                        <span class="arrow"></span>
                    </a>
                </li>
                <hr/>
                <li class="mycenter-module-li" style="padding-left: 0.19rem">
                    <img class="self-relate" src="<?php echo IMAGES;?>/common/self-relate.png">
                    <a href="<?php echo site_url('user/connect')?>">
                        <span class="word">联系我们</span>
                        <span class="arrow"></span>
                    </a>
                </li>
                <hr/>
                <li class="mycenter-module-li" style="padding-left: 0.19rem">
                    <img class="self-about" src="<?php echo IMAGES;?>/common/self-about.png">
                    <a href="<?php echo site_url('user/about')?>">
                        <span class="word">关于我们</span>
                        <span class="arrow"></span>
                    </a>
                </li>
                <hr/>
            </ul>
        </div>
        <?php if(!empty($_SESSION['user'])):?>
        <div class="mycenter-module self-out">
            <ul >
                <li class="mycenter-module-li">
                     <a href="<?php echo site_url('base/logout')?>" class="signOut">
                        退出登录
                    </a>
                </li>
            </ul>
        </div>
        <?php endif;?>
        <!--退出 E-->
        
        <div class="home-bottom">
                     
                    <div class="logo"></div>
                    <div class="tel">
                        <a href="tel:021-6212-9799">客服热线：021-6212-9799</a>
                    </div>
        </div>
    </div>
    <!--右侧悬浮工具条   
    <div class="m-customer">
        <a href="javascript:;" onclick="openZixun();">
            <div class="customer-icon-1"></div> 
        </a>
        <a href="tel:62129799">
            <div class="customer-icon-2"></div> 
        </a>
    </div>
     右侧悬浮工具条  end-->
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
</body>

</html>