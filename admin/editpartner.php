<?php
$id = $_GET['id'];

$title = $_REQUEST['title'];
$name = $_REQUEST['name'];
$url = $_REQUEST['size'];
$iurl = $_REQUEST['iurl'];
$post = $_REQUEST['post'];
$author = $_REQUEST['author'];
if ($url && $post && $name && $iurl) {
$query = mysql_query("UPDATE znetworking_partners SET name = '$title', description = '$post', url = '$url', imageurl = '$iurl' WHERE id = '$id'");
if ($query) {
echo "Congratulations $user, The Partner has been Updated";
}
}
$retreivenewsquery = mysql_query("SELECT * FROM znetworking_partners WHERE id = '$id'");
$row = mysql_fetch_array($retreivenewsquery);
if (isset($_GET['id'])) {
?>
<form method="post" action="">
Name: <input type="text" name="title" value="<?php echo $row['name']; ?>" /><br />
URL: <input type="text" name="size" value="<?php echo $row['url']; ?>" /><br />
Image URL: <input type="text" name="iurl" value="<?php echo $row['imageurl']; ?>" /><br />
Description:<br /><textarea rows="15" cols="40" name="post"><?php echo $row['description']; ?></textarea>
<br /><br />
<input type="submit" value="Update!">
</form>
<?php
}
else {
$retreiveallnewsquery = mysql_query("SELECT * FROM znetworking_partners ORDER BY id DESC LIMIT 0, 10");
while ($allrow = mysql_fetch_array($retreiveallnewsquery)) {
$sqlid = $allrow['id'];
$title = $allrow['name'];
$author = $allrow['author'];
echo "<a href='index.php?page=Admin&action=editpartner&id=$sqlid'>$title</a><br />";
}
}
?>

<script type="text/javascript">
	CKEDITOR.replace( 'post' );
</script>
