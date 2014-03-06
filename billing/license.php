
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




<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<span><b>Note:</b>comma separated for multiple ContentId's</span><br><br>	 
ContentId: <input type='text' name='contentId'> 
<input type="submit" value='Submit'>

</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")

{

$contentId= stripslashes($_POST['contentId']);


//$con=mysqli_connect("myplexbetadb.cfq9k7y10h4w.ap-southeast-1.rds.amazonaws.com","apalya_betadb","apalyabeta01","myplex_service");
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

$license="SELECT * FROM myplex_service.player_events_licenseproxyevent where user_id='$id' and content_id in ($contentId);"; 
$response=mysqli_query($con, $license);

echo "<center>";
echo "<table border='1' cellpadding='5'>
<tr>
<th style='background-color:#000; color:#fff;'>user_id</th>
<th style='background-color:#000; color:#fff;'>content_id</th>
<th style='background-color:#000; color:#fff;'>license_token</th>
<th style='background-color:#000; color:#fff;'>license_created_on</th>
<th style='background-color:#000; color:#fff;'>playback_started_on</th>
<th style='background-color:#000; color:#fff;'>playback_last_modified_on</th>
<th style='background-color:#000; color:#fff;'>package_id</th>
<th style='background-color:#000; color:#fff;'>commercial_model</th>
<th style='background-color:#000; color:#fff;'>evergent_update_status</th>
</tr>";

while($row = mysqli_fetch_array($response) )
  {
  echo "<tr>";
  echo "<td style='background-color:gray; color:#fff;'>" . $row['user_id'] . "</td>";
  echo "<td style='background-color:gray; color:#fff;'>" . $row['content_id'] . "</td>";
  echo "<td style='background-color:gray; color:#fff;'>" . $row['license_token'] . "</td>";
  echo "<td style='background-color:gray; color:#fff;'>" . $row['license_created_on'] . "</td>";
  echo "<td style='background-color:gray; color:#fff;'>" . $row['playback_started_on'] . "</td>";
  echo "<td style='background-color:gray; color:#fff;'>" . $row['playback_last_modified_on'] . "</td>";
  echo "<td style='background-color:gray; color:#fff;'>" . $row['package_id'] . "</td>";
  echo "<td style='background-color:gray; color:#fff;'>" . $row['commercial_model'] . "</td>";
  echo "<td style='background-color:gray; color:#fff;'>" . $row['evergent_update_status'] . "</td>";
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