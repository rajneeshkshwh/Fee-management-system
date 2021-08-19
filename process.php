<?php session_start(); ?>
<?php
if (isset($_POST['login'])){
 	$uid= $_POST['userid'];
	$pass = $_POST['password'];
	$table = $_POST['College'];
	$_SESSION["uid"] = $uid;
 	$_SESSION["pass"] = $pass;
 	$_SESSION["table"] = $table;
 	$_SESSION["user"] = $user;
	header("location: home.php");
}
 $userid = $_SESSION["uid"];
 $password = $_SESSION["pass"];
 $table     = $_SESSION["table"];

$mysqli = new mysqli('localhost:3306',$userid, $password,'fmsorion_FeeMgmt') or die(mysqli_error($mysqli));
$update = false;
$name = '';
$phone = '';

if (isset($_POST['save'])){
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$SVmno = $_POST['SVmno'];
	$RegistrationNumber = $_POST['RegistrationNumber'];
	$DOB = $_POST['DOB'];
	$FathersMothername = $_POST['FathersMothername'];
	$ContactNumber2 = $_POST['ContactNumber2'];
	$MotherName= $_POST['MotherName'];
	$Gender = $_POST['Gender'];
	$Cast  = $_POST['Cast'];
	$subCast = $_POST['subCast'];
	$AdharNo = $_POST['AdharNo'];
	$DOJ = $_POST['DOJ'];
	$Address = $_POST['Address'];
	$Education = $_POST['Education'];
	$Course = $_POST['Course'];
	$subject = $_POST['subject'];
	$Year = $_POST['Year'];
	$image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image));
    $GrossFees = $_POST['GrossFees'];
    $PaidFees = $_POST['PaidFees'];
    $ConcessionRemark = $_POST['ConcessionRemark'];
    $PracticalFees = $_POST['PracticalFees'];
    $Remaining = $_POST['Remaining'];
    $TCCCBonafide = $_POST['TCCCBonafide'];


	$mysqli->query("INSERT INTO $table(name,phone,SVmno,RegistrationNumber,DOB,FathersMothername,ContactNumber2,MotherName,Gender,Cast,subCast,AdharNo,DOJ,Address,Education,Course,subject,Year,image,GrossFees,PaidFees,ConcessionRemark,PracticalFees,Remaining,TCCCBonafide) VALUES('$name', '$phone','$SVmno','$RegistrationNumber','$DOB','$FathersMothername','$ContactNumber2','$MotherName','$Gender','$Cast','$subCast','$AdharNo','$DOJ','$Address','$Education','$Course','$subject','$Year','$imgContent','$GrossFees','$PaidFees','$ConcessionRemark','$PracticalFees','$Remaining','$TCCCBonafide')") or die(mysqli_error($mysqli));

	$_SESSION['message'] = "record has been saved!";
	$_SESSION['msg_type'] = "success";
	$result = $mysqli->query("SELECT * FROM $table WHERE RegistrationNumber=$RegistrationNumber") or die($mysqli->error);
	$row =$result->fetch_assoc();
	$id =  $row['id'];

	header("location: details.php?view=$id");
}


if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM $table WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "record has been deleted!";
	$_SESSION['msg_type'] = "danger";

	header("location: home.php");
}

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $result = $mysqli->query("SELECT * FROM $table WHERE id=$id") or die($mysqli->error);
    if(count($result)==1){
        $row = $result->fetch_array();
        $name = $row['name'];
	$phone = $row['phone'];
	$SVmno = $row['SVmno'];
	$RegistrationNumber = $row['RegistrationNumber'];
	$DOB = $row['DOB'];
	$FathersMothername = $row['FathersMothername'];
	$ContactNumber2 = $row['ContactNumber2'];
	$MotherName= $row['MotherName'];
	$Gender = $row['Gender'];
	$Cast  = $row['Cast'];
	$subCast = $row['subCast'];
	$AdharNo = $row['AdharNo'];
	$DOJ = $row['DOJ'];
	$Address = $row['Address'];
	$Education = $row['Education'];
	$Course = $row['Course'];
	$subject=$row['subject'];
	$Year = $row['Year'];
    $GrossFees = $row['GrossFees'];
    $PaidFees = $row['PaidFees'];
    $ConcessionRemark = $row['ConcessionRemark'];
    $PracticalFees = $row['PracticalFees'];
    $Remaining = $row['Remaining'];
    $TCCCBonafide = $row['TCCCBonafide'];
    }
}

if (isset($_POST['update'])){
    $id = $_POST['id'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$SVmno = $_POST['SVmno'];
	$RegistrationNumber = $_POST['RegistrationNumber'];
	$DOB = $_POST['DOB'];
	$FathersMothername = $_POST['FathersMothername'];
	$ContactNumber2 = $_POST['ContactNumber2'];
	$MotherName= $_POST['MotherName'];
	$Gender = $_POST['Gender'];
	$Cast  = $_POST['Cast'];
	$subCast = $_POST['subCast'];
	$AdharNo = $_POST['AdharNo'];
	$DOJ = $_POST['DOJ'];
	$Address = $_POST['Address'];
	$Education = $_POST['Education'];
	$Course = $_POST['Course'];
	$subject=$_POST['subject'];
	$Year = $_POST['Year'];
	$image = $_FILES['image']['tmp_name']; 
    $imgContent = addslashes(file_get_contents($image));
    $GrossFees = $_POST['GrossFees'];
    $PaidFees = $_POST['PaidFees'];
    $ConcessionRemark = $_POST['ConcessionRemark'];
    $PracticalFees = $_POST['PracticalFees'];
    $Remaining = $_POST['Remaining'];
    $TCCCBonafide = $_POST['TCCCBonafide'];
   $mysqli->query("UPDATE $table SET name='$name',phone='$phone',SVmno='$SVmno',RegistrationNumber='$RegistrationNumber',DOB='$DOB',FathersMothername='$FathersMothername',ContactNumber2='$ContactNumber2',MotherName='$MotherName',Gender='$Gender',Cast='$Cast',subCast='$subCast',AdharNo='$AdharNo',DOJ='$DOJ',Address='$Address',Education='$Education',Course='$Course',subject='$subject',Year='$Year',image='$imgContent',GrossFees='$GrossFees',PaidFees='$PaidFees',ConcessionRemark='$ConcessionRemark',PracticalFees='$PracticalFees',Remaining='$Remaining',TCCCBonafide='$TCCCBonafide' WHERE id=$id") or die($mysqli->error());
	$_SESSION['message'] = "record has been Updated!";
	$_SESSION['msg_type'] = "Warning";

	header("location: home.php");
}
if (isset($_POST['fee'])){
    $id = $_POST['id'];
	$Course = $_POST['Course'];
	$subject=$_POST['subject'];
	$Year = $_POST['Year'];
    $GrossFees = $_POST['GrossFees'];
    $PaidFees = $_POST['PaidFees'];
    $ConcessionRemark = $_POST['ConcessionRemark'];
    $PracticalFees = $_POST['PracticalFees'];
    $Remaining = $_POST['Remaining'];
    $TCCCBonafide = $_POST['TCCCBonafide'];
   $mysqli->query("UPDATE $table SET Course='$Course',subject='$subject',Year='$Year',GrossFees='$GrossFees',PaidFees='$PaidFees',ConcessionRemark='$ConcessionRemark',PracticalFees='$PracticalFees',Remaining='$Remaining',TCCCBonafide='$TCCCBonafide' WHERE id=$id") or die($mysqli->error());
	$_SESSION['message'] = "record has been Updated!";
	$_SESSION['msg_type'] = "Warning";

	header("location: Fee.php?fee=$id");
}
if (isset($_POST['enter'])){
     $id = $_POST['id'];
	$SVmno = $_POST['SVmno'];
   $mysqli->query("UPDATE $table SET SVmno='$SVmno' WHERE id=$id") or die($mysqli->error());
	header("location: home.php");
}
if (isset($_POST['log'])){
     $id = $_POST['id'];
    $receiptno =$_POST['receiptno'];
    $datetime = $_POST['datetime'];
    $svmno = $_POST['svmno'];
    $user = $_POST['user'];
	$mysqli->query("INSERT INTO fee(receiptno,datetime,svmno,user) VALUES('$receiptno','$datetime','$svmno','$user')") or die(mysqli_error($mysqli));
	header("location: Fee.php?fee=0");
}
if (isset($_GET['remove'])){
	$id = $_GET['remove'];
	$mysqli->query("DELETE FROM fee WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Log has been deleted!";
	$_SESSION['msg_type'] = "danger";

	header("location: home.php");
}
?>