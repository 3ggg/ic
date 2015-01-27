<?php

for ($i=0,$x=0; $x<16; $x++) {
  for ($y=0; $y<16; $y++) {
    $chars[$x][$y] = array($i, chr($i));
    $i++;
  }
}
 
 
for ($i = 0; $i < count($chars); $i++)
   for ($j = 0; $j < count($chars[$i]); $j++)
      for ($k = 0; $k < count($chars[$i][$j]); $k++)
          echo $chars[$i][$j][$k].' ';

// var_dump($chars);

// echo count($chars), '<br>';
// echo count($chars[0]), '<br>';
// echo count($chars[0][0]);

// print_r($chars);

echo "
<script>
var dataFull = [1,3,5,7];
var dataEmpty = [];
if (dataFull.length == 0) {alert('Массив dataFull пустой');}
else {alert('В массиве dataFull что-то есть');}
if (dataEmpty.length == 0) {alert('Массив dataEmpty пустой');}
else {alert('В массиве dataEmpty что-то есть');}
</script>
";

?>