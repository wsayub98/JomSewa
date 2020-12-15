<?php 
extract($_POST);
if(isset($addVehicle))
{
$driverID=$_SESSION['driver'];
//check user alrdy exists or not
$sql=mysqli_query($conn,"select * from vehicle where DriverID='$driverID'");

$r=mysqli_num_rows($sql);

if($r==true)
{
$err= "<font color='red'>You already have a car !!</font>";
}else
{
	
//rtx
$rtx=$yy."-".$mm."-".$dd;

//image
$imageName=$_FILES['img']['name'];
//driverID
$driverID=$_SESSION['driver'];
//upload image

if(!is_dir("car/$driverID")){
  mkdir("car/$driverID");
}
move_uploaded_file($_FILES['img']['tmp_name'],"car/$driverID/".$_FILES['img']['name']);

$type = $_POST['carType'];
$mnf = $_POST['cManufacturer'];
$mod = $_POST['cModel'];

$query="INSERT INTO vehicle VALUES ('','$type','$mnf','$mod','$rtx','$imageName','$driverID')";
$result=mysqli_query($conn,$query);


if($result)
{
	$err="<font color='blue'>Vehicle added successfully !!</font>";

}else
{
	$err="<font color='blue'>Vehicle not added !!</font>";
}



}
}
?>
<h2 align="center">Add New Vehicle</h2>

		<form method="post" enctype="multipart/form-data">
			<table class="table table-bordered">
	<Tr>
		<Td colspan="2"><?php echo @$err;?></Td>
	</Tr>
				
				<tr>
					<td>Select Car's Type</td>
					<Td>
					<select class="form-control" style="width:100px;float:left" name="carType">
					<option>SUV</option>
					<option>MPV</option>
					<option>Sedan</option>
					<option>Hatchback</option>
					</select>
					</td>
				</tr>
				<tr>
					<td>Select Car's Manufacturer </td>
					<Td>
					<select class="form-control" style="width:100px;float:left" name="cManufacturer">
					<option>Perodua</option>
					<option>Proton</option>
					<option>Honda</option>
					<option>Toyota</option>
					</select>
					</td>
				</tr>
				
				
				<tr>
					<td>Enter Car's Model </td>
					<Td><input  class="form-control" type="text" name="cModel" required/></td>
				</tr>
				
				<tr>
					<td>Enter Roadtax Validity</td>
					<Td>
					<select name="yy" required>
					<option value="">Year</option>
					<?php 
					for($i=1950;$i<=2019;$i++)
					{
					echo "<option>".$i."</option>";
					}					
					?>
					
					</select>
					
					<select name="mm" required>
					<option value="">Month</option>
					<?php 
					for($i=1;$i<=12;$i++)
					{
					echo "<option>".$i."</option>";
					}					
					?>
					
					</select>
					
 					
					<select name="dd" required>
					<option value="">Date</option>
					<?php 
					for($i=1;$i<=31;$i++)
					{
					echo "<option>".$i."</option>";
					}					
					?>
					
					</select>
					
					</td>
				</tr>	
				<tr>
					<td>Upload  Car's Image </td>
					<Td><input class="form-control" type="file" name="img" required/></td>

				</tr>
				
				<tr>
					
					
<Td colspan="2" align="center">
<input type="submit" class="btn btn-default" value="Save Vehicle Information" name="addVehicle"/>
<input type="reset" class="btn btn-default" value="Reset"/>
				
					</td>
				</tr>
			</table>
			
		</form>
	