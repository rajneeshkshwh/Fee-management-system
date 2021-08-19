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

		<div class="row justify-content-center">
		    <form action="audit.php" method="POST">
         <form action="view.php" method="POST">
        <label>Course</label>
            <select name="Course" id="Course" >
            <option value="">Select Cource</option>
            <option value="B.A">B.A</option>
            <option value="B.SC">B.SC</option>
            <option value="B.COM">B.COM</option>
            <option value="M.A">M.A</option>
            <option value="M.SC">M.SC</option>
            <option value="M.COM">M.COM</option>
            <option value="B.ED">B.ED</option>
            <option value="B.EL.ED">B.EL.ED</option>
            </select>
            <label>Year</label>
            <select name="Year" id="Year" >
            <option value="">Select Year</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            </select>
            <button type="submit" class="btn btn-info" name="search">Submit</button>
        </form></div>
        <?php
$userid = $_SESSION["uid"];
 $password = $_SESSION["pass"];
 $table     = $_SESSION["table"];

$mysqli = new mysqli('localhost:3306',$userid, $password,'fmsorion_FeeMgmt') or die(mysqli_error($mysqli));
if (isset($_POST['search'])){
	$Course = $_POST['Course'];
	$Year = $_POST['Year'];
	$result = $mysqli->query("SELECT * FROM $table WHERE Course='$Course' AND Year=$Year") or die($mysqli->error);}
    
?>
				<table class="table">
					<thead>
						<tr>
							<th>Registration number</th>
							<th>Gross Fee</th>
							<th>Paid Fee</th>
							<th>Remaaining Fee</th>
							<th>Concession Fee</th>
						</tr>
					</thead>
						<?php while($row =$result->fetch_assoc()):	?>
						<tr>
							<td><?php echo $row['RegistrationNumber']; ?></td>
							<td><?php echo $row['GrossFees']; ?></td>
							<td><?php echo $row['PaidFees']; ?></td>
							<td><?php echo $row['Remaining']; ?></td>
							<td><?php echo $row['ConcessionRemark']; ?></td>
			</tr>
						<?php endwhile; ?>
				</table>
				<?php
				$result1 = $mysqli->query("SELECT SUM(GrossFees) FROM $table WHERE Course='$Course' AND Year=$Year") or die($mysqli->error);
				$result2 = $mysqli->query("SELECT SUM(PaidFees) FROM $table WHERE Course='$Course' AND Year=$Year") or die($mysqli->error);
				$result3 = $mysqli->query("SELECT SUM(Remaining) FROM $table WHERE Course='$Course' AND Year=$Year") or die($mysqli->error);
				?>
				<table class="table">
				
						<?php while($row =$result1->fetch_assoc()):	?>
						<tr>
							<th>Total =></th>
							<td><?php echo $row['SUM(GrossFees)']; ?></td>
							<?php endwhile; ?>
							<?php while($row =$result2->fetch_assoc()):	?>
							<td><?php echo $row['SUM(PaidFees)']; ?></td>
							<?php endwhile; ?>
							<?php while($row =$result3->fetch_assoc()):	?>
							<td><?php echo $row['SUM(Remaining)']; ?></td>
							<td>Concession</td>
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