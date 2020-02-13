



<?php 
 header("content-type:text/html;charset=utf-8"); //设置编码

	$postdata = file_get_contents("php://input");
  	if ($postdata) {
  		echo "OK";
  		$fp = fopen("msgBox.json","w");
		fwrite($fp, $postdata);
		fclose($fp);
  	}
  	else{
  		echo "Err";
  	}
	
?>;



