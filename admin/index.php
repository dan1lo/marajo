<?
echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">
<html>
<head>
<title> ASCAN</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
</head>

<body leftmargin=\"0\" topmargin=\"0\" marginwidth=\"0\" marginheight=\"0\" link=\"black\" alink=\"black\" vlink=\"black\">
<font face=\"verdana\" size=\"1\">
<br />";

?>
<? include "../admin/cabecalho.php"; ?>
<form method="POST" action="confirmar_login.php">
  <p aling="center" align="center"><font face="Verdana" size="1"><b>Login:<br>
&nbsp;<input type="text" name="username" size="15" style="font-family: Verdana; font-size: 8 pt; font-weight: bold"><br>
  Senha: <br>
  <input type="password" name="senha" size="15" style="font-family: Verdana; font-size: 8 pt; font-weight: bold"><br>
  <input type="submit" value="Entrar" name="submeter" size="15" style="font-size: 8 pt; font-family: Verdana; font-weight: bold"></b></font></p>
</form>
<BR><BR><BR><BR>
<CENTER><font face=verdana size=1> 2011 DotMake - Danilo Monteiro<br /> </CENTER>
</body>
</html>