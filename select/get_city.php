<?php
include_once 'connect.php';
$region_id = @intval($_POST['region_id']);
 $region_id = 4312;

$regs=mysql_query("SELECT name, city_id FROM city WHERE region_id=".$region_id); 

if ($regs) {
    $num = mysql_num_rows($regs);      
    $i = 0;
    while ($i < $num) {
       $citys[$i] = mysql_fetch_assoc($regs);   
		print_r($citys[$i]);
       $i++;
    }     
    $result = array('citys'=>$citys);  
}
else {
	$result = array('type'=>'error');
}

// echo "<pre>";
// print_r ($result);
// echo "</pre>";
 print ($result); 
//print var_dump($result);
?>