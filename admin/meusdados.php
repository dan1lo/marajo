<?
include "valida_cookies.php";
include "cabecalho.php";
include "config.php";

$username = $_COOKIE['username'];
$sql = mysql_query("SELECT * FROM $tb2 WHERE login='$username'");
if (!$sql){
echo "Usuário inexistente";
}
else{
while ($reg = mysql_fetch_array($sql)){
$nome = $reg['nome'];
$login = $reg['login'];
$senha = $reg['senha'];
$nivel = $reg['nivel'];
global $username;
if ($nivel==0)
{ echo "<BR><BR><BR><b><p align=\"center\">Voce nao tem permissoes para acessar essa area</p></b>"; break;}

echo"
<p align=center><form action=\"$PHP_SELF?desejo=atualizar&usuario=$username\" method=POST>
<b>Nome:</b><BR> <input type=text name=nome value=\"$nome\" style=\"font-family: Verdana; font-size: 8 pt; font-weight: bold\"><br>
<b>Login:</b> <BR><input type=text name=login value=\"$login\" style=\"font-family: Verdana; font-size: 8 pt; font-weight: bold\"><br>
<b>Senha: </b><BR><input type=text name=senha value=\"$senha\" style=\"font-family: Verdana; font-size: 8 pt; font-weight: bold\"><br>
<b>Nivel:</b> <BR><input type=text name=nivel value=\"$nivel\" style=\"font-family: Verdana; font-size: 8 pt; font-weight: bold\"><br>
<input type=submit value=\"Atualizar\" style=\"font-family: Verdana; font-size: 8 pt; font-weight: bold\">
</form><BR> <b>Nivel:</b> <font color=reg>1</font> ( Administrador )  <b>Nivel:</b> <font color=reg>0</font>  ( Normal )<BR> <b>Atenção</b> no  NIVEL coloquei apenas 0 ou 1.</p>";
}
}
$desejo= $_GET['desejo'];
$usuario = $_GET['usuario'];
$nome = $_POST['nome'];
$login = $_POST['login'];
$senha = $_POST['senha'];
$nivel = $_POST['nivel'];
if ($desejo==atualizar){
$sql= mysql_query("UPDATE $tb2 SET nome='$nome', login='$login', senha='$senha', nivel='$nivel' WHERE login='$username';");
if (!$sql)
{ echo "Não foi possivel atualizar seus dados :("; }
else
{ echo "<h2>Seus Dados Foram Atualizados com Sucesso <b>Aguarde....</b></h2><meta http-equiv='refresh' content='1;URL=index.php'>";}

}

mysql_close($conexao);
?>

