<?php

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
$query = mysql_query("INSERT INTO znetworking_games (name, description, hourd, hourc, imageurl, category, clientname, link, tlink) VALUES ('$name', '$description', '$hourd', '$hourc', '$imageurl', '$category', '$clientname', '$link', '$tlink')");
if ($query) {
echo "Congratulations $user, The Portfolio Item has been Posted<br />";
}
else {
echo "There was an error";
}
}
?>
<form method="post" action="">
Name: <input type="text" name="name" /><br />
Hours Designing: <input type="text" name="hourd" /><br />
Hours Codeing: <input type="text" name="hourc" /><br />
Category ID: <input type="text" name="category" /><br />
Client name: <input type="text" name="clientname" /><br />
Link: <input type="text" name="link" /><br />
Template Link: <input type="text" name="tlink" /><br />
Image URL: <input type="text" name="imageurl" /><br />
Description:<br /><textarea rows="15" cols="40" name="description"></textarea>
<br /><br />
<input type="submit" value="Add Portfolio Item!">
</form>

<script type="text/javascript">
	CKEDITOR.replace( 'post' );
</script>