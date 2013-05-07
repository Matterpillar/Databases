<?php

$host="localhost:3306"; // Host name
$username="maraneta"; // Mysql username
$password="password"; // Mysql password
$db_name="test"; // Database name
$tbl_name="Professor"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$mynetid = $_POST['netid'];
$mypassword = $_POST['password'];
$myfirstname = $_POST['firstName'];
$mylastname = $_POST['lastName'];
$mysecurityquestion = $_POST['securityQuestion'];
$mysecurityanswer = $_POST['securityAnswer'];

mysql_query("INSERT INTO Professor (netid, password, firstName, lastName, securityQuestion, 
securityAnswer)
VALUES
('$mynetid', '$mypassword', '$myfirstname', '$mylastname', '$mysecurityquestion', 
'$mysecurityanswer')");



$redirectionTime = 3;
$newPageUrl = "index.php";
header( "Refresh: $redirectionTime; url=$newPageUrl" );
echo "Account added. You will now be redirected to the home page, after $redirectionTime seconds.";



?> 