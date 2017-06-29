<?php
 // conecta no banco
 include ("./apgconecta.php");

  // essa parte só é executada quando se clicar no ícone de exclusão
  if ($modo==1) // excluir
    {
	  $sql2 = "DELETE FROM respostas where id=$id and resposta='$resposta'";
	  $result2 = mysql_query($sql2);
	  $sDocu = "";
	  unset($modo);
	  header ("Location: apgincluirresposta.php?id=$id");  
    }

  // reconfigura a variável
  // para evitar gravação errada
  // somente grava quando houver dados
  // digitados
  if (isset($sDocu))
    {
       $sDocu = $sDocu;
     }
   else
     {
      $sDocu = "";
     } 

 // só grava se teve alguma pergunta digitada
 if ($sDocu!="") 
   {
     //inclui a resposta
	 $sData = date("Y-m-d");
	 $sql = "INSERT INTO respostas (id,resposta,data,voto) ".
	 "VALUES ('$id','$sDocu','$sData',0)";
	 $result = mysql_query($sql);
 	 $sId = mysql_insert_id();
	 $sDocu = "";
	 header ("Location: apgincluirresposta.php?id=$id");  
	} 
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="estiloIE.css">
<title>Cadastro de Respostas</title>
<script language="javascript">
<!--
function orcamento ()  
 {
   cx1 = document.all['sDocu'];
   if (cx1.value == "")
	 {
	   alert ("A resposta não poderá ser vazia!");
	   cx1.focus();
	   return false;
	 }
   document.forms[0].submit();
   cx1.value = "";
  }

//-->
</script>

</head>
<body onload="document.all['sDocu'].focus();" > 
<? 
 // possíveis respostas
 $spergunta  = "select pergunta from perguntas where id=$id";        
 $rspergunta = mysql_query($spergunta) or die ("Falhou a pesquisa $spergunta");
 ?>
<form method="POST" name="form" action="apgincluirresposta.php"  autocomplete="off" > 
<input type="hidden" name="id" value=<? echo $id;?>>
<br>
<p class='titulo' align='center'><b>Inclusão de Respostas da Pergunta<br></b><font color='#CC6633'><? echo mysql_result($rspergunta,0,"pergunta");?></p>
<br>
<p class='titulo' align='center'>Resposta:&nbsp;&nbsp;<input class="text" type="text" tabindex=1  name="sDocu" value="" size="30" maxlength="30">
<br><br><br>
  <p align="center" style="word-spacing: 1; margin-right: 0; margin-top: 1; margin-bottom: 0"><img border="0" src="ok.gif" name="enviar" alt="Submeter os valores" align="center" style="cursor:hand" onclick="orcamento();"></p>
</form>

  <p class='titulo' align='center'><b>Respostas Disponíveis desta Pergunta</font></b></p>
  <table border="1" width="100%" cellspacing="0" bordercolordark="white" bordercolorlight="black">
    <tr>
      <td  bgcolor="#0099CC" align="center" class="txt">Ação</font></td>
      <td  bgcolor="#0099CC" align="left" class="txt">Respostas</td>
      <td  bgcolor="#0099CC" align="left" class="txt">Votos</td>
    </tr>
      <?php 
      // possíveis respostas
       $srespostas  = "select unico,id, resposta, DATE_FORMAT(data, '%d/%m/%Y') as data, voto from respostas where id=$id order by id";        
      $rsrespostas = mysql_query($srespostas);
	  $cor = 0;
      while ($pm_partners = mysql_fetch_array($rsrespostas))
       { 
         $cor = $cor + 1;
		   ?>
       <tr>
         <td class="relatorio"  align="center" <? if ($cor % 2 == 0) { echo "bgcolor='#D7F2FF'"; } else { echo "bgcolor='#E5E5E5'";}  ?>>
		 <a href='apgincluirresposta.php?modo=1&id=<? echo $pm_partners[id]; ?>&resposta=<? echo $pm_partners[resposta];?>'><img src='lixo_on.gif' border='0' title='Excluir esta resposta'></a> 
        </td>
         <td class="relatorio"  align="left" <? if ($cor % 2 == 0) { echo 'bgcolor="#D7F2FF"'; } else { echo 'bgcolor="#E5E5E5"';}  ?>><?php echo "$pm_partners[resposta]\n";?></td>
         <td class="relatorio"  align="left" <? if ($cor % 2 == 0) { echo 'bgcolor="#D7F2FF"'; } else { echo 'bgcolor="#E5E5E5"';}  ?>><?php echo "$pm_partners[voto]\n";?></td>

        </tr>
      <? }   
      ?>
  </table>
<p class='fip' align='left' align="left" style="word-spacing: 1; margin-right: 0; margin-top: 1; margin-bottom: 0"><img src='ip.gif' border='0'>&nbsp;<? echo $REMOTE_ADDR; ?>&nbsp;&nbsp;<img src='back.gif' border='0' title='Voltar a página principal' onclick='javascript:history.go(-1)' style='cursor:hand'></p>
</body>

</html>


