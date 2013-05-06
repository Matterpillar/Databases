<?php
session_start();

$redirectionTime = 2;
$newPageUrl = "studentHome.php";
header( "Refresh: $redirectionTime; url=$newPageUrl" );
echo "Login successful!";

?>
