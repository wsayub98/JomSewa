<?php 
session_start();
include('../connection.php');
$user= $_SESSION['user'];
$sql=mysqli_query($conn,"select * from user where email='$user' ");
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

    <title>Online Notice Board User Dashboard</title>

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
          <a class="navbar-brand" href="#">Hello <?php echo $users['name'];?></a>
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
            <li class="active"><a href="index.php">Dashboard <span class="sr-only">(current)</span></a></li>
			<!-- find users' image if image not found then show dummy image -->
			
			<!-- check users profile image -->
			<?php 
			$q=mysqli_query($conn,"select image from user where email='".$_SESSION['user']."'");
			$row=mysqli_fetch_assoc($q);
			if($row['image']=="")
			{
			?>
            <li><a href="index.php?page=update_profile_pic"><img title="Update Your profile pic Click here" style="border-radius:50px" src="../images/person.jpg" width="100" height="100" alt="not found"/></a></li>
			<?php 
			}
			else
			{
			?>
			<li><a href="index.php?page=update_profile_pic"><img title="Update Your profile pic Click here"  style="border-radius:50px" src="../images/<?php echo $_SESSION['user'];?>/<?php echo $row['image'];?>" width="100" height="100" alt="not found"/></a></li>
			<?php 
			}
			?>
			
			
			
			<li><a href="index.php?page=update_password"><span class="glyphicon glyphicon-user"></span> Update Password</a></li>
            <li><a href="index.php?page=update_profile"><span class="glyphicon glyphicon-user"></span> Update Profile</a></li>
			 <li><a href="index.php?page=notification"><span class="glyphicon glyphicon-envelope"></span> Notification</a></li>
			 <li><a href="index.php?page=booking"><span class="glyphicon glyphicon-envelope"></span> Booking</a></li>
			 <li><a href="index.php?page=history"><span class="glyphicon glyphicon-envelope"></span> Booking History</a></li>
            
          </ul>
         
         
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<center>
		<h2>RECEIPT</H2>
	</center>
		<?php
            // to make a connection with database
			$con = mysqli_connect("localhost", "root") or die(mysqli_connect_error());

	        // to select the targeted database
	        mysqli_select_db($con,"jomsewa") or die(mysqli_error());
			
	        // to create a query to be executed in sql
	        $Destination = $_POST['destination'];
			
	        $Driver = $_POST['drive'];
			
			//Get price 
			$query1 = "select price from destination where place = '$Destination'";
			$result1 = mysqli_query($con,$query1);
			$row = mysqli_fetch_assoc($result1);
			$Payment = $row['price'];
			
			//get point
			$query2 = "select point from destination where place = '$Destination'";
			$result2 = mysqli_query($con,$query2);
			$row1 = mysqli_fetch_assoc($result2);
			$Point = $row1['point'];
			
			//get distance
			$query3 = "select distance from destination where place = '$Destination'";
			$result3 = mysqli_query($con,$query3);
			$row2 = mysqli_fetch_assoc($result3);
			$Distance = $row2['distance'];
			
	        $query = "insert into Booking values('','$Destination','$Driver','$Payment','$Point','$Distance')";
	        // to run sql query in database
			if (isset($_POST['submit'])){
	        $result = mysqli_query($con, $query);
			}
	     
		//Check whether the insert was successful or not
	        
		?>
<fieldset>
		<center>
			<div id="receipt"> 
			Destination :
			<?php
				echo $_POST["destination"]; 
			?><br><br>
			Driver :
			<?php
				echo $_POST["drive"];
			?><br><br>
			Payment : RM
			<?php
				echo $row['price'];
			?><br><br>
			Point Gained :
			<?php
				echo $row1['point'];
			?><br><br>
			Distance travelled :
			<?php
				echo $row2['distance'];
			?><br><br>
			</div>
			<table border=0 cellpadding="10">
          		<tr>
           		 <th><input type="checkbox"  value="bank islam" class="check"><img src="payment images/bank islam.png" width="90px" height="60px"></th>
            		 <th><input type="checkbox"  value="cimb" class="check"><img src="payment images/cimb.png" width="90px" height="60px"></th>
                	 <th><input type="checkbox"  value="may bank" class="check"><img src="payment images/may bank.png" width="90px" height="60px"></th>
                	 <th><input type="checkbox"  value="rnb" class="check"><img src="payment images/rhb.png" width="90px" height="60px"></th>
           		 </tr>
           		 </table>
           		 <br><br>
			<button onclick="myFunction()">Pay</button>
			<button><a href="http://localhost/JomSewa/JomSewa/user/index.php?page=booking" class="confirmation">Cancel</a>
			</button>
			<button onclick="printContent('receipt')">Print</button>
</fieldset>
<script>
function myFunction() {
  alert("Payment Successful. Estimated arrival : 15 mins");
}
</script>
	
<script type="text/javascript">
    var elems = document.getElementsByClassName('confirmation');
    var confirmIt = function (e) {
        if (!confirm('Are you sure?')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }
</script>
	
<script>
	function printContent(el){
		var restorepage = document.body.innerHTML;
		var printContent = document.getElementById(el).innerHTML;
		document.body.innerHTML = printContent;
		window.print();
		document.body.innerHTML = restorepage;
	}
</script>
		</center>
				   
		  
		  <h1 class="page-header">Dashboard</h1>
          
         
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
