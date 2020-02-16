<html>
	<body>
		<?php
			//author: SXF                 
			//email:1061700625@qq.com     
			//date:2018/10/21
			
			header("content-type:text/html;charset=utf-8"); //设置编码
			echo "<link rel='shortcut icon' href='../favicon.ico'/>";
			echo "<script src='https://cdn.bootcss.com/limonte-sweetalert2/7.28.5/sweetalert2.all.js'></script>";	
					
			echo "正在检查数据库状态，请稍候...... <br/>";
			$ip = $_SERVER['REMOTE_ADDR'];   //获取ip地址
			$html = file_get_contents('http://ip.taobao.com/service/getIpInfo.php?ip='.$ip);  //通过ip查询位置
			$city = json_decode($html,$assoc=true)["data"]["city"];
			if("南昌" != $city)
			{
				echo "<script>sweetAlert('〒▽〒','暂不支持校外童鞋报名，谢谢支持！','error')</script>";
				return;
			}
			
			$time = time();
			mail("1061700625@qq.com","收到新的报名信息","该注册信息来自：'$ip'");
			
			$team_name = $_REQUEST["team_name"];
			$college_name = $_REQUEST["college_name"];
			$project = $_REQUEST["project"];
			$adviser_name = $_REQUEST["adviser_name"];
			$adviser_title = $_REQUEST["adviser_title"];
			$adviser_phone = $_REQUEST["adviser_phone"];
			$adviser_email = $_REQUEST["adviser_email"];
			$leader_name = $_REQUEST["leader_name"];
			$leader_phone = $_REQUEST["leader_phone"];
			$leader_email = $_REQUEST["leader_email"];
			$team = $_REQUEST["team"];
			
			$team_len = count($team[name]); //参赛队员数
			for($i=$team_len;$i<5;$i++){    //将剩余队员信息填充为null
				$team[name][$i] = null;
				$team[phone][$i] = null;
				$team[email][$i] = null;
			}
			for ($i=0;$i<5;$i++){           //转换一下
				$member_name[$i] = $team[name][$i];
				$member_phone[$i] = $team[phone][$i];
				$member_email[$i] = $team[email][$i];
			}
			
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
			$sql = 'select * FROM Reginfo'; 
			mysqli_select_db( $conn, 'NCURobot' ); 
			$retval = mysqli_query( $conn, $sql ); 
			if(! $retval ) 
			{ 
			//	die('无法读取数据: ' . mysqli_error($conn)); 
				echo "<script>sweetAlert('哎呦……','无法读取数据,数据库的问题、','error')</script>";
			}
			echo "数据库连接检查完毕! <br />";
			
			$sql = "select time from Reginfo where ip='$ip';";
			$retval = mysqli_query( $conn, $sql );
			$row = mysqli_fetch_array($retval);
			if($row)
			{
				if($row["time"]-time()<5*60)
					{
						echo "<script>sweetAlert('勿频繁操作,请5分钟后重试！','恶意注册将导致封禁！','error')</script>";
						mysqli_close($conn);
						return false;
					}
			}
			
			$sql = "select * from Reginfo where team_name='$team_name';";
			$retval = mysqli_query( $conn, $sql );
			$row = mysqli_fetch_array($retval);
			if($row)
			{
				echo "<script>sweetAlert('哎呦……','队伍名称已存在，请更换','error')</script>";
				mysqli_close($conn);
				return false;
			}

			
			
			$sql = "insert into Reginfo(".
						"team_name,competition_item,college,adviser_name,adviser_title,adviser_phone,adviser_email,".
						"leader_name,leader_phone,leader_email,member1_name,member1_phone,member1_email,member2_name,".
						"member2_phone,member2_email,member3_name,member3_phone,member3_email,member4_name,member4_phone,".
						"member4_email,member5_name,member5_phone,member5_email,ip,time)".
						"values".
						"('$team_name','$project','$college_name','$adviser_name','$adviser_title','$adviser_phone','$adviser_email',".
						"'$leader_name','$leader_phone','$leader_email','$member_name[0]','$member_phone[0]','$member_email[0]','$member_name[1]',".
						"'$member_phone[1]','$member_email[1]','$member_name[2]','$member_phone[2]','$member_email[2]','$member_name[3]',".
						"'$member_phone[3]','$member_email[3]','$member_name[4]','$member_phone[4]','$member_email[4]','$ip','$time');";
			$retval = mysqli_query( $conn, $sql );
			if(! $retval )
			{
			//	die('无法插入数据: ' . mysqli_error($conn));
				echo "<script>sweetAlert('哎呦……','无法插入数据,所您填的没错，那应该是数据库的问题、','error')</script>";
			}
			
			//	echo "数据插入成功\n";
				echo "<script>swal('报名成功！','稍后您可查询报名状态，2s后将自动返回','success')</script>";
			mysqli_close($conn);
			header("Refresh:2;url=http://182.61.136.210/html/signup.html"); //跳转页面
		?>

	</body>
</html>