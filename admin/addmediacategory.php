<?php
$name = $_REQUEST['name'];

if ($name) {
$query = mysql_query("INSERT INTO znetworking_mediacategories (name) VALUES ('$name')");
if ($query) {
echo "Congratulations $user, The Category has been Added<br />";
}
}
else {
}
?>
<form method="post" action="<?PHP echo $_SERVER['php_SELF'];?>">
Name: <input type="text" name="name" /><br />
<input type="submit" value="Add Category!" />

