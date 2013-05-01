
<?PHP 

//obtener configuracion de la base de datos
$nivel_dir="../";
include ($nivel_dir.'includes/config.php');
//variables necesarias
include ($nivel_dir.'includes/existeconexion.php');

if ($_POST["id_medi"])
	{
		//UPDATE  `promocion`.`escuela` SET  `nombre` =  'primariaA', `comentario` =  'comentario12' WHERE  `escuela`.`id_escuela` =1;
		
		$query = "UPDATE `promocion`.`medio` SET `nombre`='".$_POST["Nombre"]."', `comentario`='".$_POST["Comentario"]."', `estatus`='".$_POST["estatus"]."' WHERE `medio`.`id_medio`='".$_POST["id_medi"]."' ";
		$result = mysql_query($query) or die(mysql_error());
		$row1 = mysql_fetch_array($result);
		$id_esc=$row['id_medio'];
		header("Location: ../includes/cerrar.php");
	
	}
	
	if ($_POST["del"])
		{
			$query = "DELETE  from `promocion`.`medio` WHERE `medio`.`id_medio`='".$_POST["del"]."' ";
		$result = mysql_query($query) or die(mysql_error());
		$row1 = mysql_fetch_array($result);
		header("Location: ../includes/cerrar.php");
		
		}
		
		if ($_POST["insert"])
		{
			$query = "insert into `promocion`.`medio`  values('', '".$_POST["Nombre"]."', '".$_POST["estatus"]."', '".$_POST["Comentario"]."')";
		$result = mysql_query($query) or die(mysql_error());
		$row1 = mysql_fetch_array($result);
		header("Location: ../includes/cerrar.php");
		
		}
		
		
		
		
?>
