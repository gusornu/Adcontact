<?php $nivel_dir="../"; 
require_once($nivel_dir.'template/pop.php');
?>

<?php
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

require ($nivel_dir.'includes/existeconexion.php');
require ($nivel_dir.'includes/existeconexion2.php');


//titulo
$tit="Reporte";

//titulo de pagina
$pagetit="Modulo de Busqueda";
?>


<?php
//incluir toda la parte de ariba del template 
include($nivel_dir.'template/top.php'); ?>

<?php
if(isset($_POST["submit"])){

	// Recibimos la variable buscar del formulario de búsqueda desde el método POST
	
	if($_POST["buscar"]!=""){
	$bus=$_POST["buscar"];	
	$buscar="nombre LIKE '%$bus%'";
	}else { $buscar="";}
	
	if($_POST["sexo"]!=""){
		if($_POST["buscar"]!=""){ $and="and";} else{ $and="";}
	$sexo=$_POST["sexo"];
	$sexob="$and sexo=$sexo";
	}else {	$sexob="";	}
	
	if($_POST["fecha"]!=""){
		if($_POST["sexo"]!=""){ $and1="and";} else{ $and1="";}
    $fech="$and1 DATE_FORMAT(persona.fecha, '%Y-%m-%d')='".$_POST["fecha"]."'";
	} else { $fech=""; }
	
		if($_POST["mail"]!=""){
			if($_POST["fecha"]!=""){ $and2="and";} else{ $and2="";}
	$mail=$_POST["mail"];
	$mail1="$and2 mail='$mail'";
	}else {	$mail1="";	}
	
		if($_POST["tel_casa"]!=""){
			if($_POST["mail"]!=""){ $and3="and";} else{ $and3="";}
	$tel_casa=$_POST["tel_casa"];
	$tel="$and3 tel_casa like '%$tel_casa%'";
	}else {	$tel="";	}
	
	if($_POST["estado"]!=""){
			if($_POST["tel_casa"]!=""){ $and3="and";} else{ $and3="";}
	$tel_casa=$_POST["tel_casa"];
	$tel="$and3 tel_casa like '%$tel_casa%'";
	}else {	$tel="";	}
	
	
	


	$query="SELECT * FROM persona WHERE $buscar $sexob $fech $mail1 $tel ORDER BY nombre ASC";
	$result = mysql_query($query) or die(mysql_error());
	// Si se encuentran los datos desplegamos los resultados
	// Si no, avisamos que no se hallaron
	if(mysql_num_rows($result) > 0){
		echo "Se encontraron los siguinetes registros:<br/>";
		?><table border=1>
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
	<form  method=Post name=frm action="buscar.php">
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
	    <td><br><label>Telefono</label><br><input name='tel_casa'  type='numeric' maxlength='20'><br></td>
	    <td><div>
            <script>
        $(function() {
        $("#estado").change(function() {
                $("#municipio").load("persona.php?estado=" + $("#estado").val());
            });
        
        });
    </script>
            <label>Estado</label>
            <select class="wide" id="estado" required>
                <option value="0"></option>
<?php 
$resultx=mysql_query("SELECT * FROM estados ;");
    
    $i=0;
    
while( $rowx=mysql_fetch_array($resultx) )
    {
    $newidx=$rowx['id_estado'];
    $newnamex=$rowx['estado'];
    
        echo " <option value='".$newidx."' ";
        echo "> ". htmlspecialchars($newnamex) ." </option>";
        $i++;

    }
    
    ?>
                        </select>
        </div>
        <div>
            <label>Municipio</label>
            <select class="wide" name="municipio" id="municipio" required>
                <option value="0">Seleccione un estado</option>
              </select>
        </div>
    
      </td>
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

