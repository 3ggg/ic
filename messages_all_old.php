<?php
session_start();
header("Content-type: text/html; charset=utf-8");

?>
<html>
<?php
if (isset($_SESSION["user_id"])) {
$user_id=$_SESSION["user_id"];// Сюда необходимо поместить текущего пользователя сессии!!!!!!!!!!!!!
$user_name=$_SESSION["user_name"];
$user_other=0;
}

else {
die();	
	
}
?>

 <head>

 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <title>ИнтерЦУМ</title>
  <meta charset="utf-8"> 
  <link rel="icon" href="favicon.ico" type="image/x-icon">
 <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
 <link href="favicon.ico" rel="shortcut icon" type="image/x-icon">
<link href="dialogs.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="jquery.js"></script>
  <style>

.a1:hover{
color:pink;

}

  </style>
</head>
 
  
  <?php

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
	
?>

<body>
  <div id="header">
 <img src="log11.png" alt="ИнтерЦУМ" width="100" height="75" hspace="10" vspace="10" align="middle"> Здравствуйте,<b><?=$user_name ?></b>&nbsp;&nbsp;&nbsp;&nbsp;<a href="new_messages.php" target="_blank" >Написать письмо</a>&nbsp;&nbsp;&nbsp;&nbsp; <a href="m2.php?f=0""  >Диалоги</a>



<?	

if (isset($_REQUEST["user_other"])){
if(is_numeric($_REQUEST["user_other"])){

$user_other=$_REQUEST["user_other"];
$_SESSION["user_other"]=$user_other;
}
}
	
$strsql="SELECT  messages_time.id_message, text_message, user, user_other, message_from, messages_time.time_message, login";
$strsql=$strsql." FROM messages_users";
$strsql=$strsql." INNER JOIN messages_time ON messages_users.id_message = messages_time.id_message";
$strsql=$strsql." INNER JOIN users ON user_other = id";
$strsql=$strsql." where user=".$user_id." and user_other=".$user_other." order by time_message DESC  LIMIT 0,8";
//echo($strsql);
$result=mysql_query($strsql);




$s_all="";
$s="";
$i=0;
while($b=mysql_fetch_array($result)){
if ($i==0){

echo("&nbsp;Ваш диалог с <b>".$b["login"]."</b>");
echo("</div>");
 echo("<div id='sidebar'>");


echo("</div>");
  echo("<div id='content'>");
   echo("<h2></h2>");

echo("<div id='all_mess'>");
}

$i++;
$s="<div class='dialogs_m'  id='".$b["id_message"]."' >";
$s=$s."<font   size=3 class='del_dial' id='del".$b["id_message"]."' >&times;&nbsp;</font><table border=0 width=100% height=80%><tr>";

if ($b["message_from"]==1){
$s=$s."<td width=5% rowspan=2><img src='1.jpg' alt='Нет' width=40 height=40 ></td>";
$s=$s."<td width=20%><a href=''>".$b["login"]."</a></td>";
}

else {
if ($b["message_from"]==0){
$s=$s."<td width=5% rowspan=2><img src='1.jpg' alt='Я' width=40 height=40 ></td>";
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
echo("</div>");

}
mysql_close($a);
?>
 </table> 
<form >
<table border="0" width="50%" style="margin: 0 25% 0 25%;"><tr>
<td width="5%"><img src='1.jpg' alt='Я' width="60" height="60" ></td>
<td><textarea style="width:100%; height:100px;" id="new_text"></textarea></td>
<td width="5%"><img src='1.jpg' alt='Нет' width="60" height="60" ></td>
</tr><tr><td ></td ><td ><input type="button" id="btn_fr" value="Отправить"></td><td ></td ></tr></table>
</form>
 </div>
 </body>
<script>
$(document).ready(function(){

$(".dialogs_m").mouseover(function (){

var id=this.id;
 $("#"+id).css("background-color","#B5B5DB"); 

});
$(".dialogs_m").mouseout(function (){

var id=this.id;
 $("#"+id).css("background-color","white"); 

});

$("#btn_fr").click(function(){

var mytext="";
mytext=$("#new_text").val();
//alert(mytext);
//закончить
//if (mytext.length!=0){

//alert(1111);
$.ajax({

  type: 'POST',

  url: 'add_mess.php',

  data: "mytext="+mytext,

   data_type:"text",  
                    success: function(text){

   app1=text;
   //alert(app1);
//$("#new_text").val()=app1;
location.reload();
  }

});

//};


});



$(".del_dial").click(function(){

var cc=confirm("Вы действительно хотите удалить сообщение?")

if(cc==false){
return 0;
}

else{

var clickid=this.id;



id_mess=clickid.substr(3,clickid.length);


$.ajax({

  type: 'POST',

  url: 'del_mess.php',

  data: "id_mess="+id_mess,

   data_type:"text",  
                    success: function(text){

   app1=text;
   //alert(app1);

location.reload();
  }

});


}

return false;


});












});

</script>
</html>