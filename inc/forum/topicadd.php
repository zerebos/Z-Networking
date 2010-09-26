<?php
$topic = $_REQUEST['topic'];
$post = $_REQUEST['post'];
if ($topic && $post) {
$query = mysql_query("INSERT INTO znetworking_topics (forumid, topic, author, post) VALUES ('$forumid', '$topic', '$msqluser', '$post')");
if ($query) {
echo "Congratulations $user, Your Topic has been added<br />";
echo "<a href='index.php?page=Forum&forum=$forumid'>Click here to go back to the Forum</a>";
}
else {
echo "There was an error";
}
}
?>
<fieldset>
	<legend>Add a Topic</legend>
<form method="post" action="">
Post topic: <input type="text" name="topic" /><br />
Post:<br /><textarea rows="20" cols="50" name="post">
</textarea>
<input type="submit" value="Post!">
</form>
</fieldset>
<script type="text/javascript">
	CKEDITOR.replace( 'post' );
</script>

