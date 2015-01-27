<?php
session_start();
header("Content-type: text/html; charset=utf-8");

if (isset($_SESSION["user_id"])) {
$user_id=$_SESSION["user_id"];// Сюда необходимо поместить текущего пользователя сессии!!!!!!!!!!!!!
$user_name=$_SESSION["user_name"];
$user_other=0;
}

else {
echo("14");die();	
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
	
	


if (isset($_SESSION["user_other"])){

$user_other=$_SESSION["user_other"];

}
$lim=1;
if (isset($_REQUEST["lim"])){
if(is_numeric($_REQUEST["lim"])){

$lim=$_REQUEST["lim"];
$_SESSION["lim"]=$lim;
}
}
$count_rec=$lim*6;

$strsql="SELECT  messages_time.id_message, text_message, user, user_other, message_from, messages_time.time_message, login";
$strsql=$strsql." FROM messages_users";
$strsql=$strsql." INNER JOIN messages_time ON messages_users.id_message = messages_time.id_message";
$strsql=$strsql." INNER JOIN users ON user_other = id";
$strsql=$strsql." where user=".$user_id." and user_other=".$user_other;
$strsql_n_r=$strsql;
$strsql=$strsql." order by time_message DESC  LIMIT 0,".$count_rec."";
//echo($strsql);
$result=mysql_query($strsql);
$result_n_r=mysql_query($strsql_n_r);

$n_r=mysql_num_rows($result_n_r);



$lim1=$lim+1;
$s_all="";
$s="";
$i=0;
while($b=mysql_fetch_array($result)){
if ($i==0){
 if($n_r>$count_rec) {
   echo("<div id='other_mess'>Показать еще...<input type='hidden' disabled  id='limit_mess' value=".$lim1."></div>");
  }

}

$i++;
$s="<div class='dialogs_m1'  id='".$b["id_message"]."' >";
$s=$s."<font   size=3 class='del_dial' id='del".$b["id_message"]."' >&times;&nbsp;</font><table border=0 width=100% height=80%><tr>";

if ($b["message_from"]==1){
$s=$s."<td width=5% rowspan=2><img src='1.jpg' alt='Нет' width=30 height=30 ></td>";
$s=$s."<td width=20%><a href=''>".$b["login"]."</a></td>";
}

else {
if ($b["message_from"]==0){
$s=$s."<td width=5% rowspan=2><img src='1.jpg' alt='Я' width=30 height=30 ></td>";
$s=$s."<td width=20%><a href=''>".$user_name."</a></td>";
}
}
$s=$s."<td width=40% rowspan=2>".$b["text_message"]."</td></tr>";

$s=$s."</tr><td ><font size=1>".$b["time_message"]."</font></td>";
$s=$s."</tr></table>";
$s=$s."</div>";

$s_all=$s.$s_all;
}

echo($s_all);


}
mysql_close($a);
?>

