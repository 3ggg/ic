<?php
session_start();
header("Content-type: text/html; charset=utf-8");
?>
<html>
<?php

$user_id=1;// Сюда необходимо поместить текущего пользователя сессии!!!!!!!!!!!!!
$user_name="manager1";
$_SESSION["user_id"]=$user_id;
$_SESSION["user_name"]=$user_name;
?>

 <head>

 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <title>Единая торговая площадка ИнтерЦУМ</title>
  <meta charset="utf-8"> 
  <link rel="icon" href="favicon.ico" type="image/x-icon">
 <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
 <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
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
  Здравствуйте,<b><?=$user_name ?></b>&nbsp;&nbsp;&nbsp;&nbsp;<a href="new_messages.php"  >Написать письмо</a>&nbsp;&nbsp;&nbsp;&nbsp; <a href=m2.php?f=0"  >Проверить</a></div>
 <div id="sidebar">


</div>
  <div id="content">
   <h2></h2>




<?	
	
$strsql="SELECT user, user_other, last_mess, last_time, id, login,message_from,text_small FROM dialog INNER JOIN users ON user_other = id inner join messages_time on last_mess=id_message";
$strsql=$strsql." where user=".$user_id." order by last_time DESC";
$result=mysql_query($strsql);



$num_rows_all_otpr=mysql_num_rows($result);

echo("<div id='all_mess'>");
while($b=mysql_fetch_array($result)){

echo("<div class='dialogs_m'  id='".$b["user_other"]."' onClick=\"window.location.href='messages_all.php?user_other=".$b["user_other"]."'\">");
echo("<font   size=3 class='del_dial' id='del".$b["user_other"]."'>&times;&nbsp;</font><table border=0 width=100% height=80%><tr>");
echo("<td width=5% rowspan=2><img src='i.jpg' alt='Нет' width=40 height=40 ></td>");
echo("<td width=20%><a href=''>".$b["login"]."</a></td>");
if ($b["message_from"]==1){
echo("<td width=40% rowspan=2><a class='a1' href='messages_all.php?user_other=".$b["user_other"]."'>".$b["text_small"]."</a></td></tr>");
}

else {

if ($b["message_from"]==0){
echo("<td width=5% rowspan=2><img src='i.jpg' alt='Я' width=30 height=30 ></td><td width=40% rowspan=2 class='td2'><a class='a1' href='messages_all.php?user_other=".$b["user_other"]."'>".$b["text_small"]."</a></td></tr>");
}

}

echo("</tr><td ><font size=1>".$b["last_time"]."</font></td>");
echo("</tr></table>");
echo("</div>");
}


echo("</div>");

}

?>
 </table> 
 </div> <div id="foot1" align=center style="background-color:#07B8E4" ><p >&copy; ИнтерЦУМ</p></div></div></div>
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


$(".del_dial").click(function(){

var cc=confirm("Вы действительно хотите удалить всю переписку?")

if(cc==false){
return 0;
}

else{

var clickid=this.id;



user_other=clickid.substr(3,clickid.length);


$.ajax({

  type: 'POST',

  url: 'del_dial.php',

  data: "user_other="+user_other,

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