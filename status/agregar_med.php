
<?PHP 

//obtener configuracion de la base de datos
$nivel_dir="../";
include ($nivel_dir.'includes/config.php');
//variables necesarias
//include ($nivel_dir.'includes/existeconexion.php');

if ($_GET["id_med"])
	{
		$query1 = "SELECT * FROM medio where id_medio=".$_GET["id_med"]."";
		$result1 = mysql_query($query1) or die(mysql_error());
		$row1 = mysql_fetch_array($result1);
		$id_med=$row1['id_medio'];
	
	}

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mediost</title>

</head>

<body>

<div id="inline">
	<h2>Medios</h2>

	<form id="form" name="form" action="JavaScript:verifica()" method="post">
		<p>
		  <label for="Nombres">Nombre del Medio de contacto</label>
		  <br>
		  <input type="text" id="Nombre" name="Nombre" class="txt" value="<?php echo $row1['nombre']; ?>"   >
		  <br>
		  <label for="Comentarios">Comentario</label>
		  <br>
		  <input type="text"    id="Comentario" name="Comentario" class="txt"  value="<?php echo $row1['comentario']; ?>" >
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
      </p>
		<p>
        
        <?php if ($_GET["id_med"]){ ?>
		  <input name="id_medi" type="hidden"  id="id_medi"  value="<?php echo $_GET["id_med"]; ?>" >
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
	 document.form.action="inserta_med.php?id_escue111=<?php echo $_GET["id_med"];?>";
	 			  if(document.form.Nombre.value =="")
				  {
				  alert("¡Escribe el nombre del Medio de contacto!");
				  document.form.Nombre.focus();
				  return (false);	  
				  }
				  else if(document.form.Comentario.value=="")
				   {
				  alert("¡Escribe un comentario!");
				  document.form.Comentario.focus();
				  return (false);	  
				  }
				  else if(document.form.estatus.value=="")
				   {
				  alert("¡Selecciona un estatus!");
				  document.form.estatus.focus();
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
