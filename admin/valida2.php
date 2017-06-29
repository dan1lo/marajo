<?
$login = $_POST['username'];
$senha = $_POST['senha'];
include "config.php";
global $senha;
$sql = mysql_query("SELECT * FROM $tb2 where login='$login' && senha='$senha'");
$linhas = mysql_num_rows($sql);
if (!$sql)
{ echo "Não foi possivel completar a consulta"; }
else{
if ($linhas==1){
setcookie("username",$username); setcookie("senhauser",$senha);
echo "<meta http-equiv='refresh' content='2;URL=admin.php'>";
}
else {
echo "Login ou Senha Incorreta  $login $senha";
}
}
?>
