<?PHP 
/*
*$nivel_dir: obtener configuracion de los niveles de la base de datos
*/
$nivel_dir="../";
include ($nivel_dir.'includes/config.php');
//variables necesarias
//include ($nivel_dir.'includes/existeconexion.php');
require_once($nivel_dir.'template/pop.php');

if (isset($_GET["id_med"]))
	{
		$query1 = "SELECT * FROM medio where id_medio=".$_GET["id_med"]."";
		$result1 = mysql_query($query1) or die(mysql_error());
		$row1 = mysql_fetch_array($result1);
		$id_med=$row1['id_medio'];
		$nombre=$row1['nombre'];
		$estatus=$row1['estatus'];
		$comentario=$row1['comentario'];
	
	} else {
		$id_med="";
		$nombre="";
		$estatus="";
		$comentario="";
		}

?>

<div class="form clearfix">
    <div class="form-header">
        <h2 class="form-title">Medios</h2>
    </div>
    
     <div class="error_list clearfix">
    <div id="myform_errorloc"></div></div>


	<form id="new_project" name="myform" action="inserta_med.php?id_escue111=<?php echo $_GET["id_med"];?>" method="post">
    
		<div>
		  <label for="Nombres">Nombre del Medio de contacto</label>
		  
          
		  <input class="skinny" type="text" id="Nombre" name="Nombre"  value="<?php echo $nombre; ?>"  size="40" required="required">
		  </div>
        
          <div>
		  <label for="Comentarios">Comentario</label>
		 
		  <input class="skinny" type="text" size="40"	   id="Comentario" name="Comentario" value="<?php echo $comentario ?>"  required="required">
          </div>
          <div>
          <label for="estatu">Estatus</label >
		  
        
		  <select class="wide" name="estatus" id="estatus" required="required" >
           <?php if ($row1['estatus']=="activo"){ ?>
           <option selected value="activo">Activo</option>
          <?php  } else if($row1['estatus']=="inactivo"){ ?>
          <option selected value="inactivo">Inactivo</option>
           <?php }?>
           
            <option  value="activo">Activo</option>
            <option  value="inactivo">Inactivo</option>
          </select>
      </div>
        
        <?php if (isset($_GET["id_med"])){ ?>
		  <input name="id_medi" type="hidden"  id="id_medi"  value="<?php echo $_GET["id_med"]; ?>" >
        <?php  } else{ ?>
         <input name="insert" type="hidden"  id="insert"  value=1 >
        <?php }?>
        
          		  
		  <br>
		  
		 
		  
	 
		<div class="button large"><input type="submit" id="send" ></div>
  </form> 

   


