<?php 

/**
 * verifica si existe session y direciona a otra pagina si no existe session 
 * debe de include en todas las paginas
 */    
     session_start();
     if (!$_SESSION["id_usuario"])
     {
        header ('Location: '.$nivel_dir.'index.php?nosession');exit;
     }
	 
	/// session_register('id_persona');
	/// $_SESSION[id_persona]=$rdp[id_persona];
?>
