<?php session_start();
error_reporting(0); ?>
<html>
<head>
	<meta charset="utf-8">
	<title>Fees Management System</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <a href="home.php" class="btn btn-warning" style="float:right; margin-top:32px; margin-right:12px;">Back</a>
    <div class="container">
        
<?php
$userid = $_SESSION["uid"];
 $password = $_SESSION["pass"];

$mysqli = new mysqli('localhost:3306',$userid, $password,'fmsorion_FeeMgmt') or die(mysqli_error($mysqli));

	$result = $mysqli->query("SELECT * FROM fee ORDER BY datetime DESC") or die($mysqli->error);
    
?>

		<div class="row justify-content-center">
				<table class="table">
					<thead>
						<tr>
							<th>Receipt No.</th>
							<th>Date/Time</th>
							<th>Registration no</th>
							<th>USER</th>
						</tr>
					</thead>
						<?php while($row =$result->fetch_assoc()):	?>
						<tr>
							<td><?php echo $row['receiptno']; ?></td>
							<td><?php echo $row['datetime']; ?></td>
							<td><?php echo $row['svmno']; ?></td>
							<td><?php echo $row['user']; ?></td>
						</tr>
						<?php endwhile; ?>
				</table>
					</div>
<?php
function pre_r($array){
	echo '<pre>';
		print_r($array);
	echo '</pre>';
}
?>
</div>
</body>