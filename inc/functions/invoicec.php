<?php
$email = $_REQUEST['email'];
$message = $_REQUEST['message'];
$n = $_REQUEST['n'];
$from = $_REQUEST['dmail'];
$subject = $_REQUEST['sub'];
$k = 0;


if ($n && $email && $from && $message && $subject){

while ($k != $n) {
$kb = $k + 1;
$headers = "From: $from";
$mailit = mail($email,$subject,$message,$headers);
if ($mailit) {
echo "success";
echo $kb;
echo "<br />";
}
else {
echo "failure";
echo $kb;
echo "<br />";
}
$k++;
}
}
?>