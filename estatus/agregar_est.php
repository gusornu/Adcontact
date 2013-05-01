
<?PHP 

//obtener configuracion de la base de datos
$nivel_dir="../";
include ($nivel_dir.'includes/config.php');
//variables necesarias
//include ($nivel_dir.'includes/existeconexion.php');
require_once($nivel_dir.'template/pop.php');

if (isset($_GET["id_est"]))
	{
		$query1 = "SELECT * FROM estatus where id_estatus=".$_GET["id_est"]."";
		$result1 = mysql_query($query1) or die(mysql_error());
		$row1 = mysql_fetch_array($result1);
		$id_med=$row1['id_estatus'];
		$nombre=$row1['nombre'];
		$estatus=$row1['estatus'];
		$abrev=$row1['abrev'];
	
	} else {
		$id_est="";
		$nombre="";
		$estatus="";
		$abrev="";
		}

?>

<div class="form clearfix">
    <div class="form-header">
        <h2 class="form-title">Estatus</h2>
    </div>
    
     <div class="error_list clearfix">
    <div id="myform_errorloc"></div></div>


	<form id="new_project" name="myform" action="inserta_est.php?id_escue111=<?php echo $_GET["id_est"];?>" method="post">
    
		<div>
		  <label for="Nombres">Nombre del Estatus</label>
		  
          
		  <input class="skinny" type="text" id="Nombre" name="nombre"  value="<?php echo $nombre; ?>"  size="40">
		  </div>
        
          <div>
		  <label for="abrev">Abreviatura</label>
		 
		  <input class="skinny" type="text" size="40"	   id="abrev" name="abrev" value="<?php echo $abrev ?>" >;
          </div>
          <div>
          <label for="estatu">Estatus</label>
		  
        
		  <select class="wide" name="estatus" id="estatus" >
           <?php if ($row1['estatus']=="activo"){ ?>
           <option selected value="activo">Activo</option>
          <?php  } else if($row1['estatus']=="inactivo"){ ?>
          <option selected value="inactivo">Inactivo</option>
           <?php }?>
           
            <option  value="activo">Activo</option>
            <option  value="inactivo">Inactivo</option>
          </select>
      </div>
        
        <?php if (isset($_GET["id_est"])){ ?>
		  <input name="id_est" type="hidden"  id="id_est"  value="<?php echo $_GET["id_est"]; ?>" >
        <?php  } else{ ?>
         <input name="insert" type="hidden"  id="insert"  value=1 >
        <?php }?>
        
          		  
		  <br>
		  
		 
		  
	 
		<div class="button large"><input type="submit" id="send" ></div>
  </form> 

   

    <script language="JavaScript" type="text/javascript"
    xml:space="preserve">//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("myform");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 
 frmvalidator.addValidation("Nombre","req","El nombre es requerido.");
 frmvalidator.addValidation("abreviatura","req","Escribe una abreviatura.");
  frmvalidator.addValidation("status","req","Elige el status del medio.");
   

//]]></script>

