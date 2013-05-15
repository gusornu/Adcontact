<?php $nivel_dir="../"; 


//obtener configuracion de la base de datos

require ($nivel_dir.'includes/config.php');
//variables necesarias



require ($nivel_dir.'includes/existeconexion.php');
require ($nivel_dir.'includes/existeconexion2.php');

//// inicion de paginacion
if(!isset($_GET['page'])){
//echo $_SESSION["usuario"];
$page = 1;

}else{

// If page is set, let's get it
$page = $_GET['page'];
}
///  fin de paginacion


//titulo
$tit="Medios";

//titulo de pagina
$pagetit="Modulo de Medios";

//incluir toda la parte de ariba del template 
include($nivel_dir.'template/top.php'); 
 ?>
 
<!-- Seccion del formulario ------  hidden inline form -->


<!-- basic fancybox setup -->
 
 <script type="text/javascript" language="javascript">
	$(document).ready(function() {
		//$(".modalbox").fancybox();
		//$("#form").submit(function() { return false; });
		
		
		$(".modalbox").fancybox({
		'autoScale'			: false,
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'width'				: 480,
		'height'			: 300,
		'type'				: 'iframe',
		'scrolling'         : 'no',
		'afterClose'          : function() { parent.location.reload(true); }
	});
});
   </script>


<!-- Fin del bloque de formulario   -->

<?PHP
//pagination//
$table="medio"; // nombre de la tabla que usamos
$porpagina="10"; //numero por pagina
include($nivel_dir.'includes/pagination.php'); //cargar paginacion
$pnombre="medio"; //nombre de la pagina que estamos usando

//session_start();
if(isset($_SESSION["id"]))
//echo $id=$_SESSION["id"];
	 
//mandar query con la seleccion

$query = "SELECT * FROM medio Limit $start, $porpagina;";

$result = mysql_query($query) or die(mysql_error());

//Contar el numero de filas.
$count = mysql_num_rows($result);



//Table header
echo "<table class=\"list\">\n";
echo "<tr class=\"table-header\">\n";
echo "<th class=\"\">Id</th>\n";
echo "<th class=\"\">Nombre</th>\n";
echo "<th class=\"\">Comentario</th>\n";
echo "<th class=\"\">Estatus</th>\n";
echo "<th class=\"action\"></th>";
echo "<th class=\"action\"></th>";
echo "<th class=\"action\"></th>";
echo "</tr>";
if ($count !== 0) {
while($row = mysql_fetch_array($result)) {
$id=$row['id_medio'];
$nombre=htmlentities($row['nombre']);
$comentario=htmlentities($row['comentario']);
$estatus=htmlentities($row['estatus']);
				echo "<tr>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $id ."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $nombre."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $comentario."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $estatus."</a></td>";	

				//echo "	<input type=\"image\" src=\"images/update.png\" alt=\"Update Row\" class=\"update\" title=\"Update Row\">\n";
				echo "<td class=\"action\"><a  class=\"modalbox small-button modal\" href=\"agregar_med.php?id_med=".$id."\"><span>Editar</span></a></td>";
				echo "<td class=\"action\"><a class=\"modalbox small-button danger modal\" href=\"borrar_med.php?del=".$id."\"><span>Borrar</span></a></td>";
				echo "<td class=\"action\"><a class=\"modalbox small-button  modal\" href=\"agregar_med.php?insert=ok\"><span>Agregar Medio</span></a></td></tr>";
			}
		echo "</table><br />\n";
	} else {
		echo "<b><center>NO DATA</center></b>\n";
	}


?>



<?PHP 
//incluir footer y la parte de abajo
include($nivel_dir.'template/bottom.php');
// Footer
//include($nivel_dir.'template/footer.php');

?>
