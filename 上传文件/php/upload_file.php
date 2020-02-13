<?php
	header("content-type:text/html;charset=utf-8"); //设置编码

	if (($_FILES["file"]["size"] > 1024*1024*100))
	{
		echo "文件太大！";
		return;
	}
	if (!$_FILES["file"]["type"] == "bin")
	{
		echo $_FILES["file"]["type"];
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
		
		if (file_exists("../" . $_FILES["file"]["name"]))
      	{
      		echo $_FILES["file"]["name"] . " already exists! ";
			unlink("../" . $_FILES["file"]["name"]);
      	}
		move_uploaded_file($_FILES["file"]["tmp_name"] , "../" . $_FILES["file"]["name"]);
		echo "Stored in: " . "../" . $_FILES["file"]["name"];
		echo "<script>alert('上传成功！')</script>";
		header("Refresh:2;url=http://121.36.68.53/");
	}
?>
