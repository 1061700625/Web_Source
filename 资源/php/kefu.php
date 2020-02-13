<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" />
<script src="js/jquery-2.0.3.min.js" type="text/javascript"></script>	
<script type="text/javascript">
$(document).ready(function(){
	$(".side ul li").hover(function(){
		$(this).find(".sidebox").stop().animate({"width":"124px"},200).css({"opacity":"1","filter":"Alpha(opacity=100)","background":"#ae1c1c"})	
	},function(){
		$(this).find(".sidebox").stop().animate({"width":"54px"},200).css({"opacity":"0.8","filter":"Alpha(opacity=80)","background":"#000"})	
	});
});
//回到顶部
function goTop(){
	$('html,body').animate({'scrollTop':0},600);
}
</script>
</head>
<body>
<div style="height:1000px;"></div>
<div class="side">
	<ul>
		<!-- <li><a href="#"><div class="sidebox"><img src="img/side_icon01.png">客服中心</div></a></li>
		<li><a href="#"><div class="sidebox"><img src="img/side_icon02.png">客户案例</div></a></li> -->
		<li><a href="http://wpa.qq.com/msgrd?v=3&uin=1061700625&site=qq&menu=yes" ><div class="sidebox"><img src="img/side_icon04.png">QQ联系</div></a></li>
		<!-- <li><a href="javascript:void(0);" ><div class="sidebox"><img src="img/side_icon03.png">新浪微博</div></a></li> -->
		<li style="border:none;"><a href="javascript:goTop();" class="sidetop"><img src="img/side_icon05.png"></a></li>
	</ul>
</div>
</body>
</html>