<?php 
extract($_POST);
if(isset($Update))
{
	
//rtx
$rtx=$yy."-".$mm."-".$dd;

//last service
$lastSV=$tt."-".$bb."-".$hh;

//image
$imageName=$_FILES['img']['name'];
//driverID
$driverID=$_SESSION['driver'];
//upload image

//mkdir("proof/$driverID");
if(!is_dir("proof/$driverID")){
  mkdir("proof/$driverID");
}
move_uploaded_file($_FILES['img']['tmp_name'],"proof/$driverID/".$_FILES['img']['name']);


$query1="INSERT INTO vehicleInfo VALUES ('','$imageName','$lastSV','$driverID')";
$query2="UPDATE vehicle set CarRtx= '$rtx' where DriverID='".$_SESSION['driver']."'";
$result=mysqli_query($conn,$query1);
$result2=mysqli_query($conn,$query2);


if($result)
{
	$err="<font color='blue'>Maintenance record updated !!</font>";

}else
{
	$err="<font color='red'>Error updating !!</font>";
}





}

//select old data
//check user alereay exists or not
$sql=mysqli_query($conn,"select * from vehicle where DriverID='".$_SESSION['driver']."'");
$res=mysqli_fetch_assoc($sql);

?>
<h2 align="center">Update Vehicle Information</h2>

			<?php 
			$q=mysqli_query($conn,"select CarImg from vehicle where DriverID='".$_SESSION['driver']."'");
			$row=mysqli_fetch_assoc($q);
			if($row['CarImg']=="")
			{
			?>
            <li><img style="border-radius:50px" src="../images/person.jpg" width="100" height="100" alt="not found"/></li>
			<?php 
			}
			else
			{
			?>
			<center><img style="border-radius:50px" src="../driver/car/<?php echo $_SESSION['driver'];?>/<?php echo $row['CarImg'];?>" width="100" height="100" alt="not found"/></a></center>
			<?php 
			}
			?>
		<form method="post" enctype="multipart/form-data">
			<table class="table table-bordered">
	<Tr>
		<Td colspan="2"><?php echo @$err;?></Td>
	</Tr>
				
				<tr>
					<td>ID</td>
					<Td><input class="form-control" value="<?php echo $res['VehicleID'];?>"  type="text" name="vID" disabled /></td>
				</tr>
				<tr>
					<td>Car's Type</td>
					<Td><input class="form-control" value="<?php echo $res['CarType'];?>"  type="text" disabled name="carType" /></td>
				</tr>
				<tr>
					<td>Car's Manufacturer </td>
					<Td><input class="form-control" value="<?php echo $res['CarManufacturer'];?>"  type="text" disabled name="mnf" /></td>
				</tr>
				
				
				<tr>
					<td>Car's Model </td>
					<Td><input class="form-control" value="<?php echo $res['CarModel'];?>"  type="text" disabled name="mod" /></td>
				</tr>
				
				<tr>
					<td>New Roadtax Validity</td>
					<?php 
					$arrr1=explode("-",$res['CarRtx']);
					?>
					<Td>
					<select class="form-control" style="width:100px;float:left" name="yy">
					<option value="">Year</option>
					<?php 
					for($i=1950;$i<=2020;$i++)
					{
					?>
					<option <?php if($arrr1[0]==$i){echo "selected";} ?>><?php echo $i; ?></option>
					<?php }					
					?>
					
					</select>
					
					<select class="form-control" style="width:100px;float:left" name="mm">
					<option value="">Month</option>
					<?php 
					for($i=1;$i<=12;$i++)
					{
					?>
					<option <?php if($arrr1[1]==$i){echo "selected";} ?>><?php echo $i; ?></option>
					<?php }					
					?>
					}					
					?>
					
					</select>
					
 					
					<select class="form-control" style="width:100px;float:left" name="dd">
					<option value="">Date</option>
					<?php 
					for($i=1;$i<=31;$i++)
					{
					?>
					<option <?php if($arrr1[2]==$i){echo "selected";} ?>><?php echo $i; ?></option>
					<?php }					
					?>
					}					
					?>
					
					</select>
					
					</td>
				</tr>	
				<tr>
					<td>Last Car's Service </td>
					<Td>
					<select name="tt" required>
					<option value="">Year</option>
					<?php 
					for($i=1950;$i<=2020;$i++)
					{
					echo "<option>".$i."</option>";
					}					
					?>
					
					</select>
					
					<select name="bb" required>
					<option value="">Month</option>
					<?php 
					for($i=1;$i<=12;$i++)
					{
					echo "<option>".$i."</option>";
					}					
					?>
					
					</select>
					
 					
					<select name="hh" required>
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
					<td>Proof of Maintenance </td>
					<Td><input class="form-control" type="file" name="img" required/></td>

				</tr>
				
				<tr>
					
					
<Td colspan="2" align="center">
<input type="submit" class="btn btn-default" value="Update Information" name="Update"/>
<input type="reset" class="btn btn-default" value="Reset"/>
				
					</td>
				</tr>
			</table>
			
		</form>
	