<?php
  include ('include/header.php');
?>
<!DOCTYPE html> <!--  --> 
<html lang="en"> 
<br><br>
<div class="container size">
  <div class="row">
    <div class="col-md-6 offset-md-3 form-container">
        <br><br>
          <h3>Loans</h3>
          <hr class="red-bar">

          <form class="form-group" method="post" action="loans.php">
          <div class="form-group">

          <?php 

            session_start();

            //connecting to database 
            $conn = mysqli_connect('localhost:3307', 'karunya' , 'karunyam', 'bank');
            if(!$conn){
              echo 'Error';
            }

            $accno = $_SESSION['accno'];

            $query = "SELECT * FROM  loans WHERE acc_no = '$accno'";
            $result = mysqli_query($conn,$query);

            $post = array();
            echo '<table border="2" cellpadding="20" cellspacing="2" class="db-table">';
            echo '<tr><th>Loan id</th><th>Account number</th><th>Type</th><th>Principal amount</th><th>Period</th><th>Emi</th><th>Interest rate</th></tr>';
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