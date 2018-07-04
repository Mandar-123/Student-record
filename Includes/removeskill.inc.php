<?php
	include 'dbh.inc.php';
	include_once 'checksession.inc.php';
	include_once 'checkIfStudent.inc.php';
	$id=$_SESSION['id'];
	$skill=$_POST['sk'];
	$skill=$skill.",";

	$sql="SELECT otherskills FROM skills WHERE rollNumber='$id';";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$string=$row['otherskills'];

	$string=str_replace($skill,"",$string);
	$sql="UPDATE skills SET otherskills='$string' WHERE rollNumber='$id';";
	mysqli_query($conn,$sql);
	exit();
?>
