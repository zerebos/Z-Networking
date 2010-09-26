<?php
$query = mysql_query("SELECT * FROM znetworking_testimonials ORDER BY RAND()");
while ($row = mysql_fetch_array($query)) {
$ru = $row['url'];
?>
<fieldset style="text-align: left;">
	<legend><?php echo $row['name']; ?></legend>
<h3 style="margin: 0px;">
<?php echo $row['name']; ?></h3>
<br />
<strong>Site:</strong> <a href="<?php echo $row['url']; ?>" target="_blank"><?php echo $row['sitename']; ?></a><br />
<strong>Testimony:</strong><br />"<?php echo $row['content']; ?>"<br /><br />
</fieldset>
<?php
}
?>