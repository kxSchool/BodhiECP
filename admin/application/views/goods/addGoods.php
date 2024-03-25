<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>集团中台管理系统 | 添加商品</title>
    <?php $this -> load -> view('common/top'); ?>

    <style>
    <!-- 按钮样式 S-->
        .testswitch {
				position: relative;
				float: left;
				width: 110px;
				margin: 0;
				-webkit-user-select: none;
				-moz-user-select: none;
				-ms-user-select: none;
			}
        .testswitch-checkbox {
            display: none;
        }
        .testswitch-label {
            display: block;
            width: 80px;
            overflow: hidden;
            cursor: pointer;
            border: 2px solid #dadada;
            border-radius: 20px;
        }
        .testswitch-inner {
            display: block;
            width: 200%;
            margin-left: -100%;
            transition: margin 0.3s ease-in 0s;
        }
        .testswitch-inner::before,
        .testswitch-inner::after {
            display: block;
            float: right;
            width: 50%;
            height: 30px;
            padding: 0;
            line-height: 30px;
            font-size: 14px;
            color: white;
            font-family: Trebuchet, Arial, sans-serif;
            font-weight: bold;
            box-sizing: border-box;
        }
        .testswitch-inner::after {
            content: attr(data-on);
            padding-left: 10px;
            background-color: #00e500;
            color: #FFFFFF;
        }
        .testswitch-inner::before {
            content: attr(data-off);
            padding-right: 10px;
            background-color: #EEEEEE;
            color: #999999;
            text-align: right;
        }
        .testswitch-switch {
            position: absolute;
            display: block;
            width: 22px;
            height: 22px;
            margin: 4px;
            background: #FFFFFF;
            top: 1px;
            right: 54px;
            border: 2px solid #999999;
            border-radius: 20px;
            transition: all 0.3s ease-in 0s;
        }
        .testswitch-checkbox:checked+.testswitch-label .testswitch-inner {
            margin-left: 0;
        }
        .testswitch-checkbox:checked+.testswitch-label .testswitch-switch {
				right: 26px;
			}
            
    <!--按钮样式 E-->
       .form-group label {
        float: left;
        height: 33px;
        line-height: 33px;
        }
        label{
            float: left !important;
        }
        .item {
            width: 330px;
            height: 276px;
            float: left;
            position: relative;
            margin-right: 54px;
        }
        .addImg {
            width: 330px;
            height: 276px;
            position: absolute;
            left: 0;
            top: 0;
            z-index: 2;
            cursor: pointer;
        }
        .preview,
        .preBlock {
            position: absolute;
            display: block;
            width: 330px;
            height: 276px;
            left: 0;
            top: 0;
        }
        .delete {
            width: 30px;
            position: absolute;
            right: -30px;
            top: -15px;
            cursor: pointer;
            display: none;
        }
        .preBlock img {
            display: block;
            width: 330px;
            height: 276px;
        }
        .upload_input {
            display: block;
            width: 0;
            height: 0;
            -webkit-opacity: 0.0;
            /* Netscape and Older than Firefox 0.9 */
            -moz-opacity: 0.0;
            /* Safari 1.x (pre WebKit!) 老式khtml内核的Safari浏览器*/
            -khtml-opacity: 0.0;
            /* IE9 + etc...modern browsers */
            opacity: .0;
            /* IE 4-9 */
            filter: alpha(opacity=0);
            /*This works in IE 8 & 9 too*/
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
            /*IE4-IE9*/
            filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
        }
        .add-area{
            font-size: 30px;
            color: #000;
            font-weight: bold;
            margin-right: 12px;
        }
        .del-area{
            font-size: 30px;
            color: #000;
            font-weight: bold;
            margin-right: 17px;
        }
        .add-ser{
            font-size: 30px;
            color: #000;
            font-weight: bold;
            margin-right: 12px;
            line-height: 29px;
        }
        .del-ser{
            font-size: 30px;
            color: #000;
            font-weight: bold;
            margin-right: 18px;
            line-height: 25px;
        }
        .add-SerPro{
            font-size: 30px;
            color: #000;
            font-weight: bold;
            margin-right: 12px;
            line-height: 29px;
        }
        .del-SerPro{
            font-size: 30px;
            color: #000;
            font-weight: bold;
            margin-right: 17px;
            line-height: 25px;
        }
        .btn-info{
            width: 80px;
            height: 40px;
            line-height: 32px;
        }
        .btn-success{
            width: 80px;
            height: 40px;
            line-height: 32px;
        }
        .jian-area{
            	font-size: 30px;
                color: #000;
                font-weight: bold; 
            }
         select.selectpicker {
            display: block !important;
         }
    </style>
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">
    <?php $this -> load -> view('common/header'); ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php $this -> load -> view('common/left'); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>添加商品</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
                <li class="active">添加商品</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                  <div class="col-md-12">
						 	<div class="panel panel-default">
						 		<div class="panel-body">
						 			<form action="/goods/addGoods" method="post" id="form">
						 				<div class="form-group">
						 					<label for="productName">商品名称:</label>
						 					<div class="col-sm-6" >
						 						<input name="name"  type="text" class="form-control" id="productName" placeholder="请输入商品名称"/>
						 					</div>
						 					<div class="clearfix"></div>
						 				</div>
						 				<div class="form-group">
						 					<label for="productName">所属分类:</label>

						 						<div class="col-md-3">
							 						<select class="form-control col-lg-3 col-md-4 col-sm-6" name="category_f" id="category_f">
                                                        <?php if(isset($cate_f) && !empty($cate_f)):?>
                                                        <?php foreach ($cate_f as $f_key => $f_value):?>
							 							<option value="<?php echo $f_value['cat_id']?>"><?php echo $f_value['cat_name']?></option>
                                                        <?php endforeach;?>
                                                        <?php endif;?>
							 						</select>
						 						</div>
						 						<div class="col-md-3">
							 						<select class="form-control col-lg-3 col-md-4 col-sm-6" name="category_s" id="category_s">
                                                        <?php if(isset($cate_s) && !empty($cate_s)):?>
                                                            <?php foreach ($cate_s as $s_key => $s_value):?>
                                                                <option value="<?php echo $s_value['cat_id']?>"><?php echo $s_value['cat_name']?></option>
                                                            <?php endforeach;?>
                                                        <?php endif;?>
							 						</select>
						 						</div>
						 						<div class="col-md-3">
							 						<select class="form-control col-lg-3 col-md-4 col-sm-6" name="category_t" id="category_t">
                                                        <?php if(isset($cate_t) && !empty($cate_t)):?>
                                                            <?php foreach ($cate_t as $t_key => $t_value):?>
                                                                <option value="<?php echo $t_value['cat_id']?>"><?php echo $t_value['cat_name']?></option>
                                                            <?php endforeach;?>
                                                        <?php endif;?>
							 						</select>
							 					</div>

						 					<div class="clearfix"></div>
						 				</div>
                                        <div class="form-group">
                                            <label for="productName">进度流程:</label>
                                            <div class="col-md-5" >

                                                <select class="form-control col-lg-3 col-md-4 col-sm-6" name="progress">
                                                    <?php if(isset($progress_list) && !empty($progress_list)):?>
                                                        <?php foreach ($progress_list as $proid => $provalue):?>
                                                            <option value="<?php echo $provalue['id']?>"><?php echo $provalue['title']?></option>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
                                                </select>

                                            </div>
                                            <div class="clearfix"></div>
                                        </div>



                                        <div class="form-group">
                                            <label for="productName">关键字:</label>
                                            <div class="col-sm-3" style="margin-left: 14px">
                                                <input name="seo_keywords" type="text" class="form-control" id="seo_keywords" placeholder="多个关键字用,分割" value=""/>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="form-group">
                                            <label for="productName">描述:</label>
                                            <div class="col-sm-3" style="margin-left: 28px;">
                                                <textarea name="seo_description" id="seo_description" cols="80" rows="8"></textarea>

                                            </div>
                                            <div class="clearfix"></div>
                                        </div>




						 				<div class="form-group">
						 					<label for="productName">商品图片:</label>
						 					<div class="col-sm-4" >
						 						<div class="item">
													<img class="icon addImg" onclick="clickImg(this);" src="<?php echo STATIC_PATH; ?>image/productImg.png">
													<input type="file" class="upload_input" onchange="change(this)">
													<div class="preBlock">
														<img class="preview" alt="" name="pic" width="190" height="190">
                                                        <input type="hidden" name="pc_images" class="images">
													</div>

												</div>	
						 					</div>
						 					<div class="col-sm-4" >
						 						<div class="item">
													<img class="icon addImg" onclick="clickImg(this);" src="<?php echo STATIC_PATH; ?>image/productImg.png">
													<input type="file" class="upload_input" onchange="change(this)">
													<div class="preBlock">
														<img class="preview" alt="" name="pic" width="190" height="190">
                                                        <input type="hidden" name="m_images" class="images">
													</div>

												</div>	
						 					</div>
						 					<div class="clearfix"></div>
						 				</div>
						 				<div class="form-group">
						 					<label for="productName">是否区分地区:</label>
						 					<div class="testswitch col-md-10"  >
												<input class="testswitch-checkbox" id="onoffswitch" type="checkbox" name="is_region">
												<label class="testswitch-label" for="onoffswitch">
													<span class="testswitch-inner" data-on="是" data-off="否"></span>
													<!--<span class="testswitch-switch"></span>-->
												</label>
											</div>
											 
						 					<div class="col-md-12 local-area  hidden" style="padding-left: 87px;" >
						 						<!--<div class="col-md-1" >
											 		
											 		<a class="jian-area" onclick="delModel()">—</a>
											 	</div>-->
											 	<div class="col-md-11 productList" style="margin-left: -84px;">
											 		
											 		<div class="col-md-12 price_group" style="margin-top: 5px;">
											 			<a class="add-area" onclick="addModel()" style="float: left;">+</a>
								 						<div class="col-md-3">
									 						<select class="region_p form-control col-lg-3 col-md-4 col-sm-6">
                                                                <?php if(isset($province) && !empty($province)):?>
                                                                    <?php foreach ($province as $province_key => $province_value):?>
                                                                        <option value="<?php echo $province_value['region_id']?>"><?php echo $province_value['region_name']?></option>
                                                                    <?php endforeach;?>
                                                                <?php endif;?>
									 						</select>
								 						</div>
								 						<div class="col-md-3">
									 						<select class="region_c form-control col-lg-3 col-md-4 col-sm-6">
                                                                <?php if(isset($city) && !empty($city)):?>
                                                                    <?php foreach ($city as $city_key => $city_value):?>
                                                                        <option value="<?php echo $city_value['region_id']?>"><?php echo $city_value['region_name']?></option>
                                                                    <?php endforeach;?>
                                                                <?php endif;?>
									 						</select>
								 						</div>
								 						<div class="col-md-3">
									 						<select class="region_a form-control col-lg-3 col-md-4 col-sm-6">
                                                                <?php if(isset($area) && !empty($area)):?>
                                                                    <?php foreach ($area as $area_key => $area_value):?>
                                                                        <option value="<?php echo $area_value['region_id']?>"><?php echo $area_value['region_name']?></option>
                                                                    <?php endforeach;?>
                                                                <?php endif;?>
									 						</select>
									 					</div>
									 					<div class="col-md-2">
									 						<input class="price form-control col-sm-1" placeholder="价格" value="" type="text"/>
									 					</div>
								 					</div>

								 					 
							 					</div>
							 					
						 					</div>
						 					<div class="col-md-12 national " style="padding-left: 102px;" >
						 						<div class="col-md-2" style="padding: 0">
							 						<input readonly="readonly" type="text" class="form-control col-md-1" id="productName" value="全国"/>
						 						</div>
						 						<div class="col-md-2">
						 							<input class="form-control col-md-1" id="simple_price" placeholder="价格" type="text"/>
						 						</div>
						 					</div>
						 					<div class="clearfix"></div>
						 				</div>
						 				<div class="form-group">
						 					<label for="productName">商品页详情:</label>
                                            <div style="clear: both;margin-left: 80px">
						 					<div class="col-sm-8" >
                                                    <div id="editor-pc">
                                                        <p>立即编辑PC端详情页</p>
                                                    </div>

						 					</div>
						 					<div class="col-sm-8" style="margin-top: 20px">

                                                <div id="editor-m">
                                                    <p>立即编辑移动端详情页</p>
                                                </div>
						 					</div>
                                            </div>
						 					<div class="clearfix"></div>
						 				</div>
						 				<div class="form-group server-Model">
						 					<label for="relSer">关联服务:</label>
						 					<div class="testswitch col-md-10"  >
												<input class="testswitch-checkbox" name="isEx" id="rel-onoffswitch" type="checkbox">
												<label class="testswitch-label" for="rel-onoffswitch">
													<span class="testswitch-inner" data-on="是" data-off="否"></span>
													<!--<span class="testswitch-switch"></span>-->
												</label>
											</div>

						 					<div class="col-md-12 hidden serPro">
						 						<a class="add-ser" onclick="addSer()" style="float: left;">+</a>
						 						<label for="server-title">服务标题:</label>						 												 	
							 					<div class="col-md-10" >
							 						<div class="col-md-3">
								 						<input  type="text" class="title form-control" id="server-title" />
							 						</div>							 						
							 					</div>
								 					<div class="col-md-7 ser_item" style="margin-top: 10px;margin-left: 89px;">
								 							<a class="add-SerPro" onclick="addSerPro(this)" style="float: left;">+</a>
							 								<label for="server-title">服务内容:</label>
							 								<div class="col-md-3">
									 						<input  type="text" class="name form-control" id="server-title" />
								 							</div>
								 							<label for="server-title">关联商品:</label>
                                                            <div class="col-md-3">
            													<select id="basic" class="goods selectpicker show-tick form-control" data-live-search="true">
                                                                    <option value="0">暂无</option>
                                                                    <?php foreach ($goods_list as $gk => $gv):?>
                                                                        <option value="<?php echo $gv['id']?>"><?php echo $gv['all_name'];?></option>
                                                                    <?php endforeach;?>
                                                                </select>
											     	       </div>
								 					</div>
						 					</div>

						 					
						 					<div class="clearfix"></div>
						 				</div>
                                        <input type="hidden" name="pc_detail" id="pc_detail">
                                        <input type="hidden" name="m_detail" id="m_detail">
                                        <input type="hidden" name="price" id="price">
                                        <input type="hidden" name="servers" id="servers">
						 			</form>
						 			<div class="col-md-12" style="margin-top: 100px;">
						 				<div class="col-md-6" style="text-align: right;">
						 					<a class="btn btn-sm btn-info" href="/goods/index">取消</a>
						 				</div>
						 				<div class="col-md-6">

						 					<button type="button" id="submit" class="btn btn-sm btn-success">提交</button>
						 				</div>
						 			</div>
						 		</div>
						 	</div>
						 </div>
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <?php $this -> load -> view('common/footer'); ?>
    <script type="text/javascript" src="<?php echo STATIC_PATH; ?>wangeditor/wangEditor.min.js"></script>
    <script type="text/javascript">
        var E = window.wangEditor;
        var editor_pc = new E('#editor-pc');
        var editor_m = new E('#editor-m');

        //配置服务器端地址
        editor_pc.customConfig.uploadImgServer = '/upload/editUpload';
        editor_m.customConfig.uploadImgServer = '/upload/editUpload';
        // 隐藏“网络图片”tab
        editor_pc.customConfig.showLinkImg = false;
        editor_m.customConfig.showLinkImg = false;
        editor_pc.customConfig.uploadFileName = 'userfile';
        editor_m.customConfig.uploadFileName = 'userfile';

        editor_pc.create();
        editor_m.create();
    </script>
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

				//隐藏input
                var input = $(file).parent().find(".images");

                var formData = new FormData();
                formData.append("userfile", file.files[0]);
                $.ajax({
                    data : formData,
                    type : 'POST',
                    processData:false,
                    contentType: false,
                    dataType : 'JSON',
                    url : '/upload/doUpload' + '?type=goods',
                    success : function (res) {
                        if(res.info === 1) {
                            pic.attr("src", res.data.file_name_url);
                            input.val(res.data.file_name);
                            addImg.hide();
                            // deleteImg.show();
                        }else {
                            alert(res.tip);
                        }
                    }

                });
			}

		</script>
    <script>
        $(document).ready(function() {
            $("#onoffswitch").on('click', function() {
                if(!$("#onoffswitch").is(':checked')) {
                    $('.national').removeClass('hidden');
                    $('.local-area').addClass('hidden');
                } else {
                    $('.national').addClass('hidden');
                    $('.local-area').removeClass('hidden');
                }
            });
            $("#rel-onoffswitch").on('click', function() {
                if($("#rel-onoffswitch").is(':checked')) {
                    $('.serPro').removeClass('hidden');
                } else {
                    $('.serPro').addClass('hidden');
                }
            });

            $('#submit').on('click',function () {
                //地区价格
                if($("#onoffswitch").is(":checked")){
                    var region_price = new Array();
                    $('.price_group').each(function(l, ele) {
                        region_price.push({
                            'province':$(ele).find('.region_p').val(),
                            'city':$(ele).find('.region_c').val(),
                            'region_id':$(ele).find('.region_a').val(),
                            'totalprice':$(ele).find('.price').val()
                        });

                    })
                    $('#price').val(JSON.stringify(region_price));
                } else{
                    if($('#simple_price').val() == ''){
                        layer.alert('价格不能为空');
                        return false;
                    }
                    $('#price').val($('#simple_price').val());
                }

                //关联服务
                if($("#rel-onoffswitch").is(":checked")){
                    var server = new Array();
                    $('.serPro').each(function(l, ele) {
                        var person = new Array();
                        $(ele).find('.ser_item').each(function(k, v) {
                            person.push({'name':$(v).find('.name').val(),'id':$(v).find('.goods').val()});
                        })
                        server.push({'class_name':$(ele).find('.title').val(),'param':person});

                    })
                    $('#servers').val(JSON.stringify(server));
                } else{
                    $('#servers').val('');
                }

                $('#pc_detail').val(editor_pc.txt.html());
                $('#m_detail').val(editor_m.txt.html());

                // console.log($('#form').serialize());
                $('#form').submit();

            });
            //切换一级分类
            $('#category_f').on('change',function () {
                $("#category_s").empty();
                $("#category_t").empty();
                var cat_id = $('#category_f').val();
                $.ajax({
                    url : '/goods/ajaxGetCateByPid',
                    data : {cat_id : cat_id,type:'f'},
                    type : 'POST',
                    dataType : 'JSON',
                    success : function (res) {
                        var cate_list = res.data.cate;
                        var child_cate = res.data.child_cate;
                        var cate_str1 = '';
                        var cate_str2 = '';
                        for(var i = 0; i < cate_list.length ; i++){
                            cate_str1 += "<option value='"+cate_list[i].cat_id+"'>"+cate_list[i].cat_name+"</option>"
                        }
                        for(var j = 0; j < child_cate.length ; j++){
                            cate_str2 += "<option value='"+child_cate[j].cat_id+"'>"+child_cate[j].cat_name+"</option>"
                        }
                        $('#category_s').append(cate_str1);
                        $('#category_t').append(cate_str2);

                    }
                });
            });
            //切换二级分类
            $('#category_s').on('change',function () {

                $("#category_t").empty();
                var cat_id = $('#category_s').val();
                $.ajax({
                    url : '/goods/ajaxGetCateByPid',
                    data : {cat_id : cat_id},
                    type : 'POST',
                    dataType : 'JSON',
                    success : function (res) {
                        var cate_list = res.data.cate;
                        var cate_str1 = '';
                        for(var i = 0; i < cate_list.length ; i++){
                            cate_str1 += "<option value='"+cate_list[i].cat_id+"'>"+cate_list[i].cat_name+"</option>"
                        }
                        $('#category_t').append(cate_str1);

                    }
                });
            });

        });
        function addModel(){

            $.ajax({
                url : '/api/ajaxGetDefaultArea',
                dataType : 'JSON',
                type : 'GET',
                success : function (res) {

                    var amodel='<div class="price_group col-md-12" style="margin-top: 5px;">'+
                        '<a class="del-area" onclick="delModel(this)" style="float: left;">-</a><div class="col-md-3">'+
                        '<select class="region_p form-control col-lg-3 col-md-4 col-sm-6">';
                    for (var i = 0;i<res.data.p.length;i++){
                        amodel += "<option value='"+res.data.p[i].region_id+"'>"+res.data.p[i].region_name+"</option>";
                    }
                    amodel += '</select></div><div class=\'col-md-3\'><select class="region_c form-control col-lg-3 col-md-4 col-sm-6">' ;
                    for (var j = 0;j<res.data.c.length;j++){
                        amodel += "<option value='"+res.data.c[j].region_id+"'>"+res.data.c[j].region_name+"</option>";
                    }
                    amodel += '</select></div><div class=\'col-md-3\'><select class="region_a form-control col-lg-3 col-md-4 col-sm-6" name="region[]">' ;
                    for (var k = 0;k<res.data.a.length;k++){
                        amodel += "<option value='"+res.data.a[k].region_id+"'>"+res.data.a[k].region_name+"</option>";
                    }
                    amodel += '</select></div><div class="col-md-2"><input class="price form-control" placeholder="价格"  name="region_price[]" type="text"/></div></div>' ;

                    $('.productList').append(amodel);
                }
            });


            }
        function delModel(e){

            $(e).parent().remove();

         }
        function addSer(){

            $.ajax({
                url : '/api/allGoods',
                type : 'GET',
                dataType : 'JSON',
                success : function (res) {
                    var serModel=
                        '<div class="col-md-12 serPro">' +
                        '<a class="add-ser" onclick="delSer(this)" style="float: left;">-</a>' +
                        '<label for="server-title">服务标题:</label>' +
                        '<div class="col-md-10" >' +
                        '<div class="col-md-3">' +
                        '<input  type="text" class="title form-control" id="server-title" />' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-md-7 ser_item" style="margin-top: 10px;margin-left: 89px;">' +
                        '<a class="add-SerPro" onclick="addSerPro(this)" style="float: left;">+</a>' +
                        '<label for="server-title">服务内容:</label>' +
                        '<div class="col-md-3">' +
                        '<input  type="text" class="name form-control" id="server-title" />' +
                        '</div>' +
                        '<label for="server-title">关联商品:</label>' +
                        '<div class="col-md-3">' +
                        '<select id="basic" class="goods selectpicker show-tick form-control" data-live-search="true"><option value="0">暂无</option>' ;
                    for(var i=0;i<res.data.length;i++){
                        serModel += '<option value="'+res.data[i].id+'">'+res.data[i].all_name+'</option>'
                    }
                    serModel+='</select>' +
                        '</div>' +
                        '</div>' +
                        '</div>';
                    $('.server-Model').append(serModel);
                }
            });


 
         }
        function delSer(e){
            $(e).parent().remove();
        }
        function addSerPro(e){



            $.ajax({
                url: '/api/allGoods',
                type: 'GET',
                dataType: 'JSON',
                success: function (res) {
                    var serProModel=
                        '<div class="col-md-7 ser_item" style="margin-top: 10px;margin-left: 89px;">'+
                        '<a class="del-SerPro" onclick="delSerPro(this)" style="float: left;">-</a>'+
                        '<label for="server-title">服务内容:</label><div class="col-md-3">'+
                        '<input  type="text" class="name form-control" id="server-title" /></div><label for="server-title">关联商品:</label>'+
                        '<div class="col-md-3"><select id="basic" class="goods selectpicker show-tick form-control" data-live-search="true">';
                    for(var j=0;j<res.data.length;j++){
                        serProModel += '<option value="'+res.data[j].id+'">'+res.data[j].all_name+'</option>'
                    }
                    serProModel+='</select></div></div>';

                    $(e).parent().parent().append(serProModel);

                }
            });

         }
        function delSerPro(e){
            $(e).parent().remove();
         }
        
    </script>
</body>
</html>