<?


//Digite o nome do host do seu servidor, geralmente � "localhost".
$db_host = "cpmy0006.servidorwebfacil.com";

//Digite o nome de usu�rio do banco de dados MYSQL
$db_username = "birocomu_marajo";

//Digite a senha do banco de dados
$db_password = "1235813";

//Digite o nome do banco de dados
$db_name = "birocomu_bdmarajo";

//Digite a URL (endere�o) principal do site, onde est� o arquivo index.php
//$site_url = "http://marajotecidos.com.br/teste/";


$connection = mysql_connect($db_host, $db_username, $db_password) or die(mysql_error());

$db = mysql_select_db($db_name, $connection);



?>
