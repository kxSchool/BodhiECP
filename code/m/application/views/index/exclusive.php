<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>专属定制 —— XXXXX</title>
    <link rel="stylesheet" href="<?php echo CSS?>/product/item/exclusive.css">
    <script type="text/javascript" src="<?php echo JS?>/common/reset.js"></script>
    <script type="text/javascript" src="<?php echo JS?>/common/jquery-1.11.3.min.js"></script>
    <script>
        //切换登录方式
        $(function () {
            $('.js-tab').find('a').on('click', function () {
                var $this = $(this);
                $this.addClass('active').parent().siblings('li').find('a').removeClass('active');
                var _id = $this.attr('data-id');
                $('.js-tab').removeClass('a-1 a-2').addClass('a-' + _id);
                $('.js-form-' + _id).removeClass('hidden').siblings('form').addClass('hidden');
                $(this).each(function () {
                if ($(this).hasClass('active')) {
                    var state=$(this).html();
                   $('#companyState').attr('value',state);
                    
                }
            })
         })
        });

    </script>
</head>

<body>
    <header>
        <a href="/">
            <span class="home"></span>
        </a>
        <a href="#">
            <span class="title"></span>
        </a>

        <a href="/user/index">
            <span class="person"></span>
        </a>

    </header>
    <div class="layout">
        <div class="home-hot">
            <div class="i-title"><h3>请选择您公司目前的状况</h3></div>
        </div>
        <div class="provider js-tab a-1">
            <ul class="clearfix">
                <li>
                    <a href="javascript:;" class="unregistered active" data-id="1">目前尚未注册公司</a>
                </li>
                <li>
                    <a href="javascript:;" class="Registered" data-id="2">目前已注册公司</a>
                </li>
            </ul>
        </div>
        <form class="unregister-form js-form-1" id="phoneForm">
                <input type="text" class="hidden" id="companyState" value="" name="company_status"/>
            <div class="home-hot">
                <div class="i-title"><h3>请确认您的联系方式</h3></div>
            </div>
            <div class="contact">
                <div class="contact_Name">
                    <label style="letter-spacing:0.22rem">姓名:</label>
                    <input value="" type="text" class="nameInput" placeholder="请输入您的姓名" name="name">
                </div>
                <div class="contact_phone">
                    <label style="margin-right: 0.17rem;">手机号码:</label>
                    <input value="" class="phoneInput" placeholder="请输入您的手机号" name="mobile">
                </div>
            </div>


            <div class="comment">
                <textarea name="content" placeholder="告诉我们您的需求，200字以内（如：我想在金山区内注册一家内资公司...）"></textarea>
            </div>
            <button type="button" class="assess-submit">提交委托</button>
        </form>
       
    </div>


    <script>
        $('.assess-submit').on('click',function () {
            var data = $('#phoneForm').serialize();
            $.ajax({
                url : "<?php echo site_url('index/customization');?>",
                data : data,
                dataType : 'JSON',
                type : 'POST',
                success : function (res) {
                    if(res.code === 0){
                        alert(res.mes);
                        location.href = res.url;
                    }else{
                        alert(res.mes);
                        location.reload();
                    }
                }
            });
        });
    </script>
</body>

</html>