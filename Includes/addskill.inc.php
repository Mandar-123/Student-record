<?php
	include 'dbh.inc.php';
	include_once 'checksession.inc.php';
	include_once 'checkIfStudent.inc.php';
	$id=$_SESSION['id'];
	$skill=$_POST['os'];
	$sql="SELECT otherskills FROM skills WHERE rollNumber='$id';";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$skillstring=$row['otherskills'];
	echo $skillstring;
	if(strpos($skillstring,$skill)===false && $skill!="")
	{
		$skillstring=$skillstring.$skill.",";
		$sql="SELECT * FROM skills WHERE rollNumber = '$id'";
		$result = mysqli_query($conn, $sql);
		$resultCheck=mysqli_num_rows($result);
		if($resultCheck < 1)
		{
			$sql="INSERT INTO skills VALUES('$id', '');";
			mysqli_query($conn,$sql);
		}
		$sql="UPDATE skills SET otherskills='$skillstring' WHERE rollNumber='$id';";
		mysqli_query($conn,$sql);
	}
	exit();
?>
