<?php
session_start();
$user_id=$_SESSION["user_id"];
$user_other=$_SESSION["user_other"];

$id_mess=0;

if (isset($_POST["id_mess"])){

if (is_numeric($_POST["id_mess"])){

$id_mess=$_POST["id_mess"];
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

$strsql1="delete from messages_users where user=".$user_id." and id_message=".$id_mess." and user_other=".$user_other;
mysql_query($strsql1);
$strsql="SELECT  id_message";
$strsql=$strsql." FROM messages_users";
$strsql=$strsql." where user=".$user_id." and user_other=".$user_other." order by time_message DESC  LIMIT 0,1";
//echo($strsql);
$result=mysql_query($strsql);

while($b_row=mysql_fetch_array($result)) {
	
$new_id_mess=$b_row["id_message"];
	
}
	
$strsql="update dialog set  last_mess=".$new_id_mess." where user=".$user_id."  and user_other=".$user_other;
mysql_query($strsql);
//echo($strsql1);
//echo($strsql2);


}

mysql_close($a);
?>