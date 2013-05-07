<html>
<title>Professor Home</title>

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
$username = $_SESSION['netid'];
$fname = $_SESSION['firstname'];
$lname = $_SESSION['lastname'];

echo "<h3>Professor Home Page</h3><h4>Welcome back $fname $lname!</h4>";

echo "<b><u>Add Sections Teaching</u></b><br>";
$sql = "SELECT courseID, courseName FROM Course"; 
$query = mysql_query($sql); 
if (!$query) {
exit('The query failed.4'); 
} 
// Create a drop-down box.
?>

<form action="insertSectionTaught.php" method="post">
<select name='coursetaught'>";
<?php
while ($courses = mysql_fetch_array($query)) {
	$courseid = $courses['courseID'];
	$coursename = $courses['courseName'];
	echo "<option value='$courseid'>" . $courses['courseName'] . "</option>";
} 
echo "</select>";
?>
<br>Section Number: <input type="int" name = "secnum" maxlength ="3">
<br>Number Registered: <input type="int" name = "regnum" maxlength ="3">
<br>Maximum Room Capacity: <input type="int" name = "cap" maxlength = "3"><br>
<input type = "submit" value = "Add Course">
</form>



<?php

echo "<b><u>Current Sections Teaching</u></b><br>";
$sql = "SELECT schoolNum, majorNum, courseNumber, courseName, courseID FROM Course where courseID in 
(SELECT courseID FROM SectionsTaught WHERE netid = '$username' GROUP BY (courseID))";
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

?>

<form action="index.php" method="post">
<input type = "submit" value = "Logout">

</html>