
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

//echo $_SESSION['ResponseCookie'];
$myCookie = $_SESSION['ResponseCookie'];
$pretty = "?pretty=1";

	  $service_url = "{$api_url}/user/v2/billing/balance/" .$pretty;
	
       $ch = curl_init($service_url);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($ch, CURLOPT_POST, true);
	   curl_setopt($ch, CURLOPT_POSTFIELDS, 1);
	   curl_setopt($ch, CURLOPT_HTTPHEADER, array("Cookie: $myCookie;"));



$response = curl_exec($ch);
echo "<pre>$response</pre>";

?>

<?php include '../footer.php'; ?>