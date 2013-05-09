<?PHP 
/*
*obtener configuracion de la base de datos
*/

$nivel_dir="../";
include ($nivel_dir.'includes/config.php');

/*
*variables necesarias
*include ($nivel_dir.'includes/existeconexion.php');
*/

require_once($nivel_dir.'template/pop.php');

/*
* Se realiza la conexion a la Base de Datos para leer los Datos en la tabla de Usuarios
*/

if (isset($_GET["id_usu"]))
	{
		$query1 = "SELECT * FROM usuario where id_usuario=".$_GET["id_usu"]."";
		$result1 = mysql_query($query1) or die(mysql_error());
		$row1 = mysql_fetch_array($result1);
		$id_usu=$row1['id_usuario'];
		$nombre=$row1['nombre'];
		$apellido1=$row1['apellido_pat'];
		$apellido2=$row1['apellido_mat'];
		$estatus=$row1['estatus'];
		$usuario=$row1['usuario'];
		$contrasena=$md5['contrasena'];
		$matricula=$row1['matricula'];
		$tipo=$row1['tipo'];

} else {
		$id_sus="";
		$nombre="";
		$apellido1="";
		$apellido2="";
		$estatus="";
		$usuario="";
		$contrasena="";
		$matricula="";
		$tipo="";
		}
?>

<!--
* Se Genera la tabla para la insercion o actualizacion de los Datos del Usuario
 -->
 
 
<div class="form clearfix">
    <div class="form-header">
        <h2 class="form-title">Usuario</h2>
    </div>
    
     <div class="error_list clearfix">
    <div id="myform_errorloc"></div></div>


	<form id="new_project" name="myform" action="inserta_usuario.php?id_user111=<?php echo $_GET["id_usu"];?>" method="post">
    
		  <div>
		  <label for="Nombres">Nombre del Usuario</label>
		  <input class="skinny" type="text" id="nombre" name="nombre"  value="<?php echo $nombre; ?>"  size="40">
		  </div>
        
          <div>
		  <label for="Apellido1">Apellido Paterno</label>
		  <input class="skinny" type="text" id="apellido_pat" name="apellido_pat"  value="<?php echo $apellido1; ?>"  size="40">
		  </div>
          
          <div>
		  <label for="Apellido2">Apellido Materno</label>
		  <input class="skinny" type="text" id="apellido_mat" name="apellido_mat"  value="<?php echo $apellido2; ?>"  size="40">
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
      
      <div>
		  <label for="Usuario">Usuario</label>
		  <input class="skinny" type="text" id="usuario" name="usuario"  value="<?php echo $usuario; ?>"  size="40">
		  </div>
          
          <div>
		  <label for="Contrasena">Contraseña</label>
		  <input class="skinny" type="password" id="contrasena" name="contrasena"  value="<?php echo $contrasena; ?>"  size="40">
		  </div>
          
          <div>
		  <label for="Matricula">Matricula</label>
		  <input class="skinny" type="text" id="matricula" name="matricula"  value="<?php echo $matricula; ?>"  size="40">
		  </div>
          
          <div>
          <label for="Type">Tipo</label>
		  <select class="wide" name="tipo" id="tipo" >
           <?php if ($row1['tipo']=="Administrador"){ ?>
           <option selected value="Administrador">Administrador</option>
          <?php  } else if($row1['tipo']=="Director"){ ?>
          <option selected value="Director">Director</option>
          <?php  } else if($row1['tipo']=="Capturista"){ ?>
          <option selected value="Capturista">Capturista</option>
           <?php }?>
            <option  value="Administrador">Administrador</option>
            <option  value="Director">Director</option>
            <option  value="inactivo">Capturista</option>
          </select>
      </div>
        
        <?php if (isset($_GET["id_usu"])){ ?>
		  <input name="id_user" type="hidden"  id="id_user"  value="<?php echo $_GET["id_usu"]; ?>" >
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
  frmvalidator.addValidation("Apellido1","req","El apellido paterno es requerido.");
   frmvalidator.addValidation("Apellido2","req","El apellido materno es requerido.");
    frmvalidator.addValidation("status","req","Elige el status del Usuario.");
     frmvalidator.addValidation("Usuario","req","El nombre usuario es requerido.");
      frmvalidator.addValidation("Contraseña","req","La contaseña del usurio es requerido.");
       frmvalidator.addValidation("Matricula","req","la matricula del usurio es requerido.");
	    frmvalidator.addValidation("Type","req","El tipo de usuario es requerido.");
   
   

//]]></script>
