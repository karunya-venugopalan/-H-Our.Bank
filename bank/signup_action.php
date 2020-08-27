
<?php 
  include ('include/header.php');

  session_start();
  //connecting to database 
  $conn = mysqli_connect('localhost:3307', 'karunya' , 'karunyam', 'bank');
    if(!$conn){
      echo 'Error';
    }


    if(isset($_POST['submit']) or isset($_POST['signin'])) {
      $_SESSION['accno'] = $_POST['acc_no'];
      $acc_no = $_POST['acc_no'];
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $dob = $_POST['dob'];
      $contact = $_POST['contact'];
      $email = $_POST['email'];

      $acc_no_ans = 0;
      $contact_ans = 0;

      $query_custid = " SELECT cust_id FROM customer where acc_no='$acc_no'";
      $result_custid = mysqli_query($conn, $query_custid);
      $fetch_custid = mysqli_fetch_all($result_custid, MYSQLI_ASSOC);
      if(empty($fetch_custid)){
        header("Location: signup_action_failure.php");
      }

      $acc_no_ans = $fetch_custid[0]['cust_id'];

      $query_contact_custid = " SELECT cust_id FROM customer where contact='$contact'";
      $result_contact_custid = mysqli_query($conn, $query_contact_custid);
      $fetch_contact_custid = mysqli_fetch_all($result_contact_custid, MYSQLI_ASSOC);
      if(!empty($fetch_contact_custid)){
        $contact_ans = $fetch_contact_custid[0]['cust_id'];
      }

      if(!($acc_no_ans == $contact_ans)){
        header("Location: signup_action_failure.php");
      }
    }

 ?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>create user account</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <link href="css/login_style.css" rel="stylesheet">
  
  <body>
    <br><br><br><br><br>
    <h3 style="text-align:center">Create user account!</h3>
    <div class="accountform">
    <img src="img/avatar.png" class="avatar">
      <br>
      <form action = "signup_action1.php" class="box" method="post">
        
        <input type="text" name ="username" placeholder="Username">
        <input type="password" name ="password" placeholder="Password">
        <input type="password" name ="repassword" placeholder="Reenter Password">
        <input type="submit" name = "submit" value="Login">
      </form>
    </div>
  </body>

</head>

</html>