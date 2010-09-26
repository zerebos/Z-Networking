<?php
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$message = $_REQUEST['message'];
$add = $_REQUEST['add'];
$num1 = $_REQUEST['num1'];
$num2 = $_REQUEST['num2'];

$sum = $num1 + $num2;
include("connect.php");
if ($add==$sum) {
if ($name && $email && $message) {
$query = mysql_query("INSERT INTO znetworking_contact (email, name, message) VALUES ('$email', '$name', '$message')");
echo "success";
}
}
else {
echo "please do math...";
}
?>