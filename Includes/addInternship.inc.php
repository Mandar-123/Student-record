<?php include 'dbh.inc.php';?>
<?php
	session_start();
	$id=$_SESSION['id'];
	$desc=$_POST['desc'];
	$org = $_POST['at'];
	$from = $_POST['from'];
	$to = $_POST['to'];
	$query ="SELECT * FROM internship WHERE roll ='$id' ORDER BY num DESC;";
	$result = mysqli_query($conn, $query);
	$num = 1;
	if(mysqli_num_rows($result) != 0){
		$row=mysqli_fetch_assoc($result);
		$num = $row['num'] + 1;
	}
	if($desc == '' || $org == '' || $from == '' || $to == '')
	{
		echo "Please Enter all the Details!";
		exit();
	}
	
	$sql="INSERT INTO internship(roll, num, startDate, endDate, org, description) VALUES('$id', $num,'$from', '$to', '$org', '$desc');";
	if(mysqli_query($conn,$sql))
		echo "Added !";
	else echo "Failed to add!";	
?>