<?PHP 

//obtener configuracion de la base de datos
$nivel_dir="../";
include ($nivel_dir.'includes/config.php');
//variables necesarias
include ($nivel_dir.'includes/existeconexion.php');

if ($_POST["id_usuario"])
	{

		
		$query = "UPDATE promocion.usuario SET id_usuario='".$_POST["id_usuario"]."', nombre='".$_POST["nombre"]."', apellido_pat='".$_POST["apellido_pat"]."', apellido_mat='".$_POST["apellido_mat"]."'  estatus='".$_POST["estatus"]."' usuario='".$_POST["usuario"]."' matricula='".$_POST["matricula"]."' tipo='".$_POST["tipo"]."' WHERE usuario.id_usuario='".$_POST["id_usuario"]."' ";
		$result = mysql_query($query) or die(mysql_error());
		$row1 = mysql_fetch_array($result);
		$id_esc=$row['id_usuario'];
		header("Location: ../includes/cerrar.php");
	
	}
	
	if ($_POST["del"])
		{
			$query = "DELETE  from `promocion`.`usuario` WHERE `usuario`.`id_usuario`='".$_POST["del"]."' ";
		$result = mysql_query($query) or die(mysql_error());
		$row1 = mysql_fetch_array($result);
		header("Location: ../includes/cerrar.php");
		
		}
		
		if ($_POST["insert"])
		{
			$query = "insert into promocion.usuario values('', '".$_POST["id_usuario"]."', '".$_POST["nombre"]."', '".$_POST["apellido_pat"]."', '".$_POST["apellido_mat"]."', '".$_POST["estatus"]."', '".$_POST["usuario"]."', '".$_POST["contrasena"]."', '".$_POST["matricula"]."', '".$_POST["tipo"]."')";
		$result = mysql_query($query) or die(mysql_error());
		$row1 = mysql_fetch_array($result);
		header("Location: ../includes/cerrar.php");
		
		}
		
		
		
		
?>
