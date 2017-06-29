<?
if(!empty($_GET[Start]))
{
	$Start = $_GET[Start];
}
else
{
	$Start = '0';
}
$tipo=$_GET[tipo];

$ByPage = $Start+10;
require_once("configuracao_mysql.php");
$q1= "SELECT * FROM tabela_foto where DetailedDesc LIKE '%$tipo%' limit $Start, $ByPage";




$r1 = mysql_query($q1) or die(mysql_error());
$lrows = mysql_num_rows($r1);
//////////////////////////////////////////////////////////////////////////////////////


if($lrows > '0')
{
	echo "<table align=center width=530 border=0 cellspacing=0>\n";
    echo "<tr>\n<td width=75>&nbsp;</td>\n\t";
		
	echo "</tr>\n</table>\n\n";

	echo "<table align=center width=530 border=0 cellspacing=0>\n";

	while($a1 = mysql_fetch_array($r1))
	{
			$images = explode("|", $a1[image]);
			$MyImage = $images[0];
		echo "<td style= border=0 onMouseOver=\"this.style.background='#F4F4F4'; this.style.cursor='hand'\" onMouseOut=\"this.style.background='white'\" >\n\t";
		echo "<td height=88>";

		echo "<table align=center width=\"90%\">\n";
		

		echo "<tr>\n\t<td width=117>";

		if(!empty($a1[image]))
		{
			$images = explode("|", $a1[image]);
			$MyImage = $images[0];

			echo "<a href =\"fotos_anuncios/$MyImage\" TARGET=\"_blank\"> <img src=\"fotos_anuncios/$MyImage\" width=117 height=88 border=1 > </a>";
		}
		else
		{
			echo "<img src=\"no_image.gif\" border=1>";
		}
		echo "</td>\n\t";

		echo "<td width=225 valign=top><b>Nome:</b><br />$a1[nome] <br /><b>REF: $a1[cod]</b><br><b>Descrição:</b><br />$a1[DetailedDesc] <br/></td><td>
<a href='carrinho.php?cod=".$a1[cod]."&acao=incluir'><img src='imagens/add_carrinho.jpg'</a>
</td>\n\t";
		echo "<img src=\"imagens/traco.gif\" width=\"533\"/>	<!-- imagem do traço-->";  
		echo "</tr>\n";
		echo "</table>\n\n</td>\n</tr>\n\n";
    
	}

	echo "</table>";
		$q2= "SELECT * FROM tabela_foto where DetailedDesc LIKE '%$tipo%'";
		$r2 = mysql_query($q2) or die(mysql_error());
		$rows = mysql_num_rows($r2);
		echo"<br><table align=center width=580>";
		echo"<td align=center><font face=verdana size=2> ";
		if ($Start>0){
					$Start = $Start-10;
					echo "| <a href=\"BuscarDes.php?Start=$Start&tipo=$tipo\" >Anterior</a>";
				
				}
				
			if($rows>$ByPage){	
			echo "| <a href=\"BuscarDes.php?Start=$ByPage&tipo=$tipo\" >Proximo </a>";
			}
		echo "</td>";

		echo "</table><br>\n";
		
}

else
{
	echo"<br><br><center>Nenhum resultado encontrado!</center>";
}

?>