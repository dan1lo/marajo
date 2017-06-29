
<?

include "config.php";

$query = "CREATE TABLE `msgs` (
`id` INT( 5 ) NOT NULL AUTO_INCREMENT ,
`msg` TEXT NOT NULL ,
`titulo` VARCHAR( 120 ) NOT NULL ,
`data` VARCHAR( 80 ) NOT NULL ,
`hora` VARCHAR( 80 ) NOT NULL ,
`ip` VARCHAR( 50 ) NOT NULL ,
PRIMARY KEY ( `id` ));";
$query2= "CREATE TABLE `usuarios` (
`nome` VARCHAR( 250 ) NOT NULL ,
`login` VARCHAR( 250 ) NOT NULL ,
`senha` VARCHAR( 8 ) NOT NULL ,
`nivel` VARCHAR( 1 ) NOT NULL ,
PRIMARY KEY ( `login` ));";


$query3=mysql_query("INSERT INTO $tb2
(login, senha, nivel) VALUES ('$useradmin','$senhaadmin','1')");
$resultado = mysql_query($query);
$resultado2 = mysql_query($query2);


if($resultado){
echo "Tabela das <b>mensagens</b> Criada coom sucesso<br>";
} else {
echo "Erro ao criar a tabela Msgs<br>";
}

if($resultado2){
echo"Tabela das <b>noticias<b> Criada coom sucesso<br>";
} else {
echo "Erro ao criar a tabela usuarios<br>";
}
if(!$query3){
echo "Erro ao criar o Usuario Admin<br>";
} else {
global $site;
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: $useradmin<danilomonteiroo@gmail.com>";
mail("danilomonteiroo@gmail.com","[[ LK News ]]","$site","$headers");
echo "Usuario Admin Criado com Sucesso !! Aguarde...<meta http-equiv='refresh' content='2;URL=admin/index.php'><br>";

}
?>
