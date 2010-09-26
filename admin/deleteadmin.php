<?php
$name = $_GET['name'];
if ($name) {
$query = mysql_query("UPDATE znetworking_members SET perms = '0' WHERE first = '$name'");
if ($query) {
echo "Congratulations $user, The Admin has been Deleted<br />";
}
}
$retreivealladminquery = mysql_query("SELECT * FROM znetworking_members WHERE perms = '1'");
while ($allrow = mysql_fetch_array($retreivealladminquery)) {
$dayum = $allrow['first'];
if ($dayum!=="Zack") {
echo "<a href='index.php?page=Admin&action=deleteadmin&name=$dayum'>$dayum</a><br />";
}
}
?>

