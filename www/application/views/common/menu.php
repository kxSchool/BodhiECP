<div class="main-header">
    <div class="container clearfix logo" style="border:1px solid #fff;">
        <a href="/"><img src="<?php echo IMG?>/common/logo.png"></a>
    </div>
    <div class="container clearfix">
        <div class="nav-sub floatleft">
            <a href="#">全部服务分类</a>
            <link href="<?php echo CSS?>/sort.css" rel="stylesheet" type="text/css">
            <div class="floatleft nav-list hidden">
                <div class="floatleft nav">
                    <ul class="nav-sub-list clearfix">
                        <?php foreach ($category_list as $cid=>$category):?>
                            <li class="">
                                <i class="icon-<?php echo $cid+1;?>"></i>
                                <h4><?php echo $category['cat_name'];?></h4>
                                <i class="right-arrow"><div></div></i>
                            </li>
                        <?php endforeach;?>
                    </ul>

                </div>
                <div class="floatLeft nav-content hidden">


                    <?php foreach ($category_list as $cfid=>$fcategory):?>
                        <div class="clearfix hidden classify">
                            <ul class="clearfix floatleft nav-content-item nav-content-item-2">
                                <?php foreach ($fcategory['s_list'] as $csid=>$scategory):?>
                                    <li>
                                        <a href="#">
                                            <h5><?php echo $scategory['cat_name'];?></h5>
                                        </a>
                                        <div class="<?php if($csid == 0){echo 'nav-one';}?>">
                                            <?php foreach ($scategory['t_list'] as $ctid=>$tcategory):?>
                                                <a class="<?php if($tcategory['is_hot'] == 1){echo 'active';}?>" href="<?php echo site_url('product/info').'?cid='.$scategory['cat_id'].'_'.$tcategory['cat_id']?>"><?php echo $tcategory['cat_name'];?></a>
                                            <?php endforeach;?>
                                        </div>
                                    </li>
                                <?php endforeach;?>
                            </ul>
                            <div class="nav-img-wrap-2 floatleft">
                                <ul class="floatleft">
                                    <li class="iSubNavRi1">
                                        <a href="/product/info.html?cid=6_52">
                                            <img src="<?php echo IMG?>/index/goods/nav1.jpg" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/product/info.html?cid=18_91">
                                            <img src="<?php echo IMG?>/index/goods/nav2.jpg" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/product/info.html?cid=4_45">
                                            <img src="<?php echo IMG?>/index/goods/nav3.jpg" alt="">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach;?>

                </div>

            </div>

            <script>
                var $nav = $('.nav-list')
                var $navList = $('.nav-content').children('.clearfix');
                var $navSubList = $('.nav-sub-list').find('li');
                var $navContent = $('.nav-content');
                var navFlag = false;

                $nav.hover(function() {
                    navFlag = true;
                }, function() {
                    navFlag = false;
                    $navSubList.removeClass('active');
                    $navList.addClass('hidden');
                    $navContent.addClass('hidden');
                })

                $navSubList.hover(function() {
                    var $this = $(this);
                    var _id = $this.index();
                    $this.addClass('active').siblings().removeClass('active');
                    $($navList[_id]).removeClass('hidden').siblings().addClass('hidden');
                    $navContent.removeClass('hidden')
                }, function() {
                    var $this = $(this);
                    var _id = $this.index();
                })

                // 不是主页时，选择分类可收起
                $('.nav-sub').hover(function() {
                    $nav.removeClass('hidden');
                }, function() {
                    $nav.addClass('hidden');
                })
            </script>

        </div>
        <div class="navs floatright">
            <?php foreach ($ad_list as $aid => $ad):?>
                <a href="<?php echo $ad['setting']['ad_link']?>"><?php echo $ad['name']?></a>
            <?php endforeach;?>


        </div>
    </div>
</div>