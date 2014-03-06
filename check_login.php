<?php
include_once ('config.php');

// Define $myusername and $mypassword
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];


//post request to signIn api
	  //$service_url = 'http://api.beta.myplex.in/user/v2/signIn';
	   $service_url = "{$api_url}/user/v2/signIn";
	  
       $curl = curl_init($service_url);
       $curl_post_data = array(
            "userid" => $myusername,
			"password" => $mypassword,
            );
		
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($curl, CURLOPT_POST, true);
       curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
	   curl_setopt($curl, CURLOPT_HEADER      ,1);

       $curl_response = curl_exec($curl);
	   
	   $curlHeaderSize=curl_getinfo($curl,CURLINFO_HEADER_SIZE);       
	   $ResponseData = mb_substr($curl_response, $curlHeaderSize);
	   $ResponseHeader = mb_substr($curl_response, 0, $curlHeaderSize);

	preg_match_all('|Set-Cookie: (.*);|U', $ResponseHeader, $content);   
	
	$ResponseCookie = implode(';', $content[1]);
			
	//echo $ResponseCookie;
 
       //$xml = new SimpleXMLElement($curl_response);

		//print_r($curl_response);
		
		
		//Another method of printing response
		
		//$phpArray = json_decode($curl_response);
		//print_r($phpArray);
		//foreach ($phpArray as $key => $value) {
		//echo "<p>$key : $value</p>";
		//}



// If result matched $myusername and $mypassword, table row must be 1 row


//if($phpArray->{'code'} == 200)
if (preg_match("([^A-Za-z0-9]code[^A-Za-z0-9]\\S[^A-Za-z0-9]200)", $curl_response, $match))
{

// Register $myusername, $mypassword and redirect to file "login_success.php"


		session_start();//para mag start ang session
		$_SESSION['myusername']=$myusername;//kwaon ang id sang may tyakto nga username kag password ang ibotang sa $_SESSION['member_id']
		$_SESSION['ResponseCookie']   = $ResponseCookie;

		header('location:welcome.php');

}
else {
echo "<center>Wrong Username or Password <br><a href='login.php'>Go Back</a></center>";



}


?>