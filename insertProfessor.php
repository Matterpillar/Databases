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

//condition to add professor
$addprofessor = 1;

//make sure each form is filled out
foreach($_POST as $key => $value) {
	if((!isSet($value)) or (!$value) or ($value = "")) {
		$addprofessor = 0;
	}
}

//echo message if forms aren't filled out
if($addprofessor == 0){
	echo "Please fill out all forms. ";
}

//make sure there does not exist a addprofessor with the same netID
$query = mysql_query("SELECT * FROM Professor WHERE netid = '$mynetid'");
$samenetid = mysql_num_rows($query);

//if there are any rows, there is already a professor with the same netid
if($samenetid > 0) {
		$addprofessor = 0;
		echo "An account with that netID already exists. ";
}

//add professor into the database
if($addprofessor == 1){
	mysql_query("INSERT INTO Professor (netid, password, firstName, lastName, securityQuestion, 
	securityAnswer)
	VALUES
	('$mynetid', '$mypassword', '$myfirstname', '$mylastname', '$mysecurityquestion', 
	'$mysecurityanswer')");
	
	echo "Account added. <br>";
}


$redirectionTime = 3;
$newPageUrl = "index.php";
header( "Refresh: $redirectionTime; url=$newPageUrl" );
echo "You will now be redirected to the home page, after $redirectionTime seconds.";



?> 