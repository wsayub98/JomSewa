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
$q=mysqli_query($conn,"select * from vehicle ");
$rr=mysqli_num_rows($q);
if(!$rr)
{
echo "<h2 style='color:red'>No any Notice found !!!</h2>";
}
else
{
?>
<h2 style="color:Black">List All Vehicle Report</h2>

<table class="table table-bordered">
	<Tr class="success">
	    <th>ID</th>
		<th>Type</th>
		<th>Manufacturer</th>
		<th>Model</th>
		<th>Road Tax</th>
		<th>Email</th>
	</Tr>

<?php 

$i=1;
while($row=mysqli_fetch_assoc($q))
{

echo "<Tr>";
echo "<td>".$i."</td>";
echo "<td>".$row['CarType']."</td>";
echo "<td>".$row['CarManufacturer']."</td>";
echo "<td>".$row['CarModel']."</td>";
echo "<td>".$row['CarRtx']."</td>";
echo "<td>".$row['DriverID']."</td>";

?>
<?php 
echo "</Tr>";
$i++;
}?>
</table>
<?php }?>