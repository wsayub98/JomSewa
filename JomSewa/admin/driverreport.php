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
$q=mysqli_query($conn,"select * from driver ");
$rr=mysqli_num_rows($q);
if(!$rr)
{
echo "<h2 style='color:red'>No any Notice found !!!</h2>";
}
else
{
?>
<h2 style="color:Black">List All Driver Report</h2>

<table class="table table-bordered">
	<Tr class="success">
	    <th>ID</th>
		<th>Name</th>
		<th>Email</th>
		<th>Gender</th>
		<th>Services</th>
		<th>Image</th>
	</Tr>

<?php 

$i=1;
while($row=mysqli_fetch_assoc($q))
{

echo "<Tr>";
echo "<td>".$i."</td>";
echo "<td>".$row['DriverName']."</td>";
echo "<td>".$row['DriverEmail']."</td>";
echo "<td>".$row['DriverGender']."</td>";
echo "<td>".$row['DriverServices']."</td>";
echo "<td>".$row['DriverImage']."</td>";

?>
<?php 
echo "</Tr>";
$i++;
}?>
</table>
<?php }?>