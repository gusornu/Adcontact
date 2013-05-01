<?php $nivel_dir="../"; 
$tit="Companeros";

//titulo de pagina
$pagetit="Pagina de companeros";

//obtener configuracion de la base de datos

require ($nivel_dir.'includes/config.php');
require ($nivel_dir.'includes/existeconexion.php');
//variables necesarias
if(!isset($_GET['page'])){

$page = 1;

}else{

// If page is set, let's get it
$page = $_GET['page'];
}

if(!isset($_GET['orden'])){
$orden = "id";
}else{
// If page is set, let's get it
$orden = $_GET['orden'];
}

?>



<?php
//incluir toda la parte de ariba del template 
include($nivel_dir.'template/top.php'); ?>


 <?php ?>
 
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
		'height'			: 450,
		'type'				: 'iframe',
		'hideOnOverlayClick': false,
		'afterClose'        : function () { // USE THIS IT IS YOUR ANSWER THE KEY WORD IS "afterClose"
                parent.location.reload(true);}
	});
});


   </script>


<!-- Fin del bloque de formulario   -->
<form action="#" method="post">
<table width="271" border="1">
  <tr>
    <td width="144"><label for="fecha">fecha	</label>
      <input type="date" name="fecha" id="fecha" /></td>
    <td width="111">&nbsp;</td>
    </tr>
  <tr>
    <td height="25"><input name="" type="submit" /></td>
    <td>&nbsp;</td>
    </tr>
</table></form>


<?PHP
//mandar query con la seleccion

if(isset($_POST["fecha"])){ $fech="and DATE_FORMAT(seguimiento.fecha, '%Y-%m-%d')='".$_POST["fecha"]."'";} else { $fech="";}

$query = "SELECT medio.nombre as medio, seguimiento.fecha, count(*) as cantidad FROM medio, seguimiento where medio.id_medio=seguimiento.id_medio $fech group by medio.nombre;";

$result = mysql_query($query) or die(mysql_error());

//Contar el numero de filas.
$count = mysql_num_rows($result);




//Table header
echo "<table class=\"list\">\n";
echo "<tr class=\"table-header\">\n";
echo "<th class=\"\"><a href=\"contacto.php?page=".$page."&orden=apellido_pat\">Medio</a></th>\n";
echo "<th class=\"\">Cantidad</th>\n";
echo "<th class=\"action\"></th>";
echo "<th class=\"action\"></th>";
echo "<th class=\"action\"></th>";
echo "</tr>";
if ($count !== 0) {
while($row = mysql_fetch_array($result)) {

$medio=htmlentities($row['medio']);
$cantidad=htmlentities($row['cantidad']);
$apellido_mat=htmlentities($row['apellido_mat']);

				echo "<tr>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $medio."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $cantidad."</a></td>";
		

				//echo "	<input type=\"image\" src=\"images/update.png\" alt=\"Update Row\" class=\"update\" title=\"Update Row\">\n";
				echo "<td class=\"action\"><a  class=\"modalbox small-button modal\" href=\"personas/persona.php?editar&id=".$id."\"><span>Editar</span></a></td>";
				echo "<td class=\"action\"><a class=\"modalbox small-button danger modal\" href=\"personas/persona.php?borrar&id=".$id."\"><span>Borrar</span></a></td>";
				echo "<td class=\"action\"><a class=\"modalbox small-button  modal\" href=\"personas/seg.php?nuevo&id=".$id."\"><span>Seguimiento</span></a></td></tr>";
				
				$queryz = "SELECT * FROM `seguimiento` WHERE id_persona=0;";
				$resultz = mysql_query($queryz) or die(mysql_error());
				$countz = mysql_num_rows($resultz);
				if ($countz !== 0) {echo "<tr><td colspan=\"5\"><ul>";
				while($row = mysql_fetch_array($resultz)) {
				$idz=$row['id_persona'];
				$fechaz=htmlentities($row['fecha_seguimiento']);
				$descz=htmlentities($row['observacion']);
				
				//echo "<li><a  class=\"modalbox modal\" href=\"personas/seg.php?editar&id=".$id."\">Seguimiento pendiente fecha: ".$fechaz." descripcion: ". $descz." </a></li>";
				}
				echo "</ul></td>";
				//echo "<td class=\"action\"><a  class=\"modalbox small-button modal\" href=\"personas/seg.php?editar&id=".$id."\"><span>Editar</span></a></td>";
				//echo "<td class=\"action\"><a class=\"modalbox small-button danger modal\" href=\"personas/persona.php?borrar&id=".$id."\"><span>Borrar</span></a></td>";
				
				echo "</tr>";
			}
				
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
