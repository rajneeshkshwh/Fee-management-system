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
  <a href="home.php" class="btn btn-warning" style="float:left; margin-top:32px; margin-left:12px;">Cancel</a>
  <?php require_once 'process.php'; ?>

  <?php
    if(isset($_SESSION['message'])): ?>

<div class="alert alert-<?=$_SESSION['msg_type']?>">
  <?php
  echo $_SESSION['message'];
  unset($_SESSION['message']);
  ?>
</div>
<?php endif ?>

<?php
$userid = $_SESSION["uid"];
 $table     = $_SESSION["table"];
 ?>
<div class="container">
<h2 style="margin-top: 100px;">ADD DETAILS</h2>
<hr><hr>
<input type="hidden" name="table" id="table" value="<?php echo $table; ?>" >
  <div class="row justify-content-center">
  <form action="process.php" enctype="multipart/form-data" method="POST">
    <div class="form-group">
    <label>Full Name</label><input type="text" class="form-control" name="name" value="<?php echo $name; ?>"  placeholder ="Enter Name" required>
  </div>
  <div class="form-group">
    <label for="phone">Phone Number</label><input type="tel" class="form-control" name="phone" value="<?php echo $phone; ?>" pattern="[0-9]{10}" placeholder="Enter Phone Number" required>
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
            <label>SVm no</label><input type="text" class="form-control" name="SVmno" placeholder ="Generate after Submittion" readonly>
            <label>Registration Number</label><input type="text" class="form-control" name="RegistrationNumber" id="RegistrationNumber" placeholder ="Enter Registration Number" required >
            <label>Dob</label><input type="date" class="form-control" name="DOB" placeholder ="Enter Date Of Birth" required>
            <label>Father's Name</label><input type="text" class="form-control" name="FathersMothername" placeholder ="Enter Fathers name" required>
             <label>Father's Phone</label><input type="tel" class="form-control" name="ContactNumber2" placeholder ="Enter Contact Number- 2" pattern="[0-9]{10}" required>
             <label>Mother's Name</label><input type="text" class="form-control" name="MotherName" placeholder ="Enter Mother name" required>
            <label>Gender(M/F)</label>
            <input type="radio" id="male" name="Gender" value="male" required>
            <label for="male">Male</label>
            <input type="radio" id="female" name="Gender" value="female">
            <label for="female">Female</label><br><br>
            <label>Cast /Category</label>
            <select name="Cast" id="Cast" required>
                <option value="" >Select Cast</option>
                <option value="General" >General</option>
                <option value ="SC/ST" >SC/ST</option>
                <option value="OBC" >OBC</option>
            </select><br><br>
            
            <label>Sub Cast</label><input type="text" class="form-control" name="subCast" placeholder ="Enter Sub Cast" >
            <label>AAdhar Details</label><input type="text" class="form-control" name="AdharNo" placeholder ="Enter AAdhar Details" required>
             <label>Date OF Joining</label><input type="date" class="form-control" name="DOJ" placeholder ="Enter Date Of Joining" required>
            <label>Address</label><input type="text" class="form-control" name="Address" placeholder ="Enter Address" required><br>
            <label>Education Qualification</label>
            <select name="Education" id="Education" required>
                <option value="" >Select Education</option>
                <option value="10th pass" >10 th PASS</option>
                <option value ="12th pass" >12 th PASS</option>
                <option value="Graduation" >Graduation</option>
            </select><br><br>
            <label>Course</label>
            <select name="Course" id="Course" required>
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
            <br><br>
            <label>Subject</label>
            <select name="subject" id="subject">
            <option value="">Select Subject</option>
            <option value="EDUCATION">EDUCATION</option>
            <option value="ENGLISH">ENGLISH</option>
            <option value="HINDI">HINDI</option>
            <option value="HISTORY">HISTORY</option>
            <option value="ECONOMICS">ECONOMICS</option>
            <option value="MATH">MATH</option>
            <option value="BIO">BIO</option>
            <option value="CHEMISTRY">CHEMISTRY</option>
            </select>
            <br><br>
            <label>Year</label>
            <select name="Year" id="Year" required>
            <option value="">Select Year</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            </select>
            
            <br><br>
            <label>Photo</label><input type="file" name="image" id="image" onchange="return ValidateFileUpload()" ><br>
        </div>
      </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          Fee Details
        </h4>
      </div>
        <div class="panel-body">
            <label>Gross Fees</label><input type="number" class="form-control" name="GrossFees" id="GrossFees" placeholder ="Enter Gross Fees" readonly><a onclick="calculate()" style="cursor: pointer;" class="btn btn-default">Calculate</a><br>
            <label>Paid Fees</label><input type="number" class="form-control" name="PaidFees" id="PaidFees" placeholder ="Enter Paid Fees">
            <label>Concession Remark</label><input type="text" class="form-control" name="ConcessionRemark" id="ConcessionRemark" placeholder ="Enter  Only name">
            <label>Remaining</label><input type="number" class="form-control" name="Remaining" id="Remaining" placeholder ="Enter  Remaining"readonly><a onclick="remaining()" style="cursor: pointer;" class="btn btn-default">Calculate</a><br>
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
<br>
<br>
            <div class="form-check">
            <label class="form-check-label" for="TC/CC/Bonafide Degree">TC/CC/Bonafide Degree (For final year student Only.)</label>
            <input type="checkbox" class="form-check-input" name="TCCCBonafide">
             </div>
        </div>
      </div>
    </div>
 <div class="form-group">
<button type="Submit" class="btn btn-primary"name="save">Save</button>
  </div>
  </form>
</div>
</div>
</div>
  <script>
    function calculate() {
      var x = document.getElementById("Course").value;
      var y = document.getElementById('Year').value;
      var z = document.getElementById('subject').value;
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
        if(y== 1 || y == 2 || y== 3){document.getElementById("GrossFees").value = 7500;}
        else{
        alert("Choose course and year properly");
      }
      }
      if(x=="M.SC"){
        if(y== 1 || y == 2){document.getElementById("GrossFees").value = 12500;}
        else{
        alert("Choose course and year properly");
      }
      }
      if(x=="M.A"){
        if(z== "HISTORY" || z == "ECONOMICS"){document.getElementById("GrossFees").value = 7000;}
        else if (z== "ENGLISH") {document.getElementById("GrossFees").value = 8000;}
        else if (z== "EDUCATION") {document.getElementById("GrossFees").value = 12500;}
        else if (z== "HINDI") {document.getElementById("GrossFees").value = 6000;}
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
  <script>
        function remaining() {
        var a = document.getElementById("GrossFees").value;
      var z = document.getElementById("PaidFees").value;
      var x = document.getElementById("ConcessionRemark").value;
      var d = x.match(/(\d+)/);
      var c = parseInt(a)-parseInt(z) -d[0];
      document.getElementById("Remaining").value = c;
    }
  </script>
<script >
    function ValidateFileUpload() {
        var fuData = document.getElementById('image');
        var FileUploadPath = fuData.value;

//To check if user upload any file
        if (FileUploadPath == '') {
            alert("Please upload an image");

        } else {
            var Extension = FileUploadPath.substring(
                    FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

//The file uploaded is an image

if (Extension == "gif" || Extension == "png" || Extension == "bmp"
                    || Extension == "jpeg" || Extension == "jpg") {

// To Display
                if (fuData.files && fuData.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(fuData.files[0]);
                }

            } 

//The file upload is NOT an image
else {
                alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP. ");

            }
        }
    }
</script>





</body>
<footer>
  
</footer>
</html>