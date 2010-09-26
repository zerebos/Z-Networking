<?php
if(isset($_SESSION['user']) || $admin=="1") 
    {
        // Identifying the user 
if (isset($_GET['action'])) {
$action = $_GET['action'];
if (file_exists("admin/$action.php")){
include("admin/$action.php");
}
else {
echo "Sorry this has not yet been setup";
}
include("admin/footer.php");
}
else {
include("admin/menu.php");
}
}
else {
echo "<form method='post' action='index.php?page=Login'>";
echo "Username: <input type='text' name='username' /><br />";
echo "Password: <input type='password' name='password' /><br />";
echo "<input type='submit' value='login'>";
echo "</form>";
}
?>