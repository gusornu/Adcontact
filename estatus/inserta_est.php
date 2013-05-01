
<?PHP 

//obtener configuracion de la base de datos
$nivel_dir="../";
include ($nivel_dir.'includes/config.php');
//variables necesarias
include ($nivel_dir.'includes/existeconexion.php');

if ($_POST["id_est"])
	{
		//UPDATE  `promocion`.`escuela` SET  `nombre` =  'primariaA', `comentario` =  'comentario12' WHERE  `escuela`.`id_escuela` =1;
		
		$query = "UPDATE `promocion`.`estatus` SET `nombre`='".$_POST["nombre"]."', `abrev`='".$_POST["abrev"]."', `estatus`='".$_POST["estatus"]."' WHERE `estatus`.`id_estatus`='".$_POST["id_est"]."' ";
		$result = mysql_query($query) or die(mysql_error());
		$row1 = mysql_fetch_array($result);
		$id_esc=$row['id_estatus'];
		header("Location: ../includes/cerrar.php");
	
	}
	
	if ($_POST["del"])
		{
			$query = "DELETE  from `promocion`.`estatus` WHERE `estatus`.`id_estatus`='".$_POST["del"]."' ";
		$result = mysql_query($query) or die(mysql_error());
		$row1 = mysql_fetch_array($result);
		header("Location: ../includes/cerrar.php");
		
		}
		
		if ($_POST["insert"])
		{
			$query = "insert into `promocion`.`estatus`  values('', '".$_POST["nombre"]."', '".$_POST["estatus"]."', '".$_POST["abrev"]."')";
		$result = mysql_query($query) or die(mysql_error());
		$row1 = mysql_fetch_array($result);
		header("Location: ../includes/cerrar.php");
		
		}
		
		
		
		
?>
