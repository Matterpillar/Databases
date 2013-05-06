<html>
<title>Create Student Account</title>
<body>

<h3> Student Account Creation </h3>

<form action="insertStudent.php" method="post">
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
RUID: <input type="int" name="RUID" maxlength="9"><br>
Major: <select name="major">
<option value="Computer Science">Computer Science</option>
<option value="Other">Other</option>
</select><br>
Number of Credits: <input type="int" name = "numCredits" maxlength="3"><br>
Graduation Month: <select name="gradMonth">
<option value="01">January</option>
<option value="02">February</option>
<option value="03">March</option>
<option value="04">April</option>
<option value="05">May</option>
<option value="06">June</option>
<option value="07">July</option>
<option value="08">August</option>
<option value="09">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select><br>
Graduation Year: <select name="gradYear">
<option value="2013">2013</option>
<option value="2014">2014</option>
<option value="2015">2015</option>
<option value="2016">2016</option>
<option value="2017">2017</option>
</select><br>
<input type = "submit" value = "submit">

</form>

</body>
</html> 