<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1, minimum-scale=1,user-scalable=no">

    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta name="format-detection" content="telephone=no, email=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>评论列表 - XXXXX</title>
    <link href="<?php echo CSS;?>/product/item/evaluation.css" rel="stylesheet">
    <script src="<?php echo JS;?>/common/reset.js"></script>
    <script type="text/javascript" src="<?php echo JS;?>/common/jquery-1.11.3.min.js"></script>

    <script type="text/javascript" src="<?php echo JS;?>/common/service.js"></script>

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

        <!--顶部返回 S-->
        <div class="bar">
            <div class="back">
                <a href="javascript:history.back(-1)">返回</a>
            </div>
            <div class="total">
                共<?php echo $num?>条评论
            </div>
        </div>
        <!--顶部返回 E-->
        <div class="page" style="touch-action: none;">
            <div class="scroll">
                <div class="pulldown-tips hidden">下拉刷新</div>


                <div class="evaluate js-evaluationlist" id="userReview">

                    <!-- 评价详情  S-->
                    <div id="evaluation-list">
                        <?php foreach ($list as $k => $v):?>
                        <div class="item">
                            <div class="infos">
                                <ul class="stars">
                                    <li>
                                        <span></span>
                                    </li>
                                    <li>
                                        <span></span>
                                    </li>
                                    <li>
                                        <span></span>
                                    </li>
                                    <li>
                                        <span></span>
                                    </li>
                                    <li>
                                        <span></span>
                                    </li>
                                </ul>
                                <span class="name">公司注册（自定义）(上海-杨浦区)</span>
                                <span class="date"><?php echo $v['add_time']?></span>
                            </div>
                            <div class="comment">
                                <p class="content">
                                    <?php echo $v['content']?>
                                </p>
                                <div class="tips">
                                    <?php foreach ($v['tag_list'] as $tid => $tag):?>
                                    <span><?php echo $tag['tagname']?></span>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <?php endforeach;?>

                    </div>
                    <!-- 评价详情  S-->
                </div>
            </div>
        </div>
        <!-- loading S -->
        <!-- weui loading S -->
        <div id="loadingToast" class="weui-loading-wrap" style="display: none;">
            <div class="weui-mask_transparent"></div>
            <div class="weui-toast">
                <i class="weui-loading weui-icon_toast"></i>
                <p class="weui-toast__content">数据加载中</p>
            </div>
        </div>
        <!-- weui loading E -->

        <!-- loading E -->
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

</body>

</html>