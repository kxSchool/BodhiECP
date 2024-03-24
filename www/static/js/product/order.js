$(function() {
 
	//切换内容的js
	$('.js-order-tab').find('a').on('click', function() {

		var $this = $(this);
		$this.parent().addClass('active').siblings().removeClass('active');
		var _id = $this.attr('data-id');
		$('.js-tab-' + _id).removeClass('hidden').siblings().addClass('hidden');
	})
	
});
function evaluatelist(e){
    var orderModel = " ";
     orderModel  += '<table><thead><tr><th width="310">商品</th><th>数量</th><th>实付款</th><th>交易状态</th><th width="167">操作</th></tr></thead>';
	$.ajax({
		url: 'https://www.kxschool.com/api/getOrderList?type='+e+'',
		type: "POST",
		//1表示待付款  2表示已付款
		data: {type: e},
		dataType:'json',
		success: function(data) {
            var data=data.data;
			for (var i = 0; i < data.order_goods.length; i++) {
				var orderList=data.order_goods[i].goods_list;
                 orderModel += '<tbody><tr class="body-head">' +
						'<td colspan="7" class="text-left">' +
						'<span class="">2018-04-23</span>'+
							'<span>订单号:'+data.order_goods[i].order_sn+'</span>' +
						'</td>' +
					'</tr>';
				for (var j = 0; j < data.order_goods[i].goods_list.length; j++) {
				   
				orderModel += '<tr>' +
					'<td class="b-l-n" style="text-align: left; padding-left: 20px">'+
						'<div class="order-info">' +
					'<div class="order-right">' +
					'<p>' + '<a class="order-company">'+data.order_goods[i].goods_list[j].goods_name+'</a>' + '</p>'+
						'<p>地区:<a>'+data.order_goods[i].address+'</a></p>' +
					'</div></div></td><td>'+data.order_goods[i].goods_list[j].goods_count+' </td>'+
						'<td class="body-fee">¥'+data.order_goods[i].goods_list[j].goods_price+' <br>（优惠：¥0）</td><td class="waiting">未付款 </td>'
                        if(j == 0){
                           orderModel += '<td rowspan='+data.order_goods[i].goods_list.length+' class="body-btn b-r-n">'
                           if(data.order_goods[i].order_status == 0){
							orderModel += '<a href="" class="pay">去付款</a>'
    						}
    						else if(data.order_goods[i].order_status == 1){
    							orderModel += '<a href="" class="pay">查看进度</a>'
    						}
    						else if(data.order_goods[i].order_status == 5){
    							orderModel += '<a href="" class="pay">去评价</a>'
    						}
                        }  
						orderModel += '</td>'
				}
                orderModel += '</tr><tr class="white-space"><th></th></tr></tbody>'
			}
  	         orderModel += '</table>'
            console.log(orderModel)
			$('.js-tab-'+e+'').append(orderModel);
		}
	})
}