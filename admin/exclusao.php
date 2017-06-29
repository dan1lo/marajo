
<? include "cabecalho.php"; ?> <br>
<img src="excluir.jpg" width="200" height="50" border="0"><br>
<?
include "valida_cookies.php";
include "config.php";

$sql = mysql_query("SELECT * FROM $tb1");
$linhas = mysql_num_rows($sql);
if (!$sql){
echo "Nao foi possivel fazer a consulta";
}
else {
while ($reg = mysql_fetch_array($sql)){
$titulo = $reg['titulo'];
$data = $reg['data'];
$hora = $reg['hora'];
echo "
<img src=\"seta.jpg\" width=\"10\" height=\"10\" border=\"0\">$data - $hora : Titulo: $titulo  # <a href=\"$PHP_SELF?desejo=excluir&titulo1=$titulo\">Deletar </a># <br>";
}
}
$titulo1= $_GET['titulo1'];
$desejo= $_GET['desejo'];
if ($desejo==excluir)
{
global $titulo;
$sql1 = mysql_query("DELETE FROM $tb1 where titulo='$titulo1' LIMIT 1");
if (!$sql1)
{echo "Nao Foi Excluido";}
else
{echo "Noticia Excluida com sucesso <b>Titulo:</b> $titulo1   <b>Aguarde.....</b><meta http-equiv='refresh' content='4;URL=exclusao.php'>";}
}

?>
<br><BR><BR><BR><BR>
<?
global $linhas;
echo "<b>Total de noticias:</b> $linhas";
?>
<p align="center"><a href=admin.php> Voltar ao Painel Admin </a><br></p>
<BR><BR>
<CENTER><font face=verdana size=1></CENTER>
