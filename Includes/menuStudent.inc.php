<?php
  include 'dbh.inc.php';
  include_once 'checksession.inc.php';
  include_once 'checkIfStudent.inc.php';
?>
<nav class="navbar navbar-inverse navbar-fixed-top" style="border-radius:0px;padding:0px;margin-bottom:0px;">
  <div class="container-fluid"  style="margin-left:0px; padding-left:0px;">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	</div>
	<div class="collapse navbar-collapse" id="myNavbar">
		<ul class="nav navbar-nav">
			<li><a href="studentHome.php"><strong>Home</strong></a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<span style="color:#ffffff"><b>Logged in as <?php echo $_SESSION['name']?></b></span>
      <a href="studentSettings.php" style="margin:0px;padding:0px">
        <img src="Images/settings.png" width="40" height="40" id="edit" style="margin-right:4px;margin-left:20px;margin-bottom:5px;margin-top:5px;">
      </a>
      <a href="Includes/logout.inc.php" style="margin:0px;padding:0px">
				<img src="Images/logout.png" width="40" height="40" id="edit" style="margin-right:4px;margin-left:20px;margin-bottom:5px;margin-top:5px;">
			</a>
		</ul>
	</div>
 </div>
</nav>
