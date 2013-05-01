
<?PHP 

//obtener configuracion de la base de datos
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

<div class="form clearfix">
    <div class="form-header">


	<h2>Esta seguro de borrar la escuela</h2>

	<form id="form" name="form" action="inserta_esc.php" method="post">
	
		  <input name="del" type="hidden"  id="del"  value="<?php echo $_GET["del"]; ?>" >		  
		
	 <div class="button large"><input type="submit" value="Borrar"></div>
	</form> 
	
	</div>
 </div>