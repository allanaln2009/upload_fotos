<?php

$servidor	= "";
$usr 		= "usuario";
$pass 		= "senha";
$dbname 	= "db";
$conn 		= new mysqli($servidor, $usr, $pass, $dbname);

if ($conn->connect_error) {
    die("Falha conexão: " . $conn->connect_error);
} 


$host = gethostbyaddr($_SERVER['REMOTE_ADDR']); 
$ip = $_SERVER['REMOTE_ADDR'];
date_default_timezone_set("Brazil/East");
$dthr    =  date("D - d/m/Y  -  H:i:s");

$sql	=	"INSERT INTO visitantes(ip, host, dthr) VALUES ('$ip', '$host', '$dthr')";
//mysql_query("INSERT INTO cad_ip(ip, host, dthr) VALUES ('$ip', '$host', '$dthr')");

if ($conn->query($sql) === TRUE) {
    echo "";
} else {
	echo "";
    //echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>