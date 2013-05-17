<?php 
$calc = $porpagina * $page;
$start = $calc - $porpagina;
if(!isset($masquery)){
$masquery="";
}

$result = mysql_query("select Count(*) As Total from $table $masquery");
//echo "select Count(*) As Total from $table $masquery";
$rows = mysql_num_rows($result);
$rs = mysql_fetch_array($result);
$total = $rs["Total"];
$Paginastotales = ceil($total / $porpagina);
?>