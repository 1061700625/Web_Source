<?php
	header("content-type:text/html;charset=utf-8"); //设置编码

	$filename = $_POST["filename"];
	$url="../Myfiles/".$filename;
	if(is_file($url))
	{
		$res = unlink($url);
		if($res)
		{
			echo '>> 删除成功！';
		}
		else
		{
			echo '>> 删除失败！';
		}
		header("Refresh:2;url=http://121.36.68.53/WEB/pan/php/main.php"); //跳转页面
	}
	else
  	{
  		echo ">> 文件不存在:" . $url;
		header("Refresh:2;url=http://121.36.68.53/WEB/pan/php/main.php");
  	}
?>
