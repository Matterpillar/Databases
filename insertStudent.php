<?php

$host="localhost:3306"; // Host name
$username="maraneta"; // Mysql username
$password="password"; // Mysql password
$db_name="test"; // Database name
$tbl_name="Student"; // Table name

// Connect to server and select databse.
$con = mysql_connect("$host", "$username", "$password")or die("cannot connect");
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

//condition to add student
$addstudent = 1;

//make sure each form is filled out
foreach($_POST as $key => $value) {
	if((!isSet($value)) or (!$value) or ($value = "")) {
		$addstudent = 0;
	}
}

//echo message if forms aren't filled out
if($addstudent == 0){
	echo "Please fill out all forms.<br>";
}

//make sure there does not exist a student with the same netID
$query = mysql_query("SELECT * FROM Student WHERE netid = '$mynetid'");
$samenetid = mysql_num_rows($query);

//if there are any rows, there is already a student with the same netid
if($samenetid > 0) {
		$addstudent = 0;
		echo "An account with that netID already exists.<br>";
}

//add student into the database
if($addstudent == 1) {
	mysql_query("INSERT INTO Student (netid, password, firstName, lastName, securityQuestion, 
	securityAnswer, RUID, major, numCredits, graduationMonth, graduationYear)
	VALUES
	('$mynetid', '$mypassword', '$myfirstname', '$mylastname', '$mysecurityquestion', 
	'$mysecurityanswer', '$myRUID', '$mymajor', '$mynumcredits', '$mygradmonth', '$mygradyear')");
	
	echo "Account added.<br>";
}


$redirectionTime = 4;
$newPageUrl = "index.php";
header( "Refresh: $redirectionTime; url=$newPageUrl" );
echo "<br><br>You will now be redirected to the home page, after $redirectionTime seconds.";




?> 