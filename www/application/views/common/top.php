<div class="top-header">
    <div class="container" id="loginbar">
        <ul class="floatleft">
            <li class="nav-location">
                <a href="#" class="locatin-icon">
                    <i class="arrow floatright"></i>上海市 </a>
                <div class="location-layer">
                    <em></em>
                    <ul>
                        <li>
                            <a href="javascript:void(0)" onclick="changeCity(3302)">北京</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" onclick="changeCity(3304)">上海</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" onclick="changeCity(283)">广州</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" onclick="changeCity(285)">深圳</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" onclick="changeCity(160)">南京</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" onclick="changeCity(173)">杭州</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" onclick="changeCity(174)">宁波</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" onclick="changeCity(164)">苏州</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" onclick="changeCity(361)">成都</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" onclick="changeCity(3303)">天津</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" onclick="changeCity(202)">厦门</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" onclick="changeCity(3305)">重庆</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" onclick="changeCity(255)">武汉</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" onclick="changeCity(414)">西安</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" onclick="changeCity(81)">衡水</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" onclick="changeCity(105)">沈阳</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" onclick="changeCity(222)">青岛</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" onclick="changeCity(73)">秦皇岛</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" onclick="changeCity(71)">石家庄</a>
                        </li>

                        <li>
                            <a href="javascript:void(0)" onclick="changeCity(999999)">全国</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <a href="<?php echo $this->config->item('shop_url'); ?>" target="_blank">服务商登录</a>
            </li>
        </ul>
        <ul class="floatright nav-menu">

            <?php if(empty($_SESSION['user'])):?>
                <li class="left_zc">
                    <a href="/user/register">注册</a>
                </li>
                <li>
                    <a href="/user/login">用户登录</a>
                </li>
            <?php else:?>

                <li>
                    <a href="/user/index"><?php echo $_SESSION['user']['username']?></a>
                </li>
                <li>
                    <a href="/user/logout" target="_blank">退出登录</a>
                </li>

            <?php endif;?>

            <li style="position: relative;">
                <img class="rel-tel" src="<?php echo IMG?>/common/phone_logo.png">
                <a href="http://www.js715.com/2024/03/17/%e4%bc%81%e4%b8%9a%e6%9c%8d%e5%8a%a1%e5%b9%b3%e5%8f%b0/" target="_blank">jacky588@qq.com</a>
            </li>
        </ul>

    </div>
</div>