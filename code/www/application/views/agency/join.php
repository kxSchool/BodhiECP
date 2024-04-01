<!DOCTYPE html>
<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="x-dns-prefetch-control" content="on">
		<title>XXXXX - 一站式创业孵化服务</title>
        <link rel="shortcut icon" href="<?php echo IMG?>/common/favicon.ico" type="image/x-icon">
		<link href="<?php echo CSS?>/common/serviceCommon.css" rel="stylesheet" type="text/css">
		<link href="<?php echo CSS?>/serviceSort.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="<?php echo CSS?>/EnterType.css" />
        <link rel="stylesheet" href="<?php echo CSS?>/common/base.css">
    </head>

    <body>
        <div id="nTalk_post_hiddenElement" style="left: -10px; top: -10px; visibility: hidden; display: none; width: 1px; height: 1px;"></div>
        <!--header start-->
        <header>
            <?php include_once BASE.'/top.php';?>
            <div class="personal-header">
                <div class="container clearfix logo myTab">
                    <a href="/" class="my-logo"><img src="<?php echo IMG?>/agency/logo.png"></a>
                    <a href="/agency/index" class="my-main">服务商入驻</a>
                </div>
            </div>

        </header>
        <!--header end-->
        <!--layout start-->
        <div class="layout">
            <div class="bg-white">
                <div class="container">
                    <div class="mycenter">
                        <div class="tip_title">
                            <p>
                                服务商入驻>资质认证
                            </p>
                        </div>
                        <div class="immp-content">
                            <!--选择入驻类型 S-->
                            <div class="st"  id="identity" data-id="">
                                <div class="step-content">

                                    <div id="head-step" class="not-select current-step-1 slider-head-step-height">

                                        <!-- 判断显示是三个步骤还是四个步骤 -->
                                        <div class="step-img">

                                            <div class="step-img-item slider-step-img-item-four-1"></div>
                                        </div>

                                        <div class="step-text text-item-1 step-img-item-four">
                                            <span>第一步</span>选择认证身份</div>

                                        <div class="step-text text-item-2 step-img-item-four" style="padding-right: 19px;">
                                            <span>第二步</span>选择入驻类目</div>

                                        <div class="step-text text-item-3 step-img-item-four" style="padding-right: 39px;">
                                            <span>第三步</span>填写入驻信息</div>

                                        <div class="step-text text-item-4 step-img-item-four" style="padding-right: 50px;">
                                            <span>第四步</span>提交审核</div>

                                    </div>

                                </div>
                                <div class="immp-title">选择认证身份</div>
                                <div class="immp-choice clearfix">

                                    <div class="immp-type personalType fl" style="border-right:1px solid #dadada;">
                                        <img src="<?php echo IMG?>/agency/personal.png" alt="" data-type="personal">
                                        <h3>个人资质认证</h3>
                                        <p>本流程适合个人身份入驻，需要提供身份证正反面
                                            <br>以及行业领域的能力证明，才能开设店铺和发布商品</p>
                                    </div>

                                    <div class="immp-type  enterpriseType fl">
                                        <img src="<?php echo IMG?>/agency/company.png" alt="" data-type="company">
                                        <h3>企业资质认证</h3>
                                        <p>本流程适合公司企业，个体工商户，社会团体组织
                                            <br>入驻，需要提供营业执照、运营人员身份信息、对
                                            <br>应领域的资质证明，才能开设店铺和发布商品</p>
                                    </div>
                                </div>
                            </div>
                            <!--选择入驻类型 E-->
                            <!--选择入驻类型 S-->
                            <div class="nd hidden" data-id="0">
                                <div class="step-content">

                                    <div id="head-step" class="not-select current-step-1 slider-head-step-height">

                                        <!-- 判断显示是三个步骤还是四个步骤 -->
                                        <div class="step-img">

                                            <div class="step-img-item slider-step-img-item-four-2">

                                            </div>
                                        </div>

                                        <div class="step-text text-item-1 step-img-item-four">
                                            <span>第一步</span>选择认证身份</div>

                                        <div class="step-text text-item-2 step-img-item-four" style="padding-right: 19px;">
                                            <span>第二步</span>选择入驻类目</div>

                                        <div class="step-text text-item-3 step-img-item-four" style="padding-right: 39px;">
                                            <span>第三步</span>填写入驻信息</div>

                                        <div class="step-text text-item-4 step-img-item-four" style="padding-right: 50px;">
                                            <span>第四步</span>提交审核</div>

                                    </div>

                                </div>
                                <div class="immp-title clearfix">选择入驻类目（*包含认证标签的类目，需要提供特殊资质证件）</div>
                                <div class="nav-list">
                                </div>

                                <!--提交按钮  S-->
                                <div class="immp-step" style="margin-top: 80px;">

                                    <p class="prev nd-prev">上一步</p>

                                    <p class="next btn btn-radius btn-fill btn-warning nd-next" style="font-size: 14px">下一步</p>
                                </div>
                                <!--提交按钮  E-->
                            </div>

                            <!--选择入驻类型 E-->
                            <!--个人信息填写 S-->
                            <div class="rd per-info hidden" data-type="personal">
                                <div class="step-content">

                                    <!-- 判断当前场景，会导致宽度不同  slider：宽度720，高度120  top: 宽度870，高度0  默认：宽度870，高度160-->

                                    <div id="head-step" class="not-select current-step-3 slider-head-step-height">

                                        <!-- 判断显示是三个步骤还是四个步骤 -->
                                        <div class="step-img">

                                            <div class="step-img-item slider-step-img-item-four-3"></div>
                                        </div>

                                        <div class="step-text text-item-1 step-img-item-four"><span>第一步</span>选择认证身份</div>

                                        <div class="step-text text-item-2 step-img-item-four" style="padding-right: 19px;"><span>第二步</span>选择入驻类目</div>

                                        <div class="step-text text-item-3 step-img-item-four" style="padding-right: 39px;"><span>第三步</span>填写入驻信息</div>

                                        <div class="step-text text-item-4 step-img-item-four" style="padding-right: 50px;"><span>第四步</span>提交审核</div>
                                    </div>
                                </div>
                                <form class="immp-from" id="personInfo">
                                    <div class="base-info">
                                        <div class="immp-title">
                                            个人信息
                                        </div>
                                        <div class="info-content">
                                            <div class="info-id clearfix">
                                                <div class="form-item fl" style="margin-right: 40px;">
                                                    <label for="name" style="letter-spacing: 6px;"><i>*</i>姓名：</label>

                                                    <input type="text" name="personName" placeholder="请输入姓名" maxlength="12">

                                                    <div class="error-tip"><em></em>请输入姓名</div>
                                                </div>
                                                <div class="form-item fl" style="margin-right: 40px">
                                                    <label for="name"><i>*</i>身份证号码：</label>

                                                    <input type="text" name="personNo" placeholder="请输入身份证号码" maxlength="18">

                                                    <div class="error-tip"><em></em>请输入身份证号码</div>
                                                </div>
                                                <div class="form-item fl">
                                                    <label for="name"><i>*</i>手机号码：</label>
                                                    <input type="text" name="personMobile" placeholder="请输入手机号码" maxlength="11" value="">
                                                    <div class="error-tip"><em></em>请输入手机号码</div>
                                                </div>
                                            </div>
                                            <div class="info-address" data-provinceid="" data-cityid="" data-areaid="">
                                                <label for="name"><i>*</i>详细地址：</label>


                                                <input type="text" name="personAddress" class="xAdderss" placeholder="详细地址" maxlength="30" value="">

                                                <div class="error-tip"><em></em></div>
                                            </div>
                                            <div class="info-ident">
                                                <label for="ident" class="specialTitle"><i>*</i>上传手持身份证照片：</label>
                                                <div class="clearfix">

                                                    <div class="item">
                                                        <img class="icon addImg" onclick="clickImg(this);" src="<?php echo IMG?>/agency/idCard1.png">
                                                        <input name="userfile" type="file" class="upload_input" onchange="change(this)">
                                                        <div class="preBlock">
                                                            <img class="preview" alt="" name="pic" width="190" height="190">
                                                            <input type="hidden" name="front_identity_card" class="images">
                                                        </div>
<!--                                                        <img class="delete" onclick="deleteImg(this)" src="--><?php //echo IMG?><!--/agency/delete.png">-->
                                                    </div>
                                                    <div class="item">
                                                        <img class="icon addImg" onclick="clickImg(this);" src="<?php echo IMG?>/agency/idCard2.png">
                                                        <input name="url" type="file" class="upload_input" onchange="change(this)">
                                                        <div class="preBlock">
                                                            <img class="preview" alt="" name="pic" width="190" height="190">
                                                            <input type="hidden" name="back_identity_card" class="images">

                                                        </div>
<!--                                                        <img class="delete" onclick="deleteImg(this)" src="--><?php //echo IMG?><!--/agency/delete.png">-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="special-info">
                                        <div class="immp-title">上传特殊资质材料</div>
                                        <div class="info-content">

                                            <div class="info-ident info-special" data-name="互联网开发" data-lv="0">
                                                <label for="ident"><i></i><span class="specialTitle">互联网开发：</span></label>
                                                <ul class="clearfix">

                                                    <li class="info-img special fl" data-text="作品、相关工作证明或学历证明" data-code="">
                                                        <img class="icon addImg" onclick="clickImg(this);" src="<?php echo IMG?>/agency/idCard2.png">
                                                        <input name="url" type="file" class="upload_input" onchange="change(this)">
                                                        <div class="preBlock">
                                                            <img class="preview" alt="" name="pic" width="190" height="190">
                                                            <input type="hidden" name="special_identity" class="images">
                                                        </div>
<!--                                                        <img class="delete" onclick="deleteImg(this)" src="--><?php //echo IMG?><!--/agency/delete.png">-->
                                                    </li>

                                                </ul>

                                            </div>

                                            <div class="info-tips">
                                                温馨提示：您所选的
                                                <span>【<span>互联网开发</span>】</span>
                                                类目中包含特殊资质，需要提供以上特殊证件；可延后提供，未提供特殊证件期间，您将不能发布
                                                <span>【<span>互联网开发</span>】</span>
                                                类目下的服务商品。
                                            </div>

                                        </div>
                                    </div>
                                </form>

                                <div class="immp-step">

                                    <p class="prev personal-prev">上一步</p>

                                    <p class="next btn btn-radius btn-fill btn-warning personal-next" style="font-size: 14px">确认提交</p>
                                </div>
                            </div>
                            <!--个人信息填写 E-->
                            <!--企业信息填写 S-->
                            <div class="rd company-info hidden" data-type="personal">
                                <div class="step-content">

                                    <!-- 判断当前场景，会导致宽度不同  slider：宽度720，高度120  top: 宽度870，高度0  默认：宽度870，高度160-->

                                    <div id="head-step" class="not-select current-step-3 slider-head-step-height">

                                        <!-- 判断显示是三个步骤还是四个步骤 -->
                                        <div class="step-img">

                                            <div class="step-img-item slider-step-img-item-four-3"></div>
                                        </div>

                                        <div class="step-text text-item-1 step-img-item-four"><span>第一步</span>选择认证身份</div>

                                        <div class="step-text text-item-2 step-img-item-four" style="padding-right: 19px;"><span>第二步</span>选择入驻类目</div>

                                        <div class="step-text text-item-3 step-img-item-four" style="padding-right: 39px;"><span>第三步</span>填写入驻信息</div>

                                        <div class="step-text text-item-4 step-img-item-four" style="padding-right: 50px;"><span>第四步</span>提交审核</div>
                                    </div>
                                </div>
                                <form class="immp-from" id="companyInfo">
                                    <div class="base-info">
                                        <div class="immp-title">
                                            企业信息
                                        </div>
                                        <div class="info-content">
                                            <div class="info-id clearfix">
                                                <div class="form-item fl" style="margin-right: 40px;">
                                                    <label for="name"><i>*</i>企业名称：</label>

                                                    <input type="text" name="companyName" placeholder="请输入企业名称" maxlength="12">

                                                    <div class="error-tip"><em></em>请输入企业名称</div>
                                                </div>
                                                <div class="form-item fl" style="margin-right: 40px">
                                                    <label for="name"><i>*</i>营业执照号码：</label>

                                                    <input type="text" name="companyNo" placeholder="请输入营业执照号码" maxlength="18">

                                                    <div class="error-tip" style="margin-left: 88px;"><em></em>请输入正确的营业执照号码</div>
                                                </div>

                                            </div>
                                            <div class="info-address" data-provinceid="" data-cityid="" data-areaid="">
                                                <label for="name"><i>*</i>详细地址：</label>

                                                <input type="text" name="companyAddress" class="xAdderss" placeholder="详细地址" maxlength="30" value="">

                                                <div class="error-tip"><em></em></div>
                                            </div>
                                            <div class="info-ident">
                                                <label for="ident" class="specialTitle"><i>*</i>上传手持身份证照片：</label>
                                                <div class="clearfix">

                                                    <div class="item">
                                                        <img class="icon addImg" onclick="clickImg(this);" src="<?php echo IMG?>/agency/img_1.png">
                                                        <input name="url" type="file" class="upload_input" onchange="change(this)">
                                                        <div class="preBlock">
                                                            <img class="preview" alt="" name="pic" width="190" height="190">
                                                            <input type="hidden" name="business_card" class="images">
                                                        </div>
<!--                                                        <img class="delete" onclick="deleteImg(this)" src="--><?php //echo IMG?><!--/agency/delete.png">-->
                                                    </div>
                                                    <div class="item">
                                                        <img class="icon addImg" onclick="clickImg(this);" src="<?php echo IMG?>/agency/img_2.png">
                                                        <input name="url" type="file" class="upload_input" onchange="change(this)">
                                                        <div class="preBlock">
                                                            <img class="preview" alt="" name="pic" width="190" height="190">
                                                            <input type="hidden" name="organization_card" class="images">
                                                        </div>
<!--                                                        <img class="delete" onclick="deleteImg(this)" src="--><?php //echo IMG?><!--/agency/delete.png">-->
                                                    </div>
                                                    <div class="item">
                                                        <img class="icon addImg" onclick="clickImg(this);" src="<?php echo IMG?>/agency/img_3.png">
                                                        <input name="url" type="file" class="upload_input" onchange="change(this)">
                                                        <div class="preBlock">
                                                            <img class="preview" alt="" name="pic" width="190" height="190">
                                                            <input type="hidden" name="registration_card" class="images">
                                                        </div>
<!--                                                        <img class="delete" onclick="deleteImg(this)" src="--><?php //echo IMG?><!--/agency/delete.png">-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="special-info">
                                        <div class="immp-title">上传特殊资质材料</div>
                                        <div class="info-content">
                                            <div class="info-id clearfix">
                                                <div class="form-item fl" style="margin-right: 40px;">
                                                    <label for="name" style="letter-spacing: 6px;"><i>*</i>姓名：</label>

                                                    <input type="text" name="personName" placeholder="请输入姓名" maxlength="12">

                                                    <div class="error-tip"><em></em>请输入姓名</div>
                                                </div>
                                                <div class="form-item fl" style="margin-right: 40px">
                                                    <label for="name"><i>*</i>身份证号码：</label>

                                                    <input type="text" name="personNo" placeholder="请输入身份证号码" maxlength="18">

                                                    <div class="error-tip" style="margin-left: 80px;"><em></em>请输入身份证号码</div>
                                                </div>
                                                <div class="form-item fl">
                                                    <label for="name"><i>*</i>手机号码：</label>
                                                    <input type="text" name="personMobile" placeholder="请输入手机号码" maxlength="11" value="">
                                                    <div class="error-tip"><em></em>请输入手机号码</div>
                                                </div>

                                            </div>
                                            <div class="info-address" data-provinceid="" data-cityid="" data-areaid="">
                                                <label for="name"><i>*</i>详细地址：</label>

                                                <input type="text" name="personAddress" class="xAdderss" placeholder="详细地址" maxlength="30" value="">

                                                <div class="error-tip"><em></em></div>
                                            </div>
                                            <div class="info-ident">
                                                <label for="ident" class="specialTitle"><i>*</i>上传手持身份证照片：</label>
                                                <div class="clearfix">

                                                    <div class="item">
                                                        <img class="icon addImg" onclick="clickImg(this);" src="<?php echo IMG?>/agency/idCard1.png">
                                                        <input name="url" type="file" class="upload_input" onchange="change(this)">
                                                        <div class="preBlock">
                                                            <img class="preview" alt="" name="pic" width="190" height="190">
                                                            <input type="hidden" name="front_identity_card" class="images">
                                                        </div>
<!--                                                        <img class="delete" onclick="deleteImg(this)" src="--><?php //echo IMG?><!--/agency/delete.png">-->
                                                    </div>
                                                    <div class="item">
                                                        <img class="icon addImg" onclick="clickImg(this);" src="<?php echo IMG?>/agency/idCard2.png">
                                                        <input name="url" type="file" class="upload_input" onchange="change(this)">
                                                        <div class="preBlock">
                                                            <img class="preview" alt="" name="pic" width="190" height="190">
                                                            <input type="hidden" name="back_identity_card" class="images">
                                                        </div>
<!--                                                        <img class="delete" onclick="deleteImg(this)" src="--><?php //echo IMG?><!--/agency/delete.png">-->
                                                    </div>

                                                </div>
                                            </div>
                                                      <div class="info-ident">
                                                <label for="ident" class="specialTitle"><i>*</i>委托书:</label>
                                                <div class="clearfix">

                                                    <div class="item">
                                                        <img class="icon addImg" onclick="clickImg(this);" src="<?php echo IMG?>/agency/img_4.png">
                                                        <input name="url" type="file" class="upload_input" onchange="change(this)">
                                                        <div class="preBlock">
                                                            <img class="preview" alt="" name="pic" width="190" height="190">
                                                            <input type="hidden" name="power_card" class="images">
                                                        </div>
<!--                                                        <img class="delete" onclick="deleteImg(this)" src="--><?php //echo IMG?><!--/agency/delete.png">-->
                                                    </div>
                                                  

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <div class="immp-step">

                                    <p class="prev company-prev">上一步</p>

                                    <p class="next btn btn-radius btn-fill btn-warning company-next" style="font-size: 14px">确认提交</p>
                                </div>
                            </div>
                            <!--企业信息填写 E-->
                            <!--提交完成页面  S-->
                            <div class="five hidden" data-type="personal" data-code="Z10">
                                <div class="immp-banner">

                                    <img src="<?php echo IMG?>/agency/push-load.png" alt="">
                                    <h2>您的资料我们已收到，审核结果将在<span>1个工作日</span>内以短信通知您</h2>
                                    <p>如有疑问请致电021-6212-9799客服热线丨<span class="js-wui-webchat">在线客服</span></p>

                                </div>
                            </div>
                            <!--提交完成页面  E-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--layout end-->

        <script type="text/javascript">
            //点击
            var clickImg = function(obj) {
                $(obj).parent().find('.upload_input').click();
            }
            //删除
            var deleteImg = function(obj) {
                $(obj).parent().find('input').val('');
                $(obj).parent().find('img.preview').attr("src", "");
                //IE9以下
                $(obj).parent().find('img.preview').css("filter", "");
                $(obj).hide();
                $(obj).parent().find('.addImg').show();
            }
            //选择图片
            function change(file) {
                //预览
                var pic = $(file).parent().find(".preview");
                //添加按钮
                var addImg = $(file).parent().find(".addImg");
                //删除按钮
                var deleteImg = $(file).parent().find(".delete");

                var ext = file.value.substring(file.value.lastIndexOf(".") + 1).toLowerCase();

                // gif在IE浏览器暂时无法显示
                if(ext != 'png' && ext != 'jpg' && ext != 'jpeg') {
                    if(ext != '') {
                        alert("图片的格式必须为png或者jpg或者jpeg格式！");
                    }
                    return;
                }
                //判断IE版本
                var isIE = navigator.userAgent.match(/MSIE/) != null,
                    isIE6 = navigator.userAgent.match(/MSIE 6.0/) != null;
                isIE10 = navigator.userAgent.match(/MSIE 10.0/) != null;
                if(isIE && !isIE10) {
                    file.select();
                    var reallocalpath = document.selection.createRange().text;
                    // IE6浏览器设置img的src为本地路径可以直接显示图片
                    if(isIE6) {
                        pic.attr("src", reallocalpath);
                    } else {
                        // 非IE6版本的IE由于安全问题直接设置img的src无法显示本地图片，但是可以通过滤镜来实现
                        pic.css("filter", "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale',src=\"" + reallocalpath + "\")");
                        // 设置img的src为base64编码的透明图片 取消显示浏览器默认图片
                        pic.attr('src', 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==');
                    }
                    addImg.hide();
                    deleteImg.show();
                } else {
                    html5Reader(file, pic, addImg, deleteImg);
                }
            }
            //H5渲染
            function html5Reader(file, pic, addImg, deleteImg) {
                var formData = new FormData();
                formData.append("userfile", file.files[0]);

                //隐藏input
                var input = $(file).parent().find(".images");
                $.ajax({
                    data : formData,
                    type : 'POST',
                    processData:false,
                    contentType: false,
                    dataType : 'JSON',
                    url : '/upload/doUpload' + '?type=identity',
                    success : function (res) {
                        if(res.info === 1) {
                            pic.attr("src", res.data.file_name_url);
                            input.val(res.data.file_name);
                            addImg.hide();
                        }else {
                            alert(res.tip);
                        }
                    }

                });
            }
        </script>
    </body>
    <script type="text/javascript" src="<?php echo JS?>/jquery-1.8.3.min.js"></script>
    <script type="text/javascript">
            $(function(){
                var $navList = $('.nav-content').children('.clearfix');
                var $navContent = $('.nav-content');
                $('#nav-sub-list').find('li').on("click",function(){
                    var $this = $(this);
                    var _id = $this.index();
                    $this.addClass('active').siblings().removeClass('active');
                    $($navList[_id]).removeClass('hidden');
                    $($navList[_id]).siblings().addClass('hidden');
                    $navContent.removeClass('hidden')
                })

                $('.nav-content-item').find('li').on('click',function(){
                    var $this = $(this);
                    if($this.hasClass('active')){
                        $this.removeClass('active');
                    }else{
                        $this.addClass('active');
                    }

                })
            })
    </script>
    <script>
        $(function(){
            $('.personalType').on('click',function(){
                $('.nd').attr("data-id","1")
                $('.st').addClass('hidden');
                $('.nd').removeClass('hidden');
                $('#identity').attr("data-id","1");
                getCategory();
            });
            $('.enterpriseType').on('click',function(){
                $('.nd').attr("data-id","2")
                $('.st').addClass('hidden');
                $('.nd').removeClass('hidden');
                $('#identity').attr("data-id","2");
                getCategory();
            });
            $('.nd-prev').on('click',function(){
                location.reload();
            })
            $('.nd-next').on('click',function(){
                var count = 0;
                $('.cate_list').each(function (i,item) {
                    if($(item).hasClass('active')){
                        count++;
                    }
                });
                if(count === 0){
                    alert('请选择入驻类目');
                    return false;
                }else{
                    if($('.nd').attr("data-id") == 1){
                        $('.nd').addClass('hidden');
                        $('.per-info').removeClass('hidden');
                    }else{
                        $('.nd').addClass('hidden');
                        $('.company-info').removeClass('hidden');
                    }
                }

            })
            $('.personal-prev').on('click',function(){
                $('.per-info').addClass('hidden');
                $('.nd').removeClass('hidden')
            });
            $('.personal-next').on('click',function(){
                // $('.per-info').addClass('hidden');
                // $('.five').removeClass('hidden')
                submitIdentity();
            });
            $('.company-prev').on('click',function(){
                $('.company-info').addClass('hidden');
                $('.nd').removeClass('hidden')
            });
            $('.company-next').on('click',function(){
                // $('.company-info').addClass('hidden');
                // $('.five').removeClass('hidden');
                submitIdentity();
            })

            //选择分类

        })

        function getCategory() {
            $.ajax({
                url : '/agency/enterCategory',
                type : 'GET',
                success : function (res) {
                    $('.nav-list').html(res);
                }
            });

        }

        //切换一级类目
        function changeCate(e) {
            $(e).siblings().removeClass('checked active');
            $(e).addClass('checked active');
            var cate_id = '#cate-'+$(e).data('id');
            $(cate_id).siblings().addClass('hidden');
            $(cate_id).removeClass('hidden');
            if($(e).data('multiple') == 0){
                $('.cate_list').removeClass('active');
                $('.generation').addClass('hidden');
                $(e).siblings().removeAttr('onclick');
                $(e).siblings().addClass('disabled');
            }
        }

        //选择二级类目
        function selectCate(e) {
            var cate_id = '#cate-info-'+$(e).data('id');
            if($(cate_id).hasClass('hidden')) {
                $(cate_id).removeClass('hidden');
                $(e).addClass('active');
            }else{
                $(cate_id).addClass('hidden');
                $(e).removeClass('active');
            }
        }

        function submitIdentity() {
            if($('.nd').attr("data-id") == 1){
                var data = $('#personInfo').serialize();
                var obj = $('.per-info');
            }else{
                var data = $('#companyInfo').serialize();
                var obj = $('.company-info');
            }
            var cate_list = '';
            $('.cate_list').each(function (i,item) {
                if($(item).hasClass('active')){
                    if(i == 0){
                        cate_list += $(item).data('id');
                    }else{
                        cate_list += ','+$(item).data('id');
                    }
                }
            });
            $.ajax({
                url : '/agency/enterJoin?type='+$('.nd').attr("data-id")+'&cate='+cate_list,
                data : data,
                dataType : 'JSON',
                type : 'POST',
                success : function (res) {
                    if(res.code == 0){
                        obj.addClass('hidden');
                        $('.five').removeClass('hidden')
                        setTimeout(function () {
                            location.href = '/index/index';
                        },3000)
                    }else if(res.code == 2){
                        location.href = '/user/login';
                    }else{
                        alert(res.msg);
                    }
                }
            });
        }
    </script>

</html>