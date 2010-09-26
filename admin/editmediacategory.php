<?php
$name = $_REQUEST['name'];

$id = $_REQUEST['id'];

if ($name) {
$query = mysql_query("UPDATE znetworking_mediacategories SET name = '$name' WHERE id = '$id'");
if ($query) {
echo "Congratulations $user, That Category has been Updated<br />";
}
else {
echo "ERROR";
echo mysql_error();
}
}
if ($id) {
$result = mysql_query("SELECT * FROM znetworking_mediacategories WHERE id = '$id'");
$row = mysql_fetch_array($result);
?>
<form method="post" action="<?PHP echo $_SERVER['php_SELF'];?>">
Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" /><br />
<input type="submit" value="Update!" />
</form>
<?php
}
else {
$retreiveallnewsquery = mysql_query("SELECT * FROM znetworking_mediacategories ORDER BY id DESC LIMIT 0, 10");
while ($allrow = mysql_fetch_array($retreiveallnewsquery)) {
$sqlid = $allrow['id'];
$title = $allrow['name'];
echo "<a href='index.php?page=Admin&action=editmediacategory&id=$sqlid'>$title</a><br />";
}
}
?>

