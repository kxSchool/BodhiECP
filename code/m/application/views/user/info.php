<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>修改信息 - XXXXX</title>
    <script src="<?php echo JS;?>/common/reset.js"></script>
    <link rel="stylesheet" href="<?php echo CSS;?>/user/accountInfo.css">
   
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
    <div class="layout">
        <form id="form1" method="post" action="#">
            <div class="mycenter-head">
                <div class="headerImg">
                    <?php if(empty($icon)):?>
                    <img src="<?php echo IMAGES;?>/selfCenter.png">
                    <?php else:?>
                        <img src="<?php echo 'https://www.kxschool.com/avatar/'.$userid.'/'.$icon;?>" id="icon">
                    <?php endif;?>
                    <input class="file" accept="image/*" id="file" name="file" type="file" onchange="upload()" />
                    <p href="javascript:;" class="upload">修改图像 </p>
                </div>
                <div class="tip">
                        <p>修改图像</p>
                </div>
            </div>
        </form>


        <!-- 信息修改 start-->

        <form action="" id="userinfo">
            <div class="mycenter-module">

                <ul>
                    <li class="mycenter-module-li">
                        <img class="info-1" src="<?php echo IMAGES;?>/info/info_1.png">

                            <a class="word">真实姓名</a>
                            <a href="#" class="name">
                            <input type="text"  name="name" placeholder="请填写" value="<?php echo $realname;?>">

                            </a>
                    </li>
                    <hr/>
                    <li class="mycenter-module-li sexli">
                        <img class="info-2" src="<?php echo IMAGES;?>/info/info_2.png">

                            <a class="word">性别</a>
                            <label for="sex" id="sex_txt" class="label"><?php if(empty($sex)){echo '请选择';}else{echo $sex;}?></label>
                            <a class="sex">
                                  <select name="sex" id="sex" >
                                    <option value="0">保密</option>
                                    <option value="1">男</option>
                                    <option value="2">女</option>
                                </select>
                            </a>

                    </li>

                    <hr/>
                    <li class="mycenter-module-li dateli" style="padding-left: 0.19rem">
                        <img class="info-3" src="<?php echo IMAGES;?>/info/info_3.png">
                            <a class="word">生日</a>
                            <label for="birthday" class="label" id="birthday_txt"><?php if(empty($sex)){echo '请选择';}else{echo date('Y-m-d',$birthday);}?></label>
                            <a class="birthday">

                                <input type="date" id="birthday" value=""  name="birthday">
                            </a>
                    </li>
                    <hr/>
                    <script type="text/javascript">
                        $(function(){
                            $('#sex').change(function(){

                                $('#sex_txt').html($('#sex option:selected').text())
                            })
                            $('#birthday').change(function(){
                                $('#birthday_txt').html($(this).val())
                            })
                        })
                    </script>
                </ul>

            </div>
            <div class="mycenter-module">
                <ul>
                    <li class="mycenter-module-li">
                        <img class="info-4" src="<?php echo IMAGES;?>/info/info_4.png">
                        <a class="word">手机号码修改</a>
                        <a href="<?php echo site_url('base/changeMobile') ."?mobile=". $mobile;?>" class="phone">
                        <input type="tel"  name="mobile" placeholder="点击修改" value="<?php echo $mobile;?>">

                        </a>
                    </li>
                    <hr/>
                    <li class="mycenter-module-li">
                        <img class="info-5" src="<?php echo IMAGES;?>/info/info_5.png">
                        <a class="word">登录密码修改</a>
                        <a href="<?php echo site_url('user/changePwd');?>" class="password">
                        <input type="tel" placeholder="点击修改">

                        </a>
                    </li>
                    <hr/>
                    <li class="mycenter-module-li" style="padding-left: 0.19rem">
                        <img class="info-6" src="<?php echo IMAGES;?>/info/info_6.png">
                        <a class="word">邮箱</a>
                        <a href="#" class="email">
                        <input type="email"  name="email" placeholder="请填写" value="<?php echo $email;?>">

                        </a>
                    </li>
                    <hr/>
                </ul>
            </div>
            <div class="mycenter-module">
            <ul>
                <li class="mycenter-module-li">
                    <img class="info-7" src="<?php echo IMAGES;?>/info/info_7.png">
                    <a class="word">所在公司</a>
                    <a href="#" class="company">
                    <input type="text"  name="company" placeholder="请填写" value="<?php echo $company;?>">
                    
                    </a>
                </li>
                <hr/>
                <li class="mycenter-module-li">
                    <img class="info-8" src="<?php echo IMAGES;?>/info/info_8.png">
                    <a class="word">职务</a>
                    <a href="#" class="post">
                    <input type="email"  name="post" placeholder="请填写" value="<?php echo $post;?>">
                    
                    </a>
                </li>
                <hr/>
                <li class="mycenter-module-li" style="padding-left: 0.19rem">
                    <img class="info-9" src="<?php echo IMAGES;?>/info/info_9.png">
                    <a class="word">公司所在地</a>
                    <a href="#" class="companyAddress">
                    <input type="email"   placeholder="请填写">
                    
                    </a>
                </li>
                <hr/>
            </ul>
        </div>
        </form>
        <button class="edit-btn" id="submit">保存</button>
        <!--退出 E-->
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
    <script type="text/javascript">
            /*上传图片请求*/
        function upload()
        {

            var animateimg = $("#file").val(); //获取上传的图片名 带//
            var imgarr=animateimg.split('\\'); //分割
            var myimg=imgarr[imgarr.length-1]; //去掉 // 获取图片名

            var houzui = myimg.lastIndexOf('.'); //获取 . 出现的位置
            var ext = myimg.substring(houzui, myimg.length).toUpperCase();  //切割 . 获取文件后缀

            var file = $('#file').get(0).files[0]; //获取上传的文件
            var fileSize = file.size;           //获取上传的文件大小

            var maxSize = 1048576;              //最大1MB

            if(ext !='.PNG' && ext !='.GIF' && ext !='.JPG' && ext !='.JPEG' && ext !='.BMP'){
                alert('文件类型错误,请上传图片类型');
                return false;
            }else if(parseInt(fileSize) >= parseInt(maxSize)){
                alert('上传的文件不能超过1MB');
                return false;
            }else{
                var data = new FormData($('#form1')[0]);

                $.ajax({
                    url: "/user/changeIcon",
                    type: 'POST',
                    data: data,
                    dataType: 'JSON',
                    cache: false,
                    processData: false,
                    contentType: false
                }).done(function(ret){

                    if(ret.code === 0){
                        $('#icon').attr('src',ret.url);
                    }else{
                        alert(ret.mes);
                    }
                });
                return false;
            }
        }

        $('#submit').on('click',function () {
            var data = $('#userinfo').serialize();
            $.ajax({
                data : data,
                url : "<?php echo site_url('user/changeInfo')?>",
                type : 'POST',
                dataType : 'JSON',
                success : function (res) {
                    if(res.code === 0){
                        location.reload();
                    }else{
                        window.location = "<?php echo site_url('user/index')?>"
                    }
                }
            });
        });
    </script>
</body>

</html>