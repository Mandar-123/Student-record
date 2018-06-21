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
					<li><a href="home.php"><strong>Home</strong></a></li>
					<li>
						<form class="col-sm-12 navbar-form form-responsive" action="student.php" method="POST" id="formsearch">
							<div class="form-group">
								<div class="input-group">
									<input type="search" name="uroll" placeholder='Search by Roll No.' class="form-control">
									<span class="input-group-addon" onclick="document.getElementById('formsearch').submit()"><i style="font-size:12px" class="glyphicon glyphicon-search"></i></span>
								</div>
							</div>
						</form>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<a href="Includes/logout.inc.php" style="margin:0px;padding:0px">
						<img src="Images/logout.png" width="40" height="40" id="edit" style="margin-right:4px;margin-left:20px;margin-bottom:5px;margin-top:5px;">
					</a>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<a href="logout.inc.php" style="margin:0px;padding:0px">
						<img src="Images/settings.png" width="40" height="40" id="edit" style="margin-right:4px;margin-left:20px;margin-bottom:5px;margin-top:5px;">
					</a>
				</ul>
			</div>
		 </div>
		</nav>