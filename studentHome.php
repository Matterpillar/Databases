<html>
<title>Student Home</title>

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
$ruid = $_SESSION['RUID'];
$major = $_SESSION['major'];
$numcredits = $_SESSION['numCredits'];
$gradmonth = $_SESSION['gradmonth'];
$gradyear = $_SESSION['gradyear'];


echo "<h3>Student Home Page</h3><h4>Welcome back $fname $lname!</h4>
<table>
<tr><td><u>Major:</u></td><td>$major</td></tr>
<tr><td><u>Number of Credits:</u></td><td>$numcredits</td></tr>
<tr><td><u>RUID:</u></td><td>$ruid</td></tr>
<tr><td><u>Graduation Date:</u></td><td>$gradmonth/$gradyear</td></tr>
</table>";

echo "<br><br><b><u>Add Courses Taken</u></b><br>";
$sql = "SELECT courseID, courseName FROM Course"; 
$query = mysql_query($sql); 
if (!$query) {
exit('The query failed.'); 
} 
// Create a drop-down box.
?>

<form action="insertCourseTaken.php" method="post">
<select name='coursetaken'>";

<?php
while ($courses = mysql_fetch_array($query)) {
	$courseid = $courses['courseID'];
	$coursename = $courses['courseName'];
	echo "<option value='$courseid'>" . $courses['courseName'] . "</option>";
} 
echo "</select>";
?>


<br>Grade Earned: <br>
<select name = "grade">
<option value = "A">A</option>
<option value = "B">B</option>
<option value = "C">C</option>
<option value = "D">D</option>
<option value = "F">F</option>
</select>
<br><input type = "submit" value = "Add Course">
</form>



<?php
echo "<b><u>Courses Taken<br></b></u>";
$sql = "SELECT schoolNum, majorNum, courseNumber, courseName FROM Course where courseID in 
(SELECT courseID FROM hasTaken WHERE netid = '$username')";
$query = mysql_query($sql);
while ($courses = mysql_fetch_array($query)) {
	$schoolnum = $courses['schoolNum'];
	$majornum = $courses['majorNum'];
	$coursenum = $courses['courseNumber'];
	$coursename = $courses['courseName'];
	echo "0$schoolnum:$majornum:$coursenum - $coursename<br>";
}

echo "<br><b><u>Select Course to Special Permission Into</u></b><br>";
echo "Only courses which have sections registered by a Professor in this system right now will be displayed<br>";
$sql = "SELECT schoolNum, majorNum, courseNumber, courseName, courseID FROM Course where courseID in 
(SELECT courseID FROM SectionsTaught GROUP BY (courseID))";
$query = mysql_query($sql);
if (!$query) {
exit('The query failed.5'); 
} 
?>
<form action="insertSectionRequesting.php" method="post">
<select name='coursereq'>";
<?php
while ($courses = mysql_fetch_array($query)) {
	$schoolnum = $courses['schoolNum'];
	$majornum = $courses['majorNum'];
	$coursenum = $courses['courseNumber'];
	$coursename = $courses['courseName'];
	$courseid = $courses['courseID'];
	echo "<option value='$courseid'>" . $courses['courseName'] . "</option>";
}
echo "</select>";
?>
<br><input type = "submit" value = "Request Course">
</form>	

<form action="index.php" method="post">
<input type = "submit" value = "Logout">

</html>
	