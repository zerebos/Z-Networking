<?php
$id = $_GET['id'];
$date = date("m/d/y");
$title = $_REQUEST['title'];
$post = $_REQUEST['post'];
$admin = $_REQUEST['admin'];
$gdate = $_REQUEST['date'];
$retreivemediasquery = mysql_query("SELECT * FROM znetworking_media WHERE id = '$id'");
$row = mysql_fetch_array($retreivemediasquery);
if ($id) {
$query = mysql_query("DELETE FROM znetworking_media WHERE id = '$id'");
if ($query) {
echo "Congratulations $user, The Media Item has been Deleted<br />";
}
}
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
echo "<a href='index.php?page=Admin&action=deletemedia&id=$sqlid'>$title</a><br />";
}
}
}
?>

