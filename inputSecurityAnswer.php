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

session_start();
$securityQuestion = $_SESSION['securityQuestion'];
echo $securityQuestion;
?>
<br><br>
<form action="showPassword.php" method="post">
Security Answer: <input type="text" name="securityAnswer" maxlength="30"><br>
<input type = "submit" value="Submit">
</form>

</html>