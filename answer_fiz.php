<?PHP
// первый символ имени пользователя ^[a-zA-Z][a-zA-Z0-9]*$

	$host="localhost";
	$user="root";
	$password="";
	$db="intercum08";
	$a=@mysql_connect($host, $user, $password) or die("MySQL сервер недоступен!".mysql_error());
	mysql_select_db($db) or die("Нет соединения с БД".mysql_error());

$user_name_v="";

$pwd1_v="";
$pwd2_v="";

$name_user="";
$city="";
$el_p="";
$tel="";
if(isset($_REQUEST["name_user"])){

$name_user=trim(addslashes(htmlspecialchars(strip_tags($_REQUEST["name_user"]))));

}

if(isset($_REQUEST["city"])){

$city=trim(addslashes(htmlspecialchars(strip_tags($_REQUEST["city"]))));

}

if(isset($_REQUEST["tel"])){

if (preg_match("/^[0-9]*$/",$tel)){
$tel=$_REQUEST["tel"];
}
else{
echo("Телефон введен некорректно");
die();

}

}

if(isset($_REQUEST["el_p"])){

$el_p=trim($_REQUEST["el_p"]);
if (preg_match("/^[A-Za-z0-9]+(\.\w+)*@([A-Za-z0-9]+\w*)((\.[A-Za-z0-9]+\w*))*\.([A-Za-z0-9]){2,6}$/",$el_p)){
}
else{
echo("Адрес почты введен некорректно");
die();

}

}

if (isset($_REQUEST["user_name"])) {

if ($_REQUEST["user_name"]<>""){

$user_name_v=$_REQUEST["user_name"];
if (preg_match("/^[a-zA-Z][a-zA-Z0-9-_]*$/",$user_name_v)){

}
else {
echo("Имя пользователя должно начинаться с латинской буквы");
die();
}
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

if ($pwd1_v<>$pwd2_v){

echo("Пароли не совпадают");

die;

}

else {

if (strlen($pwd1_v)<6) {

echo("Пароль должен быть 6 символов и более");

die;

}
else {

$strreg="/^[a-zA-Z0-9]+$/";

if (!(preg_match("/[a-zA-Z]+/", $pwd1_v))|| !(preg_match("/[0-9]+/", $pwd1_v))|| !(preg_match($strreg, $pwd1_v))){

echo("Пароль должен содержать буквы и цифры");
die;
}
else{
$strsql="select * from users where login='".$user_name_v."'";

$result = mysql_query($strsql);
$num_rows=0;

$num_rows=mysql_num_rows($result);

if ($num_rows>0) {

echo("Пользователь с таким именем уже существует");
die();

}

else {

@mysql_query ("INSERT INTO reg_fiz (login, password, date_reg,last_visited,user_name,town,el_address,tel) VALUES ('$user_name_v', '".md5($pwd1_v)."',now(),now(),'".$name_user."','".$city."','".$el_p."','".$tel."')");

echo("Успешная авторизация");

}

}
}

}

//$result = mysql_query("SELECT * FROM sotrudniki",$db);

$a.close;

?>