<?php
// Iniciamos nossa sessão que vai indicar o usuário pela session_id
session_start();
include "conectarCarrinho.php";


// Recuperamos os valores passados por parametros
$acao = $_GET['acao'];
$cod =  $_GET['cod'];
 
// Verificamos se a acao é igual a incluir
if ($acao == "incluir")
{	
	// Verificamos se cod do produto é diferente de vazio
	if ($cod != '')
	{
		// Se for diferente de vazio verificamos se é numérico
		if (is_numeric($cod))
		{	
		    // Tratamos a variavel de caracteres indevidos
			$cod = addslashes(htmlentities($cod));
 
			// Verificamos se o produto referente ao $cod já está no carrinho para o session id correnpondente
			$query_rs_carrinho = "SELECT * FROM tbl_carrinho WHERE tbl_carrinho.cod = '".$cod."'  AND tbl_carrinho.sessao = '".session_id()."'";
			$rs_carrinho = mysql_query($query_rs_carrinho, $conn) or die(mysql_error());
			$row_rs_carrinho = mysql_fetch_assoc($rs_carrinho);
			$totalRows_rs_carrinho = mysql_num_rows($rs_carrinho);
 
			// Se o total for igual a zero é sinal que o produto ainda não está no carrinho
			if ($totalRows_rs_carrinho == 0)
			{
				// Aqui pegamos os dados do produto a ser incluido no carrinho
				$query_rs_produto = "select * from tabela_foto where cod = '".$cod."'";
				$rs_produto = mysql_query($query_rs_produto, $conn) or die(mysql_error());
				$row_rs_produto = mysql_fetch_assoc($rs_produto);
				$totalRows_rs_produto = mysql_num_rows($rs_produto);
 
				// Se total for maior que zero esse produto existe e então podemos incluir no carrinho
				if ($totalRows_rs_produto > 0)
				{
					$registro_produto = mysql_fetch_assoc($rs_produto);
					// Incluimos o produto selecionado no carrinho de compras
					$add_sql = "INSERT INTO tbl_carrinho (id, cod, nome, sessao) 
					VALUES
					('','".$row_rs_produto['cod']."','".$row_rs_produto['nome']."','".session_id()."')";
					$rs_produto_add = mysql_query($add_sql, $conn) or die(mysql_error());
				}
			}		
		}
	}
}	
 
// Verificamos se a acao é igual a excluir
if ($acao == "excluir")
{
	// Verificamos se cod do produto é diferente de vazio
	if ($cod != '')
	{
		// Se for diferente de vazio verificamos se é numérico
		if (is_numeric($cod))
		{	
		    // Tratamos a variavel de caracteres indevidos
			$cod = addslashes(htmlentities($cod));
			// Verificamos se o produto referente ao $cod  está no carrinho para o session id correnpondente
			$query_rs_car = "SELECT * FROM tbl_carrinho WHERE cod = '".$cod."'  AND sessao = '".session_id()."'";
			$rs_car = mysql_query($query_rs_car, $conn) or die(mysql_error());
			$row_rs_carrinho = mysql_fetch_assoc($rs_car);
			$totalRows_rs_car = mysql_num_rows($rs_car);
 
			// Se encontrarmos o registro, excluimos do carrinho
			if ($totalRows_rs_car > 0)
			{
				$sql_carrinho_excluir = "DELETE FROM tbl_carrinho WHERE cod = '".$cod."' AND sessao = '".session_id()."'";	
				$exec_carrinho_excluir = mysql_query($sql_carrinho_excluir, $conn) or die(mysql_error());
			}
		}
	}
}
 
// Verificamos se a ação é de modificar a quantidade do produto
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Carrinho de Compras</title>
<style type="text/css">
<!--
.style3 {font-size: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; }
.style4 {
	color: #FF0000;
	font-weight: bold;
}
.tabela{
	color:white;
}
-->
</style>

</head>
 
<body>
<div align="center"><?php include("pedidos_orcamento.php")?>
</div>
<form action="carrinho.php?acao=modifica" method="post">
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <th width="36%" scope="col" bgcolor="#03b5f7"><div align="left" class="tabela">PRODUTO(S)</div></th>
    <th width="15%" scope="col"bgcolor="#03b5f7">&nbsp;</th>
  </tr>
 
  <?
  $sql_meu_carrinho = "SELECT * FROM tbl_carrinho WHERE  sessao = '".session_id()."' ORDER BY nome ASC";
  $exec_meu_carrinho =  mysql_query($sql_meu_carrinho, $conn) or die(mysql_error());
  $qtd_meu_carrinho = mysql_num_rows($exec_meu_carrinho);
 
  	while ($row_rs_produto_carrinho = mysql_fetch_assoc($exec_meu_carrinho))
	{
	
  ?>
    <tr>
 
    <td bgcolor="#E3E3E3"><span class="style3">
      <b><?=$row_rs_produto_carrinho['nome']?></b>
    </span></td>
    <td bgcolor="#E3E3E3"><div align="center"><a href="carrinho.php?cod=<?=$row_rs_produto_carrinho['cod']?>&acao=excluir"><img src="imagens/remover.gif" width="110" height="21" border="0" /></a></div></td>
  </tr>
    <?
  }

  ?>
  
></td></tr>
  
 
  
  </tr>
    <tr>
      <td colspan="5"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <th width="33%" height="60" scope="col"><span class="style3"><a href="produtos.php"><img src="imagens/comprando.jpg" width="287" height="40" border="0" /></a></span></th>
          <th width="33%" scope="col"><a href="finalizar.php"><img src="imagens/finalizar.gif" /> </a></th>
          <th width="34%" scope="col"><label>
            <input type="image" name="imageField" src="imagens/atualizar.jpg" />
          </label></th>
        </tr>
      </table></td>
    </tr>
</table>
</form>
</body>
</html>