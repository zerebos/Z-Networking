<?php
$id = $_GET['id'];
$nquery = mysql_query("SELECT * FROM znetworking_news WHERE id = '$id'");
$nrow = mysql_fetch_array($nquery);
$newstitle = $nrow['title'];
$newsid = $nrow['id'];
$newspost = $nrow['post'];
$newsadmin = $nrow['admin'];
$newsdate = $nrow['date'];
echo "<h3>$newstitle</h3>";
echo $newspost;
echo "<br />Posted by: $newsadmin  |  On: $newsdate";
echo "<br /><br /><br /><hr><h3>Comments</h3>";
?>
<?php
$nickname = $_REQUEST['nickname'];
$comment = $_REQUEST['comment'];
if ($nickname && $newsid && $comment) {
$query = mysql_query("INSERT INTO znetworking_newscomments (newsid, nickname, comment) VALUES ('$newsid', '$nickname', '$comment')");
}
?>
<?php
$query = mysql_query("SELECT * FROM znetworking_newscomments WHERE newsid = '$id'");
while ($row = mysql_fetch_array($query)) {
$rnickname = $row['nickname'];
$mquery = mysql_query("SELECT * FROM znetworking_members WHERE user = '$rnickname'");
if ($mquery) {
$mrow = mysql_fetch_array($mquery);
$mid = $mrow['id'];
}
$rcomment = $row['comment'];
echo $rcomment;
if (!$mid) {
echo "<br />Posted by: $rnickname";
}
else {
echo "<br />Posted by: <a href='index.php?page=Profile&id=$mid'>$rnickname</a>";
}
echo "<br /><br />";
}
if ($user) {
?>
<form method="post" action="">
Nickname: <input type="text" name="nickname" value="<?php echo $user; ?>" readonly=disabled /><br />
Comment:<br /><textarea rows="15" cols="40" name="comment"></textarea><br />
<input type="submit" value="Post!">
</form>
<?php
}
if ($LC==FALSE) {
echo "Not a registered member? Only <a href='index.php?page=Register'>Registered</a> users can post comments.";
}
?>
<script type="text/javascript">
	CKEDITOR.replace( 'comment' );
</script>