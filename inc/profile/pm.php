<?php
$subject = $_REQUEST['subject'];
$date = date("m/d/y");
$post = $_REQUEST['post'];
$to = $_REQUEST['to'];

if ($subject && $post && $to) {
$iquery = mysql_query("INSERT INTO znetworking_pm (recipient, sender, subject, date, message, status) VALUES ('$to', '$masqlid', '$subject', '$date', '$post', '0')");
echo "Message Sent Successfully!<br />";
echo "<a href='index.php?page=Account'>Click here to go Back</a><br />";
}



$pmquery = mysql_query("SELECT * FROM znetworking_pm WHERE recipient = '$masqlid' AND id = '$gpmid'");
if (mysql_num_rows($pmquery) < 1) {
$pmquery = mysql_query("SELECT * FROM znetworking_pm WHERE sender = '$masqlid' AND id = '$gpmid'");
$sent = 1;
}

$row = mysql_fetch_array($pmquery);
$pmid = $row['id'];
$sender = $row['sender'];
$mpmquery = mysql_query("SELECT * FROM znetworking_members WHERE id = '$sender'");
$mpmrow = mysql_fetch_array($mpmquery);
?>
<table>
<tr class="cat"><td><?php echo $row['subject']; ?> on <?php echo $row['date']; ?></td></tr>
</table>
<table>
<tr><th>Author</th><th>Message</th></tr>
<tr class="forum"><td class="forumposts">
<?php
if ($mpmrow['imageurl']) {
?>
<img src="<?php echo $mpmrow['imageurl']; ?>" style="width:75px;height:75px;"><br />
<?php
}
else {
?>
<img src="images/default.png" style="width:75px;height:75px;"><br />
<?php
}
?>
<a href="index.php?page=Profile&id=<?php echo $mpmrow['id']; ?>"><?php echo $mpmrow['user']; ?></a>
</td>
<td class="forumname">
<?php echo $row['message']; ?>
</td>
</tr>
</table>
<?php
if ($sent) {
}
else {
?>
<fieldset>
	<legend>Add Reply</legend>
<form method="post" action="">
Subject: <input type="text" value="RE: <?php echo $row['subject']; ?>" name="subject" READONLY=TRUE /> <br />
Message:<br /><textarea rows="20" cols="50" name="post"></textarea><br />
<input type="hidden" name="to" value="<?php echo $row['sender']; ?>" />
<input type="submit" value="Reply!" />
</form>
</fieldset>
<script type="text/javascript">
	CKEDITOR.replace( 'post' );
</script>
<?php
}
?>