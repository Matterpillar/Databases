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
$netID = $_SESSION['netid'];
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


/*
echo "<b><u>Current Sections Teaching</u></b><br>";

//Works, but does not sort the table by course name!
$sql = "SELECT Course.schoolNum, Course.majorNum, Course.courseNumber, Course.maxCapacity, Course.spotsLeft, Course.courseName, 
			Course.courseID, SectionsTaught.sectionNumber, SectionsTaught.numRegistered, SectionsTaught.sectionMax
		FROM Course, SectionsTaught
		WHERE netid = '$netID' AND Course.courseID = SectionsTaught.courseID
		GROUP BY (courseID)";
$query = mysql_query($sql);

if(!$query) {
	exit('The query failed.blah');
}

//Create a table showing all sections being taught and section properties
?>
<div style="text-align: center;">
 <table border = "1"> <tr><th>Course Number</th><th>Section Number</th><th>Course Name</th><th>Students Registered in Section</th><th>Room Capacity</th><th>Students Registered in Course</th><th>Course Capacity</tr><?php

while ($rows = mysql_fetch_array($query)) {
	$schoolNum = $rows['schoolNum'];
	$majorNum = $rows['majorNum'];
	$courseNum = $rows['courseNumber'];
	$maxCap = $rows['maxCapacity'];
	$spotsLeft = $rows['spotsLeft'];
	$courseName = $rows['courseName'];
	$courseID = $rows['courseID'];
	$sectionNum = $rows['sectionNumber'];
	$numReg = $rows['numRegistered'];
	$secMax = $rows['sectionMax'];
	
	$spotsFilled = $maxCap - $spotsLeft;
	$fullNum = "0$schoolNum:$majorNum:$courseNum:$sectionNum";
	
	//create new row per section and fill it with section info

	echo "<tr><td> $fullNum </td><td> $sectionNum </td><td> $courseName </td><td> $numReg </td><td> $secMax </td><td>
			$spotsFilled </td><td> $maxCap </td></tr>";
}

*/

//Create a table showing all sections being taught and section properties
?>

 <table border = "1"> <tr><th>Course Number</th><th>Section Number</th><th>Course Name</th><th>Students Registered in Section</th><th>Room Capacity</th><th>Students Registered in Course</th><th>Course Capacity</tr> 
 
 <?php
 
//Create the SQL query so that it groups the table by Course Name (courseID)
 
$sql = "SELECT * FROM Course WHERE courseID IN 
		(SELECT courseID FROM SectionsTaught WHERE netid = '$netID' GROUP BY (courseID))";
$query = mysql_query($sql);
if (!$query) {
	exit('The query failed.5'); 
} 
while ($courses = mysql_fetch_array($query)) {

	$schoolNum = $courses['schoolNum'];
	$majorNum = $courses['majorNum'];
	$courseNum = $courses['courseNumber'];
	$maxCap = $courses['maxCapacity'];
	$spotsLeft = $courses['spotsLeft'];
	$courseName = $courses['courseName'];
	$courseID = $courses['courseID'];
	
	$spotsFilled = $maxCap - $spotsLeft;

	$sql1 = "SELECT * FROM SectionsTaught WHERE courseID = '$courseID'";
	$query1 = mysql_query($sql1);
	if (!$query1) {
		exit('The query failed.'); 
	} 
	while ($rows = mysql_fetch_array($query1)) {

		$sectionNumber = $rows['sectionNumber'];
		$numReg = $rows['numRegistered'];
		$secMax = $rows['sectionMax'];
		
		$fullNum = "0$schoolNum:$majorNum:$courseNum:$sectionNumber";
	
		//create new row per section and fill it with section info
		echo "<tr><td align=\"center\"> $fullNum </td><td align=\"center\"> $sectionNumber </td><td align=\"center\"> $courseName </td><td align=\"center\"> 
			$numReg </td><td align=\"center\"> $secMax </td><td align=\"center\"> $spotsFilled </td><td align=\"center\"> $maxCap </td></tr>";

	
	}	
}


?> </table> 


<form action="index.php" method="post">
<input type = "submit" value = "Logout">

</html>