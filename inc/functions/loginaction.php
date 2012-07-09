<?php
$user = $_REQUEST['username'];
$pass = $_REQUEST['password'];
$rem = $_REQUEST['rem'];
$date = date("m/d/y");
$salt = “thisspecificsaltencodingforznetworkingisgoingtobeverylongbecauseineedverysecureshitssoanywayslollawl13374nd32ubh34uhgu43hgu3h4gu3bgu3bhbhfdhgb3h34grb”;
$md5pass = md5($salt . $pass);
if ($user && $pass) {
if ($user && $pass) {
$query = mysqli_query($con, "SELECT * FROM znetworking_admins WHERE username='$user'");
if ($query) {
$row = mysqli_fetch_array($query);
$sqlpass = $row['pass'];
$sqluser = $row['username'];
}
}
if ($user && $pass) {
$mquery = mysqli_query($con, "SELECT * FROM znetworking_members WHERE username='$user'");
if ($mquery) {
$mrow = mysqli_fetch_array($mquery);
$msqlpass = $mrow['password_hash'];
$msqluser = $mrow['username'];
$msqlid = $mrow['id'];
}
}

if ($md5pass==$sqlpass) {
session_start();
$_SESSION['user'] = $sqluser;
}

if ($md5pass==$msqlpass) {
session_start();
$_SESSION['member'] = $msqluser;
if ($rem) {
$expire = strtotime( '+14 days' );
setcookie("user", $msqluser, $expire);
}
$query = mysqli_query($con, "UPDATE znetworking_members SET last_login = '$date' WHERE id = '$msqlid'");

}

}

?>