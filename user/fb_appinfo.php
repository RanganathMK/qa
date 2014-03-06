
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


$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Cookie: $myCookie;"));
curl_setopt($ch, CURLOPT_URL, "{$api_url}/user/v2/social/appInfo/FB/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
echo "<pre>$response</pre>";
?>

<?php include '../footer.php'; ?>