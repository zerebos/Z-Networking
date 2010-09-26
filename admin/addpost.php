<?php
$date = date("m/d/y");
$title = $_REQUEST['title'];
$post = $_REQUEST['post'];
$user2 = $_REQUEST['user'];
$gdate = $_REQUEST['date'];
if ($title && $post && $user2 && $gdate) {
$query = mysql_query("INSERT INTO znetworking_news (title, post, admin, date) VALUES ('$title', '$post', '$user2', '$gdate')");
if ($query) {
echo "Congratulations $user2, Your News Post has been Posted<br />";
}
else {
echo "There was an error";
}
}
?>
<form method="post" action="">
Post Title: <input type="text" name="title" /><br />
Post:<br /><textarea rows="15" cols="40" name="post"></textarea>
<input type="hidden" value="<?php echo $user; ?>" name="user">
<input type="hidden" value="<?php echo $date ?>" name="date"><br /><br />
<input type="submit" value="Post!">
</form>


<script type="text/javascript">
	CKEDITOR.replace( 'post' );
</script>