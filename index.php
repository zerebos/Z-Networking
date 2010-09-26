<?php
include("inc/functions/connect.php");
include("inc/functions/getpage.php");
if ($page=="Logout") {
include("inc/functions/logoutaction.php");
}
if ($page=="Login") {
include("inc/functions/loginaction.php");
}
$deleteidd = $_REQUEST['delete2'];
if ($page=="Account" && $deleteidd) {
session_unset();
session_destroy();
}
include("inc/functions/usercheck.php");
include("inc/functions/getuserinfo.php");
include("inc/functions/checkbrowser.php");
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<meta name="google-site-verification" content="IZDA1m8bGVlhVvNNKbtIii_DnJv7JFA0pu8tRYawPeE" />
<meta name="description" content="Yes the new site is finally here, register, view your profile, play in the forum, have your own blog. We have it all. What we do need though is your input, and money, but mainly input, we need to know what you the people want. Short post, Huge change, it happens!" />
<meta name="keywords" content="LCCEnterprise, LCC, Enterprise, Web, Hosting, Development, Myspace, Twitter, Digg, Image, Hosting, Xfire, Gaming, Clans, Battlefield, 2, Google, Z-networking, Z-Tek, Zack, Rauen, Smith, Jeremy, Lee, Leadingham, Myspace, Profiles, Music, Gaming, Forum, Blog, Community, Fun" />
<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<link rel="stylesheet" href="style.css" type="text/css" />
<?php if (ae_detect_ie()) {
?>
<style type="text/css">
#networkbarlogin {
float:right;
vertical-align: middle;
margin-top: -22px;
}
table {
width: 450px;
}
</style>
<?php
}
?>
<?php if (ae_detect_opera()) {
?>
<style type="text/css">
#networkbarlogin {
float:right;
vertical-align: middle;
margin: -22px 20px 10px 0px;
}

</style>
<?php
}
?>
<title>Z-Tek </title>
</head>
<body><center>
<?php
include("inc/layout/networkbar.php");
?>
<div id="contentwrap">
<div id="logo">&nbsp;</div>
<div id="nav">
<?php
include("inc/layout/navlinks.php");
?>

</div>
<div id="area">
<?php
include("showpageactions.php");
?>

</div>
<div id="footer">
All content copyright &copy; Z-Tek, all rights reserved.
</div>
<div id="links">
<a href="index.php?page=Portfolio">Portfolio</a>  |  <a href="index.php?page=Testimonials">Testimonials</a>  |  <a href="index.php?page=Partners">Partners</a>  |  <a href="index.php?page=Privacy Policy">Privacy Policy</a>  |  <a href="index.php?page=Terms">Terms Of Use</a>  |  <a href="index.php?page=Acceptable Use Policy">Acceptable Use Policy</a>
</div>
</div>
</center></body>
</html>