<?php
$id = $_GET['id'];

$retreiveblogquery = mysql_query("SELECT * FROM znetworking_blog WHERE id = '$id'");
$row = mysql_fetch_array($retreiveblogquery);
if ($id) {
$query = mysql_query("DELETE FROM znetworking_blog WHERE id = '$id'");
if ($query) {
echo "Congratulations $user, Your Blog Post has been Deleted<br />";
if ($_GET['editid'] && $admin) {
echo "<br /><a href='index.php?page=Blog&id=$eid'>Click to go back to the blog</a>";
}
}
}
if ($_GET['editid'] && $admin) {
$retreiveallblogquery = mysql_query("SELECT * FROM znetworking_blog WHERE userid = '$eid' ORDER BY id DESC LIMIT 0, 10");
}
else {
$retreiveallblogquery = mysql_query("SELECT * FROM znetworking_blog WHERE userid = '$msqlid' ORDER BY id DESC LIMIT 0, 10");
}
?>
<fieldset>
	<legend>Delete a Blog Post (Click to delete)</legend>
<ul>
<?php
while ($allrow = mysql_fetch_array($retreiveallblogquery)) {
$sqlid = $allrow['id'];
$title = $allrow['title'];
$date = $allrow['date'];
?>
<li><a href="index.php?page=Blog&action=deletepost&id=<?php echo $sqlid; ?><?php if ($_GET['editid'] && $admin) { echo "&editid=$eid"; } ?>"><?php echo "$title - $date"; ?></a></li>
<?php
}
?>
</ul>
</fieldset>
<script type="text/javascript">
	CKEDITOR.replace( 'post' );
</script>
