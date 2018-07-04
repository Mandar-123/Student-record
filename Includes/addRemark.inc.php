<?php
	include 'dbh.inc.php';
	include_once 'checksession.inc.php';
	include_once 'checkIfFaculty.inc.php';
	$id=$_SESSION['id'];
	$rem=$_POST['rem'];
	$ro = $_POST['rollNum'];
	$name = $_SESSION['name'];
	$dateInst = getdate();
	$dateOfPost = $dateInst['mday'].'/'.$dateInst['mon'].'/'.$dateInst['year'];
	$query ="SELECT * FROM remark WHERE roll ='$ro' ORDER BY num DESC;";
	$result = mysqli_query($conn, $query);
	$num = 1;
	$isPositive = $_POST['isPositive'];
	if(mysqli_num_rows($result) != 0){
		$row=mysqli_fetch_assoc($result);
		$num = $row['num'] + 1;
	}
	if($rem == '')
	{
		echo "Please enter the remark!";
		exit();
	}

	$sql="INSERT INTO remark(roll, num, dateOfRem, prof, rem, isPositive) VALUES('$ro', $num,'$dateOfPost', '$name', '$rem', $isPositive);";
	if(mysqli_query($conn,$sql))
		echo "Remark Posted!";
	else echo "Failed to post the Remark!";

?>
