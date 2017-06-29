<?php
// conecta ao banco
include ("./apgconecta.php");

// se modo for igual a 1 grava. Isso possibilitará alguém
// colocar uma opção para somente ver a votação.
// Neste caso, basta chamar o popup do arquivo apgvota.php
// passando um número diferente de 1 na variável modo
if ($modo==1)
  {
     $categoria  = "UPDATE respostas SET voto=voto+1 WHERE unico=$qual";
     $rcategoria = mysql_query($categoria) or die ("Erro $categoria");
  }

// pega a pergunta ativa
$spergunta  = "select id, pergunta from perguntas where id=$id";        
$rspergunta = mysql_query($spergunta);
$wpergunta = mysql_result($rspergunta,0,"pergunta");
$wid = mysql_result($rspergunta,0,"id");

// possíveis respostas
$srespostas  = "select unico, id, resposta, voto from respostas where id=$id order by unico";        
$rsrespostas = mysql_query($srespostas);

// somatória para criar os percentuais
$sres   = "select sum(voto) as voto from respostas where id=$id";        
$rsres  = mysql_query($sres);
$wtotal = mysql_result($rsres,0,"voto");
// fim da somatória

?>
<!doctype html public "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Parcial da enquete</title>
<meta name="Generator" content="EditPlus">
<meta name="Author" content="">
<meta name="Keywords" content="">
<meta name="Description" content="">
</head>

<body >
	  <p align="center"><font face="Verdana" size="1">&nbsp;<? echo $wpergunta;?><br><b>Resultado Parcial</b></font></p>
	  <p align="left"><font face="Verdana" size="1">
	  <?	  
 	  $i = 0; $j = 1;
	  // monta o resultado. 
	  // A variavel $j servirá para montar as barras dos gráficos
	  // (arquivos gif que possuem os nomes g1, g2..., g10)
	  while ($pm_partners = mysql_fetch_array($rsrespostas))
	   {
	     $i = number_format(((100 * $pm_partners[voto]) / $wtotal),0);
		 $j = $j + 1;
	     echo "$pm_partners[resposta] ( $pm_partners[voto] )  <img src='g$j.gif' width='$i' height='10'>$i%<br>";
	   }
	  ?>
      </p>

<p align="center" style="word-spacing: 1; margin-right: 0; margin-top: 1; margin-bottom: 0"><input type='image' border='0' src='pesquisa.gif' title='Fechar' onclick='javascript:window.close();'></p>
</body>
</html>
