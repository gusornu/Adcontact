<?php $nivel_dir="../"; ?>

<?PHP 


//obtener configuracion de la base de datos

require ($nivel_dir.'includes/config.php');
//variables necesarias

?>

<?php

require ($nivel_dir.'includes/existeconexion.php');
require ($nivel_dir.'includes/existeconexion2.php');


//titulo
$tit="Usuario";

//titulo de pagina
$pagetit="Modulo de Usuario";
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
		'width'				: 280,
		'height'			: 300,
		'type'				: 'iframe',
		'afterClose'          : function() { parent.location.reload(true); }
	});
});
   </script>


<!-- Fin del bloque de formulario   -->

<?PHP
//mandar query con la seleccion
$query = "SELECT * FROM usuario";

$result = mysql_query($query) or die(mysql_error());

//Contar el numero de filas.
$count = mysql_num_rows($result);



//Table header
echo "<table class=\"list\">\n";
echo "<tr class=\"table-header\">\n";
echo "<th class=\"\">Id</th>\n";
echo "<th class=\"\">Nombre</th>\n";
echo "<th class=\"\">Apellido</th>\n";
echo "<th class=\"\">Usuario</th>\n";
echo "<th class=\"\">Estatus</th>\n";
echo "<th class=\"\">Matricula</th>\n";
echo "<th class=\"\">Tipo</th>\n";
echo "<th class=\"action\"></th>";
echo "<th class=\"action\"></th>";
echo "<th class=\"action\"></th>";
echo "</tr>";
if ($count !== 0) {
while($row = mysql_fetch_array($result)) {
$id=$row['id_usuario'];
$nombre=htmlentities($row['nombre']);
$apellido=htmlentities($row['apellido_pat']);
$usuario=htmlentities($row['usuario']);
$estatus=htmlentities($row['estatus']);
$matricula=htmlentities($row['matricula']);
$tipo=htmlentities($row['tipo']);

				echo "<tr>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $id ."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $nombre."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $apellido."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $usuario."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $estatus."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $matricula."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $tipo."</a></td>";	

echo "<td class=\"action\"><a  class=\"modalbox small-button modal\" href=\"agregar_usuarios.php?id_usuario=".$id."\"><span>Editar</span></a></td>";
echo "<td class=\"action\"><a class=\"modalbox small-button danger modal\" href=\"borrar.php?del=".$id."\"><span>Borrar</span></a></td>";
echo "<td class=\"action\"><a class=\"modalbox small-button  modal\" href=\"agregar_usuarios.php?insert=ok\"><span>Agregar Usuario</span></a></td></tr>";
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
