<?php
	include ('include/header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Get Started</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <link href="css/login_style.css" rel="stylesheet">
  
  <body>
		<div class="accountform">
		<img src="img/avatar.png" class="avatar">
			<form action = "login_action.php" class="box" method="post">
				<h1>Login</h1>
				<input type="text" name ="username" placeholder="Username">
				<input type="password" name ="password" placeholder="Password">
				<input type="submit" name = "submit" value="Login">
				<p class="text">-----New User?-----</p>
				<input type="button" value="Sign Up" onclick="location.href='signup.php';">
			</form>
		</div>
  </body>

</head>

</html>