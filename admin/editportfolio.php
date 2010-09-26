<?php
$id = $_GET['id'];

$name = $_REQUEST['name'];
$description = $_REQUEST['description'];
$hourd = $_REQUEST['hourd'];
$hourc = $_REQUEST['hourc'];
$imageurl = $_REQUEST['imageurl'];
$category = $_REQUEST['category'];
$clientname = $_REQUEST['clientname'];
$link = $_REQUEST['link'];
$tlink = $_REQUEST['tlink'];
if ($name && $description && $hourd && $hourc && $imageurl && $category && $clientname && $link) {
$query = mysql_query("UPDATE znetworking_portfolio SET name = '$name', description = '$description', hourd = '$hourd', hourc = '$hourc', imageurl = '$imageurl', category = '$category', clientname = '$clientname', link = '$link', tlink = '$tlink' WHERE id = '$id'");
if ($query) {
echo "Congratulations $user, The Portfolio Item has been Updated";
}
}
$retreivenewsquery = mysql_query("SELECT * FROM znetworking_portfolio WHERE id = '$id'");
$row = mysql_fetch_array($retreivenewsquery);
if (isset($_GET['id'])) {
?>
Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" /><br />
Hours Designing: <input type="text" name="hourd" value="<?php echo $row['hourd']; ?>" /><br />
Hours Codeing: <input type="text" name="hourc" value="<?php echo $row['hourc']; ?>" /><br />
Category ID: <input type="text" name="category" value="<?php echo $row['category']; ?>" /><br />
Client name: <input type="text" name="clientname" value="<?php echo $row['clientname']; ?>" /><br />
Link: <input type="text" name="link" value="<?php echo $row['link']; ?>" /><br />
Template Link: <input type="text" name="tlink" value="<?php echo $row['tlink']; ?>" /><br />
Image URL: <input type="text" name="imageurl" value="<?php echo $row['imageurl']; ?>" /><br />
Description:<br /><textarea rows="15" cols="40" name="description"><?php echo $row['description']; ?></textarea>
<br /><br />
<input type="submit" value="Update!">
</form>
<?php
}
else {
$retreiveallnewsquery = mysql_query("SELECT * FROM znetworking_portfolio ORDER BY id DESC LIMIT 0, 10");
while ($allrow = mysql_fetch_array($retreiveallnewsquery)) {
$sqlid = $allrow['id'];
$title = $allrow['name'];
$author = $allrow['author'];
echo "<a href='index.php?page=Admin&action=editportfolio&id=$sqlid'>$title</a><br />";
}
}
?>

<script type="text/javascript">
	CKEDITOR.replace( 'post' );
</script>
