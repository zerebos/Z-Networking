<?php
$id = $_GET['id'];
$date = date("m/d/y");
$title = $_REQUEST['title'];
$post = $_REQUEST['post'];
$admin = $_REQUEST['admin'];
$gdate = $_REQUEST['date'];
$retreivecontactquery = mysql_query("SELECT * FROM znetworking_contact WHERE id = '$id'");
$row = mysql_fetch_array($retreivecontactquery);
if ($id) {
$query = mysql_query("DELETE FROM znetworking_contact WHERE id = '$id'");
if ($query) {
echo "Congratulations $user, The Contact Request has been Deleted<br />";
}
}
$retreiveallcontactquery = mysql_query("SELECT * FROM znetworking_contact ORDER BY id DESC LIMIT 0, 2");
while ($allrow = mysql_fetch_array($retreiveallcontactquery)) {
$sqlid = $allrow['id'];
$email = $allrow['email'];
$name = $allrow['name'];
$message = $allrow['message'];
echo "<strong>Name:</strong> $name <br />";
echo "<strong>Email:</strong> $email <br />";
echo "<strong>Message:</strong>$message <br />";
echo "<a href='index.php?page=Admin&action=viewcontacts&id=$sqlid'>Delete this post</a><br /><br /><br />";
}
?>

