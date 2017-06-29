<?php

/**
 * APG - Gerador de Enquetes - Versão 1.0
 * Copyright (C) 2003  Álvaro Paniago Gonçalves <retafinal@yahoo.com>
 * http://www.grandems.hpg.com.br
 * http://www.esportems.com.br
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * @author  Álvaro Paniago Gonçalves <retafinal@yahoo.com>
 * @version 1.0
 */


// para conectar ao banco
include ("./apgconecta.php");

 // essa parte só é executada quando se clicar num
 // dos ícones da listagem 
  if ($modo==1) // excluir
    {
	  $sql1 = "DELETE FROM perguntas where id=$id";
	  $sql2 = "DELETE FROM respostas where id=$id";
 	  $result1 = mysql_query($sql1);
	  $result2 = mysql_query($sql2);
	  $sDocu = "";
	  unset($modo);
	  header ("Location: apgindex.php");  
    }
  elseif ($modo==2) // ativar enquete
    {
	  $sql1 = "UPDATE perguntas SET status='N'";
  	  $result1 = mysql_query($sql1);
	  $sql2 = "UPDATE perguntas SET status='S' WHERE id=$id";
  	  $result2 = mysql_query($sql2);
	  $sDocu = "";
	  unset($modo);
	  header ("Location: apgindex.php");  
    }
  // fim das alterações através do ícones

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
     //inclui a pergunta
	 $sData = date("Y-m-d");
	 $sql = "INSERT INTO perguntas (pergunta,status,data) ".
	 "VALUES ('$sDocu','N','$sData')";
	 $result = mysql_query($sql);
 	 $sId = mysql_insert_id();
	 $sDocu = "";
	 header ("Location: apgindex.php");  
	} 
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="estiloIE.css">
<title>Cadastro de Enquetes</title>

<script language="javascript">
<!--
function orcamento ()  
  {
    cx1 = document.all['sDocu'];
    if (cx1.value == "")
	  {
		alert ("A pergunta não poderá ser vazia!");
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
<form method="POST" name="form" action="apgindex.php"  autocomplete="off" > 
<br>
<p class='titulo' align='center'><b>Inclusão de enquetes</b></p>
<br>
<p class='titulo' align='center'>Pergunta:&nbsp;&nbsp;<input class="text" type="text" tabindex=1  name="sDocu" value="" size="50" maxlength="50">
<br><br><br>
  <p align="center" style="word-spacing: 1; margin-right: 0; margin-top: 1; margin-bottom: 0"><img border="0" src="ok.gif" name="enviar" alt="Submeter os valores" align="center" style="cursor:hand" onclick="orcamento();"></p>
</form>

<!-- até aqui grava a pergunta e a partir da próxima linha
     segue a listagem para manutenção -->

  <p class='titulo' align='center'><b>Enquetes Disponíveis</font></b></p>
  <table border="1" width="100%" cellspacing="0" bordercolordark="white" bordercolorlight="black">
    <tr>
      <td width="25%" bgcolor="#0099CC" align="center" class="txt">Ação</font></td>
      <td width="75%" bgcolor="#0099CC" align="left" class="txt">Pergunta da enquete</td>
    </tr>
      <?php 
      // perguntas disponíveis
       $srespostas  = "select id, pergunta, DATE_FORMAT(data, '%d/%m/%Y') as data, status from perguntas order by data";        
      $rsrespostas = mysql_query($srespostas);
	  $cor = 0;
      while ($pm_partners = mysql_fetch_array($rsrespostas))
       { 
         $cor = $cor + 1;
		   ?>
       <tr>
         <td class="relatorio" width="15%" align="center" <? if ($cor % 2 == 0) { echo 'bgcolor="#D7F2FF"'; } else { echo 'bgcolor="#E5E5E5"';}  ?>>
		 <? if ($pm_partners[status]=="N") 
			 { 
			    echo "<a href='apgindex.php?modo=1&id=$pm_partners[id]'><img src='lixo_on.gif' border='0' title='Excluir esta enquete'></a>"; 
			  } 
			else 
			  { 
				echo "<img src='lixo_off.gif' border='0'> "; 
			  }?>&nbsp;&nbsp;<a href='apgincluirresposta.php?id=<?php echo "$pm_partners[id]";?>'><img src='reply.gif' border='0' title='Incluir as questões desta pergunta'></a>&nbsp;&nbsp;<a href='apgindex.php?modo=2&id=<?php echo "$pm_partners[id]";?>'><img  <? if ($pm_partners[status]=="S") { echo "src='ativar_on.gif'"; echo "title='Desativar esta enquete'"; } else { echo "src='ativar_off.gif'"; echo "title='Ativar esta enquete'"; }?>  border='0' ></a> </td>
         <td class="relatorio" width="15%" align="left" <? if ($cor % 2 == 0) { echo 'bgcolor="#D7F2FF"'; } else { echo 'bgcolor="#E5E5E5"';}  ?>><?php echo "$pm_partners[pergunta]\n";?></td>
        </tr>
      <? }   
      ?>
  </table>
<p class='fip' align='left' align="left" style="word-spacing: 1; margin-right: 0; margin-top: 1; margin-bottom: 0"><img src='ip.gif' border='0'>&nbsp;<? echo $REMOTE_ADDR; ?></p>
</body>

</html>


