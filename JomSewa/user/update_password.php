<?php 
	extract($_POST);
	if(isset($save))
	{
		if($np=="" || $cp=="" || $op=="")
		{
			$err="<font color='red'>You need to fill in every field.</font>";	
		}
		else
		{
			$op=md5($op);	

			$sql=mysqli_query($conn,"select * from user where pass='$op'");
			$r=mysqli_num_rows($sql);

			if($r==true)
			{
				if($np==$cp)
				{
					$np=md5($np);
					$sql=mysqli_query($conn,"update user set pass='$np' where email='$user'");
	
					$err="<font color='blue'>Password updated!</font>";
				}
				else
				{
					$err="<font color='red'>Both new password is different. Please re-enter again.</font>";
				}
			}
			else
			{
				$err="<font color='red'>Wrong old password!</font>";

			}
		}
	}
?>

<h2>Update Password</h2><br>
<form method="post">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><?php echo @$err;?></div>
	</div>
	<div class="row">
		<div class="col-sm-4">Enter Old Password:</div>
		<div class="col-sm-5">
		<input type="password" name="op" class="form-control"/></div>
	</div>
	<div class="row">
		<div class="col-sm-4">Enter New Password:</div>
		<div class="col-sm-5">
		<input type="password" name="np" class="form-control"/></div>
	</div>
	<div class="row">
		<div class="col-sm-4">Reenter New Password:</div>
		<div class="col-sm-5">
		<input type="password" name="cp" class="form-control"/></div>
	</div>
	<div class="row" style="margin-top:10px">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
		<br>
		<input type="submit" value="Update Password" name="save" class="btn btn-success"/>
		<input type="reset" class="btn btn-success"/>
		</div>
	</div>
</form>	