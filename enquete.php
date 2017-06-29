
<div id="enquete">
<div id ="LateralEnquete">
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div>
<div id="LateralEnquete2">
	<?php
	include ("apgconecta.php");	 
	$id = "SELECT MAX(id) FROM perguntas";
	$result = mysql_query($id);
	$resultId = mysql_fetch_row($result);
	$teste = $resultId[0];
    $pergunta = "SELECT pergunta FROM perguntas WHERE id ='$teste'";
	$resultPergunta = mysql_query($pergunta);
	$query_row = mysql_fetch_array($resultPergunta);
	?> <span class="newLetra"> <?
	echo $query_row[pergunta]."\n";
	$mysqldb = new mysqli("cpmy0006.servidorwebfacil.com","birocomu_marajo","1235813", "birocomu_bdmarajo"); 
	$query = "SELECT resposta, unico FROM respostas WHERE id = '$teste'";
	 $result = $mysqldb->query($query);
	 $op = 0;?><form method="post" action="resultadodaenquente.php" >
	 <? while ($row=$result->fetch_object()){ 
      $op= op+1;?>
     <input type="radio" name="enquete" value="<? echo $row->unico ?>" /><? echo $row->resposta ?> <br />
     <? }?>
     &nbsp;&nbsp;&nbsp; <input type="image" src="imagens/opnar.gif" value="enviar">
	</span>
    </form>
  </div>  
</div>
