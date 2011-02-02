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
$pageURL = $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

$fbtitle = $_GET['page'];
$topicid = $_GET['topicid'];
if ($page=="Home" && $_GET['id']) {
$nquery = mysql_query("SELECT * FROM znetworking_news WHERE id = '$id'");
$nrow = mysql_fetch_array($nquery);
$spost = $nrow['title'];
$fbtitle = "'$spost' News Post";
}
if ($page=="Forum" && $_GET['topicid'] && $_GET['forum']) {
$post = mysql_query("SELECT * FROM znetworking_topics WHERE id = '$topicid' ORDER BY id ASC");
$rack = mysql_fetch_array($post);
$stopic = $rack['topic'];
$fbtitle = "'$stopic' Forum Post";
}

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<meta name="google-site-verification" content="IZDA1m8bGVlhVvNNKbtIii_DnJv7JFA0pu8tRYawPeE" />
<meta name="description" content="Yes the new site is finally here, register, view your profile, play in the forum, have your own blog. We have it all. What we do need though is your input, and money, but mainly input, we need to know what you the people want. Short post, Huge change, it happens!" />
<meta name="keywords" content="LCCEnterprise, LCC, Enterprise, Web, Hosting, Development, Myspace, Twitter, Digg, Image, Hosting, Xfire, Gaming, Clans, Battlefield, 2, Google, Z-networking, Z-Tek, Zack, Rauen, Smith, Jeremy, Lee, Leadingham, Myspace, Profiles, Music, Gaming, Forum, Blog, Community, Fun" />
    <meta property="og:title" content="<?php echo $fbtitle; ?>"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="<?php echo "http://$pageURL"; ?>"/>
    <meta property="og:image" content="http://z-networking.org/images/logo.jpg"/>
    <meta property="og:site_name" content="Z-Tek"/>
<meta property="fb:admins" content="1360822286" />
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
<body><div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({appId: '127318320626746', status: true, cookie: true,
             xfbml: true});
  };
  (function() {
    var e = document.createElement('script'); e.async = true;
    e.src = document.location.protocol +
      '//connect.facebook.net/en_US/all.js';
    document.getElementById('fb-root').appendChild(e);
  }());
</script><center>

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
<br />
<br />
<br />
<br />
<fb:like href="<?php echo "http://$pageURL"; ?>" width="450" height="80" colorscheme="dark"/>
</div>
<div id="footer">
All content copyright &copy; Z-Tek, all rights reserved.
</div>
<div id="links">
<a href="index.php?page=Portfolio">Portfolio</a>  |  <a href="index.php?page=Testimonials">Testimonials</a>  |  <a href="index.php?page=Partners">Partners</a>  |  <a href="index.php?page=Privacy Policy">Privacy Policy</a>  |  <a href="index.php?page=Terms">Terms Of Use</a>  |  <a href="index.php?page=Acceptable Use Policy">Acceptable Use Policy</a>
</div>
</div>
<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FZ-Tek%2F127318320626746%3Fref%3Dts&amp;layout=standard&amp;show_faces=true&amp;width=450&amp;action=like&amp;colorscheme=dark&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:80px;" allowTransparency="true"></iframe>
</center></body>
</html>