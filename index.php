<?php

session_start();

if (!isset($_SESSION['myusername'])){
header('location:login.php');
}

else {
header('location:welcome.php');
}

?>

