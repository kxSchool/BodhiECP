
function removeNum(e)
{
    var $this = $(e);
    var $input = $this.siblings('.js-num-display');
    var num = parseInt($input.val());
    var order_id = $('#order_id').val();
    var goods_id = parseInt($input.data('id'));

    num = num - 1;
    if(num < 1){
        num = 1;return;
    }
    $input.val(num);
    getGoodsPrice(order_id,goods_id,num,$input)

}
function addNum(e) {
    var $this = $(e);
    var $input = $this.siblings('.js-num-display');
    var num = parseInt($input.val());
    var order_id = $('#order_id').val();
    var goods_id = parseInt($input.data('id'));
    num = num + 1;
    if(num > 45){
        num = 45;
        return;
    }
    $input.val(num);
    getGoodsPrice(order_id,goods_id,num,$input)
}
function checkNum(e)
{
    var $this = $(e);

    var num = parseInt($this.val());
    var goods_id = parseInt($this.data('id'));
    var order_id = $('#order_id').val();
    if(num < 1){
        $this.val(1);
        num = 1;
    }else if(num > 45){
        $this.val(45);
        num = 45;
    }
    getGoodsPrice(order_id,goods_id,num,$this)
}

function getGoodsPrice(order_id,goods_id,num,e) {

    $.ajax({
        data : {oid:order_id,gid:goods_id,num:num},
        url : '/api/changeOrder',
        dataType : 'JSON',
        type : 'POST',
        success : function (res) {
            $(e.attr('data-totalprice-td')).attr('data-saleprice',res.price);
            $(e.attr('data-totalprice-td')).html(res.price+'元');
            totalPrice();
        }
    });
}

function totalPrice() {
    var total = 0;
    $('.js-sku-totalprice').each(function () {
        var saleprice = $(this).attr('data-saleprice');
        total += parseInt(parseFloat(saleprice) * 100);
    });
    TOTAL_PRICE = total / 100;
    //$('.js-price-total').html('￥' + TOTAL_PRICE);
    $('.js-price-total').html(TOTAL_PRICE + '元');
}

