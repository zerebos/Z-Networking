<?php
$id = $_GET['id'];
$view = $_GET['view'];
$action = $_GET['action'];
$eid = $_GET['editid'];
if ($action) {
if ($action=="addpost") {
include("inc/blog/addpost.php");
}
if ($action=="editpost") {
include("inc/blog/editpost.php");
}
if ($action=="deletepost") {
include("inc/blog/deletepost.php");
}

}
else {

if ($_GET['pg']) {
$pg = $_GET['pg'];
}
else {
$pg = 0;
}
if ($id) {
$bquery = mysql_query("SELECT * FROM znetworking_blog WHERE userid = '$id' ORDER BY id DESC LIMIT $pg, 1");
}
else {
$bquery = mysql_query("SELECT * FROM znetworking_blog WHERE userid = '$msqlid' ORDER BY id DESC LIMIT $pg, 1");
}

if ((!$bquery || mysql_num_rows($bquery)<1)) {
if ($pg) {
echo "No more posts to display.<br />";

unset($view);
}
else {
if (!$admin && $id) {
echo "No posts have been made by this user.<br />";
$done = 1;
}
}
}

if ($admin && $eid) {
$quack = "&editid=$eid";
}
if (!$id && !$view) {
?>
<fieldset>
	<legend>Blog Management</legend>
<ul>
<li><a href="index.php?page=Blog&action=addpost<?php if ($quack) { echo $quack;} ?>">Add A Blog Post!</a></li>
<li><a href="index.php?page=Blog&action=editpost<?php if ($quack) { echo $quack; } ?>">Edit A Blog Post!</a></li>
<li><a href="index.php?page=Blog&action=deletepost<?php if ($quack) { echo $quack;} ?>">Delete A Blog Post!</a></li>
<li><a href="index.php?page=Account<?php if ($quack) { echo "&adminedit=true&id=$eid"; } ?>">Change between Private/Public Blog!</a></li>
<?php if ($quack) {?><li><a href="index.php?page=Blog&id=<?php echo $eid; ?>">View This Blog!</a></li><?php } else { ?><li><a href="index.php?page=Blog&view=true">View My Blog!</a></li><?php } ?>
</ul>
</fieldset>
<?php

}
else {
while ($row = mysql_fetch_array($bquery)) {
$title = $row['title'];
$rid = $row['id'];
$uid = $row['userid'];

$query = mysql_query("SELECT * FROM znetworking_members WHERE id = '$uid'");
$mmrow = mysql_fetch_array($query);
$author = $mmrow['user'];
if ($LC==TRUE && $msqluser==$author) {
$showmesally = 1;
}
if ($mmrow['showb']=="1" || $admin || $showmesally) {
$post = $row['post'];
$date = $row['date'];
?>
<img src="images/posttop.png" alt="" />
<div id="post">
<?php
echo "<h3>$title</h3>";
echo $post;
echo "<br />Posted by: <a href='index.php?page=Profile&id=$uid'>$author</a>  |  On: $date<br /><br /><br />";
?>
</div>
<img src="images/postbottom.png" alt="" />
<?php
}

else {
echo "Blog is private.";
$done = 1;
}
}
if ($done) {
}
else {
if ($_GET['pg']) {
$i = $_GET['pg'];
}
else {
$i = 0;
}
$i2 = $i - 1;
	if ($i < 2) {
if ($id) {
echo "<a href='index.php?page=Blog&id=$id'>Previous Post</a>  |  ";
}
else {
echo "<a href='index.php?page=Blog'>Previous Post</a>  |  ";
}
	}
	else {
if ($id) {
echo "<a href='index.php?page=Blog&pg=$i2&id=$id'>Previous Post</a>  |  ";
}
else {
echo "<a href='index.php?page=Blog&pg=$i2&view=true'>Previous Post</a>  |  ";
}
		}

$i++;
if ($id) {
echo "<a href='index.php?page=Blog&pg=$i&id=$id'>Next Post</a>";
}
else {
echo "<a href='index.php?page=Blog&pg=$i&view=true'>Next Post</a>";
}

}

}

}

if ($LC==TRUE) {
if ($msqluser==$author && !$admin) {
echo "<br /><br /><a href='index.php?page=Blog'>Blog Management</a>";
}

if ($admin && $id && !$eid) {
echo "<br /><br /><a href='index.php?page=Blog&editid=$id'>Blog Management</a>";
}
}
?>