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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>  
  <?php require_once 'process.php'; ?>

<div class="container">
<h2 style="margin-top: 100px;">REVIEW YOUR DETAILS</h2>
<hr><hr>
 <?php
$userid = $_SESSION["uid"];
 $password = $_SESSION["pass"];
 $table     = $_SESSION["table"];

$mysqli = new mysqli('localhost:3306',$userid, $password,'fmsorion_FeeMgmt') or die(mysqli_error($mysqli));

if (isset($_GET['view'])){
  $id = $_GET['view'];
  $result = $mysqli->query("SELECT * FROM $table WHERE id=$id") or die($mysqli->error);
   } 
?>
  <div class="row justify-content-center">
<input type="hidden" name="table" id="table" value="<?php echo $table; ?>" >

  <form action="process.php" method="POST">
   <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
    <div class="form-group">

      <?php $row =$result->fetch_assoc()  ?>
    <label>Full Name</label><input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" readonly>
  </div>
  <div class="form-group">
    <label>Phone Number</label><input type="number" class="form-control" name="phone" value="<?php echo $row['phone']; ?>" readonly>
  </div>
<div class="container">
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          Student Details
        </h4>
      </div>
      
        <div class="panel-body">
           
             <label>SVm no</label><input type="text" class="form-control" name="SVmno" id="SVmno" value="<?php echo $SVmno; ?>" required readonly><a onclick="pad();" style="cursor: pointer;" class="btn btn-default">Fill SVM No.</a><br>
            
            <script>
            function pad() {
                var s = document.getElementById("id").value;
                var table = document.getElementById("table").value;
                var size = 5;
 while (s.length < (size || 2)) {s = "0" + s;}
  if(table == "data"){
  var r ="demo"+''+s;
 }
 if(table == "data1"){
  var r ="SWVM595"+''+s;
 }
  if(table == "data2"){
  var r ="JBIB619"+''+s;
 }
 if(table == "data3"){
  var r ="JBLP646"+''+s;
 }
 if(table == "data4"){
  var r ="JBMK602"+''+s;
 }
 if(table == "data5"){
  var r ="BRAB645"+''+s;
 }
 if(table == "data6"){
  var r ="SVLJ708"+''+s;
 }
 if(table == "data7"){
  var r ="BRAL503"+''+s;
 }
 if(table == "data8"){
  var r ="JBMM814"+''+s;
 }
  document.getElementById("SVmno").value = r;
}
</script>
            <label>Registration Number</label><input type="text" class="form-control" name="Registration Number" value="<?php echo $row['RegistrationNumber']; ?>" readonly>
            <label>Dob</label><input type="date" class="form-control" name="DOB" value="<?php echo $row['DOB']; ?>" readonly>
            <label>Fathers/Mother name</label><input type="text" class="form-control" name="Fathers/Mother name" value="<?php echo $row['FathersMothername']; ?>" readonly>
             <label>Father's Phone</label><input type="text" class="form-control" name="Contact Number- 2" value="<?php echo $row['ContactNumber2']; ?>" readonly>
            <label>Mother's Name</label><input type="text" class="form-control" name="Mothername" value="<?php echo $row['MotherName']; ?>" readonly>
            <label>Gender(M/F)</label><input type="text" class="form-control" name="Gender" value="<?php echo $row['Gender']; ?>" readonly>
            <label>Cast /Category</label><input type="text" class="form-control" value="<?php echo $row['Cast']; ?>" readonly>
            <label>Sub Cast</label><input type="text" class="form-control" name="subCast" value="<?php echo $row['subCast']; ?>" readonly>
            <label>AAdhar Details</label><input type="text" class="form-control" name="AdharNo" value="<?php echo $row['AdharNo']; ?>" readonly>
             <label>Date OF Joining</label><input type="date" class="form-control" name="DOJ" value="<?php echo $row['DOJ']; ?>" readonly>
            <label>Address</label><input type="text" class="form-control" name="Address" value="<?php echo $row['Address']; ?>" readonly><br>
            <label>Education Qualification</label><input type="text" class="form-control" name="Education" value="<?php echo $row['Education']; ?>" readonly><br>
            <label>Course</label><input type="text" class="form-control" name="course" value="<?php echo $row['Course']; ?>" readonly><br>
            <label>Subject</label><input type="text" class="form-control" name="course" value="<?php echo $row['subject']; ?>" readonly><br>
           <label>Year</label><input type="text" class="form-control" name="Year" value="<?php echo $row['Year']; ?>" readonly><br>
            <br>
        </div>
      </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          Fee Details
        </h4>
      </div>
        <div class="panel-body">
            <label>Gross Fees</label><input type="number" class="form-control" name="Gross Fees" value="<?php echo $row['GrossFees']; ?>" readonly><br>
            <label>Paid Fees</label><input type="number" class="form-control" name="Paid Fees" value="<?php echo $row['PaidFees']; ?>" readonly>
            <label>Concession Remark</label><input type="text" class="form-control" name="Concession Remark" value="<?php echo $row['ConcessionRemark']; ?>" readonly>
            <label>Remaining</label><input type="number" class="form-control" name="Remaining" value="<?php echo $row['Remaining']; ?>" readonly><br>
            <label>Practical Fees</label><input type="text" class="form-control" name="Practical Fees" value="<?php echo $row['PracticalFees']; ?>" readonly>
           
            <label>TC/CC/Bonafide Degree (For final year student Only.)</label>
            <input type="text" class="form-control" id="TC/CC/Bonafide Degree" value="<?php echo $row['TCCCBonafide']; ?>" readonly>
             
            
        </div>
      </div>
    </div>
    </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary" name="enter">Save</button>
    <a href="edit.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">EDIT</a>
    <a href="home.php" class="btn btn-warning">HOME</a>
  </div>
  </form>
</div>
</div>
</body>
<footer>
  
</footer>
</html>