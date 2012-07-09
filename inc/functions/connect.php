<?php


$con=mysqli_connect('127.0.0.1', 'zackraue_zack', 'REDACTED', 'zackraue_dev');

if (!$con) {
    die('Connect Error (' . mysql_connect_errno() . ') '
            . mysql_connect_error());
}

session_start();

?>