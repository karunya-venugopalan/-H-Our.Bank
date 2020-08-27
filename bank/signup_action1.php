<?php 
  include ('include/header.php');

  session_start();
  //connecting to database 
  $conn = mysqli_connect('localhost:3307', 'karunya' , 'karunyam', 'bank');
  if(!$conn){
    echo 'Error';
  }

  if(isset($_POST['submit']) or isset($_POST['signin'])) {
  	$password = $_POST['password'];
  	$repassword = $_POST['repassword'];
  	$username = $_POST['username'];

  	if(!($password == $repassword)){
  		header("Location: signup_action1_failure.php");
  	}

  	
  	$accno = $_SESSION['accno'];

  	$query = "INSERT INTO users (username,password,acc_no) VALUES ('$username','$password','$accno')";
  	$result = mysqli_query($conn,$query);

  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Get Started</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <link href="css/login_style.css" rel="stylesheet">
  
  <body>
    <br><br><br><br>
  	<h3 style="text-align:center">Account created! Login!</h3>
		<div class="accountform">
		<img src="img/avatar.png" class="avatar">
			<br>
			<form action = "login_action.php" class="box" method="post">
				
				<input type="text" name ="username" placeholder="Username">
				<input type="password" name ="password" placeholder="Password">
				<input type="submit" name = "submit" value="Login">
			</form>
		</div>
  </body>

</head>

</html>