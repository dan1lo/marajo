
<font  face=verdana size=1>
<? include "cabecalho.php"; ?>
<BR><BR><BR>
<?
include "valida_cookies.php";
$por = $_POST['por'];
$valor = $_POST['valor'];
if (empty($por) || empty($valor)){
echo "Voce nao preencheu os campos da busca";
}
else{
global $por;
global $valor;
if($por==ip){
include "config.php";
$sql=mysql_query("SELECT * FROM $tb1 WHERE ip LIKE '%$valor%'");
$linhas=@mysql_num_rows($sql);
}
if($por==titulo){
include "config.php";
$sql=mysql_query("SELECT * FROM $tb1 WHERE titulo LIKE '%$valor%'");
}
$linhas=@mysql_num_rows($sql);
if ($linhas==0){
echo "<BR><BR><BR><p align=\"center\"><h3><b>Não</b> Há Resultados com essa Pesquisa</p></h3>";
}
if ($linhas >=1){
while ($reg = mysql_fetch_array($sql)){
$titulo = $reg['titulo'];
$msg = $reg['msg'];
echo "
<img src=\"seta.jpg\" width=\"10\" height=\"10\" border=\"0\"><b>Titulo:</b> $titulo | <a href=\"#\" onClick=\"window.open('exibemsg.php?titulo=$titulo','Janela','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=300,height=197'); return false;\" style=\"color: #000000\">Ler</a><br> ";
      }
    }
  }
echo "<center>Foram encontrados <b>$linhas</b> registros<br></center>";
?>

<p align="center"><a href=admin.php> Voltar ao Painel Admin </a><br></p>
<BR><BR>
<CENTER></CENTER>
</font>

