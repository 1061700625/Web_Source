//author: SXF          
//email:1061700625@qq.com
//date:2018/10/21
window.onload = function(){
	var sUserAgent = navigator.userAgent;
    if (sUserAgent.indexOf('Android') > -1 || sUserAgent.indexOf('iPhone') > -1 || sUserAgent.indexOf('iPad') > -1 || sUserAgent.indexOf('iPod') > -1 || sUserAgent.indexOf('Symbian') > -1) {
        swal({
		  title: '( ๑ŏ ﹏ ŏ๑ )',
		  html: $('<div>')
		    .addClass('some-class')
		    .text('请使用横屏或强烈建议PC端访问！'),
		  animation: false,
		  customClass: 'animated flipInX'
		})
    }
}

