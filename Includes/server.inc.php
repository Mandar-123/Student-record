<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	if(isset($_POST['login1'])) {
		include 'dbh.inc.php';
		$username = mysqli_real_escape_string($conn,$_POST['username']);
		$password = mysqli_real_escape_string($conn,$_POST['password']);
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
	}
	else if (isset($_POST['login2'])){
		include 'dbh.inc.php';
		$username = mysqli_real_escape_string($conn,$_POST['username']);
		$password = mysqli_real_escape_string($conn,$_POST['password']);
		$query ="SELECT * FROM faculty WHERE id ='$username' AND pass ='$password' ";
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
			header("Location: ../index.html");
			exit();
		}
	}
}
?>
