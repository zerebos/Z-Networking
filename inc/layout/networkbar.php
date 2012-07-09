<div id="networkbar">
<div id="networkBarContainer">
<a href="http://z-networking.org/"><img src="images/network.png" alt="ZNetworking" id="networkLogo" /></a><a href="index.php?page=Computers">Computers</a>  |  <a href="index.php?page=Gaming">Gaming</a>  |  <a href="index.php?page=Web Services">Web Services</a>  |  <a href="index.php?page=Graphic Design">Graphic Design</a>
<span id="networkbarlogin">
<?php
if ($LC==TRUE) {
if (isset($_SESSION['member']) || isset($_COOKIE['user'])) {
echo "You are logged in as $user  |  <a href='index.php?page=Profile'>Profile</a>  |  <a href='index.php?page=Blog'>My Blog</a>  |  <a href='index.php?page=Account'>Account</a>  |  <a href='index.php?page=Logout'>Logout</a>";
}
if (isset($_SESSION['user'])) {
echo "You are logged in as $user  |  <a href='index.php?page=Admin'>Admin</a>  |  <a href='index.php?page=Logout'>Logout</a>";
}
}
else {
echo "<form method='post' action='index.php?page=Login'>";
echo "User: <input type='text' name='username' /> ";
echo "Pass: <input type='password' name='password' /> ";
echo "Remember Me: <input type='checkbox' name='rem'> ";
echo "<input type='submit' value='login' />";
echo " <a href='index.php?page=Register'>Register?</a> ";
echo "</form>";
}
?>
</span>
</div>
</div>