<script language="JavaScript" type="text/javascript">
function emoticon(text) {
	text = ' ' + text + ' ';
	if (document.post.msg.createTextRange && document.post.msg.caretPos) {
		var caretPos = document.post.msg.caretPos;
		caretPos.text = caretPos.text.charAt(caretPos.text.length - 1) == ' ' ? text + ' ' : text;
		document.post.msg.focus();
	} else {
	document.post.msg.value  += text;
	document.post.msg.focus();
	}
}

</script>
 <? include "../admin/cabecalho.php"; ?>
   <? include "../admin/valida_cookies.php"; ?><BR>
      <?
$data=date ("d/m/Y",time());
$hora = strftime("%H:%M:%S");
$ip= getenv("REMOTE_ADDR");
echo "<form action=\"postar.php\" method=\"post\" name=\"post\" >
<input type='hidden' name='data' value='$data'>
<input type='hidden' name='hora' value='$hora'>
<input type='hidden' name='ip' value='$ip'>
<p aling=\"center\" align=\"center\"><font face=\"Verdana\" size=\"1\">

<table border=\"0\" cellpadding=\"3\" cellspacing=\"1\" width=\"593\" align=\"center\">
    <tr> 
      <th class=\"thHead\" colspan=\"2\" height=\"25\">&nbsp;</th>
    </tr>
    <tr> 
      <td class=\"row1\" width=\"122\"><b><font size=1><p align=\"center\">Assunto:</p></b></td>
      <td class=\"row2\" width=\"456\">
         <input name=\"titulo\" type=\"text\" id=\"Titulo:\" size=\"60\" style=\"font-family: Verdana; font-size: 8 pt; font-weight: bold\">
        </td>
    </tr>
    <tr> 
      <td valign=\"top\"> <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\">
          <tr> 
            <td>&nbsp;</td>
          </tr>
          <tr> 
            <td valign=\"top\" align=\"center\"> <br />
              <table width=\"100\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\">
                <tr align=\"center\">
                  <td colspan=\"4\"><b><font size=1>Mensagem introdutoria</b></td>
				   <textarea name=\"msgintro\" rows=\"10\" cols=\"30\" style=\"width:450px\" font-family: Verdana; font-size: 8 pt; font-weight: bold\"></textarea>
                </tr>
                
              </table></td>
          </tr>
        </table>
      </td>
      <td class=\"row2\" valign=\"top\">
        <table width=\"450\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\">
          <tr> 
            <td><div align=\"right\">
                <textarea name=\"msg\" rows=\"10\" cols=\"30\" style=\"width:450px\" font-family: Verdana; font-size: 8 pt; font-weight: bold\"></textarea>
                <input type=\"submit\" name=\"Submit\" value=\"Postar &gt;&gt;\" style=\"font-family: Verdana; font-size: 8 pt; font-weight: bold\">
                </div></td>
          </tr>
        </table>
        </span></td>
    </tr>
  </table>

  </form>";

?>
    
<BR>
<BR><BR>
<CENTER><a href=../admin/admin.php> Voltar ao Painel Admin </A> <CENTER>
<BR><BR><BR><BR>
<CENTER></CENTER>
