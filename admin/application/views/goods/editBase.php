<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>容易办总控管理系统 | 修改商品</title>
    <?php $this -> load -> view('common/top'); ?>
    <style>
        .img-title{
            background-color: #f5f5f5;
            height: 40px;
            line-height: 40px;
            text-align: center;
            font-weight: 500;
            margin-bottom: 0;
            border: solid #D1D1D1 1px;
        }
        .eidt-title{
            margin: 10px 0 0 0;
            height: 30px;
            line-height: 30px;
            font-weight: 500;
        }
        .eb-body{
            height: 100% !important;
        }
    </style>
    <link href="<?php echo STATIC_PATH; ?>/css/editbase.css" rel="stylesheet" type="text/css" />
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
            <h1>编辑商品</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url('index/home');?>"><i class="fa fa-home" ></i>控制面板</a></li>
                <li class="active">编辑商品</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
           <div class="row">
						<div class="col-md-12">
							<div class="panel panel-default eb-title">
								<a href="javascript:;" class="col-md-4 bottom">基本信息</a>
								<a href="<?php echo site_url('goods/edit').'?id='.$goods_id.'&module=price';?>" class="col-md-4">价格</a>
								<a href="<?php echo site_url('goods/edit').'?id='.$goods_id.'&module=exSer';?>" class="col-md-4">关联服务</a>
							</div>
						</div>
						<div class="col-md-12" style="margin-top: -20px;">
							<div class="panel panel-default eb-body">
								<form action="/goods/edit" method="post" id="form">
									<div class="form-group">
										<label for="productName">商品名称:</label>
										<div class="col-sm-3">
											<input name="name" type="text" class="form-control" id="productName" placeholder="请输入商品名称" value="<?php echo $goods_info['all_name'];?>"/>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="form-group">
										<label for="productName">所属分类:</label>

                                        <div class="col-md-2">
                                            <select class="form-control" name="cate_f" id="category_f">
                                                <?php if(isset($cate_f) && !empty($cate_f)):?>
                                                    <?php foreach ($cate_f as $f_key => $f_value):?>
                                                        <option <?php if($f_value['cat_id'] == $goods_info['category1']){echo 'selected';}?> value="<?php echo $f_value['cat_id']?>"><?php echo $f_value['cat_name']?></option>
                                                    <?php endforeach;?>
                                                <?php endif;?>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select class="form-control" name="cate_s" id="category_s">
                                                <?php if(isset($cate_s) && !empty($cate_s)):?>
                                                    <?php foreach ($cate_s as $s_key => $s_value):?>
                                                        <option <?php if($s_value['cat_id'] == $goods_info['category2']){echo 'selected';}?> value="<?php echo $s_value['cat_id']?>"><?php echo $s_value['cat_name']?></option>
                                                    <?php endforeach;?>
                                                <?php endif;?>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select class="form-control" name="cate_t"  id="category_t">
                                                <?php if(isset($cate_t) && !empty($cate_t)):?>
                                                    <?php foreach ($cate_t as $t_key => $t_value):?>
                                                        <option <?php if($t_value['cat_id'] == $goods_info['category3']){echo 'selected';}?> value="<?php echo $t_value['cat_id']?>"><?php echo $t_value['cat_name']?></option>
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
                                                            <option <?php if($provalue['id'] == $goods_info['progress_id']){echo 'selected';}?> value="<?php echo $provalue['id']?>"><?php echo $provalue['title']?></option>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
                                                </select>

                                        </div>
                                        <div class="clearfix"></div>
                                    </div>




                                    <div class="form-group">
                                        <label for="productName">关键字:</label>
                                        <div class="col-sm-3" style="margin-left: 14px">
                                            <input name="seo_keywords" type="text" class="form-control" id="seo_keywords" placeholder="多个关键字用,分割" value="<?php echo $goods_info['seo_keywords'];?>"/>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="productName">描述:</label>
                                        <div class="col-sm-3" style="margin-left: 28px;">
                                            <textarea name="seo_description" id="seo_description" cols="80" rows="8"><?php echo $goods_info['seo_description'];?></textarea>

                                        </div>
                                        <div class="clearfix"></div>
                                    </div>



									<div class="form-group">
										<label for="productName">商品图片:</label>
                                        <div style="margin-left: 15px;width: 330px;float: left">
                                            <p class="img-title" style="background-color: #f5f5f5;">PC端产品图片上传</p>
                                            <div class="item">
                                                <img class="icon addImg img" onclick="clickImg(this);" src="<?php if(isset($goods_info['pic'][1])){echo $this->config->item('goods_images_url').$goods_info['pic'][1]['picname'];}else{echo STATIC_PATH . 'image/productImg.png'; }?>">
                                                <input type="file" class="upload_input" onchange="change(this)">
                                                <input name="url_pc" type="hidden" class="url" value="<?php if(isset($goods_info['pic'][1])){echo $goods_info['pic'][1]['picname'];}?>">
                                            </div>
                                        </div>
                                        <div style="margin-left: 15px;width: 330px;float: left">
                                            <p class="img-title" style="background-color: #f5f5f5;">移动端产品图片上传</p>
                                            <div class="item">
                                                <img class="icon addImg img" onclick="clickImg(this);" src="<?php if(isset($goods_info['pic'][2])){echo $this->config->item('goods_images_url').$goods_info['pic'][2]['picname'];}else{echo STATIC_PATH . 'image/productImg.png'; }?>">
                                                <input type="file" class="upload_input" onchange="change(this)">
                                                <input name="url_m" type="hidden" class="url" value="<?php if(isset($goods_info['pic'][2])){echo $goods_info['pic'][2]['picname'];}?>">
                                            </div>
                                        </div>

										<div class="clearfix"></div>
									</div>
                                    <div class="form-group">
						 					<label for="productName">商品详情:</label>
						 					<div class="col-sm-8" >
                                                <p class="eidt-title">PC端</p>
                                                <div id="editor-pc">
                                                <?php echo $goods_info['content_pc'];?>
                                                </div>
                                                <p class="eidt-title">移动端</p>
                                                <div id="editor-m">
                                                    <?php echo $goods_info['content'];?>
                                                </div>
						 					</div>
						 					<div class="clearfix"></div>
						 				</div>
                                    <input type="hidden" name="pc_detail" id="pc_detail">
                                    <input type="hidden" name="m_detail" id="m_detail">
                                    <input type="hidden" name="module" value="base">
                                    <input type="hidden" name="goods_id" value="<?php echo $goods_id;?>">
								</form>
                                <div class="col-md-12" style="margin-top: 60px;float: none">
                                    <div>
                                        <a href="/goods/index" class="btn btn-sm btn-info" style="margin: 0 100px 0 300px">返回列表</a>

                                        <a href="javascript:;" onclick="formSubmit()" class="btn btn-sm btn-success">提交</a>
                                    </div>
                                </div>
							</div>
						</div>
					</div>
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


        //点击
        var clickImg = function(obj) {
            $(obj).parent().find('.upload_input').click();

        }



        //选择图片
        function change(file) {

            //预览
            var pic = $(file).parent().find(".img");

            //隐藏input
            var input = $(file).parent().find(".url");

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
                    }else {
                        alert(res.tip);
                    }
                }

            });
        }

        function formSubmit() {
            // console.log(editor_pc.txt.html());return false;
            $('#pc_detail').val(editor_pc.txt.html());
            $('#m_detail').val(editor_m.txt.html());

            $('#form').submit();
        }
    </script>
</body>
</html>