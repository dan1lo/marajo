
<? include "cabecalho.php"; ?>
<?
echo "<font face=verdana size=1>";
include "valida_cookies.php";
include "config.php";
$login= $HTTP_COOKIE_VARS['username'];
echo "Olá: <b>$login</b> !";
echo "<BR><BR>";
$sql3 =@ mysql_query("SELECT * FROM $tb2 where login='$login'");
if (!$sql3){
echo "Não foi possivel fazer a pesquisa";}
else {
while ($reg=mysql_fetch_array($sql3)){
$nivel = $reg['nivel'];
if ($nivel==0){
echo "
<div align=\"center\"><tr>
    <td><a href=noticia.php> Nova Mensagem</a> <img src=\"seta.jpg\" width=\"10\" height=\"10\" border=\"0\">
    <td><a href=exclusao.php> Excluir Mensagens </a> <img src=\"seta.jpg\" width=\"10\" height=\"10\" border=\"0\">
    <td><a href=meusdados.php> Meus Dados </a> <img src=\"seta.jpg\" width=\"10\" height=\"10\" border=\"0\">
    <td><a href=logout.php> Sair (Logout)</a> <img src=\"seta.jpg\" width=\"10\" height=\"10\" border=\"0\">
    <td><b>Usuário Nivel:</b> Normal
<tr>
</font>
</div><BR><BR><BR><BR>";
} else {
echo "<div align=\"center\"><tr>
	<td><img src=\"seta.jpg\" width=\"10\" height=\"10\" border=\"0\"> <a href=anunciar.php>Cadastro de Produtos</a>
	<td><img src=\"seta.jpg\" width=\"10\" height=\"10\" border=\"0\"> <a href=delProduto.php>Excluir Produto</a>
	<td><img src =\"seta.jpg\" width=\"10\" height=\"10\" border=\"0\"><a href=resultNews.php>Lista de Newsletter</a>
	<td><img src=\"seta.jpg\" width=\"10\" height=\"10\" border=\"0\"> <a href=enqueteindex.php>Cadastro de enquente </a>
    <td><img src=\"seta.jpg\" width=\"10\" height=\"10\" border=\"0\"> <a href=cadastro.php> Novo User</a> <img src=\"seta.jpg\" width=\"10\" height=\"10\" border=\"0\">
    <td><a href=users.php> Excluir user</a> <img src=\"seta.jpg\" width=\"10\" height=\"10\" border=\"0\">
    <td><a href=noticia.php> Nova Mensagem</a> <img src=\"seta.jpg\" width=\"10\" height=\"10\" border=\"0\">
    <td><a href=exclusao.php> Excluir Mensagens </a> <img src=\"seta.jpg\" width=\"10\" height=\"10\" border=\"0\">
    <td><a href=busca.php> Buscar Mensagens </a> <img src=\"seta.jpg\" width=\"10\" height=\"10\" border=\"0\">
    <td><a href=meusdados.php> Meus Dados </a> <img src=\"seta.jpg\" width=\"10\" height=\"10\" border=\"0\">
    <td><a href=logout.php> Sair (Logout)</a> <img src=\"seta.jpg\" width=\"10\" height=\"10\" border=\"0\"><br>
    <td><b>Usuário Nivel:</b> Administrador
<tr>
</font>
</div><BR><BR><BR><BR>";
}
  }
    }
$sql = mysql_query("SELECT * FROM $tb1 ORDER BY id DESC");
$linhas = mysql_num_rows($sql);
if (!$sql){
echo "Nao foi possivel fazer a consulta";
}
else {
echo "<img src=\"msgs.jpg\" width=\"200\" height=\"50\" border=\"0\"> <br>";
while ($reg = mysql_fetch_array($sql)){
$titulo = $reg['titulo'];
$data = $reg['data'];
$hora = $reg['hora'];
$ip = $reg['ip'];
echo "
<font color=#FFFFFF>________</font><img src=\"seta.jpg\" width=\"10\" height=\"10\" border=\"0\"><font face=verdana size=1>$data - $hora : <b>Titulo:</b> $titulo | <b>IP:</b>$ip</font><br>
";
}
}
?>
<BR><BR><BR><BR><BR>
<CENTER></CENTER>
