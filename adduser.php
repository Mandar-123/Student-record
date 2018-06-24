<?php
		include_once 'Includes/dbh.inc.php';
		$id=mysqli_real_escape_string($conn, "rugved.deolekar");
		$name=mysqli_real_escape_string($conn, "Rugved Deolekar");
		$pass=mysqli_real_escape_string($conn, "2A56ML");
		$hashedPwd=password_hash($pass,PASSWORD_DEFAULT);
		$sql="INSERT INTO faculty (id, name, pass) VALUES ('$id', '$name', '$hashedPwd');";
		mysqli_query($conn,$sql);
		//header("Location: index.html?register=SUCCESSFULLY%20REGISTERED");
		//exit();
?>