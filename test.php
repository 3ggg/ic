<?php

// mysql_set_charset("utf8");

// print('
// <html>
// <head>
// <title>City test</title>
// <meta http-equiv="content-type" content="text/html; charset=utf-8" />
// <meta charset="utf-8" />
// </head>
// <body>
// ');

// header('Content-type: text/html; charset=utf8');
// $get = $_GET['pages'];
mysql_connect("localhost", "root", "") or
die("Could not connect: " . mysql_error());

mysql_select_db("intercum");

$result = mysql_query("SELECT name FROM test WHERE id=1") or die (mysql_error());
 
$row = mysql_fetch_array($result);

// foreach ($row as $v1) {
		// print_r(utf8_encode($v1));
    // }

 print($row[0]);

 // echo iconv("UTF-8", "WINDOWS-1251", $row[0]), PHP_EOL;

// print_r('
// </body>
// </html>
// ');

?>