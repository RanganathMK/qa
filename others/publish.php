
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

//echo $_SESSION['ResponseCookie'];
$myCookie = $_SESSION['ResponseCookie'];


$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Cookie: $myCookie;"));
curl_setopt($ch, CURLOPT_URL, "{$content_store}api/publish/content/".$contentId);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$request = "{$content_store}api/publish/content/".$contentId;
echo $request;
echo "<pre>$response</pre>";


}

?>



</body>
</html>



<?php include '../footer.php'; ?>