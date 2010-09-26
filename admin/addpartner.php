<?php

$title = $_REQUEST['title'];
$name = $_REQUEST['name'];
$url = $_REQUEST['size'];
$iurl = $_REQUEST['iurl'];
$post = $_REQUEST['post'];
$author = $_REQUEST['author'];
if ($url && $post && $name && $iurl) {
$query = mysql_query("INSERT INTO znetworking_partners (name, url, imageurl, description) VALUES ('$name', '$url', '$iurl', '$post')");
if ($query) {
echo "Congratulations $user, The Partner has been Added<br />";
}
else {
echo "There was an error";
}
}
?>
<form method="post" action="">
Name: <input type="text" name="title" /><br />
URL: <input type="text" name="size" /><br />
Image URL: <input type="text" name="iurl" /><br />
Description:<br /><textarea rows="15" cols="40" name="post"></textarea>
<br /><br />
<input type="submit" value="Add Partner!">
</form>

<script type="text/javascript">
	CKEDITOR.replace( 'post' );
</script>