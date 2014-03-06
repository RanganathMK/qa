
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
$myCookie = $_SESSION['ResponseCookie'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Cookie: $myCookie;"));
curl_setopt($ch, CURLOPT_URL, "{$api_url}/content/v2/contentList/?type=movie&&level=devicemin&startIndex=1&count=300&pretty=1");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

//echo "<pre>$response</pre>";
$json = json_decode($response, true);

echo "#################<b>Free Rental SD Movies</b>###############"; echo "<br><br>";

$i = 0;

foreach ($json['results'] as $search) {
    $i++;

                                       
	//echo "Title = "  .$search['generalInfo']['title'];echo "<br>";
	//echo "Title = "  .$search['packages'][0]['priceDetails'][0];echo "<br>";

	
	if (empty($search['packages'])) {
	
	echo "";
	
	}
	
	elseif ($search['packages'][0]['priceDetails'][0]['price'] == 0.0 ) {

	$pic = $search['images']['values']['6']['link'];
	//echo "<img src={$pic} width=60 height=90>"; echo "<br>";
	echo "Title = "  .$search['generalInfo']['title'];  echo "  ({$search['_id']})";  echo "<br><br>";
	
	}

}

echo "#################<b>Free Buy SD Movies</b>###############"; echo "<br><br>";

// Free Buy SD 


$i = 0;

foreach ($json['results'] as $search) {
    $i++;

                                       
	//echo "Title = "  .$search['generalInfo']['title'];echo "<br>";
	//echo "Title = "  .$search['packages'][0]['priceDetails'][0];echo "<br>";

	
	if (empty($search['packages'])) {
	
	echo "";
	
	}
	
	elseif(empty($search['packages'][1])) {
	echo "";
	}
	
	elseif ($search['packages'][1]['priceDetails'][0]['price'] == 0.0 ) {

	$pic = $search['images']['values']['6']['link'];
	//echo "<img src={$pic} width=60 height=90>"; echo "<br>";
	echo "Title = "  .$search['generalInfo']['title'];  echo "  ({$search['_id']})";  echo "<br><br>";


	
	}


}

?>


<?php include '../footer.php'; ?>