
 <? include "cabecalho.php"; ?>
 <br><BR><img src="cadastro.jpg" width="200" height="50" border="0">
<? include "valida_cookies.php"; ?>
<form method="POST" action="cadastro.php?desejo=cadastrar">
<p aling="center" align="center"><font face="Verdana" size="1">
<b>Nome:</b><br>&nbsp;<input type="text" name="nome" size="15" style="font-family: Verdana; font-size: 8 pt; font-weight: bold"><br>
  <b>Login:<br>
&nbsp;<input type="text" name="login" size="15" style="font-family: Verdana; font-size: 8 pt; font-weight: bold"><br>
  Senha: <br>
  <input type="password" name="senha" size="15" style="font-family: Verdana; font-size: 8 pt; font-weight: bold"><br>
  Nivel:<br> <select name="nivel">
   <option value=0>Normal</option>
   <option value=1>Administrador</option>
</select><br>
  <input type="submit" value="Cadastra" name="submeter" size="15" style="font-size: 8 pt; font-family: Verdana; font-weight: bold"></b></font></p>
</form>

<?
include "config.php";
$desejo= $_GET['desejo'];

if ($desejo==cadastrar){
if (empty($nome) && empty($login) && empty($senha))
{
echo "Todos os Campos Obrigatórios";
}
if ($senha >8)
{ echo "A Senha deve ser menor que 8 caracteres"; }
else
{
$nome= $_POST['nome'];
$login= $_POST['login'];
$senha= $_POST['senha'];
$nivel= $_POST['nivel'];
$sql=mysql_query("INSERT INTO $tb2 (nome, login, senha, nivel) VALUES ('$nome', '$login', '$senha', '$nivel')");
if (!$sql){
echo "Nao foi Possivel concluir o cadastro";
}
else {
echo "Cadastro Concluido clique abaixo para logar<BR><BR>
<a href=index.php> Logar </a>";
}
 } }
?>
<p align="center"><a href=admin.php> Voltar ao Painel Admin </a><br></p>
<BR><BR><BR><BR>
<CENTER></CENTER>
