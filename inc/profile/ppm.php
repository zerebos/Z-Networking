<?php
$subject = $_REQUEST['subject'];
$date = date("m/d/y");
$post = $_REQUEST['post'];
$to = $_REQUEST['to'];

if ($subject && $post && $to) {
$iquery = mysql_query("INSERT INTO znetworking_pm (recipient, sender, subject, date, message, status) VALUES ('$to', '$masqlid', '$subject', '$date', '$post', '0')");
echo "Message Sent Successfully!<br />";
echo "<a href='index.php?page=Profile&id=$to'>Click here to go Back</a><br />";
}
?>
<fieldset>
	<legend>Send PM</legend>
<form method="post" action="">
Subject: <input type="text" name="subject" /> <br />
Message:<br /><textarea rows="20" cols="50" name="post"></textarea><br />
<input type="hidden" name="to" value="<?php echo $id ?>" />
<input type="submit" value="Reply!" />
</form>
</fieldset>
<script type="text/javascript">
	CKEDITOR.replace( 'post' );
</script>
