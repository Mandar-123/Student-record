<?php include 'dbh.inc.php';?>
<?php
	$roll = $_POST['roll'];
	$sql="SELECT * FROM remark WHERE roll = '$roll'";
	$res = mysqli_query($conn,$sql);
	if(mysqli_num_rows($res) > 0) {
	while($row1 = mysqli_fetch_assoc($res)) {
		if($row1['isPositive'] == 0) {
?>
<div class="profile-content" style="background:rgba(240,0,0,0.8); col-sm-12" >
	<div class="col-sm-4">
		<input disabled type="text" value="<?php echo 'Prof. '.$row1['prof']?>" class="form-control">
	</div>
	<div class="col-sm-2">
		<input disabled type="text" value="<?php echo $row1['dateOfRem'] ?>" class="form-control">
	</div>
	<br/><br/>
	<div class="col-sm-12">
		<textarea disabled class="form-control disabled" rows="3"><?php echo $row1['rem']; ?></textarea>
	</div>
</div>
<br/><br/>
<?php }
	else { ?>
<div class="profile-content" style="background:rgb(0, 153, 51);" >
	<div class="col-sm-4">
		<input disabled type="text" value="<?php echo 'Prof. '.$row1['prof']?>" class="form-control">
	</div>
	<div class="col-sm-2">
		<input disabled type="text" value="<?php echo $row1['dateOfRem'] ?>" class="form-control">
	</div>
	<br/><br/>
	<div class="col-sm-12">
		<textarea disabled class="form-control disabled" rows="3"><?php echo $row1['rem']; ?></textarea>
	</div>
</div>
<br/><br/>
<?php }}} ?>