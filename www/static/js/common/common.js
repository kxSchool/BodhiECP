var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?f81c3d70e303f159df1da82e750fd910";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();



// 判断是否是手机端浏览器
function getBrowser(){
    var ua = navigator.userAgent.toLowerCase();
    var btypeInfo = (ua.match( /firefox|chrome|safari|opera/g ) || "other")[ 0 ];
    if( (ua.match( /msie|trident/g ) || [] )[ 0 ] )
    {
        btypeInfo = "msie";
    }
    var pc = "";
    var prefix = "";
    var plat = "";
    //如果没有触摸事件 判定为PC
    var isTocuh = ("ontouchstart" in window) || (ua.indexOf( "touch" ) !== -1) || (ua.indexOf( "mobile" ) !== -1);
    if( isTocuh )
    {
        if( ua.indexOf( "ipad" ) !== -1 )
        {
            pc = "pad";
        } else if( ua.indexOf( "mobile" ) !== -1 )
        {
            pc = "mobile";
        } else if( ua.indexOf( "android" ) !== -1 )
        {
            pc = "androidPad";
        } else
        {
            pc = "pc";
        }
    } else
    {
        pc = "pc";
    }
    switch( btypeInfo )
    {
        case "chrome":
        case "safari":
        case "mobile":
            prefix = "webkit";
            break;
        case "msie":
            prefix = "ms";
            break;
        case "firefox":
            prefix = "Moz";
            break;
        case "opera":
            prefix = "O";
            break;
        default:
            prefix = "webkit";
            break
    }
    plat = (ua.indexOf( "android" ) > 0) ? "android" : navigator.platform.toLowerCase();
    return {
        version: (ua.match( /[\s\S]+(?:rv|it|ra|ie)[\/: ]([\d.]+)/ ) || [])[ 1 ],     //版本
        plat: plat,                   //系统
        type: btypeInfo,              //浏览器
        pc: pc,
        prefix: prefix,                //前缀
        isMobile: (pc == "pc") ? false : true              //是否是移动端
    };
};