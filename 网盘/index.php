<?php
    $counter = intval(file_get_contents("counter.dat"));  //创建一个dat数据文件   
    $counter ++;  //刷新一次+1
    $fp = fopen("counter.dat","w");  //以写入的方式，打开文件，并赋值给变量fp
    fwrite($fp, $counter);   //将变量fp的值+1
    fclose($fp);
?>


<!Doctype html>
<html lang="zh">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="SXF">
<title>欢迎!</title>

<link rel="stylesheet" type="text/css" href="css/styles.css">
<style type="text/css">
body,td,th { font-family: "Source Sans Pro", sans-serif; }
body { background-color: #2B2B2B; }
</style>
</head>
<script>
   function Load()
    {  
      alert("开通账户请联系QQ1061700625~");
    }
    
  </script>
<body  onload="Load()">
<div class="wrapper">

	<div class="container">
		<h1>Welcome</h1>
		<form class="form" action="php/signin.php" method="post">
			<input type="text" placeholder="Username" name="userName">
			<input type="password" placeholder="Password" name="userPassword">
			<button type="submit" id="login-button">登陆</button>
			<button type="submit" formnovalidate="formnovalidate" formaction="php/signup.php" >注 册</button>
		</form>
		<p style="color:white;padding-top:50px;font-family:楷体;"> <?php echo "访问量：".$counter;?> </p>
	</div>

	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
	
</div>

<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>

<script src="https://cdn.bootcss.com/limonte-sweetalert2/7.28.5/sweetalert2.all.js"></script>
<script src="../js/login.js"></script>
</body>
</html>



