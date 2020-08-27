<?php 

  include ('include/header.php');
  session_start();

  //connecting to database 
  $conn = mysqli_connect('localhost:3307', 'karunya' , 'karunyam', 'bank');
  if(!$conn){
    echo 'Error';
  }


  if(isset($_POST['submit']) or isset($_POST['signin'])) {
  	$accno = $_SESSION['accno'];
  	$username = $_POST['username'];
  	$password = $_POST['password'];

  	$query = "INSERT INTO users (username,password) VALUES ('$username','$password')";
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
		<div class="accountform">
		<img src="img/avatar.png" class="avatar">
			<br>
			<form action = "login_action.php" class="box" method="post">
				<h1>Account created! Login!</h1>
				<input type="text" name ="username" placeholder="Username">
				<input type="password" name ="password" placeholder="Password">
				<input type="submit" name = "submit" value="Login">
			</form>
		</div>
  </body>

</head>
</html>



