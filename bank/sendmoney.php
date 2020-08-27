<?php
	include ('include/header.php');
?>
<!DOCTYPE html> <!--  --> 
<html lang="en"> 
<div class="container size">
	<link href="css/analysis_style.css" rel="stylesheet">
  <br>
  <br>
  <br>
  <br>
  <br>
  <div class="row">
    <div class="col-md-6 offset-md-3 form-container">
    	<h3>Send Money</h3>
          <hr class="red-bar">

          <form class="form-group" action = "sendmoney_action.php" method="post">
          <div class="form-group">
     
          <input type="text" name ="rec_accno" placeholder="Receiver's account no">
          <br><br>
		  <input type="text" name ="amount" placeholder="Amount">
		  <br><br>
		  <input type="text" name ="description" placeholder="Description">
		  <br><br><br>
		  
		  
	

      
      		<input type="submit" value="Transfer" name="submit">
        <input type="submit" value="Back" formaction="netbanking.php">

      </form>
      </div>
  </div>
</div>
</html>
