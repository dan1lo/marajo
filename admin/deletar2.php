<? include "../admin/cabecalho.php"; ?>
<? include "../admin/valida_cookies.php"; ?>
<?
require_once("../configuracao_mysql.php");
$querry = "DELETE FROM tabela_teste where cod ='$_POST[cod]'";
mysql_query($querry)or die(mysql_error());
echo 	"Produto Retirado";


?>