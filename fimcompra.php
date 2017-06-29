<?php

$op = $_GET[op]; 
if ($op==1){
$nome = $_POST['nome'];
$mail =$_POST['mail'];
$tel=$_POST['fone'];
$cidade=$_POST['cidade'];
include "conectarCarrinho.php";
$sql_meu_carrinho = "SELECT * FROM tbl_carrinho WHERE  sessao = '".session_id()."' ORDER BY nome ASC";
  $exec_meu_carrinho =  mysql_query($sql_meu_carrinho, $conn) or die(mysql_error());
  $qtd_meu_carrinho = mysql_num_rows($exec_meu_carrinho);
 $string.=" ";
  	while ($row_rs_produto_carrinho = mysql_fetch_assoc($exec_meu_carrinho))
	{
	
  $string .= "
Produto ".$row_rs_produto_carrinho["cod"]."
";
  }
mail($mail, "A Marajó tecidos agradece seu Interesse", "Obrigado, Você logo será contactado por um de nossos revendedores");
mail('danilomonteiroo@gmail.com'," Pedido", ' O cliente \n'.$nome.' com o e-mail \n('.$mail.') \n telefone \n('.$tel.') \n Cidade :'.cidade.' deseja saber sobre os seguites produtos:'.$string.' ');
echo "<b>Pedido feito com sucesso, em breve entraremos em contato.</b><meta http-equiv='refresh' content='2;URL=index.php'>";
} 

else{
?>
<form method="post" action="finalizar.php?op=1" >
<table border="0" cellpadding="0" cellspacing="0" width="894">
<!-- fwtable fwsrc="Untitled" fwpage="Page 1" fwbase="Finzalizando pedido.jpg" fwstyle="Dreamweaver" fwdocid = "1583094985" fwnested="0" -->
  <tr>
   <td><img src="spacer.gif" width="318" height="1" border="0" alt="" /></td>
   <td><img src="spacer.gif" width="306" height="1" border="0" alt="" /></td>
   <td><img src="spacer.gif" width="35" height="1" border="0" alt="" /></td>
   <td><img src="spacer.gif" width="96" height="1" border="0" alt="" /></td>
   <td><img src="spacer.gif" width="139" height="1" border="0" alt="" /></td>
   <td><img src="spacer.gif" width="1" height="1" border="0" alt="" /></td>
  </tr>

  <tr>
   <td colspan="5"><img name="Finzalizandopedido_r1_c1" src="Finzalizando%20pedido_r1_c1.jpg" width="894" height="56" border="0" id="Finzalizandopedido_r1_c1" alt="" /></td>
   <td><img src="spacer.gif" width="1" height="56" border="0" alt="" /></td>
  </tr>
  <tr>
   <td><p>&nbsp;</p>
     <p><br />
          <img name="Finzalizandopedido_r2_c1" src="Finzalizando%20pedido_r2_c1.jpg" width="318" height="73" border="0" id="Finzalizandopedido_r2_c1" alt="" /></p>
   <td><p>&nbsp;</p>
     <p>&nbsp;</p>
     <p><br />
       <input type="text" name="nome" />
     </p></td> </td>
   <td rowspan="5" colspan="2" valign="top"><p style="margin:0px"></p></td>
   <td rowspan="5" colspan="2"><img name="Finzalizandopedido_r2_c4" src="Finzalizando%20pedido_r2_c4.jpg" width="235" height="234" border="0" id="Finzalizandopedido_r2_c4" alt="" /></td>
   <td><img src="spacer.gif" width="1" height="73" border="0" alt="" /></td>
  </tr>
  <tr>
   <td><img name="Finzalizandopedido_r3_c1" src="Finzalizando%20pedido_r3_c1.jpg" width="318" height="48" border="0" id="Finzalizandopedido_r3_c1" alt="" /><td><br />
     <input type="text" name="fone" size="15" maxlength="11" value=(0XX)XXXX-XXXX</td> </td>
   <td><img src="spacer.gif" width="1" height="48" border="0" alt="" /></td>
  </tr>
  <tr>
   <td><img name="Finzalizandopedido_r4_c1" src="Finzalizando%20pedido_r4_c1.jpg" width="318" height="40" border="0" id="Finzalizandopedido_r4_c1" alt="" />
   <td><input type="text" name="cidade" size="15" maxlength="11" ></td></td>
   <td><img src="spacer.gif" width="1" height="40" border="0" alt="" /></td>
  </tr>
  <tr>
   <td><img name="Finzalizandopedido_r5_c1" src="Finzalizando%20pedido_r5_c1.jpg" width="318" height="45" border="0" id="Finzalizandopedido_r5_c1" alt="" /><td><input name="mail" type="text" size="15" maxlength="30"></td>
   <td><img src="spacer.gif" width="1" height="45" border="0" alt="" /></td>
  </tr>
  <tr>
   <td rowspan="2" valign="top"><p style="margin:0px"></p></td>
   <td><img src="spacer.gif" width="1" height="28" border="0" alt="" /></td>
  </tr>
  <tr>
   <td valign="top"><p style="margin:0px"></p></td>
   <td colspan="2"><input type="image" src="Finzalizando%20pedido_r7_c3.jpg" width="131" height="54" border="0" id="Finzalizandopedido_r7_c3" alt="" /></td>
   <td valign="top"><p style="margin:0px"></p></td>
   <td><img src="spacer.gif" width="1" height="54" border="0" alt="" /></td>
  </tr>
</table>
</form>
  
<?  }?>
