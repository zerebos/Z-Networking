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
$nquery = mysqli_query($con,"SELECT * FROM znetworking_news ORDER BY id DESC LIMIT $ppg, 5");
while ($nrow = mysqli_fetch_array($nquery)) {
$newstitle = $nrow['title'];
$newsid = $nrow['id'];
$newspost = $nrow['content'];
$newsadmin = $nrow['admin_id'];
$newsdate = $nrow['timestamp'];
$memquery = mysqli_query($con,"SELECT * FROM znetworking_members WHERE user = '$newsadmin'");
$memrow = mysqli_fetch_array($memquery);
$kid = $memrow['id'];
$knm = $memrow['first'];
$coms = mysqli_query($con,"SELECT * FROM znetworking_newscomments WHERE news_id = '$newsid'");
$num_rows = mysqli_num_rows($coms);
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