<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conexion_usuario = "localhost";
$database_conexion_usuario = "promocion";
$username_conexion_usuario = "root";
$password_conexion_usuario = "";
$conexion_usuario = mysql_pconnect($hostname_conexion_usuario, $username_conexion_usuario, $password_conexion_usuario) or trigger_error(mysql_error(),E_USER_ERROR); 
?>