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
        $time = date('Y-m-d H:i:s', time());
		
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("连接失败: " . $conn->connect_error);
		} 
		$sql = "INSERT INTO log (Username, Password, Time) VALUES ('{$Username}', '{$Password}', '{$time}')";
		$result = $conn->query($sql);
		
		$sql = "SELECT Username, Password FROM log where Username='{$Username}' and Password='{$Password}'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			echo '<script src="https://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>';
			echo '<script>alert("注册成功");</script>';
			setcookie("User", "Visitor", time()+3600);
			echo '<script>window.location.href="../index.php"</script>';
		}
		else {
			$conn->close();
			echo '<script src="https://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>';
			echo '<script>alert("注册失败");</script>';
			echo '<script>window.location.href="../login/signup.php"</script>';
		}
		$conn->close();
	}
?>

<html >
<head>
<meta charset="UTF-8">
<title>注册</title>
<link rel="stylesheet" href="css/style.css">
<script src="https://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script>
	function Check_Input()
	{
		 if(!$("input[name$='nickname']").val() || !$("input[name$='password']").val())
		 {
			 alert("输入用户名或密码，好吗？");
			 return false;
		 }
		else
			return true;
	}
</script>
</head>

<body>
	<main>
	  <form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" onsubmit="return Check_Input()">
		<div class="form__cover"></div>
		<div class="form__loader">
		  <div class="spinner active">
			<svg class="spinner__circular" viewBox="25 25 50 50">
			  <circle class="spinner__path" cx="50" cy="50" r="20" fill="none" stroke-width="4" stroke-miterlimit="10"></circle>
			</svg>
		  </div>
		</div>
		<div class="form__content">
		  <h1>注册</h1>
		  <div class="styled-input">
			<input type="text" class="styled-input__input" name="nickname" >
			<div class="styled-input__placeholder"> <span class="styled-input__placeholder-text">Username</span> </div>
			<div class="styled-input__circle"></div>
		  </div>
		  <div class="styled-input">
			<input type="text" class="styled-input__input" name="password">
			<div class="styled-input__placeholder"> <span class="styled-input__placeholder-text">Password</span> </div>
			<div class="styled-input__circle"></div>
		  </div>
		  <button type="submit" class="styled-button"> <span class="styled-button__real-text-holder"> <span class="styled-button__real-text">Submit</span> <span class="styled-button__moving-block face"> <span class="styled-button__text-holder"> <span class="styled-button__text">Submit</span> </span> </span><span class="styled-button__moving-block back"> <span class="styled-button__text-holder"> <span class="styled-button__text">Submit</span> </span> </span> </span> </button>
		</div>
	  </form>
	</main>
	<script  src="js/index.js"></script>
</body>
</html>
