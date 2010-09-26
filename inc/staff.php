<ul>
<?php
$query = mysql_query("SELECT * FROM znetworking_members WHERE perms = '1' ORDER BY id ASC");
while ($row = mysql_fetch_array($query)) {
?>
<li><?php echo $row['first']; ?> - <a href="index.php?page=Profile&id=<?php echo $row['id']; ?>"><?php echo $row['user']; ?></a></li>
<?php
}
?>
</ul>