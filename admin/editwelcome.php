<?php
$aboutus = $_REQUEST['aboutus'];
if ($aboutus) {
$query = mysql_query("UPDATE znetworking_sitecontent SET content = '$aboutus' WHERE page = 'Welcome'");
if ($query) {
echo "Congratulations $user, The About Page has been Updated";
}
}
$retreiveaboutquery = mysql_query("SELECT * FROM znetworking_sitecontent WHERE page = 'Welcome'");
$row = mysql_fetch_array($retreiveaboutquery);
?>
<form method="post" action="">
<br /><textarea rows="15" cols="40" name="aboutus"><?php echo $row['content']; ?></textarea><br /><br />
<input type="submit" value="Update!">
</form>

<script type="text/javascript">
	CKEDITOR.replace( 'aboutus' );
</script>