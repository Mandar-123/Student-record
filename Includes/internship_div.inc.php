<?php include 'dbh.inc.php';?>
<?php
	$roll = $_POST['roll'];
	$sql="SELECT * FROM internship WHERE roll = '$roll'";
	$res = mysqli_query($conn,$sql);
	if(mysqli_num_rows($res) > 0) {
	while($row1 = mysqli_fetch_assoc($res)) {
?>
<div class="profile-content">
	<div  class="form-group">
		<label for="at" class="control-label col-sm-2" >Interned At: </label>
		<div class="col-sm-8">
		  <input type="text" class="form-control" name="at" id="at" value="<?php echo $row1['org']?>"/>
		</div>
	</div>
	<br/><br/><br/>
	<div  class="form-group">
		<label for="from" class="control-label col-sm-2" >Duration: </label>
		<div class="col-sm-2">
		  <input type="text" name="from" id="from" value="<?php echo $row1['startDate']?>" class="form-control"/>
		</div>
		<p style="float:left;width:5px;display:inline-block;">-</p>
		<div class="col-sm-2">
		  <input type="text" name="to" id="to" class="form-control" value="<?php echo $row1['endDate']?>"/>
		</div>
	</div>
	<br/><br/>
	<div  class="form-group">
		<label for="desc" class="control-label col-sm-2" >Description: </label>
		<div class="col-sm-10">
		  <textarea name="desc" id="desc" class="form-control" rows="3"><?php echo $row1['description']?></textarea>
		</div>
	</div>
</div>
<br/><br/>
<?php }} ?>