<?php
  include ('include/header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Create user account</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <link href="css/login_style.css" rel="stylesheet">
  
  <body>
    <br><br><br><br><br>
    <h3 style="text-align:center">Passwords do not match!</h3>
    <div class="accountform">
    <img src="img/avatar.png" class="avatar">
      <form action = "signup_action1.php" class="box" method="post">
        <h1>Login</h1>
        <input type="text" name ="username" placeholder="Username">
        <input type="password" name ="password" placeholder="Password">
        <input type="password" name ="repassword" placeholder="Reenter Password">
        <input type="submit" name = "submit" value="Login">
      </form>
    </div>
  </body>

</head>

</html>