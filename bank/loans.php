<?php
	include ('include/header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Net banking</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <link href="css/netbanking_style.css" rel="stylesheet">
  
  <body>
  	  	<br><br><br>
  		<form action = "loans_action.php" method = "post" class="box">
  			<button id="loans" name="loans" type="submit">Show loans</button>
  		</form>
		<div class="accountform">
			
			<form action = "loginpage.php" method = "post" class="box">
				<button id="details" name="details" type="submit" formaction = "homeloans.php">Home Loan</button>
				<br>
				<button id="Send" name="Send" type="submit" formaction = "personalloans.php">Personal Loans</button>
				<br>
				<button id="fd" name="fd" type="submit" formaction = "educationalloans.php">Educational Loans</button>
				<br>
				<button id="back" name="back" type="submit" formaction = "loginpage.php">Back</button>
				<br>
			</form>
		</div>
  </body>

</head>
</html>