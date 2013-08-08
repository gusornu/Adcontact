<?php $nivel_dir=""; 
$tit="Contactos";

//titulo de pagina
$pagetit="Administrador de contactos";


//obtener configuracion de la base de datos

require ($nivel_dir.'includes/config.php');
require ($nivel_dir.'includes/existeconexion.php');
//variables necesarias

//// inicion de paginacion
if(!isset($_GET['page'])){
//echo $_SESSION["usuario"];
$page = 1;

}else{

// If page is set, let's get it
$page = $_GET['page'];
}
///  fin de paginacion


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
//pagination//
$table="persona"; // nombre de la tabla que usamos
$porpagina="4"; //numero por pagina
include($nivel_dir.'includes/pagination.php'); //cargar paginacion
$pnombre="contacto"; //nombre de la pagina que estamos usando


////// verificACION DE BUSQUEDAS

if(isset($_POST["submit"])){

	// Recibimos la variable buscar del formulario de búsqueda desde el método POST
	
	
	foreach($_POST as $nombre_campo => $valor)
{
if($valor=='')
$counter++;
}
if($counter<=7 ){ $and="and";} else{ $and="";}

	if($_POST["nombre"]!=""){
	$buscar="$and nombre LIKE '%".$_POST["nombre"]."%'";
	}else { $buscar="";}
	
	if($_POST["sexo"]!=""){
	$sexob="$and sexo='".$_POST["sexo"]."'";
	}else {	$sexob="";	}
	
	if($_POST["fecha"]!=""){
    $fech="$and DATE_FORMAT(persona.fecha, '%Y-%m-%d')='".$_POST["fecha"]."'";
	} else { $fech=""; }
	
		if($_POST["mail"]!=""){
	$mail1="$and mail LIKE '%".$_POST["mail"]."%'";
	}else {	$mail1="";	}
	
		if($_POST["tel_casa"]!=""){
	$tel="$and tel_casa LIKE '%".$_POST["tel_casa"]."%'";
	}else {	$tel="";	}
	
	if($_POST["estado"]!=""){
	$est="$and id_estado ='".$_POST["estado"]."'";
	}else {	$est="";	}
	
	if($_POST["estatus"]!=""){
	$estat="$and estatus ='".$_POST["estatus"]."'";
	}else {	$estat="";	}
	
	if($_POST["escuela"]!=""){
	$esc="$and id_escuela ='".$_POST["escuela"]."'";
	}else {	$esc="";	}
}

//mandar query con la seleccion
if (isset($_GET["hoy"])){
$query ="select distinct * from persona, seguimiento where persona.fecha_seguimiento =CURDATE() or seguimiento.fecha_seguimiento=CURDATE() group by $orden ORDER BY $orden Limit $start, $porpagina ;";
} else if (isset($_GET["segui"])){
$query ="select * from persona, estatus where persona.estatus=estatus.id_estatus and estatus.nombre='abierto'  ORDER BY $orden Limit $start, $porpagina ;";
}else {
$query ="SELECT * FROM persona where id>0 $buscar $sexob $fech $mail1 $tel $est $estat $esc ORDER BY $orden Limit $start, $porpagina ;";
}


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

</div> 
      </div>
<?php
}
?>
<form method="post" name="busca" id="busca" action="">
 <table>
	  <tr>
	    <td><div><label>Nombre o Apellido</label><input name='nombre'  type='text' maxlength='20'></div></td>
	    <td><div><label>Sexo</label><select name='sexo' style="width: 210px;">
        							<option value=''>Elige una Opción</option>
									<option value='1'>Masculino</option>
									<option value='2'>Femenino</option>
	    </select></div></td>
        <td><div><label>Fecha</label><input type='date'  name='fecha' maxlength='20' style="width: 210px;"></div></td>
	    <td><div><label>Correo</label><input name='mail'  type='mail' maxlength='20'></div></td>
	    </tr>
       <tr>
	    <td><div><label>Telefono</label><input name='tel_casa'  type='text' maxlength='20'></div></td>
	    <td><div>
     
            <label>Estado</label>
            <select name="estado" id="estado" style="width: 210px;">
      <option value=''>Seleccione</option>
	  <?php
	 
	 $query="select * from cat_estados";
 $qmune=mysql_query($query);
 $count = mysql_num_rows($qmune);
    while($Rs=mysql_fetch_array($qmune)) {
    	if($estado==$Rs['id_estado'])
		 	{$sel="selected";}
		 else
			{$sel="";}
		echo "<option value='".$Rs['id_estado']."' ".$sel.">". htmlspecialchars($Rs['estado']) ."</option>"; 
      }
    ?>
    </select>
        </div></td>
	    <td><div><label>Estatus</label>
	      <select name="estatus" class="wide"  style="width: 210px;">
	         <option value=''>Seleccione</option>
	        <?php 
$resulty=mysql_query("SELECT * FROM estatus ;");
    
    $i=0;
    
while( $rowy=mysql_fetch_array($resulty) )
    {

    $newidy=$rowy['id_estatus'];
    $newnamey=$rowy['nombre'];
    
        echo " <option value='".$newidy."' ";
        if ($estatus==$newidy){echo "selected";}
        echo "> ". htmlspecialchars($newnamey) ." </option>";
        $i++;

    }
    
    ?>
          </select>
	    </div></td>
	    <td><div><label>Escuela</label>
	      <select name="escuela" id="escuela" style="width: 210px;" >
	        <option value=''>Seleccione</option>
	        <?php
	 
	 $query="select * from escuela";
 $qmune=mysql_query($query);
 $count = mysql_num_rows($qmune);
    while($Rs=mysql_fetch_array($qmune)) {
    	if($escuela==$Rs['id_escuela'])
		 	{$sel="selected";}
		 else
			{$sel="";}
		echo "<option value='".$Rs['id_escuela']."' ".$sel.">". htmlspecialchars($Rs['nombre']) ."</option>"; 
      }
    ?>
          </select>
	    </div></td>
	   </tr>
	  <tr>
	    <td height="47"><br><div><input name='submit' type='submit' value='Buscar'></div></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	  </tr>
	</table>
</form>
<?php
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
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $nombre ." ". $apellido_pat." ". $apellido_mat."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $tel_casa."</a></td>";
				$quere = "SELECT * FROM estatus WHERE id_estatus=$estatus";
				$resulte = mysql_query($quere) or die(mysql_error());
				$estata = mysql_fetch_array($resulte);
				$estatuz = $estata['abrev'];
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $estatuz."</a></td>";
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
				echo "<li><a  class=\"modalbox modal\" href=\"personas/seg.php?editar&estat=".$estatus."&id=".$ids."\">Seguimiento pendiente fecha: ".$fechaz." descripcion: ". $descz." </a></li>";
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
