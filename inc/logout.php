<?php
echo "Successfully logged out. You may log in again below.";
echo "<form method='post' action='index.php?page=Login'>";
echo "Username: <input type='text' name='username' /><br />";
echo "Password: <input type='password' name='password' /><br />";
echo "Remember Me: <input type='checkbox' name='rem'><br />";
echo "<input type='submit' value='login'>";
echo "</form>";
echo "<a href='index.php?page=Register'>Register?</a>";
?>