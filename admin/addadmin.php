<?php
$name = $_GET['name'];
if ($name) {
$query = mysql_query("UPDATE znetworking_members SET perms = '1' WHERE first = '$name'");
if ($query) {
echo "Congratulations $user, The Admin has been Added<br />";
}
}
$retreivealladminquery = mysql_query("SELECT * FROM znetworking_members WHERE perms = '0'");
while ($allrow = mysql_fetch_array($retreivealladminquery)) {
$dayum = $allrow['first'];
if ($dayum!=="Zack") {
echo "<a href='index.php?page=Admin&action=addadmin&name=$dayum'>$dayum</a><br />";
}
}
?>

