<? include "../admin/cabecalho.php"; ?>
   <? include "../admin/valida_cookies.php"; ?>
<?
require_once("../configuracao_mysql.php");

//get the agents
?>
<form method=post action="deletar2.php" enctype="multipart/form-data" name=PostForm onSubmit="return CheckOffer();">
<table align=center width=400>
<caption align=center>
<font color=black face=verdana size=2><b>Deletar Produto novo produto </b></font>
</caption>
<td align=right valign=top>Codigo do produto:</td>
	<td><input type="text" name="cod"> </td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td><input type=submit name=s1 value="deletar"></td>
</tr>

</table>
</form>

