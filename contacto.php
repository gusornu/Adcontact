<?php $nivel_dir=""; 
$tit="Companeros";

//titulo de pagina
$pagetit="Pagina de companeros";


//obtener configuracion de la base de datos

require ($nivel_dir.'includes/config.php');
//require ($nivel_dir.'includes/existeconexion.php');
//variables necesarias
if(!isset($_GET['page'])){
echo $_SESSION["usuario"];
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

<?PHP
//mandar query con la seleccion
//echo "SELECT * FROM persona ORDER BY $orden;";
$query = "SELECT * FROM persona ORDER BY $orden;";

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
echo "<th class=\"\"><a href=\"contacto.php?page=".$page."&orden=apellido_pat\">Nombre</a></th>\n";
echo "<th class=\"\">Tel Casa</th>\n";
echo "<th class=\"\">Estatus</th>\n";
echo "<th class=\"\">mail</th>\n";
echo "<th class=\"\">Escuela</th>\n";
echo "<th class=\"action\"></th>";
echo "<th class=\"action\"></th>";
echo "<th class=\"action\"></th>";
echo "</tr>";
if ($count !== 0) {
while($row = mysql_fetch_array($result)) {
$id=$row['id'];
$nombre=htmlentities($row['nombre']);
$apellido_pat=htmlentities($row['apellido_pat']);
$apellido_mat=htmlentities($row['apellido_mat']);
$sexo=htmlentities($row['sexo']); 
$tel_casa=htmlentities($row['tel_casa']); 
$tel_celular=htmlentities($row['tel_celular']); 
$observaciones=htmlentities($row['observaciones']); 
$estatus=htmlentities($row['estatus']); 
$mail=htmlentities($row['mail']); 
$id_municipio=htmlentities($row['id_municipio']); 
$id_escuela=htmlentities($row['id_escuela']); 
				echo "<tr>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $apellido_pat ." ". $nombre." ". $apellido_mat."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $tel_casa."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $estatus."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $mail."</a></td>";
				$queri = "SELECT * FROM escuela WHERE id_escuela=$id_escuela";
				$resultz = mysql_query($queri) or die(mysql_error());
				$escuela = mysql_fetch_array($resultz);
				$ABR = $escuela['abrev'];
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $ABR ."</a></td>";

				//echo "	<input type=\"image\" src=\"images/update.png\" alt=\"Update Row\" class=\"update\" title=\"Update Row\">\n";
				echo "<td class=\"action\"><a  class=\"modalbox small-button modal\" href=\"personas/persona.php?editar&id=".$id."\"><span>Editar</span></a></td>";
				echo "<td class=\"action\"><a class=\"modalbox small-button danger modal\" href=\"personas/persona.php?borrar&id=".$id."\"><span>Borrar</span></a></td>";
				echo "<td class=\"action\"><a class=\"modalbox small-button  modal\" href=\"personas/seg.php?nuevo&id=".$id."\"><span>Seguimiento</span></a></td></tr>";
				
				$queryz = "SELECT * FROM `seguimiento` WHERE id_persona=$id;";
				$resultz = mysql_query($queryz) or die(mysql_error());
				$countz = mysql_num_rows($resultz);
				if ($countz !== 0) {echo "<tr><td colspan=\"5\"><ul>";
				while($row = mysql_fetch_array($resultz)) {
				$idz=$row['id_persona'];
				$fechaz=htmlentities($row['fecha_seguimiento']);
				$descz=htmlentities($row['observacion']);
				$ids=$row['id_seguimiento'];			
				echo "<li><a  class=\"modalbox modal\" href=\"personas/seg.php?editar&id=".$ids."\">Seguimiento pendiente fecha: ".$fechaz." descripcion: ". $descz." </a></li>";
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
