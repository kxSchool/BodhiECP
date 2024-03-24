$(function() {
	relevant();
	// 选择需要的产品类型
	function selectedproductsalesattr(productrelateid, productsales_attrid) {
		if(!_flag) {
			return false;
		}
		var ismultiselect = $("#product-relate-" + productrelateid).attr('data-ismultiselect');
		// 单选
		if(1 == ismultiselect) {
			if(false == $("#product-sales_attr-" + productsales_attrid).hasClass('active')) {
				// 移除之前先获取当前选中的类型的价格
				var qsaleprice = $("#product-relate-" + productrelateid + " .active").attr('data-saleprice');

				$("#product-relate-" + productrelateid + " li").removeClass('active');
				$("#product-sales_attr-" + productsales_attrid).addClass('active');

				// 添加产品类型
				addproductsalesattr(productrelateid, productsales_attrid, ismultiselect, qsaleprice);
			} else {
				$("#product-sales_attr-" + productsales_attrid).removeClass('active');

				// 移除产品类型
				removeproductsalesattr(productrelateid, productsales_attrid, ismultiselect);
			}
		} else {
			if(false == $("#product-sales_attr-" + productsales_attrid).hasClass('active')) {
				$("#product-sales_attr-" + productsales_attrid).addClass('active');

				// 添加产品类型
				addproductsalesattr(productrelateid, productsales_attrid, ismultiselect);
			} else {
				$("#product-sales_attr-" + productsales_attrid).removeClass('active');

				// 移除产品类型
				removeproductsalesattr(productrelateid, productsales_attrid, ismultiselect);
			}
		}
	}

    function relevant() {
        var gid = $('#goods_id').val();
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
                    $('#relevant').append(str);
                }
            }
        });
    }
});