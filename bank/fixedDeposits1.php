<?php
  include ('include/header.php');
?>
<!DOCTYPE html> <!--  --> 
<html lang="en"> 
<br><br>
<div class="container size">
  <div class="row">
    <div class="col-md-6 offset-md-3 form-container">
          <h3>Fixed deposits</h3>
          <hr class="red-bar">

          <form class="form-group" method="post" action="createfd.php">
          <div class="form-group">
          <br><br><br>

          <?php 

            session_start();

            //connecting to database 
            $conn = mysqli_connect('localhost:3307', 'karunya' , 'karunyam', 'bank');
            if(!$conn){
              echo 'Error';
            }

            $accno = $_SESSION['accno'];

            $query = "SELECT * FROM  fixeddeposits WHERE acc_no = '$accno'";
            $result = mysqli_query($conn,$query);

            $post = array();
            echo '<table border="2" cellpadding="20" cellspacing="10" class="db-table">';
            echo '<tr><th>Deposit id</th><th>Account number</th><th>Date of Deposition</th><th>Period</th><th>Interest rate</th><th>Principal amount</th></tr>';
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
          <div class="form-group">
      
        </div>
        </form>
    </div>
  </div>
</div>

</html>