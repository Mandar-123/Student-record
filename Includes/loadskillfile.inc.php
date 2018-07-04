	<?php
	include 'dbh.inc.php';
	include_once 'checksession.inc.php';
	include_once 'checkIfStudent.inc.php';
	$id=$_SESSION['id'];
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
	<form method='POST' style='display:inline' action='includes/removeskill.inc.php' id='remove".$num."'>
		<input type='hidden' name='sk' value='".$newtok."'></input>
		<button style='background-color:transparent;border:none;float:right' type='button' onclick=\"removeskill('#remove".$num."')\"><i class='glyphicon glyphicon-remove rem' style='font-size:12px;'></i></button>
	</form>
	</div>";
	$newtok=strtok(",");
	$num++;
	}
	echo $skillstring;
?>
