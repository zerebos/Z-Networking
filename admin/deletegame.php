<?php
$id = $_GET['id'];
$date = date("m/d/y");
$title = $_REQUEST['title'];
$post = $_REQUEST['post'];
$admin = $_REQUEST['admin'];
$gdate = $_REQUEST['date'];
$retreivegamesquery = mysql_query("SELECT * FROM znetworking_games WHERE id = '$id'");
$row = mysql_fetch_array($retreivegamesquery);
if ($id) {
$query = mysql_query("DELETE FROM znetworking_games WHERE id = '$id'");
if ($query) {
echo "Congratulations $user, The Game has been Deleted<br />";
}
}
$retreiveallgamesquery = mysql_query("SELECT * FROM znetworking_games ORDER BY id DESC LIMIT 0, 10");
while ($allrow = mysql_fetch_array($retreiveallgamesquery)) {
$sqlid = $allrow['id'];
$title = $allrow['name'];
$admin = $allrow['author'];
echo "<a href='index.php?page=Admin&action=deletegame&id=$sqlid'>$title - $admin</a><br />";
}
?>

