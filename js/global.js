/**
 * @file js文件
 * @author cgzero(cgzero@me.com)
 * @date 2014-05-29
 */
$(document).ready(function () {
    // 图片跑马灯
    $('#img-carousel').flexslider({
        animation: "slide",
        animationLoop: false,
        itemWidth: 220,
        controlNav: false,
        itemMargin: 5
    });
});

