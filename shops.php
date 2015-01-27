<?php include_once('db.php'); ?>	

<form action="shops.php" method="post">
	Логин: <input type=text name="shop" id="shop" />
	<input type=Submit name="sbmt" id="sbmt" value="OK" />
</form>

<?php
if(isset($_POST['shop']) && $_POST['shop']!=''){
echo "Вы искали: <b>".$shop=$_POST['shop'];
echo "</b>";
$result = mysql_query("
						SELECT *
						FROM shop s
						where s.name like '%$shop%'
						order by s.name asc
					") or die (mysql_error());
					
echo "<style> html,body {margin:0px;top:0px;left:0px;}  tr:hover {background:#adf; cursor:pointer;} </style>";
echo "<script type='text/javascript'>
    function toggle(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }
</script>";
echo "<p style='font-family:Arial; font-size:14px; font-weight:bold;'>Список магазинов</p>";
echo "<table border=1 style='border:1px dotted silver; font-family:Arial; font-size:12px;'>";
echo "<tr style='border:1px dotted silver;'>";
echo "<th style='border:1px dotted silver;'>Фото</th>";
echo "<th style='border:1px dotted silver;'>ID</th>";
echo "<th style='border:1px dotted silver;'>ОГРН</th>";
echo "<th style='border:1px dotted silver;'>ИНН</th>";
echo "<th style='border:1px dotted silver;'>Форма собственности</th>";
echo "<th style='border:1px dotted silver;'>Название</th>";
echo "<th style='border:1px dotted silver;'>Логин</th>";
echo "<th style='border:1px dotted silver;'>Пользователь</th>";
echo "<th style='border:1px dotted silver;'>Дата регистрации</th>";
echo "<th style='border:1px dotted silver;'>Почта</th>";
echo "<th style='border:1px dotted silver;'>Телефон</th>";
echo "<th style='border:1px dotted silver;'>Скайп</th>";
echo "</tr>";
while ($row = mysql_fetch_assoc($result))
	{
		echo "<tr style='border:1px dotted silver;'>";
		echo "<td style='border:1px dotted silver;'>";
		if($row[foto]<>''){ echo "<img src='".$row[foto]."' width='50' />"; } else { echo " "; }
		echo "</td>";
		echo "<td style='border:1px dotted silver;'>";
		echo $row[id];
		echo "</td>";
		echo "<td style='border:1px dotted silver;'>";
		echo $row[ogrn];
		echo "</td>";
		echo "<td style='border:1px dotted silver;'>";
		echo $row[inn];
		echo "</td>";
		echo "<td style='border:1px dotted silver;'>";
		echo $row[fsobst];
		echo "</td>";
		echo "<td style='border:1px dotted silver;'>";
		echo $row[name];
		echo "</td>";
		echo "<td style='border:1px dotted silver;'>";
		echo $row[login];
		echo "</td>";
		echo "<td style='border:1px dotted silver;' onclick='toggle(\"users".$row[id]."\")'>";
		echo "<style> #users".$row[id]." table { font-family:Arial; font-size:12px;} </style>";
		echo $row[user_id];
			echo "<div id='users".$row[id]."' name='users".$row[id]."' style='display:none; border:1px solid silver; background:#adf; font-family:Arial; font-size:12px; position:relative; z-index:1;'>";
			$result2 = mysql_query("
									SELECT u.foto, u.name, u.lastname, u.email, u.phone, u.skype
									FROM shop s
									join users u
									where u.id = $row[user_id]
									order by s.name asc
								") or die (mysql_error());
			
				{
					echo "<table><tr>";
					//echo mysql_result($result2,$row[user_id]);
					$row2 = mysql_fetch_row($result2);
					/*echo "<script type='text/javascript'>
						function big_img(id) {
						   var e = document.getElementById(id);
						   e.src = '".$row2[0]."'
						}
					</script>";*/
					echo "<td><img src='".$row2[0]."' width='50' onmouseover='toggle(\"img".$row[user_id]."\")' onmouseout='toggle(\"img".$row[user_id]."\")' /></td><td>".$row2[1]."</td><td>".$row2[2]."</td>";
					echo "<div id='img".$row[user_id]."' name='img".$row[user_id]."' style='display:none; position:absolute; z-index:2;'><img src='".$row2[0]."' width='200' /></div>";
					echo "</td></tr></table>";
				}
			echo "</div>";
		echo "</td>";
		echo "<td style='border:1px dotted silver;'>";
		echo $row[registered];
		echo "</td>";
		echo "<td style='border:1px dotted silver;'>";
		echo $row[email];
		echo "</td>";
		echo "<td style='border:1px dotted silver;'>";
		echo $row[phone];
		echo "</td>";
		echo "<td style='border:1px dotted silver;'>";
		echo $row[skype];
		echo "</td>";
		echo "</tr>";
	}
echo "</table>";
}
?>