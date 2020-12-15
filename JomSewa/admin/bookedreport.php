<?php
    $con = mysqli_connect("localhost","root","","jomsewa");
  if($con){
    //echo "connected";
  }
 ?>
<html>
<head>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['students', 'contribution'],
         <?php
         $sql = "SELECT *, COUNT(BookingID) AS booked FROM booking GROUP BY destination";
         $fire = mysqli_query($con, $sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo"['".$result['destination']."',".$result['booked']."],";
          }

         ?>
        ]);

        var options = {
          title: 'Percentages of Destination Visited By Students.',
          pieHole: 0.4
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
</script>
<style>
table,td{
cellpadding: 10;
border: 1px solid black;
}
</style>
</head>
<body>
<?php 
$q=mysqli_query($conn,"select * from booking ");
$rr=mysqli_num_rows($q);
if(!$rr)
{
echo "<h2 style='color:red'>No any Notice found !!!</h2>";
}
else
{
?>
<h2 style="color:Black">List All Customer Booking Report</h2>

<table class="table table-bordered">
	<Tr class="success">
	    <th>ID</th>
	    <th>Destination</th>
		<th>Driver</th>
		<th>Payment</th>
	</Tr>

<?php 


$i=1;
while($row=mysqli_fetch_assoc($q))
{

echo "<Tr>";
echo "<td>".$i."</td>";
echo "<td>".$row['destination']."</td>";
echo "<td>".$row['driver']."</td>";
echo "<td>".$row['payment']."</td>";

?>
<?php 
echo "</Tr>";
$i++;
}?>
</table>
<?php }?>
</body>
 <div id="piechart" style="width: 900px; height: 500px;"></div>
 </html>
