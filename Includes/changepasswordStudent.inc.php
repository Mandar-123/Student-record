<?php
	include 'dbh.inc.php';
	include_once 'checksession.inc.php';
	include_once 'checkIfStudent.inc.php';
	$id=$_SESSION['id'];
	$currpass=mysqli_real_escape_string($conn,$_POST['currpass']);
	$newpass=mysqli_real_escape_string($conn,$_POST['newpass']);
	$renewpass=mysqli_real_escape_string($conn,$_POST['renewpass']);

	$sql="SELECT * FROM student WHERE rollNumber='$id';";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$hashedPwdCheck=password_verify($currpass,$row['pass']);
	if($hashedPwdCheck==false)
	{
		echo "Current password incorrect";
		exit();
	}
	else if(strlen($newpass)==0 || strlen($renewpass)==0)
	{
		echo "Please Enter all details";
		exit();
	}
	else if(strcmp($newpass,$renewpass)!=0)
	{
		echo "Passwords do not match";
		exit();
	}

	else
	{
		$hashedPwd=password_hash($newpass,PASSWORD_DEFAULT);
		$sql1="Update student SET pass = '$hashedPwd' WHERE rollNumber= '$id';";
		if(mysqli_query($conn,$sql1))
			echo "Password Changed";
		else echo "Password Change Failed";
		exit();
	}
?>
