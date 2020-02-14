<?php
    $counter = intval(file_get_contents("counter.dat"));  //创建一个dat数据文件   
    $counter++;  //刷新一次+1
    $fp = fopen("counter.dat","w");  //以写入的方式，打开文件，并赋值给变量fp
    fwrite($fp, $counter);   //将变量fp的值+1
    fclose($fp);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="css/mainpage.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
		<title>NCURobot</title>
		<link rel="shortcut icon" href="favicon.ico"/>
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({
                        google_ad_client: "ca-pub-6880696451895617",
                        enable_page_level_ads: true
                     });
                </script>
	</head>
	<body>
		<div id="box_float" style="position: fixed;bottom: -20px;height: 80px;width: 100%;">
			<a style="position:absolute;top:-20px;left:20px;" href="javascript:void(0);" onclick="document.getElementById('box_float').style.display='none'">关闭</a>
			<div class="box_links">
			<p style="display:inline-block;font-family:楷体;">其它链接：</p>
				<a href="http://ncurobot.club:1024">VIP视频解析</a>
	        	<a href="http://ncurobot.club:521">云盘</a>
			</div>
			
		</div>
		
		<div class="box">
			<div class="box_title">
				<span>南昌大学机器人大赛</span>
			</div>
			<div class="box_line">
				<hr style="width: 425px;height: 1px;border: none;background-color: black;"/>
			</div>
			<div class="box_subhead">
				<span>NanChang University Robot Competition</span>
			</div>
		</div>
		<div class="arrow">
			<div class="arrow_source">
				<a href="html/sources.html"><img src="img/sourceArrow.png" /></a>
			</div>
			<div class="arrow_signup">
				<a href="html/signup.html"><img src="img/loginArrow.png" /></a>
			</div>
		</div>
        <p style="position:fixed;width:100%;color:grey;bottom:5px;left:90%;font-family:楷体;"> <?php echo "访问量：".$counter;?> </p>
		<div id="ftCon">
			<div class="ftCon-Wrapper">
				<div id="ftConw">
					<p id="lh">
						<a id="setf" href="//www.baidu.com/cache/sethelp/help.html" target="_blank">设为主页&nbsp;&nbsp;</a>
						<a href="https://www.toutiao.com/c/user/64404972564/">关于我</a>
					</p>
					<p id="cp">
						©2019&nbsp;SXF&nbsp;&nbsp;
						<img width="13" height="16" src="img/copy_rignt_24.png">
						  浙ICP备19001211号&nbsp;&nbsp;
                        <img width="20" height="20" src="img/备案图标.png">						
                        <a id="jgwab" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=33052202000281" target="_blank">
                                                  浙公网安备 33052202000281号
                         </a>
						&nbsp;
						<i class="c-icon-jgwablogo"> </i>
					</p>
				</div>
			</div>
		</div>
		<script src="https://cdn.bootcss.com/limonte-sweetalert2/7.28.5/sweetalert2.all.js"></script>
		<script src="js/mainpage.js"></script>
		<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
	    <script>
			$(function(){
				$(".box").addClass("animated bounceIn");
			});
		</script>
	</body>
</html>
