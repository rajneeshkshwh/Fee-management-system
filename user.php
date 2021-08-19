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
</head>
<style>
	body{
		background: url(images/153054.jpg);
		background-repeat: no-repeat;
  		background-attachment: fixed;
 		background-size: cover;
	}
</style>
<body>

	<?php require_once '100800500693471.php'; ?>
	<?php
		if(isset($_SESSION['message'])): ?>

<div class="alert alert-<?=$_SESSION['msg_type']?>">
	<?php
	echo $_SESSION['message'];
	unset($_SESSION['message']);
	?>
</div>
<?php endif ?>
	<div class="container">
	<div class="row justify-content-center">
	<h1>Fees Management System</h1>

<form action="100800500693471.php" method="POST">
	
<div class="form-group" style="margin-top: 100px;" >
	<h1><b>USER Login</b></h1>
    <select class="form-control" name="College" id="College">

    	<option name="College" id="College">Select College</option>
    <option value="data1">595-Swami vivekanand Mahavidyalaya,Prem Nagar Jhansi</option>
    <option value="data2">619-Jai Bundelkhand Institute, Babina Jhansi</option>
    <option value="data3">807-Swami vivekanand Law College,Prem Nagar Jhansi</option>
    <option value="data4">646-Jai Bundelkhand College of Law,Panari Lalitpur</option>
    <option value="data5">602-Jai Bundelkhand Mahavidyalaya, Kulpahar Mahoba</option>
    <option value="data6">503-Dr. B.R. Ambedkar Law College, Girwan Banda</option>
    <option value="data7">645-Dr. B.R. Ambedkar Mahavidyalaya, Girwan Banda</option>
    <option value="data8">817-Jai Bundelkhand Mahaveer Mahavidyalaya, Khohi Banda</option>
 </select>
  </div>
<br>
<div class="form-group">
<label>UserID</label><input type="text" class="form-control" name="userid" id="userid"></div>
<div class="form-group">
<label>Password</label><input type="Password" class="form-control" name="password" id="password"></div>
<div class="form-group">
    <button type="Submit" class="btn btn-primary"name="login">LOGIN</button>
  </div>

</form>
</div>
</div>
</body>
<footer>
	
</footer>
</html>