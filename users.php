<?php include_once('db.php'); ?>	
<html>
<head>
<title>Test users goods</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<style>
	th{border:1px solid silver;} 
	td{border:1px solid silver;}
</style>
<?php
echo "<script>
 function user_goods(id){
 var a=document.getElementById(id);
 a.style.background='#add';
 //document.write('<div style=\'z-index:100; position:absolute;\'>2</div>');
 alert(";
if(isset($_GET[uid]) && $_GET[uid]!=''){
$result2 = mysql_query("
						SELECT g.name gname, u.name uname
						FROM users u
						join goods g on (g.user_id=u.id)
						where u.id = $_GET[uid]
						order by u.name asc
					") or die (mysql_error()); }
					//else{ echo " ";}
 echo $_SESSION[uname]."<br>";
 while ($row2 = mysql_fetch_assoc($result2))
				{
				  echo $row2[gname]."\n\n";
				}
 echo ");
 }
 </script>";
?>
</head>
<body>
<p><a href="/"><img src="лог_лог_11.png" /></a></p>
<hr>
<form action="users.php" method="post">
	Логин: <input type=text name="user" id="user" />
	<input type=Submit name="sbmt" id="sbmt" value="OK" />
<?php
if(isset($_POST['user']) && $_POST['user']!=''){
$user=$_POST['user'];
$result = mysql_query("
						SELECT distinct /*g.name gname,*/ u.id uid, u.name uname, u.lastname lastname
						FROM users u
						left join goods g on (g.user_id=u.id)
						where u.login like '%$user%'
						order by u.name asc
					") or die (mysql_error());
echo "<br /><br />";
echo "<style> tr:hover {background:#adf; cursor:pointer;} </style>";
echo "<script type='text/javascript'>
    function toggle(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }
</script>";
echo "<table border=1 style='border:1px dotted silver; padding:2px; spacing:2px; font-family:Arial; font-size:12px;'>";
echo "<th style='border:1px dotted silver; padding:2px; spacing:2px;'>Пользователь</th><!--<th style='border:1px dotted silver; padding:2px; spacing:2px;'>Товар</th>//-->";
				while ($row = mysql_fetch_assoc($result))
				{
				  echo "<tr><td style='border:1px dotted silver; padding:2px; spacing:2px;' id=".$row[uid]." name=".$row[uid]." onclick='toggle(\"div_tog".$row[uid]."\");' onmouseover='getElementById(this.id).style.color=\"#000\";' onmouseout='getElementById(this.id).style.color=\"#555\";'>"; //user_goods(this.id); window.location.href='users.php?uid=".$row[uid]."';  toggle(\"div_tog".$row[uid]."\");
				    $_SESSION[uid]=$row[uid];
				    $_SESSION[uname]=$row[uname];
				    $_SESSION[lastname]=$row[lastname];
				  echo $row[uname]."&nbsp;&nbsp;".$row[lastname];
				  echo "</td><!--<td style='border:1px dotted silver; padding:2px; spacing:2px;'>".$row[gname]."</td>//--></tr>";
				  echo "<div id='div_tog".$row[uid]."' name='div_tog".$row[uid]."' style='display:none; position:absolute; z-index:100; top:211px; left:150px; border:1px dotted silver; font-family:Arial; font-size:12px; padding:2px; spacing:2px;'>";
				  
				  $result2 = mysql_query("
						SELECT g.id guid, g.name gname /*, u.name uname*/, g.foto2 gfoto
						FROM users u
						join goods g on (g.user_id=u.id)
						where u.id = $row[uid]
						order by u.name asc
					") or die (mysql_error()); 
					//else{ echo " ";}
			 //echo $_SESSION[uname]."<br>";
			 while ($row2 = mysql_fetch_assoc($result2))
				{
					//echo "<script type='text/javascript'> function gfoto(id){ var e = document.getElementById(id); e.style.visibility='visible';}</script>";
				  echo "<p style='line-height:3px; cursor:pointer;' onmouseover='toggle(\"foto".$row2[guid]."\");' onmouseout='toggle(\"foto".$row2[guid]."\");'>".$row2[gname]."</p>"; //<hr style='line-height:1px;'>";
				  echo "<div id='foto".$row2[guid]."' name='foto".$row2[guid]."' style='display:none; position:absolute; z-index:101; top:0px; left:160px; border:1px dotted silver; font-family:Arial; font-size:12px; padding:2px; spacing:2px;'> <img src='".$row2[gfoto]."' /> </div>";
				}

				  echo "</div>";
				}
echo "</table>";
 //mysql_result($result2,1);
}else{echo '<br /><br /> Введите логин';}
?>
</form>

<?php
echo iconv("KOI8-U", "UTF-8", "Пора переходить на юникод.");
?>
</body>
</html>