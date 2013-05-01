<?php require_once('conexion_promocion.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
 echo $updateSQL = sprintf("UPDATE usuario SET id_usuario=%s, nombre=%s, apellido_pat=%s, apellido_mat=%s, estatus=%s, usuario=%s, contrasena=%s WHERE id_usuario=%s",
					  GetSQLValueString($_POST['id_usuario'], "int"),
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['apellido_pat'], "text"),
		       		   GetSQLValueString($_POST['apellido_mat'], "text"),
		               GetSQLValueString($_POST['estatus'], "text"),
         	           GetSQLValueString($_POST['usuario'], "text"),
                       GetSQLValueString($_POST['contrasena'], "password"), 
					   GetSQLValueString($_POST['matricula'], "int"));
					   
  mysql_select_db($database_conexion_usuario, $conexion_usuario);
  //$Result1 = mysql_query($updateSQL, $conexion_usuario) or die(mysql_error());

  $updateGoTo = "modificar_exitoso.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_conexion_usuario, $conexion_usuario);
$valor = $_GET['id_usuario'];
$query_modificar_consulta = "SELECT * FROM usuario where id_usuario=$valor";
$modificar_consulta = mysql_query($query_modificar_consulta, $conexion_usuario) or die(mysql_error());
$row_modificar_consulta = mysql_fetch_assoc($modificar_consulta);
$totalRows_modificar_consulta = mysql_num_rows($modificar_consulta);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Modificar Registro</title>
</head>

<body>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">IdUsuario:</td>
      <td><?php echo $row_modificar_consulta['id_usuario']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Nombre:</td>
      <td><input type="text" name="nombre" value="<?php echo $row_modificar_consulta['nombre']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Apellido Paterno:</td>
      <td><input type="text" name="apellido_pat" value="<?php echo $row_modificar_consulta['apellido_pat']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Apellido Materno:</td>
      <td><input type="text" name="apellido_mat" value="<?php echo $row_modificar_consulta['apellido_mat']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Estatus:</td>
      <td><input type="text" name="estatus" value="<?php echo $row_modificar_consulta['estatus']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Usuario:</td>
      <td><input type="text" name="usuario" value="<?php echo $row_modificar_consulta['usuario']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Contrase&ntilde;a:</td>
      <td><input type="text" name="contrasena" value="<?php echo $row_modificar_consulta['contrasena']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Matricula:</td>
      <td><input type="text" name="matricula" value="<?php echo $row_modificar_consulta['matricula']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Modificar Registro"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="id_usuario" value="<?php echo $row_modificar_consulta['id_usuario']; ?>">
</form>

<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($modificar_consulta);
?>
