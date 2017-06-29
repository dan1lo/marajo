<?php
include ("./apgconecta.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Ativa&ccedil;&atilde;o de enquete</title>

</head>
<body>
<script type="text/javascript" src="enqueteValida.js"></script>
<form onsubmit="JavaScript:return enquete();" method="POST" name="form" action="cadEnquete.php"  autocomplete="off" > 
<br>
<p class='titulo' align='center'><b>Inclusão de enquetes</b></p>
<br>
<p class='titulo' align='center'>Pergunta:&nbsp;&nbsp;<input class="text" type="text" tabindex=1  name="enqueteNome" value="" size="50" maxlength="50"> 
  <p class='titulo' align='center'>Resposta:&nbsp;&nbsp;<input class="text" type="text" tabindex=1  name="resp1" value="" size="30" maxlength="30">
  <p class='titulo' align='center'>Resposta:&nbsp;&nbsp;<input class="text" type="text" tabindex=1  name="resp2" value="" size="30" maxlength="30">
  <p class='titulo' align='center'>Resposta:&nbsp;&nbsp;<input class="text" type="text" tabindex=1  name="resp3" value="" size="30" maxlength="30">
  <p class='titulo' align='center'>Resposta:&nbsp;&nbsp;<input class="text" type="text" tabindex=1  name="resp4" value="" size="30" maxlength="30">
   <p align="center" style="word-spacing: 1; margin-right: 0; margin-top: 1; margin-bottom: 0"><input type="image" src="ok.gif" name="enviar" alt="Submeter os valores" align="center" style="cursor:hand"></p>
</form>
</body>
</html>

