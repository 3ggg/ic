<?php
	
	$host="localhost";
	$user="root";
	$password="";
	$db="intercum08";
	$a=mysql_connect($host, $user, $password) or die("MySQL сервер недоступен!".mysql_error());
	mysql_select_db($db) or die("Нет соединения с БД".mysql_error());

	
$user_name_v="";
$pwd1_v="";
$pwd2_v="";
$text_k_v="";

if (isset($_REQUEST["user_name"])) {

if ($_REQUEST["user_name"]<>""){

$user_name_v=$_REQUEST["user_name"];
$text_k_v=$_REQUEST["text_k"];

}
else {

echo("Зайдите еще раз");
die();

}

}

if (isset($_REQUEST["pwd1"])) {

if ($_REQUEST["pwd1"]<>""){

$pwd1_v=$_REQUEST["pwd1"];

}
else {

echo("Зайдите еще раз");
die();

}

}

if (isset($_REQUEST["pwd2"])) {

if ($_REQUEST["pwd2"]<>""){

$pwd2_v=$_REQUEST["pwd2"];

}
else {

echo("Зайдите еще раз");
die();

}

}

if ($pwd1<>$pwd2){

echo("Пароли не совпадают");

die;

}

else {

// if($text_k_v='123456'){
$strsql="select * from users where login='".$user_name_v."'";

$result = mysql_query($strsql);
$num_rows=0;

$num_rows=mysql_num_rows($result);

if ($num_rows>0) {

echo("Пользователь с логином <b>".$user_name_v."</b> уже существует!");
die();
}
// }

else {

mysql_query ("INSERT INTO users (login, password, registered, lastlogin) VALUES ('$user_name_v', '".md5($pwd1_v)."', now(), now())");


echo "Успешная регистрация!<br> Логин: <b>".$user_name_v."</b>";

}

}

$a.close;

?>