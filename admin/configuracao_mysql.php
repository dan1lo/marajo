<?


//Digite o nome do host do seu servidor, geralmente � "localhost".
$db_host = "localhost";

//Digite o nome de usu�rio do banco de dados MYSQL
$db_username = "root";

//Digite a senha do banco de dados
$db_password = "123";

//Digite o nome do banco de dados
$db_name = "Marajo_teste";

//Digite a URL (endere�o) principal do site, onde est� o arquivo index.php
$site_url = "http://localhost/Marajo";



		  ////////////////////////////////////////////////////////////
		 //////         N�o edite as linhas abaixo            ///////
                            //////    Qualquer d�vida envie e-mail para:   ///////
                           //////                 moisbach@gmail.com          ///////
	            ///////////////////////////////////////////////////////////

$connection = mysql_connect($db_host, $db_username, $db_password) or die(mysql_error());

$db = mysql_select_db($db_name, $connection);

session_start();

$t = time();


?>
