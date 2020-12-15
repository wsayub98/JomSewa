<?php
    $q=mysqli_query($conn,"SELECT *, SUM(payment) AS total FROM booking GROUP BY driver ");
 ?>
<html>
<head>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Driver', 'Total Income (RM)'],
          
          <?php
            
              while($row=mysqli_fetch_array($q)){

                echo "['".$row['driver']."','".$row['total']."'],";
              }
            
          ?>

        ]);

        var options = {
          chart: {
            title: 'Income of Drivers',
            subtitle: 'Total Payment and Income',
        	}
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
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
$query_income= "SELECT *, SUM(payment) AS total FROM booking GROUP BY driver";
$qIncome_result = mysqli_query($conn, $query_income); 
$rr=mysqli_num_rows($qIncome_result);
if(!$rr)
{
echo "<h2 style='color:red'>No any Notice found !!!</h2>";
}
else
{
?>
<h2 style="color:Black">List All Income Report</h2>

<table class="table table-bordered">
	<Tr class="success">
	    <th>NO.</th>
		<th>Name of Driver(s)</th>
		<th>Total Income (RM)</th>
	</Tr>

<?php 

$i=1;
while($row=mysqli_fetch_assoc($qIncome_result))
{

echo "<Tr>";
echo "<td>".$i."</td>";
echo "<td>".$row['driver']."</td>";
echo "<td>".$row['total']."</td>";

?>
<?php 
echo "</Tr>";
$i++;
}?>
</table>
<?php }?>
</body>
<div id="columnchart_material" style="width: 800px; height: 500px;"></div>
</html>
