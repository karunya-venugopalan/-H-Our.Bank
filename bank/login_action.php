
<?php 

  session_start();
  //connecting to database 
  $conn = mysqli_connect('localhost:3307', 'karunya' , 'karunyam', 'bank');
    if(!$conn){
      echo 'Error';
    }


    if(isset($_POST['submit']) or isset($_POST['signin'])) {
      $username = $_POST['username'];
      $pwd = $_POST['password'];
      $userid_username_ans = 0;
      $userid_pwd_ans = 0;

      //$query_userid_username = " CALL select_userid('$username') ";
      $query_userid_username = " SELECT id from users where username='$username' ";
      $result_userid_username = mysqli_query($conn, $query_userid_username);
      $userid_username = mysqli_fetch_all($result_userid_username, MYSQLI_ASSOC);
      if(empty($userid_username)){
        header("Location: login_action_failure.php");
      }

      $userid_username_ans = $userid_username[0]['id'];

      $query_accno = " SELECT acc_no from users where username='$username' ";
      //$query_accno = " CALL select_useraccno('$username') ";
      $result = mysqli_query($conn, $query_accno);
      while ($row = $result->fetch_assoc()) {
        $_SESSION['accno'] = $row['acc_no'];
      }

      $x = $_SESSION['accno'];

      //$query_userid_pwd = " CALL select_useridpwd('$pwd') " ;
      $query_userid_pwd = " SELECT id from users where password='$pwd' " ;
      $result_userid_pwd = mysqli_query($conn, $query_userid_pwd);
      $userid_pwd = mysqli_fetch_all($result_userid_pwd, MYSQLI_ASSOC);
      if(!empty($userid_pwd)){
        $userid_pwd_ans = $userid_pwd[0]['id'];
      }

      if(!($userid_username_ans == $userid_pwd_ans))  {
        header("Location: login_action_failure.php");
      }
    }

 ?>


<?php
  include ('include/header.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link href="css/service.css" rel="stylesheet">
    <script src="https://code.iconify.design/1/1.0.4/iconify.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <div class="services">
      <h1>Our Services</h1>
      <div class="cen">
        <div class="service">
          <i class="iconify" data-icon="cil-bank" style="color: #D4AC0D;"></i>
          <h2><a href="account_details.php">Account Details</a></h2>
          <p align="center" class="description">Open your Account,<br> do your Bank jobs at ease from home and <br>Save your Quality time for your Life :)</p>
        </div>
        
        <div class="service">
          <i class="iconify" data-icon="ic:baseline-done-all" style="color: #3498DB;"></i>
          <h2><a href="loans.php">Easy Loans</a></h2>
          <p align="center" class="description">H[our].Bank provides you with<br> various Loan options with easy <br>and transparent interest rates.</p>
        </div>
        
        <div class="service">
          <i class="iconify" data-icon="mdi-light:credit-card" style="color: #DC143C;"></i>
          <h2><a href="netbanking.php">Net banking</a></h2>
          <p align="center" class="description">A Digital banking system literally <br> in your "Fingertips". Easy access to <br> your money at any time from any place.</p>
        </div>
        
        <div class="service">
          <i class="iconify" data-icon="cil-chart-line" style="color: #28B463;"></i>
          <h2><a href="analysis.php">Analytic Services</a></h2>
          <p align="center" class="description">Want to know the behaviour and Analytics <br>of our account ? Yes, you can know it on your association with H[our].Bank.</p>
            </div>
  </body>
</html>