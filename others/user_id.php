
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

echo "<center>";
echo "<table border='1' cellpadding='5'>
<tr>
<th style='background-color:#000; color:#fff;'>user_id</th>

</tr>";


  echo "<tr>";
  echo "<td style='background-color:gray; color:#fff;'>" . $id . "</td>";
  echo "</tr>";

echo "</table>";
echo "</center>";

mysqli_close($con);
?> 
<?php include '../footer.php'; ?>