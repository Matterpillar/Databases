<html>
<title>Requesting Special Permission for a Section </title>
<?php

$host="localhost:3306"; // Host name
$username="maraneta"; // Mysql username
$password="password"; // Mysql password
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

$sql = "SELECT courseName FROM Course WHERE courseID = '$courseid'";
$query = mysql_query($sql);
if (!$query) {
exit('The query failed.5'); 
} 
while ($courses = mysql_fetch_array($query)) {
	$coursename = $courses['courseName'];
	}


echo "<b><u>Special Permission Request - Student<br><br></b></u>";
echo "<u>Sections Taught For $coursename</u>";
echo " All sections offered with 10 or less spots available will display below (eligible for special permission)<br>";
$sql = "SELECT schoolNum, majorNum, courseNumber, courseName, courseID, spotsLeft FROM Course 
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
	$spotsleft = $courses['spotsLeft'];
	
	$sql1 = "SELECT sectionNumber, maxCapacity, numRegistered FROM SectionsTaught WHERE courseID = '$courseid'";
	$query1 = mysql_query($sql1);
	if (!$query1) {
	exit('The query failed.'); 
	} 
	while ($courses1 = mysql_fetch_array($query1)) {
		$sectionNumber = $courses1['sectionNumber'];
		$maxcap = $courses1['maxCapacity'];
		$numreg = $courses1['numRegistered'];
		$space = $maxcap - $numreg;
		if($space <= 10 AND $space > 0) {
		echo "0$schoolnum:$majornum:$coursenum:$sectionNumber - $coursename Spots left: $space<br>";
		}

	}
}
echo "Section: <br>";
$_SESSION['courseID'] = $courseid;
$temp = $_SESSION['courseID'];




$sql = "SELECT schoolNum, majorNum, courseNumber, courseName, courseID, spotsLeft FROM Course 
WHERE courseID = '$courseid'";
$query = mysql_query($sql);
if (!$query) {
exit('The query failed.5'); 
} 
?>
<form action="insertSectionRequesting2.php" method = "post">
<select name = "secreq">;
<?php
while ($courses = mysql_fetch_array($query)) {
	$schoolnum = $courses['schoolNum'];
	$majornum = $courses['majorNum'];
	$coursenum = $courses['courseNumber'];
	$coursename = $courses['courseName'];
	$courseid = $courses['courseID'];
	$spotsleft = $courses['spotsLeft'];
	
	$sql1 = "SELECT sectionNumber, maxCapacity, numRegistered FROM SectionsTaught WHERE courseID = '$courseid'";
	$query1 = mysql_query($sql1);
	if (!$query1) {
	exit('The query failed.'); 
	} 
	while ($courses1 = mysql_fetch_array($query1)) {
		$sectionnumber = $courses1['sectionNumber'];
		$maxcap = $courses1['maxCapacity'];
		$numreg = $courses1['numRegistered'];
		$space = $maxcap - $numreg;
		if($space <= 10 AND $space > 0) {
		echo "<option value='$sectionnumber'>" . $courses1['sectionNumber'] . "</option>";
		}
	}
}
echo "</select>";
?>
<br><input type = "submit" value = "Request Section">
</form>

