   // 移动rem适配
    (function (doc, win, undefined) {
        var docEl = doc.documentElement,
            resizeEvt = 'orientationchange' in win ? 'orientationchange' : 'resize',
            recalc = function () {
                var clientWidth = docEl.clientWidth;
                if (clientWidth === undefined) return;
                if(clientWidth >1024 ){
                    docEl.style.fontSize = 100 * (1024 / 750) + 'px';
                }
                docEl.style.fontSize = 100 * (clientWidth / 750) + 'px';//clientWidth是当前用户设备的宽度，本项目以ui给的750的图为基准，100表示1rem = 100px(为了方便计算)
                // document.body.style.height = docEl.clientHeight;
            };
        if (doc.addEventListener === undefined) return;
        win.addEventListener(resizeEvt, recalc, false);
        doc.addEventListener('DOMContentLoaded', recalc, false)
    })(document, window);
 