
<?PHP 

//obtener configuracion de la base de datos
$nivel_dir="../";
include ($nivel_dir.'includes/config.php');
//variables necesarias
//include ($nivel_dir.'includes/existeconexion.php');

if ($_GET["id_usuario"])
	{
		$query1 = "SELECT * FROM usuario where id_usuario=".$_GET["id_usuario"]."";
		$result1 = mysql_query($query1) or die(mysql_error());
		$row1 = mysql_fetch_array($result1);
		$id_med=$row1['id_usuario'];
	
	}

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Usuarios</title>

</head>

<body>

<div id="inline">
	<h2>Agregar Usuario</h2>

	<form id="form" name="form" action="JavaScript:verifica()" method="post">
		<p>
		  <label for="Nombres">Nombre del Usuario</label>
		  <br>
		  <input type="text" id="nombre" name="nombre" class="txt" value="<?php echo $row1['nombre']; ?>"   >
		  <br>
           <label for="Nombres">Apellido Paterno</label>
		  <br>
		  <input type="text" id="apellido_pat" name="apellido_pat" class="txt" value="<?php echo $row1['apellido_pat']; ?>"   >
		  <br>
           <label for="Nombres">Apellido Materno</label>
		  <br>
		  <input type="text" id="apellido_mat" name="apellido_mat" class="txt" value="<?php echo $row1['apellido_mat']; ?>"   >
		  <br>
          <label for="estatu">Estatus</label>
		  <br>
          <select name="estatus" id="estatus" >
           <?php if ($row1['estatus']=="activo"){ ?>
           <option selected value="activo">Activo</option>
          <?php  } else if($row1['estatus']=="inactivo"){ ?>
          <option selected value="inactivo">Inactivo</option>
           <?php }?>
           
            <option  value="activo">Activo</option>
            <option  value="inactivo">Inactivo</option>
          </select>
          <br>
          <label for="Comentarios">Usuario</label>
		  <br>
		  <input type="text"    id="usuario" name="usuario" class="txt"  value="<?php echo $row1['usuario']; ?>" >
          <br>
          <label for="Nombres">Contraseña</label>
		  <br>
		  <input type="text" id="contrasena" name="contrasena" class="txt" value="<?php echo $row1['contrasena']; ?>"   >
		  <br>
          <label for="Nombres">Matricula</label>
		  <br>
		  <input type="text" id="matricula" name="matricula" class="txt" value="<?php echo $row1['matricula']; ?>"   >
		  <br>
                    <label for="estatu">Tipo</label>
		  <br>
          <select name="tipo" id="tipo" >
           <?php if ($row1['tipo']=="Administrador"){ ?>
           <option selected value="activo">Administrador</option>
            <?php if ($row1['tipo']=="Director"){ ?>
           <option selected value="activo">Director</option>
          <?php  } else if($row1['tipo']=="Capturista"){ ?>
          <option selected value="inactivo">Capturista</option>
           <?php }?>
           
            <option  value="activo">Activo</option>
            <option  value="inactivo">Inactivo</option>
            <option  value="inactivo">Inactivo</option>
          </select>
        </p>
		<p>
        
        <?php if ($_GET["id_usuario"]){ ?>
		  <input name="id_medi" type="hidden"  id="id_medi"  value="<?php echo $_GET["id_usuario"]; ?>" >
        <?php  } else{ ?>
         <input name="insert" type="hidden"  id="insert"  value=1 >
        <?php }?>
        
          		  
		  <br>
		  
		  
		 
		  
	 
		<button type="submit" id="send" >Enviar Formulario</button>
  </form> 
	
	<script type="text/javascript" language="javascript">
	//$(document).ready(function() {
		//$(".modalbox").fancybox();
		//$("#form").submit(function() { return false; });
	//	});


		
function verifica(){
	 document.form.action="inserta_usuario.php?id_escue111=<?php echo $_GET["id_usuario"];?>";
	 			  if(document.form.Nombre.value =="")
				  {
				  alert("¡Escribe el nombre del Usuario!");
				  document.form.Nombre.focus();
				  return (false);	  
				  }
				  else if(document.form.Contraseña.value=="")
				   {
				  alert("¡Escribe una contraseña!");
				  document.form.Contraseña.focus();
				  return (false);	  
				  }
				  else if(document.form.estatus.value=="")
				   {
				  alert("¡Selecciona un estatus!");
				  document.form.estatus.focus();
				  return (false);	  
				  }
				  else if(document.form.tipo.value=="")
				   {
				  alert("¡Selecciona un tipo!");
				  document.form.tipo.focus();
				  return (false);	  
				  }
				  
				 else if(confirm("Esta seguro(a) de haber ingresado los valores correctos?")){
				 document.form.submit();
				  
				  }
}


   </script>
</div>
</body>
</html>
