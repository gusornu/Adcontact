<?php
$dbhost='localhost';
$dbusername='test';
$dbuserpass='test@unav';
$dbname = 'promocion';

$con=mysql_connect($dbhost,$dbusername,$dbuserpass);
 if (!$con)
  die('Fallo la conexion con el servidor Mysql'.mysql_error());
  $db=mysql_select_db($dbname, $con);
  if(!$db)
  die('Fallo al selecionar la base de datos '.mysql_error());
?>
