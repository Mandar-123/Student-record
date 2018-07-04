<?php
	include 'includes/dbh.inc.php';
	include_once 'includes/checksession.inc.php';
	include_once 'includes/checkIfFaculty.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Home</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Language" content="en">
		<meta name="google" content="notranslate">
		<link rel="stylesheet" href="External/bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/css/bootstrap.min.css">
		<script src="External/jquery-3.2.1.min.js"></script>
		<script src="External/bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
		<script type="text/javascript">
		function loadinterestStuds()
		{
			$("#answerDiv").load("includes/searchStudentsWithInterests.inc.php", {i: document.getElementById('i').value});
			$("#interestsearch").submit(function(){
				return false;
			});
		}
		</script>
		<style>
		body{
			background-attachment:fixed;
			background-size:cover;
		}
		.profile
		{
			display: inline-block;
		}
		div.tags
		{
			background: #1abc9c;
			border-radius: 2px;
			color: #f5f5f5;
			font-weight: bold;
			padding: 2px 4px;
			margin:5px;
			display:inline-block;
		}
		</style>
	</head>
	<body background="Images/back.jpg" spellcheck="false">
		<?php include 'includes/menu.inc.php'; ?>
		<br/><br/><br/>
		<div class="col-sm-offset-1 col-sm-11">
			<form class="navbar-form form-responsive" action="student.php" method="POST" id="formsearch">
				<div class="form-group col-sm-10">
					<label for="uroll" class="control-label col-sm-3" >View Student profile by Roll No.: </label>
					<div class="input-group col-sm-4">
						<input type="search" name="uroll" placeholder='Enter Roll No.' class="form-control"/>
						<span class="input-group-addon" style="padding:0px;margin:0px;border-radius:5px;"><button style="width:100%;margin:0px;" class="btn btn-primary" onclick="document.getElementById('formsearch').submit()">Go</button></span>
					</div>
				</div>
			</form>
		</div>
		<br/><br/>
		<hr class="col-sm-offset-1 col-sm-10"style="border-top: 2px solid #000000;"/>
		<div class="col-sm-offset-1 col-sm-11">
			<form class="navbar-form form-responsive" action="searchStudentWithSkills.php" method="POST" id="skillsearch">
				<div class="form-group col-sm-10">
					<label for="newpass" class="control-label col-sm-3" >Search students with skills (Select atleast One): </label>
					<select name="s1" class="form-control">
					<?php include 'Includes/allskills.inc.php'?>;
					</select>
					<select name="s2" class="form-control" style="margin-left:20px;">
					<?php include 'Includes/allskills.inc.php'?>;
					</select>
					<select name="s3" class="form-control" style="margin-left:20px;">
					<?php include 'Includes/allskills.inc.php'?>;
					</select>
					<button class="btn btn-primary" style="margin-left:20px;" onclick=""><b>Go</b></span>
				</div>
			</form>
		</div>
		<br/><br/>
		<hr class="col-sm-offset-1 col-sm-10"style="border-top: 2px solid #000000;"/>
		<div class="col-sm-offset-1 col-sm-11">
			<form class="navbar-form form-responsive" action="" method="POST" id="interestsearch">
				<div class="form-group col-sm-10">
					<label for="newpass" class="control-label col-sm-3" >Search students interested in: </label>
					<select name="i" id="i" class="form-control">
					<?php include 'Includes/allskills.inc.php'?>;
					</select>
					<button class="btn btn-primary" style="margin-left:20px;" onclick="loadinterestStuds();"><b>Go</b></span>
				</div>
			</form>
		</div>
		<br/><br/>
		<hr class="col-sm-offset-1 col-sm-10"style="border-top: 2px solid #000000;"/>
		<br><br>

		<div class="col-sm-offset-1 col-sm-10" id="answerDiv">
		</div>

	</body>
</html>
