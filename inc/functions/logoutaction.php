<?php
session_start();
session_unset();
session_destroy();
setcookie("user", "", time()-(60*60*24*14));
unset($_COOKIE['user']);
?>