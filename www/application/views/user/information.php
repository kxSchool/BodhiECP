<!DOCTYPE html>
<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="x-dns-prefetch-control" content="on">
		<title>我的主页 - 个人资料 - XXXXX</title>
		<!-- common css -->
         <link rel="shortcut icon" href="<?php echo IMG?>/common/favicon.ico" type="image/x-icon">
		<link href="<?php echo CSS?>/common.css" rel="stylesheet" type="text/css">
		<link href="<?php echo CSS?>/sort.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="<?php echo CSS?>/common/base.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo CSS?>/common/public.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo CSS?>/user/personalInfo.css">
        
		<script type="text/javascript" src="<?php echo JS?>/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="<?php echo JS?>/user/index.js"></script>
		<script type="text/javascript" src="<?php echo JS?>/common/common.js"></script>

		<body>
			<div id="nTalk_post_hiddenElement" style="left: -10px; top: -10px; visibility: hidden; display: none; width: 1px; height: 1px;"></div>
		  <!--header start-->
			<header>
                <?php include_once BASE.'/top.php';?>

				<div class="personal-header">
					<div class="container clearfix logo myTab" style="border: 1px solid #fff;">
						<div href="/index/index" class="my-logo"><img src="<?php echo IMG?>/common/logo.png"></div>
						<a href="/user/index" class="my-main active">我的主页</a> 
						<a href="/user/accountSet" class="account-set">账号设置</a>
					</div>
					
				</div>
			     <script type="text/javascript">
					$(function() {
						$('.myTab').find('a').on('click', function() {
							var $this = $(this);
							$this.addClass('active').siblings().removeClass('active');
						})
					});
				</script>
			</header>
			<!--header end-->
		<!--layout start-->
			<div class="layout">
 
				<div class="bg-white">
					<div class="container">
						<div class="mycenter">
							<div class="tip_title">
								<p>
									首页>我的主页
								</p>
							</div>
							<div class="myMenu floatleft">
                                <?php include_once BASE.'/leftSide.php';?>
							</div>
							<div class="myCont floatright">
								 
								<!--个人资料 content部分 S-->
								<div class="method-content">
									<!--基本信息完善 S-->
									<div class="baseInfo js-tab-0">
										<form  method="post" id="form">
											<div class="p-same">
												<p class="">
													<span class="centerInfo">真实姓名:</span>
													<input type="text" name="realname" placeholder="" class="inputW332" value="<?php if(!empty($realname)){echo $realname;}?>">
												</p>
												 
											</div>
											<div class="p-same">
												<p class="">
													<span class="centerInfo">性别:</span>
													<select class="sexSelect" name="sex">
														<option value="0" <?php if($sex == 0){echo 'selected';}?>>保密</option>
														<option value="1" <?php if($sex == 1){echo 'selected';}?>>男</option>
														<option value="2" <?php if($sex == 2){echo 'selected';}?>>女</option>
													</select>
												</p>
												 
											</div>
											<div class="p-same">
												<p class="">
													<span class="centerInfo">生日:</span>
													<input type="date" name="birthday"   placeholder="" class="inputW332" value="<?php if($birthday){echo date('Y-m-d',$birthday);}?>">
												</p>

											</div>
											<div class="p-same">
												<p class="">
													<span class="centerInfo">邮箱:</span>
													<input type="email" name="email"   placeholder="" class="inputW332" value="<?php if(!empty($email)){echo $email;}?>">
												</p>
											 
											</div><div class="p-same">
												<p class="">
													<span class="centerInfo">所在公司:</span>
													<input type="text" name="company"  placeholder="" class="inputW332" value="<?php if(!empty($company)){echo $company;}?>">
												</p>
												 
											</div>
											<div class="p-same">
												<p class="">
													<span class="centerInfo">职务:</span>
													<input type="text" name="post" placeholder=""  class="inputW332" value="<?php if(!empty($post)){echo $post;}?>">
												</p>
												 
											</div>
											<div class="p-same">
												<p class="p-address">
													<span class="centerInfo">公司所在地:</span>
													<span class="p-city">
														<select name="company_province">
															<option value="0">请选择省份</option>
                                                            <?php foreach ($province as $pro):?>
                                                                <option <?php if($pro['id']==$company_province){echo 'selected';}?> value="<?php echo $pro['id'];?>"><?php echo $pro['name'];?></option>
                                                            <?php endforeach;?>
														</select>
														<select  name="company_city">
                                                            <?php if(!empty($city)):?>
                                                                <?php foreach ($city as $ci):?>
                                                                    <option <?php if($ci['id']==$company_city){echo 'selected';}?> value="<?php echo $ci['id'];?>"><?php echo $ci['name'];?></option>
                                                                <?php endforeach;?>
                                                            <?php else:?>
                                                                <option value="0">请选择市</option>
                                                            <?php endif;?>
														</select>
														<select name="company_area">
                                                            <?php if(!empty($area)):?>
                                                                <?php foreach ($area as $ar):?>
                                                                    <option <?php if($ar['id']==$company_area){echo 'selected';}?> value="<?php echo $ar['id'];?>"><?php echo $ar['name'];?></option>
                                                                <?php endforeach;?>
                                                            <?php else:?>
                                                                <option value="0">请选择区.县</option>
                                                            <?php endif;?>

														</select>
													</span>
												</p>
												 
											</div>
											<button class="baseBtn" type="button">保存</button>
										</form>
									</div>
									<!--基本信息完善 E-->
								</div>
								<!--个人资料 content部分 E-->
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			<!--layout end-->
                <script>
                    $(function () {
                        $('.baseBtn').on('click',function () {
                            var data = $('#form').serialize();
                            $.ajax({
                                data : data,
                                url : '/user/saveInfo',
                                type : 'POST',
                                dataType : 'JSON',
                                success :function (res) {
                                    if(res.code === 0){
                                        location.reload();
                                    }else{
                                        alert(res.mes);
                                    }
                                }
                            })
                        });
                    })
                </script>
            <?php include_once BASE.'/foot.php';?>

		</body>

</html>