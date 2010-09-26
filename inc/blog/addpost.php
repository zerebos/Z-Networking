<?php
$date = date("m/d/y");
$title = $_REQUEST['title'];
$post = $_REQUEST['post'];
$gdate = $_REQUEST['date'];
if ($title && $post && $gdate) {
if ($_GET['editid'] && $admin) {
$query = mysql_query("INSERT INTO znetworking_blog (userid, title, post, date) VALUES ('$eid', '$title', '$post', '$gdate')");
}
else {
$query = mysql_query("INSERT INTO znetworking_blog (userid, title, post, date) VALUES ('$msqlid', '$title', '$post', '$gdate')");
}
if ($query) {
echo "Congratulations $user, Your Blog Post has been Posted<br />";
if ($_GET['editid'] && $admin) {
echo "<br /><a href='index.php?page=Blog&id=$eid'>Click to go back to the blog</a>";
}
}
else {
echo "There was an error";
}
}
?>
<fieldset>
	<legend>Add a Blog Post</legend>
<form method="post" action="">
Post Title: <input type="text" name="title" /><br />
Post:<br /><textarea rows="20" cols="50" name="post"></textarea>
<input type="hidden" value="<?php echo $date ?>" name="date"><br /><br />
<input type="submit" value="Post!">
</form>
</fieldset>

<script type="text/javascript">
	CKEDITOR.replace( 'post' );
</script>