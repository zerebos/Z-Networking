<?php
$topicid = $_GET['topicid'];
$forumid = $_GET['forum'];
$catid = $_GET['catid'];
$postid = $_GET['postid'];
if ($_GET['action']!=="delete"){
$it = $_GET['action'];
}

if ($topicid && $forumid) {

if ($it=="add") {
$post = $_REQUEST['post'];
if ($post) {
$query = mysql_query("INSERT INTO znetworking_replies (topicid, author, post) VALUES ('$topicid', '$msqluser', '$post')");
if ($query) {
echo "Congratulations $user, Your Reply has been Added<br />";
}
else {
echo "There was an error";
$done = 1;
}
}
}

if ($it=="edit") {
$title = $_REQUEST['title'];
$post = $_REQUEST['post'];
if ($post) {
if ($title) {
$query = mysql_query("UPDATE znetworking_topics SET topic = '$title', post = '$post' WHERE id = '$topicid'");
}
else {
$query = mysql_query("UPDATE znetworking_replies SET post = '$post' WHERE id = '$postid'");
}
if ($query) {
echo "Congratulations $user, Your Post has been Updated";
$done = 1;
}
}
}

if ($_GET['action']=="delete") {
if ($topicid && !$postid) {
$query = mysql_query("DELETE FROM znetworking_topics WHERE id = '$topicid'");
$query2 = mysql_query("DELETE FROM znetworking_replies WHERE topicid = '$topicid'");
}
else {
$query = mysql_query("DELETE FROM znetworking_replies WHERE id = '$postid'");
}
if ($query) {
if ($query2) {
echo "Congratulations $user, your Topic has been deleted!";
echo "<br /><a href='index.php?page=Forum'>Back To Forum!</a>";
}
else {
echo "Congratulations $user, your post has been deleted!";
}
}
else {
echo "There was an Error processing your request!";
}
}

$post = mysql_query("SELECT * FROM znetworking_topics WHERE id = '$topicid' ORDER BY id ASC");
$posts = mysql_query("SELECT * FROM znetworking_replies WHERE topicid = '$topicid' ORDER BY id ASC");
$rack = mysql_fetch_array($post);
$rackuser = $rack['author'];
$rackuserq = mysql_query("SELECT * FROM znetworking_members WHERE user = '$rackuser'");
$crackuser = mysql_fetch_array($rackuserq);
$forum = mysql_query("SELECT * FROM znetworking_forumtable WHERE id = '$forumid'");
$forumrow = mysql_fetch_array($forum);
$fffcat = $forumrow['category'];
$category = mysql_query("SELECT * FROM znetworking_categories WHERE id = '$fffcat'");
$catrow = mysql_fetch_array($category);
$rackmypost = $rack['post'];
if ($msqluser==$rack['author'] || $admin) {
$lol = "<br /><br /><a href='index.php?page=Forum&forum=$forumid&topicid=$topicid&action=edit#post'>Edit</a>  |  <a href='index.php?page=Forum&forum=$forumid&topicid=$topicid&action=delete'>Delete</a>";
}
?>
<table>
<tr class="cat"><td><a href="index.php?page=Forum&catid=<?php echo $fffcat; ?>"><?php echo $catrow['name']; ?></a> > <a href="index.php?page=Forum&forum=<?php echo $forumid; ?>"><?php echo $forumrow['name']; ?></a> > Topic: <a href="index.php?page=Forum&forum=<?php echo $forumid; ?>&topicid=<?php echo $topicid; ?>"><?php echo $rack['topic']; ?></a></td></tr>
</table>
<table>
<tr><th>Author</th><th>Post</th></tr>
<tr class="forum"><td class="forumposts">
<?php
if ($crackuser['imageurl']) {
?>
<img src="<?php echo $crackuser['imageurl']; ?>" style="width:75px;height:75px;"><br />
<?php
}
else {
?>
<img src="images/default.png" style="width:75px;height:75px;"><br />
<?php
}
?>
<a href="index.php?page=Profile&id=<?php echo $crackuser['id']; ?>"><?php echo $rack['author']; ?></a></td><td class="forumname"><?php echo $rackmypost; if ($lol) { echo $lol; } ?></td></tr>
<?php
while ($row = mysql_fetch_array($posts)) {
$rowuser = $row['author'];
$sroid = $row['id'];
$rowuserq = mysql_query("SELECT * FROM znetworking_members WHERE user = '$rowuser'");
while ($crow = mysql_fetch_array($rowuserq)) {
?>
<tr class="forum"><td class="forumposts">
<?php
if ($crow['imageurl']) {
?>
<img src="<?php echo $crow['imageurl']; ?>" style="width:75px;height:75px;"><br />
<?php
}
else {
?>
<img src="images/default.png" style="width:75px;height:75px;"><br />
<?php
}
?>
<a href="index.php?page=Profile&id=<?php echo $crow['id']; ?>"><?php echo $row['author']; ?></a></td><td class="forumname"><?php echo $row['post']; if ($msqluser==$rowuser || $admin) { echo "<br /><br /><a href='index.php?page=Forum&forum=$forumid&topicid=$topicid&postid=$sroid&action=edit#post'>Edit</a>  |  <a href='index.php?page=Forum&forum=$forumid&topicid=$topicid&postid=$sroid&action=delete'>Delete</a>"; } ?></td></tr>
<?php
}
}
echo "</table>";
if ($LC==TRUE && !$admin) {
if (!$it || $done) {
echo "<a href='index.php?page=Forum&forum=$forumid&action=add'><img src='images/topic.png' alt='New Topic' border='0' /></a>";
echo "<a href='index.php?page=Forum&forum=$forumid&topicid=$topicid&action=add#post'><img src='images/reply.png' alt='New Reply' border='0' /></a>";
}
}
}








else {

if ($forumid) {
if ($_GET['action']=="add") {
if ($LC==TRUE && !$admin) {
include("inc/forum/topicadd.php");
}
else {
echo "Not logged in";
}
}
else {
$forum = mysql_query("SELECT * FROM znetworking_forumtable WHERE id = '$forumid'");
$forumrow = mysql_fetch_array($forum);
$fffcat = $forumrow['category'];
$category = mysql_query("SELECT * FROM znetworking_categories WHERE id = '$fffcat'");
$catrow = mysql_fetch_array($category);
$posts = mysql_query("SELECT * FROM znetworking_topics WHERE forumid = '$forumid' ORDER BY id ASC");
?>
<table>
<tr class="cat"><td><a href="index.php?page=Forum&catid=<?php echo $fffcat; ?>"><?php echo $catrow['name']; ?></a> > <a href="index.php?page=Forum&forum=<?php echo $forumid; ?>"><?php echo $forumrow['name']; ?></a></td></tr>
</table>
<table>
<tr><th>Topic Name - Author</th><th>Replies</th></tr>
<?php
$num = mysql_num_rows($posts);
if ($num < 1) {
?>
<tr class="forum"><td class="forumname">There are no posts to Display. Why not <a href='index.php?page=Forum&forum=$forumid&action=add'>post one</a> yourself?</td><td class="forumposts">0</td></tr>
<?php
}
while ($row = mysql_fetch_array($posts)) {
$rowuser = $row['author'];
$supercool = $row['id'];
$postq = mysql_query("SELECT * FROM znetworking_replies WHERE topicid = '$supercool'");
$rowuserq = mysql_query("SELECT * FROM znetworking_members WHERE user = '$rowuser'");
while ($crow = mysql_fetch_array($rowuserq)) {
?>
<tr class="forum"><td class="forumname"><a href="index.php?page=Forum&forum=<?php echo $forumrow['id']; ?>&topicid=<?php echo $row['id']; ?>"><?php echo $row['topic']; ?></a> - <a href="index.php?page=Profile&id=<?php echo $crow['id']; ?>"><?php echo $row['author']; ?></a></td><td class="forumposts"><?php echo mysql_num_rows($postq); ?></td></tr>
<?php
}
}
echo "</table>";
if ($LC==TRUE && !$admin) {
if (!$it || $done) {
echo "<a href='index.php?page=Forum&forum=$forumid&action=add'><img src='images/topic.png' alt='New Topic' border='0' /></a>";
}
}
}
}




else {
if ($catid) {
$cat = mysql_query("SELECT * FROM znetworking_categories WHERE id = '$catid' ORDER BY id ASC");
$catttt = "<a href='index.php?page=Forum'>Forum</a> > ";
}
else {
$cat = mysql_query("SELECT * FROM znetworking_categories ORDER BY id ASC");
}
while ($row = mysql_fetch_array($cat)) {
$catid = $row['id'];
$forum = mysql_query("SELECT * FROM znetworking_forumtable WHERE category = '$catid' ORDER BY subid ASC");
?>
<table>
<tr class="cat"><td><?php if ($catttt) { echo $catttt; } ?><a href="index.php?page=Forum&catid=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td></tr>
</table>
<table>
<tr><th>Forum Name</th><th>Topics</th></tr>
<?php
while ($rack = mysql_fetch_array($forum)) {
$supercool = $rack['id'];
$posts = mysql_query("SELECT * FROM znetworking_topics WHERE forumid = '$supercool'");
?>
<tr class="forum"><td class="forumname"><a href="index.php?page=Forum&forum=<?php echo $rack['id']; ?>"><?php echo $rack['name']; ?></a></td><td class="forumposts"><?php echo mysql_num_rows($posts); ?></td></tr>
<?php
}
echo "</table><br />";
}

}

}
if (!$done) {
if ($topicid && $forumid) {
if ($_GET['action']=="add") {
if ($LC==TRUE && !$admin) {
echo "<a name='post'></a>";
include("inc/forum/replyadd.php");
}
else {
echo "Not logged in";
}
}
elseif ($_GET['action']=="edit") {
if ($_SESSION['member']) {
echo "<a name='post'></a>";
include("inc/forum/editpost.php");
}
else {
echo "Not logged in";
}
}
}
}

?>