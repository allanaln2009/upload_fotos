<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<div align="center">
<?php
error_reporting(0);
// Nas versões do PHP anteriores a 4.1.0, $HTTP_POST_FILES deve ser utilizado ao invés
// de $_FILES.

$tiposPermitidos= array('image/gif', 'image/jpeg', 'video/mpeg', 'image/png', 'video/avi', 'image/bmp', 'video/mp4');
$uploaddir = 'fotos/temp-files-crypt-db-denied-access/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

    $arquivo    =   $_FILES['userfile']['name'];
    $arqType    =   $_FILES['userfile']['type'];
    $arqSize    =   $_FILES['userfile']['size'];
    $arqError	=	$_FILES['userfile']['error'];
    $arqTemp    =   $_FILES['userfile']['tmp_name'];
        $data       =   date('YmdHis');
        $tudojunto  =   "$arquivo $data";
        $trocadenome=   md5($tudojunto);
    $ext        =   after_last ('.', $arquivo);
    $nomeNov    =   "$uploaddir$trocadenome.$ext";

echo '<pre>';
if ($arqError == 0){
    if (array_search($arqType, $tiposPermitidos) === false) {
      echo 'O tipo de arquivo enviado é inválido!';
    } else if ($arqSize > 3145728){
      echo 'O tamanho do arquivo enviado é maior que o limite!';
    } else {
      $upload = move_uploaded_file($arqTemp, $nomeNov);
      echo "Arquivo enviado com sucesso. Estamos analisando.\n"; //<a href=\"javascript:window.history.go(-1)\">Voltar</a><br><br>";
      //echo "<a href=\"javascript:history.back();self.location.reload();\">Voltar</a><br><br>";
      echo "<input type=\"button\" value=\"Enviar outra\" onClick=javascript:location.href='upload.php';>";
/*
      $nomeatual    =   $arquivo;
      $nomereal     =   "$trocadenome.$ext";
      $ipreverso    =   gethostbyaddr($_SERVER['REMOTE_ADDR']); 
      $ip           =   $_SERVER['REMOTE_ADDR'];
      date_default_timezone_set("Brazil/East");
      $data         =   date("D - d/m/Y  -  H:i:s");
*/
      include("insertdb.php");
    }
}

print "</pre>";
////////////////////////////////////////////////////////////////////////////////////////////////////
    function after_last ($this, $inthat)
    {
        if (!is_bool(strrevpos($inthat, $this)))
        return substr($inthat, strrevpos($inthat, $this)+strlen($this));
    };
    function strrevpos($instr, $needle)
    {
        $rev_pos = strpos (strrev($instr), strrev($needle));
        if ($rev_pos===false) return false;
        else return strlen($instr) - $rev_pos - strlen($needle);
    };
////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<!--<input type="button" value="Enviar outra" onClick="javascript:history.back();self.location.reload();"><br>
<input type="button" value="Atualizar" onClick="history.go(0)"><br>
<input type="button" value="Voltar" onClick="location.href='<?=$_GET("anterior")?>'" /><br>
<a href="javascript:history.back();self.location.reload();">Voltar</a>-->

</div>
</body>
</html>