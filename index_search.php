 <?php
	$host="localhost";
	$user="root";
	$password="";
	$db="intercum08";
	$a=mysql_connect($host, $user, $password) or die("MySQL сервер недоступен!".mysql_error());
	mysql_select_db($db) or die("Нет соединения с БД".mysql_error());
$color_v="";
$size_v="";
$complect_v="";
$price_v="";
if (isset($_REQUEST['isk2']) and $_REQUEST['isk2']<>"") {
$isk2_v=$_REQUEST['isk2'];
$result=mysql_query("
						select * from goods where description like '%$isk2_v%'
						union all
						select * from goods where name like '%$isk2_v%'
					") or die (mysql_error());
				while ($row = mysql_fetch_assoc($result))
				{
				  echo $row['name']." ".$row['description']." ".$row['color']." ".$row['complect']." ".$row['price']." "."<br />";
				}
}
else {
echo("Введите что-нибудь!");
die();
}
$a.close;
?>