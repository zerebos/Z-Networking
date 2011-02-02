<?php
$password = $_REQUEST['password'];
$password2 = $_REQUEST['password2'];
$username = $_REQUEST['username'];
$email = $_REQUEST['email'];
$first = $_REQUEST['first'];
$last = $_REQUEST['last'];
$terms = $_REQUEST['terms'];
$showe = $_REQUEST['showe'];
$age = $_REQUEST['age'];
$showa = $_REQUEST['showa'];
$gender = $_REQUEST['gender'];
$date = date("m/d/y");


$salt = “thisspecificsaltencodingforznetworkingisgoingtobeverylongbecauseineedverysecureshitssoanywayslollawl13374nd32ubh34uhgu43hgu3h4gu3bgu3bhbhfdhgb3h34grb”;
$md5pass = md5($salt . $password);

if ($password==$password2 && $username && $email && $first && $gender) {
if ($terms) {
$query = mysql_query("INSERT INTO znetworking_members (user, pass, first, last, email, showe, age, showa, gender) VALUES ('$username', '$md5pass', '$first', '$last', '$email', '$showe', '$age', '$showa', '$gender')");
echo mysql_error();
if ($query) {
echo "Congratulations $username, You have been registered!<br />";

$to = $email;
$subject = "Thanks for registering!";
$message = "Welcome to Z-Networking\nImportant Info:\nUser: $username\nPass: $password\nPlease dont share your info with anyone.";
$from = "support@z-networking.org";
$headers = "From: $from";
mail($to,$subject,$message,$headers);

$to2 = "syco_1098@yahoo.com";
$subject2 = "New Member!";
$message2 = "$username has just signed up on your site. You can review their account and shoot them an email.";
mail($to2,$subject2,$message2,$headers);
$query = mysql_query("INSERT INTO znetworking_contact (email, name, message) VALUES ('$email', '$username', '$message2')");

$pm = "Hello and welcome to the site. Here you can be part of a great community on our forums and have your own blog. Our extensive library of media, including our gaming department, will keep you busy for hours. Just a reminder, but you can customize your profile and change your account settings. We even have a Private Messaging system such as the one right here.";

$mquery = mysql_query("SELECT * FROM znetworking_members WHERE user = '$username'");
$row = mysql_fetch_array($mquery);
$rto = $row['id'];

$iquery = mysql_query("INSERT INTO znetworking_pm (recipient, sender, subject, date, message, status) VALUES ('$rto', '2', 'Welcome', '$date', '$pm', '0')");

}
}
else {
echo "Please accept the terms.";
}
}
else {
echo "Please fill out required fields.";
}
if ($LC==FALSE) {
?>
<form method="post" action="<?PHP echo $_SERVER['php_SELF'];?>">
<fieldset>
	<legend>Basic</legend>
*Username: <input type="text" name="username" id="reg" /><br />
*Password: <input type="password" name="password" id="reg" /><br />
*Confirm Password: <input type="password" name="password2" id="reg" /><br />
*Email: <input type="text" name="email" id="reg" /><br />
Show Email?: <input type="checkbox" name="showe" value="1" id="reg" /> <br />
*First Name: <input type="text" name="first" id="reg" /><br />
Last Name: <input type="text" name="last" id="reg" /><br />
Age: <input type="text" name="age" /><br />
Show Age?: <input type="checkbox" name="showa" value="1" id="reg" /> <br />
*Gender: Male: <input type="radio" name="gender" value="Male" checked /> Female: <input type="radio" name="gender" value="Female" /><br />
</fieldset>

*I Agree To Any <a href="index.php?page=Terms">Terms</a> That May Exist Or Be Put In To Place: <input type="checkbox" name="terms" value="terms"><br />
<input type="submit" value="Register" /><br />
<br />

*Required
<?php
}
else {
echo "Already Logged in.";
}
?>