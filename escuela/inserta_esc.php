
<?PHP 

//obtener configuracion de la base de datos
$nivel_dir="../";
include ($nivel_dir.'includes/config.php');
//variables necesarias
include ($nivel_dir.'includes/existeconexion.php');

if ($_POST["id_escue"])
	{
		//UPDATE  `promocion`.`escuela` SET  `nombre` =  'primariaA', `comentario` =  'comentario12' WHERE  `escuela`.`id_escuela` =1;
		
		$query = "UPDATE `promocion`.`escuela` SET `nombre`='".$_POST["Nombre"]."', `comentario`='".$_POST["Comentario"]."', `abrev`='".$_POST["Abrevia"]."' WHERE `escuela`.`id_escuela`='".$_POST["id_escue"]."' ";
		$result = mysql_query($query) or die(mysql_error());
		$row1 = mysql_fetch_array($result);
		$id_esc=$row['id_escuela'];
		header("Location: ../includes/cerrar.php");
	
	}
	
	if ($_POST["del"])
		{
			$query = "DELETE  from `promocion`.`escuela` WHERE `escuela`.`id_escuela`='".$_POST["del"]."' ";
		$result = mysql_query($query) or die(mysql_error());
		$row1 = mysql_fetch_array($result);
		header("Location: ../includes/cerrar.php");
		
		}
		
		if ($_POST["insert"])
		{
			$query = "insert into `promocion`.`escuela`  values('', '".$_POST["Nombre"]."', '".$_POST["Comentario"]."', '".$_POST["Abrevia"]."')";
		$result = mysql_query($query) or die(mysql_error());
		$row1 = mysql_fetch_array($result);
		header("Location: ../includes/cerrar.php");
		
		}
		
		
		
		
?>
