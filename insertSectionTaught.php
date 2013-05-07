<?php

$one = "cool";
$two = "awesome";
echo "test table:<br>"; ?> <table border=1"> <?php
echo "<tr><td>$one</td><td>$two</td></tr>";
?> </table> <?php


$host="localhost:3306"; // Host name
$username="maraneta"; // Mysql username
$password="password"; // Mysql password
$db_name="test"; // Database name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

session_start();
$netID = $_SESSION['netid'];
$fname = $_SESSION['firstname'];
$lname = $_SESSION['lastname'];

//get values from form
$secnum = $_POST['secnum'];
$regnum = $_POST['regnum'];
$courseid = $_POST['coursetaught'];
$seccap = $_POST['cap'];

$temp = 0;

$conditiontoaddsection = 1;

//Ensure every field is filled out
if(empty($secnum) or empty($regnum) or empty($seccap)) {
	echo "All fields must be filled out.<br>";
	$conditiontoaddsection = 0;
}

//If the professor specifies a registered number of students bigger than the capacity, dont allow to add section
if($regnum > $seccap) {
	echo "The registered number of students cannot exceed the maximum room capacity!<br>";
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

if($regnum < 0) {
	echo "Invalid input for number registered. Cant have negative number of students ($regnum)<br>";
	$conditiontoaddsection=0;
}

if($seccap < 0) {
	echo "Cannot have a negative maximum capacity.<br>";
}

//If not enough seats in class, dont allow to add section.
if($conditiontoaddsection == 1) {
	$sql = "SELECT courseName, maxCapacity, spotsLeft FROM Course WHERE courseID = '$courseid'";
	$query = mysql_query($sql);
	$courses = mysql_fetch_array($query);
	$courseName = $courses['courseName'];
	$maxCapacity = $courses['maxCapacity'];
	$spotsLeft = $courses['spotsLeft'];

	$preRegister = $maxCapacity - $spotsLeft;
	$postRegister = $spotsLeft - $regnum;

	if($spotsLeft == 0) {
		echo "This course has reached its maximum capacity of $maxCapacity students.  Cannot add any more sections.<br>";
	}
	else if($postRegister < 0) {
		echo "Cannot register " . $regnum . " more students to " . $courseName . "; there are currently " . $preRegister . "/";
		echo $maxCapacity . " students registered.  <br>The course can only fit " . $spotsLeft . " more students.";
	}
	else{
		//Now can actually add section

		$sql = "INSERT INTO SectionsTaught VALUES ('$secnum','$courseid','$regnum','$netID','$seccap')";
		$insert = mysql_query($sql);
			//echo "secnum $secnum<br>courseid$courseid<br>regnum$regnum<br>user$username<br>";
		if (!$insert) {
			exit('The query failed.3'); 
		} 
		else {
			echo "Section added! "; 
			echo "old spotsleft: $spotsLeft<br>";
			$spotsLeft = $spotsLeft - $regnum;
			echo "new spotsLeft: $spotsLeft<br>";
			echo "There are now $spotsLeft spots left in the course.";
		
			//update spotsLeft
			$sql = "UPDATE Course SET spotsLeft = '$spotsLeft' WHERE courseID = '$courseid'";
			$update = mysql_query($sql);
			if (!$update) {
				exit('The query failed.1'); 
			}
		} 
	}	
}

?>

<br><br>

<form action="professorHome.php" method="post">
<input type = "submit" value = "Return to Professor Home Page">

