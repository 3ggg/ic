<?php
phpinfo();

session_start();
// ��� ������, ������� �� ����� �������� �� �����������
$str = rand(1000, 999999);
$_SESSION['captcha'] = $str;
/*
** ����� ����� ������� ���� � ������ ������
** $font = dirname(__FILE__) . '/MyriadPro-Bold.otf';
*/

/*
** ������ ���� ������������
** � �����, ������������ ������ ����� �������������
*/
$corner1 = rand(30,50);
$corner2 = rand(30,50);
$roll = rand(20, 50);


// ������� ������
$image = new Imagick();
$draw = new ImagickDraw();  
$image->newImage(120, 30, new ImagickPixel('#ffffff'));  

/*
** ���� ���������� ���� �����, �������� ��� � ImageDraw
** $draw->setFont($font);  
*/

// ������ ������ ������
$draw->setFontSize(20);  
// ����������� ���� �������
$image->annotateImage($draw, 10, 22, 0, $str);  

// ������� ����������� � ����������� ���
$image->rollImage($roll,0);
$image->swirlImage(-$corner1);
$image->rollImage(-$roll*2,0);
$image->swirlImage($corner2);
$image->rollImage($roll,0);

$image->setImageFormat('png');  
header('Content-type: image/png');  
echo $image;

?>