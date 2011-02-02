<?php
if (isset($_GET['id'])) {
include("inc/functions/comments.php");
}
else {
?>

<h2>News</h2>
<?php
if ($_GET['pg']) {
$pg = $_GET['pg'];
$ppg = $pg * 5;
}
else {
$ppg = 0;
}
$nquery = mysql_query("SELECT * FROM znetworking_news ORDER BY id DESC LIMIT $ppg, 5");
while ($nrow = mysql_fetch_array($nquery)) {
$newstitle = $nrow['title'];
$newsid = $nrow['id'];
$newspost = $nrow['post'];
$newsadmin = $nrow['admin'];
$newsdate = $nrow['date'];
$memquery = mysql_query("SELECT * FROM znetworking_members WHERE user = '$newsadmin'");
$memrow = mysql_fetch_array($memquery);
$kid = $memrow['id'];
$knm = $memrow['first'];
$coms = mysql_query("SELECT * FROM znetworking_newscomments WHERE newsid = '$newsid'");
$num_rows = mysql_num_rows($coms);
?>
<img src="images/posttop.png" alt="" />
<div id="post">

<?php
echo "<h3>$newstitle</h3>";
echo $newspost;
echo "<br />Posted by: <a href='index.php?page=Profile&id=$kid'>$knm</a>  |  On: $newsdate  |  <a href='index.php?page=Home&id=$newsid'>($num_rows) Comments</a><br />";
?>

</div>
<img src="images/postbottom.png" alt="" />
<?php
}
if ($_GET['pg']) {
$i = $_GET['pg'];
}
else {
$i = 0;
}
$i2 = $i - 1;
if ($i < 2) {
echo "<a href='index.php?page=Home'>Previous Page</a>  |  ";
}
else {
echo "<a href='index.php?page=Home&pg=$i2'>Previous Page</a>  |  ";
}

$i++;
echo "<a href='index.php?page=Home&pg=$i'>Next Page</a>";
}
?>