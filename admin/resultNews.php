<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lista de e-mails</title>
</head>
<?

include ("conectarbd.php");

$conexao = mysql_connect($endereco,$user,$senha);

mysql_select_db($bd);
$qr1 = "SELECT * FROM newsletter";

$row = mysql_query($qr1);
$linhas = mysql_num_rows($row);
if ($linhas==0){
echo "<BR><BR><BR><p align=\"center\"><h3><b>Não</b> Há Resultados com essa Pesquisa</p></h3>";
}else{
$cont=0;
while ($reg = mysql_fetch_array($row)){
$cont = $cont+1;
$nome = $reg['nome'];
$mail = $reg['mail'];
echo "<p align=\"center\">Cliente numero : ".$cont." <br /> </p>";
echo "<p align =\"center\"><tr><td> <b>Nome</b> : ".$nome."</td> <br /><td><b>E-mail: </b>".$mail."</td> </tr> <br/><br /></p>";

  }
}

?>
<body>
</body>
</html>
