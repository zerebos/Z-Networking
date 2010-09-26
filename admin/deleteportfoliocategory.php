<?php

$id = $_REQUEST['id'];

if ($id) {
$query = mysql_query("DELETE FROM znetworking_portfoliocats WHERE id = '$id'");
if ($query) {
echo "Congratulations $user, That Category has been Updated<br />";
}
else {
echo "ERROR";
echo mysql_error();
}
}
$retreiveallnewsquery = mysql_query("SELECT * FROM znetworking_portfoliocats ORDER BY id DESC LIMIT 0, 10");
while ($allrow = mysql_fetch_array($retreiveallnewsquery)) {
$sqlid = $allrow['id'];
$title = $allrow['name'];
echo "<a href='index.php?page=Admin&action=deletemediacategory&id=$sqlid'>$title</a><br />";
}
?>

