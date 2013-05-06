<html>
<title>Student Home</title>



<?php

$host="localhost:8889"; // Host name
$username="root"; // Mysql username
$password="root"; // Mysql password
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

echo "<br><br><b><u>Add courses taken</u></b><br>";
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
	$courseid = $courses['courseid'];
	$coursename = $courses['courseName'];
	echo "<option value='$courseid'>" . $courses['courseName'] ."</option>";
} 
echo "</select>";
?>
<br>Grade Earned: <br>
<input type = "radio" name = "grade" value = "A">A<br>
<input type = "radio" name = "grade" value = "B">B<br>
<input type = "radio" name = "grade" value = "C">C<br>
<input type = "radio" name = "grade" value = "D">D<br>
<input type = "radio" name = "grade" value = "F">F<br>
<input type = "submit" value = "submit">
</form>

</html>


