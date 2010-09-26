<?php
$id = $_GET['id'];
$date = date("m/d/y");
$title = $_REQUEST['title'];
$post = $_REQUEST['post'];
$userid = $_REQUEST['userid'];
$gdate = $_REQUEST['date'];
if ($title && $post && $userid && $gdate) {
if ($_GET['editid'] && $admin) {
$query = mysql_query("UPDATE znetworking_blog SET title = '$title', post = '$post', userid = '$eid', date = '$gdate' WHERE id = '$id'");
}
else {
$query = mysql_query("UPDATE znetworking_blog SET title = '$title', post = '$post', userid = '$userid', date = '$gdate' WHERE id = '$id'");
}
if ($query) {
echo "Congratulations $user, Your Blog Post has been Updated";
if ($_GET['editid'] && $admin) {
echo "<br /><a href='index.php?page=Blog&id=$eid'>Click to go back to the blog</a>";
}
}
}
if (isset($_GET['id'])) {
$retreiveblogquery = mysql_query("SELECT * FROM znetworking_blog WHERE id = '$id'");
$row = mysql_fetch_array($retreiveblogquery);
?>
<fieldset>
	<legend>Editing a Blog Post</legend>
<form method="post" action="">
Post Title: <input type="text" name="title" value="<?php echo $row['title']; ?>" /><br />
Post:<br /><textarea rows="15" cols="40" name="post"><?php echo $row['post']; ?></textarea>
<input type="hidden" name="userid" value="<?php echo $row['userid']; ?>" />
<input type="hidden" name="date" value="<?php echo $row['date']; ?>" /><br /><br />
<input type="submit" value="Update!">
</form>
</fieldset>
<?php
}
else {
?>
<fieldset>
	<legend>Edit a Blog Post (Click to Edit)</legend>
<?php
if ($_GET['editid'] && $admin) {
$retreiveallblogquery = mysql_query("SELECT * FROM znetworking_blog WHERE userid = '$eid' ORDER BY id DESC LIMIT 0, 10");
}
else {
$retreiveallblogquery = mysql_query("SELECT * FROM znetworking_blog WHERE userid = '$msqlid' ORDER BY id DESC LIMIT 0, 10");
}
while ($allrow = mysql_fetch_array($retreiveallblogquery)) {
$sqlid = $allrow['id'];
$title = $allrow['title'];
$date = $allrow['date'];
?>
<li><a href="index.php?page=Blog&action=editpost&id=<?php echo $sqlid; ?><?php if ($_GET['editid'] && $admin) { echo "&editid=$eid"; } ?>"><?php echo "$title - $date"; ?></a></li>
<?php
}
echo "</fieldset>";
}
?>

<script type="text/javascript">
	CKEDITOR.replace( 'post' );
</script>
