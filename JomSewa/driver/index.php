<?php 
  session_start();
  include('../connection.php');
  $driver=$_SESSION['driver'];
  $sql=mysqli_query($conn,"select * from driver where DriverEmail='$driver' ");
  $users=mysqli_fetch_assoc($sql);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>JomSewa Driver Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Hello <?php echo $users['DriverName'];?>!</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php">Logout</a></li>
          </ul>
          <!--<form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>-->
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
			<!-- find users' image if image not found then show dummy image -->
			
			<!-- check users profile image -->
      			<?php 
      			$q=mysqli_query($conn,"select DriverImage from driver where DriverEmail='".$_SESSION['driver']."'");
      			$row=mysqli_fetch_assoc($q);
      			if($row['DriverImage']=="")
      			{
      			?>
              <li><a href="index.php?page=update_profile_pic"><img title="Update Your profile pic Click here" style="border-radius:50px" src="../images/person.jpg" width="100" height="100" alt="not found"/></a></li>
      			<?php 
      			}
      			else
      			{
      			?>
      			 <li><a href="index.php?page=update_profile_pic"><img title="Update Your profile pic Click here"  style="border-radius:50px" src="../images/<?php echo $_SESSION['driver'];?>/<?php echo $row['DriverImage'];?>" width="100" height="100" alt="not found"/></a></li>
      			<?php 
      			}
      			?>
      			
      			<li><a href="index.php?page=update_password"><span class="glyphicon glyphicon-user"></span> Update Password</a></li>
            <li><a href="index.php?page=update_profile"><span class="glyphicon glyphicon-user"></span> Update Profile</a></li>
            <li><a href="index.php?page=manage_vehicle"><span class="glyphicon glyphicon-user"></span> Add Vehicle</a></li>
            <li><a href="index.php?page=update_maintenance"><span class="glyphicon glyphicon-user"></span> Update Vehicle</a></li>
	    <li><a href="index.php?page=Delete_Vehicle"><span class="glyphicon glyphicon-user"></span> Delete Vehicle</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <!-- container-->
		  <?php 
    		@$page=  $_GET['page'];
    		  if($page!="")
    		  {
    		  	if($page=="update_password")
    			{
    				include('update_password.php');
    			}
    			if($page=="update_profile")
    			{
    				include('update_profile.php');
    			}
          if($page=="update_profile_pic")
          {
            include('update_profile_pic.php');
          }
    			if($page=="manage_vehicle")
    			{
    				include('manage_vehicle.php');
    			}
            if($page=="update_maintenance")
          {
            include('update_maintenance.php');
          }
	    if($page=="Delete_Vehicle")
   	  {
       	    include('Delete_Vehicle.php');
      
      	  }
    		  }
    		  else
    		  {
    		  include('update_profile_pic.php');
		  ?>
		  <!-- container end-->
<?php } ?>

        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
