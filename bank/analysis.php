<?php
  session_start();
	include ('include/header.php');

  $accno = $_SESSION['accno'];
	$connect = mysqli_connect('localhost:3307', 'karunya' , 'karunyam', 'bank');
	$query = "SELECT * FROM loans where acc_no='$accno'";
	$result = mysqli_query($connect, $query);
	$chart_data = '';
	while($row = mysqli_fetch_array($result))
	{
		$chart_data .= "{ acc_no:'".$row["acc_no"]."', principal_amt:".$row["principal_amt"].", period:".$row["period"].", emi:".$row["emi"]."}, ";
	}
	$chart_data = substr($chart_data, 0, -2);
?>

<!DOCTYPE html>
<html lang="en"> 
 <head>
  <title>Analysis</title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
 </head>
 <body>
  <br><br><br>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 align="center">Loans - Principal amount and Total payable analysis</h2>   
   <br /><br />
   <div id="chart"></div>
  </div>
  <link href="css/analysis_style.css" rel="stylesheet">
      <form action = "login_action.php" class="box" method="post">
        <input type="submit" value="Back">
      </form>

 </body>

</html>
 
<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'acc_no',
 ykeys:['principal_amt', 'period', 'emi'],
 labels:['Principal Amount', 'Period', 'EMI'],
 hideHover:'auto',
 stacked:true
});
</script>

