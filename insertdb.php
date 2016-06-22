<?php

class DB{
    public function conectar(){
        $host	=	"";
        $user 	=	"";
        $pass 	=	"";
        $dbname =	"";

        $conexao=mysql_connect($host, $user,$pass);
        $selectdb=mysql_select_db($dbname);

        return $conexao;
    }
}

class cadastro{
    public function cadastrar($ip, $ipreverso, $data, $nomereal, $nomeatual){
        $size   =   $_FILES['userfile']['size'];
        $insert =   mysql_query("INSERT INTO fotoenviada(ip, ipreverso, data, size, nomereal, nomeatual) VALUES ('$ip', '$ipreverso', '$data', '$size', '$nomereal', '$nomeatual')");
    }
}

$conectar   =   new DB;
$conectar   =   $conectar -> conectar();

$ipreverso    =   gethostbyaddr($_SERVER['REMOTE_ADDR']); 
$ip           =   $_SERVER['REMOTE_ADDR'];
date_default_timezone_set("Brazil/East");
$data         =   date("D - d/m/Y  -  H:i:s");
$nomereal     =   $arquivo;
$nomeatual    =   "$trocadenome.$ext";

$conectar   =   new cadastro;
$conectar   =   $conectar->cadastrar($ip, $ipreverso, $data, $nomereal, $nomeatual);

$conectar->close();
?>