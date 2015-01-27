<?php
session_start();

mysql_connect("localhost", "root", "") or
die("Could not connect: " . mysql_error());
mysql_select_db("intercum08");

?>