<?php 
$link = mysql_pconnect("cpmy0006.servidorwebfacil.com","birocomu_marajo","1235813"); 
$db_selected = mysql_select_db("birocomu_bdmarajo", $link); 
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}

?>