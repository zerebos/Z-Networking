<?php
$id = $_GET['id'];
$date = date("m/d/y");
$title = $_REQUEST['title'];
$post = $_REQUEST['post'];
$admin = $_REQUEST['admin'];
$gdate = $_REQUEST['date'];
$retreivenewsquery = mysql_query("SELECT * FROM znetworking_news WHERE id = '$id'");
$row = mysql_fetch_array($retreivenewsquery);
if ($id) {
$query = mysql_query("DELETE FROM znetworking_news WHERE id = '$id'");
$query = mysql_query("DELETE FROM znetworking_newscomments WHERE newsid = '$id'");
if ($query) {
echo "Congratulations $user, Your News Post has been Deleted<br />";
}
}
$retreiveallnewsquery = mysql_query("SELECT * FROM znetworking_news ORDER BY id DESC LIMIT 0, 10");
while ($allrow = mysql_fetch_array($retreiveallnewsquery)) {
$sqlid = $allrow['id'];
$title = $allrow['title'];
$admin = $allrow['admin'];
echo "<a href='index.php?page=Admin&action=deletepost&id=$sqlid'>$title - $admin</a><br />";
}
?>

