
 <? include "../admin/cabecalho.php"; ?>
  <? include "../admin/valida_cookies.php"; ?>
<font face=verdana size=1>
<?
include "../admin/config.php";

$sql = mysql_query("SELECT * FROM $tb2");
$linhas = mysql_num_rows($sql);
echo "Temos $linhas usuario(s) cadastrados<br><br>";
if (!$sql){
echo "Nao foi possivel fazer a consulta";
}
else{
while ($reg = mysql_fetch_array($sql)){
$nome = $reg['nome'];
$usuario = $reg['login'];
$senha = $reg['senha'];
echo "
<form method=post action=$PHP_SELF?desejo=excluir>
<input type=hidden name=usuario value=\"$usuario\">
<b>Nome:</b> $nome<br>
<b>Usuario:</b> $usuario<br>
<b>Senha:</b> ***** <br>
<input type=submit value= Excluir Usuario style=\"font-family: Verdana; font-size: 8 pt; font-weight: bold\">
<br><br> </form>
";
}
}
$usuario = $_POST['usuario'];
$desejo= $_GET['desejo'];
if ($desejo==excluir)
{
$sql1 = mysql_query("DELETE FROM $tb2 where login='$usuario'");
if (!$sql1)
{echo "Nao Foi Excluido";}
else
{echo "Usuario Excluido com sucesso <b>Usuario:</b> $usuario   <b>Aguarde..</b><meta http-equiv='refresh' content='2;URL=admin/users.php'>";}
}
?>
<center> <a href=../admin/admin.php>Voltar a administracao</a> </center>
</font>
<BR><BR><BR><BR>
<CENTER></CENTER>
