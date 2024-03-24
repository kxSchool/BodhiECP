
var check = 0;//该变量是记录当前选择的评分
var time = 0;//该变量是统计用户评价的次数，这个是我的业务要求统计的（改变评分不超过三次），可以忽略

/*over()是鼠标移过事件的处理方法*/
function over(param){
	if(param == 1){
		$("#star1").attr("src","/public/images/common/startRed.png");
		//第一颗星星亮起来，下面以此类推
	}else if(param == 2){
		$("#star1").attr("src","/public/images/common/startRed.png");
		$("#star2").attr("src","/public/images/common/startRed.png");
	
	}else if(param == 3){
		$("#star1").attr("src","/public/images/common/startRed.png");
		$("#star2").attr("src","/public/images/common/startRed.png");
		$("#star3").attr("src","/public/images/common/startRed.png");
	
	}else if(param == 4){
		$("#star1").attr("src","/public/images/common/startRed.png");
		$("#star2").attr("src","/public/images/common/startRed.png");
		$("#star3").attr("src","/public/images/common/startRed.png");
		$("#star4").attr("src","/public/images/common/startRed.png");
	
	}else if(param == 5){
		$("#star1").attr("src","/public/images/common/startRed.png");
		$("#star2").attr("src","/public/images/common/startRed.png");
		$("#star3").attr("src","/public/images/common/startRed.png");
		$("#star4").attr("src","/public/images/common/startRed.png");
		$("#star5").attr("src","/public/images/common/startRed.png");
	
	}
	if(param == 6){
		$("#star6").attr("src","/public/images/common/startRed.png");//第一颗星星亮起来，下面以此类推
	}else if(param == 7){
		$("#star6").attr("src","/public/images/common/startRed.png");
		$("#star7").attr("src","/public/images/common/startRed.png");
	}else if(param == 8){
		$("#star6").attr("src","/public/images/common/startRed.png");
		$("#star7").attr("src","/public/images/common/startRed.png");
		$("#star8").attr("src","/public/images/common/startRed.png");
	}else if(param == 9){
		$("#star6").attr("src","/public/images/common/startRed.png");
		$("#star7").attr("src","/public/images/common/startRed.png");
		$("#star8").attr("src","/public/images/common/startRed.png");
		$("#star9").attr("src","/public/images/common/startRed.png");
	}else if(param == 10){
		$("#star6").attr("src","/public/images/common/startRed.png");
		$("#star7").attr("src","/public/images/common/startRed.png");
		$("#star8").attr("src","/public/images/common/startRed.png");
		$("#star9").attr("src","/public/images/common/startRed.png");
		$("#star10").attr("src","/public/images/common/startRed.png");
	}

	if(param == 11){
	 
		$("#star11").attr("src","/public/images/common/startRed.png");//第一颗星星亮起来，下面以此类推
	}else if(param == 12){
	 
		$("#star11").attr("src","/public/images/common/startRed.png");
		$("#star12").attr("src","/public/images/common/startRed.png");
	}else if(param == 13){
		 
		$("#star11").attr("src","/public/images/common/startRed.png");
		$("#star12").attr("src","/public/images/common/startRed.png");
		$("#star13").attr("src","/public/images/common/startRed.png");
	}else if(param == 14){
	 
		$("#star11").attr("src","/public/images/common/startRed.png");
		$("#star12").attr("src","/public/images/common/startRed.png");
		$("#star13").attr("src","/public/images/common/startRed.png");
		$("#star14").attr("src","/public/images/common/startRed.png");
	}else if(param == 15){
	 
		$("#star11").attr("src","/public/images/common/startRed.png");
		$("#star12").attr("src","/public/images/common/startRed.png");
		$("#star13").attr("src","/public/images/common/startRed.png");
		$("#star14").attr("src","/public/images/common/startRed.png");
		$("#star15").attr("src","/public/images/common/startRed.png");
	}
}
/*out 方法是鼠标移除事件的处理方法，当鼠标移出时，恢复到我的打分情况*/
function out(){
	if(check == 1){//打分是1，设置第一颗星星亮，其他星星暗，其他情况以此类推
		$("#star1").attr("src","/public/images/common/startRed.png");
		$("#star2").attr("src","/public/images/common/startg.png");
		$("#star3").attr("src","/public/images/common/startg.png");
		$("#star4").attr("src","/public/images/common/startg.png");
		$("#star5").attr("src","/public/images/common/startg.png");
	}else if(check == 2){
		$("#star1").attr("src","/public/images/common/startRed.png");
		$("#star2").attr("src","/public/images/common/startRed.png");
		$("#star3").attr("src","/public/images/common/startg.png");
		$("#star4").attr("src","/public/images/common/startg.png");
		$("#star5").attr("src","/public/images/common/startg.png");
	}else if(check == 3){
		$("#star1").attr("src","/public/images/common/startRed.png");
		$("#star2").attr("src","/public/images/common/startRed.png");
		$("#star3").attr("src","/public/images/common/startRed.png");
		$("#star4").attr("src","/public/images/common/startg.png");
		$("#star5").attr("src","/public/images/common/startg.png");
	}else if(check == 4){
		$("#star1").attr("src","/public/images/common/startRed.png");
		$("#star2").attr("src","/public/images/common/startRed.png");
		$("#star3").attr("src","/public/images/common/startRed.png");
		$("#star4").attr("src","/public/images/common/startRed.png");
		$("#star5").attr("src","/public/images/common/startg.png");
	}else if(check == 5){
		$("#star1").attr("src","/public/images/common/startRed.png");
		$("#star2").attr("src","/public/images/common/startRed.png");
		$("#star3").attr("src","/public/images/common/startRed.png");
		$("#star4").attr("src","/public/images/common/startRed.png");
		$("#star5").attr("src","/public/images/common/startRed.png");
	}else if(check == 0){
		$("#star1").attr("src","/public/images/common/startg.png");
		$("#star2").attr("src","/public/images/common/startg.png");
		$("#star3").attr("src","/public/images/common/startg.png");
		$("#star4").attr("src","/public/images/common/startg.png");
		$("#star5").attr("src","/public/images/common/startg.png");
	}

	if(check == 6){//打分是1，设置第一颗星星亮，其他星星暗，其他情况以此类推
		$("#star6").attr("src","/public/images/common/startRed.png");
		$("#star7").attr("src","/public/images/common/startg.png");
		$("#star8").attr("src","/public/images/common/startg.png");
		$("#star9").attr("src","/public/images/common/startg.png");
		$("#star10").attr("src","/public/images/common/startg.png");
	}else if(check == 7){
		$("#star6").attr("src","/public/images/common/startRed.png");
		$("#star7").attr("src","/public/images/common/startRed.png");
		$("#star8").attr("src","/public/images/common/startg.png");
		$("#star9").attr("src","/public/images/common/startg.png");
		$("#star10").attr("src","/public/images/common/startg.png");
	}else if(check == 8){
		$("#star6").attr("src","/public/images/common/startRed.png");
		$("#star7").attr("src","/public/images/common/startRed.png");
		$("#star8").attr("src","/public/images/common/startRed.png");
		$("#star9").attr("src","/public/images/common/startg.png");
		$("#star10").attr("src","/public/images/common/startg.png");
	}else if(check == 9){
		$("#star6").attr("src","/public/images/common/startRed.png");
		$("#star7").attr("src","/public/images/common/startRed.png");
		$("#star8").attr("src","/public/images/common/startRed.png");
		$("#star9").attr("src","/public/images/common/startRed.png");
		$("#star10").attr("src","/public/images/common/startg.png");
	}else if(check == 10){
		$("#star6").attr("src","/public/images/common/startRed.png");
		$("#star7").attr("src","/public/images/common/startRed.png");
		$("#star8").attr("src","/public/images/common/startRed.png");
		$("#star9").attr("src","/public/images/common/startRed.png");
		$("#star10").attr("src","/public/images/common/startRed.png");
	}else if(check == 0){
		$("#star6").attr("src","/public/images/common/startg.png");
		$("#star7").attr("src","/public/images/common/startg.png");
		$("#star8").attr("src","/public/images/common/startg.png");
		$("#star9").attr("src","/public/images/common/startg.png");
		$("#star10").attr("src","/public/images/common/startg.png");
	}
	if(check == 11){//打分是1，设置第一颗星星亮，其他星星暗，其他情况以此类推
		$("#star11").attr("src","/public/images/common/startRed.png");
		$("#star12").attr("src","/public/images/common/startg.png");
		$("#star13").attr("src","/public/images/common/startg.png");
		$("#star14").attr("src","/public/images/common/startg.png");
		$("#star15").attr("src","/public/images/common/startg.png");
	}else if(check == 12){
		$("#star11").attr("src","/public/images/common/startRed.png");
		$("#star12").attr("src","/public/images/common/startRed.png");
		$("#star13").attr("src","/public/images/common/startg.png");
		$("#star14").attr("src","/public/images/common/startg.png");
		$("#star15").attr("src","/public/images/common/startg.png");
	}else if(check == 13){
		$("#star11").attr("src","/public/images/common/startRed.png");
		$("#star12").attr("src","/public/images/common/startRed.png");
		$("#star13").attr("src","/public/images/common/startRed.png");
		$("#star14").attr("src","/public/images/common/startg.png");
		$("#star15").attr("src","/public/images/common/startg.png");
	}else if(check == 14){
		$("#star11").attr("src","/public/images/common/startRed.png");
		$("#star12").attr("src","/public/images/common/startRed.png");
		$("#star13").attr("src","/public/images/common/startRed.png");
		$("#star14").attr("src","/public/images/common/startRed.png");
		$("#star15").attr("src","/public/images/common/startg.png");
	}else if(check == 15){
		$("#star11").attr("src","/public/images/common/startRed.png");
		$("#star12").attr("src","/public/images/common/startRed.png");
		$("#star13").attr("src","/public/images/common/startRed.png");
		$("#star14").attr("src","/public/images/common/startRed.png");
		$("#star15").attr("src","/public/images/common/startRed.png");
	}else if(check == 0){
		$("#star11").attr("src","/public/images/common/startg.png");
		$("#star12").attr("src","/public/images/common/startg.png");
		$("#star13").attr("src","/public/images/common/startg.png");
		$("#star14").attr("src","/public/images/common/startg.png");
		$("#star15").attr("src","/public/images/common/startg.png");
	}
}
/*click()点击事件处理，记录打分*/
function click(param){
	time++;//记录打分次数
	check = param;//记录当前打分
	var professional = $("#professional").val();
    var attitude = $("#attitude").val();
    var effect = $("#effect").val();
	if(param>0 && param<=5){
        professional = param;
	}else if(param>5 && param<=10){
        attitude = param - 5;
	}else if(param>10 && param<=15) {
        effect = param - 10;
	}

    $("#attitude").val(attitude);
    $("#effect").val(effect);
    $("#professional").val(professional);
	out();//设置星星数
}
$(function(){
	$('.tips').find('span').on('click',function(){
		var $this = $(this);
		if($this.hasClass('active')){
			$this.removeClass('active');
		}else{
			$this.addClass('active');
		}
	})
	$('.assess-submit').on('click',function(){
		var ids = '';
		$('.tips').find('span').each(function () {
			if ($(this).hasClass('active')) {
				ids += $(this).attr('data-id') + ',';
			}
		});
		$('#tags').val(ids);
		$('#form').submit();
	})

});
