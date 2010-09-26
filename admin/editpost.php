<?php
$id = $_GET['id'];
$date = date("m/d/y");
$title = $_REQUEST['title'];
$post = $_REQUEST['post'];
$admin = $_REQUEST['admin'];
$gdate = $_REQUEST['date'];
if ($title && $post && $admin && $gdate) {
$query = mysql_query("UPDATE znetworking_news SET title = '$title', post = '$post', admin = '$admin', date = '$gdate' WHERE id = '$id'");
if ($query) {
echo "Congratulations $user, Your News Post has been Updated";
}
}
$retreivenewsquery = mysql_query("SELECT * FROM znetworking_news WHERE id = '$id'");
$row = mysql_fetch_array($retreivenewsquery);
if (isset($_GET['id'])) {
?>
<form method="post" action="">
Post Title: <input type="text" name="title" value="<?php echo $row['title']; ?>" /><br />
Post:<br /><textarea rows="15" cols="40" name="post"><?php echo $row['post']; ?></textarea>
<input type="hidden" name="admin" value="<?php echo $row['admin']; ?>" />
<input type="hidden" name="date" value="<?php echo $row['date']; ?>" /><br /><br />
<input type="submit" value="Update!">
</form>
<?php
}
else {
$retreiveallnewsquery = mysql_query("SELECT * FROM znetworking_news ORDER BY id DESC LIMIT 0, 10");
while ($allrow = mysql_fetch_array($retreiveallnewsquery)) {
$sqlid = $allrow['id'];
$title = $allrow['title'];
$admin = $allrow['admin'];
echo "<a href='index.php?page=Admin&action=editpost&id=$sqlid'>$title - $admin</a><br />";
}
}
?>

<script type="text/javascript">
	CKEDITOR.replace( 'post' );
</script>