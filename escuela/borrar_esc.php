
<?PHP 
/*
*$nivel_dir: obtener configuracion de los niveles de la base de datos
*/
$nivel_dir="../";
include ($nivel_dir.'includes/config.php');
require_once($nivel_dir.'template/pop.php');
//variables necesarias
//include ($nivel_dir.'includes/existeconexion.php');

if ($_GET["id_esc"])
	{
		$query1 = "SELECT * FROM escuela where id_escuela=".$_GET["id_esc"]."";
		$result1 = mysql_query($query1) or die(mysql_error());
		$row1 = mysql_fetch_array($result1);
		$id_esc=$row1['id_escuela'];
	
	}

?>


 
 
 <?PHP 

//obtener configuracion de la base de datos
$nivel_dir="../";
include ($nivel_dir.'includes/config.php');
require_once($nivel_dir.'template/pop.php');
//variables necesarias
//include ($nivel_dir.'includes/existeconexion.php');

if (isset($_GET["del"]))
	{
		
	
		$query = "SELECT * FROM persona where id_escuela=".$_GET["del"]."";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result);
		$n = mysql_num_rows($result);
	
	if ($n>=1)
	{?>
    	<div class="form clearfix">
    <div class="form-header">

	<h2>Esta Escuela no se puede borrar.  </h2>

<form id="form" name="form" action="../includes/cerrar.php" method="post">
	Ya exite un contacto creado con esta escuela		  
		 <div class="button large"><input type="submit" value="cerrar"></div>
	</form> 
    </div>

</div>
    
    <?php
		
	
	}else {
		?>
<div class="form clearfix">
    <div class="form-header">


	<h2>Esta seguro de borrar la escuela</h2>

	<form id="form" name="form" action="inserta_esc.php" method="post">
	
		  <input name="del" type="hidden"  id="del"  value="<?php echo $_GET["del"]; ?>" >		  
		
	 <div class="button large"><input type="submit" value="Borrar"></div>
	</form> 
	
	</div>
 </div>

		<?php
		
		}
	}
?>