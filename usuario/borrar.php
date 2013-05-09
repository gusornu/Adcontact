<?PHP 
/*
*obtener configuracion de la base de datos
*/
$nivel_dir="../";
include ($nivel_dir.'includes/config.php');
require_once($nivel_dir.'template/pop.php');
/*
*variables necesarias
*include ($nivel_dir.'includes/existeconexion.php');
*/

/*
* Se realiza la conexion a la Base de Datos para Eliminar a un Usuario de Datos en la tabla de Usuarios
*/
if (isset($_GET["id_usu"]))
	{
		$query1 = "SELECT * FROM usuario where id_usuario=".$_GET["id_usu"]."";
		$result1 = mysql_query($query1) or die(mysql_error());
		$row1 = mysql_fetch_array($result1);
		$id_esc=$row1['id_usuario'];
	
	}

?>


<div class="form clearfix">
    <div class="form-header">

	<h2>Esta seguro de borrar al Usuario</h2>

	<form id="form" name="form" action="inserta_usuario.php" method="post">
	<input name="del" type="hidden"  id="del"  value="<?php echo $_GET["del"]; ?>" >		  
		 <div class="button large"><input type="submit" value="Borrar"></div>
	</form> 
	
    
    
    




       
    </div>

</div>