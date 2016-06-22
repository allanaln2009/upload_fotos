<?php
$end1   =   "localhost";
$foto1  =   "http://galery.site90.com/hphotos-xap1/v/9785_341101596076650_2824094671728555157_n.jpg"; //"hphotos-xap1\v\9785_341101596076650_2824094671728555157_n.jpg";
$foto2  =   "http://galery.site90.com/hphotos-xap1/v/10849981_341101599409983_7394691211649976424_n.jpg"; //"hphotos-xap1\v\10849981_341101599409983_7394691211649976424_n.jpg";


    class DB{
        public function conectar(){
            $host="mysql4.000webhost.com";
            $user="a8781169_user";
            $pass="tarado123";
            $dbname="a8781169_dbip";

            $conexao=mysql_connect($host, $user,$pass);
            $selectdb=mysql_select_db($dbname);

            return $conexao;
        }
    }




//$mysql_host = "mysql4.000webhost.com";
//$mysql_database = "a8781169_dbip";
//$mysql_user = "a8781169_user";
//$mysql_password = "tarado123";

//echo "teste PHP da profundeza do inferno<br>";
//echo $_SERVER["REMOTE_ADDR"];
//echo "<br><br>";

$host = gethostbyaddr($_SERVER['REMOTE_ADDR']); 
//echo "$host"; 

//echo "<br><br>";

$ip = $_SERVER['REMOTE_ADDR'];
//echo "$ip";

date_default_timezone_set("Brazil/East");
$dthr    =  date("D - d/m/Y  -  H:i:s");


//$endIP   =  '<ip>'.$ip."</ip><br>\n";
//$host    =  '<host>'.$host."</host><br><br>\n\n";


    class cadastro{
        public function cadastrar($ip, $host, $dthr, $local){
            //Tratamento das variáveis
//            $nome   =   ucwords(strtolower($nome));
//            $end    =   ucwords(strtolower($end));
//            $senha  =   sha1($senha."site");

            //Inserção no BD
                $insert =   mysql_query("INSERT INTO cad_ip(ip, host, dthr, base) VALUES ('$ip', '$host', '$dthr', '$local')");

            //Retorno
            //echo $msg1;
        }
    }


/*
$arquivo = "photos/tPT0cNn/a4rqu1vo_secr3t4o_d0s_car444lh0.html";

$abrir   = fopen($arquivo, 'a');


date_default_timezone_set("Brazil/East");
$hour	 =  '<hora>'.date("D - d/m/Y  -  H:i:s")."<hora><br>\n";


$endIP   =  '<ip>'.$ip."</ip><br>\n";
$host    =  '<host>'.$host."</host><br><br>\n\n";


		$salvarH =  fwrite($abrir, $hour);
		$salvarL =  fwrite($abrir, $endIP);
		$salvarS =  fwrite($abrir, $host);
*/


$conectar   =   new DB;
$conectar   =   $conectar -> conectar();


        $conectar   =   new cadastro;
        $conectar   =   $conectar->cadastrar($ip, $host, $dthr, $local);

?>