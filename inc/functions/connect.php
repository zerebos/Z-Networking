<?php

$con = mysql_connect("localhost","zack_zack","REDACTED");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("zack_sites", $con);
session_start();
?>