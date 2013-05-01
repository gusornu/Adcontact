
<?PHP 

//obtener configuracion de la base de datos
$nivel_dir="../";
include ($nivel_dir.'includes/config.php');

//variables necesarias
//include ($nivel_dir.'includes/existeconexion.php');

require_once($nivel_dir.'template/pop.php');

if (isset($_GET["id_esc"]))
	{
		$query1 = "SELECT * FROM escuela where id_escuela=".$_GET["id_esc"]."";
		$result1 = mysql_query($query1) or die(mysql_error());
		$row1 = mysql_fetch_array($result1);
		$id_esc=$row1['id_escuela'];
		$nombre=$row1['nombre'];
		$comentario=$row1['comentario'];
		$abrev=$row1['abrev'];
	
	} else {
		$nombre="";
		$comentario="";
		$abrev="";
		}

?>

<div class="form clearfix">
    <div class="form-header">
        <h2 class="form-title">Escuelas</h2>
    </div>

   <div class="error_list clearfix">
    <div id="myform_errorloc"></div></div>
	
    <form id="new_project" name="myform" action="inserta_esc.php?id_escue111=<?php echo $_GET["id_esc"];?>" method="post">
		<div>
		  <label for="Nombres">Nombre de la Escuela</label>
		 
		  <input type="text" id="Nombre" name="Nombre" class="txt" value="<?php echo $nombre; ?>"   >
		 </div>
         <div>
		  <label for="Comentarios">Comentario</label>
		 
		  <input type="text"    id="Comentario" name="Comentario" class="txt"  value="<?php echo $comentario; ?>" >
	  </div>
      <div>
		  <label for="Abrev">Abreviatura</label>
		 
		  <input type="text"    id="Abrevia" name="Abrevia" class="txt"  value="<?php echo $abrev; ?>" >
	  </div>
          <div>
        <?php if (isset($_GET["id_esc"])){ ?>
		  <input name="id_escue" type="hidden"  id="id_escue"  value="<?php echo $_GET["id_esc"]; ?>" >
        <?php  } else{ ?>
         <input name="insert" type="hidden"  id="insert"  value=1 >
        <?php }?>
        
       </div>   		  
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
 frmvalidator.addValidation("Comentario","req","Escribe un comentario.");
  frmvalidator.addValidation("Abrevia","req","Escribe la abreviatura.");
   

//]]></script>


