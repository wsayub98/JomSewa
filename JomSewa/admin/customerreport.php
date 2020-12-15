<html>
<head>
<style>
table,td{
cellpadding: 10;
border: 1px solid black;
}
</style>
</head>
<body>
<?php 
$q=mysqli_query($conn,"select * from user ");
$rr=mysqli_num_rows($q);
if(!$rr)
{
echo "<h2 style='color:red'>No any Notice found !!!</h2>";
}
else
{
?>
<h2 style="color:Black">List All Customer Report</h2>

<table class="table table-bordered">
	<Tr class="success">
	    <th>ID</th>
		<th>Name</th>
		<th>Email</th>
		<th>Phone Num</th>
		<th>Services</th>
		<th>Date of Birth</th>
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
echo "<td>".$row['services']."</td>";
echo "<td>".$row['dob']."</td>";

?>
<?php 
echo "</Tr>";
$i++;
}?>
</table>
<?php }?>