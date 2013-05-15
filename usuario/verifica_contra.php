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

if (isset($_POST["contrasena1"])){
if(strcmp($_POST["contrasena1"], $_POST["contrasena2"]) ==0 ) {
	//header("Location: inserta_usuario.php");
		?>
<script>
function cierra(){
parent.jQuery.fancybox.close();
return false;
}


</script><div class="form clearfix">
    <div class="form-header">

	<h2>Esta Seguro de actualizar la Contraseña</h2>
    
 	<form id="form" name="form" action="inserta_usuario.php" method="post">
	<input name="id_contra"  id="id_contra"  type="hidden" value="<?php echo $_GET["id_contra"]; ?>" >	
    <input name="contrasena1"  id="contrasena1"  type="hidden" value="<?php echo $_POST["contrasena1"]; ?>" >	
    <input name="contrasena2"  id="contrasena2"  type="hidden" value="<?php echo $_POST["contrasena2"]; ?>" >		  
		 <div class="button large"><input type="submit" value="Cambiar"></div>
         <div class="button large"><input type="submit" onclick="cierra()" value="cerrar"></div>
	</form> 
 

 </div> 
</div>
   
 

    
    
    <?php }
	else 
	{
header("Location: cambiar_contra.php?no=1");
	}
}
else {
echo "no existe";	
	}
?>



