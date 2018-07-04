<?php
	include 'dbh.inc.php';
	include_once 'checksession.inc.php';
	include_once 'checkIfStudent.inc.php';
	$id=$_SESSION['id'];
	$interest=$_POST['int'];
	$sql="SELECT otherinterests FROM interests WHERE rollNumber='$id';";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$intereststring=$row['otherinterests'];
	echo $intereststring;
	if(strpos($intereststring,$interest)===false && $interest!="")
	{
		$intereststring=$intereststring.$interest.",";
		$sql="SELECT * FROM interests WHERE rollNumber = '$id'";
		$result = mysqli_query($conn, $sql);
		$resultCheck=mysqli_num_rows($result);
		if($resultCheck < 1)
		{
			$sql="INSERT INTO interests VALUES('$id', '');";
			mysqli_query($conn,$sql);
		}
		$sql="UPDATE interests SET otherinterests='$intereststring' WHERE rollNumber='$id';";
		mysqli_query($conn,$sql);
	}
	exit();
?>
