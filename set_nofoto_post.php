<?php session_start(); ?>
 <?php
//session_start();
	
	$host="localhost";
	$user="root";
	$password="";
	$db="intercum08";
	$a=mysql_connect($host, $user, $password) or die("MySQL сервер недоступен!".mysql_error());
	mysql_select_db($db) or die("Нет соединения с БД".mysql_error());

	
 $gfoto_v="";
// $gname_v="";
// $color1_v=""; $color2_v=""; $color3_v="";
// $size1_v=""; $size2_v=""; $size3_v="";
// $complect1_v=""; $complect2_v=""; $complect3_v="";
// $price1_v=""; $price2_v=""; $price3_v="";

// if (isset($_REQUEST["color1"]) or isset($_REQUEST["size1"]) or isset($_REQUEST["complect1"])) {
	
// }
// else {
// echo("Добавьте цвет/размер/комплект товара!");
// die();
//echo $_GET['gfoto'];

if(isset($_POST['id0']) && $_POST['id0']<>""){
echo $_POST['id0'];//=$_REQUEST[id];
$result=mysql_query("update goods g
						set g.foto='nofoto.png'
						where g.id=".$_POST['id0']."
					") or die (mysql_error());
}

$result=mysql_query("select g.*
						from goods g
						where g.foto is null or g.foto='' or g.foto='qwe.png' or g.name=''
					") or die (mysql_error());
				  //echo "<div id='gd' style='z-index:100; position:absolute; top:470px; width:900px; display:inline; float:left;'>";
				  // onclick='imgsnf.src=nofoto.png; var imgsnf0=nofoto.png; set_nofoto.submit();'
					echo "<form id='set_nofoto_post' name='set_nofoto_post' action='set_nofoto_post.php' method='post'>";
					echo "<table border=1>";
					echo "<tr>";
					echo "<th>ID</th><th>Название</th><th>Описание</th><th>Цвет</th><th>Комплект</th><th>Цена</th><th>Фото</th><th>Действие</th>";
					echo "</tr>";
				while ($row = mysql_fetch_assoc($result))
				{
					echo "<tr>"; // onclick='imgsnf.src=nofoto.png; set_nofoto.submit();'
					echo "<td>".$row['id']."</td>"."<td>".$row['name']."</td>"."<td>".$row['description']."</td><td>".$row['color']."</td><td>".$row['complect']."</td><td>".$row['price']."</td><td><img id='imgsnf' name='imgsnf' src='".$row['foto']."' /></td>";
					echo "<td><input type='button' id='id0' name='id0' value='Исправить' onclick='id0.value=".$row['id']."; set_nofoto_post.submit();' />
							<!--<input type=hidden id='id0' name='id0' value=".$row['id']." />//--></td>"; // <script>function fs(){var gfoto_v=".$row['id'].";}</script>
							//style='border:1px silver solid;' 
					echo "</tr>";
				}
					echo "</table>";
					echo "</form>";
// }
$a.close;

?>