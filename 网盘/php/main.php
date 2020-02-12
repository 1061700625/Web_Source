<!DOCTYPE html>
<?php
	function printFile($filepath)
	{ 
		if ( is_file ( $filepath))
		{
			$filename=iconv("gb2312","utf-8",$filepath);
			echo $filename."内容如下:"."<br/>";
			$fp = fopen ( $filepath, "r" );//打开文件
			#while (! feof ( $f )) //一直输出直到文件结尾
			$i = 1;
			while ($i < 10)
			{
				$line = fgets ( $fp );
				echo $line."<br/>";
				$i = $i +1;
			}
			fclose($fp);
		}	
	}
	
	function readFileRecursive($filepath)
	{
		if (is_dir ( $filepath )) //判断是不是目录
		{
			$dirhandle = opendir ( $filepath );//打开文件夹的句柄
			if ($dirhandle) 
			{
				//判断是不是有子文件或者文件夹
				while ( ($filename = readdir ( $dirhandle ))!= false ) 		
				{
					if ($filename == "." or $filename == "..")
					{
						//echo "目录为“.”或“..”"."<br/>";
						continue;
					}
					//判断是否为目录，如果为目录递归调用函数，否则直接读取打印文件
					if(is_dir ($filepath . "/" . $filename ))
					{
						readFileRecursive($filepath . "/" . $filename);
					}
					else
					{
						//打印文件
						printFile($filepath . "/" . $filename);
						echo "<br/>";
					}
				}
				closedir ( $dirhandle );
			}
		}
		else
		{
			printFile($filepath . "/" . $filename);
			return;
		}
	}

	function Scan_Files()
	{
		$hostdir=dirname(dirname(__FILE__))."/Myfiles";
		//获取本文件目录的文件夹地址
		 $filesnames = scandir($hostdir);
		//获取也就是扫描文件夹内的文件及文件夹名存入数组 $filesnames
		foreach ($filesnames as $name) 
		{
			if ($name == "." or $name == "..")
			{
				//echo "目录为“.”或“..”"."<br/>";
				continue;
			}
			echo $name."--->"; 
			$url="../Myfiles/".$name;
			$aurl= "<a href='$url'>'$name'</a>";
			echo $aurl . "<br />";
		}
	}

?>

<?php
	if (isset($_COOKIE["SigninCookie"]))
	{
		echo '
			<html>
				<body>
					<head>
						<meta charset="UTF-8">
						<title>文件上传/下载</title>
					</head>
					<p>请勿上传文件夹,否则将无权访问!注意文件小于100MB!</p>
					<form action="upload_file.php" method="post" enctype="multipart/form-data">
						<input type="file" name="file" id="file" /> 
						<input type="submit" name="submit" value="提交" />
					</form>
					<br />
					<form action="remove_file.php" method="post" enctype="multipart/form-data">
						<input type="text" name="filename" placeholder="输入文件名后，点右边删除按钮"/>
						<input type="submit" name="removefile" value="删除" />
					</form>
					<br />
					<p>服务器上的文件(点击可下载)：</p>
		';
		Scan_Files();  
		echo '
					<br />
					<br />
					<br />
					<br />
					<hr />
					<span>更多请联系QQ 1061700625</span>
				</body>
			</html>
		';
	}
	else
	{
		header("Refresh:0;url=http://121.36.68.53/WEB/pan/"); //跳转页面
	}
  
  
?>

<!--<html>
	<body>
		<head>
			<meta charset="UTF-8">
			<title>文件上传/下载</title>
		</head>
		<p>请勿上传文件夹,否则将无权访问!注意文件小于100MB!</p>
		<form action="../php/upload_file.php" method="post" enctype="multipart/form-data">
			<input type="file" name="file" id="file" /> 
			<input type="submit" name="submit" value="提交" />
		</form>
		<br />
		<p>服务器上的文件(点击可下载)：</p>-->
		
		<!--<br />
		<br />
		<hr />
		<span>暂未添加 删除 功能，需要请联系QQ 1061700625</span>
	</body>
</html>-->


