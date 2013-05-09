<?PHP 
/*
*$nivel_dir: obtener configuracion de los niveles de la base de datos
*/
$nivel_dir="../";
include ($nivel_dir.'includes/config.php');
require_once($nivel_dir.'template/pop.php');
//variables necesarias
//include ($nivel_dir.'includes/existeconexion.php');
$estatus = mysql_query("SELECT * FROM persona WHERE id_estatus = '".$_GET["del"]."' ");
$estatus = mysql_fetch_row($estatus);
if (!$estatus<0) {
    echo 'No puede borrar ' . mysql_error();
    exit;
}

?>


<div class="form clearfix">
    <div class="form-header">

	<h2>Esta seguro de borrar el estatus</h2>

	<form id="form" name="form" action="inserta_est.php" method="post">
	<input name="del" type="hidden"  id="del"  value="<?php echo $_GET["del"]; ?>" >		  
		 <div class="button large"><input type="submit" value="Borrar"></div>
	</form> 
	
    





    
       
    </div>

</div>
