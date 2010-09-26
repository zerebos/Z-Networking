<?php

$title = $_REQUEST['title'];
$name = $_REQUEST['name'];
$size = $_REQUEST['size'];
$url = $_REQUEST['iurl'];
$post = $_REQUEST['post'];
$author = $_REQUEST['author'];
if ($title && $post && $name && $size && $author) {
$query = mysql_query("INSERT INTO znetworking_games (name, author, size, filename, imageurl, description) VALUES ('$title', '$author', '$size', '$name', '$url', '$post')");
if ($query) {
echo "Congratulations $user, The Game has been Posted<br />";
}
else {
echo "There was an error";
}
}
?>
<form method="post" action="">
*Name: <input type="text" name="title" /><br />
*Author: <input type="text" name="author" /><br />
*Filesize (MB): <input type="text" name="size" /><br />
*Filename: <input type="text" name="name" /><br />
Image URL: <input type="text" name="iurl" /><br />
*Description:<br /><textarea rows="15" cols="40" name="post"></textarea>
<br /><br />
<input type="submit" value="Add Game!">
</form>

<script type="text/javascript">
	CKEDITOR.replace( 'post' );
</script>