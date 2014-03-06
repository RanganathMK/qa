
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
ContentId: <input type='text' name='contentId'> 
<input type="submit" value='Submit'>

</form>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")

{

$contentId= $_POST['contentId'];
$param= "?level=devicemax&fields=user/currentdata";
//echo $_SESSION['ResponseCookie'];
$myCookie = $_SESSION['ResponseCookie'];
$pretty = "&pretty=1";

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Cookie: $myCookie;"));
curl_setopt($ch, CURLOPT_URL, "{$api_url}/content/v2/contentDetail/".$contentId .$param .$pretty);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
echo "<pre>$response</pre>";
}

?>



</body>
</html>



<?php include '../footer.php'; ?>