<ul>
<?php
$query = mysql_query("SELECT * FROM znetworking_members ORDER BY user");
while ($row = mysql_fetch_array($query)) {
?>
<li><a href="index.php?page=Profile&id=<?php echo $row['id']; ?>"><?php echo $row['user']; ?></a>
<?php
if ($admin=="1")
{
$rod = $row['id'];
echo " - ";
echo "<a href='index.php?page=Account&adminedit=true&id=$rod'>Account</a>";
echo "  |  <a href='index.php?page=Blog&id=$rod'>Blog</a>";
}
?>
</li>
<?php
}
?>
</ul>