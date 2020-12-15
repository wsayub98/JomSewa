<?php 
	$q=mysqli_query($conn,"select * from user ");
	$rr=mysqli_num_rows($q);
	if(!$rr)
		{
		echo "<h2 style='color:red'>No any user exists!!!</h2>";
		}
	else
	{
?>

<script>
	function DeleteUser(id)
	{
		if(confirm("You want to delete this record?"))
		{
		window.location.href="delete_user.php?id="+id;
		}
	}
</script>

<h2>Customer List</h2><br>

<table class="table table-bordered">
	<Tr class="success">
		<th>No.</th>
		<th>Name</th>
		<th>Email Address</th>
		<th>Mobile Number</th>
		<th>Gender</th>
		<th>Delete</th>
	</Tr>

<?php 
	$i=1;
	while($row=mysqli_fetch_assoc($q))
	{
		echo "<Tr>";
		echo "<td>".$i."</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['email']."</td>";
		echo "<td>".$row['mobile']."</td>";
		echo "<td>".$row['gender']."</td>";
?>
		<Td><a href="javascript:DeleteUser('<?php echo $row['id']; ?>')" style='color:Red'><span class='glyphicon glyphicon-trash'></span></a></td>
		<?php 
		echo "</Tr>";
		$i++;
	}
		?>
		
</table>
<?php }?>