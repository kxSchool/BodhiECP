<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="<?php echo $good_info['seo_keywords'];?>">
    <meta name="description" content="<?php echo $good_info['seo_description'];?>">


    <title><?php echo $goods_title;?> - XXXXX</title>
    <!-- common css -->
     <link rel="shortcut icon" href="<?php echo IMG?>/common/favicon.ico" type="image/x-icon">
    <link href="<?php echo CSS?>/common.css" rel="stylesheet" type="text/css">
    <link href="<?php echo CSS?>/sort.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo CSS?>/common/base.css" type="text/css" />
    <link href="<?php echo CSS?>/ui-dialog.css" rel="stylesheet" type="text/css">

    <link href="<?php echo CSS?>/product/index.css" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="<?php echo JS?>/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="<?php echo JS?>/product/product.js"></script>
    <script type="text/javascript" src="<?php echo JS?>/common/common.js"></script>

<body>
<div id="nTalk_post_hiddenElement" style="left: -10px; top: -10px; visibility: hidden; display: none; width: 1px; height: 1px;"></div>
<!--header start-->
<?php include_once BASE.'/nav.php';?>
<!--header end-->
<!--layout start-->
<div class="layout">

    <div class="bg-white">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li>
                        <a href="/">首页</a>
                    </li>
                    <li class="interval">&gt;</li>
                    <li class="active"><?php echo $catname?></li>
                </ul>
            </div>
            <div class="product clearfix">
                <div class="product-item-preview floatleft">
                    <div>
                        <img src="<?php echo $this->config->item('goods_images_url').$good_info['picname'];?>">
                    </div>

                </div>
                <div class="product-item-inner floatleft">
                    <div class="item-name" style="position: relative;">
                        <input type="hidden" id="productid" value="<?php echo $good_info['id']?>">
                        <h2><?php echo $goods_title?></h2>

                        <a href="" class="share link-wx js-link-wx"></a>
                    </div>

                    <div class="item-detail">
                        <div class="item-price">
                            <ul class="clearfix">
                                <li class="item-title">价&nbsp;&nbsp;&nbsp;&nbsp;格:</li>
                                <li class="item-fee" id="saleprice">￥
                                    <font id="price"><?php echo $good_info['totalprice']?></font>元</li>

                            </ul>

                        </div>
                        <div class="item-type js-item-type">
                            <ul class="clearfix dis-inline-b" style="vertical-align: top;">
                                <li class="item-title">类&nbsp;&nbsp;&nbsp;&nbsp;型:</li>
                            </ul>
                            <ul class="clearfix w-660 dis-inline-b" style="vertical-align: top;" id="productsalesattrlist">
                                <?php foreach ($goods_list as $key=>$good):?>

                                    <li class="<?php if(!isset($_REQUEST['id'])){
                                        if($good['id'] == $good_info['id']){
                                            echo 'active';
                                        }
                                    }else{
                                        if($good['id'] == $_REQUEST['id']){
                                            echo 'active';
                                        }
                                    }?>">
                                        <a href="<?php echo site_url('product/info') . '?gid=' . $good['id'] . '&cid=' . $good['category2'] . '_' . $good['category3'];?>"><?php echo $good['all_name'];?></a>
                                    </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                        
                        <?php if($good_info['is_region'] == 0):?>
                        
                         <div class="item-area">
							<ul class="clearfix" id="isshowquanguo" data-id="1">
								<li class="item-title">地&nbsp;&nbsp;&nbsp;&nbsp;区:</li>
								<li class="m-l-5">
									<input value="全部" readonly="readonly" style="width: 120px;height: 30px;font-size: 14px;text-align: center;"/>
								</li>
							</ul>
                        </div>
                        
                        <?php else:?>
                        <div class="item-area">
                            <ul class="clearfix" id="isshowquanguo" data-id="2">
                                <li class="item-title">地&nbsp;&nbsp;&nbsp;&nbsp;区:</li>
                                <li class="m-l-5">
                                    <select class="form-control" name="province" id="province1">
                                        <?php foreach ($province as $pid => $pro):?>
                                            <option value="<?php echo $pro['id']?>" data-id="<?php echo $pro['id']?>" "<?php if($pro['id']==$this->config->item('default_provinceid')){echo 'selected';}?>"><?php echo $pro['name']?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <select class="form-control" name="city" id="city">
                                        <?php foreach ($city as $cid => $cit):?>
                                            <option value="<?php echo $cit['id']?>" data-id="<?php echo $cit['id']?>" "<?php if($cit['id']==$this->config->item('default_cityid')){echo 'selected';}?>"><?php echo $cit['name']?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <select class="form-control" name="area" id="district">
                                        <?php foreach ($area as $aid => $are):?>
                                            <option value="<?php echo $are['id']?>" data-id="<?php echo $are['id']?>" "<?php if($are['id']==$this->config->item('default_areaid')){echo 'selected';}?>"><?php echo $are['name']?></option>
                                        <?php endforeach;?>
                                    </select>

                                </li>
                                <span style="color: red; display: none;" id="isshowthis">该服务暂不支持此地区</span>
                            </ul>
                        </div>
                        <?php endif;?>
                        
                        
                        <div class="item-note" style="width: 620px;">
                            <input type="hidden" id="isneedarea" value="2">
                            <input type="hidden" id="currentcity" value="3304">
                            <input type="hidden" id="currentarea" value="154">
                            <input type="hidden" id="productsalesattrid" value="1">
                            <input type="hidden" id="providercurrentpage" value="">

                            <div id="selectprovider">
                                <a href=" " class="free-advice">免费咨询</a>
                                <a href="javascript:;" onclick="submitInfo()"  class="order-now">立即下单</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--<div class="product-banner"></div>-->

            <!--左边 S-->
            <div class=" floatleft">
                <div class="product-detail clearfix">
                    <div class="product-main floatleft js-product-main">

                        <div class="product-main-tab js-main-tab">
                            <ul>
                                <li class="first-li active">
                                    <a href="javascript:;" data-id="0">服务介绍</a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-id="1">用户评价
                                        <span  class="EvaluationTotal" id="productEvaluationTotal"></span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <div class="detail-img">
                            <!-- 服务介绍 S -->
                            <div class="product-main-content border-t-none js-tab-0" id="product-detail" style="">
                                <?php echo $good_info['content'];?>
                            </div>
                            <!-- 服务介绍 E -->
                            <!-- 用户评价 S -->
                            <div class="product-evaluation-info  js-tab-1 hidden" id="pro-evaluate">
                                <div class="product-details-content clearfix"></div>
                                <div class="evaluation-list clearfix" id="evaluation-list">
                                    <div id="comtotal">
                                    <ul class="user-eval-tab clearfix js-evellist">
                                        <li class="active">
                                            <a href="javascript:;" onclick="evaluatelist(0)">全部评价</a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" onclick="evaluatelist(1)">
                                                好评<span class="goodCom"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" onclick="evaluatelist(2)">
                                                中评<span class="midCom"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" onclick="evaluatelist(3)">
                                                差评<span class="badCom"></span>
                                            </a>
                                        </li>
                                    </ul>  
                                    </div>
                                    <div id="comMain">
                                   
                                    </div>
                                                         
                                    <!--页码 S -->
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <nav aria-label="Page navigation" id="page">
                                               <!-- <ul class="paginations">
                                                    <li class="">
                                                        <a>
                                                            &lt;&lt;</a>
                                                    </li>
                                                    <li class="pre-page">
                                                        <a>上一页</a>
                                                    </li>
                                                    <li class=" active">
                                                        <a href="#">1</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#">2</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#">3</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#">4</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#">5</a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#">6</a>
                                                    </li>
                                                    <li class="next-page">
                                                        <a>下一页</a>
                                                    </li>
                                                    <li class=" ">
                                                        <a>&gt;&gt;</a>
                                                    </li>
                                                </ul>-->
                                            </nav>
                                        </div>
                                     <!--页码 E-->
                                </div>
                            </div>
                            <!-- 用户评价 E -->
                        </div>
                    </div>
                </div>
            </div>
            <!--左边 E-->
          
          
        </div> 
          <!--右边 S-->
          <div class="floatright">
          <!--右边  one S-->
			 
				<div class="HotArticles">

<!--					<div class="account-form" action=" " method="post">-->
<!--						<div class="account-title">-->
<!--							<h3>热门文章推荐</h3> 								-->
<!--						</div>-->
<!--						 <div class="panel">-->
<!--						 	<ul id="article">-->
<!--						 		<li>-->
<!--						 			<span class="first">1</span>-->
<!--						 			<a>企业常用的八种避税方法，建议...</a>-->
<!--						 		</li>-->
<!--						 		<li>-->
<!--						 			<span class="second">2</span>-->
<!--						 			<a>企业常用的八种避税方法，建议...</a>-->
<!--						 		</li>-->
<!--						 		<li>-->
<!--						 			<span class="third">3</span>-->
<!--						 			<a>企业常用的八种避税方法，建议企业常用的八种避税方法，建议企业常用的八种避税方法，建议</a>-->
<!--						 		</li>-->
<!--						 		<li>-->
<!--						 			<span class="fourth">4</span>-->
<!--						 			<a>企业常用的八种避税方法，建议...</a>-->
<!--						 		</li>-->
<!--						 		<li>-->
<!--						 			<span class="fourth">5</span>-->
<!--						 			<a>企业常用的八种避税方法，建议...</a>-->
<!--						 		</li>-->
<!--						 		<li>-->
<!--						 			<span class="fourth">6</span>-->
<!--						 			<a>企业常用的八种避税方法，建议...</a>-->
<!--						 		</li>-->
<!--						 	</ul>-->
<!--						 </div>-->
<!---->
<!--					</div>-->
				</div> 
                <!--右边 one E-->
                    <div class="shopcart">
        
                        <div class="account-form">
                            <div class="account-title">
                                <h3>您可能感兴趣</h3>
                                <a class="refresh">换一批</a>
                            	<div class="clearfix"></div>
                            </div>    
                            <div id="extend">
        
                            </div>            
                        </div> 
                        
                    </div>
                </div>
              <div class="clearfix"></div>
            <!--右边 E-->
    </div>

</div>
<!--layout end-->

<!--footer start-->
<?php include_once BASE.'/foot.php';?>
<!--footer end-->

</body>

</html>