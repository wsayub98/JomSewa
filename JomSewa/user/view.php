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
<center>
<?php
			// to make a connection with database
			$con = mysqli_connect("localhost", "root") or die(mysqli_error());

	        // to select the targeted database
	        mysqli_select_db($con, "jomsewa") or die(mysqli_error());
			
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

$sql1 = "SELECT * from Booking";

$result1 = $con->query($sql1);


if ($result1->num_rows > 0) {
    // output data of each row
    echo '<table>';
	echo '<tr><th>Destination</th><th>Driver</th><th>Payment</th><th>Point</th><th>Distance</th></tr>';
	while($row = $result1->fetch_assoc()) {
        echo '<tr><td>'; 
		echo $row["destination"],'</td><td>',$row["driver"],'</td><td>',$row["payment"],'</td><td>',$row["point"],'</td><td>',$row["distance"],'</td></tr>';
	}
	echo '</table>';
} else {
    echo "0 results";
}


$con->close();
?>
</center>
</body>
</html>