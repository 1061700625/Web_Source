<?php
	header("content-type:text/html;charset=utf-8"); //设置编码	
	header( "Access-Control-Allow-Origin:*");
	header('Access-Control-Allow-Methods:POST');  
	header('Access-Control-Allow-Headers:x-requested-with,content-type');	
	
	$speed = $_REQUEST["speed"];
	$heading = $_REQUEST["heading"];
	$addresses = $_REQUEST["addresses"];
	$flag = $_REQUEST["$flag"];
	$time = time();
	
	if($addresses == 'undefined' || $addresses == '')
	{
		$ip = $_SERVER['REMOTE_ADDR'];   //获取ip地址
		$html = file_get_contents('http://ip.taobao.com/service/getIpInfo.php?ip='.$ip);  //通过ip查询位置
		$city = json_decode($html,$assoc=true)["data"]["city"];
                $region = json_decode($html,$assoc=true)["data"]["region"];
                $isp = json_decode($html,$assoc=true)["data"]["isp"];
		$addresses = $region.$city.$isp;
	}
	
	
	$dbhost = 'localhost'; // mysql服务器主机地址 
	$dbuser = 'root'; // mysql用户名 
	$dbpass = ''; // mysql用户名密码 
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass); 
	if(! $conn ) 
	{ 
		die("数据库连接失败:". mysqli_error($conn)); 
	} 
	// 设置编码，防止中文乱码 
	mysqli_query($conn , "set names utf8"); 
	$sql = 'select * FROM Position'; 
	mysqli_select_db( $conn, 'Location' ); 
	$retval = mysqli_query( $conn, $sql ); 
	if(! $retval ) 
	{ 
		die("无法打开数据表:". mysqli_error($conn)); 
	}
	
	$sql = "insert into Position (speed,heading,addresses,date)values('$speed','$heading','$addresses','$time');";
	$retval = mysqli_query( $conn, $sql );
	if(! $retval )
	{
		die("数据插入失败:". mysqli_error($conn)); 
	}
	echo "数据插入成功\n";
	
	mysqli_close($conn);
?>
