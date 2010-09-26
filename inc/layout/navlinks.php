<a href="index.php?page=Home">Home</a>
<a href="index.php?page=Contact">Contact</a>
<a href="index.php?page=Departments">Departments</a>
<a href="index.php?page=Staff">Staff</a>
<a href="index.php?page=Media">Media</a>
<a href="index.php?page=Forum">Forum</a>
<a href="index.php?page=Members">Members</a>
<?php
if ($LC==FALSE) {
?>
<a href="index.php?page=Login">Login</a>
<a href="index.php?page=Register">Register</a>
<?php
}
else {
$gpmid = $_GET['pmid'];
if ($gpmid) {
mysql_query("UPDATE znetworking_pm SET status = 1 WHERE id = '$gpmid'");
}
$pmquery = mysql_query("SELECT * FROM znetworking_pm WHERE recipient = '$masqlid' AND status = 0");
echo mysql_error();
$pmrow = mysql_num_rows($pmquery);

?>
<a href="index.php?page=Profile">Profile</a>
<a href="index.php?page=Blog">My Blog</a>
<a href="index.php?page=Account">Account (<?php echo $pmrow; ?>)</a>
<?php
}
if ($admin) {
?>
<a href="index.php?page=Admin">Administration</a>
<?php
}
?>