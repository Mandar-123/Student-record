<?php
	include 'dbh.inc.php';
	include_once 'checksession.inc.php';
	include_once 'checkIfStudent.inc.php';
	$id=$_SESSION['id'];
	$interest=$_POST['intrem'];
	$interest=$interest.",";

	$sql="SELECT otherinterests FROM interests WHERE rollNumber='$id';";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$string=$row['otherinterests'];

	$string=str_replace($interest,"",$string);
	$sql="UPDATE interests SET otherinterests='$string' WHERE rollNumber='$id';";
	mysqli_query($conn,$sql);
	exit();
?>
