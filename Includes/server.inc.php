<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	include 'dbh.inc.php';
	$username = mysqli_real_escape_string($conn,$_POST['username']);
	$pass = mysqli_real_escape_string($conn,$_POST['password']);
	if(empty($username) || empty($pass))
	{
		header("Location: ../index.php?login=Incomplte%20Input");
		exit();
	}
	if(isset($_POST['login1'])) {
		$query ="SELECT * FROM student WHERE rollNumber ='$username'";
		$result = mysqli_query($conn, $query);
		$resultCheck=mysqli_num_rows($result);
		if($resultCheck<1)
		{
			header("Location: ../index.php?login=User%20Does%20NOT%20Exist");
			exit();
		}
		$row=mysqli_fetch_assoc($result);
		$hashedPwdCheck=password_verify($pass,$row['pass']);

		if($hashedPwdCheck==false)
		{
			header("Location: ../index.php?login=Invalid%20Password");
			exit();
		}
		else if($hashedPwdCheck==true)
		{
			//To login the user using session
			session_start();
			$_SESSION['id']=$row['rollNumber'];
			$_SESSION['name'] = $row['studentsName'];
			header("Location: ../studentHome.php");
			exit();
		}
	}
	else if (isset($_POST['login2'])){
		$sql="SELECT * FROM faculty WHERE id='$username';";
		$result=mysqli_query($conn,$sql);
		$resultCheck=mysqli_num_rows($result);
		if($resultCheck<1)
		{
			header("Location: ../index.php?login=User%20Does%20NOT%20Exist");
			exit();
		}
		$row=mysqli_fetch_assoc($result);
		$hashedPwdCheck=password_verify($pass,$row['pass']);
		if($hashedPwdCheck==false)
		{
			header("Location: ../index.php?login=Invalid%20Password");
			exit();
		}
		else if($hashedPwdCheck==true)
		{
			//To login the user using session
			session_start();
			$_SESSION['id']=$row['id'];
			$_SESSION['name'] = $row['name'];
			header("Location: ../home.php");
			exit();
		}
	}
	else
	{
		header("Location: ../index.php");
		exit();
	}
}
?>
