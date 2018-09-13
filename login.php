<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html lang="zxx">
<?php include ('db2.php');

?>
<head>
	<title>ideaBook</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Portrait Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements"
	/>
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Meta tag Keywords -->
	<!-- css files -->
	<link rel="stylesheet" href="css/css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link rel="stylesheet" href="css/css/font-awesome.css">
	<link rel="stylesheet" href="css/css/login_style.css">
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>
</head>

<body>

	<!--header-->
	<div class="header-w3l">
		<h1>
			<span>i</span>dea
			<span>B</span>ook
			<img src="images/profile.png" width=70 height=70>
	</div>
	<?php
if(isset($_GET['error'])){

	//echo "<script>alert('Email or Password is wrong');</script>";
	echo "<div style='margin-left:30%; margin-right:30%'><div class='alert alert-danger alert-dismissible'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Wrong!</strong> Email or Password.
  </div></div>";
}else if(isset($_GET['ewcaptcha_error'])){
	//echo "<script>alert('reCAPTCHA is wrong');</script>";
	echo "<div style='margin-left:30%; margin-right:30%'><div class='alert alert-danger alert-dismissible'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Wrong!</strong> reCAPTCHA.
  </div></div>";
}else if(isset($_GET['deactivate'])){

	//echo "<script>alert('Email or Password is wrong');</script>";
	echo "<div style='margin-left:30%; margin-right:30%'><div class='alert alert-danger alert-dismissible'>
    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Wrong!</strong> Your Academic Session May Be Completed OR Your Account is Deactivate.
  </div></div>";
}
?>
	<!--//header-->
	<div class="main-content-agile">
		<div class="sub-main-w3">
			
			
			<form action="db/db_login.php" method="post">
				<div class="pom-agile">
					<span class="fas fa-envelope" aria-hidden="true"></span>
					<input placeholder="Email" name="email" class="user" type="email" required="">
				</div>
				<div class="pom-agile">
					<span class="fa fa-key" aria-hidden="true"></span>
					<input placeholder="Password" name="password" class="pass" type="password" required="">
				</div>
				
				<div class="g-recaptcha " data-sitekey="6LcjfU4UAAAAAHNW4njz2pE76Nq7PqJZASZIvqSK"></div><br>
				
				<div class="right-w3l">
					<input type="submit" name="login" value="Login">
				</div>
				
			</form>
		</div>
	</div>
	<!--//main-->
	<!--footer-->
	<div class="footer">
		<p>&copy; 2018 ideaBook
			
		</p>
	</div>
	<!--//footer-->
</body>

</html>