
<?php
include ("./apgconecta.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastro feito com sucesso</title>
</head>

<body>
<? 
$sDoc = $_POST['enqueteNome'];
$sql = "INSERT INTO perguntas (pergunta,status,data) VALUES ('$sDoc','N','$sData')";
$result = mysql_query($sql);
$id = mysql_insert_id();
$linha= mysql_affected_rows();

?>

<?php
$resp1 = $_POST['resp1'];
$resp2 = $_POST['resp2'];
$resp3 = $_POST['resp3'];
$resp4 = $_POST['resp4'];
$sData = date("Y-m-d");
	 $sql = "INSERT INTO respostas (id,resposta,data,voto) ".
	 "VALUES ('$id','$resp1','$sData',0)";
	 $result = mysql_query($sql);
	 
	  $sql = "INSERT INTO respostas (id,resposta,data,voto) ".
	 "VALUES ('$id','$resp2','$sData',0)";
	$result = mysql_query($sql);

	 $sql = "INSERT INTO respostas (id,resposta,data,voto) ".
	 "VALUES ('$id','$resp3','$sData',0)";
		$result = mysql_query($sql);

 	$sql = "INSERT INTO respostas (id,resposta,data,voto) ".
		 "VALUES ('$id','$resp4','$sData',0)";
	$result = mysql_query($sql);

echo"<b>Enquete cadastrada com sucesso </b><meta http-equiv='refresh' content='2;URL=admin.php'>";
?>

</body>
</html>
