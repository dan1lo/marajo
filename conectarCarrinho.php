<?php
$hostname_conn = "cpmy0006.servidorwebfacil.com";
$database_conn = "birocomu_bdmarajo";
$username_conn = "birocomu_marajo";
$password_conn = "1235813";
 
// Conectamos ao nosso servidor MySQL
if(!($conn = mysql_connect($hostname_conn,$username_conn,$password_conn))) 
{
   echo "Erro ao conectar ao MySQL.";
   exit;
}
// Selecionamos nossa base de dados MySQL
if(!($con = mysql_select_db($database_conn,$conn))) 
{
   echo "Erro ao selecionar ao MySQL.";
   exit;
}
?>