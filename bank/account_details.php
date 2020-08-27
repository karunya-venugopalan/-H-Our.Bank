<?php
	include ('include/header.php');
?>
<!DOCTYPE html> <!--  --> 
<html lang="en">
<head>
	<link href="css/details_style.css" rel="stylesheet">
</head>
<body>
  <br><br><br><br><br>
  <h1 style="text-align:center">Account details</h1>
  <!--<div class="container size">
   <div class="row">-->
    <div class="col-md-6 offset-md-3 form-container">
          <hr class="red-bar">


			<?php 

			  session_start();

			  //connecting to database 
			  $conn = mysqli_connect('localhost:3307', 'karunya' , 'karunyam', 'bank');
			    if(!$conn){
			      echo 'Error';
			    }



			    $accno = $_SESSION['accno'];

			    $query = "SELECT * FROM  ACCOUNTS WHERE acc_no = '$accno'";
			    $result = mysqli_query($conn,$query);

			    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				
				$acc_no = $row["acc_no"];
				$acc_type = $row["acc_type"];
				$balance = $row["balance"];	
				printf("<br>");
				printf("<br>");
               	echo "<p style='font-weight: bold;'><font color=black face='Arial' size=5pt>Account number: &nbsp;&nbsp;&nbsp;$acc_no</font></p>";
               	printf("<br>");
                echo "<p style='font-weight: bold;'><font color=black face='Arial' size=5pt>Account type: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$acc_type</font></p>";
                printf("<br>");
                echo "<p style='font-weight: bold;'><font color=black face='Arial' size=5pt>Account balance: &nbsp;&nbsp;&nbsp;$balance</font></p>";
            ?>
            </div>
            <br>
            <form action = "accounts_action.php" class="box" method="post">
                <input type="submit" value="Fixed Deposits" formaction="fixedDeposits.php">
                <input type="submit" value="Transactions" formaction="transactions.php">
                <input type="submit" value="Back" formaction="loginpage.php">
          </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
