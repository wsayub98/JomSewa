<?php 
extract($_POST);
if(isset($delVehicle)){
	$driverID=$_SESSION['driver'];
$sql=mysqli_query($conn,"DELETE FROM `vehicle` WHERE DriverID='$driverID'");

if($conn->query($sql)==false)
{
$err= "<font color='red'> Your vehicle has been removed !!</font>";
}
else{
$err= "<font color='red'> Your vehicle Failed to removed. Please Try Again !!</font>";	
$conn->error;
}
}
?>
<h2 align="center">Delete Vehicle</h2>

		<form method="post" enctype="multipart/form-data">
			<table class="table table-bordered">
	<Tr>
		<Td colspan="2"><?php echo @$err;?></Td>
	</Tr>
				
				<tr>
					<Td colspan="2" align="center">
					<input type="submit" class="btn btn-default" name="delVehicle" value="Remove Vehicle"/>
					</td>
				</tr>
			</table>
			
		</form>
	