<?php

$host="localhost:8889"; // Host name
$username="root"; // Mysql username
$password="root"; // Mysql password
$db_name="test"; // Database name
$tbl_name="Student"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$mynetid = $_POST['netid'];
$mypassword = $_POST['password'];
$myfirstname = $_POST['firstName'];
$mylastname = $_POST['lastName'];
$mysecurityquestion = $_POST['securityQuestion'];
$mysecurityanswer = $_POST['securityAnswer'];
$myRUID = $_POST['RUID'];
$mymajor = $_POST['major'];
$mynumcredits = $_POST['numCredits'];
$mygradmonth = $_POST['gradMonth'];
$mygradyear = $_POST['gradYear'];


mysql_query("INSERT INTO Student (netid, password, firstName, lastName, securityQuestion, 
securityAnswer, RUID, major, numCredits, graduationMonth, graduationYear)
VALUES
('$mynetid', '$mypassword', '$myfirstname', '$mylastname', '$mysecurityquestion', 
'$mysecurityanswer', '$myRUID', '$mymajor', '$mynumcredits', '$mygradmonth', '$mygradyear')");


$redirectionTime = 5;
$newPageUrl = "index.php";
header( "Refresh: $redirectionTime; url=$newPageUrl" );
echo "Account added. You will now be redirected to the home page, after $redirectionTime seconds.";




?> 