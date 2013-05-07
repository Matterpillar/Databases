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
$grade = $_POST['grade'];
$courseid = $_POST['coursetaken'];

//Validate as to whether this course was taken in the past or not
$checktoaddcourse = 0;
$sql = "SELECT courseID FROM hasTaken WHERE netID = '$username'";
$query = mysql_query($sql);
$countervalue = mysql_num_rows($query);

if (!$query) {
exit('The query failed.'); 
} 
while ($courses = mysql_fetch_array($query)) {
	$pastcid = $courses['courseID'];
	if($pastcid == $courseid) {
		$checktoaddcourse++;
		}
	}


if($checktoaddcourse == 0 && $grade != 'D' && $grade != 'F')
{
//Gathering all prerequisite courses
$sql = "SELECT prereqCourseID FROM Prerequisite WHERE courseID = '$courseid'"; 
$query = mysql_query($sql); 
if (!$query) {
exit('The query failed.'); 
} 
$sizeprereq = mysql_num_rows($query);
$prereq = array();
while ($courses = mysql_fetch_array($query)) {
	$prereq[] = $courses['prereqCourseID'];
	}

$sql = "SELECT courseID FROM hasTaken WHERE netID = '$username'";
$query = mysql_query($sql);
if (!$query) {
exit('The query failed.'); 
} 
$sizepreviouscourses = mysql_num_rows($query);
$previousCourses = array();
while ($courses = mysql_fetch_array($query)) {
	$previousCourses[] = $courses['courseID'];
}



$count = 0;
$x = 0;
$y = 0;

for($x; $x < $sizepreviouscourses; $x++)
{
	for($y; $y < $sizeprereq; $y++)
	{
		//If prereqcourseID matches previouscourseID, add 1 to count
		if($prereq[$y] == $previousCourses[$x])
			$count++;
	}
	$y = 0;
}

if($count == $sizeprereq)
{
$sql = "INSERT INTO hasTaken VALUES('$username','$courseid','$grade')";
mysql_query($sql);
echo "Successful insert";
}

//A prerequisite course is missing
else {
echo "A prerequisite course is missing. Please check whether you have the prerequisite courses
taken in your history";

$x=0;

for($x; $x < $sizeprereq; $x++) {
$y = $x+1;
$sql = "SELECT courseName FROM Course WHERE courseID = '$prereq[$x]'";
	$query = mysql_query($sql);
	while($courses = mysql_fetch_array($query)) {
	$previouscourse = $courses['courseName'];
	echo "<br>$y. $previouscourse";
	}


	
}

}

}
else {
if($checktoaddcourse > 0) {
echo "You have already added this course!";
}
else {
echo "You have not received at least a C in this course. It does not qualify for courses taken.";
}
}

$redirectionTime = 4;
$newPageUrl = "studentHome.php";
header( "Refresh: $redirectionTime; url=$newPageUrl" );
echo "<br><br>You'll be redirected to the Student page in $redirectionTime seconds.";

?>

	


