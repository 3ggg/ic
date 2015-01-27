<?php
phpinfo();

session_start();
// Это строка, которую мы будем рисовать на изображении
$str = rand(1000, 999999);
$_SESSION['captcha'] = $str;
/*
** Здесь можно указать путь к своему шрифту
** $font = dirname(__FILE__) . '/MyriadPro-Bold.otf';
*/

/*
** Задаем углы закручивания
** и сдвиг, относительно центра перед закручиванием
*/
$corner1 = rand(30,50);
$corner2 = rand(30,50);
$roll = rand(20, 50);


// Создаем объект
$image = new Imagick();
$draw = new ImagickDraw();  
$image->newImage(120, 30, new ImagickPixel('#ffffff'));  

/*
** Если используем свой шрифт, передаем его в ImageDraw
** $draw->setFont($font);  
*/

// Задаем размер шрифта
$draw->setFontSize(20);  
// Накладываем нашу надпись
$image->annotateImage($draw, 10, 22, 0, $str);  

// Двигаем изображение и закручиваем его
$image->rollImage($roll,0);
$image->swirlImage(-$corner1);
$image->rollImage(-$roll*2,0);
$image->swirlImage($corner2);
$image->rollImage($roll,0);

$image->setImageFormat('png');  
header('Content-type: image/png');  
echo $image;

?>