<?

require_once("../configuracao_mysql.php");
$q1= "SELECT * FROM tabela_teste";

$r1 = mysql_query($q1) or die(mysql_error());
$lrows = mysql_num_rows($r1);

if($lrows > '0')
{
	echo "<table align=center width=530 cellspacing=0>\n";
    echo "<tr>\n<td width=75>&nbsp;</td>\n\t";
		
	echo "</tr>\n</table>\n\n";

	echo "<table align=center width=530 border=0 bordercolor=#336699 rules=rows cellspacing=0>\n";

	while($a1 = mysql_fetch_array($r1))
	{
		echo "<tr style=\"border-width:0; border-color:blue\" onMouseOver=\"this.style.background='#F4F4F4'; this.style.cursor='hand'\" onMouseOut=\"this.style.background='white'\">\n\t";
		echo "<td height=60>";

		echo "<table align=center width=\"90%\">\n";
		

		echo "<tr>\n\t<td width=75>";

		if(!empty($a1[image]))
		{
			$images = explode("|", $a1[image]);
			$MyImage = $images[0];

			echo "<img src=\"fotos_anuncios/$MyImage\" width=75 height=60 border=1>";
		}
		else
		{
			echo "<img src=\"no_image.gif\" border=1>";
		}
		echo "</td>\n\t";

		echo "<td width=225 valign=top><b>Código do produto: $a1[cod]</b><br>$a1[DetailedDesc]</td>\n\t";
		echo "</tr>\n";
		echo "</table>\n\n</td>\n</tr>\n\n";

	}

	echo "</table>";
	
			/*$rows = mysql_num_rows($rnav);

			if($rows > $ByPage)
			{
				$ListingTable .=  "<br><table align=center width=580>";
				$ListingTable .= "<td align=center><font face=verdana size=2> | ";

				$pages = ceil($rows/$ByPage);

				for($i = 0; $i <= ($pages); $i++)
				{
					$PageStart = $ByPage*$i;
	
					$i2 = $i + 1;
	
					if($PageStart == $Start)
					{
						$links[] = " <span class=RedLink>$i2</span>\n\t ";
					}
					elseif($PageStart < $rows)
					{
						$links[] = " <a class=BlackLink href=\"buscador.php?Start=$PageStart&c=$_GET[c]&s=$_GET[s]&AgentID=$_GET[AgentID]&search_city=$_GET[search_city]&search_state=$_GET[search_state]&search_country=$_GET[search_country]&search_PropertyType=$_GET[search_PropertyType]&MinPrice=$_GET[MinPrice]&MaxPrice=$_GET[MaxPrice]&rooms1=$_GET[rooms1]&rooms2=$_GET[rooms2]&bath1=$_GET[bath1]&bath2=$_GET[bath2]&before=$_GET[before]&school=$_GET[school]&transit=$_GET[transit]&park=$_GET[park]&ocean_view=$_GET[ocean_view]&lake_view=$_GET[lake_view]&mountain_view=$_GET[mountain_view]&ocean_waterfront=$_GET[ocean_waterfront]&lake_waterfront=$_GET[lake_waterfront]&river_waterfront=$_GET[river_waterfront]&city=$_GET[city]&p=$_GET[p]&r=$_GET[r]\">$i2</a>\n\t ";	
					}
				}

				$links2 = implode(" | ", $links);
		
				$ListingTable .= $links2;

				$ListingTable .= "| </td>";

				$ListingTable .= "</table><br>\n";

			}
}*/

}
else
{
	$ListingTable = "<br><br><center>Nenhum resultado encontrado!</center>";
}

?>