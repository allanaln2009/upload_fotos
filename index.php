<html>
<header>
	<style type="text/css">
		body {margin-top: 0px; bottom: 0px; }
	</style>
</header>
<body>
<iframe id="frame" name="frame" src="upload.php" marginheight="0" marginwidth="0" align="center" width="100%" height="6%" frameborder="none" scrolling="no">
</iframe>
<?php
	$arquivos	= 	glob('fotos/{*.jpg,*.jpeg,*.gif,*.bmp,*.png,*.mp4,*.avi}', GLOB_BRACE);
	$loop		=	5;
	$cont		=	1;
?>
<table>
<tr>
<?php

include("visitas.php");

shuffle($arquivos);
for ($i = 0; $i < count($arquivos); $i++){
	if ($cont < $loop) {
		echo '<td><a href=\''."$arquivos[$i]".'\'>';
		echo '<img src=\''."$arquivos[$i]".'\'';
		echo 'width="251" height="230"/></a></td>';
		echo "\n";
	}elseif ($cont = $loop) {
		echo '<td><a href=\''."$arquivos[$i]";
		echo '\'> <img src=\''."$arquivos[$i]";
		echo '\' width="251" height="230"/></a></td>';
		echo "\n";
		echo "</tr>";
		echo "\n";
		echo "<tr>";
		$cont =	0;
	}
$cont++;
}

function after_last ($this, $inthat){
    if (!is_bool(strrevpos($inthat, $this)))
    return substr($inthat, strrevpos($inthat, $this)+strlen($this));
};

function strrevpos($instr, $needle){
    $rev_pos = strpos (strrev($instr), strrev($needle));
    if ($rev_pos===false) return false;
    else return strlen($instr) - $rev_pos - strlen($needle);
};

?>
</tr>
</table>
</body>
</html>