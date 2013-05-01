<?PHP 

//obtener configuracion de la base de datos
$nivel_dir="../";
include ($nivel_dir.'includes/config.php');
//variables necesarias
//include ($nivel_dir.'includes/existeconexion.php');
require_once($nivel_dir.'template/pop.php');

if ($_GET["id_usuario"])
	{
		$query1 = "SELECT * FROM usuario where id_usuario=".$_GET["id_usuario"]."";
		$result1 = mysql_query($query1) or die(mysql_error());
		$row1 = mysql_fetch_array($result1);
		$id_usuario=$row1['id_usuario'];
	
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
		  <label for="nombres">Nombre del Usuario</label>
		  <br>
		  <input type="text" id="nombre" name="nombre" class="txt" value="<?php echo $row1['nombre']; ?>"   >
		  <br>
           <label for="apellido_pa">Apellido Paterno</label>
		  <br>
		  <input type="text" id="apellido_pat" name="apellido_pat" class="txt" value="<?php echo $row1['apellido_pat']; ?>"   >
		  <br>
           <label for="apellido_mat">Apellido Materno</label>
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
          <label for="usuario">Usuario</label>
		  <br>
		  <input type="text"    id="usuario" name="usuario" class="txt"  value="<?php echo $row1['usuario']; ?>" >
          <br>
          <label for="contrasena">Contraseña</label>
		  <br>
		  <input type="text" id="contrasena" name="contrasena" class="txt" value="<?php echo $row1['contrasena']; ?>"   >
		  <br>
          <label for="matricula">Matricula</label>
		  <br>
		  <input type="text" id="matricula" name="matricula" class="txt" value="<?php echo $row1['matricula']; ?>"   >
		  <br>
                    <label for="tipo">Tipo</label>
		  <br>
          <select name="tipo" id="tipo" >
           <?php if ($row1['tipo']=="Administrador"){ ?>
           <option selected value="Administrador">Administrador</option>
            <?php } else if ($row1['tipo']=="Director"){ ?>
           <option selected value="Director">Director</option>
          <?php  } else if($row1['tipo']=="Capturista"){ ?>
          <option selected value="Capturista">Capturista</option>
           <?php }?>
            <option  value="Administrador">Administrador</option>
            <option  value="Director">Director</option>
            <option  value="Capturista">Capturista</option>
          </select>
        </p>
		<p>
        
        <?php if ($_GET["id_usuario"]){ ?>
		  <input name="id_usuario" type="hidden"  id="id_usuario"  value="<?php echo $_GET["id_usuario"]; ?>" >
        <?php  } else{ ?>
         <input name="insert" type="hidden"  id="insert"  value=1 >
        <?php }?>
        
          		  
		  <br>
		  
	 
		<button type="submit" id="send" >Enviar Formulario</button>
  </form> 
	
	<script type="text/javascript" language="javascript">
		
function verifica(){
	document.form.action="inserta_usuario.php?id_usuario111=<?php echo $_GET["id_usuario"];?>";
	 			  if(document.form.nombre.value =="")
				  {
				  alert("¡Escribe el nombre del Usuario!");
				  document.form.nombre.focus();
				  return (false);	  
				  }
				  else if(document.form.contrasena.value=="")
				   {
				  alert("¡Escribe una contraseña!");
				  document.form.contraseña.focus();
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
