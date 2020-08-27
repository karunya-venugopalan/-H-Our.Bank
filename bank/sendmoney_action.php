
<!DOCTYPE html> <!--  --> 
<html lang="en">
<?php
	//accept reciever's acc no
	//add to his balance
	//add to his transactions
	//subtract from my bal
	//add to my transactions
	include ('include/header.php');
	session_start();

	$conn = mysqli_connect('localhost:3307', 'karunya' , 'karunyam', 'bank');
    if(!$conn){
      echo 'Error';
    }
   
    $accno = $_SESSION['accno'];
    if(isset($_POST['submit']) or isset($_POST['signin'])){
    	$rec_acc = $_POST['rec_accno'];
    	$amount = $_POST['amount'];
    	$description = $_POST['description'];
    	

    	$rec_bal_query = " CALL update_rec_bal('$rec_acc','$amount') ";
    	$result = mysqli_query($conn,$rec_bal_query);

    	$rec_trans_query = " CALL insert_rec_trans('$rec_acc', '$amount', '$description') ";
    	$result1 = mysqli_query($conn,$rec_trans_query); 

    	$sender_bal_query = " CALL update_sender_bal('$accno','$amount') ";
    	$result2 = mysqli_query($conn,$sender_bal_query);

    	$sender_trans_query = " CALL insert_sender_trans('$accno', '$amount', '$description') ";
    	$result3 = mysqli_query($conn,$sender_trans_query); 

    
    }
    
?>

 
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