<?php
	include 'includes/dbh.inc.php';
	include_once 'includes/checksession.inc.php';
	include_once 'includes/checkIfFaculty.inc.php';
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
		<script>
			$(document).ready(function(){
				$.ajaxSetup({ cache: false });
				loadremarks();
				loadinternships();
				loadskills();
				loadinterests();
			});
			function savedata(formname) {
			  $.post($(formname).attr("action"), $(formname).serializeArray(), function(info) {
				alert(info);
			  });
			  document.getElementById('rem').value = "";
			  $(formname).submit(function() {
				return false;
			  });
			  loadremarks();
			}
			function loadremarks()
			{
				$("#loadrem").load("includes/remark_div.inc.php", {roll:<?php echo "'".$_POST['uroll']."'";?>});
			}
			function loadinternships()
			{
				$("#loadinternships").load("includes/internship_div.inc.php", {roll:<?php echo "'".$_POST['uroll']."'";?>});
			}
			function loadskills()
			{
				$("#allskills").load("includes/skills_div.inc.php", {roll:<?php echo "'".$_POST['uroll']."'";?>});
			}
			function loadinterests()
			{
				$("#allinterests").load("includes/interests_div.inc.php", {roll:<?php echo "'".$_POST['uroll']."'";?>});
			}
		</script>
	</head>

	<body background="Images/back.jpg" spellcheck="false">
	<?php include 'includes/dbh.inc.php';?>
	<?php
		include 'includes/menu.inc.php';
		$roll=$_POST['uroll'];
		$sql="SELECT * FROM student WHERE rollNumber='$roll';";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result) == 0){
			echo "<div style='width:240px;margin:250px auto;background:rgba(255, 0, 0, 0.2);text-align:center; padding: 20px; border-radius:10px;'><b>No Student with Roll Number $roll</b></div>";
			exit();
		}
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
							<?php echo $row['rollNumber'];?>
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
								<a data-toggle="tab" href="#internships">
								<i class="glyphicon glyphicon-briefcase"></i>
								Internship </a>
							</li>
							<li>
								<a data-toggle="tab" href="#skin">
								<i class="glyphicon glyphicon-wrench"></i>
								Skills & Intersts </a>
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
							<label for="pmob" class="control-label col-sm-1" >Parent Mobile: </label>
							<div class="col-sm-3">
							  <input disabled type="text" value="<?php echo $row["fatherMobile"];?>" class="form-control" name="pmob" id="pmob">
							</div>
							<label for="dob" class="control-label col-sm-1" >DOB: </label>
							<div class="col-sm-3">
							  <input disabled type="text" value="<?php echo $row["dob"];?>" class="form-control" name="dob" id="dob">
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
									Sem 1 Details to be displayed
									</div>
								</div>
								<div class="tab-pane fade" id="sem2">
									<div class="profile-content" style="background:#ffffff;height:400px;">
									Sem 2 Details to be displayed
									</div>
								</div>
								<div class="tab-pane fade" id="sem3">
									<div class="profile-content" style="background:#ffffff;height:400px;">
									Sem 3 Details to be displayed
									</div>
								</div>
								<div class="tab-pane fade" id="sem4">
									<div class="profile-content" style="background:#ffffff;height:400px;">
									Sem 4 Details to be displayed
									</div>
								</div>
								<div class="tab-pane fade" id="sem5">
									<div class="profile-content" style="background:#ffffff;height:400px;">
									Sem 5 Details to be displayed
									</div>
								</div>
								<div class="tab-pane fade" id="sem6">
									<div class="profile-content" style="background:#ffffff;height:400px;">
									Sem 6 Details to be displayed to be displayed
									</div>
								</div>
								<div class="tab-pane fade" id="sem7">
									<div class="profile-content" style="background:#ffffff;height:400px;">
									Sem 7 Details to be displayed
									</div>
								</div>
								<div class="tab-pane fade" id="sem8">
									<div class="profile-content" style="background:#ffffff;height:400px;">
									Sem 8 Details to be displayed
									</div>
								</div>
							</div>
					</div>
					<br/>
					<br/>
					<div class="profile-content">
						<div class="col-sm-4" style="padding:10px;background:rgb(255,255,255);border-radius:5px">
							Number of dead Kt's: <?php echo $row['deadKts'];?>
						</div>
						<div class="col-sm-offset-1 col-sm-4" style="padding:10px;background:rgb(255,255,255);border-radius:5px">
							Number of live Kt's: <?php echo $row['liveKts'];?>
						</div>
					</div>
				</div>
				<div class="col-md-9 tab-pane fade" id="remarks">
					<div id="loadrem">

					</div>
					<div class="profile-content">
						<!-- Form for remark -->
						<form method = "post" action = "Includes/addRemark.inc.php" id="remForm">
							<textarea name="rem" id="rem" class="form-control" rows="3" placeholder="Enter your remark!"></textarea>
							<br/>
							<div class="col-sm-offset-2  col-sm-3">
								<input type="button" class="btn btn-success col-sm-12" onclick="document.getElementById('isPositive').value = '1';savedata('#remForm');" value="Good" name="setGood">
							</div>
							<div class="col-sm-offset-2 col-sm-3">
								<input type="button" class="btn btn-danger col-sm-12" onclick="document.getElementById('isPositive').value = '0';savedata('#remForm');" value="Bad" name="setBad">
							</div>
							<input type="hidden" value="0" id="isPositive" name="isPositive">
							<input type="hidden" value="<?php echo $roll; ?>" name="rollNum" >
						</form>
					</div>
				</div>
				<div class="col-md-9 tab-pane fade" id="internships">
					<div id="loadinternships">

					</div>
				</div>
				<div class="col-md-9 tab-pane fade" id="skin">
					<div class="profile-content">
						<div class="col-sm-offset-1 col-sm-10">
							<label class="col-sm-2" >Skills: </label>
							<div id="allskills" class="col-sm-10">

							</div>
						</div>
					</div>
				 	<br/><br/>
				 <div class="profile-content">
						<div class="col-sm-offset-1 col-sm-10">
								<label class="col-sm-2" >Interests: </label>
	 							<div class="col-sm-10" id="allinterests">

								</div>
						</div>
				 </div>
				</div>
			</div>
			<!-- END RIGHT PANE -->
		</div>
	</div>
</body>
</html>
