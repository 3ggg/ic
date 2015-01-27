<?php

$test=array
('a=(3)'
,'a=(3}'
,'{}'
,'[]'
,'{{}}'
,'{()}'
,'{(})'
,'{{))'
,'{[)]}'
,'{{}{{}{}}}{'
,'{{}{{}{}}}'
,'[{([]([]{}){})}({([(()())]{})}[])]'
);

function isCorrect($str)
{
 do{$str=preg_replace('/\\[\\]|\\(\\)|{}|[^{}()[\\]]+/','',$str,-1,$count);}while($count);
 return !strlen($str);
}

foreach($test as $str)
echo "$str -> ".isCorrect($str)."<br />";

?>