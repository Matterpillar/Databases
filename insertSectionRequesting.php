<?php

$host="localhost:8889"; // Host name
$username="root"; // Mysql username
$password="root"; // Mysql password
$db_name="test"; // Database name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

session_start();
$username = $_SESSION['netid'];
$fname = $_SESSION['firstname'];
$lname = $_SESSION['lastname'];
$ruid = $_SESSION['RUID'];
$major = $_SESSION['major'];
$numcredits = $_SESSION['numCredits'];
$gradmonth = $_SESSION['gradmonth'];
$gradyear = $_SESSION['gradyear'];
//get values from form
$courseid = $_POST['coursereq'];

echo "<b><u>Special Permission Request - Student<br></b></u>";
echo "<u>Sections Taught<br></u>";
$sql = "SELECT schoolNum, majorNum, courseNumber, courseName, courseID FROM Course 
WHERE courseID = '$courseid'";
$query = mysql_query($sql);
if (!$query) {
exit('The query failed.5'); 
} 
while ($courses = mysql_fetch_array($query)) {
	$schoolnum = $courses['schoolNum'];
	$majornum = $courses['majorNum'];
	$coursenum = $courses['courseNumber'];
	$coursename = $courses['courseName'];
	$courseid = $courses['courseID'];
	$sql1 = "SELECT sectionNumber FROM SectionsTaught WHERE courseID = '$courseid'";
	$query1 = mysql_query($sql1);
	if (!$query1) {
	exit('The query failed.'); 
	} 
	while ($courses1 = mysql_fetch_array($query1)) {
		$sectionNumber = $courses1['sectionNumber'];
		echo "0$schoolnum:$majornum:$coursenum:$sectionNumber - $coursename<br>";
	}
}
$_SESSION['courseID'] = $courseid;
$temp = $_SESSION['courseID'];

$sql = "SELECT schoolNum, majorNum, courseNumber, courseName, courseID FROM Course 
WHERE courseID = '$courseid'";
$query = mysql_query($sql);
if (!$query) {
exit('The query failed.6'); 
} 
while ($courses = mysql_fetch_array($query)) {
	$schoolnum = $courses['schoolNum'];
	$majornum = $courses['majorNum'];
	$coursenum = $courses['courseNumber'];
	$coursename = $courses['courseName'];
	$courseid = $courses['courseID'];
	$sql1 = "SELECT sectionNumber FROM SectionsTaught WHERE courseID = '$courseid'";
	$query1 = mysql_query($sql1);
	if (!$query1) {
	exit('The query failed.'); 
	} 
	while ($courses1 = mysql_fetch_array($query1)) {
		$sectionNumber = $courses1['sectionNumber'];
		echo "0$schoolnum:$majornum:$coursenum:$sectionNumber - $coursename<br>";
	}
}
