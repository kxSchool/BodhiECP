<!DOCTYPE html>
<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="x-dns-prefetch-control" content="on">
		<title>我的优惠券 - XXXXX</title>
		<!-- common css -->
         <link rel="shortcut icon" href="<?php echo IMG?>/common/favicon.ico" type="image/x-icon">
		<link href="<?php echo CSS?>/common.css" rel="stylesheet" type="text/css">
		<link href="<?php echo CSS?>/sort.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="<?php echo CSS?>/common/base.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo CSS?>/common/public.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo CSS?>/order/index.css">
        
		<script type="text/javascript" src="<?php echo JS?>/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="<?php echo JS?>/common/common.js"></script>
         
		<body>
			<div id="nTalk_post_hiddenElement" style="left: -10px; top: -10px; visibility: hidden; display: none; width: 1px; height: 1px;"></div>
		  <!--header start-->
			<header>
                <?php include_once BASE.'/top.php';?>

				<div class="personal-header">
					<div class="container clearfix logo myTab" style="border: 1px solid #fff;">
						<a href="/index/index" class="my-logo"><img src="<?php echo IMG?>/common/logo.png"></a>
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
									首页>个人中心>我的评价
								</p>
							</div>
							<div class="myMenu floatleft">
                                <?php include_once BASE.'/leftSide.php';?>
							</div>
							<div class="myCont floatright">
								<div class="person-main-tab js-order-tab">
									<ul>
										<li class="first-li active">

											<a href="javascript:;" ><?php if($search == 'has'){echo '已付款';}elseif($search == 'wait'){echo '待付款';}else{echo '全部订单';}?></a>
										</li>
									</ul>
								</div>
								<!--个人资料 content部分 S-->
								<div class="method-content">
									<!-- 无订单  S-->
									<div class="noData hidden"> 
										<img src="<?php echo IMG?>/common/noDataBanner.png">
										<p>您还没有购买商品哦，暂时还没有订单可以查询!</p>
									</div>
									<!-- 无订单 E-->

									<div class="all-order ">
										<div class="u-panel-inner clearfix">
											<!--全部订单 S-->
											<div class="js-tab-0">
												<table>
													<thead>
														<tr>
															<th width="310">商品</th>
															<th>数量</th>
															<th>实付款</th>
															<th>交易状态</th>
															<th width="167">操作</th>
														</tr>

													</thead>
                                                    <?php foreach ($order_goods as $k1=>$v1) :?>
                                                <tbody>
                                                <tr class="body-head">
                                                    <td colspan="7" class="text-left">
                                                        <span class=""><?php echo date('Y-m-d H:i:s',$v1['add_time']);?></span>
                                                        <span>订单号：<?php echo $v1['order_sn'];?></span>
                                                         <?php if($v1['order_status'] == 0):?>
                                                                 <span class="deleteBtn"><img src="<?php echo IMG?>/common/deleteBtn.png" onclick="cancelOrder(this)" data-id="<?php echo $v1['order_id']?>"></span>
                                                         <?php endif;?>
                                                    </td>
                                                </tr>
                                                <?php $goods_count = count($v1['goods_list']);?>
                                                <?php foreach ($v1['goods_list'] as $gid=>$goods):?>
                                                    <tr>
                                                        <td class="b-l-n" style="text-align: left; padding-left: 20px">
                                                            <div class="order-info">

                                                                <div class="order-right">
                                                                    <p>
                                                                        <a class="order-company"><?php echo $goods['goods_name']?></a>
                                                                    </p>
                                                                    <p>地区：
                                                                        <a><?php echo $v1['address']?></a>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <?php echo $goods['goods_count']?> </td>
                                                        <td class="body-fee">
                                                            ¥<?php echo $goods['goods_price']?> <br>（优惠：¥0）
                                                        </td>
                                                        <td class="waiting">
                                                            <?php echo $v1['status']?> </td>

                                                        <?php if($gid==0):?>
                                                            <?php if($v1['order_status'] == 0):?>
                                                                <td rowspan="<?php echo $goods_count?>" class="body-btn b-r-n">
                                                                    <a href="<?php echo site_url('order/pay') . '?oid=' .$v1['order_id']; ?>" class="pay">去付款</a>

                                                                </td>

                                                            <?php elseif ($v1['order_status'] == 1):?>
                                                                <td rowspan="<?php echo $goods_count?>" class="body-btn b-r-n">
                                                                    <a href="<?php echo site_url('order/progress') . '?oid=' .$v1['order_id']; ?>" class="pay">查看进度</a>

                                                                </td>

                                                            <?php elseif ($v1['order_status'] == 5):?>
                                                                <td rowspan="<?php echo $goods_count?>" class="body-btn b-r-n">
                                                                    <a href="<?php echo site_url('order/newComment') . '?oid=' .$v1['order_id']; ?>"  class="pay">去评价</a>

                                                                </td>
                                                            <?php endif;?>
                                                        <?php endif;?>

                                                    </tr>
                                                <?php endforeach;?>

                                                <tr class="white-space">
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            <?php endforeach;?>
												</table>

												<div class="row">
													<div class="col-lg-12 text-center">
														<nav aria-label="Page navigation">
															<?php echo $link?>
														</nav>
													</div>
												</div>
											</div>
											<!--全部订单 E-->
										</div>
									</div>

								</div>
							 
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<!--layout end-->

            <?php include_once BASE.'/foot.php';?>
                <script>
                    function cancelOrder(e) {

                        if (confirm("您确定要取消订单吗？")) {

                            var id = $(e).data('id');
                            $.ajax({
                                url: "<?php echo site_url('order/cancelOrder')?>" + "?oid=" + id,
                                type: 'GET',
                                dataType: 'JSON',
                                success: function (res) {
                                    if (res.code === 0) {
                                        location.reload();
                                    }
                                }

                            });
                        }
                        else {

                        }
                    }
                </script>
		</body>

</html>