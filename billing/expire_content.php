
<?php

session_start();

if (!isset($_SESSION['myusername'])){
header('location:../login.php');
}
?>

<?php include '../header.php'; ?>

</br>
</br>

<html>
<body>




<form method="POST" action="<?php echo ($_SERVER["PHP_SELF"]);?>">
<span><b>Note:</b> comma separated for multiple OrderId's and Expiring content result in lose of purchase and need to re-purchase the content</span><br><br>	 
OrderId: <input type='text' name='orderId'> 
<input type="submit" value='Submit'>

</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")

{

$orderId= stripslashes($_POST['orderId']);



//$con=mysqli_connect("myplexbetadb.cfq9k7y10h4w.ap-southeast-1.rds.amazonaws.com","apalya_betadb","apalyabeta01","myplex_service");
$con=mysqli_connect("$db_host","$db_user","$db_pass","$db_table");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$expire="UPDATE ccbuser.ordered_product SET validity_end_date='2013-03-20 15:31:45' where ord_prod_id in ($orderId);";

//echo $expire;

$update=mysqli_query($con, $expire);

if(! $update )
{
  die('Could not update data: ' . mysql_error());
}


echo " <center>Updated and Expired Successfully </center><br>";


$validity="SELECT * FROM ccbuser.ordered_product where ord_prod_id in ($orderId);"; 

$response=mysqli_query($con, $validity);

echo "<center>";
echo "<table border='1' cellpadding='5'>
<tr>
<th style='background-color:#000; color:#fff;'>srv_start_date</th>
<th style='background-color:#000; color:#fff;'>price_charged</th>
<th style='background-color:#000; color:#fff;'>validity_period</th>
<th style='background-color:#000; color:#fff;'>validity_duration</th>
<th style='background-color:#000; color:#fff;'>validity_end_date</th>
</tr>";

while($row = mysqli_fetch_array($response) )
  {
  echo "<tr>";
  echo "<td style='background-color:gray; color:#fff;'>" . $row['srv_start_date'] . "</td>";
  echo "<td style='background-color:gray; color:#fff;'>" . $row['price_charged'] . "</td>";
  echo "<td style='background-color:gray; color:#fff;'>" . $row['validity_period'] . "</td>";
  echo "<td style='background-color:gray; color:#fff;'>" . $row['validity_duration'] . "</td>";
  echo "<td style='background-color:gray; color:#fff;'>" . $row['validity_end_date'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
echo "</center>";

mysqli_close($con);

}

?> 

</body>
</html>
<?php include '../footer.php'; ?>