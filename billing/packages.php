
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
$pretty = "1";

	  $service_url = "{$api_url}/user/v2/billing/packages/";
       $ch = curl_init($service_url);
       $ch_post_data = array(
            "contentId" => $contentId,
			"pretty" => $pretty,
			
            );
		
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($ch, CURLOPT_POST, true);
       curl_setopt($ch, CURLOPT_POSTFIELDS, $ch_post_data);
	   curl_setopt($ch, CURLOPT_HTTPHEADER, array("Cookie: $myCookie;"));



$response = curl_exec($ch);
echo "<pre>$response</pre>";
}

?>



</body>
</html>



<?php include '../footer.php'; ?>