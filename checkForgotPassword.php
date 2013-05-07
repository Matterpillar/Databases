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

$mystudent = "student";
$myprofessor = "professor";

$myusername=$_POST['netid'];
$myuser=$_POST['usertype'];

if($myuser==$mystudent)
$sql="SELECT * FROM Student WHERE netid= '$myusername'";

if($myuser==$myprofessor)
$sql="SELECT * FROM Professor WHERE netid= '$myusername'";

$query = mysql_query($sql); 
if (!$query) {
exit('The query failed.'); 
} 

// Mysql_num_row is counting table row
$count=mysql_num_rows($query);

if ($count != 1 || $myusername=='')
 {
	$redirectionTime = 3;
	$newPageUrl = "index.php";
	header( "Refresh: $redirectionTime; url=$newPageUrl" );
	echo "Incorrect Username! You will now be redirected to the home page, after $redirectionTime seconds.";
 }
 else {
 
// Set username session variable
while ($row = mysql_fetch_array($query)){ 
   $netid = $row['netid'];
   $password = $row['password'];
   $securityQuestion = $row['securityQuestion'];
   $securityAnswer = $row['securityAnswer'];
}

	session_start();
	$_SESSION['findPassword'] = TRUE;
	$_SESSION['netid'] = $netid;
	$_SESSION['password'] = $password;
	$_SESSION['securityQuestion'] = $securityQuestion;
	$_SESSION['securityAnswer'] = $securityAnswer;
 
 

	$redirectionTime = 1;
	$newPageUrl = "inputSecurityAnswer.php";
	header( "Refresh: $redirectionTime; url=$newPageUrl" );
	echo "Please wait to be redirected after $redirectionTime seconds.";
	
	}

?>



</html>
	