<?php
$username = $_POST['username'];
$senha = $_POST['senha'];
$erro="";
setcookie("username",$username); setcookie("senha",$senha);
echo "<font face=verdana size=1>";
include "config.php";
$sql = "SELECT * FROM $tb2 where login='$username';";
$resultado = mysql_query($sql, $conexao);
$linhas = mysql_num_rows($resultado);
$zoia = mysql_fetch_row($resultado);
if($linhas==0)
	{
		$erro="Usuário não encontrado! $username";
		$erro="<BR><BR><BR><BR><p align=\"center\">Usuário <b>não</b> encontrado <b>Aguarde...</b></p><meta http-equiv='refresh' content='1;URL=index.php'>";
	}
else
	{
		if($senha!=mysql_result($resultado,0,"senha"))
		{
			$erro ="Senha está incorreta!<br>";
			$erro .="Não foi possivel o Login <meta http-equiv='refresh' content='2;URL=index.php'>";
		}		
		else if($senha==mysql_result($resultado,0,"senha"))
		{
			echo "<BR><BR><BR><BR><BR><p align=\"center\">Login Efetuado ! <b>Aguarde....</b></p><meta http-equiv='refresh' content='2;URL=admin.php'>";
		}
		else
		{
			$erro="erro: Contate o Desenvolvedor";
			$erro="<p aling=center><a href=index.php>Voltar</a></p>";
		}
	}	

if(!empty($erro)){
	echo $erro;
	}
mysql_close($conexao);
?>
