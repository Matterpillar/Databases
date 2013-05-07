<html>
<title>Forgotten Password</title>

<?php

$host="localhost:3306"; // Host name
$username="maraneta"; // Mysql username
$password="password"; // Mysql password
$db_name="test"; // Database name
$tbl_name="Student"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");


session_start();
$securityAnswer = $_SESSION['securityAnswer'];
$password = $_SESSION['password'] ;

$lastAnswer=$_POST['securityAnswer'];

if( $securityAnswer == $lastAnswer){
	$temp = "Password: ";
	$temp = $temp.$password;
	echo  $temp;
} else{
	echo 'Your Security Question Answer was Incorrect. ';
}
?>

<br><br>

<?php
	$redirectionTime = 10;
	$newPageUrl = "index.php";
	header( "Refresh: $redirectionTime; url=$newPageUrl" );
	echo "You will now be redirected to the homepage after $redirectionTime seconds.";
?>


</html>
	