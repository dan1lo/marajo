<html>
<head>
<link href="exibemsg.css" rel="stylesheet" type="text/css" />
</head>

<?
include "config.php";
$titulo = $_GET['titulo'];
$sql= mysql_query("SELECT * FROM $tb1 where titulo='$titulo'");
while ($reg = mysql_fetch_array($sql)){
$text= $reg['msg'];
$text=nl2br($text);
}
echo "<span class =\"tituloNoticia\"<b>$titulo</b></span> <br /><br />"; ?>
<img src="imagens/traco.gif" />

<br /> 
<div class="divNoticia">
<font face=verdana size=2>
<?php
echo "$text";


?><br>
<p align="center"></p>
</font>
</div>
</body>
</html>