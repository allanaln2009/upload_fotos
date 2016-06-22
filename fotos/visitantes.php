<html>
 <head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <title>Consulta de visitantes</title>
 </head>
<body>

<h1>Consulta de visitantes</h1>

<?php

$servidor = "";
$usuario = "";
$senha = "";
$banco = "";

$conexao = mysql_connect($servidor,$usuario,$senha);
mysql_select_db($banco);
$res = mysql_query("select * from visitantes");

echo "<table><tr><td><b>IP do usuário</b></td><td><b>IP Reverso</b></td><td><b>Data de acesso</b></td></tr>";
while($escrever=mysql_fetch_array($res)){
	echo "<tr><td>" . $escrever['ip'] . "</td><td>" . $escrever['host'] . "</td><td>" . $escrever['dthr'] . "</td></tr>";
}
echo "</table>";

mysql_close($conexao);

?>

</body>
</html>