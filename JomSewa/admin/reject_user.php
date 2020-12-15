<?php 
include('../connection.php');
$nid=$_GET['id'];

$q=mysqli_query($conn,"delete from registration where AppID='$nid'");

header('location:index.php?page=application');

?>

