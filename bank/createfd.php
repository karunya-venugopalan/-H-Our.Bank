<?php
  include ('include/header.php');
?>
<!DOCTYPE html> <!--  --> 
	<head>
		<link href="css/details_style.css" rel="stylesheet">
	</head>
	<br>

	<div class="container size">
  	<div class="row">
    <div class="col-md-6 offset-md-3 form-container">
          <hr class="red-bar">

          <br>
         
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

  			    $bal_query = "  SELECT balance from accounts where acc_no = '$accno' ";
  			    $result = mysqli_query($conn,$bal_query);
  			    $post = arraY();

  			    echo "<h1 style='text-align:center'>Savings balance: ";

  			    while($row = mysqli_fetch_assoc($result)){
  			    	foreach ($row as $element){
              			echo "$element</h1>";
              		}
            	} 
  		?>
  		<br><br>
  		<form action = "fixedDeposits1.php" class="box" method="post">
  			<input value="View Fixed deposits" type="submit">
  	    </form>
  	</div>
  </div>
</div>

<div class="container">
	<form class="form-horizontal">
		<div class="form-group">
      	<label class="control-label col-sm-2" for="email" >Amount:</label>
      	<div class="col-sm-10">
        	<input type="number" class="form-control" id="amount" placeholder="Enter amount" name="amount">
      	</div>
    	</div>

    	<div class="form-group">
      	<label class="control-label col-sm-5" for="period">Period:</label>
		<div class="col-sm-10">
        	<input type="text" class="form-control" id="period" placeholder="Enter period" name="period">
      	</div>
    	</div>
  		
  		<div class="form-group">
      	<label class="control-label col-sm-2" for="date">Date:</label>
		<div class="col-sm-10">
        	<input type="text" class="form-control" id=date placeholder="Enter date" name="date">
      	</div>
    	</div>

  		

  	</form>
</div>


<form action = "createfd_action.php" class="box" method="post">
  	<input value="Submit" type="submit">
</form>
<form action = "netbanking.php" class="box" method="post">
  	<input value="Back" type="submit">
</form>
</html>