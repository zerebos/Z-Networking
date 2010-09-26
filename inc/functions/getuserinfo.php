<?php

$id = $_GET['id'];
if (($page=="Profile" && $id) || ($page=="Account" && $id)) {
$mquery = mysql_query("SELECT * FROM znetworking_members WHERE id = '$id'");
$maquery = mysql_query("SELECT * FROM znetworking_members WHERE user = '$user'");
echo mysql_error();
}
else {
$mquery = mysql_query("SELECT * FROM znetworking_members WHERE user = '$user'");
$maquery = mysql_query("SELECT * FROM znetworking_members WHERE user = '$user'");
echo mysql_error();
}
$marow = mysql_fetch_array($maquery);
$masqlid = $marow['id'];
$masqlperms = $marow['perms'];

$mrow = mysql_fetch_array($mquery);
$msqluser = $mrow['user'];
$msqlfirst = $mrow['first'];
$msqllast = $mrow['last'];
$msqlabout = $mrow['about'];
$msqliurl = $mrow['imageurl'];
$msqlurl = $mrow['url'];
$msqlaim = $mrow['AIM'];
$msqlyim = $mrow['YIM'];
$msqlmsn = $mrow['MSN'];
$msqlxfire = $mrow['Xfire'];
$msqlsteam = $mrow['steam'];
$msqlshowe = $mrow['showe'];
$msqlemail = $mrow['email'];
$msqlshowa = $mrow['showa'];
$msqlage = $mrow['age'];
$msqllogged = $mrow['logged'];
$msqlgen = $mrow['gender'];
$msqlid = $mrow['id'];
$msqlloc = $mrow['location'];
$msqlshowl = $mrow['showl'];
$msqlshowb = $mrow['showb'];
$msqlperms = $mrow['perms'];

if ($masqlperms=="1" && ($_SESSION['member'] || $_COOKIE['user'])) {
$admin = 1;
}
else {
unset($admin);
}



if (isset($_SESSION['user'])) {
$query = mysql_query("SELECT * FROM znetworking_admins WHERE user='$user'");
$row = mysql_fetch_array($query);
$sqlname = $row['user'];
$admin = 1;
}


?>