<!DOCTYPE html>
<html>
	<head>
		<?php include './main/php/header.php'; ?>
		<link rel="stylesheet" href="index.css">
		<link rel="stylesheet" href="css/style.css" type="text/css" />
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script type="text/javascript">
		    $(document).ready(function() {
		        var w = $(window).width();
		        var h = $(document).height();
				var x = parseInt((w/2 - 380)).toString()+"px";
				$(".title").css("left",x);
				$(".box").css("left",x);
				$("iframe").css("width",parseInt((w/2 - 380)-20).toString()+"px");
				
				swal({
				  title: "欢迎加入网盘小组，链接不失效",
				  text: "https://pan.baidu.com/mbox/homepage?short=btxUp2J",
				  icon: "success",
				  button: "好的",
				});
		    })
		</script>
	</head>
	<body>
		<?php
			if (isset($_COOKIE["User"]))
			{
				echo '<a href="#" class="logstate">已登录</a>';
			}
			else if(!isset($_COOKIE["User"]))
			{
				echo '<a href="./login/login.php" class="logstate">登录</a>';
				echo '<a href="./login/signup.php" class="logstate">注册</a>';	
			}
		?>
		<?php include 'body.php';?>
		
		<!-- <iframe src="./php/danmu.php" frameborder="0" style="position: fixed;width: 98%;height: 80%;top:10px;left: 10px;">
		</iframe> -->
		<?php include 'php/kefu.php';?>
		
		<?php include './main/canvas.plugs';?>
		
		
	</body>
</html>
