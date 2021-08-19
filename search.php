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
<style>
	 .active-purple-2 input.form-control[type=text]:focus:not([readonly]) {
              border-bottom: 1px solid #ce93d8;
              box-shadow: 0 1px 0 0 #ce93d8;
          }
.img{
object-fit:cover;
object-position: center;
width:200px;
height:200px;
}
</style>
</head>

<body>
     <a href="student.php" class="btn btn-warning" style="float:right; margin-top:25px;margin-right:25px;">BACK</a>
<?php require_once 'search.php'; ?>
<?php
		if(isset($_SESSION['message'])): ?>

<div class="alert alert-<?=$_SESSION['msg_type']?>">
	<?php
	echo $_SESSION['message'];
	unset($_SESSION['message']);
	?>
</div>
<?php endif ?>
<a href="logout.html"><img src="images/logout.gif" style="height:100px; width:100px;"></a>
<div style="margin-top:52px;"></div>
<div class="container">
<form class="form-inline d-flex justify-content-center md-form form-sm active-purple-2 mt-2" action="search.php" method="POST">
	<i class="fas fa-search" aria-hidden="true" style="margin-right: 12px;"></i>
  <input  class="form-control form-control-sm mr-3 w-75" type="text" name="RegistrationNumber" placeholder="Search">
    <button type="Submit" class="btn btn-info"name="search">Search</button><P>Search by Registration Number</P>
  </form>
  
  <hr>
  <hr>
  <div class="row justify-content-center">
	
	<a href="view1.php" class="btn btn-primary">VIEW ALL</a>


</div>
<hr>
  <hr>
<?php
$userid = $_SESSION["uid"];
 $password = $_SESSION["pass"];
 $table     = $_SESSION["table"];

$mysqli = new mysqli('localhost:3306',$userid, $password,'fmsorion_FeeMgmt') or die(mysqli_error($mysqli));

if (isset($_POST['search'])){
	$RegistrationNumber = $_POST['RegistrationNumber'];
	$result = $mysqli->query("SELECT * FROM $table WHERE RegistrationNumber=$RegistrationNumber") or die($mysqli->error);
    
}
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
						<?php $row =$result->fetch_assoc()	?>
						<tr>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['phone']; ?></td>
							<td><?php echo $row['SVmno']; ?></td>
							<td><?php echo $row['RegistrationNumber']; ?></td>
							<td><?php echo $row['Course']; ?></td>
							<td><?php echo $row['Year']; ?></td>
							<td>
							    <a href="details1.php?view=<?php echo $row['id']; ?>" class="btn btn-primary">View Details</a>
								<a href="edit1.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">EDIT</a>
								<a onclick=" window.open('submitFee.php?edit=<?php echo $row['id']; ?>')" class="btn btn-info">Submit Fee</a>
							</td>
						</tr>
						
				</table>
				

		</div>




<div class="row justify-content-center">
		<tr>
			<td>
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" height="200" width="200" /> 
			</td>
			</tr>
			</div>
<br>
			<br>
<?php
function pre_r($array){
	echo '<pre>';
		print_r($array);
	echo '</pre>';
}
?>
</div>
</body>
<footer>
	
</footer>
</html>