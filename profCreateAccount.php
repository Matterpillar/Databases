<html>
<title>Create Professor Account</title>
<body>

<h3> Professor Account Creation </h3>

<form action="insertProfessor.php" method="post">
Netid: <input type="text" name="netid" maxlength="8"><br>
Password: <input type="password" name="password" maxlength="20"><br>
First Name: <input type="text" name="firstName" maxlength="20"><br>
Last Name: <input type="text" name="lastName" maxlength="20"><br>
Security Question: <select name="securityQuestion">
<option value="What street did you live on in third grade?">
What street did you live on in third grade?</option>
<option value="What school did you attend for sixth grade?">
What school did you attend for sixth grade?</option>
<option value="In what city or town was your first job?">
In what city or town was your first job?</option>
<option value="Where were you when you first heard about 9/11?">
Where were you when you first heard about 9/11?</option>
</select><br>
Security Answer: <input type="text" name="securityAnswer" maxlength="30"><br>
<input type = "submit" value = "submit">

</form>

</body>
</html> 