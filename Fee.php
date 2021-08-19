<?php session_start(); ?>
<html>
<head>
    	<meta charset="utf-8">
	<title id="title">Receipt</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<style>
table {
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  width:50%;
  height:50px;
}
</style>
</head>
<body>
<div class="container">
 <?php
$userid = $_SESSION["uid"];
 $password = $_SESSION["pass"];
 $table     = $_SESSION["table"];
 $user = $_SESSION["user"];
if($user == "fmsorion_CollegeAdmin"){
    $user ="ADMIN";
    if($table=="data1"){
     $cName= "SWAMI VIVEKANAND MAHAVIDHYALAY NAGAR JHANSI";
 }
 if($table=="data2"){
     $cName= "Jai Bundelkhand Institute, Babina Jhansi";
 }
 if($table=="data3"){
     $cName= "Swami vivekanand Law College,Prem Nagar Jhansi";
 }
 if($table=="data4"){
     $cName= "Jai Bundelkhand College of Law,Panari Lalitpur";
 }
 if($table=="data5"){
     $cName= "Jai Bundelkhand Mahavidyalaya, Kulpahar Mahoba";
 }
 if($table=="data6"){
     $cName= "Dr. B.R. Ambedkar Law College, Girwan Banda";
 }
 if($table=="data7"){
     $cName= "Dr. B.R. Ambedkar Mahavidyalaya, Girwan Banda";
 }
 if($table=="data8"){
     $cName= "Jai Bundelkhand Mahaveer Mahavidyalaya, Khohi
                  Banda";
 }
}
else{
if($table=="data1"){
     $user="SVM595";
     $cName= "SWAMI VIVEKANAND MAHAVIDHYALAY NAGAR JHANSI";
 }
 if($table=="data2"){
     $user="619JBI";
     $cName= "Jai Bundelkhand Institute, Babina Jhansi";
 }
 if($table=="data3"){
     $user="SV807LC";
     $cName= "Swami vivekanand Law College,Prem Nagar Jhansi";
 }
 if($table=="data4"){
     $user="646JBCL";
     $cName= "Jai Bundelkhand College of Law,Panari Lalitpur";
 }
 if($table=="data5"){
     $user="602JBM2020";
     $cName= "Jai Bundelkhand Mahavidyalaya, Kulpahar Mahoba";
 }
 if($table=="data6"){
     $user="BRALC503";
     $cName= "Dr. B.R. Ambedkar Law College, Girwan Banda";
 }
 if($table=="data7"){
     $user="645BRAM";
     $cName= "Dr. B.R. Ambedkar Mahavidyalaya, Girwan Banda";
 }
 if($table=="data8"){
     $user="JBM817M";
     $cName= "Jai Bundelkhand Mahaveer Mahavidyalaya, Khohi
                  Banda";
 }

}
$mysqli = new mysqli('localhost:3306',$userid, $password,'fmsorion_FeeMgmt') or die(mysqli_error($mysqli));

if (isset($_GET['fee'])){
  $id = $_GET['fee'];
  $result = $mysqli->query("SELECT * FROM $table WHERE id=$id") or die($mysqli->error);
   } 
?>
<?php $row =$result->fetch_assoc()  ?>
<script>
function script(){
    var today = new Date();
var date = today.getFullYear()+''+(today.getMonth()+1)+''+today.getDate();
var time = today.getHours() + "" + today.getMinutes() + "" + today.getSeconds();
var dateTime = date+''+time;
document.getElementById("Rnumber").innerHTML = dateTime;
document.getElementById("Rnumber2").innerHTML = dateTime;
document.getElementById("receiptno").value = dateTime;
var date1 = today.getFullYear()+'/'+(today.getMonth()+1)+'/'+today.getDate();
var time1 =new Date().toLocaleTimeString('en-US', { hour: 'numeric', hour12: true, minute: 'numeric' });
var datetime = date1+'-'+time1;
document.getElementById("datetime").value = datetime;
var o =document.getElementById("user1").innerHTML;
document.getElementById("user").value =o;
var p =document.getElementById("svmno").value;
document.getElementById("title").innerHTML = p +''+"receipt" ;
}
</script>
<p >Reciept Number:- <a id="Rnumber" onclick="script()">Generate Receipt number</a></p>
<div class="row justify-content-center">
    <p>Student copy</p>
    </div>
	<div class="row justify-content-center">
	    <h4><?php echo $cName; ?></h4>
	    <h5 id="user1" style="display:none;"><?php echo $user; ?></h5>
	    </div>
	    <div class="row justify-content-center">
        <h2>Fee Receipt</h2>
        </div>
<div class="row justify-content-center">
<table >
  <tr>
    <td>Name</td>
    <td><?php echo $row['name']; ?></td>
    
  </tr>
  <tr>
    <td>SVM no</td>
    <td><?php echo $row['SVmno']; ?></td>
  </tr>
  <tr>
    <td>Course</td>
    <td><?php echo $row['Course']; ?></td>
  </tr>
    <tr>
    <td>Fathers Name</td>
    <td><?php echo $row['FathersMothername']; ?></td>
  </tr>
  <tr>
    <td>Mobile Number</td>
    <td><?php echo $row['phone']; ?></td>
  </tr>
    <tr>
    <td>Subject</td>
    <td><?php echo $row['subject']; ?></td>
  </tr>
  <tr>
    <td>Gross Fee</td>
    <td><?php echo $row['GrossFees']; ?></td>
  </tr>
  <tr>
    <td>Paid Fee</td>
    <td><?php echo $row['PaidFees']; ?></td>
  </tr>
  <tr>
    <td>Concession/Remark</td>
    <td><?php echo $row['ConcessionRemark']; ?></td>
  </tr>
  <tr>
    <td>Remaining</td>
    <td><?php echo $row['Remaining']; ?></td>
  </tr>
</table>
</div>
<br>
<br>
<br>
<br>

<h3 style="float:left;">Clerk Sign</h3>
<h3 style="float:right;">Student Sign</h3>
<br>
<br>

<div style="height:800px"></div>
<p >Reciept Number:- <a id="Rnumber2" >Generate Receipt number</a></p>
<div class="row justify-content-center">
<p>Office Copy</p>
</div>
	<div class="row justify-content-center">
	    
	    <h4><?php echo $cName; ?></h4>
	    <h5 id="user1" style="display:none;"><?php echo $user; ?></h5>
	    </div>
	    <div class="row justify-content-center">
        <h2>Fee Receipt</h2>
        </div>
<div class="row justify-content-center">
<table >
  <tr>
    <td>Name</td>
    <td><?php echo $row['name']; ?></td>
    
  </tr>
  <tr>
    <td>SVM no</td>
    <td><?php echo $row['SVmno']; ?></td>
  </tr>
  <tr>
    <td>Course</td>
    <td><?php echo $row['Course']; ?></td>
  </tr>
      <tr>
    <td>Fathers Name</td>
    <td><?php echo $row['FathersMothername']; ?></td>
  </tr>
  <tr>
    <td>Mobile Number</td>
    <td><?php echo $row['phone']; ?></td>
  </tr>
    <tr>
    <td>Subject</td>
    <td><?php echo $row['subject']; ?></td>
  </tr>
  <tr>
    <td>Gross Fee</td>
    <td><?php echo $row['GrossFees']; ?></td>
  </tr>
  <tr>
    <td>Paid Fee</td>
    <td><?php echo $row['PaidFees']; ?></td>
  </tr>
  <tr>
    <td>Concession/Remark</td>
    <td><?php echo $row['ConcessionRemark']; ?></td>
  </tr>
  <tr>
    <td>Remaining</td>
    <td><?php echo $row['Remaining']; ?></td>
  </tr>
</table>
</div>
<br>
<br>
<br>
<br>

<h3 style="float:left;">Clerk Sign</h3>
<h3 style="float:right;">Student Sign</h3>
<br>
<br>
<form action="process.php" method="POST">
    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
    <input type="hidden" name="receiptno" id="receiptno">
    <input type="hidden" name="datetime" id="datetime">
    <input type="hidden" name="svmno" id="svmno" value="<?php echo $row['RegistrationNumber']; ?>">
    <input type="hidden" name="user" id="user"  >

<div class="row justify-content-center">
<button type="submit" onclick="window.print()" name="log">Print</button>
</div>
</form>
</div>
</body>
</html>
