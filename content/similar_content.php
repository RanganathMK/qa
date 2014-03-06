
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
$param= "?level=devicemax";
//echo $_SESSION['ResponseCookie'];
$myCookie = $_SESSION['ResponseCookie'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Cookie: $myCookie;"));
curl_setopt($ch, CURLOPT_URL, "{$api_url}/content/v2/contentDetail/" .$contentId .$param);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
//echo "<pre>$response</pre>";
//var_dump(json_decode($response, true));
$json = json_decode($response, true);
echo '<pre>';
//print_r($json);
//print_r($json['results'][0]['similarContent']['values'][0]['generalInfo']);
echo '</pre>';

//$info = $json['results'][0]['generalInfo'];
//echo json_encode($info, JSON_PRETTY_PRINT);


echo "<b>"; echo "Similar Content For Movie - " .$json['results'][0]['generalInfo']['title']; echo"</b>"; echo "<br>";echo "<br>";

$i = 0;

foreach ($json['results'][0]['similarContent']['values'] as $sm) {
    $i++;

                                       
	echo "Title = "  .$sm['generalInfo']['title'];echo "<br>";
		echo "ContentId = "  .$sm['_id']; echo "<br>";echo "<br>";
		

}

}

?>



</body>
</html>



<?php include '../footer.php'; ?>