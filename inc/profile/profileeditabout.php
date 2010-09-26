<?php
$about = $_REQUEST['about'];
$input = $_REQUEST['input'];
if ($input) {
$query = mysql_query("UPDATE znetworking_members SET about = '$about' WHERE id = '$msqlid'");
if ($query) {
include("inc/functions/getuserinfo.php");
}
}
?>
<form method="post" action="">
<fieldset style="text-align: left;">
	<legend>About Me</legend>
<textarea name="about" cols="50" rows="15"><?php echo $msqlabout; ?></textarea><br />
<input type="hidden" name="input" value="yes" />
<input type="submit" value="Update!" />
</fieldset>
<input type="hidden" name="input" value="yes" />
</form>
<script type="text/javascript">
	CKEDITOR.replace( 'about' );
</script>