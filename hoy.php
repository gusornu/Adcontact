<?php $nivel_dir=""; 
$tit="Companeros";

//titulo de pagina
$pagetit="Pagina de companeros";


//obtener configuracion de la base de datos

require ($nivel_dir.'includes/config.php');
require ($nivel_dir.'includes/existeconexion.php');
//variables necesarias
if(!isset($_GET['page'])){
//echo $_SESSION["usuario"];
$page = 1;

}else{

// If page is set, let's get it
$page = $_GET['page'];
}

if(!isset($_GET['orden'])){
$orden = "id_seguimiento";
}else{
// If page is set, let's get it
$orden = $_GET['orden'];
}

//incluir toda la parte de ariba del template 
include($nivel_dir.'template/top.php'); ?>
 
<!-- Seccion del formulario hidden inline form -->


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
		'height'			: 450,
		'type'				: 'iframe',
		'hideOnOverlayClick': false,
		'afterClose'        : function () { // USE THIS IT IS YOUR ANSWER THE KEY WORD IS "afterClose"
                parent.location.reload(true);}
	});
});
   </script>


<!-- Fin del bloque de formulario   -->

<?PHP
//mandar query con la seleccion
//echo "SELECT * FROM persona ORDER BY $orden;";
$table="seguimiento"; // nombre de la tabla que usamos
$porpagina="4"; //numero por pagina
$pnombre="hoy"; //nombre de la pagina que estamos usando
$masquery="WHERE fecha_seguimiento =CURDATE()";
include($nivel_dir.'includes/pagination.php'); //cargar paginacion



$query = "SELECT * FROM seguimiento WHERE fecha_seguimiento =CURDATE() ORDER BY $orden Limit $start, $porpagina;";
//echo $query;
$result = mysql_query($query) or die(mysql_error());

//Contar el numero de filas.
$count = mysql_num_rows($result);

if(isset($_SESSION["usuario"]) && $_SESSION["usuario"]!=0){
?>

<div class="error_list clearfix">
<div class="error">

<?php
//Table header

if($_SESSION["usuario"]==1){ 

	 $alerta="El contacto a sido insertado";}
else if($_SESSION["usuario"]==2){

	 $alerta="Sus cambios an sido guardados.";}
else if($_SESSION["usuario"]==3){ 

	 $alerta="El contacto a sido borrado.";}
$_SESSION["usuario"]=0;

echo $alerta;
//echo $_SESSION["usuario"];
?>

</div>    </div>
<?php
}
echo "<table class=\"list\">\n";
echo "<tr class=\"table-header\">\n";
echo "<th class=\"\"><a href=\"hoy.php?page=".$page."&orden=apellido_pat\">Nombre</a></th>\n";
echo "<th class=\"\">Fecha Captura</th>\n";
echo "<th class=\"\">Medio</th>\n";
echo "<th class=\"\">Observ</th>\n";
echo "<th class=\"\">Estatus</th>\n";
echo "<th class=\"action\"></th>";
echo "<th class=\"action\"></th>";
echo "<th class=\"action\"></th>";
echo "</tr>";
if ($count !== 0) {
while($row = mysql_fetch_array($result)) {
$id=$row['id_seguimiento'];
$nombre_id=$row['id_persona'];
$fechacap=($row['fecha']);
$medio=htmlentities($row['id_medio']);
$obser=htmlentities($row['observacion']); 
$estatus=htmlentities($row['estatus']);
				echo "<tr>";
				$quere = "SELECT * FROM persona WHERE id=$nombre_id";
				$resulte = mysql_query($quere) or die(mysql_error());
				$estata = mysql_fetch_array($resulte);
				$nombre=htmlentities($estata['nombre']);
				$apellido_pat=htmlentities($estata['apellido_pat']);
				$apellido_mat=htmlentities($estata['apellido_mat']);

				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $apellido_pat ." ". $nombre." ". $apellido_mat."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $fechacap."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $medio."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $obser."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $estatus ."</a></td>";

				//echo "	<input type=\"image\" src=\"images/update.png\" alt=\"Update Row\" class=\"update\" title=\"Update Row\">\n";
				echo "<td class=\"action\"><a  class=\"modalbox small-button modal\" href=\"personas/persona.php?editar&id=".$id."\"><span>Editar</span></a></td>";
				echo "<td class=\"action\"><a class=\"modalbox small-button danger modal\" href=\"personas/persona.php?borrar&id=".$id."\"><span>Borrar</span></a></td>";
				echo "<td class=\"action\"><a class=\"modalbox small-button  modal\" href=\"personas/seg.php?nuevo&id=".$id."\"><span>Seguimiento</span></a></td></tr>";
				//echo "<td class=\"action\"><a  class=\"modalbox small-button modal\" href=\"personas/seg.php?editar&id=".$id."\"><span>Editar</span></a></td>";
				//echo "<td class=\"action\"><a class=\"modalbox small-button danger modal\" href=\"personas/persona.php?borrar&id=".$id."\"><span>Borrar</span></a></td>";
				
				echo "</tr>";
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
