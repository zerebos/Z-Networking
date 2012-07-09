<?php
$date = date("m/d/y");
function LoggedCheck() {
if ($_SESSION['member'] || $_SESSION['user'] || $_COOKIE['user']) {
$query = mysqli_query($con, "UPDATE znetworking_members SET logged = '$date' WHERE id = '$msqlid'");
return TRUE;
}
else {
return FALSE;
}
}
$LC = LoggedCheck();

if ($LC==TRUE) {
if ($_COOKIE['user']) {
$user = $_COOKIE['user'];
}
if ($_SESSION['user']) {
$user = $_SESSION['user'];
$admin = 1;
}
if ($_SESSION['member']) {
$user = $_SESSION['member'];
}
}
?>

