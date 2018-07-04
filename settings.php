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
		<link rel = "stylesheet" type = "text/css" href = "style_sheets/studentInfo.css">
		<script>
			function savedata(formname) {
			  $.post($(formname).attr("action"), $(formname).serializeArray(), function(info) {
				alert(info);
			  });
			  $(formname + " :input").each(function() {
				$(this).val('');
			  });
			  $(formname).submit(function() {
				return false;
			  });
			}
		</script>
		<style>
		body{
			background-attachment:fixed;
			background-size:cover;
		}
		</style>
	</head>
	<body background="Images/back.jpg" spellcheck="false">
		<?php include 'includes/menu.inc.php'; ?>
		<div class="profile-content col-md-8 col-md-offset-2" style="margin-top:100px;">
			<form class="form-horizontal" action="includes/changepassword.inc.php" method="POST" id="passform">
				<div class="form-group">
					<label for="currpass" class="control-label col-sm-4" >Current Password: </label>
					<div class="col-sm-6">
					  <input type="password" class="form-control" name="currpass" id="currpass" placeholder="Enter Current password">
					</div>
				</div>
				<div class="form-group">
					<label for="newpass" class="control-label col-sm-4" >New Password: </label>
					<div class="col-sm-6">
					 <input type="password" class="form-control" name="newpass" id="newpass" placeholder="Enter New password">
					</div>
				</div>
				<div class="form-group">
					<label for="renewpass" class="control-label col-sm-4" >Confirm New Password: </label>
					<div class="col-sm-6">
					 <input type="password" class="form-control" name="renewpass" id="renewpass" placeholder="Re-enter New password">
					</div>
				</div>
				<div class="form-group">
				<div class="col-sm-offset-4 col-sm-4">
					<button type="button" class="btn btn-danger" id="sub"  onclick="savedata('#passform');">Change Password</button>
				</div>
				</div>
			</form>
		</div>
	</body>
</html>
