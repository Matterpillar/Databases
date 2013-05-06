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

//get values from form
$secnum = $_POST['secnum'];
$regnum = $_POST['regnum'];
$courseid = $_POST['coursetaught'];

$temp = 0;

$conditiontoaddsection = 1;
//If there exists a section already, dont allow to add section
$sql = "SELECT sectionNumber, courseID, numRegistered FROM SectionsTaught 
WHERE courseID = '$courseid' AND sectionNumber = '$secnum'";
$query = mysql_query($sql);
if (!$query) {
exit('The query failed.1'); 
} 
$numrows = mysql_num_rows($query);

if($numrows > 0)
{
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
if($conditiontoaddsection == 1)
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


}

$sql = "UPDATE Course SET spotsLeft = '$spotsleft' WHERE courseID = '$courseid'";
$query = mysql_query($sql);
if (!$query) {
exit('The query failed.1'); 
} 











?>