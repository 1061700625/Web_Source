<?php

// 设置跨域头
header('Access-Control-Allow-Origin:*');

header('Access-Control-Allow-Methods:POST');

header("content-type:text/html;charset=utf-8"); //设置编码


$info = $_FILES['file']['name'];//得到文件的名称
$temp = explode('.', $info);//用.分割数组
$bintype = end($temp);//取数组的最后一个
$filetype = ['bin', 'jpge', 'png'];//定义图片类型

// 简单的判断文件类型（后缀）
//in_array()判断是否存在一个数组中的数据 第一个参数是数据第二个参数是数组
if(!in_array($bintype,$filetype)){
    echo "<script>alert('文件类型出错')</script>";
	header("Refresh:0;url=http://121.36.68.53/WEB/ESP32/");
	die();
}
	// 简单的判断文件大小
	if (($_FILES["file"]["size"] > 1024*1024*100))
	{
		echo "<script>alert('文件太大！')</script>";
		header("Refresh:0;url=http://121.36.68.53/WEB/ESP32/");
		die();
	}
	// 简单的判断文件类型
	// else if ($_FILES["file"]["type"] != "bin")
	// {
	// 	echo $_FILES["file"]["type"];
	// 	echo "<script>alert('不是bin文件！')</script>";
	// 	header("Refresh:0;url=http://39.108.215.43/");
	// 	die();
	// }
	else if ($_FILES["file"]["error"] > 0)
  	{
  		echo "<script>alert('文件上传错误！')</script>";
  		header("Refresh:0;url=http://121.36.68.53/WEB/ESP32/");
  		die();
  	}
	else
	{
		echo "Upload: " . $_FILES["file"]["name"] . "<br />";
		echo "Type: " . $_FILES["file"]["type"] . "<br />";
		echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
		echo "Stored in: " . $_FILES["file"]["tmp_name"];
		
		if (file_exists("../" . $_FILES["file"]["name"]))
      	{
      		echo $_FILES["file"]["name"] . " already exists! ";
			unlink("../" . $_FILES["file"]["name"]);
      	}
		move_uploaded_file($_FILES["file"]["tmp_name"] , "../" . $_FILES["file"]["name"]);
		echo "Stored in: " . "../" . $_FILES["file"]["name"];
		echo "<script>alert('上传成功！')</script>";
		header("Refresh:2;url=http://121.36.68.53/WEB/ESP32/");
		die();
	}
?>
