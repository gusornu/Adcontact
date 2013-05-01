<?php 

/**
 * verifica si existe session y direciona a otra pagina si no existe session 
 * debe de include en todas las paginas
 */    
   
 if ($_SESSION["tipo"]=="Capturista")
     {
        header ('Location: '.$nivel_dir.'index.php?nosession=1');exit;
     }

?>
