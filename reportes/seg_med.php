<?php $nivel_dir="../"; 
//require_once($nivel_dir.'template/pop.php');

require_once($nivel_dir.'includes/config.php');
$message=0;
 


require ($nivel_dir.'includes/existeconexion.php');
require ($nivel_dir.'includes/existeconexion2.php');


//titulo
$tit="Reporte";

//titulo de pagina
$pagetit="Modulo de Busqueda";

//incluir toda la parte de ariba del template 
include($nivel_dir.'template/top.php'); 




		?>
        
        
    
 


<table width="100%">
   <tr>
        <td colspan="5">Elige el periodo y el reporte.</tr>

         <script type="text/javascript" language="javascript">
	$(document).ready(function() {
		//$(".modalbox").fancybox();
		$("#formu").submit(function() { return false; });
		$(".modalbox").fancybox({
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'autoSize'          : true,
		'width'				: '75%',
		'height'			: '75%',
		'type'				: 'iframe',
		'afterClose'        : function() { parent.location.reload(true); }
		
	});
	
});
 

    </script>
      <tr>
        <td colspan="5"></tr> 
      <form action="rep_seg_med.php" method="get" name=formu id="formu" > <tr>
        <td width="112">      
        <td width="150">
        <label>Fecha Inicial:</label><br>
        <input type="date" name="fecha_ini" id="fecha_ini"  >                
        <td width="78">       
        <td width="155">
        <label>Fecha Final:</label><br>
        <input type="date" name="fecha_fin" id="fecha_fin" >        
        <td width="38">        	
     </tr>
      <tr>
        <td colspan="5" class="action"><a class="modalbox small-button modal" onclick="this.href='rep_seg_med.php?rep=rsm&fecha1='+document.getElementById('fecha_ini').value+'&fecha2='+document.getElementById('fecha_fin').value;return true;"> <span>SEGUIMIENTOS  P/C MEDIO EN UN PERIODO   </span></a>
        
       </td> 
           
     </tr>
           <tr>
        <td colspan="5" class="action"><a class="modalbox small-button modal" onclick="this.href='rep_seg_med.php?rep=mp&fecha1='+document.getElementById('fecha_ini').value+'&fecha2='+document.getElementById('fecha_fin').value;return true;"> <span>CONTACTOS P/C MEDIO EN UN PERIODO   </span></a>
        
       </td> 
           
     </tr>
           <tr>
        <td colspan="5" class="action"><a class="modalbox small-button modal" onclick="this.href='rep_seg_med.php?rep=ep&fecha1='+document.getElementById('fecha_ini').value+'&fecha2='+document.getElementById('fecha_fin').value;return true;"> <span>CONTACTOS POR ESCUELA EN UN PERIODO</span></a>
        
       </td> 
           
     </tr>
      <tr>
        <td colspan="5" class="action"><a class="modalbox small-button modal" onclick="this.href='rep_seg_med.php?rep=est&fecha1='+document.getElementById('fecha_ini').value+'&fecha2='+document.getElementById('fecha_fin').value;return true;"> <span>CONTACTOS POR ESTADO EN UN PERIODO</span></a>
        
       </td> </form>
   </table>
 
