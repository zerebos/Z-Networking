<?php
$user = $_REQUEST['username'];
$pass = $_REQUEST['password'];
$rem = $_REQUEST['rem'];
$date = date("m/d/y");
$salt = “thisspecificsaltencodingforznetworkingisgoingtobeverylongbecauseineedverysecureshitssoanywayslollawl13374nd32ubh34uhgu43hgu3h4gu3bgu3bhbhfdhgb3h34grb”;
$md5pass = md5($salt . $pass);
if ($user && $pass) {
if ($user && $pass) {
$query = mysql_query("SELECT * FROM znetworking_admins WHERE user='$user'");
if ($query) {
$row = mysql_fetch_array($query);
$sqlpass = $row['pass'];
$sqluser = $row['user'];
}
}
if ($user && $pass) {
$mquery = mysql_query("SELECT * FROM znetworking_members WHERE user='$user'");
if ($mquery) {
$mrow = mysql_fetch_array($mquery);
$msqlpass = $mrow['pass'];
$msqluser = $mrow['user'];
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
$expire = time()+60*60*24*14;
setcookie("user", $msqluser, $expire);
}
$query = mysql_query("UPDATE znetworking_members SET logged = '$date' WHERE id = '$msqlid'");

}

}

?>