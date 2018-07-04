<?php
	include 'dbh.inc.php';
	include_once 'checksession.inc.php';
	$id=$_POST['roll'];
	$sql="SELECT otherinterests FROM interests WHERE rollNumber='$id';";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$string=$row['otherinterests'];
	$intereststring="";
	$newtok = strtok($string,",");
	$num=1;
	while ($newtok !== false) {
		$intereststring = $intereststring."<div class='border'>
	<strong style='padding-right:10px'>".$newtok."</strong>
	</div>";
	$newtok=strtok(",");
	$num++;
	}
	echo $intereststring;
?>
