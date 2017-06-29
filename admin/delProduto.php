<? include "../admin/cabecalho.php";  echo "\n"?>

   <? include "../admin/valida_cookies.php"; ?>

<?

require_once("../configuracao_mysql.php");

if (isset($_POST[cod])){
$cod = $_POST[cod];
$query = "DELETE FROM tabela_foto WHERE cod=$cod";
mysql_query($query) or die(mysql_error());

if (mysql_affected_rows()==0){
		echo"<b>Produto deletado com sucesso </b><meta http-equiv='refresh' content='2;URL=delProduto.php'>";

	}// fim de linha > 0
	else {
		echo"<b>Produto não encontrado! </b><meta http-equiv='refresh' content='2;URL=delProduto.php'>";
	
	}// fim do else


}//fim do if cod!=null
echo "<form method=post action=\"delProduto.php\" > ";
echo"REF : <input type=\"text\" name=\"cod\"> <br /><input type=\"submit\"> ";
echo"</form>";
?><!-- require once -->
