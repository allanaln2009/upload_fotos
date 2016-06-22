<?php

//MOVE

error_reporting(0);
$negaacesso = 	0;
$key		=	$_GET['key'];
$nome 		=	$_GET['nome'];
$pasta	 	=	"temp-files-crypt-db-denied-access/";

if (isset($key) ){
	if ($nome == "index.php") {
		//echo "Impossível realizar alterações.<br>";
		negaacessoM();
	}
		//echo "Chegou nas variaveis.<br>";
		$foto2	=	"cryp2$pasta$nome";
		$foto3	=	"cryp$nome";
	    $key1		= sha1(md5($foto3));
	    $key2		= sha1($foto2);
	    $chavegeral	= "$key1$key2";
	if ($key == $chavegeral) {
		//echo "Entrou na condicao.<br>";
		movearquivo();
	}else{
		//echo "Chave geral não bate.<br>";
		$negaacesso++;	
	} 
	if (!isset($key) or !isset($nome)){
		//echo "Nome ou chave não setados.<br>";
		$negaacesso++;
	}
} else {
	//echo "Key não está setada.<br>";
	negaacessoM();
}
if ($negaacesso != 0) {
	negaacessoM();
}

function negaacessoM(){
	echo ("<h1>403 - Forbidden</h1>");
	exit;
	//header("../index.php");
}


function movearquivo(){
	if($_GET['nome'] == '') {
		//header("Location: pagina.php"); // Volta pra página já que nenhuma imagem foi selecionada
		echo "Sem link";
		exit;
	} else {
		$pastaAtual	 =	"temp-files-crypt-db-denied-access/";
		$nomeFoto	 =	$_GET['nome'];
		$pastaNova 	 =	"../fotos/";
		//Local atual do arquivo
		$localAtual	 =	"$pastaAtual$nomeFoto";
		//Local para onde o arquivo vai
		$localNovo	 =	"$pastaNova$nomeFoto";

		$mover = rename($localAtual, $localNovo);
		
		//echo "<br>PastaAtual: $pastaAtual<br>NomeArquivo: $nomeFoto<br>Pasta Nova: $pastaNova<br>Local Atual: $localAtual<br>Local Novo: $localNovo<br><br>";

		if (!$mover) {
		//	echo 'Erro, tente novamente';
			negaacessoM();
		} else {
			echo "Ok!";
		}
	}
}
?>