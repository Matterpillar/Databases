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

//get values from form
$secnum = $_POST['secnum'];
$regnum = $_POST['regnum'];
$courseid = $_POST['coursetaught'];
$cap = $_POST['cap'];

$temp = 0;

$conditiontoaddsection = 1;

//Ensure every field is filled out
if(empty($secnum) or empty($regnum) or empty($cap)) {
	echo "All fields must be filled out";
	$conditiontoaddsection = 0;
}

//If the professor specifies a registered number of students bigger than the capacity, dont allow to add section
if($regnum > $cap) {
	echo "The registered number of students cannot exceed the maximum room capacity!";
	$conditiontoaddsection = 0;
}

//If there exists a section already, dont allow to add section
$sql = "SELECT sectionNumber, courseID, numRegistered 
		FROM SectionsTaught 
		WHERE courseID = '$courseid' AND sectionNumber = '$secnum'";
$query = mysql_query($sql);
if (!$query) {
	exit('The query failed.1'); 
} 
$numrows = mysql_num_rows($query);

if($numrows > 0) {
	echo "Section already exists!";
	$conditiontoaddsection=0;
}

//If not enough seats in class, dont allow to add section.
if($conditiontoaddsection == 1) {
$sql = "SELECT maxCapacity FROM Course WHERE courseID = '$courseid'";
$query = mysql_query($sql);
$courses = mysql_fetch_array($query);
$temp = $courses['maxCapacity'];
//echo "$temp"; debugging

$sql1 = "SELECT numRegistered FROM SectionsTaught WHERE courseID = '$courseid'";
$query1 = mysql_query($sql1);
if (!$query1) {
exit('The query failed.2'); 
} 

while ($courses = mysql_fetch_array($query1)) {
	$temp1 = $courses['numRegistered'];
	$temp = $temp - $temp1;
}
if($regnum > $temp) {
echo "Not enough room in class. Only $temp slots left";
$spotsleft = $temp;
$conditiontoaddsection = 0;
}
//echo "$temp"; debugging

}

//Now can actually add section
if($conditiontoaddsection == 1 AND $regnum >= 0)
{
$sql = "INSERT INTO SectionsTaught VALUES ('$secnum','$courseid','$regnum','$username')";
$query = mysql_query($sql);
//echo "secnum $secnum<br>courseid$courseid<br>regnum$regnum<br>user$username<br>";
if (!$query) {
exit('The query failed.3'); 
} 
else {
echo "Section added! "; 
$spotsleft = $temp - $regnum;
echo "There are $spotsleft spots left in the course.";
}
$sql = "UPDATE Course SET spotsLeft = '$spotsleft' WHERE courseID = '$courseid'";
$query = mysql_query($sql);
if (!$query) {
exit('The query failed.1'); 
} 
}

if($regnum < 0)
{
echo "Invalid input for number registered. Cant have negative number of students ($regnum)";
}

$redirectionTime = 4;
$newPageUrl = "professorHome.php";
header( "Refresh: $redirectionTime; url=$newPageUrl" );
echo "<br><br> You will be redirected to the professor home page, after $redirectionTime seconds.";







?>