<?php 
$q=mysqli_query($conn,"select * from registration ");
$rr=mysqli_num_rows($q);
if(!$rr)
{
echo "<h2 style='color:red'>No any user exists !!!</h2>";
}
else
{
?>

<script>

  function RejectUser(id)
  {
    if(confirm("You want to reject this record ?"))
    {
    window.location.href="reject_user.php?id="+id;
    }
  }

  function AcceptUser(e)
  {
    if(confirm("You want to approve this record ?"))
    {
    window.location.href="approve_user.php?e="+e;
    }
  }

  
</script>



<h2 style="color:#00FFCC">List of request</h2>

<table class="table table-bordered">
  <Tr class="success">
    <th>Sr.No</th>
    <th>Driver Name</th>
    <th>Driver Email</th>
    <th>Gender</th>
    <th>Services</th>
    <th>Approve</th>
    <th>Reject</th>
  </Tr>
<?php 


$i=1;
while($row=mysqli_fetch_assoc($q))
{

echo "<Tr>";
echo "<td>".$i."</td>";
echo "<td>".$row['AppName']."</td>";
echo "<td>".$row['AppEmail']."</td>";
echo "<td>".$row['AppGender']."</td>";
echo "<td>".$row['AppServices']."</td>";
?>

<Td><a href="javascript:AcceptUser('<?php echo $row['AppID']; ?>')" style='color:Green'><span class='glyphicon glyphicon-check'></span></a></td>
<Td><a href="javascript:RejectUser('<?php echo $row['AppID']; ?>')" style='color:Red'><span class='glyphicon glyphicon-trash'></span></a></td>


 <?php 

echo "</Tr>";
$i++;
}
    ?>
    
</table>
<?php }?>
