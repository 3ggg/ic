<?php include_once('../../db.php'); ?>	
<?php
 $result=mysql_query("
						select distinct /*g.id gid,*/ g.name gname
						from goods g
						where 1=1
					") or die (mysql_error());
			echo "var countries = {";
				while ($row = mysql_fetch_assoc($result)){
					echo "\"".$row['gname']."\": \"".$row['gname']."\",";
				}
			echo "}";
?>