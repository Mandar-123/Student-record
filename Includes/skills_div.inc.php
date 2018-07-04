<?php
	include 'dbh.inc.php';
	include_once 'checksession.inc.php';
	$id=$_POST['roll'];
	$sql="SELECT otherskills FROM skills WHERE rollNumber='$id';";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	$string=$row['otherskills'];
	$skillstring="";
	$newtok = strtok($string,",");
	$num=1;
	while ($newtok !== false) {
		$skillstring = $skillstring."<div class='border'>
	<strong style='padding-right:10px'>".$newtok."</strong>
	</div>";
	$newtok=strtok(",");
	$num++;
	}
	echo $skillstring;
?>
