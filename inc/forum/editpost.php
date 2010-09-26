<?php

if ($topicid && !$postid) {
$retreivepostquery = mysql_query("SELECT * FROM znetworking_topics WHERE id = '$topicid'");
}
else {
$retreivepostquery = mysql_query("SELECT * FROM znetworking_replies WHERE id = '$postid'");
}
$row = mysql_fetch_array($retreivepostquery);
?>
<fieldset>
	<legend>Editing a Post</legend>
<form method="post" action="">
<?php if ($topicid && !$postid) { ?>
Post Title: <input type="text" name="title" value="<?php echo $row['topic']; ?>" /><br />
<?php } ?>
Post:<br /><textarea rows="20" cols="50" name="post"><?php echo $row['post']; ?></textarea>
<br /><br />
<input type="submit" value="Update!">
</form>
</fieldset>
<script type="text/javascript">
	CKEDITOR.replace( 'post' );
</script>


