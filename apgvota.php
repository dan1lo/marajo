<?php

/*
 # Está é a rotina que gera a enquete para colocar na página
 # Quando o usuário quiser votar, o arquivo apgresu.php é 
 # chamado. Lá se grava o voto e apresenta o resultado numa
 # janela pop-up.
 # O campo data nos 2 bancos servirão para quem quiser controlar
 # quem já votou no dia. Fica pra algum amigo implementar!
 */


// conecta ao banco
include ("apgconecta.php");

// pega a pergunta ativa
$spergunta  = "select id, pergunta from perguntas where status='S'";        
$rspergunta = mysql_query($spergunta);
$wpergunta = mysql_result($rspergunta,0,"pergunta");
$wid = mysql_result($rspergunta,0,"id");

// possíveis respostas
$srespostas  = "select unico, id, resposta from respostas where id=$wid order by unico";        
$rsrespostas = mysql_query($srespostas);

 // grava o voto dado
 if ($resp!="") 
   {
     $categoria  = "UPDATE respostas SET voto=voto+1 WHERE unico=$resp";
     $rcategoria = mysql_query($categoria);
   }

?>
<!doctype html public "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Enquete</title>
<meta name="Generator" content="EditPlus">
<meta name="Author" content="">
<meta name="Keywords" content="">
<meta name="Description" content="">
<script language="javascript">
<!--
function orcamento ()  
 {
  document.forms[0].submit();
 }

function impre_pes(parm1)
 {
    window.open("apgresu.php?id="+parm1+"&modo=1&qual="+document.all['qual'].value,"_new","toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=0,resizable=0,width=180,height=210");
  }

function passarValor(parm1)
  { 
    document.all['qual'].value = parm1; 
  } 

 -->
</script>
</head>

<body>
	<form method="POST" action="apgresu.php">
      <input type="hidden" name="qual"> 

	  <p align="center"><font face="Verdana" size="1">&nbsp;<? echo $wpergunta;?></font></p>
	  <p align="left"><font face="Verdana" size="1">
	  <?	  
 	  $i = 0;
	  while ($pm_partners = mysql_fetch_array($rsrespostas))
	   {
	     $i = $i + 1;
	     echo "<input type='radio' value='$pm_partners[unico]' name='resp' checked onclick='passarValor($pm_partners[unico])'> $pm_partners[resposta]<br>";
	   }
	  ?>
      </p>
	</form>
<p align="center" style="word-spacing: 1; margin-right: 0; margin-top: 1; margin-bottom: 0"><input type='image' border='0' src='ok.gif' title='Ver o resultado' onclick='impre_pes(<? echo "$wid";?>);'></p><br>
</body>
</html>
