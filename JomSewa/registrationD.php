<?php 
	require('connection.php');
	extract($_POST);
	if(isset($save))
	{
		//check user alereay exists or not
		$sql=mysqli_query($conn,"select * from registration where AppEmail='$e'");

		$r=mysqli_num_rows($sql);

		if($r=="true")
			{
			$ser=implode(",",$ser);
			//$driver=$_SESSION['driver'];
			$imageName=$_FILES['img']['name'];

			if(!is_dir("images/$e"))
			{
				mkdir("images/$e");
			}
			else
			{
				move_uploaded_file($_FILES['img']['tmp_name'],"images/$e/".$_FILES['img']['name']);
			}
			//upload image

			//encrypt your password
			$pass=md5($p);

			$query="insert into registration values('','$n','$e','$pass','$gen','$ser','$imageName',now())";
			mysqli_query($conn,$query);
			$err="<font color='blue'>Registration successfully!</font>";
			}
		else
		{
			$err= "<font color='red'>This user already exists</font>";
		}
	}
?>

	<h3><b>Driver Registration Form</b></h3><br>
		<?php echo @$err;?>
		<form method="post" enctype="multipart/form-data">
			<table class="table table-bordered">
				<tr>
					<td>Enter Your Name:</td>
					<Td><input  type="text"  class="form-control" name="n" required/></td>
				</tr>
				<tr>
					<td>Enter Your Email Address: </td>
					<Td><input type="email"  class="form-control" name="e" required/></td>
				</tr>
				<tr>
					<td>Enter Your Password: </td>
					<Td><input type="password"  class="form-control" name="p" required/></td>
				</tr>
				<tr>
					<td>Select Your Gender:</td>
					<Td>
						Male <input type="radio" name="gen" value="m" required/>
						Female <input type="radio" name="gen" value="f"/>	
					</td>
				</tr>
				<tr>
					<td>Choose Service Type:</td>
					<td>
						Cab <input value="cab" type="checkbox" name="ser[]" required/>
					</td>
				</tr>
				<tr>
					<td>Upload Your Image: </td>
					<Td><input class="form-control" type="file" name="img" required/></td>
				</tr>
				<Td colspan="2" align="center">
					<input type="submit" class="btn btn-success" value="Sign Up" name="save"/>
					<input type="reset" class="btn btn-success" value="Reset"/>
				</td>
				</tr>
			</table>
		</form>
	</body>
</html>