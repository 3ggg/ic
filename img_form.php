<?php
// session_start();

print("<div>
	<form id=form_img name=form_img action='' method='post'>
		<input id=imgf name=imgf type=file value=image accept='image/*' onchange='getElementById(\'img1\').src=\'files[0].getAsDataURL(); \'getElementById('text').innerHTML=document.getElementById('imgf').value' />
		<img id=img1 src='files[0].getAsDataURL();' />
		<p id=text> </p>
		<input id=ok type=Submit value=OK />
		<input id=nok type=Reset value=Отмена />
	</form>
</div>");

// print_r($_POST['imgf']);
print_r($_FILES['imgf']);
// print_r($_SESSION);
?>