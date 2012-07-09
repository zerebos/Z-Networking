<?php
$id = $_GET['id'];
$nquery = mysqli_query($con, "SELECT * FROM znetworking_news WHERE id = '$id'");
$nrow = mysqli_fetch_array($nquery);
$newstitle = $nrow['title'];
$newsid = $nrow['id'];
$newspost = $nrow['content'];
$newsadmin = $nrow['user_id'];
$newsdate = $nrow['timestamp'];
echo "<h3>$newstitle</h3>";
echo $newspost;
echo "<br />Posted by: $newsadmin  |  On: $newsdate";
echo "<br /><br /><br /><hr><h3>Comments</h3>";
?>
<?php
$comment = $_REQUEST['comment'];
if ($msqlid && $newsid && $comment) {
$query = mysqli_query($con, "INSERT INTO znetworking_newscomments (news_id, user_id, comment) VALUES ('$newsid', '$msqlid', '$comment')");
}
?>
<?php
$query = mysqli_query($con, "SELECT * FROM znetworking_newscomments WHERE news_id = '$id'");
while ($row = mysqli_fetch_array($query)) {
$user_id = $row['user_id'];
$mquery = mysqli_query($con, "SELECT * FROM znetworking_members WHERE id = '$user_id'");
if ($mquery) {
$mrow = mysqli_fetch_array($mquery);
$rnickname = $mrow['nickname'];
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