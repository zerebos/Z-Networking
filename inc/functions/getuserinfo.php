<?php

$id = $_GET['id'];
if (($page=="Profile" && $id) || ($page=="Account" && $id)) {
$mquery = mysqli_query($con,"SELECT * FROM znetworking_members WHERE id = '$id'");
$maquery = mysqli_query($con,"SELECT * FROM znetworking_members WHERE username = '$user'");
echo mysqli_error($con);
}
else {
$mquery = mysqli_query($con,"SELECT * FROM znetworking_members WHERE username = '$user'");
$maquery = mysqli_query($con,"SELECT * FROM znetworking_members WHERE username = '$user'");
echo mysqli_error($con);
}
$marow = mysqli_fetch_array($maquery);
$masqlid = $marow['id'];
$masqlperms = $marow['perms'];

$mrow = mysqli_fetch_array($mquery);
$msqluser = $mrow['username'];
$msqlfirst = $mrow['first_name'];
$msqllast = $mrow['last_name'];
$msqlabout = $mrow['bio'];
$msqliurl = $mrow['image_url'];
$msqlurl = $mrow['url'];
$msqlaim = $mrow['AIM'];
$msqlyim = $mrow['YIM'];
$msqlmsn = $mrow['MSN'];
$msqlxfire = $mrow['XFire'];
$msqlsteam = $mrow['Steam'];
$msqlshowe = $mrow['show_email'];
$msqlemail = $mrow['email'];
$msqlshowa = $mrow['show_age'];
$msqlage = $mrow['age'];
$msqllogged = $mrow['last_login'];
$msqlgen = $mrow['gender'];
$msqlid = $mrow['id'];
$msqlloc = $mrow['location'];
$msqlshowl = $mrow['show_location'];
$msqlshowb = $mrow['showb'];
$msqlperms = $mrow['permissions'];

if ($masqlperms=="1" && ($_SESSION['member'] || $_COOKIE['user'])) {
$admin = 1;
}
else {
unset($admin);
}



if (isset($_SESSION['user'])) {
$query = mysqli_query($con,"SELECT * FROM znetworking_admins WHERE user='$user'");
$row = mysqli_fetch_array($query);
$sqlname = $row['user'];
$admin = 1;
}


?>