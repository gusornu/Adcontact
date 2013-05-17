<html>
<head>
	<title></title>
</head>
<body>

	<?php 
	$nivel_dir="../"; 
	require ($nivel_dir.'includes/config.php');

	if(isset($_GET['query'])){
	$de=date('Y-m-d', strtotime(str_replace('-', '/', $_POST["from"])));
	$a=date('Y-m-d', strtotime(str_replace('-', '/', $_POST["to"])));
	$resultado="SELECT * FROM seguimiento WHERE fecha_seguimiento between '$de' and '$a' AND contestado=1";	
	//echo "SELECT * FROM seguimiento WHERE fecha_seguimiento between '$de' and '$a' AND contestado=1";
	$result = mysql_query($resultado) or die(mysql_error());
	//Contar el numero de filas.
	$count = mysql_num_rows($result);
	
echo "<table class=\"list\">\n";
echo "<tr class=\"table-header\">\n";
echo "<th class=\"\"><a href=\"";
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
}


?>

<form id="new_project" action="reporte_emails.php?query" method="post">
	De:<input type="date" name="from"</ br>
	A:<input type="date" name="to"></ br>
	<input type="submit" value="Crear">

</form>






</body>
</html>