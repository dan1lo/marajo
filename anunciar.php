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
<td align=right valign=top>REF:</td>
	<td><input type="text" name="cod"> </td>
</tr>
<tr>
<td align=right valign=top>Categoria</td>
	<td>	<SELECT name="tipo">
		<OPTION VALUE="tecidolencol">Tecido para Lençol</OPTION>
		<OPTION VALUE="decorativos">Tecidos decorativos</OPTION>
		<OPTION VALUE="flanelado">Flanelado</OPTION>
		<OPTION VALUE="toalhamesa">Tecido p/Toalha de mesa</OPTION>
		<OPTION VALUE="mesaplastica">Mesa Plástica</OPTION>
        <OPTION VALUE="forro">Tecido P/FORRO</OPTION>
        <OPTION VALUE="helanquia">Helanquinha</OPTION>
        <OPTION VALUE="pvc">Plástico PVC Transparente</OPTION>
        <OPTION VALUE="TNT">TNT</OPTION>
	
    <OPTION VALUE="tactel">Tactel</OPTION>
    <OPTION VALUE="oxford">Oxford</OPTION>
    <OPTION VALUE="jeans">Jeans</OPTION>
    <OPTION VALUE="lencolpronto">Lençol Pronto</OPTION>
    <OPTION VALUE="toalha">Toalha</OPTION>
    <OPTION VALUE="panocopa">Pano copa</OPTION>
    <OPTION VALUE="outros">outro</OPTION>
    </SELECT>
    </td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td><input type=submit name=s1 value="Cadastrar"></td>
</tr>

</table>
</form>

