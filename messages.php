<html>

<head><title>ИЦЦ</title>
<meta charset="utf-8">
<link rel="icon" href="favicon.ico" type="image/x-icon">
 <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
 <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
</head>
<body>
<body>
<div class="gridContainer clearfix" >
  <div id="LayoutDiv1" style="border: 1px solid 
	#07B8E4;" >
    <div id="header1" align="center" border="1" >
      <table width="99%" height="220" border="0">
        <tr>
          <td width="16%" height="216" align="center"><a href="index.html" style="border:0px;"><img src="лог_лог_11.png" alt="логотип"></a></td>
          <td width="84%" align="center"><div id="rec4">
            <div id="rec5">
              <table width="100%" height="189" border="0">
                <tr>
                  <td width="25%" align="center" valign="middle"><img src="i.jpg" alt="1"></td>
                  <td width="25%" align="center"><img src="i.jpg" alt="1"></td>
                  <td width="25%" align="center"><img src="i.jpg" alt="1"></td>
                  <td width="25%" align="center"><img src="i.jpg" alt="1"></td>
                </tr>
              </table>
            </div>
          </div>            <a href="index.html" style="border:0px;"></a></td>
        </tr>
      </table>
      <hr width="100%" align=center>
    </div>
<form>

<?php

$host="localhost";
$user="root";

$pass="";


$a=mysql_connect($host,$user,$pass);

if (!$a) {

echo("Нет соединения с БД");

}

else {

$user_from=1; //заменить

mysql_select_db("intercum08");
$strsql="select * from messages where user_to=".$user_from;

$result=mysql_query($strsql);

while($b=mysql_fetch_array($result)){
echo("<div style='  background-color:gray;right: 0; width:300px;margin-left: 30%;'><table>");

echo("<td>".$b["user_from"]."</td><td>".$b["text_message"]."</td><td>".$b["time_write"]."</td>");
echo("</tr></table></div><hr>");

}



}






?>
</table>
</form>
</body>
</html>

<?





?>