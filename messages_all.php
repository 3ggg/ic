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
   <title>Единая торговая площадка ИнтерЦУМ</title>
  <meta charset="utf-8"> 
  <link rel="icon" href="favicon.ico" type="image/x-icon">
 <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
 <link href="favicon.ico" rel="shortcut icon" type="image/x-icon">
<link href="dialogs.css" rel="stylesheet" type="text/css">
<link href="boilerplate.css" rel="stylesheet" type="text/css">
<link href="inter.css" rel="stylesheet" type="text/css">
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
<div class="gridContainer clearfix" >
  <div id="LayoutDiv1" style="border: 1px solid 
	#07B8E4;" >
<div id="header1" align="center" border="1" >
    <br>
      <table width="91%" height="93" border="0">
        <tr>
          <td width="16%" height="89" align="right">&nbsp;</td>
          <td width="17%" align="center"><a href="index.html" style="border:0px;"><img src="лог_лог_11.png" alt="логотип"></a></td>
          <td width="40%" align="center"><div style="font-size: 10px; color: #DF0070; letter-spacing: 5px;" align="center"> ЕДИНАЯ ТОРГОВАЯ ПЛОЩАДКА</div>
          <div align="center" style="font-size: 50px; color:#07B8E4;"><b>ИнтерЦУМ</b></div></td>
          <td width="27%" valign="bottom"><table width="98%"  border="0">
            <tr>
              <td height="20" colspan="2" align="right">&nbsp;</td>
            </tr>
            <tr>
              <td height="19" align="right" style="font-size: 12px; color:#07B8E4;">тел.:</td>
              <td align="left" style="font-size: 12px; color:#07B8E4;"><b>8(3519)47-40-17<b></td>
            </tr>
            <tr>
              <td height="19" align="right" style="font-size: 12px; color:#07B8E4;">e-mail:</td>
              <td align="left" style="font-size: 12px; color:#07B8E4;"><a href="mailto:intecum@mail.ru" style="font-size: 12px; color:#07B8E4;letter-spacing: 1px;"> <b>intercum@mail.ru</b></a></td>
            </tr>
          </table>
         </td>
        </tr>
      </table>
      <br>
     <hr width="100%" align=center>
    </div>
  <div id="header">
  Здравствуйте,<b><?=$user_name ?></b>&nbsp;&nbsp;&nbsp;&nbsp;<a href="new_messages.php"  >Написать письмо</a>&nbsp;&nbsp;&nbsp;&nbsp; <a href="m2.php?f=0""  >Диалоги</a>



<?	

if (isset($_REQUEST["user_other"])){
if(is_numeric($_REQUEST["user_other"])){

$user_other=$_REQUEST["user_other"];
$_SESSION["user_other"]=$user_other;
}
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



$s_all="";
$s="";
$i=0;
$count_div_pust=0;
while($b=mysql_fetch_array($result)){
if ($i==0){

echo("&nbsp;Ваш диалог с <b>".$b["login"]."</b>");
echo("</div>");
 
  echo("<div id='content1'>");
  
  if($n_r>6) {
   echo("<div id='other_mess'>Показать еще...<input type='hidden' disabled  id='limit_mess' value=2></div>");
  }
  
  if($n_r<6){
	$count_div_pust=6-$n_r;
	
	for ($j=0;$j<$count_div_pust;$j++) {
	
echo("<div class='pust'></div>");	
		
	} 
	  
  }

}

$i++;
$s="<div class='dialogs_m1'  id='".$b["id_message"]."' >";
$s=$s."<font   size=3 class='del_dial' id='del".$b["id_message"]."' >&times;&nbsp;</font><table border=0 width=100% height=80%><tr>";

if ($b["message_from"]==1){
$s=$s."<td width=5% rowspan=2><img src='i.jpg' alt='Нет' width=30 height=30 ></td>";
$s=$s."<td width=20%><a href=''>".$b["login"]."</a></td>";
}

else {
if ($b["message_from"]==0){
$s=$s."<td width=5% rowspan=2><img src='i.jpg' alt='Я' width=30 height=30 ></td>";
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
 </div> 
<form >
<table border="0" width="50%" style="margin: 0 25% 0 25%;"><tr>
<td width="5%"><img src='i.jpg' alt='Я' width="60" height="60" ></td>
<td><textarea style="width:100%; height:100px;" id="new_text"></textarea></td>
<td width="5%"><img src='i.jpg' alt='Нет' width="60" height="60" ></td>
</tr><tr><td ></td ><td ><input type="button" id="btn_fr" value="Отправить"></td><td ></td ></tr></table>
</form>
 <div id="foot1" align=center style="background-color:#07B8E4" ><p >&copy; ИнтерЦУМ</p></div></div> </div> 
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
//document.location.href 
});

//};


});



$(".del_dial").live("click",function(){

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
var a=document.getElementById(id_mess);
var b=a.parentNode;
var count_m=$("div.dialogs_m1").length;
//alert(count_m);
a.parentNode.removeChild(a);
if (count_m<=6){
$("#content1").prepend($("<div class='pust'></div>"));
}
//location.reload();
  }

});


}

return false;


});




$("#other_mess").live("click",function(){


//alert(1);

var a=$("#limit_mess").val();
//alert(a);
$.ajax({

  type: 'POST',

  url: 'messages_all_load_8.php',

  data: "lim="+a,

   data_type:"text",  
                    success: function(text){

   app1=text;
 
$("#content1").empty();
$("#content1").append($(app1));

  }

});




});







});

</script>
</html>