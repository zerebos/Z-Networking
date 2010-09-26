<?php
$salt = “thisspecificsaltencodingforznetworkingisgoingtobeverylongbecauseineedverysecureshitssoanywayslollawl13374nd32ubh34uhgu43hgu3h4gu3bgu3bhbhfdhgb3h34grb”;
$showe = $_REQUEST['showe'];
$showa = $_REQUEST['showa'];
$showl = $_REQUEST['showl'];
$showb = $_REQUEST['showb'];
$gender = $_REQUEST['gender'];
$oldpass = $_REQUEST['sqlpassword'];
$pass = $_REQUEST['password'];
$pass2 = $_REQUEST['password2'];
$priv = $_REQUEST['privacy'];
$basic = $_REQUEST['basic'];
$md5pass = md5($salt . $oldpass);
$md5pass2 = md5($salt . $pass);
$deleteid = $_REQUEST['delete'];
$deleteidd = $_REQUEST['delete2'];
$gpmid = $_GET['pmid'];
if ($gpmid) {
include("inc/profile/pm.php");
}
else {
if ($priv) {
$query = mysql_query("UPDATE znetworking_members SET showe = '$showe', showa = '$showa', showl = '$showl', showb = '$showb' WHERE id = '$msqlid'");
if (!$query) {
echo "There was an error processing your request";
}
else {
echo "Privacy Settings Updated!";
include("inc/functions/getuserinfo.php");
}
}

if ($basic) {
if ($oldpass && $pass && $pass2) {
if ($pass==$pass2) {

$query = mysql_query("SELECT * FROM znetworking_members WHERE id = '$msqlid'");
$row = mysql_fetch_array($query);
if ($row['pass']==$md5pass) {
$query = mysql_query("UPDATE znetworking_members SET gender = '$gender', pass = '$md5pass2' WHERE id = '$msqlid'");
if (!$query) {
echo "There was an error processing your request";
}
else {
echo "Password Changed!<br />";
include("inc/functions/getuserinfo.php");
}
}
else {
echo "Your old password was incorrect.";
}
}
else {
echo "Your passwords don't match.";
}
}
else {
$query = mysql_query("UPDATE znetworking_members SET gender = '$gender' WHERE id = '$msqlid'");
if ($query) {
echo "Gender updated... Weirdo...<br />";
include("inc/functions/getuserinfo.php");
}
}
}

if ($deleteid) {
?>
<fieldset>
	<legend>Deletion Confirmation</legend>
<form method="post" action="index.php?page=Settings">
Are you sure you want to delete your account, <?php echo $msqluser; ?>?
<input type="hidden" name="delete2" value="<?php echo $msqlid; ?>" />
<input type="submit" value="Delete My Account!" />
</form>
</fieldset>
<?php
}
if ($deleteidd) {
$query = mysql_query("DELETE FROM znetworking_members WHERE id = '$deleteidd'");
if ($query) {
include("inc/functions/getuserinfo.php");
echo "Successful Account Removal.";
echo "<br /><a href='index.php'>Click Here To Go Home</a>";
}
else {
echo "Something went wrong when processing your request.";
}
}
if (!$_GET['adminedit']) {
?>
<fieldset>
	<legend>Private Messaging</legend>
<?php
$pmquery = mysql_query("SELECT * FROM znetworking_pm WHERE recipient = '$masqlid' AND status = 0 ORDER BY id DESC");
$pmrow = mysql_num_rows($pmquery);
if ($pmrow < 1) {
echo "<i>No Unread Messages</i><br />";
$pmquery = mysql_query("SELECT * FROM znetworking_pm WHERE recipient = '$masqlid' AND status = 1 ORDER BY id DESC LIMIT 0, 5");
}
else {
echo "<i><u>New Messages</u></i><br />";
$pmquery2 = mysql_query("SELECT * FROM znetworking_pm WHERE recipient = '$masqlid' AND status = 1 ORDER BY id DESC LIMIT 0, 5");
echo "<ul>";
while ($row = mysql_fetch_array($pmquery)) {
$pmid = $row['id'];
$sender = $row['sender'];
$mpmquery = mysql_query("SELECT * FROM znetworking_members WHERE id = '$sender' ORDER BY id DESC");
$mpmrow = mysql_fetch_array($mpmquery);
?>
<li><a href="index.php?page=Account&pmid=<?php echo $pmid; ?>"><?php echo $row['subject']; ?> - <?php echo $mpmrow['user']; ?> on <?php echo $row['date']; ?></a></li>
<?php
}
echo "</ul>";
}
$pmquery2 = mysql_query("SELECT * FROM znetworking_pm WHERE recipient = '$masqlid' AND status = 1 ORDER BY id DESC LIMIT 0, 5");
echo "<br /><i><u>Inbox (Recent 5)</u></i><br />";

if (mysql_num_rows($pmquery2) < 1) {
echo "No Items to Display.";
}
echo "<ul>";
while ($irow = mysql_fetch_array($pmquery2)) {
$pmid = $irow['id'];
$sender = $irow['sender'];
$mpmquery = mysql_query("SELECT * FROM znetworking_members WHERE id = '$sender' ORDER BY id DESC");
$mpmrow = mysql_fetch_array($mpmquery);
?>
<li><a href="index.php?page=Account&pmid=<?php echo $pmid; ?>"><?php echo $irow['subject']; ?> - <?php echo $mpmrow['user']; ?> on <?php echo $irow['date']; ?></a></li>
<?php
}
echo "</ul>";
$opmquery = mysql_query("SELECT * FROM znetworking_pm WHERE sender = '$masqlid' ORDER BY id DESC LIMIT 0, 5");
echo "<br /><i><u>Outbox (Recent 5)</u></i><br />";
if (mysql_num_rows($opmquery) < 1) {
echo "No Items to Display.";
}
echo "<ul>";
while ($orow = mysql_fetch_array($opmquery)) {
$pmid = $orow['id'];
$sender = $orow['sender'];
$mpmquery = mysql_query("SELECT * FROM znetworking_members WHERE id = '$sender'");
$mpmrow = mysql_fetch_array($mpmquery);
?>
<li><a href="index.php?page=Account&pmid=<?php echo $pmid; ?>"><?php echo $orow['subject']; ?> - <?php echo $mpmrow['user']; ?> on <?php echo $orow['date']; ?></a></li>
<?php
}
echo "</ul>";
?>

</form>
</fieldset>

<?php
}
?>

<fieldset>
	<legend>Privacy Settings</legend>
<form method="post" action="">
Show Email?: <input type="checkbox" name="showe" value="1" <?php if ($msqlshowe=="1") { echo "checked"; } ?> /> <br />
Show Age?: <input type="checkbox" name="showa" value="1" <?php if ($msqlshowa=="1") { echo "checked"; } ?> /> <br />
Show Location?: <input type="checkbox" name="showl" value="1" <?php if ($msqlshowl=="1") { echo "checked"; } ?> /> <br />
Show Blog?: <input type="checkbox" name="showb" value="1" <?php if ($msqlshowb=="1") { echo "checked"; } ?> /> <br />
<input type="hidden" name="privacy" value="privacy" />
<input type="submit" value="Update!" />
</form>
</fieldset>

<fieldset>
	<legend>Basic Settings</legend>
<form method="post" action="">
Gender: Male: <input type="radio" name="gender" value="Male" <?php if ($msqlgen=="Male") { echo "checked"; } ?> /> Female: <input type="radio" name="gender" value="Female" <?php if ($msqlgen=="Female") { echo "checked"; } ?> /><br />
Old Password: <input type="password" name="sqlpassword" /><br />
New Password: <input type="password" name="password" /><br />
Confirm Password: <input type="password" name="password2" /><br />
<input type="hidden" name="basic" value="basic" />
<input type="submit" value="Update!" />
</form>
</fieldset>

<fieldset>
	<legend>Account Deletion</legend>
<form method="post" action="">
Press the button below to delete your account, there is no way to undo this once done.<br />
<input type="hidden" name="delete" value="<?php echo $msqlid; ?>" />
<input type="submit" value="Delete My Account!" />
</form>
</fieldset>
<?php
}
?>