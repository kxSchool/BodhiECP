<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, minimum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>产品分类 - XXXXX</title>
    <!-- <link rel="stylesheet" href="../css/common/common.css"> -->
    <link rel="stylesheet" href="<?php echo CSS;?>/product/productlist.css">
    <link rel="stylesheet" href="<?php echo CSS;?>/swiper.min.css">
    <script src="<?php echo JS;?>/common/reset.js" type="text/javascript"></script>
    <script src="<?php echo JS;?>/common/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo JS;?>/common/url.js" type="text/javascript"></script>

    <script type="text/javascript" src="<?php echo JS;?>/common/service.js"></script>
     <script type="text/javascript">
      $(function () {
            $('.k-nav').find('a').on('click', function () {
                var $this = $(this);
                $this.addClass('active').parent().siblings('li').find('a').removeClass('active');
                var _id = $this.attr('data-id');
                $('.js-form').find('ul').addClass('hidden');
               if( $('.js-form-' + _id).length == 0){
                $.ajax({
                    url : "<?php echo site_url('product/ajaxGetCate') ?>" + '?cid=' + _id,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        // var list = data.data.goodsName;
                       
                        var userModel =" ";
                    for (var i = 0; i < data.data.length; i++) {

                        userModel+=' <ul class="js-form-'+_id+'"><li class="title active"><span class="text">'+data.data[i].categorytitle+'</span></li>';

                        // userModel+= '<ul class="js-form-'+_id+'"><li class=\"title active"\>' + '<span class=\"text"\>'+data.data[i].categorytitle+'</span>' + '</li>';
                        for (var j = 0; j < data.data[i].categoryName.length; j++) {
                            var url = "<?php echo site_url('product/info');?>" + '?tid=' + data.data[i].categoryName[j].cat_id +'&sid='+data.data[i].categoryid;
                            userModel +=' <li class="item"><a href="'+url+'"><img src="/public/images/common/circular.png" ><em>' + data.data[i].categoryName[j].cat_name + '</em><span class="arrow"></span></a> </li>';
                            // userModel += '<li class="item"><a href="../product/info/1.html"><p>' + data.data[i].goodsName[j].name + '</p></a></li>';
                            
                        }
                        userModel +=  '</ul>';
                    }
                       
                        // $('.k-content').removeClass('a-1').addClass('a-' + _id);css('background-color', 'red');
                        
                        $('.k-content').append(userModel);
                        
                    }
                });
                }
                $('.js-form-' + _id).siblings('ul').addClass('hidden');
                $('.js-form-' + _id).removeClass('hidden');
            });
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
        <div class="k-nav">
            <ul>
                <?php foreach ($cate as $ca):?>
                <li>
                    <a href="#" data-id="<?php echo $ca['cat_id'];?>"><span><?php echo $ca['cat_name'];?></span></a>
                </li>
                <?php endforeach;?>

            </ul>
        </div>
        <div class="k-content js-form">
            <!-- <ul class="js-form-1">
                <li class="title active">
                    <span class="text">公司注册</span>
                </li>
                <li class="item">
                    <i></i>
                    <a href="../product/info/1.html">
                        公司注册记账
                    </a>
                    <span class="arrow"></span>
                </li>
            </ul> -->
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
    <script type="text/javascript">
        $(function () {
            var id = $('.k-nav ul li:first-child a').data('id');
            $('.k-nav ul li:first-child a').addClass('active');
            $.ajax({
                // url: window.productDeatil+_id+'.json',
                url : "<?php echo site_url('product/ajaxGetCate') ?>" + '?cid=' + id,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    // var list = data.data.goodsName;

                    var userModel =" ";
                    for (var i = 0; i < data.data.length; i++) {

                        userModel+=' <ul class="js-form-'+id+'"><li class="title active"><span class="text">'+data.data[i].categorytitle+'</span></li>';

                        // userModel+= '<ul class="js-form-'+_id+'"><li class=\"title active"\>' + '<span class=\"text"\>'+data.data[i].categorytitle+'</span>' + '</li>';
                        for (var j = 0; j < data.data[i].categoryName.length; j++) {
                            var url = "<?php echo site_url('product/info');?>" + '?tid=' + data.data[i].categoryName[j].cat_id +'&sid='+data.data[i].categoryid;
                            userModel +=' <li class="item"><a href="'+url+'"><img src="/public/images/common/circular.png" ><em>' + data.data[i].categoryName[j].cat_name + '</em><span class="arrow"></span></a> </li>';
                            // userModel += '<li class="item"><a href="../product/info/1.html"><p>' + data.data[i].goodsName[j].name + '</p></a></li>';

                        }
                        userModel +=  '</ul>';
                    }

                    // $('.k-content').removeClass('a-1').addClass('a-' + _id);css('background-color', 'red');

                    $('.k-content').append(userModel);

                }
            });
        })
    </script>
</body>

</html>