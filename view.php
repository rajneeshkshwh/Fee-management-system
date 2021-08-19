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

		<div class="row justify-content-center">
				<table class="table">
					<thead>
						<tr>
							<th>NAME</th>
							<th>Phone</th>
							<th>SVm no</th>
							<th>Registration Number</th>
							<th>Course</th>
							<th>Year</th>
							<th colspan="3">Action</th>
						</tr>
					</thead>
						<?php while($row =$result->fetch_assoc()):	?>
						<tr>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['phone']; ?></td>
							<td><?php echo $row['SVmno']; ?></td>
							<td><?php echo $row['RegistrationNumber']; ?></td>
							<td><?php echo $row['Course']; ?></td>
							<td><?php echo $row['Year']; ?></td>
							<td>
							    <a href="details.php?view=<?php echo $row['id']; ?>" class="btn btn-primary">Details</a>
								<a href="edit.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">EDIT</a>
								<a href="" class="btn btn-danger" data-toggle="modal" data-target="#myModal">DELETE</a>
							</td>
							
							
							
													<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">DELETE RECORD</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <p>Are you sure to delete this record?</p>
        </div>
        <div class="modal-footer">
          <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">DELETE</a>
        </div>
      </div>
    </div>
  </div>
</div>
	
							
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