<?php 
$calc = $porpagina * $page;
$start = $calc - $porpagina;


$result = mysql_query("select Count(*) As Total from $table");
$rows = mysql_num_rows($result);
$rs = mysql_fetch_array($result);
$total = $rs["Total"];
$Paginastotales = ceil($total / $porpagina);
?>