<?php
echo "<h1>$page</h1>";
$query = mysql_query("SELECT * FROM znetworking_sitecontent WHERE page = '$page'");
while ($row = mysql_fetch_array($query)) {
echo $row['content'];
}

if ($page=="Home") {
include("inc/home.php");
}

if ($page=="Admin") {
include("inc/admin.php");
}

if ($page=="Login") {
include("inc/loginpage.php");
}

if ($page=="Logout") {
include("inc/logoutpage.php");
}

if ($page=="Register") {
include("inc/register.php");
}

if ($page=="Profile") {
include("inc/profile.php");
}

if ($page=="Contact") {
include("inc/contact.php");
}

if ($page=="Members") {
include("inc/members.php");
}

if ($page=="Settings") {
include("inc/settings.php");
}

if ($page=="Gaming") {
include("inc/gaming.php");
}

if ($page=="Forum") {
include("inc/forum.php");
}

if ($page=="Staff") {
include("inc/staff.php");
}

if ($page=="Media") {
include("inc/media.php");
}

if ($page=="Blog") {
include("inc/blog.php");
}

?>