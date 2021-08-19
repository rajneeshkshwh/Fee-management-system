<?php session_start(); ?>
<?php
$uid="fmsorion_CollegeAdmin";
$pass="Admin@2020";
	$_SESSION["uid"] = $uid;
 	$_SESSION["pass"] = $pass;
 $table = $_SESSION["table"];
 $_SESSION["user"] = "";

$mysqli = new mysqli('localhost:3306',$uid, $pass,'fmsorion_FeeMgmt') or die(mysqli_error($mysqli));
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

	header("location: details1.php?view=$id");
}
if (isset($_POST['reupdate'])){
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
    $GrossFees = $_POST['GrossFees'];
    $PaidFees = $_POST['PaidFees'];
    $ConcessionRemark = $_POST['ConcessionRemark'];
    $PracticalFees = $_POST['PracticalFees'];
    $Remaining = $_POST['Remaining'];
    $TCCCBonafide = $_POST['TCCCBonafide'];
   $mysqli->query("UPDATE $table SET name='$name',phone='$phone',SVmno='$SVmno',RegistrationNumber='$RegistrationNumber',DOB='$DOB',FathersMothername='$FathersMothername',ContactNumber2='$ContactNumber2',MotherName='$MotherName',Gender='$Gender',Cast='$Cast',subCast='$subCast',AdharNo='$AdharNo',DOJ='$DOJ',Address='$Address',Education='$Education',Course='$Course',subject='$subject',Year='$Year',GrossFees='$GrossFees',PaidFees='$PaidFees',ConcessionRemark='$ConcessionRemark',PracticalFees='$PracticalFees',Remaining='$Remaining',TCCCBonafide='$TCCCBonafide' WHERE id=$id") or die($mysqli->error());
	$_SESSION['message'] = "Successfully Saved in Ddatabase";
	$_SESSION['msg_type'] = "success";
	header("location: search.php");
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
	header("location: search.php");
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
?>