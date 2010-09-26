<?php
$cquery = mysql_query("SELECT * FROM znetworking_mediacategories");

while ($crow = mysql_fetch_array($cquery)) {
$crowc = $crow['name'];
$crowid = $crow['id'];

echo "<h3>$crowc</h3><table border='0'>";
?>
<tr id="dltb"><td>Filename</td><td>Filesize (MB)</td><td>Filetype</td><td>Download Now</td></tr>
<?php
$query = mysql_query("SELECT * FROM znetworking_media WHERE catid = '$crowid' ORDER BY RAND()");
$i = 0;
while ($row = mysql_fetch_array($query)) {

if ($row['catid']==$crow['id']) {

$id = $row['id'];
$check = $i % 2;

if ($check=="1") {
?>
<tr id="dl1">
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['filesize']; ?>MB</td>
<td><?php echo $row['filetype']; ?></td>
<td><a href="http://z-networking.org/media/<?php echo $row['url']; ?>"><img src="images/media.png" alt="Download" border="0" /></a></td>
</tr>
<?php
}
else {
?>
<tr id="dl2">
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['filesize']; ?>MB</td>
<td><?php echo $row['filetype']; ?></td>
<td><a href="http://z-networking.org/media/<?php echo $row['url']; ?>"><img src="images/media.png" alt="Download" border="0" /></a></td>
</tr>
<?php
}
}
$i++;
}
?>
<tr id="dltb">
<td>Filename</td>
<td>Filesize (MB)</td>
<td>Filetype</td>
<td>Download Now</td>
</tr>
</table>
<?php
}
?>

</table>