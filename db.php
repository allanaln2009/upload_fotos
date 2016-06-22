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

$conectar   =   new DB;
$conectar   =   $conectar -> conectar();
?>