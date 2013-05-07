<?php

$host="localhost:3306"; // Host name
$username="maraneta"; // Mysql username
$password="password"; // Mysql password
$db_name="test"; // Database name
$tbl_name="Student"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form
$myusername=$_POST['netid'];
$mypassword=$_POST['password'];
$myuser=$_POST['usertype'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myuser = stripslashes($myuser);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$myuser = mysql_real_escape_string($myuser);
$mystudent = "student";
$myprofessor = "professor";
if($myuser == $mystudent)
$sql="SELECT * FROM Student WHERE netid= '$myusername' and password='$mypassword'";
if($myuser == $myprofessor)
$sql="SELECT * FROM Professor WHERE netid= '$myusername' and password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// Check username and password match
if ($count == 1)
 {
// Set username session variable
	while ($row = mysql_fetch_array($result)){ 
  	  $netid = $row['netid'];
  	  $firstname = $row['firstName'];
 	   $lastname = $row['lastName'];
 	   $major = $row['major'];
 	   $ruid = $row['RUID'];
 	   $numcredits = $row['numCredits'];
 	   $gradmonth = $row['graduationMonth'];
  	   $gradyear = $row['graduationYear'];
	}
	session_start();
	$_SESSION['loggedin'] = TRUE;
	$_SESSION['netid'] = $netid;
	$_SESSION['firstname'] = $firstname;
	$_SESSION['lastname'] = $lastname;

	if($myuser == $mystudent) {
		$_SESSION['RUID'] = $ruid;
		$_SESSION['major'] = $major ;
		$_SESSION['numCredits'] = $numcredits;
		$_SESSION['gradmonth'] = $gradmonth;
		$_SESSION['gradyear'] = $gradyear;
		header('Location: studentHome.php');
	}
	else {
		header('Location: professorHome.php');
	}
// Jump to secured page

}

else {
$redirectionTime = 3;
$newPageUrl = "index.php";
header( "Refresh: $redirectionTime; url=$newPageUrl" );
echo "Login unsuccessful! You will now be redirected to the home page, after $redirectionTime seconds.";
}

?>