<?php
	//add to fd
	//subtract from bal
	//add to transactions
	include ('include/header.php');
	session_start();

	$conn = mysqli_connect('localhost:3307', 'karunya' , 'karunyam', 'bank');
    if(!$conn){
      echo 'Error';
    }

    if(isset($_POST['submit']) or isset($_POST['signin'])){
    	$amount = $_POST['amount'];
    	$period = $_POST['period'];
    	$accno = $_SESSION['accno'];
    	$interest = $_POST['interest'];
    	$date = $_POST['date'];

    	$fdinsert_query = " CALL fdinsert('$amount','$period','$accno','$interest','$date') ";
    	$result = mysqli_query($conn,$fdinsert_query);

    	$fdupdate_query = " CALL fd_balupdate('$accno','$amount') ";
    	$result1 = mysqli_query($conn, $fdupdate_query);

    	$remarks = "Added new fixed deposit";
    	$fdtrans_query = " CALL fd_transinsert('$accno','$date','$remarks', '$amount') ";
    	$result2 = mysqli_query($conn, $fdtrans_query);	
    }
?>

<!DOCTYPE html> <!--  --> 
<html lang="en"> 
<head>
  <meta charset="utf-8">    <!-- Specifies the character set encoding -->   
  <title>Money sent!</title>
  <link href="css/style.css" rel="stylesheet">

</head>

<body>
  <div class="container size">
  <div class="row">
  <div class="col-md-6 offset-md-3 form-container">
  <br><br><br><br><br>
  <hr class="red-bar">
  <h4>Transaction successful!</h4>
  <br><br>
  <form class="form-group" action = "loginpage.php" method="post">
  <div class ="wrapper">
  	<button class="button" type = "submit">Back to MyAccount</button>
  </div>
  </form>
</body>
</html>