<?php 
include('connection.php');
session_start();
 ?>
<html>
	<head>
		<title>JomSewa - Online Car Rental System</title>
		<link rel="stylesheet" href="css/bootstrap.css"/>
		<script src="js/jquery_library.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top" style="background:#000">
		<div class="container">
  
  		<ul class="nav navbar-nav navbar-left">
    		<li><a href="index.php"><strong>Homepage</strong></a></li>
	  		<li><a href="index.php?option=SignUpDriver"><span class="glyphicon glyphicon-user"></span> Driver Registration</a></li>
			<li><a href="index.php?option=LoginDriver"><span class="glyphicon glyphicon-log-in"></span> Driver Login</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="index.php?option=New_user"><span class="glyphicon glyphicon-user"></span> Customer Registration</a></li>
			<li><a href="index.php?option=login"><span class="glyphicon glyphicon-log-in"></span> Customer Login</a></li>
			<li><a href="admin/login.php?option=login"><span class="glyphicon glyphicon-log-in"></span> Admin Login</a></li>
    	</ul>
		</div>
		</nav>	

		<div class="container-fluid">
			<!-- slider -->
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-example-generic" data-slide-to="1"></li>
			<li data-target="#carousel-example-generic" data-slide-to="2"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<div class="item active">
			<img src="images/indexcar1.jpg" alt="JomSewa helps you to solve transport problem">
			</div>
			<div class="item">
			<img src="images/indexcar2.jpg" alt="JomSewa helps you to solve transport problem">
			</div>
			
			<div class="item">
			<img src="images/indexcar3.jpg" alt="JomSewa helps you to solve transport problem">
			</div>
			...
		</div>

		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		</div>
		<!-- slider end-->
		</div>
		<br>

		<div class="container">
			<div class="row">
			<!-- container -->
				<div class="col-sm-8">
				<?php 
				@$opt=$_GET['option'];
				
				if($opt!="")
				{
					if($opt=="SignUpDriver")
					{
					include('registrationD.php');
					}
					else if($opt=="LoginDriver")
					{
					include('LoginD.php');
					}
					
					else if($opt=="New_user")
					{
					include('registration.php');
					}
					
					
					else if($opt=="login")
					{
					include('login.php');
					}
				}
				else
				{
					echo "
					<h4><b>We are JomSewa and we provide 3 cheap cab packages. </b><br><br>
					One Way: <br>
					UMP Gambang ↔ Anywhere in Kuantan RM10, <br>
					UMP Gambang ↔ Teluk Cempedak RM15, <br>
					UMP Gambang ↔ UMP Pekan RM30. <br><br>
					Kindly whatsapp 016-7965487 for more details!</h4>";
				}
				?>

				</div>
			<!-- container -->
		
		<div class="col-sm-4">
		<div class="panel panel-default">
  		<div class="panel-heading"><h4><b>News & Announcements</b></h4></div>
  		<div class="panel-body"><h4>
			Our working time is from 8am - 10pm. <br>
			<br>
			Holiday:<br>
			31/7 - Hari Raya Haji <br>
			31/8 - Malaysia's National Day</h4>
		</div>
		</div>
		</div>
		</div>
	</div>

	</br>
	</br>
	</br>
	</br>
	</body>
</html>