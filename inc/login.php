<?php
if ($LC==TRUE) {
echo "You are logged in to Z-Networking. As a user you can comment on news posts and have your own profile, so get to it $user!";
}
else {
echo "<form method='post' action=''>";
echo "Username: <input type='text' name='username' /><br />";
echo "Password: <input type='password' name='password' /><br />";
echo "Remember Me: <input type='checkbox' name='rem'><br />";
echo "<input type='submit' value='login'>";
echo "</form>";
echo "<a href='index.php?page=Register'>Register?</a>";
}
?>