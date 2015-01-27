<html>

<head><title>ИнтерЦУМ</title>
<meta charset="utf-8">
</head>
<body>
<?php

$host="localhost";
$user="root";

$pass="";


$a=mysql_connect($host,$user,$pass);

if (!$a) {

echo("Нет соединения с базой данных");

}

else {


$user_id=0;
$text_mess="";

$title_message="";

if(isset($_POST["adres_m"])){

if (is_numeric($_POST["adres_m"])){
$user_id=$_POST["adres_m"];

}
}


if(isset($_POST["text_mess"])){

if ($_POST["text_mess"]<>""){
$text_mess=$_POST["text_mess"];

}
}

if(isset($_POST["title_message"])){

if ($_POST["title_message"]<>""){
$title_message=$_POST["title_message"];

}
}

if ($user_id!=0 && $text_mess!="" && $title_message!=""){
$user_from=1; //衬殨󺋊
mysql_select_db("intercum08");
$strsql="insert into messages1(text_message,title_message,user_from,user_to,time_write,time_read,status) values('".$text_mess."','".$title_message."',".$user_from.",".$user_id.",now(),now(),0)";
//echo($strsql);
mysql_query($strsql);

}
?>

<form action="mess_new.php" method="POST" name=form1>

Введите адрес<input type="text" name="adres_m"><br><br>

Введите тему сообщения<input type="text" name="title_message"><br><br>

Введите текст сообщения<textarea name="text_mess"></textarea>

<input type="submit" value="Отправить">

</form>


</body>
</html>

<?


}


?>