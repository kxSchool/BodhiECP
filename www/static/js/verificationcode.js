'use strict';

/**
 * 按钮上需要添加的属性：
 * data-mobile : 必填，要发送的手机号选择器（如：#mobile、.js-mobile），如果值等于loginuser，则取当前登录账户的手机号
 * data-imgcode : 必填，图片验证码选择器（如：#mobile、.js-mobile），如果值等于noimgcode，则不需要验证图片验证码
 * data-sendtype : 非必填，自定义发送类型（如：#mobile、.js-mobile）
 *
 */
define(['jquery'], function ($) {
    function initSendCodeBtn(btn, ext) {
        var canSend = true;
        var $btn = $(btn);
        $btn.click(function () {
            var _this = $(this);
            var mobile = $(_this.attr('data-mobile')).length > 0 ? $(_this.attr('data-mobile')).val() : _this.attr('data-mobile');
            var imgcode = $(_this.attr('data-imgcode')).length > 0 ? $(_this.attr('data-imgcode')).val() : _this.attr('data-imgcode');
            var sendtype = _this.attr('data-sendtype') || '';
            var data = {
                mobile: mobile,
                imgcode: imgcode,
                sendtype: sendtype
            };
            ext = ext || {};
            data = $.extend(data, ext);
            if (!canSend) {
                return;
            }
            canSend = false;
            $.post("/index/common/verificationcode", data, function (result) {
                canSend = true;
                if (result.code == 200) {
                    $btn.addClass('down');
                    // 发送成功
                    var setTime;
                    $(document).ready(function () {
                        var time = 60;
                        setTime = setInterval(function () {
                            if (time <= 0) {
                                _this.text('重新发送');
                                _this.attr('disabled', false);
                                clearInterval(setTime);
                                $btn.removeClass('down');
                                return;
                            }
                            time--;
                            _this.text(time + 's后重发');
                            _this.attr('disabled', 'disabled');
                        }, 1000);
                    });
                } else {
                    alert(result.msg, 1);
                }
                return false;
            }, 'JSON');
        });
    }

    return window.init = {
        initSendCodeBtn: initSendCodeBtn
    };
});