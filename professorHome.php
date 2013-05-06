<html>
<title>Professor Home</title>
</html>

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

echo "<h3>Professor Home Page</h3><h4>Welcome back $fname $lname!</h4>";


?>