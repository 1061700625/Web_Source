<html>
	<head>
		
	</head>
	<body>
		<?php
			//author: SXF                 
			//email:1061700625@qq.com     
			//date:2018/10/21
			header("content-type:text/html;charset=utf-8"); //设置编码
			echo "<link rel='shortcut icon' href='../favicon.ico'/>";
			echo "<script src='https://cdn.bootcss.com/limonte-sweetalert2/7.28.5/sweetalert2.all.js'></script>";			
			echo "正在检查数据库状态，请稍候...... <br/>";
			
			$team_name = $_REQUEST["team_name"];
			$leader_name = $_REQUEST["leader_name"];
			$leader_phone = $_REQUEST["leader_phone"];
			$dbhost = 'localhost'; // mysql服务器主机地址 
			$dbuser = 'root'; // mysql用户名 
			$dbpass = ''; // mysql用户名密码 
			$conn = mysqli_connect($dbhost, $dbuser, $dbpass); 
			if(! $conn ) 
			{ 
				echo "<script>sweetAlert('哎呦……','连接失败,数据库的问题、','error')</script>";
			} 
			// 设置编码，防止中文乱码 
			mysqli_query($conn , "set names utf8"); 
			$sql = 'select * FROM Reginfo'; 
			mysqli_select_db( $conn, 'NCURobot' ); 
			$retval = mysqli_query( $conn, $sql ); 
			if(! $retval ) 
			{ 
				echo "<script>sweetAlert('哎呦……','无法读取数据,数据库的问题、','error')</script>";
			}
			echo "数据库连接检查完毕! <br />";
			$sql = "select * from Reginfo where team_name='$team_name' and leader_name='$leader_name' and leader_phone='$leader_phone';";
			$retval = mysqli_query( $conn, $sql );
			if(! $retval )
			{
				echo "<script>sweetAlert('哎呦……','未查询到信息','error')</script>";
			}
			$row = mysqli_fetch_array($retval);
			if(!$row)
			{
				echo "<script>sweetAlert('查询失败！','请检查是否输入有误','error')</script>";
				mysqli_close($conn);
			}else
			{
				echo "<script>sweetAlert('查询成功！','将显示详细信息','success')</script>";
				$team_name = $row["team_name"];
				$college_name = $row["college"];
				$project = $row["competition_item"];
				$adviser_name = $row["adviser_name"];
				$adviser_title = $row["adviser_title"];
				$adviser_phone = $row["adviser_phone"];
				$adviser_email = $row["adviser_email"];
				$leader_name = $row["leader_name"];
				$leader_phone = $row["leader_phone"];
				$leader_email = $row["leader_email"];
				$member1_name = $row["member1_name"];
				$member1_phone = $row["member1_phone"];
				$member1_email = $row["member1_email"];
				$member2_name = $row["member2_name"];
				$member2_phone = $row["member2_phone"];
				$member2_email = $row["member2_email"];
				$member3_name = $row["member3_name"];
				$member3_phone = $row["member3_phone"];
				$member3_email = $row["member3_email"];
				$member4_name = $row["member4_name"];
				$member4_phone = $row["member4_phone"];
				$member4_email = $row["member4_email"];
				$member5_name = $row["member5_name"];
				$member5_phone = $row["member5_phone"];
				$member5_email = $row["member5_email"];
				$ip = $row["ip"];
				mysqli_close($conn);
			}
		?>

		<br />
		<hr />
		<div class="result_box">
			<div>
				<span>队伍名称：</span><?php echo $team_name; ?>
			</div>
			<div>
				<span>参赛学院：</span><?php echo $college_name; ?>
			</div>
			<div>
				<span>参赛项目：</span><?php echo $project; ?>
			</div>
			<div>
				<span>指导老师：</span><?php echo $adviser_name.";  ".$adviser_title.";  ".$adviser_phone.";  ".$adviser_email;?>
			</div>
			<div>
				<span>领队/队长：</span><?php echo $leader_name.";  ".$leader_phone.";  ".$leader_email;?>
			</div>
			<div>
				<span>参赛队员1：</span><?php echo $member1_name.";  ".$member1_phone.";  ".$member1_email;?>
			</div>
			<div>
				<span>参赛队员2：</span><?php echo $member2_name.";  ".$member2_phone.";  ".$member2_email;?>
			</div>
			<div>
				<span>参赛队员3：</span><?php echo $member3_name.";  ".$member3_phone.";  ".$member3_email;?>
			</div>
			<div>
				<span>参赛队员4：</span><?php echo $member4_name.";  ".$member4_phone.";  ".$member4_email;?>
			</div>
			<div>
				<span>参赛队员5：</span><?php echo $member5_name.";  ".$member5_phone.";  ".$member5_email;?>
			</div>
			<div>
				<span>ip：</span><?php echo $ip;?>
			</div>
		</div>
		
		<style>
			.result_box{
				/*border: 1px solid red;*/
				margin: 20px auto;
				width: 500px;
			}
		</style>
	</body>
</html>