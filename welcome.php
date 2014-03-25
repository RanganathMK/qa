<?php

session_start();

if (!isset($_SESSION['myusername'])){
header('location:login.php');
}
?>


<?php include 'header.php'; ?>



<html>
<head>
<title>Welcome to Myplex Debugger</title>

<style>


table, td, th
{
border:1px solid green;
font-family:"Arial", Times, serif;
border-radius: 4px;
}
th
{
background-color:green;
color:white;
}

th > a
{
color:#FFF;
text-decoration:none;
font-weight:bold;
font-size:16px;

}

td > a
{
color:#000;
text-decoration:none;
font-weight:none;

}

td > a:hover
{
color:#FF0000;
text-decoration:underline;
font-weight:none;
}


</style>
</head>
<body>




<?php 



$email = $_SESSION['myusername'];
echo "<center>Welcome<b> $email</b></center>"; 

?>   
<br>




<div style="margin-left:auto; margin-right:auto; width:800px;">

<table width='800' border='1' cellpadding='10' cellspacing='10' >
<tr>
<th colspan='4'><a href="#">User Api's</a> </th>
</tr>


<tr>
<td><a href="./user/profile.php">Profile</a> </td>
<td><a href="./user/favorite.php">Favorite</a> </td>
<td><a href="./user/purchased.php">Purchased</a> </td>
<td><a href="./user/rated.php">Rated</a> </td>

</tr>
<tr>
<td><a href="./user/comments.php">Comments</a> </td>
<td><a href="./user/reviews.php">Reviews</a> </td>
<td><a href="./user/fb_appinfo.php">FB appInfo</a> </td>
<td><a href="./user/google_appinfo.php">Google appInfo</a> </td>
</tr>

<tr>
<th colspan='4'><a href="#">Content Api's</a> </th>
</tr>

<tr>
<td><a href="./content/content_details.php">Content-details</a> </td>
<td><a href="./content/field_videos.php">Fields=videos</a> </td>
<td><a href="./content/currentuserdata.php">user/currentdata</a> </td>
<td><a href="./content/subtitle.php">Subtitles</a> </td>
</tr>
<tr>
<td><a href="./content/generalInfo.php">General-Info</a> </td>
<td><a href="./content/issellable.php">Is-sellable</a> </td>
<td><a href="./content/similar_content.php">Similar-Content</a> </td>
<td><a href="./content/search.php">Search</a> </td>

</tr>



<tr>
<th colspan='4'><a href="#">Billing Api's</a> </th>
</tr>
<tr>
<td><a href="./billing/packages.php">Packages</a> </td>
<td><a href="./billing/balance.php">Balance</a> </td>
<td><a href="./billing/license.php">License By ContentId's</a> </td>
<td><a href="./billing/validity_end.php">Validity End Date</a></td>
</tr>
<tr>
<td><a href="./billing/expire_content.php">Expire Content</a> </td>

</tr>


<tr>
<th colspan='4'><a href="#">Miscellaneous</a> </th>
</tr>
<tr>
<td><a href="./others/client_key.php">ClientKey</a> </td>
<td><a href="./others/user_id.php">UserId</a> </td>
<td><a href="./others/unregister_device.php">UnregisterDevice</a> </td>
<td><a href="./others/allowip_check.php">allowIp Check</a> </td>

</tr>

<tr>
<td><a href="./others/free_movies.php">Free Movies</a> </td>
<td><a href="./others/publish.php">Publish-Content</a> </td>


</tr>




<table>
</div>

<?php include 'footer.php'; ?>

</body>
</html>
