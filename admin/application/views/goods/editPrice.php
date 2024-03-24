<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>容易办总控管理系统 | 修改商品</title>
    <?php $this -> load -> view('common/top'); ?>
    <style>
        
        .region-price{
            margin-top: 15px; 
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
                                <a href="<?php echo site_url('goods/edit').'?id='.$goods_id.'&module=base';?>" class="col-md-4">基本信息</a>
                                <a href="javascript:;" class="col-md-4 bottom">价格</a>
                                <a href="<?php echo site_url('goods/edit').'?id='.$goods_id.'&module=exSer';?>" class="col-md-4">关联服务</a>
							</div>
						</div>
						<div class="col-md-12" style="margin-top: -20px;">
							<div class="panel panel-default eb-body">
								<form action="/goods/edit" method="post" id="form">
									<div class="form-group">
										<label for="productName">是否区分地区:</label>
										<div class="testswitch col-md-10">
											<input class="testswitch-checkbox" <?php if(!isset($price_info)){echo 'checked';}?> id="onoffswitch" type="checkbox" name="isPrice">
											<label class="testswitch-label" for="onoffswitch">
													<span class="testswitch-inner" data-on="是" data-off="否"></span>
													<span class="testswitch-switch"></span>
												</label>
										</div>

										<div class="col-md-12 local-area <?php if(isset($price_info)){echo 'hidden';}?> " style="padding-left: 87px;">
											<!--<div class="col-md-1" >
											 		
											 		<a class="jian-area" onclick="delModel()">—</a>
											 	</div>-->
											<div class="col-md-11 productList" style="margin-left: -7px;">
                                                <?php foreach ($region_price as $rpid => $rpinfo):?>

												    <div class="col-md-12 price_group" style="margin-top: 10px;">
                                                        <?php if($rpid == 0):?>
													<a class="add-area" onclick="addModel()" style="float: left;">+</a>
                                                        <?php else:?>
                                                        <a class="del-area" onclick="delModel(this)" style="float: left;">-</a>
                                                        <?php endif;?>
													<div class="col-md-3">
														<select class="form-control col-lg-3 col-md-4 col-sm-6 region_p">
                                                            <?php foreach ($province as $pk=>$pv):?>
															<option value="<?php echo $pv['region_id'];?>" <?php if($pv['region_id'] == $rpinfo['province']){echo 'selected';}?>><?php echo $pv['region_name'];?></option>
                                                            <?php endforeach;?>
														</select>
													</div>
													<div class="col-md-3">
														<select class="form-control col-lg-3 col-md-4 col-sm-6 region_c">
                                                            <?php foreach ($rpinfo['city_list'] as $ck=>$cv):?>
															<option value="<?php echo $cv['region_id'];?>" <?php if($cv['region_id'] == $rpinfo['city']){echo 'selected';}?>><?php echo $cv['region_name'];?></option>
                                                            <?php endforeach;?>
														</select>
													</div>
													<div class="col-md-3">
														<select class="form-control col-lg-3 col-md-4 col-sm-6 region_a">
                                                            <?php foreach ($rpinfo['area_list'] as $ak=>$av):?>
                                                                <option value="<?php echo $av['region_id'];?>" <?php if($av['region_id'] == $rpinfo['region_id']){echo 'selected';}?>><?php echo $av['region_name'];?></option>
                                                            <?php endforeach;?>
														</select>
													</div>
													<div class="col-md-2">
														<input class="form-control col-sm-1 price" value="<?php echo $rpinfo['totalprice']?>" placeholder="价格" type="text" />
													</div>
												</div>
                                                <?php endforeach;?>

											</div>

										</div>
										<div class="col-md-12 national <?php if(!isset($price_info)){echo 'hidden';}?>" style="padding-left: 102px;margin-top: 16px;">
											<div class="col-md-2" style=" ">
												<input type="text" class="form-control col-md-1" id="productName" placeholder="全国"  readonly="readonly"/>
											</div>
											<div class="col-md-2">
												<input id="simple_price" name="simple_price" class="price_input form-control col-md-1" placeholder="价格" value="<?php if(isset($price_info)){if(empty($price_info['price_expression'])){echo $price_info['totalprice'];}else{echo $price_info['price_expression'];}}?>" type="text" />
											</div>
										</div>
										<div class="clearfix"></div>
									</div>
                                    <input type="hidden" name="module" value="price">
                                    <input type="hidden" name="goods_id" value="<?php echo $goods_id;?>" id="goods_id">
                                    <input type="hidden" name="price" id="price">
								</form>
								<div class="col-md-12" style="margin-top: 60px;">
									<div class="col-md-6" style="text-align: right;">
										<a class="btn btn-sm btn-info">上一步</a>
									</div>
									<div class="col-md-6">
										<a onclick="formSubmit()" class="btn  btn-sm btn-success">提交</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /.row -->
				</section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <?php $this -> load -> view('common/footer'); ?>
    <script type="text/javascript">
				$('.eb-title').find('a').on('click', function() {
					$(this).addClass('bottom');
					$(this).siblings().removeClass('bottom');
				})
				$(document).ready(function() {
					$("#onoffswitch").on('click', function() {
						clickSwitch()
					});
					var clickSwitch = function() {
						if($("#onoffswitch").is(':checked')) {
							$('.national').addClass('hidden');
							$('.local-area').removeClass('hidden');

						} else {
							$('.national').removeClass('hidden');
							$('.local-area').addClass('hidden');
						}
					};

				});

				function addModel() {
				    $.ajax({
                        url : '/api/ajaxGetDefaultArea',
                        type : 'GET',
                        dataType : 'JSON',
                        success : function (res) {

                            var amodel = '<div class="col-md-12 region-price price_group" >' +
                                ' <a class="del-area" onclick="delModel(this)" style="float: left;">-</a>' +
                                '<div class="col-md-3">' +
                                '<select class="form-control col-lg-3 col-md-4 col-sm-6 region_p">';

                                for(var i=0;i<res.data.p.length;i++){
                                    amodel += '<option value="'+res.data.p[i].region_id+'">'+res.data.p[i].region_name+'</option>';
                                }

                                amodel += '</select>' +
                                '</div>' +
                                '<div class="col-md-3">' +
                                '<select class="form-control col-lg-3 col-md-4 col-sm-6 region_c">' ;
                                for(var j=0;j<res.data.c.length;j++){
                                    amodel += '<option value="'+res.data.c[j].region_id+'">'+res.data.c[j].region_name+'</option>';
                                }
                                amodel += '</select>' +
                                '</div>' +
                                '<div class="col-md-3">' +
                                '<select class="form-control col-lg-3 col-md-4 col-sm-6 region_a">';
                                for(var k=0;k<res.data.a.length;k++){
                                    amodel += '<option value="'+res.data.a[k].region_id+'">'+res.data.a[k].region_name+'</option>';
                                }
                                amodel += '</select>' +
                                '</div>' +
                                '<div class="col-md-2">' +
                                '<input class="price_input form-control col-sm-1 price" placeholder="价格" type="text" />' +
                                '</div>' +
                                '</div>';
                            $('.productList').append(amodel);
                        }
                    });



				}

				function delModel(e) {

					$(e).parent().remove();

				}

				function formSubmit() {

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
                        $('#price').val('');
                    }


                    $('#form').submit();
                }
			</script>
</body>
</html>