<?
$op = $_POST['op'];
if ($op == 1 ){

$nome = $_POST['nome'];
$mail= $_POST['e-mail'];
$tel =$_POST['tel'];

mail($mail,'Marajó Tecidos agradece seu contato.','Em breve entraremos em contato com você.');

mail('danilomonteiroo@gmail.com','Contato do cliente','O cliente  '.$nome.' \n com e-mail'.$mail.'e telefone:'.$tel);

echo "<b> Formulario enviador com sucesso! </b>";
echo "<meta http-equiv='refresh' content='2;URL=anunciar.php'>";

}


else{
?>

<form action="faleconosco.php" method="post">
Nome: <input type="text" name="nome" size="15">
<br />
E-mail <input type="text" name="e-mail" size="15">
<br />
Telefone <input type+"text" name="tel" size="15"><br/>
<textarea rows="6" cols="35"></textarea>
<input type="hidden" name="op" value="1">
<input type="submit" value="Enviar">

</form>

<? } ?>