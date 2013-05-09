<?PHP 
/*
*obtener configuracion de la base de datos
*/
$nivel_dir="../";
include ($nivel_dir.'includes/config.php');
require_once($nivel_dir.'template/pop.php');
/*
*variables necesarias
*include ($nivel_dir.'includes/existeconexion.php');
*/

/*
* Se realiza la conexion a la Base de Datos para Eliminar a un Usuario de Datos en la tabla de Usuarios
*/

if (isset($_GET["id_usu"]))
	{
		$query1 = "SELECT * FROM usuario where id_usuario=".$_GET["id_usu"]."";
		$result1 = mysql_query($query1) or die(mysql_error());
		$row1 = mysql_fetch_array($result1);
		$id_usu=$row1['id_usuario'];
		$contrasena=$md5['contrasena'];

} else {
		$id_usu="";
		$contraseña1="";
		$contraseña2="";
		}
?>

<!--
* Se Genera la tabla para la insercion o actualizacion de los Datos del Usuario
 -->
 
 
<div class="form clearfix">
    <div class="form-header">
        <h2 class="form-title">Actualiza Contraseña</h2>
    </div>
    
     <div class="error_list clearfix">
    <div id="myform_errorloc"></div></div>


	<form id="new_project" name="myform" action="inserta_usuario.php?id_user111=<?php echo $_GET["id_usu"];?>" method="post">
    
          <div>
		  <label for="Contrasena1">Contraseña</label>
		  <input class="skinny" type="password" id="contrasena" name="contrasena"  value="<?php echo $contrasena; ?>"  size="40">
		  </div>
          
          <div>
		  <label for="Contrasena2">Contraseña</label>
		  <input class="skinny" type="password" id="contrasena" name="contrasena"  value="<?php echo $contrasena; ?>"  size="40">
		  </div>
          
                  
        <?php if (isset($_GET["id_usu"])){ ?>
		  <input name="id_contra" type="hidden"  id="id_contra"  value="<?php echo $_GET["id_usu"]; ?>" >
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
 
 frmvalidator.addValidation("Contraseña1","req","La contaseña del usurio es requerido.");
  frmvalidator.addValidation("Contraseña2","req","La contaseña del usurio es requerido.");
      

//]]></script>


$password	= "secreto";
$password2	= "Secreto";
	if(strcmp($password, $password2) != 0) {
		echo "Las contrasenas no coinciden";
	}