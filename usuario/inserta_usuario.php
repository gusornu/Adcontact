<?PHP 
/*
*obtener configuracion de la base de datos
*/
$nivel_dir="../";
include ($nivel_dir.'includes/config.php');

/*
*variables necesarias
*/
include ($nivel_dir.'includes/existeconexion.php');


/*
* Se realiza la conexion a la Base de Datos para Actualizar la informacion de Datos en la tabla de Usuarios
*/
if (isset($_POST["id_user"]))
	{
	
		$query = "UPDATE promocion.usuario SET nombre='".$_POST["nombre"]."', apellido_pat='".$_POST["apellido_pat"]."', apellido_mat='".$_POST["apellido_mat"]."', estatus='".$_POST["estatus"]."', usuario='".$_POST["usuario"]."', matricula='".$_POST["matricula"]."', tipo='".$_POST["tipo"]."' WHERE usuario.id_usuario='".$_POST["id_user"]."' ";
		$result = mysql_query($query) or die(mysql_error());
		$row1 = mysql_fetch_array($result);
		$id_esc=$row['id_usuario'];
		header("Location: ../includes/cerrar.php");
	
	}
	
/*
* Se realiza la conexion a la Base de Datos para Eliminar a un Usuario de Datos en la tabla de Usuarios
*/
	if ($_POST["del"])
		{
			$query = "DELETE  from promocion.usuario WHERE usuario.id_usuario='".$_POST["del"]."' ";
		$result = mysql_query($query) or die(mysql_error());
		$row1 = mysql_fetch_array($result);
		header("Location: ../includes/cerrar.php");
		
		}
		
/*
* Se realiza la conexion a la Base de Datos para ejecutar la nueva insercion de Datos en la tabla de Usuarios
*/
		if ($_POST["insert"])
		{
			$query = "insert into promocion.usuario values('', '".$_POST["nombre"]."', '".$_POST["apellido_pat"]."', '".$_POST["apellido_mat"]."', '".$_POST["estatus"]."', '".$_POST["usuario"]."', '".md5($_POST["contrasena"])."', '".$_POST["matricula"]."', '".$_POST["tipo"]."')";
		$result = mysql_query($query) or die(mysql_error());
		$row1 = mysql_fetch_array($result);
		header("Location: ../includes/cerrar.php");
		
		}
		
if (isset($_POST["id_contra"]))
	{
	
		$query = "UPDATE promocion.usuario SET contrasena='".md5($_POST["contrasena"])."' WHERE usuario.id_usuario='".$_POST["id_contra"]."' ";
		$result = mysql_query($query) or die(mysql_error());
		$row1 = mysql_fetch_array($result);
		$id_esc=$row['id_usuario'];
		header("Location: ../includes/cerrar.php");
	
	}
?>
