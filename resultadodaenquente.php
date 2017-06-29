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
       	<?php
		include ("./apgconecta.php");	
			$op = $_POST['enquete'];

			$atualizar="UPDATE respostas SET voto=voto+1 WHERE unico='$op'";
			$teste = mysql_query($atualizar)  or die('Query failed. '.mysql_error());			
			$query = "SELECT id FROM respostas WHERE unico ='$op'";
			$idPro = mysql_query($query) or die (mysql_error());
			$resultId = mysql_fetch_row($idPro);
			$id = $resultId[0];

			$query2 = "SELECT resposta,voto FROM respostas WHERE id = '$id'";
			
			$mysqldb = new mysqli("cpmy0006.servidorwebfacil.com","birocomu_marajo","1235813", "birocomu_bdmarajo"); 
			$sres   = "select sum(voto) as voto from respostas where id=$id";        
			$rsres  = mysql_query($sres) or die(mysql_error());
			$resultsumId = mysql_fetch_row($rsres);
			$wtotal = $resultsumId[0];
			$result = $mysqldb->query($query2);
			echo " A Marajo tecidos agradece seu voto \n";
			echo "\n";
			echo "<br />";
			while ($row =$result->fetch_object()){ 
			 	 $i = number_format(((100 * $row->voto) / $wtotal),0);
				 $j = $j + 1;
	     		echo "$row->resposta ( $row->voto )  <img src='g$j.gif' width='$i' height='10'>$i%<br>";
			
			}
		?>
        </div><!-- fim do div coluna-meio-->
    </div><!-- fim da div meio -->
    <div id="rodape">
    <?php include("rodape.php"); ?>
    </div><!-- fim da div rodape -->

</div><!-- fim da div geral -->



</body>
</html>