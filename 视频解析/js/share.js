(function ($) {
    var ms = {
        init:function(obj,args){
            return (function(){
                ms.fillHtml(obj,args);
                ms.bindEvent(obj,args);
            })();
        },
        //填充html
        fillHtml:function(obj,args){
            return (function(){
                var layerHtml = "";
                if (args.Shade == true) {
                    layerHtml += '<div class="share_layer_shade"></div>';
                }
                layerHtml += '<div class="share_layer_box" id="layer_' + args.Content + '">';
                layerHtml += '<h3><b class="text">' + args.Title + '</b><a class="close"></a></h3>';
                layerHtml += '<div class="layer_content">';
                layerHtml += '<div id="' + args.Content + '"><ul>';
                layerHtml += '<li title="分享到QQ空间"><a class="share-qq"></a><span></span></li>';
                layerHtml += '<li title="分享到新浪微博"><a class="share-xl-weiBo"></a><span></span></li>';
                layerHtml += '<li title="分享到人人网"><a class="share-people"</a><span></span></li>';
                layerHtml += '<li title="分享到腾讯微博"><a class="share-tx-weiBo"></a><span></span></li>';
                layerHtml += '<li title="分享到微信" class="share-code"><a class="share-tx-weChat"></a><span></span>';


                layerHtml += '<div id="layerWxcode" class="towdimcodelayer js-transition">'+
                                '<div class="arrow js-arrow-up"></div>' +
                                '<div class="layerbd">' +
                                    '<div class="codebg">' +
                                        '<img id="xtag" src="">' +
                                    '</div>' +
                                    '<div class="codettl">打开微信扫一扫</div>' +
                                '</div>' +
                             '</div>';
                layerHtml += '</li></ul></div></div></div></div>';
                $('body').prepend(layerHtml);
            })();
        },
        //绑定事件
        bindEvent:function(obj,args){
            return (function(){
                var $shareLayerBox = $('.share_layer_box');
                var $shareLayerShade = $('.share_layer_shade');
                var $ShareLi = $('#Share li');

                if (args.Event == "unload") {
                    $('#layer_' + args.Content).animate({
                        opacity: 'show',
                        marginTop: '-30%'
                    }, "slow", function () {
                        $($shareLayerShade).show();
                    });
                } else {
                    $(obj).on(args.Event, function () {
                        $('#layer_' + args.Content).animate({
                            opacity: 'show',
                            marginTop: '0'
                        }, "slow", function () {
                            $($shareLayerShade).show();
                        });
                    });
                }


                $($ShareLi).each(function () {
                    $(this).hover(function () {
                        $(this).find('a').animate({marginTop: 2}, 'easeInOutExpo');
                        $(this).find('span').animate({opacity: 0.2}, 'easeInOutExpo');
                    }, function () {
                        $(this).find('a').animate({marginTop: 12}, 'easeInOutExpo');
                        $(this).find('span').animate({opacity: 1}, 'easeInOutExpo');
                    });
                });

                $('.share_layer_box .close').on('click', function () {
                    $($shareLayerBox).animate({
                        opacity: 'hide',
                        marginTop: '-30%'
                    }, "slow", function () {
                        $($shareLayerShade).hide();
                    });
                });

                var share_url = encodeURIComponent(location.href);
                var share_title = encodeURIComponent(document.title);

                //qq空间
                $($ShareLi).find('a.share-qq').on('click', function () {
                    window.open("http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=" + share_url + "&title=" + share_title , "newwindow");
                });

                //新浪微博
                $($ShareLi).find('a.share-xl-weiBo').on('click', function () {
                    var param = {
                        url: share_url,
                        title: share_title,
                        rnd: new Date().valueOf()
                    };
                    var temp = [];
                    for (var p in param) {
                        temp.push(p + '=' + encodeURIComponent(param[p] || ''))
                    }
                    window.open('http://v.t.sina.com.cn/share/share.php?' + temp.join('&'));
                });

                //人人
                $($ShareLi).find('a.share-people').on('click', function () {
                    window.open('http://widget.renren.com/dialog/share?resourceUrl=' + share_url + '&title=' + share_title + '&images=' + '', 'newwindow');
                });

                //腾讯微博
                $($ShareLi).find('a.share-tx-weiBo').on('click', function () {
                    window.open('http://share.v.t.qq.com/index.php?c=share&a=index&title=' + share_title + '&url=' + share_url + '', 'newwindow');
                });

                // 微信
                $('.share-code').mouseover(function () {
                    $('#layerWxcode').addClass('js-show-up');
                    $('#xtag').attr('src','http://sc.chinaz.com/Files/pic/indexpic/newjiaoben4.jpg');
                }).mouseout(function () {
                    $('#layerWxcode').toggleClass('js-show-up');
                });
            })();
        }
    };
    $.fn.shareConfig = function (options) {
        var args = $.extend({
            Shade: true,
            Event: "click",
            Content: "Share",
            Title: "分享"
        },options);
        ms.init(this, args);
    };
})(jQuery);
