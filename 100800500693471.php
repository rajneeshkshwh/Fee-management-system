<?php session_start(); ?>
<?php
if (isset($_POST['login'])){
	$college = $_POST['College'];
	$_SESSION["table"] = $college;
 	$uid= $_POST['userid'];
	$pass = $_POST['password'];
	if ($college=="data1") {
		if ($uid== "SVM595" && $pass=="Svm595@2020") {
			header("location: student.php");
		}
		else{
		$_SESSION['message'] = "UserId and Password Missmatch";
		$_SESSION['msg_type'] = "Warning";
		header("location: user.php");
	}
	}
	else if ($college=="data2") {
	  if ($uid== "619JBI" && $pass=="619Jbi@2486") {
			header("location: student.php");
		}
		else{
		$_SESSION['message'] = "UserId and Password Missmatch";
		$_SESSION['msg_type'] = "Warning";
		header("location: user.php");
	}
	}
	else if ($college=="data3") {
		if ($uid== "SV807LC" && $pass=="Sv807@656lc") {
			header("location: student.php");
		}
		else{
		$_SESSION['message'] = "UserId and Password Missmatch";
		$_SESSION['msg_type'] = "Warning";
		header("location: user.php");
	}
	}
	else if ($college=="data4") {
		if ($uid== "646JBCL" && $pass=="646@0120Jbcl") {
			header("location: student.php");
		}
		else{
		$_SESSION['message'] = "UserId and Password Missmatch";
		$_SESSION['msg_type'] = "Warning";
		header("location: user.php");
	}
	}
	else if ($college=="data5") {
		if ($uid== "602JBM2020" && $pass=="3021Jbm@602") {
			header("location: student.php");
		}
		else{
		$_SESSION['message'] = "UserId and Password Missmatch";
		$_SESSION['msg_type'] = "Warning";
		header("location: user.php");
	}
	}
	else if ($college=="data6") {
		if ($uid== "BRALC503" && $pass=="BRA@503LC") {
			header("location: student.php");
		}
		else{
		$_SESSION['message'] = "UserId and Password Missmatch";
		$_SESSION['msg_type'] = "Warning";
		header("location: user.php");
	}
	}
	else if ($college=="data7") {
		if ($uid== "645BRAM" && $pass=="645@BRAm852") {
			header("location: student.php");
		}
		else{
		$_SESSION['message'] = "UserId and Password Missmatch";
		$_SESSION['msg_type'] = "Warning";
		header("location: user.php");
	}
	}
	else if ($college=="data8") {
		if ($uid== "JBM817M" && $pass=="Jbm817m@486") {
			header("location: student.php");
		}
		else{
		$_SESSION['message'] = "UserId and Password Missmatch";
		$_SESSION['msg_type'] = "Warning";
		header("location: user.php");
	}
	}
	else{
		$_SESSION['message'] = "UserId and Password Missmatch";
		$_SESSION['msg_type'] = "Warning";
		header("location: user.php");
	}
	
	
}