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
}
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
  Здравствуйте,<b><?=$user_name ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="m2.php?f=0""  >Диалоги</a>



<?	



?>
 </table> 
<form >
<table border="0" width="50%">
<tr><td width="5%"></td>
<td><input type="text" id="user_other" value="Введите имя"></td>
<td width="5%"></td>
</tr>


<tr>
<td width="5%"></td>
<td><textarea style="width:100%; height:100px;" id="new_text"></textarea></td>
<td width="5%"></td>
</tr><tr><td ></td ><td ><input type="button" id="btn_fr" value="Отправить"></td><td ></td ></tr></table>
</form>
 </div><div id="foot1" align=center style="background-color:#07B8E4" ><p >&copy; ИнтерЦУМ</p></div></div></div>
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

var user_other="";
user_other=$("#user_other").val();

//alert(mytext);
//закончить
$.ajax({

  type: 'POST',

  url: 'add_mess_new.php',

  data: "mytext="+mytext+"&user_other="+user_other,

   data_type:"text",  
                    success: function(text){

   app1=text;
  // alert(app1);
  location.href="m2.php";
$("#new_text").val()=app1;
  }

});




})

});

</script>
</html>