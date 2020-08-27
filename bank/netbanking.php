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

		<div class="accountform">
			<form action = "loginpage.php" method = "post" class="box">
				<button id="details" name="details" type="submit" formaction = "account_details.php">Account details</button>
				<br>
				<button id="Send" name="Send" type="submit" formaction = "sendmoney.php">Transfer money</button>
				<br>
				<button id="fd" name="fd" type="submit" formaction = "createfd.php">Create Fixed deposit</button>
				<br>
				<button id="back" name="back" type="submit" formaction = "loginpage.php">Back</button>
				<br>
			</form>
		</div>
  </body>

</head>
</html>