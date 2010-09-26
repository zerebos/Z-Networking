<?php
$id = $_GET['id'];
if ($id) {
$query = mysql_query("SELECT * FROM znetworking_games WHERE id = '$id'");
$row = mysql_fetch_array($query);
$ri = $row['imageurl'];
?>
<fieldset style="text-align: left;">
	<legend><?php echo $row['name']; ?></legend>
<?php
if ($ri) {
?>
<img src="<?php echo $row['imageurl']; ?>" style="float: left;margin-right: 10px;width:150px;height:150px;">
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
<strong>By:</strong> <?php echo $row['author']; ?><br />
<strong>Size:</strong> <?php echo $row['size']; ?>MB<br />
<strong>Description:</strong><br /><?php echo $row['description']; ?><br /><br />
<center><a href="games/<?php echo $row['filename']; ?>"><img src="images/download.png" alt="Download" border="0" /></a></center>
</fieldset>
<?php
}
else {
?>
<table border="0">
<tr id="dltb"><td>Filename</td><td>Filesize (MB)</td><td>Author</td></tr>
<?php
$query = mysql_query("SELECT * FROM znetworking_games ORDER BY RAND()");
$i = 0;
while ($row = mysql_fetch_array($query)) {

$id = $row['id'];
$check = $i % 2;

if ($check=="1") {
?>
<tr id="dl1">
<td><a href="index.php?page=Gaming&id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>
<td><?php echo $row['size']; ?>MB</td>
<td><?php echo $row['author']; ?></td>
</tr>
<?php
}
else {
?>
<tr id="dl2">
<td><a href="index.php?page=Gaming&id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>
<td><?php echo $row['size']; ?>MB</td>
<td><?php echo $row['author']; ?></td>
</tr>
<?php
}
$i++;
}
?>
<tr id="dltb">
<td>Filename</td>
<td>Filesize (MB)</td>
<td>Author</td>
</tr>
</table>
<?php
}
?>