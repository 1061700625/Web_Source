<!DOCTYPE html>
<html >
<head>
<meta charset="UTF-8">
<title>登录</title>
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
	  <form class="form" action="../main/main.php" method="post" onsubmit="return Check_Input()">
		<div class="form__cover"></div>
		<div class="form__loader">
		  <div class="spinner active">
			<svg class="spinner__circular" viewBox="25 25 50 50">
			  <circle class="spinner__path" cx="50" cy="50" r="20" fill="none" stroke-width="4" stroke-miterlimit="10"></circle>
			</svg>
		  </div>
		</div>
		<div class="form__content">
		  <h1>登录</h1>
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
