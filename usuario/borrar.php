<?PHP 
/*
*obtener configuracion de la base de datos
*/
$nivel_dir="../";
include ($nivel_dir.'includes/config.php');
require_once($nivel_dir.'template/pop.php');
/*
*variables necesarias
*
*/
include ($nivel_dir.'includes/existeconexion.php');
/*
* Se realiza la conexion a la Base de Datos para Eliminar a un Usuario de Datos en la tabla de Usuarios
*/

if (isset($_GET["del"]))
	{
		
		$query = "SELECT * FROM persona where id_usuario=".$_GET["del"]."";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result);
		$n = mysql_num_rows($result);
	
	if ($n>=1 || $_GET["del"]==(isset($_SESSION['id'])))
	{?>
    	<div class="form clearfix">
    <div class="form-header">

	<h2>Este Usuario no se puede Borrar.  </h2>

<form id="form" name="form" action="../includes/cerrar.php" method="post">
	Ya exite un Contacto creado con ese Usuario		  
		 <div class="button large"><input type="submit" value="cerrar"></div>
	</form> 
    </div>

</div>
    
    <?php
		
	
	}else {
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


		<?php
		
		}
	}

?>
