<?php
$imageurl = $_REQUEST['imageurl'];
$url = $_REQUEST['url'];
$email = $_REQUEST['email'];
$age = $_REQUEST['age'];
$location = $_REQUEST['location'];

if ($age && $email) {
$query = mysql_query("UPDATE znetworking_members SET email = '$email', imageurl = '$imageurl', age = '$age', location = '$location', url = '$url' WHERE id = '$msqlid'");
if ($query) {
include("inc/functions/getuserinfo.php");
}
}
?>
<form method="post" action="">
<fieldset style="text-align: left;">
	<legend>Basic Info</legend>
<?php
if ($msqliurl) {
?>
<img src="<?php echo $msqliurl; ?>" style="float: left;margin-right: 10px;width:150px;height:150px;">
<?php
}
else {
?>
<img src="images/default.png" style="float: left;margin-right: 10px;width:150px;height:150px;">
<?php
}
?>
<h3 style="display:inline;vertical-align:top;">
<?php echo $msqluser; ?>
</h3>
<br />
Image URL: <input type="text" name="imageurl" value="<?php echo $msqliurl; ?>" /><br />
Website: <input type="text" name="url" value="<?php echo $msqlurl; ?>" /><br />

Email: <input type="text" name="email" value="<?php echo $msqlemail; ?>" /><br />
Age: <input type="text" name="age" value="<?php echo $msqlage; ?>" />

<?php
echo "/";
echo $msqlgen;
echo " <img src='images/profile_forum/$msqlgen.gif' alt='$msqlgen' />";
echo "<br />";
?>
Location: <input type="text" name="location" value="<?php echo $msqlloc; ?>" /><br />
<?php
echo "Last Login: ";
echo $msqllogged;
?>
<br />
<input type="hidden" name="input" value="yes" />
<input type="submit" value="Update!" />
</fieldset>
</form>