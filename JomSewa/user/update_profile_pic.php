<?php 
	$user= $_SESSION['user'];
	extract($_POST);
	if(isset($update))
	{
		$img=$_FILES['f']['name'];

		$query="update user set image='$img' where email='".$_SESSION['user']."'";
		mysqli_query($conn,$query);

		move_uploaded_file($_FILES['f']['tmp_name'],"../images/$user/".$_FILES['f']['name']);

		$err="<font color='blue'>Profie image has been updated successfully!</font>";
	}

//select old data
//check user alereay exists or not
	$sql=mysqli_query($conn,"select * from user where email='".$_SESSION['user']."'");
	$res=mysqli_fetch_assoc($sql);
?>

<h2 align="center">Update Customer Image</h2><br>
	<?php echo @$err;?><br>
		<form method="post" enctype="multipart/form-data">
			<table class="table table-bordered">
				<tr>
					<td>Choose Your Image:</td>
					<Td><input class="form-control"  type="file" name="f"/></td>
				</tr>
				<tr>
					<Td colspan="2" align="center">
					<input type="submit" class="btn btn-default" value="Update Image" name="update"/>
					</td>
				</tr>
			</table>
		</form>
	