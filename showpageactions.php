<?php
echo "<h1>$page</h1>";
$squery = mysqli_query($con,"SELECT * FROM znetworking_sitecontent WHERE page = '$page'");
$validquery = mysqli_num_rows($squery);

if ($validquery < 1) {
$page2 = strtolower($page);
if (file_exists("inc/$page2.php")) {
include("inc/$page2.php");
}
else {
include("inc/404.php");
}
}
else { 
$row = mysqli_fetch_array($squery);
echo $row['content'];
}
?>