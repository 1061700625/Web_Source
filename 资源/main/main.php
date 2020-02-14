<!DOCTYPE html>
<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "visitor";
		$Username = $_REQUEST['nickname'];
		$Password = $_REQUEST['password'];
		
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("连接失败: " . $conn->connect_error);
		} 
		$sql = "SELECT Username, Password FROM log where Username='{$Username}' and Password='{$Password}'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			echo '<script src="https://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>';
			setcookie("User", "Visitor", time()+3600);
			echo '<script>alert("登录成功");</script>';
			echo '<script>window.location.href="../"</script>';
		}
		else {
			$conn->close();
			echo '<script src="https://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>';
			echo '<script>alert("登录失败");</script>';
			echo '<script>window.location.href="../login/login.php"</script>';
		}
		$conn->close();
	}
	else
	{
		echo '<script>window.location.href="/"</script>';
		exit;
	}
	if (!isset($_COOKIE["User"]))
	{
		echo '<script src="https://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>';
		echo '<script>alert("请登录");</script>';
		echo '<script>window.location.href="../login/login.php"</script>';
	}
?>

<html>
	<?php include './php/header.php'; ?>
	<body>
		<?php include 'canvas.plugs'; ?>
		<p><?php echo $_REQUEST['nickname'];?></p>
		<p>123</p>
		<p>123</p>
		<p>123</p>
	</body>
</html>
