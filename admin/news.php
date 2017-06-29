
<body alink="black"  link="black"    vlink="black">
<?php
include "config.php";
$busca = "SELECT * FROM $tb1 ORDER BY id DESC";
$total_reg = "$nnoticias"; // número de registros por página
$pagina = $_GET['pagina'];
if (!$pagina) {
    $pc = "1";
} else {
    $pc = $pagina;
}
$inicio = $pc - 1;
$inicio = $inicio * $total_reg;

$limite = mysql_query("$busca LIMIT $inicio,$total_reg");
$todos = mysql_query("$busca");

$tr = mysql_num_rows($todos); // verifica o número total de registros
$tp = $tr / $total_reg; // verifica o número total de páginas

// vamos criar a visualização
while ($dados = mysql_fetch_array($limite)) {
$titulo = $dados['titulo'];
$data = $dados['data'];
$hora = $dados['hora'];

}

// agora vamos criar os botões "Anterior e próximo"
$anterior = $pc -1;
$proximo = $pc +1;
if ($pc>1) {
    echo " <a href='?pagina=$anterior'><- Anterior</a> ";
}
if ($pc<$tp) {
    echo " <a href='?pagina=$proximo'>Próxima -></a>";
}
?>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" link="black" alink="black" vlink="black">
<font face=verdana size=1>
<br />
<? echo "<span class =\"titulo\"<b>$titulo</b></span> <br />"; ?>
<img src="imagens/traco.gif" />
<br /> 
<?
include "config.php";
$sql= mysql_query("SELECT * FROM $tb1 where titulo='$titulo'");
while ($reg = mysql_fetch_array($sql)){
$text= $reg['msgintro'];
if (strstr($text,':D')){
$text = str_replace(":D", "<img src=\"smyles/dente.gif\" border=0>", $text);
}
if (strstr($text,':)')){
$text = str_replace(":)", "<img src=\"smyles/aaa.gif\" border=0>", $text);
}
if (strstr($text,':(')){
$text = str_replace(":(", "<img src=\"smyles/sad.gif\" border=0>", $text);
}
if (strstr($text,':o')){
$text = str_replace(":o", "<img src=\"smyles/ohmy.gif\" border=0>", $text);
}
if (strstr($text,':shock:')){
$text = str_replace(":shock:", "<img src=\"smyles/icon_eek.gif\" border=0>", $text);
}
if (strstr($text,':e')){
$text = str_replace(":e", "<img src=\"smyles/smalie_lol.gif\" border=0>", $text);
}
if (strstr($text,'o.O')){
$text = str_replace("o.O", "<img src=\"smyles/blink.gif\" border=0></a>", $text);
}
if (strstr($text,':lol:')){
$text = str_replace(":lol:", "<img src=\"smyles/laugh.gif\" border=0>", $text);
}
if (strstr($text,':*')){
$text = str_replace(":*", "<img src=\"smyles/teeth_smile.gif\" border=0>", $text);
}
if (strstr($text,'-_-')){
$text = str_replace("-_-", "<img src=\"smyles/77_77.gif\" border=0>", $text);
}
if (strstr($text,'<_<')){
$text = str_replace("<_<", "<img src=\"smyles/dry.gif\" border=0>", $text);
}
if (strstr($text,':P')){
$text = str_replace(":P", "<img src=\"smyles/Tongue.jpg\" border=0>", $text);
}
if (strstr($text,'8)')){
$text = str_replace("8)", "<img src=\"smyles/cool.gif\" border=0>", $text);
}
if (strstr($text,':x')){
$text = str_replace(":x", "<img src=\"smyles/mad.gif\" border=0>", $text);
}
$text=nl2br($text);
echo "<br /> $text";
 echo "
<div align=left><font face=\"verdana\" size=\"1\"> - <a href=\"#\" onClick=\"window.open('../teste/admin/exibemsg.php?titulo=$titulo','Janela','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=705,height=450'); return false;\" style=\"color: #000000\"><u>Leia Mais</u></a><br></div>";
}

?><br>
<p align="center"></p>

