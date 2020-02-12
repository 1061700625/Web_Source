<?php
	setrawcookie("SigninCookie","Signin", time()+3600*2);
	
	header("content-type:text/html;charset=utf-8"); //设置编码
	echo "<script src='https://cdn.bootcss.com/limonte-sweetalert2/7.28.5/sweetalert2.all.js'></script>";	
    $username = $_POST["userName"]; 
    $password = $_POST["userPassword"];
	
	echo "正在检查数据库状态，请稍候...... <br/>";
	$ip = $_SERVER['REMOTE_ADDR'];   //获取ip地址
	$html = file_get_contents('http://ip.taobao.com/service/getIpInfo.php?ip='.$ip);  //通过ip查询位置
	$city = json_decode($html,$assoc=true)["data"]["city"];
	$time = time();
	
	$dbhost = 'localhost'; // mysql服务器主机地址 
	$dbuser = 'root'; // mysql用户名 
	$dbpass = ''; // mysql用户名密码 
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass); 
	if(! $conn ) 
	{ 
	//	die('连接失败: ' . mysqli_error($conn)); 
		echo "<script>sweetAlert('哎呦……','连接失败,数据库的问题、','error')</script>";
	} 
	// 设置编码，防止中文乱码 
	mysqli_query($conn , "set names utf8"); 
	$sql = 'select * FROM pan;'; 
	mysqli_select_db( $conn, 'PAN' ); 
	$retval = mysqli_query( $conn, $sql ); 
	if(! $retval ) 
	{ 
		//die('无法读取数据: ' . mysqli_error($conn)); 
		echo "<script>sweetAlert('哎呦……','无法读取数据,数据库的问题、','error')</script>";
	}
	echo "数据库连接检查完毕! <br />";
	
	
	$sql = "select * from pan where username='$username' and password='$password';";
	$retval = mysqli_query( $conn, $sql );
	$row = mysqli_fetch_array($retval);

	if($row)
	{
		echo "<script>sweetAlert('哟吼~','登陆成功!','success')</script>";
		
		header("Refresh:2;url=http://121.36.68.53/WEB/pan/php/main.php"); //跳转页面
	}
	else
	{
		setrawcookie("SigninCookie","Signin", time()-3600*2);
		echo "<script>sweetAlert('哎呦……','登陆失败，2s后将自动返回!','error')</script>";
		header("Refresh:2;url=http://121.36.68.53/WEB/pan/"); //跳转页面
	}
	
?>







