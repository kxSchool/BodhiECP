window.onload = function(){
    /*评论条数*/
    comment();
    /*评论列表*/
    commentCont();
relevantArticle();
relevant();
};


$(function () {

    //tab切换
    $('.js-main-tab').find('a').on('click', function() {
        var $this = $(this);
        $this.parent().addClass('active').siblings().removeClass('active');
        var _id = $this.attr('data-id');
        $('.js-tab-' + _id).removeClass('hidden').siblings().addClass('hidden');
    });

    //地区hover之后的状态
    $('.js-changearea').hover(function () {
        var $this = $(this)
        var $select = $('.js-areaselected')
        $this.find('.item-select').addClass('hover')
        $select.show()
    }, function () {
        var $this = $(this)
        var $select = $('.js-areaselected')
        $this.find('.item-select').removeClass('hover')
        $select.hide()
    })


    //吸顶层
    var toTopHeight = $('.js-product-main').offset().top,
        proTab = $('.js-main-tab'),
        protabInner = $('.js-main-tab').find('ul'),
        prodWrapper = $('#product-detail'),
        recommend = $('.product-recommend')
    $(window).scroll(function () {
        var scrollTop = $(document).scrollTop();

        if ($(document).scrollTop() >= $('.js-product-main').offset().top) {
            proTab.addClass('product-fixed');
            recommend.addClass('absoluted').css('top', scrollTop - $('.js-product-main').offset().top)

        } else {
            proTab.removeClass('product-fixed');
            recommend.removeClass('absoluted').css('top', 0)
            $('.js-btn-group').addClass('hidden');

        }
    })

    

    $('#district').change(function () {

            var areaOpt = $('#district option:selected');
            var areaid = areaOpt.val();


            $.ajax({
                url: "/api/getPrice",
                type: 'post',
                data : {rid:areaid,gid:$('#productid').val()},
                dataType: 'json',
                success: function (data) {

                    $('#price').html(data.price);

                }
            });

        })
    
});

function submitInfo() {

    if($('#isshowquanguo').data('id') === 2){
        var ids = $('#productid').val() + '_' + $('#province1').val() + '_' + $('#city').val() + '_' + $('#district').val();
    }else{
        var ids = $('#productid').val();
    }

    window.location = '/product/exServer' + '?id=' + ids;
}

function relevant() {
    var gid = $('#productid').val();
    var str = '';
    var src = '';
    var url = '';
    $.ajax({
        url : '/api/relevant' + '?gid=' + gid,
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
function comment(){
     var gid = $('#productid').val();
     $.ajax({
        url : '/api/getProCommentCount' + '?gid=' + gid,
        type : 'GET',
        dataType : 'JSON',
        success : function(res){
            $('.EvaluationTotal').html('('+res.total+')');
             $('.goodCom').html('('+res.good+')');
             $('.midCom').html('('+res.middle+')');
             $('.badCom').html('('+res.bad+')');
        }
    });
}
function commentCont(){
     var gid = $('#productid').val();
     var commentContModel=" ";
     var pageMain = " ";
     $.ajax({
        url : '/api/getProComment' + '?gid=' + gid,
        type : 'GET',
        dataType : 'JSON',
        success : function(res){
             // console.log(res.list[0].add_time)
             //  console.log(res.list.length)
             for(var i=0;i<res.list.length; i++){
            commentContModel +=' <ul class="user-eval-list-item eval-list clearfix"><li class=""><div class="grade">'+
                            '<a class="name">'+res.list[i].username+'</a><div class="stars"><ul><li class=""><span></span><span></span>'+
                            '<span></span><span></span><span></span></li></ul></div></div><a class="info">'+res.list[i].content+'</a>'+
                            '<div class="pjmodule"><ul class="clearfix">';
                                for(var j=0;j<res.list[i].tag_list.length; j++){
                                   commentContModel +='<li>'+res.list[i].tag_list[j].tagname+'</li>'
                                }                                                   
           commentContModel +='</ul></div></li><li><div class="serve-info"><ul><li><img src="'+res.list[i].icon+'"  style="width:38px;height:38px">'+
                            '</li><li class="name"><a href="#">'+res.list[i].username+'</a></li><li class="rate"><span>'+res.list[i].goods_name+'('+res.list[i].address+')</span><span>'+res.list[i].add_time+'</span>'+
                             '</li></ul></div></li></ul>';
                                   
           }
            $('#comMain').html(commentContModel); 
            $('#page').html(res.link);
        }
    });
}
function getAjaxPageData(url){
    var commentContModel=" ";
     var pageMain = " ";
     $.ajax({
        url : url,
        type : 'GET',
        dataType : 'JSON',
        success : function(res){
            
            for(var i=0;i<res.list.length; i++){
            commentContModel +=' <ul class="user-eval-list-item eval-list clearfix"><li class=""><div class="grade">'+
                           '<a class="name">'+res.list[i].username+'</a><div class="stars"><ul><li class=""><span></span><span></span>'+
                           '<span></span><span></span><span></span></li></ul></div></div><a class="info">'+res.list[i].content+'</a>'+
                           '<div class="pjmodule"><ul class="clearfix">';
                               for(var j=0;j<res.list[i].tag_list.length; j++){
                                  commentContModel +='<li>'+res.list[i].tag_list[j].tagname+'</li>'
                               }                                                   
          commentContModel +='</ul></div></li><li><div class="serve-info"><ul><li><img src="'+res.list[i].icon+'"  style="width:38px;height:38px">'+
                           '</li><li class="name"><a href="#">'+res.list[i].username+'</a></li><li class="rate"><span>有限责任公司注册(上海-金山区)</span><span>2018.03.02</span>'+
                            '</li></ul></div></li></ul>';
                                   
           }
            $('#comMain').html(commentContModel); 
            $('#page').html(res.link);
        }
        });
}
function relevantArticle() {
    var goods_id = $('#productid').val();
    var str = '<div class="account-form"><div class="account-title"><h3>热门文章推荐</h3> </div><div class="panel"><ul id="article">';

    $.ajax({
        url: '/article/goodsArticle' + '?goods_id='+goods_id,
        type: 'GET',
        dataType: 'JSON',
        success: function (res) {
            if(res.code === 0){
                for(var i = 0;i<res.data.length;i++){
                    var j = i+1;
                    var url ='/article/news?id='+res.data[i].id;
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
                        '<a href="'+url+'">'+res.data[i].title+'</a>' +
                        '</li>';
                }
                str += '</ul></div></div>';
                $('.HotArticles').html(str);
            }
        }
    })
}
