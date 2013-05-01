<?php
/**
 * Valida al usuario e inicia una session
 *
 * \author Gustavo Ordoñez
 */
$nivel_dir="";
require_once($nivel_dir.'includes/config.php');
//include($nivel_dir.'scripts/existeconexion.php');



if(isset($_POST['usuario']))
   {
    
	$clave = md5($_POST['password']);
	$result = "select * from usuario where usuario='".$_POST['usuario']."' && contrasena='$clave'";
	   $result = mysql_query($result) or die(mysql_error());
	 if(!$result)
	 {
		    echo "occurrio un problema"; 
		     
    }
    else
    {
		  
	$n1 = mysql_num_rows($result);
	if($n1==1)
	{
		$row=mysql_fetch_array($result);
		$qdp=mysql_query("select id_usuario,nombre,apellido_pat,apellido_mat,estatus,usuario,matricula, tipo from usuario where id_usuario='".$row[id_usuario]."' ");
		 $rdp=mysql_fetch_array($qdp);
		  $nombre_persona=$rdp[nombre]." ".$rdp[apellido_pat]." ".$rdp[apellido_mat];
		$id_usuario=$rdp[id_usuario];
		
		
		//session_register('id_usuario');
        $_SESSION["id_usuario"]=$nombre_persona;
		$_SESSION["nombre"]=$nombre_persona;
  		$_SESSION["tipo"]=$rdp[tipo];
			
		header("Location: contacto.php");
    }else
	{
	   header("Location: index.php?mensaje=1");
		exit;
			
	}
	   
	   
	}
	
		
   }
?>
