<?php
$cquery = mysql_query("SELECT * FROM znetworking_portfoliocats");

while ($crow = mysql_fetch_array($cquery)) {
$crowc = $crow['name'];
$crowid = $crow['id'];
$query = mysql_query("SELECT * FROM znetworking_portfolio WHERE category = '$crowid' ORDER BY RAND()");
if (mysql_num_rows($query)>0) {
echo "<a name='$crowc'><h3>$crowc</h3></a>";
}
while ($row = mysql_fetch_array($query)) {
$ri = $row['imageurl'];
$ru = $row['link'];
$rut = $row['tlink'];
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
<strong>Client:</strong> <?php echo $row['clientname']; ?><br />
<?php
if ($row['category']=="1" || $row['category']=="4") {
?>
<font style="color: #dd0000;">
<strong><u>Time:<br /></u></strong>
<i>
<strong>Hours Designing:</strong> <?php echo $row['hourd']; ?><br />
<strong>Hours Coding:</strong> <?php echo $row['hourc']; ?><br />
</i></font>
<?php
}
?>
<?php
if ($ru) {
?>
<strong>URL:</strong> <a href="<?php echo $row['link']; ?>" target="_blank">Click here!</a><br />
<?php
}
?>
<strong>Description:</strong><br /><?php echo $row['description']; ?><br /><br />
<?php
if ($rut) {
?>
<center><a href="<?php echo $rut; ?>"><img src="images/download.png" alt="Download" border="0" /></a></center>
<?php
}
?>
</fieldset>
<?php
}
}
?>