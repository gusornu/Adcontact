<?php $nivel_dir=""; ?>

<!-- InstanceBegin template="/Templates/promo1.dwt.php" codeOutsideHTMLIsLocked="false" --><?PHP 


//obtener configuracion de la base de datos

require ($nivel_dir.'includes/config.php');
//variables necesarias

?>
<!-- InstanceBeginEditable name="head" -->
<?php

require ($nivel_dir.'includes/existeconexion.php');

//titulo
$tit="Companeros";

//titulo de pagina
$pagetit="Pagina de companeros";
?>


<!-- InstanceEndEditable -->
<?php
//incluir toda la parte de ariba del template 
include($nivel_dir.'template/top.php'); ?>

<!-- InstanceBeginEditable name="EditRegion2" -->
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
		'width'				: 680,
		'height'			: 450,
		'type'				: 'iframe'
	});
});
   </script>


<!-- Fin del bloque de formulario   -->

<?PHP
//mandar query con la seleccion

$query = "SELECT * FROM medios;";

$result = mysql_query($query) or die(mysql_error());

//Contar el numero de filas.
$count = mysql_num_rows($result);



//Table header
echo "<table class=\"list\">\n";
echo "<tr class=\"table-header\">\n";
echo "<th class=\"\">Nombre</th>\n";
echo "<th class=\"\">Estatus</th>\n";
echo "<th class=\"\">Descripcion</th>\n";
echo "<th class=\"action\"></th>";
echo "<th class=\"action\"></th>";
echo "<th class=\"action\"></th>";
echo "</tr>";
if ($count !== 0) {
while($row = mysql_fetch_array($result)) {
$id=$row['id'];
$nombre=htmlentities($row['nombre']);
$estatus=htmlentities($row['estatus']); 
$mail=htmlentities($row['Descripcion']); 

				echo "<tr>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $nombre."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $estatus."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $descripcion."</a></td>";

				//echo "	<input type=\"image\" src=\"images/update.png\" alt=\"Update Row\" class=\"update\" title=\"Update Row\">\n";
				echo "<td class=\"action\"><a  class=\"modalbox small-button modal\" href=\"contact.php\"><span>Editar</span></a></td>";
				echo "<td class=\"action\"><a class=\"modalbox small-button danger modal\" href=\"#\"><span>Borrar</span></a></td>";
				echo "<td class=\"action\"><a class=\"modalbox small-button  modal\" href=\"#\"><span>Seguimiento</span></a></td></tr>";
			}
		echo "</table><br />\n";
	} else {
		echo "<b><center>NO DATA</center></b>\n";
	}


?>


<!-- InstanceEndEditable -->
<?PHP 
//incluir footer y la parte de abajo
include($nivel_dir.'template/bottom.php');
// Footer
//include($nivel_dir.'template/footer.php');

?>
<!-- InstanceEnd -->
<title>contactomedios</title>
