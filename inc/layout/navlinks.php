<ul id="mainNav">
<li><a href="index.php?page=Home">Home</a></li>
<li><a href="index.php?page=Contact">Contact</a></li>
<li><a href="index.php?page=Departments">Departments</a></li>
<li><a href="index.php?page=Staff">Staff</a></li>
<li><a href="index.php?page=Media">Media</a></li>
<li><a href="index.php?page=Forum">Forum</a></li>
<li><a href="index.php?page=Members">Members</a></li>
<?php
if ($LC==FALSE) {
?>
<li><a href="index.php?page=Login">Login</a></li>
<li><a href="index.php?page=Register">Register</a></li>
<?php
}
else {
$gpmid = $_GET['pmid'];
if ($gpmid) {
mysqli_query($con, "UPDATE znetworking_pm SET status = 1 WHERE id = '$gpmid'");
}
$pmquery = mysqli_query($con, "SELECT * FROM znetworking_pm WHERE recipient = '$masqlid' AND status = 0");
echo mysql_error();
$pmrow = mysqli_num_rows($pmquery);

?>
<li><a href="index.php?page=Profile">Profile</a></li>
<li><a href="index.php?page=Blog">My Blog</a></li>
<li><a href="index.php?page=Account">Account (<?php echo $pmrow; ?>)</a></li>
<?php
}
if ($admin) {
?>
<li><a href="index.php?page=Admin">Administration</a></li>
<?php
}
?>
</ul>