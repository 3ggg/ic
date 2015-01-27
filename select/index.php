<?php
$action = isset($_REQUEST['city_id']) ? $_REQUEST['city_id'] : '0';
print_r($_REQUEST['city_id']);
// выводим пришедшие данные
if ($action > '0')
{
    echo '<pre>' . htmlspecialchars(print_r($_post, true)) . '</pre>';
    exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Связанные с помощью ajax списки</title>
		<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
		<script type="text/javascript" src="jquery.js"></script>
		<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script> -->
		<script type="text/javascript" src="selects.js"></script>
<style>
    .StyleSelectBox {
    width:200px;
    height:24px;
    font:14px Arial, Tahoma, Helvetica, Verdana;
    text-align:left;
    background:#fff;
    line-height:30px;
    white-space:nowrap; /* запрещаем перенос */
    /*padding:0 22px 0 12px; /* отступ справа с учетом стрелочки */
    border:1;
    zoom:1; /* для IE6 */}
    #selectBoxInfo{
    clear:left;
    padding:10px;
    font:16px "Tahoma";
    color:red;}

</style>


</head>
	<body><br /><br /><br /><br />
<table  align="center" >
<tr>
<td>
	
<script language="javaScript" type="text/javascript">
  function activeDeactiveSubmit()
  {
    if( document.postElementById('city_id').value == 0)
    {
    	document.postElementById('submit').disabled = 1;
    }
    else{
    	document.postElementById('submit').disabled = 0;
    }
  }
</script>	

<form action="index.php" method="post"> 
			Страна:<br />
			<select name="country_id" id="country_id" class="StyleSelectBox">
				<option value="0">- выберите страну -</option>
				<option value="3159">Россия</option>
				<option value="9908">Украина</option>
				<option value="248">Беларусь</option>
			</select></td><td>
			Регион:<br />
			<select name="region_id" id="region_id" disabled="disabled" class="StyleSelectBox">
				<option value="0">- выберите регион -</option>
			</select></td><td>
			Город:<br />
			<select name="city_id" id="city_id" disabled="disabled" class="StyleSelectBox"  onChange="activeDeactiveSubmit();">
				<option value="0">- выберите город -</option>
			</select>
			
			<input type="submit" id="submit" value="Отправить" disabled />
		</form></td>
</tr>
</table><br />
<div align="center" id="selectBoxInfo"></div>



	</body>
</html>
