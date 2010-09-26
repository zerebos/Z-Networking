<?php
$id = $_GET['id'];

$title = $_REQUEST['title'];
$name = $_REQUEST['name'];
$size = $_REQUEST['size'];
$url = $_REQUEST['iurl'];
$post = $_REQUEST['post'];
$author = $_REQUEST['author'];
if ($title && $post && $name && $size && $author) {
$query = mysql_query("UPDATE znetworking_games SET name = '$title', description = '$post', author = '$author', imageurl = '$url', size = '$size', filename = '$name' WHERE id = '$id'");
if ($query) {
echo "Congratulations $user, The Game has been Updated";
}
}
$retreivenewsquery = mysql_query("SELECT * FROM znetworking_games WHERE id = '$id'");
$row = mysql_fetch_array($retreivenewsquery);
if (isset($_GET['id'])) {
?>
<form method="post" action="">
Name: <input type="text" name="title" value="<?php echo $row['name']; ?>" /><br />
Author: <input type="text" name="author" value="<?php echo $row['author']; ?>" /><br />
Filesize (MB): <input type="text" name="size" value="<?php echo $row['size']; ?>" /><br />
Filename: <input type="text" name="name" value="<?php echo $row['filename']; ?>" /><br />
Image URL: <input type="text" name="iurl" value="<?php echo $row['imageurl']; ?>" /><br />
Description:<br /><textarea rows="15" cols="40" name="post"><?php echo $row['description']; ?></textarea>
<br /><br />
<input type="submit" value="Update!">
</form>
<?php
}
else {
$retreiveallnewsquery = mysql_query("SELECT * FROM znetworking_games ORDER BY id DESC LIMIT 0, 10");
while ($allrow = mysql_fetch_array($retreiveallnewsquery)) {
$sqlid = $allrow['id'];
$title = $allrow['name'];
$author = $allrow['author'];
echo "<a href='index.php?page=Admin&action=editgame&id=$sqlid'>$title - $author</a><br />";
}
}
?>

<script type="text/javascript">
	CKEDITOR.replace( 'post' );
</script>
