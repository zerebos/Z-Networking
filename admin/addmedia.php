<?php

$name = $_REQUEST['name'];
$size = $_REQUEST['size'];
$url = $_REQUEST['url'];
$type = $_REQUEST['type'];
$catid = $_REQUEST['catid'];
if ($name && $size && $url && $type && $catid) {
$query = mysql_query("INSERT INTO znetworking_media (name, filesize, filetype, url, catid) VALUES ('$name', '$size', '$type', '$url', '$catid')");
if ($query) {
echo "Congratulations $user, The Media Item has been Posted<br />";
}
else {
echo "There was an error";
}
}
?>
<form method="post" action="">
Name: <input type="text" name="name" /><br />
Filesize (MB): <input type="text" name="size" /><br />
Filetype: <input type="text" name="type" /><br />
Filename: <input type="text" name="url" /><br />
Category: <select name="catid">
<?php
$query = mysql_query("SELECT * FROM znetworking_mediacategories");
while ($row = mysql_fetch_array($query)) {
$id = $row['id'];
$name = $row['name'];
echo "<option value='$id'>$name</option>";
}
?>
</select>
<br />
<input type="submit" value="Add Media Item!">
</form>