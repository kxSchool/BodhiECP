<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>集团中台管理系统 | 修改商品</title>
    <?php $this -> load -> view('common/top'); ?>
    <style>
        .server-body{
            clear: both;
            margin: 50px 0 0 60px;
        }
        .serPro{
            margin-top: 30px;
        }
        .act-logo{
            width: 20px;
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
								<a href="<?php echo site_url('goods/edit').'?id='.$goods_id.'&module=price';?>" class="col-md-4">价格</a>
								<a href="javascript:;" class="col-md-4 bottom">关联服务</a>
							</div>
						</div>
						<div class="col-md-12" style="margin-top: -20px;">
							<div class="panel panel-default eb-body">
								<form method="post" id="form" action="/goods/edit">
									<div class="form-group">
										<label for="relSer">关联服务:</label>
                                        <div class="col-sm-10 server-Model" >
                                            <div>
                                                <div class="testswitch col-md-10">
                                                    <input name="isCheck" class="testswitch-checkbox" id="rel-onoffswitch" type="checkbox" <?php if(!empty($goods_info['exSer'])){echo 'checked';}?>>
                                                    <label class="testswitch-label" for="rel-onoffswitch">
                                                        <span class="testswitch-inner" data-on="是" data-off="否"></span>
                                                        <span class="testswitch-switch"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class=" <?php if(empty($goods_info['exSer'])){echo 'hidden';}?>">
                                                <?php foreach ($goods_info['exSer'] as $exid => $ex):?>
                                                    <div class="col-md-12  serPro">

                                                    <div class="server-title">
                                                        <?php if($exid == 0):?>
                                                            <a class="add-ser act-logo" onclick="addSer()" style="float: left;">+</a>
                                                        <?php else:?>
                                                            <a class="add-ser act-logo" onclick="delSer(this)" style="float: left;">-</a>
                                                        <?php endif;?>
                                                        <label for="server-title">服务标题:</label>

                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control title" id="server-title" value="<?php echo $ex['class_name'];?>"/>
                                                        </div>

                                                    </div>
                                                    <div class="server-body">
                                                        <?php foreach ($ex['param'] as $itemid => $item):?>
                                                        <div class="col-md-10 ser_item" style="margin-top: 10px;">
                                                            <?php if($itemid == 0):?>
                                                                <a class="add-SerPro act-logo" onclick="addSerPro(this)" style="float: left;">+</a>
                                                            <?php else:?>
                                                                <a class="add-ser act-logo" onclick="delSerPro(this)" style="float: left;">-</a>
                                                            <?php endif;?>
                                                            <label for="server-title">服务内容:</label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control name" id="server-title" value="<?php echo $item['name'];?>"/>
                                                            </div>
                                                            <label for="server-title">关联商品:</label>
                                                            <div class="col-lg-5">
                                                                <select id="basic" class="goods selectpicker show-tick form-control" data-live-search="true">
                                                                    <option value="0">暂无</option>
                                                                    <?php foreach ($goods_list as $gk => $gv):?>
                                                                    <option <?php if($item['id'] == $gv['id']){echo 'selected';}?> value="<?php echo $gv['id']?>"><?php echo $gv['all_name'];?></option>
                                                                    <?php endforeach;?>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <?php endforeach;?>
                                                    </div>
                                                </div>
                                                <?php endforeach;?>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>


									</div>
                                    <input type="hidden" name="module" value="exSer">
                                    <input type="hidden" name="goods_id" value="<?php echo $goods_id;?>">
                                    <input type="hidden" name="servers" id="servers">
								</form>
								<div class="col-md-12" style="margin-top: 60px;">
                                    <div>
                                        <a class="btn btn-sm btn-info" style="margin: 0 100px 0 100px">返回列表</a>

                                        <a href="javascript:;" onclick="formSubmit()" class="btn  btn-sm btn-success">提交</a>
                                    </div>
								</div>
							</div>
						</div>
					</div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <?php $this -> load -> view('common/footer'); ?>
    <script type="text/javascript">
				$('.eb-title').find('a').on('click', function() {
					$(this).addClass('bottom');
					$(this).siblings().removeClass('bottom');
				})
				$(document).ready(function() {
					$("#rel-onoffswitch").on('click', function() {
						relclickSwitch()
					});

					var relclickSwitch = function() {
						if($("#rel-onoffswitch").is(':checked')) {
							$('.serPro').removeClass('hidden');
						} else {
							$('.serPro').addClass('hidden');
						}
					};

				});

				function addSer() {
				    $.ajax({
                        url : '/api/allGoods',
                        type : 'GET',
                        dataType : 'JSON',
                        success : function (res) {
                            var serModel =
                                '<div class="col-md-12  serPro">' +
                                '<div class="server-title">' +
                                '<a class="add-ser act-logo" onclick="delSer(this)" style="float: left;">-</a>' +
                                '<label for="server-title">服务标题:</label>' +
                                '<div class="col-md-4">' +
                                '<input type="text" class="form-control title" id="server-title" />' +
                                '</div>' +
                                '</div>' +
                                '<div class="server-body ser_item">' +
                                '<div class="col-md-7" style="margin-top: 10px;">' +
                                '<a class="add-SerPro act-logo" onclick="addSerPro(this)" style="float: left;">+</a>' +
                                '<label for="server-title">服务内容:</label>' +
                                '<div class="col-md-4">' +
                                '<input type="text" class="form-control name" id="server-title" />' +
                                '</div>' +
                                '<label for="server-title">关联商品:</label>' +
                                '<div class="col-lg-4">' +
                                '<select id="basic" class="goods selectpicker show-tick form-control" data-live-search="true">' ;
                                for(var i=0;i<res.data.length;i++){
                                    serModel += '<option value="'+res.data[i].id+'">'+res.data[i].all_name+'</option>'
                                }
                                serModel +='</select>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>';
                            $('.server-Model').append(serModel);
                        }
                    });

				}

				function delSer(e) {
					$(e).parent().parent().remove();
				}

				function addSerPro(e) {
                    $.ajax({
                        url: '/api/allGoods',
                        type: 'GET',
                        dataType: 'JSON',
                        success: function (res) {
                            var serProModel =
                                '<div class="col-md-7 ser_item" style="margin-top: 10px;">' +
                                '<a class="add-SerPro act-logo" onclick="delSerPro(this)" style="float: left;">-</a>' +
                                '<label for="server-title">服务内容:</label>' +
                                '<div class="col-md-4">' +
                                '<input type="text" class="form-control name" id="server-title" />' +
                                '</div>' +
                                '<label for="server-title">关联商品:</label>' +
                                '<div class="col-lg-4">' +
                                '<select id="basic" class="goods selectpicker show-tick form-control" data-live-search="true">' ;
                            for(var j=0;j<res.data.length;j++){
                                serProModel += '<option value="'+res.data[j].id+'">'+res.data[j].all_name+'</option>'
                            }
                                serProModel +='</select>' +
                                '</div>' +
                                '</div>';

                            $(e).parent().parent().append(serProModel);
                        }
                    });


				}

				function delSerPro(e) {
					$(e).parent().parent().remove();
				}

				function formSubmit() {

                    if($("#rel-onoffswitch").is(":checked")){
                        var server = new Array();
                        $('.serPro').each(function(l, ele) {
                            var person = new Array();
                            $(ele).find('.ser_item').each(function(k, v) {
                                person[k] = {'name':$(v).find('.name').val(),'id':$(v).find('.goods').val()}
                            })
                            server[l] = {'class_name':$(ele).find('.title').val(),'param':person};
                        })
                        $('#servers').val(JSON.stringify(server));
                    } else{
                        $('#servers').val('');
                    }
                    
                    $('#form').submit();
                }
			</script>
</body>
</html>