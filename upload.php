<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
</head>
<body>
<?php
$_FILES['userfile']	=	'';
?>
<form enctype="multipart/form-data" action="acaocarregar.php" method="POST" >
    <!-- se você for zica, sabe como upar coisa maior aqui -->
    <div align="center">
    <input type="hidden" name="MAX_FILE_SIZE" value="3145728" />
    Upload até 3MB <input name="userfile" accept="image/gif,image/jpeg,video/mpeg,image/png,video/avi,image/bmp,video/mp4" type="file" />
    <input type="submit" value="Enviar arquivo" />
    </div>
</form>
</body>
</html>