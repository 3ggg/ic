
<html>

<head>

<title>Test Ajax JQuery</title>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>

</head>

<body>

<form action="test6.php" method="post">
<table>
<tr>
   <td width="105">Страна<br />
      <input type="text" name="txt" id="txt" value="<?php echo $row[country]; ?>" /> &nbsp;

<?php
// echo $_REQUEST['txt'];
if (isset($_POST['txt'])) {
//echo $_POST[txt];
echo $txt = addslashes($_POST['txt']);
 
mysql_connect("localhost", "root", "") or
die("Could not connect: " . mysql_error());

mysql_select_db("intercum");
 
$result = mysql_query("
						SELECT c1.name country
						FROM country c1
						where c1.name like '%".$txt."%'
						/*order by c1.name asc*/
						/*limit 3*/
					") or die (mysql_error());
echo '
   </td>
   <td width="50">
      <input onclick="datalist()" type="Submit" value="OK" style="width: 6em;" />
   </td>
      <td>
         <select name="list" id="list" style="width:45em; display:block;">\n';
				while ($row = mysql_fetch_assoc($result))
				{
				  echo "<option value='".$row[country]."'>".$row[country]."</option>\n";
				}
echo '
         </select>
      </td>
   </tr>
</table>
</form>';

} else {

echo '
   </td>
   <td width="50">
      <input onclick="datalist()" type="button" value="OK" style="width: 6em;" />
   </td>
      <td>
         <select name="list" id="list" style="width:45em; display:block;">
				  <option value=""> </option>
         </select>
      </td>
   </tr>
</table>';
//</form>';
//}

if (isset($_POST['list'])&&($_POST['list']!='')) {
echo $list=addslashes($_POST['list']);

//mysql_connect("localhost", "root", "") or
//die("Could not connect: " . mysql_error());

//mysql_select_db("intercum");
 
$result = mysql_query("
						SELECT c1.name city
						FROM city c1
						join country c0 on(c0.country_id=c1.country_id)
						where c0.name like '%".$list."%'
						/*order by c1.name asc*/
						/*limit 3*/
					") or die (mysql_error());
echo '
		<form id="f2" action="test6.php" method="post">
         <select name="list" id="list" style="width:45em; display:block;">\n';
				while ($row = mysql_fetch_assoc($result))
				{
				  echo "<option value='".$row[city]."'>".$row[city]."</option>\n";
				}
echo '
         </select>
		<input type="Submit" value="OK" style="width: 6em;" />
		</form>
	';
}
}

?>

</body>

</html>
