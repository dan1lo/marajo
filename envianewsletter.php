<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<meta name="author" content="Danilo Monteiro" />
    <link href="estilos.css" rel="stylesheet" type="text/css" />
    <link href="enquente.css" rel="stylesheet" type="text/css" />
    <link href="fontes.css" rel="stylesheet" type="text/css" />
    <link href="newsletter.css" rel="stylesheet" type="text/css" />
 
	<title>Marajo Textil</title>
</head>

<body>
<div id="geral">
    <div id="topo">
    <?php
        include("topo.php");
    ?>
    
    </div><!-- fim da div topo -->
    <div id="meio">
        <div id="coluna-lateral">
        <?php
            include("coluna-lateral.php");
        ?>
        </div><!--fim do div lateral -->
        <div id="coluna-meio">
      <div class="texto1">
       <?php 
include ("conectarbd.php");


$conexao = mysql_connect($endereco,$user,$senha);

mysql_select_db($bd);

	if(!($id = mysql_connect($endereco,$user,$senha))){

	echo " Não foi possivel conectar o MySQl";

	exit; // caso tiver algum erro na conexao verificar o arquivo conectarbd.php
	} else{
		// se tiver tudo ok entra
		$nome=$_POST["nome"];
		$mail=$_POST["mail"];
		$sql = mysql_query("INSERT INTO newsletter VALUES ('$nome','$mail') ")or die (mysql_error());

		$linha= mysql_affected_rows();
		if($linha=1){

		?> <div id="textocentro"> <?php
			echo "<h1>            <br /> <br /> <br /> <br/> <br />     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Cadastro efetuado com sucesso</h1>"; ?></div><?php
			mail($_POST["mail"], "A Marajó tecidos agradece seu cadastro", "Obrigado, Você foi cadastrado para receber as novidades da Marajó tecidos em seu e-mail gratuitamente");
		echo "<meta http-equiv='refresh' content='2;URL=index.php'>";
		}
		else{
			echo("Problemas no cadastro");
			mail("danilomonteiroo@gmail.com", "Erro ao cadastrar e-mail no site marajo", " BIRO Comunicações");
		
		}

}
?>
</div><!-- fim da div texto -->
        </div><!-- fim do div coluna-meio-->
    </div><!-- fim da div meio -->
    <div id="rodape">
    <?php include("rodape.php"); ?>
    </div><!-- fim da div rodape -->

</div><!-- fim da div geral -->



</body>
</html>


