<?php
error_reporting(0);
$negaacesso = 	0;
$key		=	$_GET['key'];
$nome 		=	$_GET['nome'];
$pasta	 	=	"temp-files-crypt-db-denied-access/";

if (isset($key) ){
	if ($nome == "index.php") {
		negaacessoD();
	}
		$foto2	=	"$pasta$nome";
		$foto3	=	"$nome";
	    $key1		= md5($foto3);
	    $key2		= sha1($foto2);
	    $chavegeral	= "$key1$key2";
	if ($key == $chavegeral) {
		apagaarquivo();
	}else{
		$negaacesso++;	
	} 
	if (!isset($key) or !isset($nome)){
		$negaacesso++;
	}
} else {
	negaacessoD();
}
if ($negaacesso != 0) {
	negaacessoD();
}

function negaacessoD(){
	echo ("<h1>403 - Forbidden</h1>");
	exit;
	//header("../index.php");
}


function apagaarquivo(){
	if($_GET['nome'] == '') {
		//header("Location: pagina.php"); // Volta pra página já que nenhuma imagem foi selecionada
		echo "Sem link";
		exit;
	} else {
		$pasta	 =	"temp-files-crypt-db-denied-access/";
		$nomeFoto=	$_GET['nome'];
		$caminho =	"$pasta$nomeFoto";
		$del = unlink($caminho);
		/*
		echo "$pasta<br>";
		echo "$nomeFoto<br>";
		echo "$caminho<br>";
		*/
		if (!$del) {
			echo 'Erro, tente novamente';
		} else {
		//header("Location: pagina.php?ac=deletado");
			echo "Ok!";
			//echo md5("deletar.php");
		}
	}
}
?>