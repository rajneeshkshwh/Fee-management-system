<?php session_start(); ?>
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
  <a href="search.php" class="btn btn-warning" style="float:left; margin-top:32px; margin-left:12px;">Cancel</a>
  <?php require_once 'process1.php'; ?>
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
<h2 style="margin-top: 100px;">Submit Fees</h2>
<hr><hr>

  <div class="row justify-content-center">
  

<form action="process1.php"  method="POST">
    <div class="form-group">

<input type="hidden" name="id" value="<?php echo $id; ?>">
    <label>Full Name</label><input type="text" class="form-control" name="name"  value="<?php echo $name; ?>" required>
  </div>
  <div class="form-group">
    <label for="phone">Phone Number</label><input type="tel" class="form-control" name="phone" value="<?php echo $phone; ?>" pattern="[0-9]{10}" required>
  </div>
<div class="container">
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          Fee Details
        </h4>
      </div>
      
        <div class="panel-body">
             <input type="hidden" class="form-control" name="RegistrationNumber" value="<?php echo $RegistrationNumber; ?>">
            <input type="hidden" class="form-control" name="Course" id="Course" value="<?php echo $Course; ?>" >
            <input type="hidden" class="form-control" name="subject" id="subject" value="<?php echo $subject; ?>" >
            <input type="hidden" class="form-control" name="Year" id="Year" value="<?php echo $Year; ?>" >
            <label>Gross Fees</label><input type="text" class="form-control" name="GrossFees" id="GrossFees" value="<?php echo $GrossFees; ?>"   readonly>
            
            <script>
    function calculate() {
      var x = document.getElementById("Course").value;
      var y = document.getElementById('Year').value;
      if (x=="B.A" ) {
        if ( y== 1) {document.getElementById("GrossFees").value = 4500;}
        else if (y== 2) {
        document.getElementById("GrossFees").value = 5000;
      }
      else if (y== 3) { document.getElementById("GrossFees").value = 5200;}
      else{
        alert("Choose course and year properly");
      }
      }
      if(x=="B.SC"){
        if(y== "MATH" || y == "BIO"){document.getElementById("GrossFees").value = 7500;}
        else{
        alert("Choose course and year properly");
      }
      }
      if(x=="M.SC"){
        if(y== "MATH" || y == "CHEMISTRY"){document.getElementById("GrossFees").value = 12500;}
        else{
        alert("Choose course and year properly");
      }
      }
      if(x=="M.A"){
        if(y== "HISTORY" || y == "ECONOMICS"){document.getElementById("GrossFees").value = 7000;}
        else if (y== "ENGLISH") {document.getElementById("GrossFees").value = 8000;}
        else if (y== "EDUCATION") {document.getElementById("GrossFees").value = 12500;}
        else if (y== "HINDI") {document.getElementById("GrossFees").value = 6000;}
        else{
        alert("Choose course and year properly");
      }
      }
      if(x=="B.ED"){
        if(y== 1){document.getElementById("GrossFees").value = 51250;}
        else if (y == 2) {document.getElementById("GrossFees").value = 30000;}
        else{
        alert("Choose course and year properly");
      }
      }
      if(x=="B.EL.ED"){
        if(y== 1 || y == 2 || y == 3 || y == 4){document.getElementById("GrossFees").value = 36000;}
        else{
        alert("Choose course and year properly");
      }
      }
      if(x=="M.COM"){
        if(y== 1 || y == 2 || y == 3 ){document.getElementById("GrossFees").value = 12500;}
        else{
        alert("Choose course and year properly");
      }
      }
      if(x=="B.COM"){
        if(y== 1 || y == 2 || y == 3 ){document.getElementById("GrossFees").value = 6500;}
        else{
        alert("Choose course and year properly");
      }
      }
    }
  </script>
            
             <label>Paid Fees</label><input type="number" class="form-control" name="PaidFees" id="PaidFees" value="<?php echo $PaidFees; ?>" >
            <label>Concession Remark</label><input type="text" class="form-control" name="ConcessionRemark" id="ConcessionRemark" value="<?php echo $ConcessionRemark; ?>" readonly>
            <label>Remaining</label><input type="text" class="form-control" name="Remaining" id="Remaining" value="<?php echo $Remaining; ?>" readonly ><a onclick="remaining()" style="cursor: pointer;" class="btn btn-default">Calculate</a>
            <br>
                       <label>Practical </label>
            <div class="form-check">
  <input class="form-check-input" type="radio" name="PracticalFees" id="PracticalFees" value="Present" checked><br>
  <label class="form-check-label" for="PracticalFees">
    Present
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="PracticalFees" id="PracticalFees" value="Absent"><br>
  <label class="form-check-label" for="PracticalFees">
    Absent
  </label>
</div>
            <label>TC/CC/Bonafide Degree (For final year student Only.)</label>
            <input type="text" class="form-control" name="TCCCBonafide"value="<?php echo $TCCCBonafide; ?>" >
        </div>
      </div>
    </div>
</div>
 <div class="form-group">
<button type="Submit" class="btn btn-info" name="fee">Submit</button>
  </div>

  </form>
</div>
</div>
 
 <script>
        function remaining() {
        var a = document.getElementById("GrossFees").value;
      var z = document.getElementById("PaidFees").value;
      var x = document.getElementById("ConcessionRemark").value;
      var p = document.getElementById("Remaining").value;
      if(p == 0){
      var d = x.match(/(\d+)/);
      var c = parseInt(a)-parseInt(z) -d[0];
      }
      else{
          
      var c = parseInt(p)-parseInt(z);
      }
      document.getElementById("Remaining").value = c;
    }
  </script>
<script >

</body>
<footer>
  
</footer>
</html>