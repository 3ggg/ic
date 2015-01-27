<?php
/******************************************************************************************
 * Эти файлы скачаны с сайта http://blog.gssl.ru и являются свободными в распространении.
 * Создай свой блог с системой управления контентом GSSL-Blog Free.
 ******************************************************************************************/
$host='localhost';          //Хост
$db='intercum';               //Имя БД
$user_mysql='root';       //Имя пользователя БД
$pass_mysql='';          //Пароль пользователя БД
$link = mysql_connect($host, $user_mysql, $pass_mysql) or die("<center><h1>Didn't connect with database!!!</h1></center>");
    print ("Connected successfully");

mysql_query("set character_set_client='utf8'");
mysql_query("set character_set_results='utf8'");
mysql_query("set collation_connection='utf8_general_ci'");
mysql_select_db($db, $link)or die("<center><h1>ERROR CONNECT DATABASE!!!</h1></center>");



// $a = array('<foo>',"'bar'",'"baz"','&blong&', "\xc3\xa9");

// echo "Обычно: ",     json_encode($a), "<br />";
// echo "Тэги: ",       json_encode($a, JSON_HEX_TAG), "<br />";
// echo "Апострофы: ",  json_encode($a, JSON_HEX_APOS), "<br />";
// echo "Ковычки: ",    json_encode($a, JSON_HEX_QUOT), "<br />";
// echo "Амперсанты: ", json_encode($a, JSON_HEX_AMP), "<br />";
// echo "Юникод: ",     json_encode($a, JSON_UNESCAPED_UNICODE), "<br />";
// echo "Все: ",        json_encode($a, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE), "<br />";

// $b = array();

// echo "Отображение пустого массива как массива: ", json_encode($b), "<br />";
// echo "Отображение пустого массива как объекта: ", json_encode($b, JSON_FORCE_OBJECT), "<br />";

// $c = array(array(1,2,3));

// echo "Отображение неассоциативного массива как массива: ", json_encode($c), "<br />";
// echo "Отображение неассоциативного массива как объекта: ", json_encode($c, JSON_FORCE_OBJECT), "<br />";

// $d = array('foo' => 'bar', 'baz' => 'long');

// echo "Ассоциативный массив всегда отображается как объект: ", json_encode($d), "<br />";
// echo "Ассоциативный массив всегда отображается как объект: ", json_encode($d, JSON_FORCE_OBJECT), "<br />";


?>