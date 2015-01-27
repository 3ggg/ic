<?php
include("function.php"); // подключаем файл с функцией
    // Запускаем функцию
if(!empty($_POST['button'])) // если кнопка "button"  нажата
{    
$message = uploadHandle(8, $extensions, $upload_dir);
// Выводим сообщение 
echo $message['error'] ? $message['error'] : $message['info'];
}
?>