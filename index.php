<?php
session_start();
//if someone just logged out, destroy their session.
if (isset($_SESSION['loggedin'])) {
	session_destroy();
	//echo "Session destroyed: " . $_SESSION['netid'];
}
if (isset($_SESSION['findPassword'])) {
	session_destroy();
	//echo "Session destroyed: " . $_SESSION['netid'];
}

?>


<html>
<title>Special Permission Number Request System</title>
<body>

<h3>Special Permission Number Request System</h3>
<p>Students and professors should use this webpage to manage their courses</p>

<form name = "input" action="checklogin.php" method = "post">
<input type = "radio" name = "usertype" value = "student" checked = "checked">Student<br>
<input type = "radio" name = "usertype" value = "professor">Professor<br>
Username: <input type="text" name = "netid" maxlength="8"><br>
Password: <input type="password" name = "password" maxlength="20"><br>
<input type = "submit" value="Log In">
</form>

<form method="post" action="/forgotPassword.php">
    <button type="submit">Forgot Password</button>
</form>

Create an account if you do not have one<br>
<form method="post" action="/studCreateAccount.php">
    <button type="submit">Student Create Account</button>
</form>
<form method="post" action="/profCreateAccount.php">
<button type="submit">Professor Create Account</button>
</form>

</body>
</html>
