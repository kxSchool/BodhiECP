<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>订单评价 —— XXXXX</title>
    <link rel="stylesheet" href="<?php echo CSS?>/order/review.css">
    <script type="text/javascript" src="<?php echo JS?>/common/reset.js"></script>
    <script type="text/javascript" src="<?php echo JS?>/common/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="<?php echo JS?>/common/start.js"></script>
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
    <!--        <div class="home-hot">-->
    <!--            <div class="title">选择的服务商</div>-->
    <!--        </div>-->
    <!--        <div class="provider">-->
    <!--            <div class="provider_div">-->
    <!--                <img src="--><?php //echo IMAGES?><!--/product_kf.png">-->
    <!--                <span>李四</span>-->
    <!--            </div>-->
    <!--        </div>-->

    <div class="assess">
        <div class="assessName">
            <span>专业程度:</span>
            <ul class="stars">
                <li>
                    <a href="javascript:click(1)">
                        <img src="<?php echo IMAGES?>/common/startg.png" id="star1" onMouseOver="over(1)" onMouseOut="out(1)" />
                    </a>
                </li>
                <li>
                    <a href="javascript:click(2)">
                        <img src="<?php echo IMAGES?>/common/startg.png" id="star2" onMouseOver="over(2)" onMouseOut="out(2)" />
                    </a>
                </li>
                <li>
                    <a href="javascript:click(3)">
                        <img src="<?php echo IMAGES?>/common/startg.png" id="star3" onMouseOver="over(3)" onMouseOut="out(3)" />
                    </a>
                </li>
                <li>
                    <a href="javascript:click(4)">
                        <img src="<?php echo IMAGES?>/common/startg.png" id="star4" onMouseOver="over(4)" onMouseOut="out(4)" />
                    </a>
                </li>
                <li>
                    <a href="javascript:click(5)">
                        <img src="<?php echo IMAGES?>/common/startg.png" id="star5" onMouseOver="over(5)" onMouseOut="out(5)" />
                    </a>
                </li>
            </ul>
        </div>
        <div class="assessName">
            <span>服务态度:</span>
            <ul class="stars">
                <li>
                    <a href="javascript:click(6)">
                        <img src="<?php echo IMAGES?>/common/startg.png" id="star6" onMouseOver="over(6)" onMouseOut="out(6)" />
                    </a>
                </li>
                <li>
                    <a href="javascript:click(7)">
                        <img src="<?php echo IMAGES?>/common/startg.png" id="star7" onMouseOver="over(7)" onMouseOut="out(7)" />
                    </a>
                </li>
                <li>
                    <a href="javascript:click(8)">
                        <img src="<?php echo IMAGES?>/common/startg.png" id="star8" onMouseOver="over(8)" onMouseOut="out(8)" />
                    </a>
                </li>
                <li>
                    <a href="javascript:click(9)">
                        <img src="<?php echo IMAGES?>/common/startg.png" id="star9" onMouseOver="over(9)" onMouseOut="out(9)" />
                    </a>
                </li>
                <li>
                    <a href="javascript:click(10)">
                        <img src="<?php echo IMAGES?>/common/startg.png" id="star10" onMouseOver="over(10)" onMouseOut="out(10)"
                        />
                    </a>
                </li>
            </ul>
        </div>
        <div class="assessName">
            <span>办事效率:</span>
            <ul class="stars">
                <li>
                    <a href="javascript:click(11)">
                        <img src="<?php echo IMAGES?>/common/startg.png" id="star11" onMouseOver="over(11)" onMouseOut="out(11)"
                        />
                    </a>
                </li>
                <li>
                    <a href="javascript:click(12)">
                        <img src="<?php echo IMAGES?>/common/startg.png" id="star12" onMouseOver="over(12)" onMouseOut="out(12)"
                        />
                    </a>
                </li>
                <li>
                    <a href="javascript:click(13)">
                        <img src="<?php echo IMAGES?>/common/startg.png" id="star13" onMouseOver="over(13)" onMouseOut="out(13)"
                        />
                    </a>
                </li>
                <li>
                    <a href="javascript:click(14)">
                        <img src="<?php echo IMAGES?>/common/startg.png" id="star14" onMouseOver="over(14)" onMouseOut="out(14)"
                        />
                    </a>
                </li>
                <li>
                    <a href="javascript:click(15)">
                        <img src="<?php echo IMAGES?>/common/startg.png" id="star15" onMouseOver="over(15)" onMouseOut="out(15)"
                        />
                    </a>
                </li>
            </ul>

        </div>
    </div>


    <div class="service">
        <p class="serviceName">
            速度很快很专业，好评！ </p>
        <div class="tips">
            <?php foreach ($tags as $tid => $tag):?>
                <span data-id="<?php echo $tag['tagid']?>"><?php echo $tag['tagname']?></span>
            <?php endforeach;?>
        </div>
    </div>
    <form action="<?php echo site_url('order/comment')?>" method="post" id="form">
        <div class="comment">
            <textarea placeholder="请您写下你想说的话...." id="content" name="content"></textarea>
        </div>

        <input type="hidden" id="order_id" name="order_id" value="<?php echo $order_id;?>">
        <input type="hidden" id="professional" name="professional">
        <input type="hidden" id="effect" name="effect">
        <input type="hidden" id="attitude" name="attitude">
        <input type="hidden" id="tags" name="tags">
        <button type="button" class="assess-submit">提交</button>
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
</body>

</html>