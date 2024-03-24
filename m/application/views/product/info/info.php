<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1, minimum-scale=1,user-scalable=no">

    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta name="format-detection" content="telephone=no, email=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="<?php echo $good_info['seo_keywords'];?>">
    <meta name="description" content="<?php echo $good_info['seo_description'];?>">

    <title><?php echo $goods_title?> - XXXXX</title>
    <link href="<?php echo CSS;?>/info.css" rel="stylesheet">
    <script src="<?php echo JS;?>/common/reset.js"></script>

    <script type="text/javascript" src="<?php echo JS;?>/common/jquery-1.11.3.min.js"></script>

    <script type="text/javascript" src="<?php echo JS;?>/common/service.js"></script>
    <script type="text/javascript">
        $(function(){

       
        $('.menu').find('a').on('click', function () {
                var $this = $(this);
                $this.addClass('active').parent().siblings('span').find('a').removeClass('active');
                var _id = $this.attr('data-id');
                $('.js-tab-' + _id).removeClass('hidden').siblings('div').addClass('hidden');
            });
        });
    </script>
</head>

<body>
    <header>

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
    <div class="layout">
        <div class="product-banner">
            <!-- <div class=" ">
                <div class=" " > -->
            <img src="<?php echo $this->config->item('goods_images_url').$good_info['picname'];?>">
            <!-- </div>
            </div> -->
        </div>

        <div class="info">
            <h2 id="goodsinfo" data-id="<?php echo $good_info['id']?>"><?php echo $goods_title?></h2>
            <p class="info-d"></p>
            <div class="price">
                <span class="title">价格：</span>
                <span class="num" id="saleprice"><?php echo $good_info['totalprice']?>元</span>

                <!-- 暂无价格 显示 S -->
                <!-- <span class="dis">暂无价格</span> -->
                <!-- 暂无价格 显示 E -->
            </div>

            <div class="type">
                <span class="title">类型</span>
                <div class="list">
                    <ul>
                        <?php foreach ($goods_list as $key=>$good):?>

                            <li class="<?php if(!isset($_REQUEST['id'])){
                                if($good['id'] == $good_info['id']){
                                    echo 'active';
                                }
                            }else{
                                if($good['id'] == $_REQUEST['id']){
                                    echo 'active';
                                }
                            }?>">
                                <a href="<?php echo site_url('product/info') . '?id=' . $good['id'] . '&tid=' . $good['category3'] . '&sid=' . $good['category2'];?>"><?php echo $good['all_name'];?></a>
                            </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>


            <?php if($good_info['is_region'] == 0):?>
            <div class="area" id="areatype" data-id="1">
                <span class="title">地区</span>
                <div class="Select-address">
                    <span  class="text allAddress">全国</span>
                </div>

            </div>
            <?php else:?>
            <div class="area" id="areatype" data-id="2">
                <span class="title">地区</span>
                <span class="text" data-id="<?php echo $this->config->item('default_provinceid');?>" id="newprovince"><?php echo $this->config->item('default_province');?></span>
                     
                <span class="text"  data-id="<?php echo $this->config->item('default_cityid');?>" id="newCity"><?php echo $this->config->item('default_city');?></span>
                         
                <span class="text" data-id="<?php echo $this->config->item('default_areaid');?>"  id="newarea"><?php echo $this->config->item('default_area');?></span>
                              
                <div class="change js-change-area" >
                    <span>更换</span>
                    <img src="<?php echo IMAGES;?>/product_jiantou.png" alt="">
                </div>
            </div>
            <?php endif;?>



        </div>
        <div class="js-product-main">
            <!--tab title S-->
            <div class="menu js-main-tab">
                <span class="serviceRang">
                    <a class="active" data-id="1">服务详情</a>
                </span>
                <span class="userReview">
                    <a data-id="2">用户评价</a>
                </span>
            </div>
            <!--tab title E-->
            <!--服务详情 S-->
            <div>
            <div class="intro js-tab-1">
               
                <div class="k-content ">
                    <?php echo $good_info['content'];?>
                </div>
               
            </div>
            <!--服务详情 E-->
             
                <div class="evaluate js-tab-2 hidden"> 
                <div class="evaluate-title">
                    <span class="head">用户评价</span>
                    <div class="good">
                        <span class="name">好评率:</span>
                        <span class="rate js-evaluationrate"><span id=rate></span></span>
                    </div>
                    <a class="num js-evaluationnum" href="<?php echo site_url('product/commentList') . '?gid='.$good_info['id']?>"><span id="commentNum"></span>条评价 &gt;</a>
                </div>
                <!-- 评价详情  S-->
                <div id="evaluation-list">

                </div>
            </div>
        </div>
        <!-- 评价详情  E-->
    
                
        </div>
        <!--地区 S-->
        <div class="arealist js-arealist hidden">
                <div class="shadow hidden">
                    <h2>请选择城市:</h2>
                    <div class="list">
                        <ul id="change-province">

                        </ul>
                        <ul id="change-city" class="hidden">

                        </ul>
                        <ul id="change-area" class="hidden">

                        </ul>
                    </div>
                    <hr> 
                    <div class="res js-res hidden">
                        <span id="current-citytitle">当前城市:宣城市</span>
                        <span class="change js-change-city">更换</span>
                    </div>
                </div>
            </div>
           
        <!--地区 E-->

    </div>
    <!--右侧悬浮工具条  star 
    <div class="m-customer">
        <a  href="tel:62129799" >
            <div class="customer-icon-1"></div>
        </a>
        <a href="javascript:;" onclick="openZixun();">
            <div class="customer-icon-2"></div>
        </a>
    </div>
    右侧悬浮工具条  end-->
    <footer class="">
      
        <a href="javascript:;" class="freecall realcall">免费电话咨询</a>
       
        <a href="javascript:;" id="buys" class="buys">购买服务</a>
    </footer>
    <script>


        $(function () {

            var _flag = false;
            $('.area').find('.change').on('click', function (e) {
                $('.arealist').show();
                setTimeout(function () {
                    $('.shadow').removeClass('hidden');
                }, 100);
            });
            $('.shadow').on('click', function (e) {
                e.stopPropagation(); //阻止mousedown 事件冒泡（注意只阻止了mousedown事件）

            });
            $('.arealist').on('click', function (e) {
                var $this = $(this);
                if( $("#change-area").hasClass('hidden') || !$('.arealist').hasClass('hidden')){
                    location.reload();

                }else{
                    $this.fadeOut().find('.shadow').addClass('hidden');
                }
            });

            //加载评论
            /*用户评价*/
            $.ajax({
                url: "<?php echo site_url('product/ajaxCommentList')?>" + '?gid=' + $('#goodsinfo').data('id'),
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    var count = data.data.num;
                    var rate = data.data.rate;
                    $('#commentNum').html(count);
                    $('#rate').html(rate);
                    var list = '';console.log(list);
                    for (var i = 0; i < data.data.list.length; i++) {
                        //data.data.list[i].star_level   代表星级，1-5
                        list += "<div class=\"item\">" +
                            "<div class=\"infos\">" +
                            "<ul class=\"stars\">" +
                            "<li><span></span></li>" +
                            "<li><span></span></li>" +
                            "<li><span></span></li>" +
                            "<li><span></span></li>" +
                            "<li><span></span></li></ul>" +
                            "<span class=\"name\">" +
                            "<?php echo $good_info['all_name']?>"
                            +"(上海-杨浦区)</span>" +
                            "<span class=\"date\">"+data.data.list[i].add_time+"</span>" +
                            "</div>" +
                            "<div class=\"comment\">" +
                            "<p class=\"content\">"+data.data.list[i].content+"</p>" +
                            "<div class=\"tips\">"
                        for (var j = 0; j < data.data.list[i].tag_list.length; j++) {
                            list += "<span>"+data.data.list[i].tag_list[j].tagname+"</span>";
                        }
                        list +="</div></div></div><hr>";

                    }

                    $('#evaluation-list').append(list);


                }
            });


        })

        /*城市联动 S */
        $(function () {

            $.ajax({
                url: "<?php echo site_url('product/getProvince')?>",
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    var userModel = " ";
                    for (var i = 0; i < data.data.length; i++) {
                        userModel += ' <li href="javascript:;"  onclick="getCity(this);" data-id=' + data.data[i].id + ' data-name=' + data.data[i].name + '  >' + data.data[i].name + '</li>';
                    }
                    $('#change-province').append(userModel);
                    $("#change-province").removeClass('hidden');

                    $("#change-city").addClass('hidden');
                    $("#change-area").addClass('hidden');

                }
            });

            // 修改地区后触发一次  更换服务商  的点击事件

            // 页面加载，获取好评率

            // 默认选中地区 先设置上海的
            var productsalesattrid = $("#productsalesattrid").val();

            var currentcttitle = $("#currentcttitle").val();
            var productskuid = $("#productskuid").val();
            var currentarartitle = $("#currentarartitle").val();
            $('.js-change-area').click(function () {

                $("#change-province").removeClass('hidden');
                $("#change-city").addClass('hidden');
                $("#change-area").addClass('hidden');
                $('.js-arealist').removeClass('hidden');
            });
            $('.js-change-city').click(function () {
                $("#change-province").removeClass('hidden');
                $("#change-city").removeClass('hidden');
                $("#change-area").addClass('hidden');
                $(".js-res").addClass('hidden');
            });

        });
        //获取市
        function getCity(city) {
            var city_obj = $(city)
            var cityid = city_obj.data('id');
            var cityName = city_obj.data('name');
            $('#newprovince').text(cityName);
            $('#newprovince').attr('data-id',cityid);

            if (city) {
                $("#newCity").text(" ");
                $("#newarea").text(" ");
                $.ajax({
                    url: "<?php echo site_url('product/getCity')?>" + '?rid='+ cityid + '&gid='+ "<?php echo $good_info['id']?>" ,
                    data: cityid,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        var userModel = " ";
                        for (var i = 0; i < data.data.length; i++) {

                            if(data.data[i].isuse === 0){
                                userModel += ' <li class="dis"  disabled="disabled" href="javascript:;"  data-id=' + data.data[i].id + '  data-name=' + data.data[i].name + ' >' + data.data[i].name + '</li>';
                            }else{
                                userModel += ' <li href="javascript:;" onclick="getArea(this);"  data-id=' + data.data[i].id + '  data-name=' + data.data[i].name + ' >' + data.data[i].name + '</li>';
                            }

                        }
                        $('#change-city').append(userModel);
                        $("#change-province").addClass('hidden');
                        $("#change-city").removeClass('hidden');
                        $("#change-area").addClass('hidden');
                        $("#newAddress").append(cityName);
                        //如果没有改地区 则给li 的class 添加 dis


                    }
                });
            }
        }


        //获取区
        function getArea(area) {

            var area_obj = $(area)
            var areaid = area_obj.data('id');
            var areaName = area_obj.data('name');
            $('#newCity').text(areaName);
            $('#newCity').attr('data-id',areaid);
            if (area) {
                $.ajax({
                    url: "<?php echo site_url('product/getArea')?>" + '?rid='+areaid + '&gid='+ "<?php echo $good_info['id']?>" ,
                    data: areaid,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {

                        var userModel = " ";
                        for (var i = 0; i < data.data.length; i++) {
                            if(data.data[i].isuse == 0){
                                userModel += ' <li class="dis" disabled="disabled" href="javascript:;"  data-name=' + data.data[i].name + '  data-id=' + data.data[i].id + ' >' + data.data[i].name + '</li>';
                            }else{
                                userModel += ' <li   href="javascript:;" onclick="arealist(this)" data-price = '+data.data[i].price+' data-name=' + data.data[i].name + '  data-id=' + data.data[i].id + ' >' + data.data[i].name + '</li>';
                            }
                        }
                        $('#change-area').append(userModel);
                        $("#change-province").addClass('hidden');
                        $("#change-city").addClass('hidden');
                        $("#change-area").removeClass('hidden');

                        $("#newAddress").append(areaName);

                    }
                });
            }
        }
        function arealist(address){
            var address_obj = $(address)
            var addressid = address_obj.data('id');
            var addressName = address_obj.data('name');
            var addressPrice = address_obj.data('price');
            $('#newarea').text(addressName);
            $('#newarea').attr('data-id',addressid);
            $(".js-arealist").css('display','none');
            $("#change-city").html("");
            $("#change-area").html("");

            $('#saleprice').text(addressPrice);



        }

        $('#buys').on('click',function () {
            if($('#areatype').data('id') === 2){
                var rid = $('#newprovince').data('id') + '_' + $('#newCity').data('id') + '_' + $('#newarea').data('id') + '_' + $('#goodsinfo').data('id');
            }else{
                var rid = $('#goodsinfo').data('id');
            }

            window.location = "<?php echo site_url('product/exService')?>" + '?id=' + rid;
        });




    </script>
   
    
</body>

</html>