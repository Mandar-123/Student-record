<?php
		include 'includes/dbh.inc.php';
		session_start();
	  if(isset($_SESSION['id']))
	  {
	    $id = $_SESSION['id'];
	    $sql = "SELECT * FROM faculty WHERE id = '$id';";
	    $result=mysqli_query($conn,$sql);
	    if (mysqli_num_rows($result) <= 0)
	    {
	      header("Location: studentHome.php");
	      exit();
	    } else {
				header("Location: home.php");
	      exit();
			}
	  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login - Student Record</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="External/bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style_sheets/login.css"></link>
</head>

<body>

	<div class="container-fluid login-back">
	<div class="col-sm-6">
		<div class="row">
			<div class="login-container">
				<img src="Images/student.jpg" alt="missing">
				<form method="post" action="Includes/server.inc.php">
					<div class="font-input" >
						<input type="text" name="username" placeholder="Enter Roll no.">
					</div class="font-input">
					<div>
						<input type="password" name="password" placeholder="Enter Password"><br>
					<input type="submit" name="login1" value="Login" class="btn-login"><br>
					</div>
					<h3>Student Login</h3>
				</form>
			</div>
		</div>
	</div>

	<div class="col-sm-6">
		<div class="row">
			<div class="login-container">
				<img src="Images/professor.png" alt="missing">
				<form method="post" action="Includes/server.inc.php">
					<div class="font-input" >
						<input type="text" name="username" placeholder="Enter username">
					</div class="font-input">
					<div>
						<input type="password" name="password" placeholder="Enter Password"><br>
					<input type="submit" name="login2" value="Login" class="btn-login"><br>
					</div>
					<h3>Faculty Login</h3>
				</form>
			</div>
		</div>
	</div>
	</div>
</body>
</html>
