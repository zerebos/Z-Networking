<?php
$id = $_GET['id'];


$name = $_REQUEST['name'];
$size = $_REQUEST['size'];
$url = $_REQUEST['url'];
$type = $_REQUEST['type'];
$catid = $_REQUEST['catid'];
if ($name && $size && $url && $type && $catid) {
$query = mysql_query("UPDATE znetworking_media SET name = '$name', filesize = '$size', url = '$url', filetype = '$type', catid = '$catid' WHERE id = '$id'");
if ($query) {
echo "Congratulations $user, The Media Item has been Updated";
}
else {
echo mysql_error();
}
}
$retreivenewsquery = mysql_query("SELECT * FROM znetworking_media WHERE id = '$id'");
$row = mysql_fetch_array($retreivenewsquery);
if (isset($_GET['id'])) {
?>
<form method="post" action="">
Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" /><br />
Filesize (MB): <input type="text" name="size" value="<?php echo $row['filesize']; ?>" /><br />
Filetype: <input type="text" name="type" value="<?php echo $row['filetype']; ?>" /><br />
Filename: <input type="text" name="url" value="<?php echo $row['url']; ?>" /><br />
Category: <select name="catid">
<?php
$query = mysql_query("SELECT * FROM znetworking_mediacategories");
while ($crow = mysql_fetch_array($query)) {
$id = $crow['id'];
$name = $crow['name'];
?>
<option value="<?php echo $id; ?>"
<?php
if ($row['catid']==$id) {
echo "SELECTED";} ?>><?php echo $name; ?></option>";
<?php
}
?>
</select>
<br />
<input type="submit" value="Update!">
</form>
<?php
}
else {
$cquery = mysql_query("SELECT * FROM znetworking_mediacategories");

while ($crow = mysql_fetch_array($cquery)) {
$crowc = $crow['name'];
$crowid = $crow['id'];
echo "<h3><u>$crowc</u></h3>";
$retreiveallmediasquery = mysql_query("SELECT * FROM znetworking_media ORDER BY id DESC LIMIT 0, 10");
while ($allrow = mysql_fetch_array($retreiveallmediasquery)) {
if ($allrow['catid']==$crow['id']) {
$sqlid = $allrow['id'];
$title = $allrow['name'];
echo "<a href='index.php?page=Admin&action=editmedia&id=$sqlid'>$title</a><br />";
}
}
}
}

?>
