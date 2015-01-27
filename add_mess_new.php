<?php
session_start();
$user_id=$_SESSION["user_id"];
$user_other=0;
//$user_other=$_SESSION["user_other"];

$my_text="";

if (isset($_POST["mytext"])){


$my_text=addslashes($_POST["mytext"]);
}


if (isset($_POST["user_other"])){

if (is_numeric($_POST["user_other"])){
$user_other=addslashes($_POST["user_other"]);
}
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

$cut=substr($my_text,0,50);
$strsql="insert into messages_time (text_message,text_small,time_message) values('".$my_text."','".$cut."',now())";
mysql_query($strsql);
//echo($strsql);

$id_message=mysql_insert_id();
$strsql_a="insert into admin_messages_time (id_message,text_message,text_small,time_message) values(".$id_message.",'".$my_text."','".$cut."',now())";
//echo("wer".$id_message);
mysql_query($strsql_a);
$strsql1="insert into messages_users (user,id_message,user_other,message_from,status,time_message) values (".$user_id.",".$id_message.",".$user_other.",0,0,now()".") ";
$strsql1_a="insert into admin_messages_users (user,id_message,user_other,message_from,status,time_message) values (".$user_id.",".$id_message.",".$user_other.",0,0,now()".") ";
$strsql2="insert into messages_users (user,id_message,user_other,message_from,status,time_message) values (".$user_other.",".$id_message.",".$user_id.",1,0,now()".")"; 
$strsql2_a="insert into admin_messages_users (user,id_message,user_other,message_from,status,time_message) values (".$user_other.",".$id_message.",".$user_id.",1,0,now()".")"; 
}
//echo($strsql1);
//echo($strsql2);

mysql_query($strsql1);
mysql_query($strsql2);
mysql_query($strsql1_a);
mysql_query($strsql2_a);

$strsql12="select * from dialog where user=".$user_id." and user_other=".$user_other;
$strsql22="select * from dialog where user=".$user_other." and user_other=".$user_id;

$result12=mysql_query($strsql12);
$result22=mysql_query($strsql22);


$mysql_num_r12=mysql_num_rows($result12);
$mysql_num_r22=mysql_num_rows($result22);






if ($mysql_num_r12>0) {
$strsql3="update dialog set message_from=0, last_mess=".$id_message.", last_time=now() where user=".$user_id." and user_other=".$user_other;
$strsql3_a="update admin_dialog set message_from=0, last_mess=".$id_message.", last_time=now() where user=".$user_id." and user_other=".$user_other;
}
else {
$strsql3="insert into dialog(message_from,last_mess,last_time,user,user_other) values(0,".$id_message.",now(),".$user_id.",".$user_other.")";
$strsql3_a="insert into admin_dialog(message_from,last_mess,last_time,user,user_other) values(0,".$id_message.",now(),".$user_id.",".$user_other.")";	
}
if ($mysql_num_r22>0) {	
$strsql4="update dialog set message_from=1, last_mess=".$id_message.", last_time=now() where user=".$user_other." and user_other=".$user_id;
$strsql4_a="update admin_dialog set message_from=1, last_mess=".$id_message.", last_time=now() where user=".$user_other." and user_other=".$user_id;
}

else {
$strsql4="insert into dialog(message_from,last_mess,last_time,user,user_other) values(1,".$id_message.",now(),".$user_other.",".$user_id.")";	
$strsql4_a="insert into admin_dialog(message_from,last_mess,last_time,user,user_other) values(1,".$id_message.",now(),".$user_other.",".$user_id.")";	
}
mysql_query($strsql3);
mysql_query($strsql4);
mysql_query($strsql3_a);
mysql_query($strsql4_a);
mysql_close($a);
?>