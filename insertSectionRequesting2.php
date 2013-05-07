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
$major = $_SESSION['major'];
$numcredits = $_SESSION['numCredits'];
$gradmonth = $_SESSION['gradmonth'];
$gradyear = $_SESSION['gradyear'];
//get values from form
$secid = $_POST['secreq'];
$courseid = $_SESSION['courseID'];
$date = date('m/d/Y');

echo "<b><u>Special Permission Request - Student<br></b></u>";

date_default_timezone_set('America/New_York');
$time = localtime();
$day = $time[3];
$hour = $time[2];
$min = $time[1];
$sec = $time[0];
echo "$date<br>$hour:$min:$sec:$day";
