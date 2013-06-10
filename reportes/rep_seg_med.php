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
    
    
    <table>
   <tr>
        <td>SEGUIMIENTOS  POR CADA MEDIO EN UN PERIODO</tr>
   <?php  
   echo $_GET["fecha1"];
   echo $_GET["fecha2"];
$fecha11= $_GET["fecha1"];
$fecha22= $_GET["fecha2"];

 $qdp=mysql_query("SELECT nombre as medio, count(*) as seguimientos FROM medio, seguimiento where medio.id_medio=seguimiento.id_medio AND fecha BETWEEN '$fecha11' AND '$fecha22' group by nombre;");?>
<script src="../template/amcharts/amcharts.js" type="text/javascript"></script>         
        <script type="text/javascript">
            var chart;
            var legend;
var chartData= [<?php while( $rdp=mysql_fetch_array($qdp) )
    {
    echo "{ country:\"".$nombre_medio=$rdp['medio']."\", litres:".$nombre_medio=$rdp['seguimientos']."}";
           // $i++;
echo ",";
    } ?>];
           

            AmCharts.ready(function () {
                // PIE CHART
                chart = new AmCharts.AmPieChart();
                chart.dataProvider = chartData;
                chart.titleField = "country";
                chart.valueField = "litres";

                // LEGEND
                legend = new AmCharts.AmLegend();
                legend.align = "center";
                legend.markerType = "circle";
                chart.addLegend(legend);

                // WRITE
                chart.write("chartdiv");
            });

            // changes label position (labelRadius)
            function setLabelPosition() {
                if (document.getElementById("rb1").checked) {
                    chart.labelRadius = 30;
                    chart.labelText = "[[title]]: [[value]]";
                } else {
                    chart.labelRadius = -30;
                    chart.labelText = "[[percents]]%";
                }
                chart.validateNow();
            }


            // makes chart 2D/3D                   
            function set3D() {
                if (document.getElementById("rb3").checked) {
                    chart.depth3D = 10;
                    chart.angle = 10;
                } else {
                    chart.depth3D = 0;
                    chart.angle = 0;
                }
                chart.validateNow();
            }

            // changes switch of the legend (x or v)
            function setSwitch() {
                if (document.getElementById("rb5").checked) {
                    legend.switchType = "x";
                } else {
                    legend.switchType = "v";
                }
                legend.validateNow();
            }
        </script>
         
      <tr>
        <td>
	    <div id="chartdiv" style="width: 100%; height: 400px;"></div>
        <table align="center" cellspacing="20">
            <tr>
                <td>
                    <input type="radio" checked="true" name="group" id="rb1" onclick="setLabelPosition()">labels outside
                    <input type="radio" name="group" id="rb2" onclick="setLabelPosition()">labels inside</td>
                <td>
                    <input type="radio" name="group2" id="rb3" onclick="set3D()">3D
                    <input type="radio" checked="true" name="group2" id="rb4" onclick="set3D()">2D</td>
                <td>Legend switch type:
                    <input type="radio" checked="true" name="group3" id="rb5"
                    onclick="setSwitch()">x
                    <input type="radio" name="group3" id="rb6" onclick="setSwitch()">v</td>
            </tr>
        </table>
     </tr>
   </table>


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

   


