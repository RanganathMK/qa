<?php
session_start();
session_destroy();
header('location:login.php');

	   $service_url = 'http://api.beta.myplex.in/user/v2/signOut';
       $curl = curl_init($service_url);
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($curl, CURLOPT_POST, false);


       $curl_response = curl_exec($curl);
       curl_close($curl);


?>