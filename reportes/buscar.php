<?php $nivel_dir="../"; 
require_once($nivel_dir.'template/pop.php');

require_once($nivel_dir.'includes/config.php');
$message=0;
// connect to the mysql database server.
mysql_connect ($dbhost, $dbusername, $dbuserpass);
//select the database
mysql_select_db($dbname) or die('Cannot select database'); 
?>
<script src="http://code.jquery.com/jquery-latest.min.js"
        type="text/javascript"></script>
<?php

//require ($nivel_dir.'includes/existeconexion.php');
//require ($nivel_dir.'includes/existeconexion2.php');


//titulo
$tit="Reporte";
?>

<script type="text/javascript" language="JavaScript1.2" src="stm31.js"></script>


<?php 

//titulo de pagina
$pagetit="Modulo de Busqueda";

//incluir toda la parte de ariba del template 
include($nivel_dir.'template/top.php');


if(isset($_POST["submit"])){

	// Recibimos la variable buscar del formulario de búsqueda desde el método POST
	
	
	
	if($_POST["buscar"]!="" || $_POST["sexo"]!="" || $_POST["fecha"]!="" || $_POST["mail"]!="" || $_POST["tel_casa"]!="" ){ $and="and";} else{ $and="";}
	
	
	if($_POST["buscar"]!=""){
	$buscar="nombre LIKE '%".$_POST["bus"]."%'";
	}else { $buscar="";}
	
	if($_POST["sexo"]!=""){
	$sexob="$and sexo='".$_POST["sexo"]."'";
	}else {	$sexob="";	}
	
	if($_POST["fecha"]!=""){
    $fech="$and1 DATE_FORMAT(persona.fecha, '%Y-%m-%d')='".$_POST["fecha"]."'";
	} else { $fech=""; }
	
		if($_POST["mail"]!=""){
	$mail1="$and2 mail LIKE '%".$_POST["mail"]."%'";
	}else {	$mail1="";	}
	
		if($_POST["tel_casa"]!=""){
	$tel="$and3 tel_casa LIKE '%".$_POST["tel_casa"]."%'";
	}else {	$tel="";	}
	
	if($_POST["estado"]!=""){
	$est="$and3 id_estado ='".$_POST["estado"]."'";
	}else {	$est="";	}
	

	


	echo $query="SELECT * FROM persona WHERE $buscar $sexob $fech $mail1 $tel $est ORDER BY nombre ASC";
	$result = mysql_query($query) or die(mysql_error());
	// Si se encuentran los datos desplegamos los resultados
	// Si no, avisamos que no se hallaron
	if(mysql_num_rows($result) > 0){
		echo "Se encontraron los siguinetes registros:<br/>";
		?>
<style type="text/css">
.eee {
	font-family: "Times New Roman", Times, serif;
	font-size: xx-small;
}
</style>

<table border=1>
		  <tbody>
		    <tr><strong>
		      <td>Nombre</td>
		      <td>Apellido Pat</td>
              <td>Apellido Mat</td>
		      <td>Sexo</td>
		      <td>Telefono</td>
		      <td>Celular</td>
              <td>Observaciones</td>
		      <td>Estatus</td>
              <td>Mail</td>
              <td>Municipio</td>
              <td>Escuela</td>
              <td>Medio</td>
              <td>Fecha</td>
		    </strong></tr>

		<?php 
		    

		while($Rs=mysql_fetch_array($result)) {

		echo "<tr>".
		      "<td>".$Rs['nombre']."</td>".
		      "<td>".$Rs['apellido_pat']."</td>".
		      "<td>".$Rs['apellido_mat']."</td>".
		      "<td>".$Rs['sexo']."</td>".
		      "<td>".$Rs['tel_casa']."</td>".
		      "<td>".$Rs['tel_celular']."</td>".
			  "<td>".$Rs['observaciones']."</td>".
			  "<td>".$Rs['estatus']."</td>".
			  "<td>".$Rs['mail']."</td>".
			  "<td>".$Rs['id_municipio']."</td>".
			  "<td>".$Rs['id_escuela']."</td>".
			  "<td>".$Rs['id_medio']."</td>".
			  "<td>".$Rs['fecha']."</td>".
		    "</tr>";	   
		}

	}else{
		echo "No se hallaron registros que coincidan con el criterio de búsqueda";
	}
  
}else{	 
	?>
	<form method="post" name="busca" id="busca" action="">
	  <table>
	     <tr>
	     <td colspan=10>
	     <h2>Formulario de Búsqueda<h2></td>
	    </tr>
       <tr>
	    <td colspan=20><label>Elige una o Multiples Opciones de Busqueda</label><br></td>
	    </tr>
	  <tr>
	    <td><label>Nombre o Apellido</label><br><input name='buscar'  type='text' maxlength='20'><br></td>
	    <td><label>Sexo</label><br><select name='sexo'>
        							<option value=''>Elige una Opción</option>
									<option value='1'>Masculino</option>
									<option value='2'>Femenino</option>
	    </select><br></td>
        <td><label>Fecha</label><br><input type='date'  name='fecha' maxlength='20'><br></td>
	    <td><label>Correo</label><br><input name='mail'  type='mail' maxlength='20'><br></td>
	    </tr>
       <tr>
	    <td><br><label>Telefono</label><br><input name='tel_casa'  type='text' maxlength='20'><br></td>
	    <td><div>
               
<script>
function cambia(){
	document.busca.action="buscar.php";
	document.busca.submit();
}
</script>     
            <label>Estado</label>
            <select name="estado" id="estado" onChange="cambia()">
      <option selected>Seleccione</option>
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
	    <td><br><label>Estatus</label><br><select name='estatus'>
        							<option value=''>Elige una Opción</option>
									<option value='1'>Abierto</option>
									<option value='2'>Cerrado</option>
	    </select><br></td>
	    <td><br><label>Escuela</label><br><input name=''  type='text' maxlength='20'><br></td>
	   </tr>
	  <tr>
	    <td height="47"><br><input name='submit' type='submit' value='Buscar'></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	  </tr>
	</table>
	</form>
	<?php
}
?>

