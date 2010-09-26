<?php
$aim = $_REQUEST['aim'];
$yim = $_REQUEST['yim'];
$msn = $_REQUEST['msn'];
$xfire = $_REQUEST['xfire'];
$steam = $_REQUEST['steam'];
$input = $_REQUEST['input'];
if ($input) {
$query = mysql_query("UPDATE znetworking_members SET AIM = '$aim', YIM = '$yim', MSN = '$msn', Xfire = '$xfire', steam = '$steam' WHERE id = '$msqlid'");
if ($query) {
include("inc/functions/getuserinfo.php");
}
}
?>
<form method="post" action="">
<fieldset style="text-align: left;">
	<legend>Instant Messaging</legend>
<img src="images/profile_forum/aim.gif" alt="AIM" /> AIM: <input type="text" name="aim" value="<?php echo $msqlaim; ?>" /> <br />
<img src="images/profile_forum/yim.gif" alt="YIM" /> YIM: <input type="text" name="yim" value="<?php echo $msqlyim; ?>" /> <br />
<img src="images/profile_forum/msn.gif" alt="MSN" /> MSN: <input type="text" name="msn" value="<?php echo $msqlmsn; ?>" /> <br />
<img src="images/profile_forum/steam.png" alt="Steam" /> Steam: <input type="text" name="steam" value="<?php echo $msqlsteam; ?>" /> <br />
<img src="images/profile_forum/xfire.gif" alt="Xfire" /> Xfire: <input type="text" name="xfire" value="<?php echo $msqlxfire; ?>" /><br />
<?php
if ($msqlxfire) {
?>
<a href="http://profile.xfire.com/<?php echo $msqlxfire; ?>"><img src="http://miniprofile.xfire.com/bg/sh/type/0/<?php echo $msqlxfire; ?>.png" width="420" height="111" /></a>
<?php
}
?>
<input type="hidden" name="input" value="yes" />
<input type="submit" value="Update!" />
</fieldset>
</form>