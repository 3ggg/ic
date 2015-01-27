<?php
session_start();
$user_id=$_SESSION["user_id"];


$id_mess=0;

if (isset($_POST["user_other"])){

if (is_numeric($_POST["user_other"])){

$user_other=$_POST["user_other"];
}

else die();
}
$host="localhost";
$user="root";

$pass="";


$a=mysql_connect($host,$user,$pass);

if (!$a) {

echo("Нет подключения к базе”");

}

else {

	
mysql_select_db("intercum08");

mysql_query("SET NAMES utf8");




//echo("wer".$id_message);

$strsql1="delete from messages_users where user=".$user_id." and user_other=".$user_other;
$strsql2="delete from dialog where user=".$user_id." and user_other=".$user_other;

//echo($strsql1);
//echo($strsql2);
mysql_query($strsql1);
mysql_query($strsql2);
}

mysql_close($a);
?>