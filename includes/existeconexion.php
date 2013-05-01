<?php 

/**
 * verifica si existe session y direciona a otra pagina si no existe session 
 * debe de include en todas las paginas
 */    
   
   
   
   session_start();
 
$l_sessionStatus = session_status();
 
if($l_sessionStatus == PHP_SESSION_DISABLED) {
	//Sessions are disabled
	header ('Location: '.$nivel_dir.'index.php?nosession');exit;
}
elseif($l_sessionStatus == PHP_SESSION_NONE) {
	//Sessions enabled but inactive
	echo 'Session enabled but not active';
}
else {
	//Session is active
	echo 'Session is active';
}
   
   
   
   
   
   
   /*  session_start();
     if (!$_SESSION["id_usuario"])
     {
        header ('Location: '.$nivel_dir.'index.php?nosession');exit;
     }
	 
	*/
?>
