$(function(){

	//首屏banner效果图
	var ali=$('#lunbonum li');
	var aPage=$('#lunhuanback p');
	var aslide_img=$('.lunhuancenter > div');
	var iNow=0;
 

	ali.each(function(index){
		$(this).mouseenter(function(){
			slide(index);
		})
	});

	function slide(index){
		iNow=index;
		ali.eq(index).addClass('lunboone').siblings().removeClass();
		aPage.eq(index).stop().animate({opacity:1},1000);
		aPage.eq(index).siblings().stop().animate({opacity:0},1000);
		aslide_img.eq(index).stop().animate({opacity:1,top:0},1000).siblings('div').stop().animate({opacity:0,top:0},1000);
	}
	function autoRun(){
		iNow++;
		if(iNow==ali.length){
			iNow=0;
		}
		slide(iNow);
	}
	var timer=setInterval(autoRun,3000);

	ali.hover(function(){
		clearInterval(timer);
	},function(){
		timer=setInterval(autoRun,3000);
	});
 
});

/**专属定制提交 */
function specialSunmit(){

	var specialName = $('.specialName').val();
	// console.log(specialName);
	if (specialName === "") {
	   $('.xmtips').removeClass('hidden');
		return false;
	}
	var tel = $('.specialTel').val();
	var pattern = /^[1][3,4,5,7,8][0-9]{9}$/;
	if (!pattern.test(tel)) {
        $('.phtips').removeClass('hidden');
		return false;
	}
	$.ajax({
		url: "/api/sendConnect" + '?mobile='+tel+'&name='+specialName,
		type: "get",
		dataType: 'json',
		success: function (data) {

			$('.tips').removeClass('hidden');
            $('.specialName').val('');
            $('.specialTel').val('');
		}
	});
}

function okClose(){
	$('.tips').addClass('hidden');
}

 function phClose(){
 	$('.phtips').addClass('hidden');
 }
 function xmClose(){
 	$('.xmtips').addClass('hidden');
 }
 function rightClose(){
 	$('.righTtips').addClass('hidden');
 }
 


