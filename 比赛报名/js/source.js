//author: SXF          
//email:1061700625@qq.com
//date:2018/10/21
$(function(){
	$("[class^=box_font]").mouseenter(function(){
		var boxFontName = $(this).attr('class');
		$("."+boxFontName+" p").addClass("animated rubberBand");
		$("."+boxFontName).mouseout(function(){
			$("."+boxFontName+" p").removeClass("animated rubberBand");
		});
	});
});
