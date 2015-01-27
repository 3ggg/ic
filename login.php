<html>
<head>
<title>Login test</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<style>
	th{border:1px solid silver;} 
	td{border:1px solid silver;}
</style>
</head>
<body>
<form action="login.php" method="post">
	Логин: <input type="text" name="user" id="user" />
	Пароль: <input type="password" name="pwd" id="user" />
	<input type="Submit" name="sbmt" id="sbmt" value="OK" />
	
<?php
mysql_connect("localhost", "root", "") or
die("Could not connect: " . mysql_error());
mysql_select_db("intercum08");
if(isset($_POST['user'])&&$_POST['user']!=''){
$user=$_POST['user'];
$result = mysql_query("
						SELECT g.name gname, u.name uname
						FROM users u
						join goods g on (g.user_id=u.id)
						where u.login like '%".$user."%'
						order by u.name asc
					") or die (mysql_error());
echo "<br /><br />";
echo "<table border=1 style='border:1px solid silver; padding:2px; spacing:2px;'>";
echo "<th>User</th><th>Goods</th>";
				while ($row = mysql_fetch_assoc($result))
				{
				  echo "<tr><td>".$row[uname]."</td><td>".$row[gname]."</td></tr>";
				}
echo "</table>";
}else{echo '<br /><br /> Введите логин';}
?>
</form>