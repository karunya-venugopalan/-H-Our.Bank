


<?php
	include ('include/header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sign Up</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<link href="css/sign_style.css" rel="stylesheet">
  
	<body>
		<br><br><br><br><br>
		<h3 style="text-align:center">Fill in to create User account</h3>
		<div class="sign-box">
			<form action = "signup_action.php" class="box" method="post">
				<input type="text-inline" name="acc_no" placeholder="Account number">
				<input type="text-inline" name="firstname" placeholder="First Name">
				<input type="text-inline" name="lastname" placeholder="Last Name">
				<p style="font-size:100%;">DOB</p>
				<input type="text" name="dob">
				<p style="font-size:100%;">Gender</p>
				<input type="checkbox" value="" name="gender">Male
				<input type="checkbox" value="" name="gender">Female
				<input type="checkbox" value="" name="gender">Others
				<input type="tel" name="contact" placeholder="Mobile number">
				<input type="email" name="email" placeholder="xyz123@gmail.com">
				<select id="Branch" name="branch">
					<option value="" disabled selected>Branch</option>
					<option value="Chennai">Vadavalli</option>
					<option value="Coimbatore">Pudur</option>
					<option value="Bangalore">R S Puram</option>
					<option value="Mumbai">Peelamedu</option>
				</select>
				<input type="submit" name="submit" value="Create Account">
			</form>
		</div>
	</body>

</head>

</html>