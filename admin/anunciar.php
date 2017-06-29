<? include "../admin/cabecalho.php"; ?>
<? include "../admin/valida_cookies.php"; ?>
<?
require_once("../configuracao_mysql.php");

//get the agents
?>
<form method=post action="anunciar2.php" enctype="multipart/form-data" name=PostForm onSubmit="return CheckOffer();">
<table align=center width=400>
<caption align=center>
<font color=black face=verdana size=2><b>Cadastrar novo produto </b></font>
</caption>
<tr>
	<td>Nome : </td>
    <td><input type="text" name="nome"/></td>
</tr>	
    <td align=right valign=top>Descri&ccedil;&atilde;o detalhada:</td>
	<td><textarea cols=40 rows=4 name=DetailedDesc></textarea></td>
</tr>
<tr>
	<td align=right valign=top>Fotos:</td>
	<td>
		<input type=file name="images[]"><br>
	</td>
        
</tr>
<tr>
<td align=right valign=top>Refêrecia:</td>
	<td><input type="text" name="cod"> </td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td><input type=submit name=s1 value="Cadastrar"></td>
</tr>

</table>
</form>

