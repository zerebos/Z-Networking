<?php
$query = mysql_query("SELECT * FROM znetworking_partners ORDER BY RAND()");
while ($row = mysql_fetch_array($query)) {
$ri = $row['imageurl'];
$ru = $row['url'];
?>
<fieldset style="text-align: left;">
	<legend><?php echo $row['name']; ?></legend>
<?php
if ($ri) {
?>
<a href="<?php echo $row['imageurl']; ?>"><img src="<?php echo $row['imageurl']; ?>" style="border:0px;float: left;margin-right: 10px;width:150px;height:150px;">
</a>
<?php
}
else {
?>
<img src="images/nogamepic.jpg" style="float: left;margin-right: 10px;width:150px;height:150px;">
<?php
}
?>
<h3 style="display:inline;vertical-align:top;">
<?php echo $row['name']; ?></h3>
<br />
<?php
if ($ru) {
?>
<strong>URL:</strong> <a href="<?php echo $row['url']; ?>" target="_blank">Click here!</a><br />
<?php
}
?>
<strong>Description:</strong><br /><?php echo $row['description']; ?><br /><br />
</fieldset>
<?php
}
?>