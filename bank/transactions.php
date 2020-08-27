<?php
  include ('include/header.php');
?>
<!DOCTYPE html> <!--  --> 
<html lang="en"> 
<br><br><br>
<div class="container size">
  <div class="row">
    <br><br><br><br><br><br>
    <div class="col-md-6 offset-md-3 form-container">
        <br><br>
          <h3>Transactions</h3>
          <hr class="red-bar">

          <form class="form-group" method="post" action="account_details.php">
          <div class="form-group">

          <?php 

  			    session_start();

  			    //connecting to database 
  			    $conn = mysqli_connect('localhost:3307', 'karunya' , 'karunyam', 'bank');
  			    if(!$conn){
  			      echo 'Error';
  			    }

  			    $accno = $_SESSION['accno'];

  			    $query = "SELECT * FROM  transactions WHERE acc_no = '$accno'";
  			    $result = mysqli_query($conn,$query);

  			    $post = array();
            echo '<table border="2" cellpadding="20" cellspacing="10" class="db-table">';
            echo '<tr><th>Transaction id</th><th>Account number</th><th>Date of Transaction</th><th>Cheque number</th><th>Transaction remarks</th><th>Withdrawal amount</th><th>Deposit amount</th></tr>';
            while($row = mysqli_fetch_assoc($result)){
              $posts[] = $row;
            }
            foreach ($posts as $row){
              echo '<tr>';
              foreach ($row as $element){
                echo '<td>',$element,'</td>';
              }
              echo '</tr>';
            }
  				
  				  '</table>';
          ?>
          </div>
        </form>
    </div>
  </div>
</div>

</html>