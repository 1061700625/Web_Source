<?php
	header("content-type:text/html;charset=utf-8"); //设置编码

	if (($_FILES["file"]["size"] > 1024*1024*100))
	{
		echo "文件太大！";
		return;
	}
	if ($_FILES["file"]["error"] > 0)
  	{
  		echo "Error: " . $_FILES["file"]["error"] . "<br />";
  	}
	else
	{
		echo "Upload: " . $_FILES["file"]["name"] . "<br />";
		echo "Type: " . $_FILES["file"]["type"] . "<br />";
		echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
		echo "Stored in: " . $_FILES["file"]["tmp_name"];
		
		if (file_exists("../Myfiles/" . $_FILES["file"]["name"]))
      	{
      		echo $_FILES["file"]["name"] . " already exists! ";
      	}
    	else
      	{
      		move_uploaded_file($_FILES["file"]["tmp_name"] , "../Myfiles/" . $_FILES["file"]["name"]);
      		echo "Stored in: " . "../Myfiles/" . $_FILES["file"]["name"];
			header("Refresh:2;url=http://121.36.68.53/WEB/pan/php/main.php");
      	}
	}
?>
