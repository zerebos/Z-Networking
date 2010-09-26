<?php
$edit = $_GET['edit'];
$id = $_GET['id'];
$msg = $_GET['msg'];
if ($msg) {
include("inc/profile/ppm.php");
}
else {
if ($edit && $query) {
echo "Profile Updated";
}
if ($edit=="basic") {
include("inc/profile/profileeditbasic.php");
}
else {
?>
<fieldset style="text-align: left;">
	<legend>Basic Info<?php if ($user==$msqluser) {echo " <a href='index.php?page=Profile&edit=basic'>[Edit]</a>";$ddone = 1;} if ($admin=="1" && !$ddone) {echo " <a href='index.php?page=Profile&edit=basic&id=$id'>[Edit]</a>";} ?></legend>
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
<?php
if ($id) {
?>
<a href="index.php?page=Profile&msg=true&id=<?php echo $id; ?>">Private Message</a><br />
<?php
}
if ($msqlurl) {
echo "<a href='$msqlurl'>Personal Website</a> <br />";
}
if ($msqlshowe=="1" || !$_GET['id']) {
echo $msqlemail;
echo "<br />";
}
if ($msqlshowa=="1" || !$_GET['id']) {
echo $msqlage;
echo "/";
}
echo $msqlgen;
echo " <img src='images/profile_forum/$msqlgen.gif' alt='$msqlgen' />";
echo "<br />";
if ($msqlshowl=="1" || !$_GET['id']) {
echo "Location: ";
echo $msqlloc;
echo "<br />";
}
echo "Last Login: ";
echo $msqllogged;
if ($msqlshowb=="1" || !$_GET['id'] || $admin) {
echo "<br />";
echo "<a href='index.php?page=Blog&id=$msqlid'>View My Blog!</a>";
}
?>
</fieldset>
<?php
}

if ($edit=="about") {
include("inc/profile/profileeditabout.php");
}
else {
?>
<fieldset>
	<legend>About Me<?php if ($user==$msqluser) {echo " <a href='index.php?page=Profile&edit=about'>[Edit]</a>";} if ($admin=="1" && !$ddone) {echo " <a href='index.php?page=Profile&edit=about&id=$id'>[Edit]</a>";} ?></legend>
<?php
if ($msqlabout) {
echo $msqlabout;
}
else {
echo "<i>No Info Provided</i>";
}
?>
</fieldset>
<?php
}

if ($edit=="im") {
include("inc/profile/profileeditim.php");
}
else {
?>
<fieldset>
	<legend>Instant Messaging<?php if ($user==$msqluser) {echo " <a href='index.php?page=Profile&edit=im'>[Edit]</a>";} if ($admin=="1" && !$ddone) {echo " <a href='index.php?page=Profile&edit=im&id=$id'>[Edit]</a>";} ?></legend>
<img src="images/profile_forum/aim.gif" alt="AIM" /> AIM: <?php if ($msqlaim) {echo $msqlaim;} else { echo "<i>No Info Provided</i>"; } ?> <br />
<img src="images/profile_forum/yim.gif" alt="YIM" /> YIM: <?php if ($msqlyim) {echo $msqlyim;} else { echo "<i>No Info Provided</i>"; } ?> <br />
<img src="images/profile_forum/msn.gif" alt="MSN" /> MSN: <?php if ($msqlmsn) {echo $msqlmsn;} else { echo "<i>No Info Provided</i>"; } ?> <br />
<img src="images/profile_forum/steam.png" alt="Steam" /> Steam: <?php if ($msqlsteam) {echo $msqlsteam;} else { echo "<i>No Info Provided</i>"; } ?> <br />
<img src="images/profile_forum/xfire.gif" alt="Xfire" /> Xfire: <?php if ($msqlxfire) {echo $msqlxfire;} else { echo "<i>No Info Provided</i>"; } ?><br />
<?php
if ($msqlxfire) {
?>
<a href="http://profile.xfire.com/<?php echo $msqlxfire; ?>"><img src="http://miniprofile.xfire.com/bg/sh/type/0/<?php echo $msqlxfire; ?>.png" width="420" height="111" /></a>
<?php
}
?>
</fieldset>
<?php
}
}
?>