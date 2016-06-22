<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>Controle de envios</title>
</head>
<?php
error_reporting(0);
$negaacesso	=	0;

if (isset($c) and $c == 0){
	mostraarquivos();
}else if (isset($c) and $c == 1){
	$negaacesso++;
}else if (!isset($c)){
	$negaacesso++;	
}

if ($negaacesso != 0) {
	negaacesso();
}

include("../db.php");

//mysql_free_result($result); 
//mysql_close($link); 

function mostraarquivos(){
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$c 		= 	0;

    $host	=	"";
    $user 	=	"";
    $pass 	=	"";
    $dbname =	"";
    $link	 =mysql_connect($host, $user, $pass) or print (mysql_error());
    $selectdb=mysql_select_db($dbname) or print (mysql_error());

		if (!$link) {
		    die('Não foi possível conectar: ' . mysql_error());
		}

	$sql    = 'SELECT * FROM fotoenviada'; 
	$result = mysql_query($sql, $link); 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$path = "temp-files-crypt-db-denied-access/";
	//$arquivosAvalia	=	glob("$path*.*");
	$arquivosAvalia	=	glob($path.'{*.jpg,*.jpeg,*.gif,*.bmp,*.png,*.mp4,*.avi}', GLOB_BRACE);
	$arquivosQtde	=	count($arquivosAvalia);
	echo "Lista de Arquivos do diretório '<strong>".$path."</strong>':<br />";
	echo "<table>\n<tr><td><b>IP</b></td><td><b>IP Reverso</b></td><td><b>Data de envio</b></td><td><b>Tamanho</b></td><td><b>NomeReal</b></td><td><b>NomeAtual</b></td></tr>\n";

	for ($i=0; $i < $arquivosQtde; $i++) { 
		$foto2		= $arquivosAvalia[$i];
		$foto3 		= after_last ('/', $foto2);
		$consultaB 	= "SELECT * FROM fotoenviada WHERE nomeatual = '$foto3'";

		$resultadoB = mysql_query($consultaB) or die("Falha na execução da consulta");

		//$buscar		= 'SELECT * FROM fotoenviada WHERE nomeatual = '.$foto3.'';
	//echo "$foto3<br>$foto2<br>";
		$linha = mysql_fetch_assoc($resultadoB);

	    $ip			= $linha["ip"];
	    $ipreverso 	= $linha["ipreverso"];
	    $data 		= $linha["data"];
	    $size 		= $linha["size"];
	    $nomereal	= $linha["nomereal"];
	    $nomeatual	= $linha["nomeatual"];
	    $hreffoto	= "<a href='".$foto2."'>".$nomeatual."</a>";
	    //$hreffoto	= "<a href='".$nomeatual."'>".$nomeatual."</a>";
	    $key1		= sha1(md5('cryp'.$foto3));
	    $key2		= sha1('cryp2'.$foto2);

	    $unidade	=	'';

	    if ($size > 0) {
		    $sizeF		=	$size;
		    $unidade	=	'B';
	    }
	    if ($size > 1024) {
	    	$sizeKb		= round($size/1024, 0);
	    	$unidade	= 'KB';
	    	$sizeF		= $sizeKb;
	    }
	    if ($sizeKb > 1024) {
	    	$sizeKb		= ($size/1024);
			$sizeMb		= round($sizeKb/1024, 2);
			$unidade	= 'MB';
			$sizeF		= $sizeMb;
	    }

?>
<script language="javascript" type="text/javascript">
function acessarlink(){
	alert ("Você tem certeza?")
}

function exemplo4(){
	decisao = confirm("Clique em um botão!");
	if (decisao){
	    alert ("Você clicou no botão OK,\n"+
			"porque foi retornado o valor: "+decisao);
	} else {
	    alert ("Você clicou no botão CANCELAR,\n"+
			"porque foi retornado o valor: "+decisao);
	}
}
</script>
<?php
	    $deletarKey	= "&key="."$key1$key2"."";
	    $deleteBtn	= "<a href=\"__da34832ca30dea0cbe3d4affaecbcd74f.php?nome=".$foto3.''.$deletarKey."\" onclick=\"acessarlink\">Deletar</a>";
	    $moverKey	= "&key="."$key1$key2"."";
	    $moverBtn	= "<a href=\"__m62b2af1f286d4389b9f71f55963b9180.php?nome=".$foto3.''.$moverKey."\" onclick=\"acessarlink\">Mover</a>";
//echo "Foto3: $foto3<br>Foto2: $foto2<br>Key1: $key1<br>Key2: $key2<br>Chave: $deletarKey<br><br><br>";
		echo "<tr><td>" . $ip . "</td><td>" . $ipreverso . "</td><td>" . $data . "</td><td>" . $sizeF . $unidade ."</td><td>" . $nomereal . "</td><td>" . $hreffoto/*$consulta['nomeatual']*/ . "</td><td>$deleteBtn</td><td>$moverBtn</td></tr> \n";
	}
	echo "</table>";
}

function negaacesso(){
	Echo ("<h1>403 - Forbidden</h1>");
	header("../index.php");
}
	//************************************************************************
    function after_last ($this, $inthat){
        if (!is_bool(strrevpos($inthat, $this)))
        return substr($inthat, strrevpos($inthat, $this)+strlen($this));
    };
	function strrevpos($instr, $needle){
	    $rev_pos = strpos (strrev($instr), strrev($needle));
	    if ($rev_pos===false) return false;
	    else return strlen($instr) - $rev_pos - strlen($needle);
	};
	//************************************************************************
?>
<body>

</body>
</html>