<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	include 'dbh.inc.php';
	$username = mysqli_real_escape_string($conn,$_POST['username']);
	$pass = mysqli_real_escape_string($conn,$_POST['password']);
	if(empty($username) || empty($pass))
	{
		header("Location: ../index.html?login=Incomplte%20Input");
		exit();
	}
	if(isset($_POST['login1'])) {
		/*
		$query ="SELECT * FROM student WHERE rollNumber ='$username' AND pass = '$password' ";
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result) == 1) {
			session_start();
			$row=mysqli_fetch_assoc($result);
			$_SESSION['id']=$row['id'];
			echo "Success";
			header("Location: ../home.php");
			exit();
		}
		else {
			echo "Student Home page to be displayed";
		}
		*/
		header("Location: ../index.html");
		exit();
	}
	else if (isset($_POST['login2'])){
		$sql="SELECT * FROM faculty WHERE id='$username';";
		$result=mysqli_query($conn,$sql);
		$resultCheck=mysqli_num_rows($result);
		if($resultCheck<1)
		{
			header("Location: ../index.html?login=User%20Does%20NOT%20Exist");
			exit();
		}
		$row=mysqli_fetch_assoc($result);
		$hashedPwdCheck=password_verify($pass,$row['pass']);
		if($hashedPwdCheck==false)
		{
			header("Location: ../index.html?login=Invalid%20Password");
			exit();
		}
		else if($hashedPwdCheck==true)
		{
			//To login the user using session
			session_start();
			$_SESSION['id']=$row['id'];
			$_SESSION['fname'] = $row['name'];
			header("Location: ../home.php");
			exit();
		}
	}
	else
	{
		header("Location: ../index.html");
		exit();
	}
}
?>
