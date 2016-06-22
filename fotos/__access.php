<?php
error_reporting(E_ERROR);
$arquivo = "__4rqu1vuss3cret0s.php";

$user	=	$_POST['user'];
$pass	=	$_POST['pass'];
$upf	=	("$user$pass");

$ua		=	"usuario";
$pa 	=	"senha123";
$final	=	("$ua$pa");

$c 	= 1;

$negaacesso	=	0;

if (isset($user) and isset($pass)){
	echo "";
}else if (!isset($user) or !isset($pass)){
	$negaacesso++;
}

if ($negaacesso != 0) {
	negaacesso2();
}

function negaacesso2(){
	Echo ("<h1>403 - Forbidden</h1>");
	exit;
	//header("../index.php");
}

//if (($user && $pass) == ($ua && $pa) ) {
if ($upf == $final){
	$c = 0;
} else {
	$c = 1;
}

if ($c == 0){
	include("$arquivo");
} else {
	Echo ("<center>Acesso negado.<br>");
	echo ("<a href=\"javascript:window.history.go(-1)\">Tentar novamente</a></center>");
}

//echo "$upf<br>";
//echo "$final";
?>