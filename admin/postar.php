
 <? include "../admin/cabecalho.php"; ?>
<?
include "../admin/config.php";
include "../admin/valida_cookies.php";
$data= $_POST['data'];
$hora= $_POST['hora'];
$ip= $_POST['ip'];
$titulo= $_POST['titulo'];
$msg = $_POST['msg'];
$msgintro = $_POST['msgintro'];
if (empty($titulo) && empty($msg))
{
echo "Todos os campos obrigatórios";
}
else {
include "../admin/config.php";
global $tb1;
$sql= mysql_query("INSERT INTO $tb1 (msg,msgintro, titulo, data, hora, ip) VALUES ('$msg','$msgintro','$titulo','$data','$hora','$ip');");
if (!$sql)
{
echo "Não foi possivel postar a noticia<br><br> ";
} else {
echo "
<BR>
<font face=verdana size=1>
<b>Titulo:</b> $titulo<br>
<b>Mensagem:</b> $msg<BR>
<b>Data:</b> $data<br>
<b>Hora:</b> $hora<BR>
<b>Ip do Postador:</b> $ip<BR>
<BR><h3>Noticia Postada com sucesso !</h3></font>";
}
}
?>
<BR><BR><BR><BR><BR>
<center><a href=../admin/admin.php> Voltar ao painel Admin</a> | <a href=../admin/noticia.php> Postar Outra noticia</a></center>
<BR><BR><BR><BR>
<CENTER><font face=verdana size=1></CENTER>
