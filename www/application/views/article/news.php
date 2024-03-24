<!DOCTYPE html>
<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="x-dns-prefetch-control" content="on">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="<?php echo $info['keywords'];?>">
		<meta name="description" content="<?php echo $info['description'];?>">

		<title>有限公司注册_公司注册_ 注册公司代理 - XXXXX</title>
		<!-- common css -->
		<link href="<?php echo CSS?>/common.css" rel="stylesheet" type="text/css">
		<link href="<?php echo CSS?>/sort.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="<?php echo CSS?>/common/base.css" type="text/css" />
		<link href="<?php echo CSS?>/ui-dialog.css" rel="stylesheet" type="text/css">

		<link href="<?php echo CSS?>/product/news.css" rel="stylesheet" type="text/css">

		<script type="text/javascript" src="<?php echo JS?>/jquery-1.8.3.min.js"></script>

		<script type="text/javascript" src="<?php echo JS?>/common/common.js"></script>

		<body>
			<div id="nTalk_post_hiddenElement" style="left: -10px; top: -10px; visibility: hidden; display: none; width: 1px; height: 1px;"></div>
			<!--header start-->
			<?php include_once BASE.'/nav.php';?>
			<!--header end-->
			<!--layout start-->
			<div class="layout">
				<script>
					//判断是否为移动端 如果是移动端即进入移动端的页面
					var browser = getBrowser();
					var wwwMobileUrl = 'https://m.kxschool.com/';
					if(browser.isMobile) {
						window.location.href = wwwMobileUrl;
					}
				</script>
				<div class="bg-white">
					<div class="container">
						<div class="breadcrumb">
							<ul>
								<li>
									<a href="/">首页</a>
								</li>
								<li class="interval">&gt;</li>
								<li class="active">文章详情</li>
							</ul>
						</div>


						<!--左边 S-->
						<div class=" floatleft">
							<div class="product-detail clearfix">
								<div class="product-main floatleft js-product-main">
									<div class="detail-img">
										<!-- 服务介绍 S -->
										<div class="article border-t-none js-tab-0 " >
											<div class="article-title">
												<h1 id='article' data-id="<?php echo $info['id'];?>"><?php echo $info['title'];?></h1>
												
											</div>
											<div class="article-detail"> 
												<div class="source">来源：<span>XXXXX</span></div>
												<div class="read">阅读量：<span><?php echo $info['views'];?></span></div>
												<div class="time">时间：<span><?php echo date('Y-m-d',$info['inputtime']);?></span></div>
<!--												<div class="share">-->
<!--													<a class="wechat"><img src="--><?php //echo IMG?><!--/product/icon/wechat.png"></a>-->
<!--													<a class="circle"><img src="--><?php //echo IMG?><!--/product/icon/circle.png"></a>-->
<!--													<a class="qq"><img src="--><?php //echo IMG?><!--/product/icon/qq.png"></a>-->
<!--													<a class="space"><img src="--><?php //echo IMG?><!--/product/icon/qqSpace.png"></a>-->
<!--												</div>-->

                                                
                                                <div class="bdsharebuttonbox share">
                                                    分享到:
                                                    <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间" style="background: url(/static/img/product/icon/qqSpace.png);background-size: 100% 100%;position: absolute;left: 79px;top:-5px;"></a>
                                                    <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信" style="background: url(/static/img/product/icon/wechat.png);background-size: 100% 100%;position: absolute;left: 107px;top:-5px;"></a>
                                                    <a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友" style="background: url(/static/img/product/icon/qq.png);background-size: 100% 100%;position: absolute;left: 140px;top:-5px;"></a></div>

											</div>
											<div class="article-main">
                                                <?php echo $info['content'];?>
											</div>
                                            <?php if(isset($near['next'])):?>

                                                <a class="next-art" href="<?php echo site_url('article/news?id=').$near['next']['id'];?>">下一篇：<?php echo $near['next']['title'];?></a>
                                            <?php else:?>
                                                <a class="next-art">----人都是有底线的----</a>
                                            <?php endif;?>

										</div>
										<!-- 服务介绍 E -->
										
									</div>
								</div>
							</div>
						</div>
						<!--左边 E-->
						<!--右边  one S-->
						<div class="floatright">
						<div class="HotArticles">

							<div class="account-form">
								<div class="account-title">
									<h3>热门文章推荐</h3> 								
								</div>
								 <div class="panel">
								 	<ul id="relevantArticle">
								 	</ul>
								 </div>

							</div>
						</div> 
						<!--右边 one E-->
						<!--右边 S-->
						<div class="shopcart">

							<div class="account-form" id="extend">
								<div class="account-title">
									<h3>您可能感兴趣</h3>
									<a class="refresh">换一批</a>
									<div class="clearfix"></div>
								</div>

							</div>
						</div>
							</div>
						<div class="clearfix"></div>
						<!--右边 E-->
						
					</div>
				</div>

			</div>
			<!--layout end-->

			<!--footer start-->
			<?php include_once BASE.'/foot.php';?>
			<!--footer end-->
		</body>
    <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='https://www.kxschool.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
    <script>
        $(function () {
            relevantArticle();
            relevant();
        });
        function relevantArticle() {
            // var id = $('#article').data('id');
            var str = '';
            $.ajax({
                url: '/article/relevantArticle' + '?count=6',
                type: 'GET',
                dataType: 'JSON',
                success: function (res) {
                    if(res.code === 0){
                        for(var i = 0;i<res.data.length;i++){
                            var j = i+1;
                            var url ='';
                            var sort_class ='';
                            if(i === 0){
                                sort_class = 'first';
                            }else if (i === 1){

                                sort_class = 'second';
                            } else if (i === 2){
                                sort_class = 'third';

                            } else {
                                sort_class = 'fourth';

                            }
                            str += '<li>' +
                                '<span class="'+sort_class+'">'+j+'</span>' +
                                '<a href="/article/news?id='+res.data[i].id+'">'+res.data[i].title+'</a>' +
                                '</li>';
                        }
                        $('#relevantArticle').html(str);
                    }
                }
            })
        }
        function relevant() {
            var gid = $('#productid').val();
            var str = '';
            var src = '';
            var url = '';
            $.ajax({
                url : '/api/relevant',
                type : 'GET',
                dataType : 'JSON',
                success : function(res){
                    if(res.code === 0){
                        for(var i = 0;i<res.data.length;i++){
                            src = res.data[i].picname;
                            url = '/product/info?cid='+res.data[i].category2 + '_' + res.data[i].category3;
                            str += "<a class=\"shopcart-panel\" id=\"selected-product\" href='"+url+"'>\n" +
                                "    <div class=\"avatar\">\n" +
                                "    <img src=\""+src+"\">\n" +
                                "    </div>\n" +
                                "    <div class=\"shopcart-total\">\n" +
                                "    <p>"+res.data[i].all_name+"</p>\n" +
                                "    <em>￥"+res.data[i].totalprice+"</em>\n" +
                                "</div>\n" +
                                "</a>";
                        }
                        $('#extend').append(str);
                    }
                }
            });
        }
    </script>

</html>