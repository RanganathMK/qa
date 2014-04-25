
<?php

session_start();

if (!isset($_SESSION['myusername'])){
header('location:../login.php');
}
?>

<?php include '../header.php'; ?>

</br>
</br>

<?php


//echo $email;



$con=mysqli_connect("$db_host","$db_user","$db_pass","$db_table");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$email= ($_SESSION['myusername']);
  
$user_id="SELECT * FROM myplex_service.myplex_user_useremail where email= '$email'";
$result=mysqli_query($con, $user_id);
$row = mysqli_fetch_array($result);
$id=$row['user_id'];
//echo $id;

$client_key="SELECT client_key, expires_at, user_id,device_id FROM myplex_user_session where user_id='$id' and client_key is  not null order by client_key desc"; 
$response=mysqli_query($con, $client_key);

echo "<center>";
echo "<table border='1' cellpadding='5'>
<tr>
<th style='background-color:#000; color:#fff;'>client_key</th>
<th style='background-color:#000; color:#fff;'>expires_at</th>
<th style='background-color:#000; color:#fff;'>user_id</th>
<th style='background-color:#000; color:#fff;'>device_id</th>
</tr>";

while($row = mysqli_fetch_array($response) )
  {
  echo "<tr>";
  echo "<td style='background-color:gray; color:#fff;'>" . $row['client_key'] . "</td>";
  echo "<td style='background-color:gray; color:#fff;'>" . $row['expires_at'] . "</td>";
  echo "<td style='background-color:gray; color:#fff;'>" . $row['user_id'] . "</td>";
  echo "<td style='background-color:gray; color:#fff;'>" . $row['device_id'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
echo "</center>";



















mysqli_close($con);
?> 
<?php include '../footer.php'; ?>