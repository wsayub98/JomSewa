<?php 
include('../connection.php');
$nid=$_GET['e'];

$q=mysqli_query($conn,"INSERT INTO driver (DriverID, DriverName, DriverEmail, DriverPass, DriverGender, DriverServices, DriverImage)
SELECT AppID, AppName, AppEmail, AppPass, AppGender, AppServices, AppImage FROM registration
WHERE AppID ='$nid'");

$qe=mysqli_query($conn,"delete from registration where AppID='$nid'");

header('location:index.php?page=application');

?>




