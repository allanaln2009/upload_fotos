<html>
<body>
<?php
$arquivos	= glob("fotos/*.*");
$loop		=	5;
$cont		=	1;
?>
<table>
<tr>
<?php
for ($i = 0; $i < count($arquivos); $i++){
	if ($cont < $loop) {
		echo '<td><a href=\''."$arquivos[$i]".'\'>';
		echo '<img src=\''."$arquivos[$i]".'\'';
		echo 'width="251" height="230"/></a></td>';
		echo "\n";
	}
	elseif ($cont = $loop) {
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
?>
</tr>
</table>
</body>
</html>