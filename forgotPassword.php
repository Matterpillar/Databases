<html>
<title>Forgotten Password</title>

<?php

$host="localhost:3306"; // Host name
$username="maraneta"; // Mysql username
$password="password"; // Mysql password
$db_name="test"; // Database name
$tbl_name="Student"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

?>

<h3>Enter Your Information To Recover Password<br></h3>

<form name = "input" action="checkForgotPassword.php" method = "post">
<input type = "radio" name = "usertype" value = "student" checked = "checked">Student<br>
<input type = "radio" name = "usertype" value = "professor">Professor<br><br>
Username: <input type="text" name = "netid" maxlength="8"><br><br>

<input type = "submit" value="Submit">
</form>




</html>
	