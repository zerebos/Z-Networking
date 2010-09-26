<?php
$id = $_GET['id'];
$date = date("m/d/y");
$title = $_REQUEST['title'];
$post = $_REQUEST['post'];
$admin = $_REQUEST['admin'];
$gdate = $_REQUEST['date'];
$retreiveportfolioquery = mysql_query("SELECT * FROM znetworking_portfolio WHERE id = '$id'");
$row = mysql_fetch_array($retreiveportfolioquery);
if ($id) {
$query = mysql_query("DELETE FROM znetworking_portfolio WHERE id = '$id'");
if ($query) {
echo "Congratulations $user, The Portfolio Item has been Deleted<br />";
}
}
$retreiveallportfolioquery = mysql_query("SELECT * FROM znetworking_portfolio ORDER BY id DESC LIMIT 0, 10");
while ($allrow = mysql_fetch_array($retreiveallportfolioquery)) {
$sqlid = $allrow['id'];
$title = $allrow['name'];
$admin = $allrow['author'];
echo "<a href='index.php?page=Admin&action=deleteportfolio&id=$sqlid'>$title</a><br />";
}
?>

