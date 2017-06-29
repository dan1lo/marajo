<? include "../admin/cabecalho.php";  echo "\n"?>

   <? include "../admin/valida_cookies.php"; ?>

<?

require_once("../configuracao_mysql.php");
$ref = $_POST['cod'];
$q2 = "SELECT cod FROM tabela_foto where cod = $ref";
$row = mysql_query($q2);
$lrow = mysql_num_rows($row);
if($lrow >0){

echo" REF já existe! <meta http-equiv='refresh' content='2;URL=anunciar.php'>";

}
else{

//////////////////////////////////////////////////////
if(isset($_POST[s1]))
{
	if(!empty($_FILES[images][name][0]))
	{
		while(list($key,$value) = each($_FILES[images][name]))
		{
			if(!empty($value))
			{
				$NewImageName = $t."_offer_".$value;
				copy($_FILES[images][tmp_name][$key], "../fotos_anuncios/".$NewImageName);

				$MyImages[] = $NewImageName;
			}
		}

		if(!empty($MyImages))
		{
			$ImageStr = implode("|", $MyImages);
		}

	}

	$q1 = "insert into tabela_foto set nome = '$_POST[nome]' ,DetailedDesc = '$_POST[DetailedDesc]', image = '$ImageStr',cod ='$_POST[cod]',tipo='$_POST[tipo]' ";

	mysql_query($q1)or die (mysql_error());
	echo"<b>Produto cadastrado com sucesso </b><meta http-equiv='refresh' content='2;URL=anunciar.php'>";
}


exit();
}
?>