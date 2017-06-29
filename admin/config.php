<?
$site = "marajotecidos.com.br"; // Digite a url do site que vai instalar.

$host = "cpmy0006.servidorwebfacil.com"; // Host valor padrao é localhost

$usuariodb="birocomu_marajo"; //Usuario de Conexao com  o MySQL

$senhadb="1235813"; // Senha de Conexao com o MySQL

$db="birocomu_bdmarajo"; //Banco de Dados MySQL

$tb1="msgs"; // NAO ALTERE AQUI DE MANEIRA ALGUMA !!

$tb2="usuarios"; // NAO ALTERE AQUI DE MANEIRA ALGUMA !!

$nnoticias="1"; // Coloque aqui o nºde noticias exibidas por vez

$useradmin="marajotecidos"; // Coloque aqui o seu usuario Administrador

$senhaadmin="marajo2358"; // Sua senha do administrador para o acesso ao painel

$conexao=mysql_connect ("$host", "$usuariodb", "$senhadb") or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ("$db") or die("não foi possivel");
?>
