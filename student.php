<?php
include_once 'includes/checksession.inc.php'
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Student Profile</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Language" content="en">
		<meta name="google" content="notranslate">
		<link rel="stylesheet" href="External/bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/css/bootstrap.min.css">
		<script src="External/jquery-3.2.1.min.js"></script>
		<script src="External/bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
		<link rel = "stylesheet" type = "text/css" href = "style_sheets/studentInfo.css">
	</head>

	<body background="Images/back.jpg" spellcheck="false">
	<?php include 'includes/dbh.inc.php';?>
	<?php 
		include 'includes/menu.inc.php';
		$roll=$_POST['uroll'];
		$sql="SELECT * FROM student WHERE rollNumber='$roll';";
		$result=mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
	?>
	<div class="container" style="margin-top:60px;">
		<div class="row profile ">
			<!-- LEFT MENU -->
			<div class="col-md-3">
				<div class="profile-sidebar">
					<!-- SIDEBAR USERPIC -->
					<div id="profile-userpic">
						<img id="imga" src="<?php if($row['gender']== 'MALE' || $row['gender']== 'male') echo 'Images/samplemale.jpg'; else echo 'Images/samplefemale.jpg';?>" alt="Student Photo">
					</div>
					<!-- END SIDEBAR USERPIC -->

					<!-- SIDEBAR USER TITLE -->
					<div class="profile-usertitle">
						<div class="profile-usertitle-name">
							<?php echo $row["studentsName"];?>
						</div>
						<div class="profile-usertitle-roll">
							<?php echo $roll;?>
						</div>
						<div class="profile-usertitle-roll">
							DIV <?php echo $row["division"];?> - Batch <?php echo $row["batch"];?>
						</div>
						<div class="profile-usertitle-roll">
							Mentor: <?php echo $row["mentor"];?>
						</div>
					</div>
					<!-- END SIDEBAR USER TITLE -->

					<!-- USER MENU -->
					<div class="profile-usermenu">
						<ul class="nav">
							<li class="active">
								<a data-toggle="tab" href="#personalinfo">
								<i class="glyphicon glyphicon-user"></i>
								Personal Information </a>
							</li>
							<li>
								<a data-toggle="tab" href="#acaddet">
								<i class="glyphicon glyphicon-education"></i>
								Academic Details </a>
							</li>
							<li>
								<a data-toggle="tab" href="#remarks">
								<i class="glyphicon glyphicon-pencil"></i>
								Remarks </a>
							</li>
							<li>
								<a data-toggle="tab" href="#skills">
								<i class="glyphicon glyphicon-briefcase"></i>
								Skills </a>
							</li>
						</ul>
					</div>
					<!-- END USER MENU -->
				</div>
			</div>
			<!-- LEFT MENU -->

			<!-- RIGHT PANE -->
			<div class="tab-content">
				<div class="col-md-9 tab-pane fade in active" id="personalinfo">
					<div class="profile-content">
						<div class="form-group">
							<label for="fn" class="control-label col-sm-1" >Name:</label>
							<div class="col-sm-8">
								<input disabled type="text" value="<?php echo $row["studentsName"];?>" class="form-control" name="fn" id="fn" placeholder="First Name">
							</div>
							<label class="control-label col-sm-1">Gender:</label>
							<div class="col-sm-2">
								<input disabled type="text" value="<?php echo $row["gender"];?>" class="form-control" name="gen" id="gen" placeholder="Last Name">
							</div>
						</div>
						<br/><br/>
						<div  class="form-group">
							<label for="phn" class="control-label col-sm-1" >Mobile: </label>
							<div class="col-sm-3">
							  <input disabled type="tel" value="<?php echo $row["mobileNo"];?>" class="form-control" name="phn" id="phn">
							</div>
							<label for="email" class="control-label col-sm-1" >Email: </label>
							<div class="col-sm-7">
							  <input disabled type="email" value="<?php echo $row["emailId"];?>" class="form-control" name="email" id="email">
							</div>
						</div>
						<br/><br/>
						<div class="form-group">
							<label for="address" class="control-label col-sm-1" >Address: </label>
							<div class="col-sm-11">
								<textarea disabled name="address" id="address" class="form-control disabled" rows="2"></textarea>
							</div>
						</div>
						<br/><br/><br/>
						<div class="form-group">
							<label for="dob" class="control-label col-sm-1" >DOB: </label>
							<div class="col-sm-3">
							  <input disabled type="text" value="<?php echo $row["dob"];?>" class="form-control" name="dob" id="dob">
							</div>
						</div>
					</div>
				</div>


				<div class="col-md-9 tab-pane fade" id="skills">
					<div class="profile-content">
					   <div class="col-sm-3">
							<div class="dev col-sm-12">
								<strong style="font-size:15px;">Game Studio</strong>
							</div>
							<div class="dev col-sm-12">
								<strong style="font-size:15px;">C++</strong>
							</div>
							<div class="dev col-sm-12">
								<strong style="font-size:15px;">FMod</strong>
							</div>
							<div class="dev col-sm-12">
								<strong style="font-size:15px;">Flash</strong>
							</div>
							<div class="dev col-sm-12">
								<strong style="font-size:15px;">DirectX</strong>
							</div>
							<div class="dev col-sm-12">
								<strong style="font-size:15px;">Autodesk 3ds Max</strong>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-9 tab-pane fade" id="acaddet">
					<div class="profile-content">
						   <div class="col-sm-2">
								<div class="profile-usermenu">
									<ul class="nav">
										<li class="active">
											<a data-toggle="tab" href="#sem1">
											SEM 1 </a>
										</li>
										<li>
											<a data-toggle="tab" href="#sem2">
											SEM 2 </a>
										</li>
										<li>
											<a data-toggle="tab" href="#sem3">
											SEM 3 </a>
										</li>
										<li>
											<a data-toggle="tab" href="#sem4">
											Sem 4 </a>
										</li>
										<li>
											<a data-toggle="tab" href="#sem5">
											Sem 5 </a>
										</li>
										<li>
											<a data-toggle="tab" href="#sem6">
											Sem 6 </a>
										</li>
										<li>
											<a data-toggle="tab" href="#sem7">
											Sem 7 </a>
										</li>
										<li>
											<a data-toggle="tab" href="#sem8">
											Sem 8 </a>
										</li>
									</ul>
								</div>
							</div>
							<div class="tab-content col-sm-10">
								<div class="tab-pane fade in active" id="sem1">
									<div class="profile-content" style="background:#ffffff;height:400px;">
									Sem 1 Details
									</div>
								</div>
								<div class="tab-pane fade" id="sem2">
									<div class="profile-content" style="background:#ffffff;height:400px;">
									Sem 2 Details
									</div>
								</div>
								<div class="tab-pane fade" id="sem3">
									<div class="profile-content" style="background:#ffffff;height:400px;">
									Sem 3 Details
									</div>
								</div>
								<div class="tab-pane fade" id="sem4">
									<div class="profile-content" style="background:#ffffff;height:400px;">
									Sem 4 Details
									</div>
								</div>
								<div class="tab-pane fade" id="sem5">
									<div class="profile-content" style="background:#ffffff;height:400px;">
									Sem 5 Details
									</div>
								</div>
								<div class="tab-pane fade" id="sem6">
									<div class="profile-content" style="background:#ffffff;height:400px;">
									Sem 6 Details
									</div>
								</div>
								<div class="tab-pane fade" id="sem7">
									<div class="profile-content" style="background:#ffffff;height:400px;">
									Sem 7 Details
									</div>
								</div>
								<div class="tab-pane fade" id="sem8">
									<div class="profile-content" style="background:#ffffff;height:400px;">
									Sem 8 Details
									</div>
								</div>
							</div>
					</div>
				</div>
				<div class="col-md-9 tab-pane fade" id="remarks">
					<?php 
						$sql="SELECT * FROM remark WHERE roll = '$roll'";
						$res = mysqli_query($conn,$sql);
						if(mysqli_num_rows($res) > 0) {
						while($row1 = mysqli_fetch_assoc($res)) {
							if($row1['isPositive'] == 0) {
					?>
					<div class="profile-content" style="background:rgba(240,0,0,0.8); col-sm-12" >
						<div class="col-sm-4">
							<input disabled type="text" value="<?php echo $row1['prof']?>" class="form-control">
						</div>
						<div class="col-sm-2">
							<input disabled type="text" value="<?php echo $row1['dateOfRem'] ?>" class="form-control">
						</div>
						<br/><br/>
						<div class="col-sm-12">
							<textarea disabled class="form-control disabled" rows="3"><?php echo $row1['rem']; ?></textarea>
						</div>
					</div>
					<br/>
					<?php }
						else { ?>
					<div class="profile-content" style="background:rgba(0,250,0,0.8); col-sm-12" >
						<div class="col-sm-4">
							<input disabled type="text" value="<?php echo $row1['prof']?>" class="form-control">
						</div>
						<div class="col-sm-2">
							<input disabled type="text" value="<?php echo $row1['dateOfRem'] ?>" class="form-control">
						</div>
						<br/><br/>
						<div class="col-sm-12">
							<textarea disabled class="form-control disabled" rows="3"><?php echo $row1['rem']; ?></textarea>
						</div>
					</div>
					<br/>
						<?php }}} ?>
					<br/><br/><br/>
					<div class="profile-content">
						<!-- Form for remark -->
						<form method = "post" action = "Includes/addRemark.inc.php">
							<textarea name="exp" id="exp" class="form-control" rows="3" placeholder="Enter your remark!"></textarea>
							<br/>
							<div class="col-sm-offset-2  col-sm-3">
								<input type="submit" class="btn btn-success  col-sm-12" value="Good" name="setGood">
							</div>
							<div class="col-sm-offset-2 col-sm-3">
								<input type="submit" class="btn btn-danger col-sm-12" value="Bad" name="setBad">
							</div>
							<br/><br/>
							<div class="col-sm-offset-5 col-sm-2">
								<input type="submit" class="btn btn-primary col-sm-12" value="Submit" name="submit">
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- END RIGHT PANE -->
		</div>
	</div>
</body>
</html>
